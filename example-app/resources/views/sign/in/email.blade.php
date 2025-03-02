@extends('layouts.auth.signin')

@section('page.title', __('Вход в Аквариум через почту и пароль'))
@section('page.ogtitle', __('Вход в Аквариум через почту и пароль'))
@section('page.desc',
    __('Войдите в аккаунт Аквариума с помощью почты и пароля. Привычный доступ к вашему
    профилю.'))
@section('page.ogdesc',
    __('Войдите в аккаунт Аквариума с помощью почты и пароля. Привычный доступ к вашему
    профилю.'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('auth.signin') }}">
        {{ __('Вход в аккаунт') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('auth.signin.email.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>

        <x-form.input-password />

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Войти') }}</button>
    </form>

    <a href="{{ route('auth.restore') }}"
        class="d-flex justify-content-center mt-4 align-items-center text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-lock-keyhole-open">
            <circle cx="12" cy="16" r="1" />
            <rect width="18" height="12" x="3" y="10" rx="2" />
            <path d="M7 10V7a5 5 0 0 1 9.33-2.5" />
        </svg>
        {{ __('Восстановить пароль?') }}
    </a>
@endsection
