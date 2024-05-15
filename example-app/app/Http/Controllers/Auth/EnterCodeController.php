<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnterCodeController extends Controller
{
    public function index()
    {
        return view('sign.code.enter');
    }

    public function store()
    {
        dd('ok');
    }
}
