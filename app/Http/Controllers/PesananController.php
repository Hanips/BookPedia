<?php

namespace App\Http\Controllers;

use App\Models\Buku; //panggil model
use App\Models\User; //panggil model
use App\Models\Pesanan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //jika pakai query builder
use App\Exports\PesananExport;
use Illuminate\Support\Facades\Auth;
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

    public function tambahKeKeranjang($id)
    {
        $buku = Buku::findOrFail($id);
    
        // Pastikan user sudah login
        if (Auth::check()) {
            $userId = Auth::user()->id;
            Pesanan::create([
                'user_id' => $userId,
                'buku_id' => $buku->id,
            ]);
    
            return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang.');
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan buku ke keranjang.');
        }
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
            'pelanggan' => 'required|integer',
            'buku' => 'required|integer',
        ],
        //custom pesan errornya
        [
            'buku.required'=>'Buku Wajib Diisi',
            'buku.integer'=>'Buku Harus Berupa Angka',
            'pelanggan.required'=>'Pelanggan Wajib Diisi',
            'pelanggan.integer'=>'Pelanggan Harus Berupa Angka',
        ]
        );

        //lakukan insert data dari request form
        DB::table('pesanan')->insert(
            [
                'user_id'=>$request->pelanggan,
                'buku_id'=>$request->buku,
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
            'pelanggan' => 'required|integer',
            'buku' => 'required|integer',
            'ket' => 'max:50',
        ],
        //custom pesan errornya
        [
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

        $previousUrl = url()->previous();
        if (strpos($previousUrl, '/keranjang') !== false) {
            // Jika pada halaman admin
            return redirect()->route('keranjang')
                        ->with('success','Buku Berhasil Dihapus Dari Keranjang');
        } else {
            // Jika pada halaman landingpage
            return redirect()->route('pesanan.index')
                        ->with('success','Data Pesanan Berhasil Dihapus');
        }
    }
    public function pesananExcel()
    {
        return Excel::download(new PesananExport, 'data_pesanan_'.date('d-m-Y').'.xlsx');
    }

}