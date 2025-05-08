<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function index()
    {
        $kategoriBarang = KategoriBarang::all();
        $barang = Barang::all();
        return view('barang',[
            'title'=>'Manajemen Barang',
            'kategoriBarang'=>$kategoriBarang,
            'barang'=>$barang,
        ]);
    }
    function store(Request $request) {
        $barang = new Barang();
        $barang->kategori_barang_id = $request->kategori;
        $barang->namaBarang = $request->nama;
        $barang->deskripsi = $request->deskripsi;
        $barang->jumlah = $request->jumlah;
        $barang->hargaBarang = $request->harga;
        $barang->gambar = $request->file('gambar')->store('gambarBarang');
        $barang->save();
        return back();
    }
    function destroy(Barang $barang) {
        $barang->delete();
        return back();
    }
}
