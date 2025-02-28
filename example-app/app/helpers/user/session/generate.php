<?php

if (!function_exists('session_generate')) {
    function session_generate($email, $idUser, $appendCode)
    {
        $length = 3;
        $permitted = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $email = mb_substr($email, 0, mb_strpos($email, '@'));
        $email = preg_replace('/[^a-z0-9]/i', '', $email);

        $input_length = strlen($permitted);
        $random_string_1 = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $permitted[mt_rand(0, $input_length - 1)];
            $random_string_1 .= $random_character;
        }

        $random_string_2 = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $permitted[mt_rand(0, $input_length - 1)];
            $random_string_2 .= $random_character;
        }

        $random_string = str_shuffle(
            str_shuffle($email) .
                $random_string_1 .
                str_shuffle(strval($idUser)) .
                $random_string_2 .
                str_shuffle(strval(time() % 10_000_000)) .
                str_shuffle($appendCode)
        );

        return $random_string;
    }
}
