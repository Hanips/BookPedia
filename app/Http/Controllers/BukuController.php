<?php

namespace App\Http\Controllers;

use App\Models\Buku; //panggil model
use App\Models\Kategori; //panggil model
use App\Models\Penerbit; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$ar_produk = Produk::all(); //eloquent
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
        $ar_buku = Buku::all(); //eloquent
        return view('landingpage.hero', compact('ar_buku'));
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
            'foto' => 'nullable|max:50',
            'url_buku' => 'required|max:255',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:500', //KB
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
            'foto.max'=>'Foto Maksimal 50 kata',
            'url_buku.required'=>'URL Buku Wajib Diisi',
        ]
        );
        //Produk::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        //if(!empty($request->foto)){
        //    $fileName = 'produk_'.$request->kode.'.'.$request->foto->extension();
        //    //$fileName = $request->foto->getClientOriginalName();
        //    $request->foto->move(public_path('admin/assets/img'),$fileName);
        //}
        //else{
        //    $fileName = '';
        //}
        //lakukan insert data dari request form
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
                'foto'=>$request->foto,
                'url_buku'=>$request->url_buku,
            ]);
       
        return redirect()->route('buku.index')
                        ->with('success','Data Produk Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Buku::find($id);
        return view('buku.detail', compact('rs'));
    }

    public function detailBuku(string $id)
    {
        $rs = Buku::find($id); //eloquent
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
            'foto' => 'nullable|max:50',
            'url_buku' => 'required|max:255',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:500', //KB
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
            'foto.max'=>'Foto Maksimal 50 kata',
            'url_buku.required'=>'URL Buku Wajib Diisi',
        ]
        );
        //Produk::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        //if(!empty($request->foto)){
        //    $fileName = 'produk_'.$request->kode.'.'.$request->foto->extension();
        //    //$fileName = $request->foto->getClientOriginalName();
        //    $request->foto->move(public_path('admin/assets/img'),$fileName);
        //}
        //else{
        //    $fileName = '';
        //}
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
                'foto'=>$request->foto,
                'url_buku'=>$request->url_buku,
            ]);
       
        return redirect('/buku'.'/'.$id)
            ->with('success','Data Produk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::where('id',$id)->delete();
        return redirect()->route('buku.index')
                        ->with('success','Data Produk Berhasil Dihapus');
    }
}
