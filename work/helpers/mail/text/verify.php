<?php

if (!function_exists('send_mail_verify')) {
    function send_mail_verify(string $email, string $link): bool
    {
        $subject = __('Подтверждение аккаунта');
        $routeLink = route('verify.code', $link);

        $message = __('<b>Требуется подтвердить аккаунт</b>.') . '<br><br> ' . __('Сейчас другие пользователи не видят ваш профиль') . '<br><br>';
        $message .= __('Ссылка для подтверждение аккаунта: ') . '<br><br>';
        $message .= $routeLink;

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
