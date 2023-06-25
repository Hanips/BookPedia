<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// ------- LANDING PAGE -------
Route::get('/produk', function () {
    return view('landingpage.produk');
});

Route::get('/promo', function () {
    return view('landingpage.promo');
});

Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('/ebook', [BukuController::class, 'filterBuku'])->name('landingpage.ebook');
Route::get('/promo', [BukuController::class, 'bukuDiskon']);
Route::get('/', [BukuController::class, 'dataBuku']);
Route::get('/detail/{id}', [BukuController::class, 'detailBuku'])->name('landingpage.buku_detail');
Route::get('/keranjang', [UserController::class, 'keranjang'])->name('keranjang')->middleware('auth');
Route::post('/tambah-ke-keranjang/{id}', [PesananController::class, 'tambahKeKeranjang'])->name('tambah.ke.keranjang')->middleware('auth');
Route::post('/keranjang_pesanan', [UserController::class, 'checkout'])->name('keranjang_pesanan')->middleware('auth');
Route::get('pesanan/delete/{id}', [PesananController::class, 'destroy'])->name('pesanan_delete')->middleware('auth');
Route::get('/paynow', [UserController::class, 'pay'])->name('pay_now')->middleware('auth');
Route::get('/invoice/{id}', [PesananController::class, 'invoice'])->name('invoice')->middleware('auth');
Route::get('/snap', function () {
    return view('snap');
});
Route::get('/profile', [UserController::class, 'dataUser'])->middleware('auth');
Route::get('/ubah_profil/{id}', [UserController::class, 'ubahProfil'])->name('landingpage.profile_edit');

// ------- ADMIN PAGE -------
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('adminpage.home');
    Route::get('/buku', [BukuController::class, 'index']);
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('user', UserController::class);
    Route::get('/buku-excel', [BukuController::class, 'bukuExcel']);
    Route::get('/pesanan-excel', [PesananController::class, 'pesananExcel']);
});

// ------- AUTHENTICATION -------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
