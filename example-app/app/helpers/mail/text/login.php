<?php

if (!function_exists('send_mail_login')) {
    function send_mail_login(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = info_date_send_mail();
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = __('Авторизация в аккаунт');

        $message = '<b>' . __('Вход с нового устройства') . '</b>. ' . __('Мы обнаружили вход с нового устройства ') . $date . '<br><br>';
        $message .= __('Устройство: ') . $device . '<br><br>';
        $message .= __('Место: ') . $place . '<br><br>';
        $message .= '<b>' . __('Если это были не вы') . '</b>, ' . __('смените пароль аккаунта (Настройки > Профиль > Сменить пароль)');

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
