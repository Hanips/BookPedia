<?php

namespace App\Http\Controllers;

use App\Models\User; //panggil model
use App\Models\Pesanan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total income (counter)
        $totalIncome = Pesanan::join('buku', 'pesanan.buku_id', '=', 'buku.id')
                            ->where('pesanan.ket', 'Done')
                            ->sum('buku.harga');

        // Menghitung jumlah buku terjual (dari jumlah pesanan)
        $totalBukuTerjual = Pesanan::where('ket', 'Done')->count();

        // Menghitung jumlah pelanggan
        $totalPelanggan = User::where('role', '=', 'Pelanggan')
                            ->count();

        // Grafik income bulanan (bar chart)
        $bulanIncome = Pesanan::selectRaw('SUM(buku.harga) as income')
                ->join('buku', 'pesanan.buku_id', '=', 'buku.id')
                ->where('pesanan.ket', 'Done')
                ->groupByRaw('MONTH(pesanan.tgl)')
                ->orderByRaw('MONTH(pesanan.tgl)')
                ->limit(6)
                ->get();

        // Grafik buku terjual setiap bulan (Bar Chart)
        $bulanTerjual = Pesanan::selectRaw('COUNT(*) as terjual')
                ->where('pesanan.ket', 'Done')
                ->groupByRaw('MONTH(pesanan.tgl)')
                ->orderByRaw('MONTH(pesanan.tgl)')
                ->limit(6)
                ->get();

        return view('adminpage.home', [
            'totalIncome' => $totalIncome,
            'totalBukuTerjual' => $totalBukuTerjual,
            'totalPelanggan' => $totalPelanggan,
            'bulanIncome' => $bulanIncome,
            'bulanTerjual' => $bulanTerjual,
        ]);
    }
}