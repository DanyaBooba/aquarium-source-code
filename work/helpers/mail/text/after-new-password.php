<?php

if (!function_exists('send_mail_after_new_password')) {
    function send_mail_after_new_password(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = info_date_send_mail();
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = __('Изменение пароля');

        $message = __('<b>Изменение пароля</b>. Мы обнаружили измение пароля ') . $date . '<br><br>';
        $message .= __('Устройство: ') . $device . '<br><br>';
        $message .= __('Место: ') . $place . '<br><br>';
        $message .= __('<b>Если это были не вы</b>, смените пароль аккаунта (Настройки > Профиль > Сменить пароль)');

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
