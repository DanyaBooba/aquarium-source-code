<?php

if (!function_exists('send_mail_verify')) {
    function send_mail_verify(string $email, string $link): bool
    {
        $subject = 'Подтверждение аккаунта';
        $routeLink = route('user.tryverify', $link);

        $message = '<b>Требуется подтвердить почту аккаунта</b>.<br><br> Сейчас другие пользователи не видят ваш профиль<br><br>';
        $message .= 'Ссылка для подтверждение почты аккаунта: <br><br>';
        $message .= $routeLink;

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
