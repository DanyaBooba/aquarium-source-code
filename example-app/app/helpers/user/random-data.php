<?php

if (!function_exists('user_image_random')) {
    function user_image_random($sex = 'MAN'): string
    {
        $sex = in_array($sex, ["MAN", "WOMAN"]) ? $sex : "MAN";
        return $sex . random_int(1, 7);
    }
}

if (!function_exists('user_cap_random')) {
    function user_cap_random(): string
    {
        return "BG" . random_int(1, 11);
    }
}
