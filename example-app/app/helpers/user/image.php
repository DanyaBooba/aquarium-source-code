<?php

if (!function_exists('is_user_image_exist')) {
    function is_user_image_exist(string $path): bool
    {
        return file_exists(public_path() . $path);
    }
}

if (!function_exists('user_image_exist')) {
    function user_image_exist(string $path): string
    {
        return image_exist($path, "/img/user/logo/MAN1.png");
    }
}

if (!function_exists('user_cap_image_exist')) {
    function user_cap_image_exist(string $path): string
    {
        return image_exist($path, "/img/user/bg/BG1.jpg");
    }
}

if (!function_exists('image_exist')) {
    function image_exist(string $path, string $default): string
    {
        return file_exists(public_path() . $path) ? $path : $default;
    }
}
