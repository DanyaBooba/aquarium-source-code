<?php

use App\Models\User\User;
use \App\Models\User\Verify;

if (!function_exists('set_new_verify')) {
    function set_new_verify(): string
    {
        $findUser = user_profile();

        if ($findUser === null) return '';

        $findCode = Verify::where('email', session('email'))->where('iduser', session('id'))->first();

        $unixtime = time();
        $code = random_string(20) . $unixtime . random_string(20) . session('id');

        if ($findCode === null) {
            Verify::query()->create([
                'iduser' => session('id'),
                'email' => session('email'),
                'code' => $code,
                'unixtime' => $unixtime,
            ]);
        } else {
            $findCode->unixtime = $unixtime;
            $findCode->code = $code;
            $findCode->save();
        }

        return $code;
    }
}
