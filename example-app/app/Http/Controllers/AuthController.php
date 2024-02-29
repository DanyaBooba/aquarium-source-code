<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin()
    {
        return view('sign.in.index');
    }

    public function signup()
    {
        return view('sign.up.index');
    }
}
