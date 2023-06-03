<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//------- LANDING PAGE
Route::get('/produk', function () {
    return view('landingpage.produk');
});

Route::get('/promo', function () {
    return view('landingpage.promo');
});

//------- ADMIN PAGE
Route::get('/buku', function () {
    return view('buku.index');
});
Route::get('/kategori', function () {
    return view('kategori.index');
});
Route::get('/pelanggan', function () {
    return view('pelanggan.index');
});
Route::get('/penerbit', function () {
    return view('penerbit.index');
});
Route::get('/pesanan', function () {
    return view('pesanan.index');
});

//------- LANDING PAGE
Route::get('/', [BukuController::class, 'dataBuku']);
Route::resource('buku', BukuController::class);
Route::get('/detail/{id}', [BukuController::class, 'detailBuku'])->name('landingpage.buku_detail');

//------- ADMIN PAGE
Route::get('/admin', [DashboardController::class, 'index'])->name('adminpage.home');
Route::resource('kategori', KategoriController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('pesanan', PesananController::class);