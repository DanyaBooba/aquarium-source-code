@extends('layouts.user.settings')

@section('page.title', __('Настройки уведомлений в Аквариуме — управляйте почтовыми оповещениями'))
@section('page.ogtitle', __('Настройки уведомлений в Аквариуме — управляйте почтовыми оповещениями'))
@section('page.desc', __('Настройте уведомления в Аквариуме. Выберите, какие оповещения будут приходить на вашу
    почту.'))
@section('page.ogdesc', __('Настройте уведомления в Аквариуме. Выберите, какие оповещения будут приходить на вашу
    почту.'))

@section('settings.content')
    <x-settings.header>
        {{ __('Уведомления') }}
    </x-settings.header>

    <x-form.error-first />

    <form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post">
        @csrf
        <p class="text-title mt-4">
            {{ __('Авторизация') }}
        </p>
        <div class="form-check form-switch">
            <input class="form-check-input" name="authorization" type="checkbox" role="switch" id="check1" value="1"
                {{ user_settings_notifications($notification->authorization) }} onInput="data()">
            <label class="form-check-label" for="check1">{{ __('Вход в аккаунт') }}</label>
        </div>
        <p class="text-title mt-4">
            {{ __('Изменение данных') }}
        </p>
        <div class="form-check form-switch">
            <input class="form-check-input" name="dataChange" type="checkbox" role="switch" id="check2" value="1"
                {{ user_settings_notifications($notification->dataChange) }} onInput="data()">
            <label class="form-check-label" for="check2">{{ __('Изменение личных данных') }}</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" name="passwordChange" type="checkbox" role="switch" id="check3"
                value="1" {{ user_settings_notifications($notification->passwordChange) }} onInput="data()">
            <label class="form-check-label" for="check3">{{ __('Смена пароля') }}</label>
        </div>

        <div class="visually-hidden">
            <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
        </div>
    </form>
@endsection
