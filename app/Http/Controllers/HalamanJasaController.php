<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class HalamanJasaController extends Controller
{
    function index() {
        $keranjang = Keranjang::where('user_id', Auth()->user()->id)->get();
        $jasa = Jasa::paginate(3);
        return view('landing.jasa',[
            'jasa' => $jasa,
            'keranjang' => $keranjang,

        ]);
    }
}
