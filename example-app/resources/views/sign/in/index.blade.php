@extends('layouts.auth')

@section('page.title', 'Вход в аккаунт')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="authentication">
            <div class="authentication-back mb-5">
                <a href="{{ route('main.index') }}" class="authentication-back-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </a>
            </div>
            <x-sign.logo />
            <h1 class="h3">{{ __('Войти в аккаунт') }}</h1>

            <div id="signin-choose">
                <div class="d-flex flex-column">
                    <div id="signin-choose-yandex">
                        <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.yandex') }}')">
                            <x-sign.yandex />
                        </button>
                    </div>
                    <div class="row row-cols-2 gx-2 mb-0">
                        <div id="signin-choose-vk">
                            <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.vk') }}')">
                                <x-sign.vk />
                            </button>
                        </div>
                        <div id="signin-choose-mailru">
                            <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.mailru') }}')">
                                <x-sign.mailru />
                            </button>
                        </div>
                    </div>
                    <div class="row row-cols-2 gx-2">
                        <div id="signin-choose-google">
                            <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.google') }}')">
                                <x-sign.google />
                            </button>
                        </div>
                        <div id="signin-choose-github">
                            <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.github') }}')">
                                <x-sign.github />
                            </button>
                        </div>
                    </div>
                    <x-sign.choose-or />
                    <div id="signin-choose-email">
                        <a href="{{ route('auth.signin.email') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                            {{ __('Почта') }}
                        </a>
                    </div>
                    <a href="{{ route('auth.signup') }}" class="simple">
                        Не зарегистрированы?
                    </a>
                </div>
            </div>

            <p class="mt-3 mb-3 text-body-secondary small text-center">© 2020–{{ date('Y') }} {{ env('APP_TITLE_SHORT') }}</p>
        </div>
    </main>
</body>
@endsection
