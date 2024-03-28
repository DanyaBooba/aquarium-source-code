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
        session()->forget('login');
        session()->forget('email');
        session()->forget('avatar');
    }
}

if (!function_exists('user_login')) {
    function user_login(): bool
    {
        $sessions = session()->has('login') && session()->has('email') && session()->has('avatar') && session()->has('id');
        $findUser = User::where('email', session('email'))->first() !== null;

        return $sessions && $findUser;
    }
}

if (!function_exists('user_admin')) {
    function user_admin(): bool
    {
        return session()->has('admin');
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
