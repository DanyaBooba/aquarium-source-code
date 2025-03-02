@extends('layouts.auth.sign')

@section('page.title', __('Выход из аккаунта Аквариума'))
@section('page.ogtitle', __('Выход из аккаунта Аквариума'))
@section('page.desc', __('Выйдите из аккаунта Аквариума. Завершите текущий сеанс и вернитесь на страницу входа.'))
@section('page.ogdesc', __('Выйдите из аккаунта Аквариума. Завершите текущий сеанс и вернитесь на страницу входа.'))

@section('auth.header')
    <x-sign.header routeClose="{{ route('user') }}">
        {{ __('Выход из аккаунта') }}
    </x-sign.header>
@endsection

@section('auth.sign')
    <button type="submit" class="btn btn-danger mb-2 fs-6 py-3"
        onClick="buttonOpenURL('{{ route('user.exit.exactly') }}')">{{ __('Выйти из аккаунта') }}</button>
@endsection
