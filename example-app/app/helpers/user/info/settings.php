<?php

if (!function_exists('user_settings_active_image_avatar')) {
    function user_settings_active_image_avatar($currentImage, $current): string
    {
        return user_settings_active_image(true, $currentImage, $current);
    }
}

if (!function_exists('user_settings_active_image_cap')) {
    function user_settings_active_image_cap($currentImage, $current): string
    {
        return user_settings_active_image(false, $currentImage, $current);
    }
}

if (!function_exists('user_settings_active_image')) {
    function user_settings_active_image(bool $isavatar, string $currentImage, string $current): string
    {
        if ($isavatar) {
            return $currentImage == $current ? "checked" : "";
        } else {
            return $currentImage == substr($current, 2) ? "checked" : "";
        }
    }
}

if (!function_exists('user_settings_notifications')) {
    function user_settings_notifications(bool $value): string
    {
        return $value ? "checked" : "";
    }
}
