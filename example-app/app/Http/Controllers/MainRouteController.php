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
        return "";
    }

    public function faq()
    {
        return "";
    }
}
