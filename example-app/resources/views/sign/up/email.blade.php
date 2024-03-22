@extends('layouts.auth')

@section('page.title', 'Регистрация')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signup row gx-5 w-100 m-auto align-items-center">
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
        <div class="authentication px-0 col-md-4">
            <div class="authentication-back mb-5">
                <a href="{{ route('auth.signup') }}" class="authentication-back-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                    {{ __("Назад") }}
                </a>
                <a href="{{ route('main.index') }}" class="authentication-back-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </a>
            </div>

            <x-sign.logo-signup-mobile />
            <h1 class="h3">{{ __('Регистрация') }}</h1>

            <div id="signin-email">
                <x-form.error />
                <form action={{ route('auth.signup.email.store') }} method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" onInput="checkOnInput()" autofocus>
                        <label for="email">{{ __('Почта') }}</label>
                    </div>
                    <div class="input-group input-password" id="password-form1">
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" onInput="checkOnInput()" required>
                            <label for="password">{{ __('Пароль') }}</label>
                        </div>
                        <a class="input-group-text" onClick="changeShowPassword('password-form1')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                        </a>
                    </div>

                    <div class="form-check text-start mb-3 mt-2">
                        <input class="form-check-input" name="agreement" type="checkbox" value="privacy" id="check" onInput="checkOnInput()" checked>
                        <label class="form-check-label small" for="check">
                            {{ __('Подтверждаете') }}
                            <a href="{{ route('main.terms.privacy') }}">
                                {{ __('политику конфиденциальности') }}
                            </a>
                        </label>
                    </div>

                    <button class="btn btn-success py-3" type="submit">{{ __('Регистрация') }}</button>
                </form>
            </div>

            <p class="mt-3 mb-3 text-body-secondary small text-center">
                © 2020–{{ date('Y') }}
                <a href="{{ route('main.index') }}" class="text-decoration-none">
                    {{ __('Аквариум') }}
                </a>
            </p>
        </div>
    </main>

    <script src="{{ asset('js/auth/button-disabled.js') }}"></script>

</body>
@endsection
