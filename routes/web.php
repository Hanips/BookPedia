<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/produk', function () {
    return view('landingpage.produk');
});

Route::get('/admin', function () {
    return view('adminpage.home');
});

Route::get('/buku', function () {
    return view('buku.index');
});

Route::get('/kategori', function () {
    return view('kategori.index');
});

Route::get('/penerbit', function () {
    return view('penerbit.index');
});

Route::get('/', [BukuController::class, 'dataBuku']);
Route::resource('buku', BukuController::class);
Route::get('/detail/{id}', [BukuController::class, 'detailBuku'])->name('landingpage.buku_detail');

Route::resource('kategori', KategoriController::class);

Route::resource('penerbit', PenerbitController::class);