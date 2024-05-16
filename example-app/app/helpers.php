<?php

use App\Models\User\User;
use App\Models\User\Verify;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// Links

if (!function_exists('header_route_active_link')) {
    function header_route_active_link(string $name): string
    {
        return route_active_link($name);
    }
}

if (!function_exists('header_route_visible_link')) {
    function header_route_visible_link(string $name): string
    {
        return route_active_link($name, "active", "display-none");
    }
}

if (!function_exists('route_active_link')) {
    function route_active_link(string $name, string $active = "active", string $inactive = ""): string
    {
        return Route::is($name) ? $active : $inactive;
    }
}

if (!function_exists('footer_locale_active_link')) {
    function footer_locale_active_link(string $locale): string
    {
        return locale_active_link($locale, "footer__social_active");
    }
}

if (!function_exists('settings_locale_active_link')) {
    function settings_locale_active_link(string $locale): string
    {
        return locale_active_link($locale, "settings-current-locale", "settings-locale");
    }
}

if (!function_exists('settings_theme_active_link')) {
    function settings_theme_active_link(string $theme, bool $is_light): string
    {
        return session($is_light ? "theme" : "theme_dark") === $theme ? "settings-devices" : "settings-profile";
    }
}

if (!function_exists('locale_active_link')) {
    function locale_active_link(string $locale, string $active = "active", string $inactive = ""): string
    {
        return App::currentLocale() === $locale ? $active : $inactive;
    }
}

// Account

if (!function_exists('exit_account')) {
    function exit_account()
    {
        session()->forget('id');
        session()->forget('email');
    }
}

if (!function_exists('user_login')) {
    function user_login(): bool
    {
        $sessions = session()->has('email') && session()->has('id');
        $findUser = User::where('email', session('email'))->where('id', session('id'))->first() !== null;

        return $sessions && $findUser;
    }
}

if (!function_exists('user_verify')) {
    function user_verify(): bool
    {
        $findUser = User::where('email', session('email'))->where('id', session('id'))->first();

        return $findUser->verified;
    }
}

if (!function_exists('user_admin')) {
    function user_admin(): bool
    {
        $findUser = User::where('email', session('email'))->first()->usertype == 100;
        return $findUser;
    }
}

if (!function_exists('user_image_exist')) {
    function user_image_exist(string $path): string
    {
        return image_exist($path, "/img/user/logo/MAN1.png");
    }
}

if (!function_exists('user_cap_image_exist')) {
    function user_cap_image_exist(string $path): string
    {
        return image_exist($path, "/img/user/bg/BG1.jpg");
    }
}

if (!function_exists('isset_value')) {
    function isset_value($value, $default)
    {
        return !empty($value) ? $value : $default;
    }
}

if (!function_exists('image_exist')) {
    function image_exist(string $path, string $default): string
    {
        return file_exists(public_path() . $path) ? $path : $default;
    }
}

if (!function_exists('profile_text_info')) {
    function profile_text_info(int $number): string
    {
        $text = $number;

        if ($number > 9_999 && $number < 1_000_000) {
            $text = intdiv($number, 1_000) . "K";
        } else if ($number > 999_999) {
            $text = intdiv($number, 1_000_000) . "M";
        }

        return $text;
    }
}

if (!function_exists('profile_display_name')) {
    function profile_display_name($firstName = "", $lastName = ""): string
    {
        if (empty($firstName) && empty($lastName)) {
            return "<безымянный>";
        } else {
            return $firstName . " " . $lastName;
        }
    }
}

if (!function_exists('get_user')) {
    function get_user($user, $local = false)
    {
        $profile = $user;

        $profile->name = profile_display_name($user->firstName, $user->lastName);
        $profile->subs = isset_value($user->subs, 0);
        $profile->sub = isset_value($user->sub, 0);
        $profile->achivs = isset_value($user->achivs, 0);
        $profile->local = $local;
        $profile->status = $user->verified ? "active" : "needConfirm";

        return $profile;
    }
}

if (!function_exists('get_user_search')) {
    function get_user_search($user)
    {
        $profile = (object) [
            'id' => $user->id,
            'name' => profile_display_name($user->firstName, $user->lastName),
            'username' => $user->username,
            'desc' => $user->desc,
            'avatar' => $user->avatar,
            'avatarDefault' => $user->avatarDefault,
            'sub' => random_int(0, 1),
            'male' => true,
        ];

        return $profile;
    }
}

if (!function_exists('user_settings_active_image_avatar')) {
    function user_settings_active_image_avatar($number, $current): string
    {
        return user_settings_active_image(true, $number, $current);
    }
}

if (!function_exists('user_settings_active_image_cap')) {
    function user_settings_active_image_cap($number, $current): string
    {
        return user_settings_active_image(false, $number, $current);
    }
}

if (!function_exists('user_settings_active_image')) {
    function user_settings_active_image(bool $isavatar, int $number, string $current): string
    {
        if ($isavatar) {
            return $number == substr($current, 3) ? "checked" : "";
        } else {
            return $number == substr($current, 2) ? "checked" : "";
        }
    }
}

if (!function_exists('user_settings_notifications')) {
    function user_settings_notifications(bool $value): string
    {
        return $value ? "checked" : "";
    }
}

// Words

if (!function_exists('use_form_word')) {
    function use_form_word(int $number, string $form1, string $form2, string $form3): string
    {
        $num = abs($number) % 100;
        $num_x = $number % 10;

        if ($num > 10 && $num < 20)   return $form3;
        if ($num_x > 1 && $num_x < 5) return $form2;
        if ($num_x == 1)              return $form1;

        return $form3;
    }
}

// Min Max

if (!function_exists('math_min')) {
    function math_min(int $value1, int $value2): int
    {
        return $value1 < $value2 ? $value1 : $value2;
    }
}

if (!function_exists('math_max')) {
    function math_max(int $value1, int $value2): int
    {
        return $value1 > $value2 ? $value1 : $value2;
    }
}

if (!function_exists('math_min_zero')) {
    function math_min_zero(int $value): int
    {
        return $value > 0 ? $value : 0;
    }
}

// VERIFY

if (!function_exists('set_new_verify')) {
    function set_new_verify()
    {
        $findUser = User::where('email', session('email'))->first();

        if ($findUser === null) return;

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

if (!function_exists('send_mail_login')) {
    function send_mail_register(string $email, string $nameService = ''): bool
    {
        date_default_timezone_set('Europe/Moscow');

        $subject = 'Регистрация аккаунта';

        $message = '<b>Добро пожаловать в Аквариум</b>. Мы рады приветствовать вас среди пользователей<br><br>';
        if ($nameService) {
            $message .= 'Для регистрации вы использовали сервис «' . $nameService . '»';
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

        $message = '<b>Требуется подтвердить почту аккаунта</b>. Сейчас другие пользователи не видят ваш профиль<br><br>';
        $message .= 'Ссылка для подтверждение почты аккаунта: <br><br>';
        $message .= $link;

        $sendMail = send_mail($email, $subject, $message);

        return $sendMail;
    }
}

if (!function_exists('send_mail_restore_password')) {
    function send_mail_restore_password(string $email, string $link): bool
    {
        $subject = 'Восстановление пароля';

        $message = '<b>Была запрошена ссылка на восстановление пароля</b><br><br>';
        $message .= $link . '<br><br>';
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

        $message = '<b>Была запрошена ссылка на ввод нового пароля: </b><br><br>';
        $message .= $link . '<br><br>';
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

if (!function_exists('send_mail_login')) {
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
