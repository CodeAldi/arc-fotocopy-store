<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HalamanBarangController extends Controller
{
    function index() {
        $barang = Barang::paginate(3);
        return view('landing.barang',[
            'barang'=> $barang,
        ]);
    }
}
