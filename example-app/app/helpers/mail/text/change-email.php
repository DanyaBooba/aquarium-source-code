<?php

if (!function_exists('send_mail_change_email')) {
    function send_mail_change_email(string $email, string $link): bool
    {
        $subject = 'Изменение почты';

        $message = '<b>Была запрошена ссылка на изменение почты: </b><br><br>';
        $message .= $link . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на изменение почты <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
