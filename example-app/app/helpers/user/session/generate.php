<?php

if (!function_exists('session_generate')) {
    function session_generate($email, $idUser)
    {
        $length = 10;
        $permitted = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

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
                str_shuffle(strval(time()))
        );

        return $random_string;
    }
}
