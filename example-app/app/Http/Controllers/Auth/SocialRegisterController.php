<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialRegisterController extends Controller
{
    public function yandex()
    {
        dd('yandex');

        return redirect()->route('user');
    }

    // public function google()
    // {
    //     session(['id' => 1]);
    //     session(['email' => 'danil.dybko@gmail.com']);
    //     session(['avatar' => 'MAN1']);
    //     session(['avatarDefault' => 1]);

    //     return redirect()->route('user');
    // }

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
