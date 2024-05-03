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
        return redirect()->back();

        return view('main.download');
    }

    public function brand()
    {
        return view('main.brand');
    }

    public function accessibility()
    {
        return redirect()->route('main');

        return view('main.accessibility');
    }
}
