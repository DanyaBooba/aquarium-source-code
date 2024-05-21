<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function yandex()
    {
        if (empty($_GET['code'])) {
            return redirect()->back();
        }

        $params = array(
            'grant_type'    => 'authorization_code',
            'code'          => $_GET['code'],
            'client_id'     => env('YANDEX_CLIENT_ID'),
            'client_secret' => env('YANDEX_CLIENT_SECRET'),
        );

        $ch = curl_init('https://oauth.yandex.ru/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $data = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($data, true);

        if (empty($data['access_token'])) {
            return redirect()->back();
        }

        $ch = curl_init('https://login.yandex.ru/info');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['format' => 'json']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: OAuth ' . $data['access_token']]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $info = curl_exec($ch);
        curl_close($ch);

        $info = (object) json_decode($info, true);
        $profile = $this->profile($info->default_email, $info->login, $info->first_name, $info->last_name, "https://avatars.yandex.net/get-yapic/" . $info->default_avatar_id . "/islands-200");

        $this->auth($profile);

        $findUser = User::where('email', $info->default_email)->first();

        if ($findUser) {
            session([
                'id' => $findUser->id,
                'email' => $findUser->email
            ]);

            $settingsData = (object) json_decode($findUser->settings_notifications);
            if ($settingsData->authorization) {
                send_mail_login($findUser->email);
            }

            return redirect()->route('user')->with('alert.success', __('С возвращением!'));
        }

        $username = $info->login;
        $avatar = 'MAN' . random_int(1, 7);
        $avatarDefault = true;
        $bg = 'BG' . random_int(1, 11);
        $password = random_string(50);

        $findNickname = User::where('username', $info->login)->first();
        if ($findNickname) $username = '';

        if (!$info->is_avatar_empty) {
            $avatar = "https://avatars.yandex.net/get-yapic/" . $info->default_avatar_id . "/islands-200";
            $avatarDefault = false;
        }

        $settings = json_encode([
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ]);

        $query = User::query()->create([
            'email' => $info->default_email,
            'username' => $username,
            'password' => bcrypt($password),
            'avatar' => $avatar,
            'avatarDefault' => $avatarDefault,
            'cap' => $bg,
            'settings_notifications' => $settings,
            'firstName' => $info->first_name,
            'lastName' => $info->last_name,
            'serviceLogin' => 'ya',
            'shareToken' => random_string(20),
            'verified' => true,
        ]);

        session([
            'id' => $query->id,
            'email' => $query->default_email,
        ]);

        $code = set_new_verify();
        send_mail_verify($info->default_email, $code);
        send_mail_register($info->default_email, 'Яндекс', $password);

        return redirect()->route('user')->with('alert.success', __('Добро пожаловать!'));
    }

    public function google()
    {
        if (empty($_GET['code'])) return redirect()->back();

        $params = [
            'client_id'     => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect_uri'  => env('GOOGLE_REDIRECT_URI_LOGIN'),
            'grant_type'    => 'authorization_code',
            'code'          => $_GET['code']
        ];

        $ch = curl_init('https://accounts.google.com/o/oauth2/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);

        if (empty($data['access_token'])) return redirect()->back();

        $params = [
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        ];

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));

        $info = (object) json_decode($info, true);
        $profile = $this->profile($info->email, $firstName = $info->given_name, $lastName = $info->family_name, $avatar = $info->picture, $service = 'go');

        $this->auth($profile);

        return redirect()->route('user');
    }

    private function profile($email, $nickname = '', $firstName = '', $lastName = '', $avatar = '', $service = 'ya')
    {
        $findNickname = User::where('nickname', $nickname);
        if ($findNickname) $nickname = '';

        return (object) [
            'email' => $email,
            'nickname' => $nickname,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'avatar' => $avatar,
            'service' => $service
        ];
    }

    private function auth($profile)
    {
        $findUser = User::where('email', $profile->email)->first();

        if ($findUser) {
            session([
                'id' => $findUser->id,
                'email' => $findUser->email
            ]);

            $settingsData = (object) json_decode($findUser->settings_notifications);
            if ($settingsData->authorization) {
                send_mail_login($findUser->email);
            }

            return redirect()->route('user')->with('alert.success', __('С возвращением!'));
        }

        $avatarDefault = $profile->avatar == '';
        if ($profile->avatar == '') $profile->avatar = 'MAN' . random_int(1, 7);
        $bg = 'BG' . random_int(1, 11);
        $password = random_string(50);

        $settings = json_encode([
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ]);

        $query = User::query()->create([
            'email' => $profile->email,
            'username' => $profile->nickname,
            'password' => bcrypt($password),
            'avatar' => $profile->avatar,
            'avatarDefault' => $avatarDefault,
            'cap' => $bg,
            'settings_notifications' => $settings,
            'firstName' => $profile->firstName,
            'lastName' => $profile->lastName,
            'serviceLogin' => 'ya',
            'shareToken' => random_string(20),
            'verified' => true,
        ]);

        session([
            'id' => $query->id,
            'email' => $query->email,
        ]);

        $code = set_new_verify();
        send_mail_verify($profile->email, $code);
        send_mail_register($profile->email, 'Яндекс', $password);

        return redirect()->route('user')->with('alert.success', __('Добро пожаловать!'));
    }
}
