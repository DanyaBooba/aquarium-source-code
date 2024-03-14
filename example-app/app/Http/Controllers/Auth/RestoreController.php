<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function index()
    {
        return view('sign.restore.index');
    }

    public function store()
    {
        dd('123');
    }
}
