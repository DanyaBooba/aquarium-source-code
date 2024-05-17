<?php

if (!function_exists('send_mail_after_new_password')) {
    function send_mail_after_new_password(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = date("d/m/Y") . ' в ' . date("H:i:s") . ' UTC';
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Изменен пароль';

        $message = '<b>Изменен пароль</b>. Мы обнаружили измение пароля ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= '<b>Если это были не вы</b>, смените пароль аккаунта (Настройки > Профиль > Сменить пароль)';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
