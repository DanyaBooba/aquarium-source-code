<?php

if (!function_exists('send_mail_delete')) {
    function send_mail_delete(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = info_date_send_mail();
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Удаление аккаунта';

        $message = '<b>Удаление аккаунта</b>. Мы обнаружили запрос на удаление аккаунта Аквариум.<br><br>';
        $message .= 'Время запроса: ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= 'Нам искренне жаль прощаться с вами, мы всегда рады видеть вас снова.<br><br>';
        $message .= 'Спасибо, что были с Аквариумом!';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
