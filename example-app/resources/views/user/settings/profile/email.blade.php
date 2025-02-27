@extends('layouts.user.settings')

@section('page.title', __('Сменить почту'))

@section('settings.content')
    <x-settings.header route="{{ route('settings.profile') }}">
        {{ __('Сменить почту') }}
    </x-settings.header>

    <x-form.error-first />

    <form action="{{ route('settings.profile.email.store') }}" onsubmit="sendForm('{{ route('settings') }}')" method="post">
        @csrf
        <p class="text-title mt-4">
            {{ __('Текущие данные') }}
        </p>
        <div class="form-floating">
            <input type="email" name="currentEmail" class="form-control" id="currentEmail" placeholder="Текущая почта"
                onInput="data()" value="{{ old('currentEmail') }}" required>
            <label for="currentEmail">{{ __('Текущая почта') }}</label>
        </div>

        <x-form.input-password name="currentPassword" funcName="data" />

        <p class="text-title mt-4">
            {{ __('Новая почта') }}
        </p>

        <div class="form-floating">
            <input type="email" name="newEmail" class="form-control" id="newEmail" placeholder="Новая почта"
                onInput="data()" value="{{ old('newEmail') }}" required>
            <label for="newEmail">{{ __('Новая почта') }}</label>
            <p>
                {{ __('После отправки формы, потребуется подтвердить почту по ссылке в письме.') }}
            </p>
        </div>

        <div class="visually-hidden">
            <button type="submit">
                {{ __('Сохранить') }}
            </button>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('js/auth/button-password.js') }}"></script>
@endpush
