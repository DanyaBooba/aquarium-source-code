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

    public function restore()
    {
        return view('sign.restore.index');
    }

    public function code()
    {
        return view('sign.code.index');
    }

    public function google()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }

    public function yandex()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }

    public function github()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }

    public function mailru()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }

    public function vk()
    {
        session(['login' => 'login']);

        return redirect()->route('user.index');
    }
}
