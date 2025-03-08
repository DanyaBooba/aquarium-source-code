<?php

if (!function_exists('send_mail_login')) {
    function send_mail_login(string $email, bool $needSendNotification = false): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = info_date_send_mail();
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Авторизация в аккаунт';

        $message = '<b>Вход с нового устройства</b>. Мы обнаружили вход с нового устройства.<br><br>';
        $message .= 'Время входа: ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= '<b>Если это были не вы</b>, смените пароль аккаунта (Настройки > Профиль > Сменить пароль).';

        $sendMail = send_mail($email, $subject, $message);

        if ($needSendNotification) {
            send_notification($subject, $message);
        }

        return $sendMail;
    }
}
