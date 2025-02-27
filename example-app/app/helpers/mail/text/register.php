<?php

if (!function_exists('send_mail_register')) {
    function send_mail_register(string $email, string $nameService = '', string $password = ''): bool
    {
        date_default_timezone_set('Europe/Moscow');

        $subject = __('Добро пожаловать в Аквариум!');

        $message = __('<b>Добро пожаловать в Аквариум!</b>.') . '<br><br> ' . __('Мы рады приветствовать вас среди пользователей') . '<br><br>';
        $message .= __('Аквариум – это платформа для социального взаимодействия между пользователями.') . '<br><br>';
        $message .= __('В Аквариуме вы можете кастомизировать свой профиль, подписываться на других людей и публиковать записи.') . '<br><br><br>';
        if ($nameService) {
            $message .= __('Для регистрации вы использовали сервис ') . __('«') . __($nameService) . __('»') . '<br><br>';
            $message .= __('Ваш пароль: ') . '<b>' . $password . '</b><br><br>';
            $message .= __('После входа рекомендуем сменить пароль (Настройки > Профиль > Сменить пароль)');
        }

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
