<?php

if (!function_exists('get_image_size_from_base64')) {
    function get_image_size_from_base64(string $data)
    {
        return intval(strlen(base64_decode($data)) / 1024);
    }
}
