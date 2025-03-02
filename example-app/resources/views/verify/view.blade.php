@extends('layouts.auth.sign')

@section('page.title', __('Подтвердите почту для аккаунта Аквариума'))
@section('page.ogtitle', __('Подтвердите почту для аккаунта Аквариума'))
@section('page.desc', __('Подтвердите вашу почту для аккаунта Аквариума. Пройдите по ссылке в письме, чтобы завершить
    регистрацию.'))
@section('page.ogdesc', __('Подтвердите вашу почту для аккаунта Аквариума. Пройдите по ссылке в письме, чтобы завершить
    регистрацию.'))

@section('auth.header')
    <x-sign.logo.logo />
    <h1 class="h3">
        Подтвердите почту
    </h1>
@endsection

@section('auth.sign')
    <p class="text-center">
        Чтобы взаимодействовать с пользователями, пройдите по ссылке в письме.
    </p>
    <a href="{{ route('verify.set') }}" class="simple d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
            <path
                d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
            <path d="m21.854 2.147-10.94 10.939" />
        </svg>
        {{ __('Отправить ещё раз?') }}
    </a>
    <a href="{{ route('user.exit.exactly') }}" class="simple d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" x2="9" y1="12" y2="12" />
        </svg>
        {{ __('Выйти из аккаунта?') }}
    </a>
@endsection
