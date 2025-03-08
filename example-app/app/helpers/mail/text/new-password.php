<?php

if (!function_exists('send_mail_new_password')) {
    function send_mail_new_password(string $email, bool $needSendNotification = false): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = info_date_send_mail();
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Был сменен пароль аккаунта';

        $message = '<b>Был сменен пароль аккаунта</b>. Мы обнаружили запрос на смену пароля аккаунта.<br><br>';
        $message .= 'Время запроса: ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= 'Если считаете, что произошла ошибка — свяжитесь с Администрацией Аквариума: ' .
            '<a href="mailto:daniil@dybka.ru">daniil@dybka.ru</a>' . '<br><br>';

        $sendMail = send_mail($email, $subject, $message);

        if ($needSendNotification) {
            send_notification($subject, $message);
        }

        return $sendMail;
    }
}
