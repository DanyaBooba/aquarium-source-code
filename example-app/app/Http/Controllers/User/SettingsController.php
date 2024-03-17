<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('user.settings.index');
    }

    public function profile()
    {
        return view('user.settings.profile');
    }

    public function notifications()
    {
        return view('user.settings.notifications');
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

    public function appearance()
    {
        return view('user.settings.appearance');
    }
}
