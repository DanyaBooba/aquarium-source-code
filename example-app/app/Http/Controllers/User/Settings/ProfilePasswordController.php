<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilePasswordController extends Controller
{
    public function index()
    {
        return view('user.settings.profile.password');
    }

    public function store()
    {
        return view('user.settings.profile.password');
    }
}
