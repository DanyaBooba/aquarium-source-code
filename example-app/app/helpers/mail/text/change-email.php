<?php

if (!function_exists('send_mail_change_email')) {
    function send_mail_change_email(string $email, string $newEmail, bool $needSendNotification = false): bool
    {
        $subject = 'Смена почты аккаунта';

        $message = '<b>Смена почты аккаунта</b>. Мы обнаружили запрос на смену почты.<br><br>';
        $message .= 'Данная почта более не может быть использована для входа в аккаунт.<br><br>';
        $message .= 'Новая почта для входа в аккаунт: ' . $newEmail . '<br><br>';
        $message .= 'Если считаете, что произошла ошибка — свяжитесь с Администрацией Аквариума: ' .
            '<a href="mailto:daniil@dybka.ru">daniil@dybka.ru</a>';

        $sendMail = send_mail($email, $subject, $message);

        if ($needSendNotification) {
            send_notification($subject, $message);
        }

        return $sendMail;
    }
}
