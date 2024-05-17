<?php

if (!function_exists('send_mail_register')) {
    function send_mail_register(string $email, string $nameService = '', string $password = ''): bool
    {
        date_default_timezone_set('Europe/Moscow');

        $subject = 'Регистрация аккаунта';

        $message = '<b>Добро пожаловать в Аквариум</b>.<br><br> Мы рады приветствовать вас среди пользователей<br><br>';
        if ($nameService) {
            $message .= 'Для регистрации вы использовали сервис «' . $nameService . '»<br><br>';
            $message .= 'Ваш пароль: <b>' . $password . '</b>';
        }

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
