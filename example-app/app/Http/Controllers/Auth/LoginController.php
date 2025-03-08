<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use App\Models\User\User;
use Illuminate\Http\Request;

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
        $vkUri = oauth_vk_link_second();
        $githubUri = oauth_github_link_second();

        return view('sign.second.in.index', [
            'yandexUri' => $yandexUri,
            'googleUri' => $googleUri,
            'vkUri' => $vkUri,
            'githubUri' => $githubUri,
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
        //
        // Получаем массив введенных данных: email и password
        //

        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
        ]);

        //
        // На данном этапе мы ищем пользователя по введенному email
        //

        $findUser = User::where('email', $validated['email'])->first();

        //
        // Если пользователя не удалось найти
        //

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Неверно заполнены поля.')
            ]);
        }

        //
        // На данном этапе мы учитываем, что пароль пользователя
        // может все еще быть записан с шифрованием MD5, а не Bcrypt
        //

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

        //
        // На данном этапе мы проверяем
        // на корректность введенный пароль
        //

        if ($passwordConfirm === false) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Неверно заполнены поля.')
            ]);
        }

        //
        // На данном этапе все данные введены корректно
        // и может быть произведен вход в аккаунт.
        //

        // $tryFindSession = SessionUser::where('idUser', $findUser->id)->first();
        // $sessionToken = '';
        // $needToCreateSession = false;

        // if ($tryFindSession == null) {
        //     $needToCreateSession = true;
        // } else {
        //     $diff = time() - $tryFindSession->unixtime_stop;

        //     if ($diff >= 0) {
        //         $tryFindSession->delete();
        //         $needToCreateSession = true;
        //     } else {
        //         $sessionToken = $tryFindSession->token;
        //     }
        // }

        // if ($needToCreateSession) {
        //     $createSession = SessionUser::query()->create([
        //         'idUser' => $findUser->id,
        //         'token' => session_generate($findUser->email, $findUser->id, 'token'),
        //         'refreshToken' => session_generate($findUser->email, $findUser->id, 'refreshToken'),
        //         'unixtime_start' => time(),
        //         'unixtime_stop' => time() + 604_800, // прибавляем неделю, потом сделать параметром!
        //     ]);

        //     $sessionToken = $createSession->token;
        // }

        // $sessionToken = session_get() != null ? session_get() : session_create($findUser->id, $findUser->email);

        session([
            'id' => $findUser->id,
            'email' => $validated['email'],
            // 'sessionToken' => $sessionToken
        ]);

        // dd($sessionToken);

        //
        // Если пользователь не подтвердил почту, отправляем письмо для подтверждения
        //

        if (!$findUser->verified) {
            $code = set_new_verify();
            send_mail_verify($validated['email'], $code);
        }

        //
        // Формируем стандартный объект настроек
        //

        $settingsDefault = (object) [
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ];

        //
        // Если у пользователя пустое поле настроек
        //

        $settingsData = $findUser->settings_notifications ? (object) json_decode($findUser->settings_notifications) : $settingsDefault;

        //
        // Если настройки пользователя позволяют – отправляем письмо
        //

        if ($settingsData->authorization) {
            send_mail_login($validated['email'], true);
        }

        //
        // Переходим на страницу пользователя и пишем сообщение
        //

        return redirect()->route('user')->with('alert.success', __('С возвращением!'));
    }

    public function second_store(Request $request)
    {
        //
        // Получаем данные из формы
        //

        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
        ]);

        //
        // Пытаемся найти пользователя по введенным данным
        //

        $findUser = User::where('email', $validated['email'])->first();

        //
        // Если не удалось найти пользователя
        //

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Неверно заполнены поля.')
            ]);
        }

        //
        // Если пытаемся авторизоваться в аккаунт, в который уже вошли
        //

        if ($findUser->email == session('email')) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Уже авторизованы.')
            ]);
        }

        //
        // Учитываем, что пароль пользователя все еще может
        // использовать шифрование MD5, а не Bcrypt
        //

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

        //
        // Если неправильно введен пароль
        //

        if ($passwordConfirm === false) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Неверно заполнены поля.')
            ]);
        }

        //
        // Если аккаунт не верифицирован
        //

        if (!$findUser->verified) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Аккаунт не верифицирован.')
            ]);
        }

        //
        // На данном этапе все введенные поля корректные
        // и мы можем записывать данные в сессии
        //

        $oldEmail = session('email');
        $oldId = session('id');
        session([
            'prev_email' => $oldEmail,
            'prev_id' => $oldId,
            'email' => $validated['email'],
            'id' => $findUser->id
        ]);

        //
        // Стандартный объект настроек
        //

        $settingsDefault = (object) [
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ];

        //
        // Если у пользователя пустое поле настроек
        //

        $settingsData = $findUser->settings_notifications ? (object) json_decode($findUser->settings_notifications) : $settingsDefault;

        //
        // Отправляем письмо об авторизации если настройки пользователя позволяют
        //

        if ($settingsData->authorization) {
            send_mail_login($validated['email']);
        }

        //
        // Переходим на страницу пользователя
        // и пишем сообщение
        //

        return redirect()->route('user')->with('alert.success', __('С возвращением!'));
    }
}
