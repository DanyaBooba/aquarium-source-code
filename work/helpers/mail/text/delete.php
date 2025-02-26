<?php

if (!function_exists('send_mail_delete')) {
    function send_mail_delete(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = info_date_send_mail();
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = __('Удаление аккаунта');

        $message = __('<b>Удаление аккаунта Аквариум</b>. Мы обнаружили запрос на удаление аккаунта Аквариум ') . $date . '<br><br>';
        $message .= __('Устройство: ') . $device . '<br><br>';
        $message .= __('Место: ') . $place . '<br><br>';
        $message .= __('<b>Нам жаль прощаться с вами</b>, мы всегда рады видеть вас снова');

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
