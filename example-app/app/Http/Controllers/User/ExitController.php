<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExitController extends Controller
{
    public function index()
    {
        return view('user.exit');
    }

    public function exit()
    {
        exit_account();

        return redirect()->route('main');
    }
}
