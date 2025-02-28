<?php

use App\Models\SessionUser;

if (!function_exists('session_get')) {
    function session_get()
    {
        $sessionToken = session('sessionToken');

        dd($sessionToken);

        if ($sessionToken == null) {
            return null;
        }

        $dataSession = SessionUser::where('token', $sessionToken)->first();

        $diff = time() - $dataSession->unixtime_stop;

        if ($diff >= 0) {
            $dataSession->delete();
        }

        return $dataSession;
    }
}
