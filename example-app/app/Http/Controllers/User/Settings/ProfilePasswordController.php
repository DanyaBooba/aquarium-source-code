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

        $user = user_profile();
        if ($user->usertype == -1) return redirect()->back();

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

        $settingsDefault = (object) [
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ];

        $settingsData = $user->settings_notifications ? (object) json_decode($user->settings_notifications) : $settingsDefault;

        if ($settingsData->passwordChange) {
            send_mail_after_new_password($user->email);
        }

        return redirect()->route('user')->with('alert.success', __('Пароль был успешно сменен.'));
    }
}
