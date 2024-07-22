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

    public function api()
    {
        return view('main.api');
    }

    public function download()
    {
        return view('main.download');
    }

    public function brand()
    {
        return view('main.brand');
    }

    public function accessibility()
    {
        return view('main.accessibility');
    }

    public function history()
    {
        return view('main.history');
    }

    public function smi()
    {
        return view('main.history');
    }
}
