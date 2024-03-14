@extends('layouts.auth')

@section('page.title', 'Вход в аккаунт')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="authentication">
            <div class="authentication-back mb-5">
                <a href="{{ route('auth.signin') }}" class="authentication-back-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                    {{ __("Назад") }}
                </a>
                <a href="{{ route('main.index') }}" class="authentication-back-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </a>
            </div>

            <x-sign.logo />
            <h1 class="h3">{{ __('Войти в аккаунт') }}</h1>

            <div id="signin-email">
                <form action={{ route('auth.signin.email.store') }} method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" onInput="checkOnInput()" required autofocus>
                        <label for="email">{{ __('Почта') }}</label>
                    </div>

                    <div class="input-group input-password" id="password-form1">
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" onInput="checkOnInput()" required>
                            <label for="tespasswordt">{{ __('Пароль') }}</label>
                        </div>
                        <a class="input-group-text" onClick="changeShowPassword('password-form1')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                        </a>
                    </div>

                    {{-- <div class="form-check text-start mb-3 mt-2">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="check">
                        <label class="form-check-label" for="check">
                            {{ __('Запомнить меня') }}
                        </label>
                    </div> --}}

                    <button class="btn btn-primary py-3" type="submit">{{ __('Войти') }}</button>
                </form>

                <a href="{{ route('auth.help') }}" class="d-flex justify-content-center mt-3 text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-question"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                    {{ __('Проблемы со входом?') }}
                </a>
            </div>

            <p class="mt-3 mb-3 text-body-secondary small text-center">© 2020–{{ date('Y') }} {{ env('APP_TITLE_SHORT') }}</p>
        </div>
    </main>

    <script src="{{ asset('js/auth/button-password.js') }}"></script>
    <script src="{{ asset('js/auth/button-disabled.js') }}"></script>
</body>
@endsection
