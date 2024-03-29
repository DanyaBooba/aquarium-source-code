<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfilePasswordController extends Controller
{
    public function index()
    {
        return view('user.settings.profile.password');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'currentPassword' => ['required', 'string', 'min: 3', 'max:254'],
            'newPassword' => ['required', 'string', 'min: 3', 'max:254', Password::min(3)->letters()->numbers()],
        ]);

        $user = User::where('email', '=', session('email'))->first();

        $passwordConfirm = app('hash')->check($validated['currentPassword'], $user->password);
        if ($passwordConfirm === false) {
            return redirect()->back()->withErrors([
                'password' => __('Некорректный пароль.')
            ]);
        }

        if ($validated['currentPassword'] === $validated['newPassword']) {
            return redirect()->back()->withErrors([
                'password' => __('Пароли совпадают.')
            ]);
        }

        $user->password = bcrypt($validated['newPassword']);
        $user->save();

        return redirect()->route('settings.profile.password');
    }
}
