<?php

if (!function_exists('user_settings_active_image_avatar')) {
    function user_settings_active_image_avatar($number, $current): string
    {
        return user_settings_active_image(true, $number, $current);
    }
}

if (!function_exists('user_settings_active_image_cap')) {
    function user_settings_active_image_cap($number, $current): string
    {
        return user_settings_active_image(false, $number, $current);
    }
}

if (!function_exists('user_settings_active_image')) {
    function user_settings_active_image(bool $isavatar, int $number, string $current): string
    {
        if ($isavatar) {
            return $number == substr($current, 3) ? "checked" : "";
        } else {
            return $number == substr($current, 2) ? "checked" : "";
        }
    }
}

if (!function_exists('user_settings_notifications')) {
    function user_settings_notifications(bool $value): string
    {
        return $value ? "checked" : "";
    }
}
