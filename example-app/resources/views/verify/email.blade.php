@extends('layouts.auth.sign')

@section('page.title', __('Введите почту для аккаунта Аквариума'))
@section('page.ogtitle', __('Введите почту для аккаунта Аквариума'))
@section('page.desc',
    __('Введите вашу почту для аккаунта Аквариума. Чтобы пользоваться аккаунтом, необходимо ввести
    почту.'))
@section('page.ogdesc',
    __('Введите вашу почту для аккаунта Аквариума. Чтобы пользоваться аккаунтом, необходимо ввести
    почту.'))

@section('auth.header')
    <x-sign.logo.logo />
    <h1 class="h3">
        Введите почту
    </h1>
@endsection

@section('auth.sign')
    <p class="text-center">
        Чтобы пользоваться аккаунтом, необходимо ввести почту.
    </p>

    <x-form.error-first />

    <form action={{ route('verify-email.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Продолжить') }}</button>
    </form>

    <a href="{{ route('user.exit.exactly') }}"
        class="simple d-flex justify-content-center mt-4 align-items-center text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" x2="9" y1="12" y2="12" />
        </svg>
        {{ __('Выйти из аккаунта?') }}
    </a>
@endsection
