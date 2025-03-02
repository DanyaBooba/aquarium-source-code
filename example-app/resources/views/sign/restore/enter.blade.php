@extends('layouts.auth.signin')

@section('page.title', __('Введите новый пароль для аккаунта Аквариума'))
@section('page.ogtitle', __('Введите новый пароль для аккаунта Аквариума'))
@section('page.desc',
    __('Установите новый пароль для вашего аккаунта Аквариума. Завершите процесс восстановления
    доступа в аккаунт.'))
@section('page.ogdesc',
    __('Установите новый пароль для вашего аккаунта Аквариума. Завершите процесс восстановления
    доступа в аккаунт.'))

@section('auth.header')
    <x-sign.header>
        {{ __('Введите новый пароль') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('auth.restore.enter.store', $code) }} method="post">
        @csrf
        <x-form.input-password />

        <button class="btn btn-primary py-3 mt-4" type="submit">{{ __('Восстановить') }}</button>
    </form>
@endsection
