<?php

if (!function_exists('send_mail_register')) {
    function send_mail_register(string $email, string $nameService = '', string $password = ''): bool
    {
        $subject = 'Добро пожаловать в Аквариум';

        $message = '<b>Добро пожаловать в Аквариум</b>. Мы рады приветствовать вас среди пользователей.<br><br>';
        $message .= 'Аквариум – это платформа для социального взаимодействия, ведения профиля и создания записей.<br><br>';
        $message .= 'В Аквариуме у вас есть возможность создавать посты.<br><br>';
        $message .= 'Вы можете кастомизировать профиль (Настройки > Персонализация).<br><br>';
        $message .= 'Для вашего комфорта, вы можете выбрать подходящую для вас тему (Настройки > Темы).<br><br>';
        $message .= 'Также мы ведем Телеграм-канал, где сообщаем о всех изменениях и нововведениях: ' .
            '<a href="https://aquariumsocial.t.me">aquariumsocial.t.me</a>' . '<br><br>';

        if ($nameService) {
            $message .= '<br><br>Ниже представлена информация о профиле, для входа в который был использован сервис: <br><br>';
            $message .= 'Для регистрации вы использовали сервис ' . '«' . __($nameService) . '»' . '<br><br>';
            $message .= 'Ваш пароль: ' .  $password . '<br><br>';
            $message .= 'После входа рекомендуем сменить пароль (Настройки > Профиль > Сменить пароль).<br><br><br><br>';
        }

        $message .= 'Желаем вам приятно провести время в уютной атмосфере. В случае пожеланий, можете сообщать их Администрации Аквариума: ' .
            '<a href="mailto:daniil@dybka.ru">daniil@dybka.ru</a>' . '<br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
