@extends('layouts.auth.signin')

@section('page.title', __('Добавить второй аккаунт в Аквариум через почту и пароль'))
@section('page.ogtitle', __('Добавить второй аккаунт в Аквариум через почту и пароль'))
@section('page.desc', __('Добавьте второй аккаунт в Аквариум с помощью почты и пароля. Управляйте несколькими профилями
    быстро и безопасно.'))
@section('page.ogdesc', __('Добавьте второй аккаунт в Аквариум с помощью почты и пароля. Управляйте несколькими
    профилями быстро и безопасно.'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('second.auth.signin') }}" routeClose="{{ route('user') }}">
        {{ __('Добавить аккаунт') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('second.auth.signin.email.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>

        <x-form.input-password />

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Войти') }}</button>
    </form>
@endsection
