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
        $yandexUri = 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query([
            'client_id' => env('YANDEX_CLIENT_ID'),
            'redirect_uri' => env('YANDEX_REDIRECT_URI_LOGIN'),
            'response_type' => 'code'
        ]));

        return view('sign.in.index', [
            'yandexUri' => $yandexUri
        ]);
    }

    public function email()
    {
        return view('sign.in.email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
        ]);

        $findUser = User::where(
            'email',
            $validated['email']
        )->first();

        if (
            $findUser === null
        ) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь не найден.')
            ]);
        }

        $isPasswordMD5 = $findUser->md5use;

        if (!$isPasswordMD5) {
            $passwordConfirm = app('hash')->check($validated['password'], $findUser->password);
            if ($passwordConfirm === false) {
                return redirect()->back()->withInput($validated)->withErrors([
                    'password' => __('Некорректный пароль.')
                ]);
            }
        } else {
            $passwordUser = $findUser->password;
            $passwordSalt = $findUser->md5salt;
            $passwordConfirm = password_verify($passwordSalt . $validated['password'] . $passwordSalt, $passwordUser);

            if ($passwordConfirm === false) {
                return redirect()->back()->withInput($validated)->withErrors([
                    'password' => __('Некорректный пароль.')
                ]);
            }

            $findUser->password = bcrypt($validated['password']);
            $findUser->md5salt = null;
            $findUser->md5use = null;
            $findUser->save();
        }

        session(['id' => $findUser->id]);
        session(['email' => $validated['email']]);
        session(['avatar' => $findUser->avatar ?? 'MAN1']);
        session(['avatarDefault' => $findUser->avatarDefault]);

        if (!$findUser->verified) {
            $code = set_new_verify();
            send_mail_verify($validated['email'], $code);
        }

        $settingsData = (object) json_decode($findUser->settings_notifications);

        if ($settingsData->authorization) {
            send_mail_login($validated['email']);
        }

        return redirect()->route('user')->with('alert.success', __('С возвращением!'));
    }
}
