@extends('layouts.auth.signin')

@section('page.title', __('Восстановление пароля Аквариума — верните доступ к аккаунту'))
@section('page.ogtitle', __('Восстановление пароля Аквариума — верните доступ к аккаунту'))
@section('page.desc',
    __('Забыли пароль? Восстановите доступ к аккаунту Аквариума. Укажите почту, и мы поможем вам
    вернуть аккаунт.'))
@section('page.ogdesc',
    __('Забыли пароль? Восстановите доступ к аккаунту Аквариума. Укажите почту, и мы поможем вам
    вернуть аккаунт.'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('auth.signin') }}">
        {{ __('Восстановить пароль') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('auth.restore.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Восстановить') }}</button>
    </form>

    <a href="{{ url()->previous() }}" class="d-flex justify-content-center mt-4 text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-log-in">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
            <polyline points="10 17 15 12 10 7" />
            <line x1="15" x2="3" y1="12" y2="12" />
        </svg>
        {{ __('Вернуться ко входу?') }}
    </a>
@endsection
