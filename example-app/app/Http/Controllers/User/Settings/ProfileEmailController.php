<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileEmailController extends Controller
{
    public function index()
    {
        return view('user.settings.profile.email');
    }

    public function store()
    {
    }
}
