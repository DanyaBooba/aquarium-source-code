<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view('user.settings.session');
    }

    public function store()
    {
        return redirect()->route('settings');
    }
}
