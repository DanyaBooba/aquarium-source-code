<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
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
}
