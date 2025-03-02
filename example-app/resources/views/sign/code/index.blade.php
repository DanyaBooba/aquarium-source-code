@extends('layouts.auth.signin')

@section('page.title', __('Вход в Аквариум по коду — быстрый и безопасный доступ'))
@section('page.ogtitle', __('Вход в Аквариум по коду — быстрый и безопасный доступ'))
@section('page.desc',
    __('Войдите в Аквариум по коду. Укажите почту, получите код и войдите в аккаунт быстро и
    безопасно.'))
@section('page.ogdesc',
    __('Войдите в Аквариум по коду. Укажите почту, получите код и войдите в аккаунт быстро
    и безопасно.'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('auth.signin') }}">
        {{ __('Вход по коду') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('auth.code.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Войти по коду') }}</button>
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

    {{-- <a href="{{ route('auth.signin.email') }}" class="d-flex justify-content-center mt-4 mb-5 text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-log-in">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
            <polyline points="10 17 15 12 10 7" />
            <line x1="15" x2="3" y1="12" y2="12" />
        </svg>
        {{ __('Вернуться ко входу?') }}
    </a> --}}
@endsection
