<?php

if (!function_exists('send_mail_login_by_code')) {
    function send_mail_login_by_code(string $email, string $code): bool
    {
        $subject = 'Авторизация через код';

        $message = '<b>Авторизация через код</b>. Мы обнаружили запрос на вход в аккаунт при помощи кода.<br><br>';
        $message .= 'Введите данный код в соответствующее поле: <br><br>';
        $message .= '<b>' . $code . '</b><br><br>';
        $message .= 'Данный код активен в течение 15 минут с момента создания.<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали код для входа в аккаунт.<br><br>';
        $message .= 'Администрация Аквариума не запрашивает коды и ссылки, которые приходят в сообщениях.';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}
