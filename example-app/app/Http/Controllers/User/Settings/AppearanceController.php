<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function index()
    {
        $user = User::where('email', '=', session('email'))->first();

        $profile = get_user($user);

        return view('user.settings.appearance', [
            'profile' => $profile
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bg' => ['required', 'integer', 'min:1', 'max:11'],
            'icon' => ['required', 'string', 'min:4', 'max:12'],
        ]);

        $user = User::where('email', '=', session('email'))->first();

        $user->avatarDefault = $validated['icon'] != 0;
        $user->capDefault = $validated['bg'] != 0;

        if ($validated['icon'] != 0) $user->avatar = $validated['icon'];
        if ($validated['bg'] != 0) $user->cap = 'BG' . $validated['bg'];

        $user->save();

        return redirect()->route('settings.appearance')->with('alert.success', __('Сохранено!'));
    }

    public function test()
    {
        // http://localhost/user/settings/test

        return view('user.settings.test');
    }

    public function loadfile(Request $request)
    {
        $image = $request->file('image');
        $path = $image->store('loads', 'image_load');

        return view('user.settings.test', [
            'path' => $path
        ]);
    }
}
