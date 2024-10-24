<?php

use App\Models\User\User;

if (!function_exists('user_profile')) {
    function user_profile()
    {
        $profileData = User::where('email', session('email'))->first();

        return $profileData;
    }
}

if (!function_exists('user_prev_profile')) {
    function user_prev_profile()
    {
        $prevProfileData = User::where('email', session('prev_email'))->first();

        return $prevProfileData;
    }
}

if (!function_exists('user_test_account')) {
    function user_test_account()
    {
        $testAccountData = User::where('email', 'testaccount')->first();

        return $testAccountData;
    }
}
