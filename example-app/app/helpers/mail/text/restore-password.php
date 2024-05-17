<?php

if (!function_exists('send_mail_restore_password')) {
    function send_mail_restore_password(string $email, string $link): bool
    {
        $subject = 'Восстановление пароля';
        $routeLink = route('auth.restore.enter', $link);

        $message = '<b>Была запрошена ссылка на восстановление пароля</b><br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на восстановление пароля <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
