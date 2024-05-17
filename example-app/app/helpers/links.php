<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('header_route_active_link')) {
    function header_route_active_link(string $name): string
    {
        return route_active_link($name);
    }
}

if (!function_exists('profile_route_active_link')) {
    function profile_route_active_link(string $name): string
    {
        return route_active_link($name, "#", route($name));
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
