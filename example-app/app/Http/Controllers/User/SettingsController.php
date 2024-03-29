<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $verified = User::where('email', '=', session('email'))->first()->verified;

        return view('user.settings.index', [
            'verified' => $verified,
        ]);
    }

    public function privacy()
    {
        return view('user.settings.privacy');
    }

    public function storage()
    {
        return view('user.settings.storage');
    }

    public function devices()
    {
        return view('user.settings.devices');
    }

    public function language()
    {
        return view('user.settings.language');
    }

    public function themes()
    {
        return view('user.settings.themes');
    }

    public function test()
    {
        return view('user.settings.test');
    }
}
