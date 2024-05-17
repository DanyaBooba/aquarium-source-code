<?php

if (!function_exists('info_device_send_mail')) {
    function info_device_send_mail(): string
    {
        $device = 'Аквариум ' . info_device_platform_send_mail() . ', ' . getallheaders()["User-Agent"];
        return $device;
    }
}

if (!function_exists('info_device_platform_send_mail')) {
    function info_device_platform_send_mail(): string
    {
        $mobilePlatform = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

        $system = (object) [
            'windows' => is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")),
            'android' => is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")),
            'ios' => is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")) || is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")),
        ];

        if ($system->ios) {
            return 'iOS';
        } elseif ($system->android) {
            return 'Android';
        } elseif ($system->windows) {
            return 'Windows';
        }

        if (!$mobilePlatform) {
            return 'Desktop';
        } else {
            return 'Mobile';
        }
    }
}

if (!function_exists('info_place_send_mail')) {
    function info_place_send_mail(): string
    {
        $ch = curl_init('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'] . '?lang=ru');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = (object) json_decode($result, true);

        if ($result->status === 'success') {
            $place = $result->country . ', ' . $result->city . ' (ip: ' . info_place_ip_send_mail() . ')';
        } else {
            $place = info_place_ip_send_mail();
        }

        return $place;
    }
}

if (!function_exists('info_place_ip_send_mail')) {
    function info_place_ip_send_mail(): string
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }

        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            return $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            return $forward;
        } else {
            return $remote;
        }
    }
}
