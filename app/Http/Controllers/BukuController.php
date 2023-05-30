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
                ->select('buku.*', 'kategori.nama as kategori')
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Buku::find($id);
        return view('buku.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
