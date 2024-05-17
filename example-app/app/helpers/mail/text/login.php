<?php

if (!function_exists('send_mail_login')) {
    function send_mail_login(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = date("d/m/Y") . ' в ' . date("H:i:s") . ' UTC';
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Авторизация в аккаунт';

        $message = '<b>Вход с нового устройства</b>. Мы обнаружили вход с нового устройства ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= '<b>Если это были не вы</b>, смените пароль аккаунта (Настройки > Профиль > Сменить пароль)';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
