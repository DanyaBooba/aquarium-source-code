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
    function user_login(): bool
    {
        return session()->has('login') && session()->has('email') && session()->has('avatar');
    }
}

if (!function_exists('use_form_word')) {
    function use_form_word(int $number, string $form1, string $form2, string $form3): string
    {
        $num = abs($number) % 100;
        $num_x = $number % 10;

        if ($num > 10 && $num < 20)   return $form3;
        if ($num_x > 1 && $num_x < 5) return $form2;
        if ($num_x == 1)              return $form1;

        return $form3;
    }
}

if (!function_exists('user_image_exist')) {
    function user_image_exist(string $path): string
    {
        if (file_exists(public_path() . $path)) {
            return $path;
        } else {
            return "/img/user/logo/MAN1.png";
        }
    }
}
