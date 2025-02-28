<?php

use App\Models\SessionUser;

if (!function_exists('session_create')) {
    function session_create($id, $email)
    {
        $tryGetSession = session_get();

        if ($tryGetSession != null) return $tryGetSession;

        $paramsSession = [
            'token' => session_generate($email, $id, 'token'),
            'refreshToken' => session_generate($email, $id, 'refreshToken'),
        ];

        $timelifeSession = 21 * 86_400; // брать параметр от настроек пользователя!

        SessionUser::query()->create([
            'idUser' => $id,
            'token' => $paramsSession['token'],
            'refreshToken' => $paramsSession['refreshToken'],
            'unixtime_start' => time(),
            'unixtime_stop' => time() + $timelifeSession,
        ]);

        return $paramsSession['token'];
    }
}
