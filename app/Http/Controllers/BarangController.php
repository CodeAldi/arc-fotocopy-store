<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function index()
    {
        $kategoriBarang = KategoriBarang::all();
        return view('barang',[
            'kategoriBarang'=>$kategoriBarang,
        ]);
    }
}
