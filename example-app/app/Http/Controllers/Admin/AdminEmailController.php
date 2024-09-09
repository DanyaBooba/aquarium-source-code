<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class AdminEmailController extends Controller
{
    public function google_block_1()
    {
        $usersWithGoogle = User::select('email')->where('verified', 1)->where('serviceLogin', 'go')->get();

        $message = "<b>С 1 октября 2024 года будет отключена авторизация при помощи сервиса Google.</b><br><br>";
        $message .= "Данные изменения происходят в связи с законом РФ \"Об информации, информационных технологиях и защите информации\".<br><br>";
        $message .= "Настоятельно просим Вас убедиться в том, что после 1 октября 2024 года Вы не потеряете доступ к аккаунту.<br><br>";
        $message .= "Для этого запомните почту, на которую пришло данное сообщение, так как именно данная почта является действующем в Вашем аккаунте.<br><br>";
        $message .= "Предлагаем альтернативны способы войти в аккаунт:<br><br>";
        $message .= "<b>По паролю</b>. Для этого его потребуется восстановить: Войти > Почта > Проблемы со входом? > Восстановить пароль или Настройки > Профиль > Сменить пароль.<br><br>";
        $message .= "<b>Используя код</b>. Войти > Почта > Проблемы со входом? > Войти по коду.<br><br>";
        $message .= "С уважением, администрация Аквариума.";

        foreach ($usersWithGoogle as $email) {
            send_mail($email["email"], 'Важное уведомление об авторизации', $message);
        }

        send_mail("danil.dybko@gmail.com", 'Важное уведомление об авторизации', $message);

        return "200";
    }
}
