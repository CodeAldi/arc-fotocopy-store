<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Barang;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index() {
        $barang = Barang::all();
        $jasa = Jasa::all();
        return view('landing.home',[
            'jasa'=>$jasa,
            'barang'=>$barang,
        ]);
    }
}
