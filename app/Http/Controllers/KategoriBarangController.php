<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    function store(Request $request){
        $kategoriBarang = new KategoriBarang();
        $kategoriBarang->namaKategori = $request->nama;
        $kategoriBarang->save();
        return back();
    }
    function update(Request $request) {
        $kategoriBarang = KategoriBarang::find($request->id);
        $kategoriBarang->namaKategori = $request->nama;
        $kategoriBarang->save();
        return back();
    }
    function destroy(KategoriBarang $item) {
        $item->delete();

        return back();
    }
}
