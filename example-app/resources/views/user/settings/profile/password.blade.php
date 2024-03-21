@extends('layouts.settings')

@section('page.title', 'Восстановить пароль')

@section('settings.left')
<x-settings.header route="{{ route('user.settings.profile') }}">
    {{ __('Восстановить пароль') }}
</x-settings.header>

<x-form.error />

<form action="" onsubmit="sendForm('{{ route('user.settings.index') }}')" method="post">
    @csrf
    <div class="input-group input-password" id="password-form1">
        <div>
            <label for="current_password">{{ __('Текущий пароль') }}</label>
            <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Пароль" onInput="data()" required>
        </div>
        <a class="input-group-text" onClick="changeShowPassword('password-form1')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
        </a>
    </div>
    <div class="input-group input-password" id="password-form2">
        <div>
            <label for="new_password">{{ __('Новый пароль') }}</label>
            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Пароль" onInput="data()" required>
        </div>
        <a class="input-group-text" onClick="changeShowPassword('password-form2')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
        </a>
    </div>
</form>
@endsection

@push('js')
<script src="{{ asset('js/auth/button-password.js') }}"></script>
@endpush
