@extends('layouts.auth')

@section('page.title', 'Регистрация')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signup row gx-5 w-100 m-auto">
        <div class="col-md-8 form-signup-display">
            <x-sign.logo-signup />
            <div style="margin-top: 1rem">
            <h4 class="d-flex">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> <span class="display-5 text-success" style="margin-top: .5rem">60</span>
                </span>
                <span class="ms-3" style="margin-top: 1.7rem">человек зарегистрировано</span>
            </h4>
        </div>
        <div style="margin-top: 1rem">
            <h4 class="d-flex">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg> <span class="display-5 text-success" style="margin-top: .5rem">5&#x2009;000</span>
                </span>
                <span class="ms-3" style="margin-top: 1.7rem">раз заходили в соцсеть</span>
            </h4>
        </div>
        <div style="margin-top: 2rem">
            <h4 class="d-flex">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-1" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><line x1="19" x2="5" y1="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg> <span class="display-5 text-success" style="margin-top: .5rem">80</span>
                </span>
                <span class="ms-3">пользователей<br>подтвердили почту</span>
            </h4>
        </div>
        </div>
        <div class="authentication col-md-4">
            <div class="authentication-back mb-5">
                <a href="{{ route('main.index') }}" class="authentication-back-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </a>
            </div>
            <x-sign.logo-signup-mobile />
            <h1 class="h3">{{ __('Регистрация') }}</h1>

            <div id="signin-choose">
                <div class="d-flex flex-column">
                    <div id="signin-choose-yandex">
                        <button class="btn fs-5" onClick="signinYandex()">
                            <x-sign.yandex />
                        </button>
                    </div>
                    <div class="row row-cols-2 gx-2 mb-0">
                        <div id="signin-choose-vk">
                            <button class="btn fs-5" onClick="signinVK()">
                                <x-sign.vk />
                            </button>
                        </div>
                        <div id="signin-choose-mailru">
                            <button class="btn fs-5" onClick="signinMailru()">
                                <x-sign.mailru />
                            </button>
                        </div>
                    </div>
                    <div class="row row-cols-2 gx-2">
                        <div id="signin-choose-google">
                            <button class="btn fs-5" onClick="signinGoogle()">
                                <x-sign.google />
                            </button>
                        </div>
                        <div id="signin-choose-github">
                            <button class="btn fs-5" onClick="signinGoogle()">
                                <x-sign.github />
                            </button>
                        </div>
                    </div>
                    <x-sign.choose-or />
                    <div id="signin-choose-email">
                        <a href="{{ route('auth.signup.email') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                            {{ __('Почта') }}
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('auth.signin') }}">
                            Есть аккаунт?
                        </a>
                    </div>
                </div>
            </div>

            <p class="mt-3 mb-3 text-body-secondary small text-center">© 2020–{{ date('Y') }} {{ env('APP_TITLE_SHORT') }}</p>
        </div>
    </main>
</body>
@endsection
