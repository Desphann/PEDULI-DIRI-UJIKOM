<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function halamanLogin(){
        return view('pages.login');
    }

    public function Login(Request $request)
    {
        //dd($request);
        if (Auth::attempt($request->only('name', 'email', 'password')))
        {
            return redirect('/');
        }
        return redirect('/')->with('error', 'User Tidak DItemukan');
    }

    public function LogOut(){
        Auth::logout();
        return redirect('/');
    }
}
