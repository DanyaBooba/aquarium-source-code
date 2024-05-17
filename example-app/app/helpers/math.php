<?php

if (!function_exists('math_min')) {
    function math_min(int $value1, int $value2): int
    {
        return $value1 < $value2 ? $value1 : $value2;
    }
}

if (!function_exists('math_max')) {
    function math_max(int $value1, int $value2): int
    {
        return $value1 > $value2 ? $value1 : $value2;
    }
}

if (!function_exists('math_min_zero')) {
    function math_min_zero(int $value): int
    {
        return $value > 0 ? $value : 0;
    }
}
