<?php

if (!function_exists('send_mail_new_password')) {
    function send_mail_new_password(string $email, string $link): bool
    {
        $subject = __('Восстановление пароля');
        $routeLink = $link;

        $message = __('<b>Была запрошена ссылка на восстановление пароля: </b>') . '<br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= __('Проигнорируйте данное сообщение, если вы не запрашивали ссылку на восстановление пароля') . '<br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
