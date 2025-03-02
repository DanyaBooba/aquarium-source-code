@extends('layouts.main.main')

@section('page.title', __('Технологии Аквариума — стек и инструменты платформы'))
@section('page.ogtitle', __('Технологии Аквариума — стек и инструменты платформы'))
@section('page.desc', __('Узнайте, какие технологии используются в Аквариуме. Подробная информация о стеке и
    инструментах платформы.'))
@section('page.ogdesc', __('Узнайте, какие технологии используются в Аквариуме. Подробная информация о стеке и
    инструментах платформы.'))

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
    @endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <x-page.title-anchor />
        </div>
        <div class="col-7 p-3">
            <h1>{{ __('Технологии') }}</h1>
            <p class="fs-5">
                {{ __('Технологии предназначенны для обеспечения удобства использования, повышения функциональности и возможности масштабирования приложения.') }}
            </p>
            <h2>{{ __('Laravel') }}</h2>
            <p>
                {{ __('Laravel, как современный и мощный фреймворк, обеспечивает разработку функционального и безопасного frontend и backend для проекта. Он используется для построения надежной архитектуры и обработки веб-запросов.') }}
            </p>
            <p>
                {{ __('Использование Laravel способствует повышению эффективности разработки и обеспечивает более высокую безопасность проекта.') }}
            </p>
            <h2>{{ __('Bootstrap') }}</h2>
            <p>
                {{ __('Использование Bootstrap обеспечивает разработку гибкого и адаптивного frontend. Улучшение пользовательского контента и визуального оформления проекта, обеспечение адаптивности для различных устройств.') }}
            </p>
            <h2>{{ __('OAuth') }}</h2>
            <p>
                {{ __('Использование протокола OAuth обеспечивает быстрый и безопасный вход пользователей в систему. OAuth позволяет сильно упростить авторизацию в собственный аккаунт посредством использования аккаунтов из других сервисов.') }}
            </p>
        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
