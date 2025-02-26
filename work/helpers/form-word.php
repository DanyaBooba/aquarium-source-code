<?php

if (!function_exists('use_form_word')) {
    function use_form_word(int $number, string $form1, string $form2, string $form3): string
    {
        $num = abs($number) % 100;
        $num_x = $number % 10;

        if ($num > 10 && $num < 20)   return $form3;
        if ($num_x > 1 && $num_x < 5) return $form2;
        if ($num_x == 1)              return $form1;

        return $form3;
    }
}
