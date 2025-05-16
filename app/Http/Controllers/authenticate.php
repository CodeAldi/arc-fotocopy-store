<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authenticate extends Controller
{
    function renderLogin() {
        return view('auth.login',[
            'title'=>'Login',
        ]);
    }
    function renderRegister() {
        return view('auth.register',[
            'title','Register',
        ]);
    }
    function renderforgotPassword() {
        return view('auth.forgot',[
            'title','Forgot Password',
        ]);
    }
    
}
