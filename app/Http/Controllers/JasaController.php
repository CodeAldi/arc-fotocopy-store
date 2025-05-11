<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Barang;
use App\Models\KategoriJasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    function index() {
        $kategoriJasa = KategoriJasa::all();
        $jasa = Jasa::all();
        return view('jasa',[
            'title'=>'Manajemen Jasa',
            'jasa'=>$jasa,
            'kategoriJasa'=>$kategoriJasa
        ]);
    }
    function store(Request $request) {
        $jasa = new Jasa();
        $jasa->kategori_jasa_id = $request->kategori;
        $jasa->namaJasa = $request->nama;
        $jasa->harga = $request->harga;
        $jasa->deskripsi = $request->deskripsi;
        $jasa->gambar = $request->file('gambar')->store('gambarJasa');
        $jasa->save();
        return back();
    }
}
