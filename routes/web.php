<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PesananController;

// ------- LANDING PAGE -------
Route::get('/produk', function () {
    return view('landingpage.produk');
});

Route::get('/promo', function () {
    return view('landingpage.promo');
});

Route::get('/promo', [BukuController::class, 'bukuDiskon']);
Route::get('/', [BukuController::class, 'dataBuku']);
Route::get('/detail/{id}', [BukuController::class, 'detailBuku'])->name('landingpage.buku_detail');
Route::get('/contact', function () {
    return view('landingpage.contact');
});
Route::get('/profile', [PelangganController::class, 'dataPelanggan'])->middleware('auth');

// ------- ADMIN PAGE -------
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('adminpage.home');
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('pesanan', PesananController::class);
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku-excel', [BukuController::class, 'bukuExcel']);
    Route::get('/pesanan-excel', [PesananController::class, 'pesananExcel']);
});

// ------- AUTHENTICATION -------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', function () {
    return view('user.index');
});
