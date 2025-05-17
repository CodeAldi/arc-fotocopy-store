<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Middleware\Role;
use App\Models\User;
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
            'title'=>'Register',
        ]);
    }
    function renderforgotPassword() {
        return view('auth.forgot',[
            'title'=>'Forgot Password',
        ]);
    }

    function registerAksi(Request $request) {
        $user = new User();
        $validatedData = $request->validate([
            'name'=> 'required|string',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
        ]);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->role = UserRole::pembeli;
        $user->save();
        return redirect()->route('login');
    }
    
}
