<?php

use App\Models\User\User;
use App\Models\User\Verify;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// User

require_once "helpers/user/get-user.php";
require_once "helpers/user/auth.php";

// Another

require_once "helpers/links.php";
require_once "helpers/form-word.php";
require_once "helpers/math.php";

// Info

require_once "helpers/user/info/profile.php";
require_once "helpers/user/info/settings.php";

// VERIFY

if (!function_exists('set_new_verify')) {
    function set_new_verify(): string
    {
        $findUser = User::where('email', session('email'))->first();

        if ($findUser === null) return '';

        $findCode = Verify::where('email', session('email'))->where('iduser', session('id'))->first();

        $unixtime = time();
        $code = random_string(20) . $unixtime . random_string(20) . session('id');

        if ($findCode === null) {
            Verify::query()->create([
                'iduser' => session('id'),
                'email' => session('email'),
                'code' => $code,
                'unixtime' => $unixtime,
            ]);
        } else {
            $findCode->unixtime = $unixtime;
            $findCode->code = $code;
            $findCode->save();
        }

        return $code;
    }
}

if (!function_exists('random_string')) {
    function random_string(int $length): string
    {
        if ($length <= 0) return "";

        $permitted = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($permitted);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $permitted[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}

if (!function_exists('random_code')) {
    function random_code(int $length): int
    {
        if ($length <= 0) return 0;

        $code = rand(pow(10, $length - 1), pow(10, $length) - 1);

        return $code;
    }
}

if (!function_exists('login_for_test_account')) {
    function login_for_test_account()
    {
        $findTest = User::where('email', 'testaccount')->first();

        if ($findTest === null) {
            $findTest = User::query()->create([
                'verified' => 1,
                'email' => 'testaccount',
                'password' => '',
                'avatar' => 'MAN6',
                'cap' => 'BG3',
                'usertype' => -1,
                'firstName' => 'Даниил',
                'lastName' => 'Иванов',
                'desc' => 'Описание профиля.',
            ]);

            //
        }

        session(['id' => $findTest->id]);
        session(['email' => 'testaccount']);
    }
}

// mails

if (!function_exists('send_mail')) {
    function send_mail(string $email, string $subject, string $message): bool
    {
        $subject .= ' | Аквариум';
        $headers = 'Content-type: text/html';

        mail($email, $subject, $message, $headers);

        return true;
    }
}

// php artisan queue:work
// Queue::push('SendEmail', array('message' => $message));

// $date = Carbon::now()->addMinutes(10);
// Queue::later($date, 'SendEmail@send', array('message' => $message));

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

if (!function_exists('send_mail_login')) {
    function send_mail_login(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = date("d/m/Y") . ' в ' . date("H:i:s") . ' UTC';
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Авторизация в аккаунт';

        $message = '<b>Вход с нового устройства</b>. Мы обнаружили вход с нового устройства ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= '<b>Если это были не вы</b>, смените пароль аккаунта (Настройки > Профиль > Сменить пароль)';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

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

if (!function_exists('send_mail_restore_password')) {
    function send_mail_restore_password(string $email, string $link): bool
    {
        $subject = 'Восстановление пароля';
        $routeLink = route('auth.restore.enter', $link);

        $message = '<b>Была запрошена ссылка на восстановление пароля</b><br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на восстановление пароля <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

if (!function_exists('send_mail_login_by_code')) {
    function send_mail_login_by_code(string $email, string $code): bool
    {
        $subject = 'Вход по коду';

        $message = '<b>Код для входа в аккаунт: </b><br><br>';
        $message .= $code . '<br><br>';
        $message .= 'Введите данный код в поле для входа в аккаунт<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали код для входа в аккаунт <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

if (!function_exists('send_mail_new_password')) {
    function send_mail_new_password(string $email, string $link): bool
    {
        $subject = 'Ввод нового пароля';
        $routeLink = $link;

        $message = '<b>Была запрошена ссылка на ввод нового пароля: </b><br><br>';
        $message .= $routeLink . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на ввод нового пароля <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

if (!function_exists('send_mail_after_new_password')) {
    function send_mail_after_new_password(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = date("d/m/Y") . ' в ' . date("H:i:s") . ' UTC';
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Изменен пароль';

        $message = '<b>Изменен пароль</b>. Мы обнаружили измение пароля ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= '<b>Если это были не вы</b>, смените пароль аккаунта (Настройки > Профиль > Сменить пароль)';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

if (!function_exists('send_mail_delete')) {
    function send_mail_delete(string $email): bool
    {
        date_default_timezone_set('Europe/Moscow');
        $date = date("d/m/Y") . ' в ' . date("H:i:s") . ' UTC';
        $device = info_device_send_mail();
        $place = info_place_send_mail();

        $subject = 'Удаление аккаунта';

        $message = '<b>Удаление аккаунта Аквариум</b>. Мы обнаружили запрос на удаление аккаунта Аквариум ' . $date . '<br><br>';
        $message .= 'Устройство: ' . $device . '<br><br>';
        $message .= 'Место: ' . $place . '<br><br>';
        $message .= '<b>Нам жаль прощаться с вами</b>, мы всегда рады видеть вас снова';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

if (!function_exists('send_mail_change_email')) {
    function send_mail_change_email(string $email, string $link): bool
    {
        $subject = 'Изменение почты';

        $message = '<b>Была запрошена ссылка на изменение почты: </b><br><br>';
        $message .= $link . '<br><br>';
        $message .= 'Проигнорируйте данное сообщение, если вы не запрашивали ссылку на изменение почты <br><br>';

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

// mails helpers

if (!function_exists('info_device_send_mail')) {
    function info_device_send_mail(): string
    {
        $device = 'Аквариум ' . info_device_platform_send_mail() . ', ' . getallheaders()["User-Agent"];
        return $device;
    }
}

if (!function_exists('info_device_platform_send_mail')) {
    function info_device_platform_send_mail(): string
    {
        $mobilePlatform = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

        $system = (object) [
            'windows' => is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")),
            'android' => is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")),
            'ios' => is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")) || is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")),
        ];

        if ($system->ios) {
            return 'iOS';
        } elseif ($system->android) {
            return 'Android';
        } elseif ($system->windows) {
            return 'Windows';
        }

        if (!$mobilePlatform) {
            return 'Desktop';
        } else {
            return 'Mobile';
        }
    }
}

if (!function_exists('info_place_send_mail')) {
    function info_place_send_mail(): string
    {
        $ch = curl_init('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'] . '?lang=ru');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = (object) json_decode($result, true);

        if ($result->status === 'success') {
            $place = $result->country . ', ' . $result->city . ' (ip: ' . info_place_ip_send_mail() . ')';
        } else {
            $place = info_place_ip_send_mail();
        }

        return $place;
    }
}

if (!function_exists('info_place_ip_send_mail')) {
    function info_place_ip_send_mail(): string
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }

        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            return $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            return $forward;
        } else {
            return $remote;
        }
    }
}
