<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ProfileEmailController extends Controller
{
    public function index()
    {
        return view('user.settings.profile.email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'currentEmail' => ['required', 'email', 'min: 3', 'max:254'],
            'currentPassword' => ['required', 'string', 'min: 3', 'max:254'],
            'newEmail' => ['required', 'email', 'min: 3', 'max:254'],
        ]);

        $findUserSession = user_profile();
        if ($findUserSession->usertype == -1) return redirect()->back();

        if ($validated['currentEmail'] !== $findUserSession->email) {
            return redirect()->back()->withInput($validated)->withErrors([
                'email' => __('Некорректная текущая почта.')
            ]);
        }

        $passwordConfirm = app('hash')->check($validated['currentPassword'], $findUserSession->password);
        if ($passwordConfirm === false) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Некорректный пароль.')
            ]);
        }

        $findUser = User::where('email', $validated['newEmail'])->first();

        if ($findUser !== null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'email.exist' => __('Пользователь с данной почтой уже зарегистрирован.')
            ]);
        }

        $findUserSession->email = $validated['newEmail'];
        $findUserSession->verified = false;
        $findUserSession->save();

        session(['email' => $validated['newEmail']]);

        $code = set_new_verify();
        send_mail_verify($validated['newEmail'], $code);

        send_mail_change_email($validated['currentEmail'], $validated['newEmail']);

        return redirect()->route('user');
    }
}
