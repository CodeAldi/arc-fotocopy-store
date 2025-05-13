<?php

use App\Http\Controllers\authenticate;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\KategoriJasaController;
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
    return view('beranda',['title'=>'Beranda']);
})->name('beranda');

Route::controller(authenticate::class)->group(function() {
    Route::get('/login','renderLogin')->name('login');
    Route::get('/register','renderRegister')->name('register');
    Route::get('/forgot-password','renderForgotPassword')->name('forgot');
});

Route::controller(BarangController::class)->group(function(){
    Route::get('/barang','index')->name('barang.index');
    Route::post('/barang/tambah', 'store')->name('barang.tambah');
    Route::post('/barang/hapus', 'destroy')->name('barang.hapus');
});
Route::controller(KategoriBarangController::class)->group(function(){
    Route::post('/kategori-barang/tambah','store')->name('kategoriBarang.tambah');
    Route::post('/kategori-barang/update','update')->name('kategoriBarang.update');
    Route::post('/kategori-barang/hapus','destroy')->name('kategoriBarang.hapus');
});
Route::controller(JasaController::class)->group(function(){
    Route::get('jasa','index')->name('jasa.index');
    Route::post('jasa/tambah','store')->name('jasa.tambah');
    Route::post('jasa/edit','update')->name('jasa.edit');
    Route::post('jasa/hapus','destroy')->name('jasa.hapus');
});
Route::controller(KategoriJasaController::class)->group(function(){
    Route::post('kategori-jasa/tambah','store')->name('kategoriJasa.tambah');
    Route::post('kategori-jasa/update','update')->name('kategoriJasa.update');
    Route::post('kategori-jasa/hapus','destroy')->name('kategoriJasa.hapus');
});