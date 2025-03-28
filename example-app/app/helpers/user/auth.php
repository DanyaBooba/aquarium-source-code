<?php

use App\Models\User\User;

if (!function_exists('exit_account')) {
    function exit_account()
    {
        session()->forget('id');
        session()->forget('email');
        session()->forget('prev_id');
        session()->forget('prev_email');
        session()->forget('sessionToken');
        session()->forget('prev_sessionToken');
    }
}

if (!function_exists('exit_second_account')) {
    function exit_second_account()
    {
        session()->forget('prev_id');
        session()->forget('prev_email');
        session()->forget('prev_sessionToken');
    }
}

if (!function_exists('user_login')) {
    function user_login(): bool
    {
        $sessions = session()->has('email') && session()->has('id') || session()->has('sessionToken');
        $findUser = user_profile() !== null;

        return $sessions && $findUser;
    }
}

if (!function_exists('have_second_account')) {
    function have_second_account(): bool
    {
        $sessions = session()->has('prev_email') && session()->has('prev_id');
        $findUser = user_prev_profile() !== null;

        return $sessions && $findUser;
    }
}

if (!function_exists('user_verify')) {
    function user_verify(): bool
    {
        $findUser = user_profile();

        return $findUser->verified;
    }
}

if (!function_exists('user_admin')) {
    function user_admin(): bool
    {
        $findUser = user_profile()->usertype == 100;
        return $findUser;
    }
}

if (!function_exists('login_for_test_account')) {
    function login_for_test_account()
    {
        $findTest = user_test_account();

        if ($findTest === null) {
            $findTest = User::query()->create([
                'verified' => 1,
                'email' => 'testaccount',
                'password' => '',
                'avatar' => 'MAN6',
                'cap' => 'BG3',
                'usertype' => -1,
                'firstName' => 'Даниил',
                'lastName' => 'Иванов',
                'desc' => 'Описание профиля.',
            ]);
        }

        session(['id' => $findTest->id]);
        session(['email' => 'testaccount']);
    }
}
