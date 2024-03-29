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

    public function appearance()
    {
        $user = User::where('email', '=', session('email'))->first();

        $profile = get_user($user);

        return view('user.settings.appearance', [
            'profile' => $profile
        ]);
    }

    public function appearance_store(Request $request)
    {
        $validated = $request->validate([
            'icon' => ['required', 'integer', 'min: 1', 'max: 7'],
            'bg' => ['required', 'integer', 'min:1', 'max:11'],
        ]);

        $user = User::where('email', '=', session('email'))->first();

        $user->avatarDefault = true;
        $user->capDefault = true;

        $user->avatar = 'MAN' . $validated['icon'];
        $user->cap = 'BG' . $validated['bg'];

        $user->save();

        return redirect()->route('settings.appearance');
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
