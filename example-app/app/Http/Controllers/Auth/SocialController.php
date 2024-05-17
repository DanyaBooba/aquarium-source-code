<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function yandex()
    {
        if (!empty($_GET['code'])) {
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

            if (!empty($data['access_token'])) {
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

                $findUser = User::where('email', $info->default_email)->first();

                if ($findUser) {
                    session([
                        'id' => $findUser->id,
                        'email' => $findUser->email,
                        'avatar' => $findUser->avatar,
                        'avatarDefault' => $findUser->avatarDefault
                    ]);

                    if (!$findUser->verified) {
                        $code = set_new_verify();
                        send_mail_verify($findUser->email, $code);
                    }

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

                if ($findNickname) {
                    $username = '';
                }

                if (!$info->is_avatar_empty) {
                    $avatar = "https://avatars.yandex.net/get-yapic/" . $info->default_avatar_id . "/islands-200";
                    $avatarDefault = false;
                }

                $settings = json_encode(
                    [
                        'dataChange' => true,
                        'authorization' => true,
                        'passwordChange' => true,
                    ]
                );

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
                ]);

                session(['id' => $query->id]);
                session(['email' => $info->default_email]);
                session(['avatar' => $avatar]);
                session(['avatarDefault' => $avatarDefault]);

                $code = set_new_verify();

                send_mail_verify($info->default_email, $code);
                send_mail_register($info->default_email, 'Яндекс', $password);

                return redirect()->route('user')->with('alert.success', __('Добро пожаловать!'));

                // "id" => "1132079243"
                // "login" => "creagoo"
                // "client_id" => "51193a98780a440b9bf8e93ae9971897"
                // "display_name" => "Creagoo"
                // "real_name" => "Creagoo Official"
                // "first_name" => "Creagoo"
                // "last_name" => "Official"
                // "sex" => null
                // "default_email" => "creagoo@yandex.ru"
                // "emails" => array:1 [▶]
                // "default_avatar_id" => "68143/Fn4eKYUcBOhIZG2n5j5wCLABylI-1"
                // "is_avatar_empty" => false
                // "psuid" => "1.AArbjA.bWCRC6SL2Y174ase2DLSRQ.cW28zdK3i-OZ1yyGOSEiwg"
            }
        }


        dd('yandex');

        return redirect()->route('user');
    }

    public function google()
    {
        dd('google');

        return redirect()->route('user');
    }

    // public function github()
    // {
    //     session(['id' => 1]);
    //     session(['email' => 'danil.dybko@gmail.com']);
    //     session(['avatar' => 'MAN1']);
    //     session(['avatarDefault' => 1]);

    //     return redirect()->route('user');
    // }

    // public function mailru()
    // {
    //     session(['id' => 1]);
    //     session(['email' => 'danil.dybko@gmail.com']);
    //     session(['avatar' => 'MAN1']);
    //     session(['avatarDefault' => 1]);

    //     return redirect()->route('user');
    // }

    // public function vk()
    // {
    //     session(['id' => 1]);
    //     session(['email' => 'danil.dybko@gmail.com']);
    //     session(['avatar' => 'MAN1']);
    //     session(['avatarDefault' => 1]);

    //     return redirect()->route('user');
    // }
}
