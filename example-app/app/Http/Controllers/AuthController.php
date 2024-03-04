<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin()
    {
        return view('sign.in.index');
    }

    public function signinpost()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }

    public function signup()
    {
        return view('sign.up.index');
    }

    public function signuppost()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }

    public function help()
    {
        return view('sign.help');
    }
}
