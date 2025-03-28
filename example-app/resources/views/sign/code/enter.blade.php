@extends('layouts.auth.signin')

@section('page.title', __('Ввести код для входа в аккаунт по коду'))
@section('page.ogtitle', __('Ввести код для входа в аккаунт по коду'))
@section('page.desc',
    __('Введите код, который был отправлен на указанную почту, чтобы войти в свой аккаунт
    Аквариума.'))
@section('page.ogdesc', __('Введите код, который был отправлен на указанную почту, чтобы войти в свой аккаунт
    Аквариума.'))

@section('auth.header')
    <x-sign.header>
        {{ __('Ввести код') }}
    </x-sign.header>
@endsection

@section('auth.signin')

    <x-form.error-first />

    <form action={{ route('auth.code.enter.store') }} method="post">
        @csrf
        <input type="hidden" class="d-none" name="email" value="{{ $email }}">
        <input type="hidden" class="d-none" name="code" id="6digits_input" value="">

        <swd-pin-field validate="0123456789" class="digits6" length="6" name="pin" id="6digits"></swd-pin-field>

        <button class="btn btn-primary py-3 mt-4 button-submit-code" type="submit">{{ __('Войти по коду') }}</button>
    </form>

    <a href="{{ route('auth.signin.email') }}" class="d-flex justify-content-center mt-4 mb-5 text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
            <polyline points="10 17 15 12 10 7" />
            <line x1="15" x2="3" y1="12" y2="12" />
        </svg>
        {{ __('Вернуться ко входу?') }}
    </a>
@endsection

@push('js')
    <script src={{ asset('js/auth/6-digits.js') }}></script>
    <script type="module" src="{{ asset('js/module/pinfield.js') }}"></script>
@endpush
