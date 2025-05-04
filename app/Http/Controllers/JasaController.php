<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JasaController extends Controller
{
    function index() {
        return view('jasa',[
            'title'=>'Manajemen Jasa'
        ]);
    }
}
