<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ env('APP_URL') }}/favicon.ico">
    <link rel="icon" type="image/svg+xml" href="{{ env('APP_URL') }}/favicon.svg">
    <link rel="apple-touch-icon" href="{{ env('APP_URL') }}/favicon.svg">
    <link rel="manifest" href="{{ env('APP_URL') }}/manifest.webmanifest">
    <link rel="manifest" href="{{ env('APP_URL') }}/manifest.json">

    <meta name="theme-color" content="#8D77FE" />

    <title>@yield('page.title', env('APP_TITLE'))</title>
    <meta name="description" content="@yield('page.desc', env('APP_DESC'))">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="Author" content="Даниил Дыбка">

    <meta property="og:title" content="@yield('page.ogtitle', env('APP_TITLE'))">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Аквариум — социальная сеть для самовыражения и общения">
    <meta property="og:description" content="@yield('page.ogdesc', env('APP_DESC'))">
    <meta property="og:url" content="https://aquariumsocial.ru">
    <meta property="og:image" content="https://aquariumsocial.ru/@yield('page.ogimage', 'img/logo/cap.png')">
    <link rel="canonical" href="https://aquariumsocial.ru">

    <meta name="googlebot" content="index,follow">
    {{-- <meta name="google" content="nositelinkssearchbox"> --}}
    <meta name="format-detection" content="phone=no, address=no">

    <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script>
    <script>
        if (matchMedia("(prefers-color-scheme: dark)").media === "not all") {
            document.documentElement.style.display = "none";
            document.head.insertAdjacentHTML(
                "beforeend",
                '<link rel="stylesheet" href="/app/css/light.css" onload="document.documentElement.style.display=\'\'">'
            );
        }
    </script>

    <meta name="color-scheme" content="light dark">

    @stack('meta')

    <link rel="stylesheet"
        href="{{ asset('css/@@light/light-' . (session('theme') ? session('theme') : 'default') . '.css') }}"
        media="(prefers-color-scheme: light)" id="stylesheetlight">
    <link rel="stylesheet" href="{{ asset('css/@@light/light.css') }}"
        media="(prefers-color-scheme: light)" id="stylesheetlight_base">

    <link rel="stylesheet"
        href="{{ asset('css/@@dark/dark-' . (session('theme_dark') ? session('theme_dark') : 'default') . '.css') }}"
        media="(prefers-color-scheme: dark)" id="stylesheetdark">
    <link rel="stylesheet" href="{{ asset('css/@@dark/dark.css') }}"
        media="(prefers-color-scheme: dark)" id="stylesheetdark_base">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vars.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    @stack('css')

    <x-head.metrix />
</head>

@yield('body')

<script src="{{ asset('js/main/button.js') }}"></script>
<script src="{{ asset('js/main/get-theme.js') }}"></script>
<script src="{{ asset('js/main/theme-color-change.js') }}"></script>
<script src="{{ asset('js/main/change-theme.js') }}"></script>

@stack('js')

</html>
