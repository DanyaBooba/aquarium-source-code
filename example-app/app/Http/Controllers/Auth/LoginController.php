<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Test\DemoEmail;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        $yandexUri = oauth_yandex_link();
        $googleUri = oauth_google_link();
        $githubUri = oauth_github_link();
        $vkUri = oauth_vk_link();

        return view('sign.in.index', [
            'yandexUri' => $yandexUri,
            'googleUri' => $googleUri,
            'githubUri' => $githubUri,
            'vkUri' => $vkUri,
        ]);
    }

    public function second_index()
    {
        $yandexUri = oauth_yandex_link_second();
        $googleUri = oauth_google_link_second();

        return view('sign.second.in.index', [
            'yandexUri' => $yandexUri,
            'googleUri' => $googleUri,
        ]);
    }

    public function email()
    {
        return view('sign.in.email');
    }

    public function second_email()
    {
        return view('sign.second.in.email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
        ]);

        $findUser = User::where('email', $validated['email'])->first();

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors(['user' => __('Неверно заполнены поля.')
            ]);
        }

        $isPasswordMD5 = $findUser->md5use;
        $passwordConfirm = false;
        if (!$isPasswordMD5) {
            $passwordConfirm = app('hash')->check($validated['password'], $findUser->password);
        } else {
            $passwordUser = $findUser->password;
            $passwordSalt = $findUser->md5salt;
            $passwordConfirm = password_verify($passwordSalt . $validated['password'] . $passwordSalt, $passwordUser);

            if ($passwordConfirm === true) {
                $findUser->password = bcrypt($validated['password']);
                $findUser->md5salt = null;
                $findUser->md5use = null;
                $findUser->save();
            }
        }

        if ($passwordConfirm === false) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Неверно заполнены поля.')
            ]);
        }

        session(['id' => $findUser->id]);
        session(['email' => $validated['email']]);

        if (!$findUser->verified) {
            $code = set_new_verify();
            send_mail_verify($validated['email'], $code);
        }

        $settingsDefault = (object) [
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ];

        $settingsData = $findUser->settings_notifications ? (object) json_decode($findUser->settings_notifications) : $settingsDefault;

        if ($settingsData->authorization) {
            send_mail_login($validated['email']);
        }

        return redirect()->route('user')->with('alert.success', __('С возвращением!'));
    }

    public function second_store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
        ]);

        $findUser = User::where('email', $validated['email'])->first();
        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Неверно заполнены поля.')
            ]);
        }

        if ($findUser->email == session('email')) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Уже авторизованы.')
            ]);
        }

        $isPasswordMD5 = $findUser->md5use;
        $passwordConfirm = false;
        if (!$isPasswordMD5) {
            $passwordConfirm = app('hash')->check($validated['password'], $findUser->password);
        } else {
            $passwordUser = $findUser->password;
            $passwordSalt = $findUser->md5salt;
            $passwordConfirm = password_verify($passwordSalt . $validated['password'] . $passwordSalt, $passwordUser);

            if ($passwordConfirm === true) {
                $findUser->password = bcrypt($validated['password']);
                $findUser->md5salt = null;
                $findUser->md5use = null;
                $findUser->save();
            }
        }

        if ($passwordConfirm === false) {
            return redirect()->back()->withInput($validated)->withErrors(['password' => __('Неверно заполнены поля.')
            ]);
        }

        if (!$findUser->verified) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Аккаунт не верифицирован.')
            ]);
        }

        $oldEmail = session('email');
        $oldId = session('id');
        session([
            'prev_email' => $oldEmail,
            'prev_id' => $oldId,
            'email' => $validated['email'],
            'id' => $findUser->id
        ]);

        $settingsDefault = (object) [
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ];

        $settingsData = $findUser->settings_notifications ? (object) json_decode($findUser->settings_notifications) : $settingsDefault;
        if ($settingsData->authorization) send_mail_login($validated['email']);

        return redirect()->route('user')->with('alert.success', __('С возвращением!'));
    }
}
