<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainRouteController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function about()
    {
        return view('main.about');
    }

    public function faq()
    {
        return view('main.faq');
    }

    public function oauth()
    {
        return view('main.oauth');
    }

    public function tech()
    {
        return view('main.tech');
    }

    public function download()
    {
        return view('main.download');
    }
}
