<?php

use App\Models\User\User;
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
        session()->forget('avatar');
        session()->forget('avatarDefault');
    }
}

if (!function_exists('user_login')) {
    function user_login(): bool
    {
        $sessions = session()->has('email') && session()->has('id') && session()->has('avatar') && session()->has('avatarDefault');
        $findUser = User::where('email', session('email'))->where('id', session('id'))->first() !== null;

        return $sessions && $findUser;
    }
}

if (!function_exists('user_admin')) {
    function user_admin(): bool
    {
        $findUser = User::where('email', session('email'))->first()->admin;

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
