<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainUserController extends Controller
{
    public function index()
    {
        return view('main.terms.index');
    }

    public function privacy()
    {
        return view('main.terms.privacy');
    }

    public function termsofuse()
    {
        return view('main.terms.termsofuse');
    }

    public function cookie()
    {
        return view('main.terms.cookie');
    }
}
