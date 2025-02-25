@extends('layouts.user.settings')

@section('page.title', 'Устройства с которых входили в аккаунт')

@section('settings.content')
    <x-settings.header>
        {{ __('Устройства') }}
    </x-settings.header>

    <x-form.error-first />

    <p>
        <b>
            Тут будут отображены устройства, с которых производился вход в аккаунт.
        </b>
    </p>

    <p>
        Для того, чтобы вышло сделать данную страницу – необходимо переработать хранение данных в сессиях: перестать хранить
        просто email и password и начать хранить sessionToken, а для этого нужно изменить ВСЮ логику авторизации и обращения
        к таблице.
    </p>

    {{-- <form action="" onsubmit="sendForm('')" method="post">
        @csrf
        Тут будут

        <div class="visually-hidden">
            <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
        </div>
    </form> --}}
@endsection
