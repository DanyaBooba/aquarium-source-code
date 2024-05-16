<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

                $info = json_decode($info, true);

                dd($info);
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
