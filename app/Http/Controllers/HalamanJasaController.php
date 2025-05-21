<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class HalamanJasaController extends Controller
{
    function index() {
        $jasa = Jasa::paginate(3);
        return view('landing.jasa',[
            'jasa' => $jasa,
        ]);
    }
}
