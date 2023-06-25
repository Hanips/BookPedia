<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku; //panggil model
use App\Models\User; //panggil model
use App\Models\Pesanan; //panggil model
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; //jika pakai query builder
use App\Http\Resources\PesananResource;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = DB::table('pesanan')
                ->join('buku', 'buku.id', '=', 'pesanan.buku_id')
                ->join('users', 'users.id', '=', 'pesanan.user_id')
                ->select('pesanan.*', 'buku.judul as judul', 'buku.harga as harga', 'users.name as nama')
                ->orderBy('pesanan.id', 'desc')
                ->get();

        return new PesananResource(true, 'Data Pesanan', $pesanan);
    }

    public function show($id)
    {
        $pesanan = DB::table('pesanan')
                ->join('buku', 'buku.id', '=', 'pesanan.buku_id')
                ->join('users', 'users.id', '=', 'pesanan.user_id')
                ->select('pesanan.*', 'buku.judul as judul', 'buku.harga as harga', 'users.name as nama')
                ->where('pesanan.id', '=', $id)
                ->get();

        return new PesananResource(true, 'Detail Pesanan', $pesanan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'buku_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        // cek error
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //proses menyimpan data
        $pesanan = Pesanan::create([
            'buku_id'=>$request->buku_id,
            'user_id'=>$request->user_id,
        ]);

        return new PesananResource(true, 'Data Pesanan Berhasil Diinput', $pesanan);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'buku_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        // cek error
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //proses menyimpan data
        $pesanan = Pesanan::whereId($id)->update([
            'buku_id'=>$request->buku_id,
            'user_id'=>$request->user_id,
        ]);

        return new PesananResource(true, 'Data Pesanan Berhasil Diubah', $pesanan);
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::whereId($id)->first();
        $pesanan->delete();

        return new PesananResource(true, 'Data Pesanan Berhasil Dihapus', $pesanan);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $transaksi = Pesanan::findOrFail($request->order_id);
                $transaksi->update(['ket' => 'Done']);
            }
        }
    }
}
