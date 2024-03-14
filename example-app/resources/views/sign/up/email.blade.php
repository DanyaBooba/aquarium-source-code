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
                @if($errors->any())
                    <div class="alert alert-danger small p-2">
                        <ul class="mb-0">
                            @foreach($errors->all() as $message)
                                <li>
                                    {{ $message }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action={{ route('auth.signup.email.store') }} method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" onInput="checkOnInput()" autofocus>
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

                    <div class="form-check text-start mb-3 mt-2">
                        <input class="form-check-input" name="agreement" type="checkbox" value="privacy" id="check" onInput="checkOnInput()">
                        <label class="form-check-label small" for="check">
                            {{ __('Подтверждаете') }}
                            <a href="{{ route('main.user.privacy') }}">
                                {{ __('политику конфиденциальности') }}
                            </a>
                        </label>
                    </div>

                    <button class="btn btn-success py-3" type="submit">{{ __('Регистрация') }}</button>
                </form>

                <div class="buttons signup">
                    <button class="btn btn-outline-success w-100 py-2" onClick="showChoose()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                        {{ __('Назад') }}
                    </button>
                </div>
            </div>

            <p class="mt-3 mb-3 text-body-secondary small text-center">© 2020–{{ date('Y') }} {{ env('APP_TITLE_SHORT') }}</p>
        </div>
    </main>

    <script src="{{ asset('js/auth/button-disabled.js') }}"></script>
    <script src="{{ asset('js/auth/signin.js') }}"></script>
</body>
@endsection
