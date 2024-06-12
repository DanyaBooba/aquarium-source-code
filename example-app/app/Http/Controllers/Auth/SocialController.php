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
            'client_id'     => YANDEX_CLIENT_ID,
            'client_secret' => YANDEX_CLIENT_SECRET,
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
        $profile = $this->profile((object)[
            'email' => $info->default_email ?? "",
            'nickname' => $info->login ?? "",
            'firstName' => $info->first_name ?? "",
            'lastName' => $info->last_name ?? "",
            'avatar' => $info->default_avatar_id ? "https://avatars.yandex.net/get-yapic/" . ($info->default_avatar_id) . "/islands-200" : "",
            'service' => "ya"
        ]);

        return $this->auth($profile);
    }

    public function google()
    {
        if (empty($_GET['code'])) return redirect()->back();

        $params = [
            'client_id'     => GOOGLE_CLIENT_ID,
            'client_secret' => GOOGLE_CLIENT_SECRET,
            'redirect_uri'  => GOOGLE_REDIRECT_URI_LOGIN,
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
        $profile = $this->profile((object)[
            'email' => $info->email ?? "",
            'nickname' => '',
            'firstName' => $info->given_name ?? "",
            'lastName' => $info->family_name ?? "",
            'avatar' => $info->picture ?? "",
            'service' => 'go'
        ]);

        return $this->auth($profile);
    }

    private function profile($profileObject)
    {
        $findNickname = User::where('username', $profileObject->nickname)->first();
        if ($findNickname) $profileObject->nickname = '';

        $avatarDefault = empty($profileObject->avatar);
        if(empty($profileObject->avatar)) $profileObject->avatar = user_image_random($profileObject->sex ?? '');

        return (object) [
            'email' => $profileObject->email,
            'nickname' => $profileObject->nickname,
            'firstName' => $profileObject->firstName,
            'lastName' => $profileObject->lastName,
            'avatarDefault' => $avatarDefault,
            'avatar' => $profileObject->avatar,
            'service' => $profileObject->service,
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

            $settingsData = (object) json_decode($findUser->settings_notifications ?? '{"dataChange": true, "authorization": true, "passwordChange": false}');
            if ($settingsData->authorization) {
                send_mail_login($findUser->email);
            }

            return redirect()->route('user')->with('alert.success', __('С возвращением!'));
        }

        $bg = user_cap_random();
        $password = random_password();

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
            'avatarDefault' => $profile->avatarDefault,
            'cap' => $bg,
            'settings_notifications' => $settings,
            'firstName' => $profile->firstName,
            'lastName' => $profile->lastName,
            'serviceLogin' => $profile->service,
            'shareToken' => random_string(20),
            'verified' => true,
        ]);

        session([
            'id' => $query->id,
            'email' => $query->email,
        ]);

        $serviceName = '';
        switch($profile->service) {
            case 'ya':
                $serviceName = 'Яндекс';
                break;
            case 'go':
                $serviceName = 'Google';
                break;
        }

        $code = set_new_verify();
        send_mail_verify($profile->email, $code);
        send_mail_register($profile->email, $serviceName, $password);

        return redirect()->route('user')->with('alert.success', __('Добро пожаловать!'));
    }
}
