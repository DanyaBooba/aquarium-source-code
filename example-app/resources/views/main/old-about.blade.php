@extends('layouts.main.simple')

@section('page.title', __('Аквариум — создай свой профиль и начни общаться'))
@section('page.ogtitle', __('Аквариум — создай свой профиль и начни общаться'))
@section('page.desc',
    __('Присоединяйтесь к Аквариуму, кастомизируйте профиль, выбирайте цветовые темы, делитесь
    записями и находите друзей. Зарегистрируйтесь сейчас в один клик.'))
@section('page.ogdesc',
    __('Присоединяйтесь к Аквариуму, кастомизируйте профиль, выбирайте цветовые темы, делитесь
    записями и находите друзей. Зарегистрируйтесь сейчас в один клик.'))

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lending/include.css') }}" />
    @endpush

@section('simple.content')
    <div class="main-lending" style="max-width: 800px">
        <a href="/" aria-label="Перейти в Аквариум">
            <x-lending.logo />
        </a>
        <p class="text-center mt-4 fs-3" id="js-change" style="height: 42px">
            {{ __('Пространство для творчества') }}
        </p>
    </div>
    <div class="row" style="margin-top: 6rem;">
        <div class="col">
            <p class="display-1">🐠</p>
            <p class="fs-5" style="line-height: 180%">
                {!! __('Аквариум — это публикация постов и ведение профиля.') !!}
            </p>
        </div>
        <div class="col text-center">
            <p class="display-1">🎨</p>
            <p class="fs-5" style="line-height: 180%">
                {!! __('Меняйте свой профиль по вкусу.') !!}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="display-1">🥳</p>
            <p class="fs-5" style="line-height: 180%">
                {!! __('Адаптация для десктопа, мобильных, поддержка людей с ОВЗ, светлая и темная тема.') !!}
            </p>
        </div>
        <div class="col text-center">
            <p class="display-1">👫</p>
            <p class="fs-5" style="line-height: 180%">
                {{ __('Аудитория более 100 человек.') }}
            </p>
        </div>
    </div>
    <div style="margin-top: 5rem">
        <h2 class="display-2 mb-4">{{ __('Статистика') }}</h2>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" viewBox="0 0 24 24" fill="none"
                        stroke="var(--text-success)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg> <span class="display-3 text-success" style="margin-top: .5rem">100</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('человек зарегистрировано') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" viewBox="0 0 24 24" fill="none"
                        stroke="var(--text-success)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <polyline points="10 17 15 12 10 7" />
                        <line x1="15" x2="3" y1="12" y2="12" />
                    </svg> <span class="display-3 text-success" style="margin-top: .5rem">5&#x2009;000</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('просмотров страниц за год') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" viewBox="0 0 24 24" fill="none"
                        stroke="var(--text-success)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-calendar-heart">
                        <path d="M3 10h18V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7" />
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <path
                            d="M21.29 14.7a2.43 2.43 0 0 0-2.65-.52c-.3.12-.57.3-.8.53l-.34.34-.35-.34a2.43 2.43 0 0 0-2.65-.53c-.3.12-.56.3-.79.53-.95.94-1 2.53.2 3.74L17.5 22l3.6-3.55c1.2-1.21 1.14-2.8.19-3.74Z" />
                    </svg><span class="display-3 text-success" style="margin-top: .5rem">50</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('подписчиков Телеграм-канала') }}</span>
            </h3>
        </div>
    </div>
    <div style="margin-top: 5rem">
        <h2 class="display-2 mb-4">{{ __('Планы на 2026 год') }}</h2>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="container-simple-numbers-text">{{ __('Автоматическое') }}</span>
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Тестирование') }}</span>
                </span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Доступность') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('для лиц с ОВЗ') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Сообщения') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('в Аквариуме') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Android/iOS') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('приложения') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('OAuth') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('Аквариума') }}</span>
            </h3>
        </div>
    </div>
    <div style="margin-top: 5rem">
        <h2 class="display-2 mb-4">{{ __('Уже реализовано') }}</h2>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="container-simple-numbers-text">{{ __('новые') }}</span>
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('цветовые темы') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('в размере 20 штук') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Обновленный') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('интерфейс') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="container-simple-numbers-text">{{ __('переход на архитектуру') }}</span>
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Laravel') }}</span>
                </span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('API') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('интерфейс') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('OAuth') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('авторизация') }}</span>
            </h3>
        </div>
        <div class="py-3">
            <h3 class="d-flex flex-wrap flex-column">
                <span class="d-flex align-items-center container-simple-numbers">
                    <span class="display-3 text-success">{{ __('Записи') }}</span>
                </span>
                <span class="container-simple-numbers-text">{{ __('пользователей') }}</span>
            </h3>
        </div>
    </div>
    <div style="margin-top: 6rem; margin-bottom: 4rem">
        {{-- <a href="{{ route('main') }}" class="fs-4 text-decoration-none d-flex justify-content-center align-items-center">
            {{ __('Перейти в Аквариум') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="ms-2" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-external-link">
                <path d="M15 3h6v6" />
                <path d="M10 14 21 3" />
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
            </svg>
        </a> --}}
        <button class="btn btn-light btn-design-lending" onClick="buttonOpenURL('{{ route('auth.signin') }}')">
            {{ __('Перейти в Аквариум') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="ms-2" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-external-link">
                <path d="M15 3h6v6" />
                <path d="M10 14 21 3" />
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
            </svg>
        </button>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/about/change-text.js') }}"></script>
@endpush
