<?php

if (!function_exists('send_mail_new_password')) {
    function send_mail_new_password(string $email, string $link): bool
    {
        $subject = 'Ввод нового пароля';
        $routeLink = $link;

        $message = '<b>Была запрошена ссылка на ввод нового пароля: </b><br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на ввод нового пароля <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
