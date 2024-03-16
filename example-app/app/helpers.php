<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name, string $active = 'active'): string
    {
        return Route::is($name) ? $active : '';
    }
}

if (!function_exists('exit_account')) {
    function exit_account()
    {
        session()->forget('login');
        session()->forget('email');
        session()->forget('avatar');
    }
}

if (!function_exists('user_login')) {
    function user_login()
    {
        return session()->has('login') && session()->has('email') && session()->has('avatar');
    }
}
