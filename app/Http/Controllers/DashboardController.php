<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan; //panggil model
use App\Models\Pesanan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menghitung total income
        $totalIncome = Pesanan::join('buku', 'pesanan.buku_id', '=', 'buku.id')
                            ->sum('buku.harga');

        // Menghitung jumlah buku terjual (dari jumlah pesanan)
        $totalBukuTerjual = Pesanan::count();

        // Menghitung jumlah pelanggan
        $totalPelanggan = Pelanggan::count();

        return view('adminpage.home', [
            'totalIncome' => $totalIncome,
            'totalBukuTerjual' => $totalBukuTerjual,
            'totalPelanggan' => $totalPelanggan,
        ]);
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
        //
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