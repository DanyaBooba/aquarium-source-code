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

    public function profile_store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:300', 'min: 3'],
            'first_name' => ['nullable', 'string', 'min:2', 'max:300'],
            'last_name' => ['nullable', 'string', 'min:2', 'max:300'],
        ]);

        dd($validated);

        return redirect()->route('user.settings.index');
    }

    public function notifications()
    {
        return view('user.settings.notifications');
    }

    public function notifications_store(Request $request)
    {
        $validated = $request->validate([
            'authorization' => ['required', 'string', 'max:300', 'min: 3'],
            'data_change' => ['nullable', 'string', 'min:2', 'max:300'],
            'password_change' => ['nullable', 'string', 'min:2', 'max:300'],
        ]);

        dd($validated);

        return redirect()->route('user.settings.index');
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
