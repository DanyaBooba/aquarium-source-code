<?php

if (!function_exists('user_default_settings')) {
    function user_default_settings()
    {
        return (object) [
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ];
    }
}
