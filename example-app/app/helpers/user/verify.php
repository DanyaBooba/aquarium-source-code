<?php

use App\Models\User\User;
use \App\Models\User\Verify;

if (!function_exists('set_new_verify')) {
    function set_new_verify(): string
    {
        $findUser = user_profile();

        if ($findUser === null) return '';

        $verifies = Verify::where('email', session('email'))->where('iduser', session('id'))->get();

        foreach ($verifies as $ver) {
            $ver->delete();
        }

        $unixtime = time();
        $code = random_string(20) . $unixtime . random_string(20) . session('id');

        Verify::query()->create([
            'iduser' => session('id'),
            'email' => session('email'),
            'code' => $code,
            'unixtime' => $unixtime,
        ]);

        return $code;
    }
}
