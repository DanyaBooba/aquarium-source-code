<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index()
    {
        return view('sign.code.index');
    }

    public function store()
    {
        return view('sign.code.success');
    }
}
