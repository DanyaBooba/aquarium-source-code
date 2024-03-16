<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname(Request $request)
    {
        return view('user.show');
    }

    public function id(Request $request)
    {
        return view('user.show');
    }
}
