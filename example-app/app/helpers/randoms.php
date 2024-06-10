<?php

if (!function_exists('random_string')) {
    function random_string(int $length): string
    {
        if ($length <= 0) return "";

        $permitted = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($permitted);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $permitted[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}

if (!function_exists('random_password')) {
    function random_password(): string
    {
        $length = 25;
        $lengthToSeparate = 5;
        $separate = "-";
        $permitted = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ~!@#$%^&*()_=+[{]}\\|\'",.<>/?';

        $input_length = strlen($permitted);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $permitted[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return implode($separate, str_split($random_string, $lengthToSeparate));
    }
}

if (!function_exists('random_code')) {
    function random_code(int $length): int
    {
        if ($length <= 0) return 0;

        $code = rand(pow(10, $length - 1), pow(10, $length) - 1);

        return $code;
    }
}
