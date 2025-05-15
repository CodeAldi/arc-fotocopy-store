<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index() {
        $jasa = Jasa::all();
        return view('landing.home',[
            'jasa'=>$jasa,
        ]);
    }
}
