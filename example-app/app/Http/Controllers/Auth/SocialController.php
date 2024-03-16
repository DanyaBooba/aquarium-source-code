<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function google()
    {
        session(['login' => 'login']);
        session(['email' => 'danil.dybko@gmail.com']);
        session(['avatar' => 'MAN1']);

        return redirect()->route('user.index');
    }

    public function yandex()
    {
        session(['login' => 'login']);
        session(['email' => 'danil.dybko@gmail.com']);
        session(['avatar' => 'MAN1']);

        return redirect()->route('user.index');
    }

    public function github()
    {
        session(['login' => 'login']);
        session(['email' => 'danil.dybko@gmail.com']);
        session(['avatar' => 'MAN1']);

        return redirect()->route('user.index');
    }

    public function mailru()
    {
        session(['login' => 'login']);
        session(['email' => 'danil.dybko@gmail.com']);
        session(['avatar' => 'MAN1']);

        return redirect()->route('user.index');
    }

    public function vk()
    {
        session(['login' => 'login']);
        session(['email' => 'danil.dybko@gmail.com']);
        session(['avatar' => 'MAN1']);

        return redirect()->route('user.index');
    }
}
