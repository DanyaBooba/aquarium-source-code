@extends('layouts.auth')

@section('page.title', 'Регистрация')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signup row gx-5 w-100 m-auto">
        <div class="col-md-8 form-signup-display">
            <x-sign.logo-signup />
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
                            <x-yandex />
                        </button>
                    </div>
                    <div id="signin-choose-vk">
                        <button class="btn fs-5" onClick="signinVK()">
                            <x-vk />
                        </button>
                    </div>
                    <div id="signin-choose-mailru">
                        <button class="btn fs-5" onClick="signinMailru()">
                            <x-mailru />
                        </button>
                    </div>
                    <div class="row row-cols-2 gx-2">
                        <div id="signin-choose-google">
                            <button class="btn fs-5" onClick="signinGoogle()">
                                <x-google />
                            </button>
                        </div>
                        <div id="signin-choose-github">
                            <button class="btn fs-5" onClick="signinGoogle()">
                                <x-github />
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
