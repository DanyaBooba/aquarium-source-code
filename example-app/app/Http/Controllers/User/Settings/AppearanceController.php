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
            'bg' => ['nullable', 'integer', 'min:1', 'max:11'],
            'icon' => ['nullable', 'string', 'min:4', 'max:12'],
        ]);

        $user = User::where('email', '=', session('email'))->first();

        $hasAvatar = !empty($validated['icon']);
        if ($hasAvatar) {
            $user->avatarDefault = $validated['icon'] != 0;
            if ($validated['icon'] != 0) $user->avatar = $validated['icon'];
        }

        $hasCap = !empty($validated['bg']);
        if ($hasCap) {
            $user->capDefault = $validated['bg'] != 0;
            if ($validated['bg'] != 0) $user->cap = 'BG' . $validated['bg'];
        }

        $user->save();

        return redirect()->route('settings')->with('alert.success', __('Сохранено!'));
    }
}
