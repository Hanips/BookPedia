<?php

namespace App\Http\Controllers;

use App\Models\Buku; //panggil model
use App\Models\User; //panggil model
use App\Models\Pesanan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //jika pakai query builder
use App\Exports\PesananExport;
use Maatwebsite\Excel\Facades\Excel;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pesanan = DB::table('pesanan')
                ->join('buku', 'buku.id', '=', 'pesanan.buku_id')
                ->join('users', 'users.id', '=', 'pesanan.user_id')
                ->select('pesanan.*', 'buku.judul as judul', 'buku.harga as harga', 'users.name as nama')
                ->orderBy('pesanan.id', 'desc')
                ->get();
        return view('pesanan.index', compact('ar_pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_pelanggan = User::where('role', 'Pelanggan')->get();
        $ar_buku = Buku::all();

        //arahkan ke form input data
        return view('pesanan.form',compact('ar_pelanggan', 'ar_buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate([
            'kode' => 'required|unique:pesanan|max:5',
            'pelanggan' => 'required|integer',
            'buku' => 'required|integer',
            'ket' => 'max:50',
        ],
        //custom pesan errornya
        [
            'kode.required'=>'Kode Wajib Diisi',
            'kode.unique'=>'Kode Sudah Ada (Terduplikasi)',
            'kode.max'=>'Kode Maksimal 5 karakter',
            'buku.required'=>'Buku Wajib Diisi',
            'buku.integer'=>'Buku Harus Berupa Angka',
            'pelanggan.required'=>'Pelanggan Wajib Diisi',
            'pelanggan.integer'=>'Pelanggan Harus Berupa Angka',
            'ket.max'=>'Keterangan Maksimal 50 Karakter',
        ]
        );

        //lakukan insert data dari request form
        DB::table('pesanan')->insert(
            [
                'kode'=>$request->kode,
                'user_id'=>$request->pelanggan,
                'buku_id'=>$request->buku,
                'ket'=>$request->ket,
            ]);
       
        return redirect()->route('pesanan.index')
                        ->with('success','Data Pesanan Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Pesanan::find($id);
        return view('pesanan.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_pelanggan = User::where('role', 'Pelanggan')->get();
        $ar_buku = Buku::all();

        //tampilkan data lama di form
        $row = Pesanan::find($id);
        return view('pesanan.form_edit',compact('row', 'ar_pelanggan', 'ar_buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate([
            'kode' => 'required|max:5',
            'pelanggan' => 'required|integer',
            'buku' => 'required|integer',
            'ket' => 'max:50',
        ],
        //custom pesan errornya
        [
            'kode.required'=>'Kode Wajib Diisi',
            'kode.max'=>'Kode Maksimal 5 karakter',
            'buku.required'=>'Buku Wajib Diisi',
            'buku.integer'=>'Buku Harus Berupa Angka',
            'pelanggan.required'=>'Pelanggan Wajib Diisi',
            'pelanggan.integer'=>'Pelanggan Harus Berupa Angka',
            'ket.max'=>'Keterangan Maksimal 50 Karakter',
        ]
        );

        //lakukan insert data dari request form
        DB::table('pesanan')->where('id',$id)->update(
            [
                'kode'=>$request->kode,
                'user_id'=>$request->pelanggan,
                'buku_id'=>$request->buku,
                'ket'=>$request->ket,
            ]);
       
        return redirect()->route('pesanan.index')
                        ->with('success','Data Pesanan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')
                        ->with('success','Data Pesanan Berhasil Dihapus');
    }
    public function pesananExcel()
    {
        return Excel::download(new PesananExport, 'data_pesanan_'.date('d-m-Y').'.xlsx');
    }

}