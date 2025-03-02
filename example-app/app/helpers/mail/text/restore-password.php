<?php

if (!function_exists('send_mail_restore_password')) {
    function send_mail_restore_password(string $email, string $link): bool
    {
        $subject = 'Восстановление пароля';
        $routeLink = route('auth.restore.enter', $link);

        $message = '<b>Восстановление пароля</b>. Была запрошена ссылка на восстановление пароля.<br><br>';
        $message .= 'Перейдите по ссылке, чтобы продолжить восстановление пароля: <br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на восстановление пароля.<br><br>';
        $message .= 'Администрация Аквариума не запрашивает коды и ссылки, которые приходят в сообщениях.<br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
