<?php

if (!function_exists('send_mail_login_by_code')) {
    function send_mail_login_by_code(string $email, string $code): bool
    {
        $subject = 'Вход по коду';

        $message = '<b>Код для входа в аккаунт: </b><br><br>';
        $message .= $code . '<br><br>';
        $message .= 'Введите данный код в поле для входа в аккаунт<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали код для входа в аккаунт <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
