<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

Route::get('/', [BukuController::class, 'dataBuku']);
Route::resource('buku', BukuController::class);

Route::get('/detail/{id}', [BukuController::class, 'detailBuku'])->name('landingpage.buku_detail');