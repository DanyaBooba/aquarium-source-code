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

        return redirect()->route('settings');
    }

    public function password()
    {
        return view('user.settings.profile.password');
    }

    public function notifications()
    {
        return view('user.settings.notifications');
    }

    public function notifications_store(Request $request)
    {
        $validated = $request->validate([
            'authorization' => ['nullable', 'boolean'],
            'data_change' => ['boolean'],
            'password_change' => ['boolean'],
        ]);

        dd($validated);

        return redirect()->route('settings');
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

    public function appearance_store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:300', 'min: 3'],
            'first_name' => ['nullable', 'string', 'min:2', 'max:300'],
            'last_name' => ['nullable', 'string', 'min:2', 'max:300'],
        ]);

        dd($validated);

        return redirect()->route('settings');
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
