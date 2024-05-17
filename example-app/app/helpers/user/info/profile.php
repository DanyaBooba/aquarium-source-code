<?php

if (!function_exists('profile_info_isset_value')) {
    function profile_info_isset_value($value, $default)
    {
        return !empty($value) ? $value : $default;
    }
}

if (!function_exists('profile_text_info')) {
    function profile_text_info(int $number): string
    {
        $text = $number;

        if ($number > 9_999 && $number < 1_000_000) {
            $text = intdiv($number, 1_000) . "K";
        } else if ($number > 999_999) {
            $text = intdiv($number, 1_000_000) . "M";
        }

        return $text;
    }
}

if (!function_exists('profile_display_name')) {
    function profile_display_name($firstName = "", $lastName = ""): string
    {
        if (empty($firstName) && empty($lastName)) {
            return "<безымянный>";
        } else {
            return $firstName . " " . $lastName;
        }
    }
}
