<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriBarangController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::controller(BarangController::class)->group(function(){
    Route::get('/barang','index')->name('barang.index');
});
Route::controller(KategoriBarangController::class)->group(function(){
    Route::post('/kategori-barang/tambah','store')->name('kategoriBarang.tambah');
    Route::delete('/kategori-barang/{item}/hapus','destroy')->name('kategoriBarang.hapus');
});
