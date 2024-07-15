<?php

if (!function_exists('oauth_yandex_link')) {
    function oauth_yandex_link(): string
    {
        return
            'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query([
                'client_id' => YANDEX_CLIENT_ID,
                'redirect_uri' => YANDEX_REDIRECT_URI_LOGIN,
                'response_type' => 'code'
            ]));
    }
}

if (!function_exists('oauth_yandex_link_second')) {
    function oauth_yandex_link_second(): string
    {
        return
            'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query([
                'client_id' => YANDEX_CLIENT_ID,
                'redirect_uri' => YANDEX_REDIRECT_URI_SECOND,
                'response_type' => 'code'
            ]));
    }
}

if (!function_exists('oauth_google_link')) {
    function oauth_google_link(): string
    {
        return
            'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query([
                'client_id' => GOOGLE_CLIENT_ID,
                'redirect_uri' => GOOGLE_REDIRECT_URI_LOGIN,
                'response_type' => 'code',
                'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
            ]));
    }
}

if (!function_exists('oauth_google_link_second')) {
    function oauth_google_link_second(): string
    {
        return
            'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query([
                'client_id' => GOOGLE_CLIENT_ID,
                'redirect_uri' => GOOGLE_REDIRECT_URI_SECOND,
                'response_type' => 'code',
                'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
            ]));
    }
}

if (!function_exists('oauth_github_link')) {
    function oauth_github_link(): string
    {
        return 'https://github.com/login/oauth/authorize?' . urldecode(http_build_query([
            'client_id'     => GITHUB_CLIENT_ID_FIRST,
            'redirect_uri'  => GITHUB_CALLBACK_URL_FIRST,
            'scope'         => 'user',
            'response_type' => 'code',
            'state'         => ''
        ]));
    }
}

if (!function_exists('oauth_vk_link')) {
    function oauth_vk_link(): string
    {
        return 'https://oauth.vk.com/authorize?' . urldecode(http_build_query([
            'client_id'     => VK_APP_ID,
            'redirect_uri'  => VK_REDIRECT_URI_LOGIN,
            'scope'         => 'email',
            'response_type' => 'code',
            'state'         => VK_STATE
        ]));
    }
}
