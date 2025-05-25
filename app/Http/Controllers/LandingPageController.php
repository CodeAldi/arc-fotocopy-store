<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index() {
        $keranjang = Keranjang::where('user_id', Auth()->user()->id)->get();
        $barang = Barang::all();
        $jasa = Jasa::all();
        return view('landing.home',[
            'jasa'=>$jasa,
            'barang'=>$barang,
            'keranjang' => $keranjang,
        ]);
    }
}
