<?php

namespace App\Http\Controllers;

use App\Models\Buku; //panggil model
use App\Models\Kategori; //panggil model
use App\Models\Penerbit; //panggil model
use App\Models\Pesanan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //jika pakai query builder
use App\Exports\BukuExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_buku = DB::table('buku')
                ->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
                ->join('penerbit', 'penerbit.id', '=', 'buku.penerbit_id')
                ->select('buku.*', 'kategori.nama as kategori', 'penerbit.nama as penerbit')
                ->orderBy('buku.id', 'desc')
                ->get();
        return view('buku.index', compact('ar_buku'));
    }

    public function dataBuku()
    {
        $ar_buku = Buku::leftJoin('pesanan', 'buku.id', '=', 'pesanan.buku_id')
            ->leftJoin('kategori', 'buku.kategori_id', '=', 'kategori.id')
            ->select('buku.id', 'buku.judul', 'buku.harga', 'buku.diskon', 'buku.foto', 'kategori.nama as nama', DB::raw('COUNT(pesanan.buku_id) as jumlah_pesanan'))
            ->groupBy('buku.id', 'buku.judul', 'buku.harga', 'buku.diskon', 'buku.foto', 'kategori.nama')
            ->orderBy('jumlah_pesanan', 'desc')
            ->get();
    
        return view('landingpage.hero', compact('ar_buku'));
    }
    
    
    

    public function bukuDiskon()
    {
        $ar_buku = Buku::where('diskon', '>', 0)->get();
        return view('landingpage.promo', compact('ar_buku'));
    }

    public function filterBuku(Request $request)
    {
        $kategoriIds = [1, 2, 3, 4, 5, 6, 7, 8];
        $penerbitIds = [1, 2, 3, 4, 5];
        $ar_buku = [];
    
        foreach ($kategoriIds as $kategoriId) {
            $ar_buku[$kategoriId] = Buku::where('kategori_id', $kategoriId)->get();
        }
    
        foreach ($penerbitIds as $penerbitId) {
            $ar_buku[$penerbitId] = Buku::where('penerbit_id', $penerbitId)->get();
        }
    
        $selectedKategori = $request->kategori;
        $selectedPenerbit = $request->penerbit;
        $urutan = $request->urutan;
        $hargaMin = $request->harga_min;
        $hargaMax = $request->harga_max;
        $promo = $request->has('promo');
        $search = $request->search; // Menambahkan variabel search
    
        $buku_terpilih = Buku::query();
    
        // Filter kategori
        if ($selectedKategori) {
            $buku_terpilih->where('kategori_id', $selectedKategori);
        }
    
        // Filter penerbit
        if ($selectedPenerbit) {
            $buku_terpilih->where('penerbit_id', $selectedPenerbit);
        }
    
        // Filter range harga
        if ($hargaMin) {
            $buku_terpilih->where('harga', '>=', $hargaMin);
        }
    
        if ($hargaMax) {
            $buku_terpilih->where('harga', '<=', $hargaMax);
        }
    
        // Filter promo
        if ($promo) {
            $buku_terpilih->where('diskon', '>', 0);
        }
    
        // Filter search
        if ($search) {
            $buku_terpilih->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%'.$search.'%')
                      ->orWhere('pengarang', 'like', '%'.$search.'%')
                      ->orWhere('harga', 'like', '%'.$search.'%')
                      ->orWhere('isbn', 'like', '%'.$search.'%')
                      ->orWhere('sinopsis', 'like', '%'.$search.'%')
                      ->orWhere('jumlah_halaman', 'like', '%'.$search.'%');
            });
        }
    
        // Urut berdasarkan
        if ($urutan == 'terbaru') {
            $buku_terpilih->orderBy('id', 'desc');
        } elseif ($urutan == 'terlama') {
            $buku_terpilih->orderBy('id', 'asc');
        } elseif ($urutan == 'harga-tertinggi') {
            $buku_terpilih->orderBy('harga', 'desc');
        } elseif ($urutan == 'harga-terendah') {
            $buku_terpilih->orderBy('harga', 'asc');
        }
    
        $buku_terpilih = $buku_terpilih->get();
        $semua_buku = Buku::all();
        $semua_kategori = Kategori::all();
        $semua_penerbit = Penerbit::all();
    
        return view('landingpage.ebook', compact('ar_buku', 'buku_terpilih', 'selectedKategori', 'selectedPenerbit', 'semua_buku', 'semua_kategori', 'semua_penerbit', 'urutan', 'hargaMin', 'hargaMax', 'promo', 'search')); // Menambahkan variabel search ke dalam compact()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_kategori = Kategori::all();
        $ar_penerbit = Penerbit::all();
        //arahkan ke form input data
        return view('buku.form',compact('ar_kategori', 'ar_penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate([
            'kode' => 'required|unique:buku|max:5',
            'judul' => 'required|max:45',
            'kategori' => 'required|integer',
            'penerbit' => 'required|integer',
            'isbn' => 'required|integer',
            'pengarang' => 'required|max:45',
            'jumlah_halaman' => 'required|integer|max:10000',
            'sinopsis' => 'nullable|max:100',
            'rating' => 'required|numeric|max:5',
            'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'diskon' => 'nullable|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,svg|min:2|max:500', //KB
            'url_buku' => 'required|max:255',
        ],
        //custom pesan errornya
        [
            'kode.required'=>'Kode Wajib Diisi',
            'kode.unique'=>'Kode Sudah Ada (Terduplikasi)',
            'kode.max'=>'Kode Maksimal 5 karakter',
            'judul.required'=>'Judul Wajib Diisi',
            'judul.max'=>'Judul Maksimal 45 karakter',
            'kategori.required'=>'Kategori Wajib Diisi',
            'kategori.integer'=>'Kategori Harus Berupa Angka',
            'penerbit.required'=>'Penerbit Wajib Diisi',
            'isbn.required'=>'ISBN Wajib Diisi',
            'isbn.integer'=>'ISBN Wajib Diisi Dengan Angka',
            'pengarang.required'=>'Pengarang Wajib Diisi',
            'pengarang.max'=>'Pengarang Maksimal 45 karakter',
            'jumlah_halaman.required'=>'Jumlah Halaman Wajib Diisi',
            'jumlah_halaman.integer'=>'Jumlah Halaman Wajib Diisi Berupa Angka',
            'jumlah_halaman.max'=>'Jumlah Halaman Maksimal 10000',
            'sinopsis.max'=>'Sinopsis Maksimal 100 kata',
            'rating.required'=>'Rating Wajib Diisi',
            'rating.max'=>'Rating Maksimal 5 Bintang',
            'harga.required'=>'Harga Wajib Diisi',
            'harga.regex'=>'Harga Harus Berupa Angka',
            'diskon.regex'=>'Diskon Harus Berupa Angka',
            'foto.min'=>'Ukuran file kurang 2 KB',
            'foto.max'=>'Ukuran file melebihi 500 KB',
            'foto.image'=>'File foto bukan gambar',
            'foto.mimes'=>'Extension file selain jpg,jpeg,png,svg',
            'url_buku.required'=>'URL Buku Wajib Diisi',
        ]
        );

        //------------apakah user ingin upload foto--------- --
        if(!empty($request->foto)){
            $fileName = 'buku_'.$request->kode.'.'.$request->foto->extension();
            $request->foto->move(public_path('landingpage/img'),$fileName);
        }
        else{
            $fileName = '';
        }

        //lakukan insert data dari request form
        try{
        DB::table('buku')->insert(
            [
                'kode'=>$request->kode,
                'judul'=>$request->judul,
                'kategori_id'=>$request->kategori,
                'penerbit_id'=>$request->penerbit,
                'isbn'=>$request->isbn,
                'pengarang'=>$request->pengarang,
                'jumlah_halaman'=>$request->jumlah_halaman,
                'sinopsis'=>$request->sinopsis,
                'rating'=>$request->rating,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'foto'=>$fileName,
                'url_buku'=>$request->url_buku,
            ]);
       
        return redirect()->route('buku.index')
                        ->with('success','Data Produk Baru Berhasil Disimpan');
    }
        catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('buku.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }  
    }
    /**
     * Detail buku adminpage
     */
    public function show(string $id)
    {
        $rs = Buku::find($id);
        return view('buku.detail', compact('rs'));
    }

    /**
     * Detail buku landingpage
     */
    public function detailBuku(string $id)
    {
        $rs = Buku::withCount('pesanan')->find($id);
        return view('landingpage.buku_detail', compact('rs'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_kategori = Kategori::all();
        $ar_penerbit = Penerbit::all();
        //tampilkan data lama di form
        $row = Buku::find($id);
        return view('buku.form_edit',compact('row','ar_kategori', 'ar_penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate([
            'kode' => 'required|max:5',
            'judul' => 'required|max:45',
            'kategori' => 'required|integer',
            'penerbit' => 'required|integer',
            'isbn' => 'required|integer',
            'pengarang' => 'required|max:45',
            'jumlah_halaman' => 'required|integer|max:10000',
            'sinopsis' => 'nullable|max:100',
            'rating' => 'required|numeric|max:5',
            'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'diskon' => 'nullable|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,svg|min:2|max:500', //kb
            'url_buku' => 'required|max:255',
        ],
        //custom pesan errornya
        [
            'kode.required'=>'Kode Wajib Diisi',
            'kode.unique'=>'Kode Sudah Ada (Terduplikasi)',
            'kode.max'=>'Kode Maksimal 5 karakter',
            'judul.required'=>'Judul Wajib Diisi',
            'judul.max'=>'Judul Maksimal 45 karakter',
            'kategori.required'=>'Kategori Wajib Diisi',
            'kategori.integer'=>'Kategori Harus Berupa Angka',
            'penerbit.required'=>'Penerbit Wajib Diisi',
            'isbn.required'=>'ISBN Wajib Diisi',
            'isbn.integer'=>'ISBN Wajib Diisi Dengan Angka',
            'pengarang.required'=>'Pengarang Wajib Diisi',
            'pengarang.max'=>'Pengarang Maksimal 45 karakter',
            'jumlah_halaman.required'=>'Jumlah Halaman Wajib Diisi',
            'jumlah_halaman.integer'=>'Jumlah Halaman Wajib Diisi Berupa Angka',
            'jumlah_halaman.max'=>'Jumlah Halaman Maksimal 10000',
            'sinopsis.max'=>'Sinopsis Maksimal 100 kata',
            'rating.required'=>'Rating Wajib Diisi',
            'rating.max'=>'Rating Maksimal 5 Bintang',
            'harga.required'=>'Harga Wajib Diisi',
            'harga.regex'=>'Harga Harus Berupa Angka',
            'diskon.regex'=>'Diskon Harus Berupa Angka',
            'foto.min'=>'Ukuran file kurang 2 KB',
            'foto.max'=>'Ukuran file melebihi 500 KB',
            'foto.image'=>'File foto bukan gambar',
            'foto.mimes'=>'Extension file selain jpg,jpeg,png,svg',
            'url_buku.required'=>'URL Buku Wajib Diisi',
        ]
        );

        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('buku')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }

        //------------apakah user  ingin ubah upload foto baru--------- --
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($namaFileFotoLama)) unlink('landingpage/img/'.$namaFileFotoLama);

            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'buku_'.$request->kode.'.'.$request->foto->extension();
            $request->foto->move(public_path('landingpage/img'),$fileName);
        }
        else{
            $fileName = $namaFileFotoLama;
        }

        //lakukan insert data dari request form
        DB::table('buku')->where('id',$id)->update(
            [
                'kode'=>$request->kode,
                'judul'=>$request->judul,
                'kategori_id'=>$request->kategori,
                'penerbit_id'=>$request->penerbit,
                'isbn'=>$request->isbn,
                'pengarang'=>$request->pengarang,
                'jumlah_halaman'=>$request->jumlah_halaman,
                'sinopsis'=>$request->sinopsis,
                'rating'=>$request->rating,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'foto'=>$fileName,
                'url_buku'=>$request->url_buku,
            ]);
       
        return redirect('/buku'.'/'.$id)
            ->with('success','Data Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        if (!empty($buku->foto)) {
            $fotoPath = public_path('landingpage/img/'.$buku->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $buku->delete();
        return redirect()->route('buku.index')
                        ->with('success', 'Data Buku Berhasil Dihapus');
    }
 /*
    public function delete($id)
    {
        $buku = Buku::find($id);
        if (!empty($buku->foto)) {
            $fotoPath = public_path('landingpage/img/'.$buku->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        //hapus data dari database
        Buku::where('id',$id)->delete();
        return redirect()->back();
    }   */ 

    public function bukuExcel()
    {
        return Excel::download(new BukuExport, 'data_buku_'.date('d-m-Y').'.xlsx');
    }
    
}
