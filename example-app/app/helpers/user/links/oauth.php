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
