@extends('layouts.auth-signup')

@section('page.title', __('Регистрация'))

@section('auth.header')
<x-sign.header>
    {{ __('Регистрация') }}
</x-sign.header>
@endsection

@section('auth.signup')
<div id="signin-choose">
    <div class="d-flex flex-column">
        {{-- <div id="signin-choose-yandex">
            <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signup.yandex') }}')">
                <x-sign.yandex />
            </button>
        </div> --}}
        {{-- <div class="row row-cols-2 gx-2 mb-0">
            <div id="signin-choose-vk">
                <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signup.vk') }}')">
                    <x-sign.vk />
                </button>
            </div>
            <div id="signin-choose-mailru">
                <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signup.mailru') }}')">
                    <x-sign.mailru />
                </button>
            </div>
        </div> --}}
        {{-- <div class="row row-cols-2 gx-2">
            <div id="signin-choose-google">
                <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signup.google') }}')">
                    <x-sign.google />
                </button>
            </div>
            <div id="signin-choose-github">
                <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signup.github') }}')">
                    <x-sign.github />
                </button>
            </div>
        </div> --}}
        {{-- <x-sign.choose-or /> --}}
        <div id="signin-choose-email">
            <a href="{{ route('auth.signup.email') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
                {{ __('Почта') }}
            </a>
        </div>
        <a href="{{ route('auth.signin') }}" class="simple">
            {{ __('Есть аккаунт?') }}
        </a>
    </div>
</div>
@endsection
