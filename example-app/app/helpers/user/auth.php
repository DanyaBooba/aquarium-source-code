<?php

use App\Models\User\User;

if (!function_exists('exit_account')) {
    function exit_account()
    {
        session()->forget('id');
        session()->forget('email');
    }
}

if (!function_exists('user_login')) {
    function user_login(): bool
    {
        $sessions = session()->has('email') && session()->has('id');
        $findUser = User::where('email', session('email'))->where('id', session('id'))->first() !== null;

        return $sessions && $findUser;
    }
}

if (!function_exists('user_verify')) {
    function user_verify(): bool
    {
        $findUser = User::where('email', session('email'))->where('id', session('id'))->first();

        return $findUser->verified;
    }
}

if (!function_exists('user_admin')) {
    function user_admin(): bool
    {
        $findUser = User::where('email', session('email'))->first()->usertype == 100;
        return $findUser;
    }
}
