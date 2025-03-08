<?php

use App\Models\User\Notification;

if (!function_exists('send_notification')) {
    function send_notification(string $title, string $message): bool
    {
        $title .= ' · Аквариум';

        $profile = user_profile();

        Notification::query()->create([
            'active' => true,
            'iduser' => $profile->id,
            'title' => $title,
            'message' => $message,
            'unixtime' => time(),
        ]);

        session([
            'notificationsUnread' => 'true'
        ]);

        return true;
    }
}
