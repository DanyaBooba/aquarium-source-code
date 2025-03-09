<?php

if (!function_exists('send_mail_verify')) {
    function send_mail_verify(string $email, string $link): bool
    {
        $subject = 'Подтверждение аккаунта';
        $routeLink = route('verify.code', $link);

        $message = '<b>Подтверждение аккаунта</b>. Был обнаружен запрос на подтверждение аккаунта.<br><br>';
        $message .= 'Ссылка для подтверждение аккаунта:<br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= 'Чтобы вы могли пользоваться профилем, необходимо подтвердить аккаунт.<br><br>';
        $message .= '<b>Если это были не вы</b>, проигнорируйте данное сообщение.';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
