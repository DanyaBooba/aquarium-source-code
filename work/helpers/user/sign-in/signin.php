<?php

use App\Models\User\User;

if (!function_exists('user_profile')) {
    function user_profile()
    {
        $profileData = private_user_profile_email(session('email'));

        return $profileData;
    }
}

if (!function_exists('user_prev_profile')) {
    function user_prev_profile()
    {
        $prevProfileData = private_user_profile_email(session('prev_email'));

        return $prevProfileData;
    }
}

if (!function_exists('user_test_account')) {
    function user_test_account()
    {
        $testAccountData = private_user_profile_email('testaccount');

        return $testAccountData;
    }
}

if (!function_exists('private_user_profile_email')) {
    function private_user_profile_email($email)
    {
        $profileData = User::where('email', $email)->first();

        return $profileData;
    }
}
