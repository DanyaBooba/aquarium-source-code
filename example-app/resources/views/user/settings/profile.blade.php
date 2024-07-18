@extends('layouts.user.settings')

@section('page.title', 'Настройки профиля')

@section('settings.content')

    <x-settings.header>
        {{ __('Профиль') }}
    </x-settings.header>

    <x-form.error-first />

    <form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post">
        @csrf
        <p class="text-title">
            {{ __('Имя и фамилия') }}
        </p>
        <div class="settings-form-block">
            <div>
                <label for="firstName" class="form-label">{{ __('Имя') }}</label>
                <input type="text" name="firstName" class="form-control" id="firstName" value="{{ $profile->firstName }}"
                    placeholder="{{ __('Даниил') }}" onInput="data()">
            </div>
            <div>
                <label for="lastName" class="form-label">{{ __('Фамилия') }}</label>
                <input type="text" name="lastName" class="form-control" id="lastName" value="{{ $profile->lastName }}"
                    placeholder="{{ __('Иванов') }}" onInput="data()">
            </div>
        </div>

        <p class="text-title">
            {{ __('Сведения') }}
        </p>
        <div>
            <label for="username" class="form-label">{{ __('Имя пользователя') }}</label>
            <input type="text" name="username" class="form-control" id="username"
                placeholder="{{ __('К примеру,') }} superman" onInput="data()" value="{{ $profile->username }}">
            <p>
                {{ __('Может содержать только латинские буквы в нижнем регистре и цифры.') }}
            </p>
        </div>
        <div>
            <label for="desc" class="form-label">{{ __('Описание') }}</label>
            <input type="text" name="desc" class="form-control" id="desc" value="{{ $profile->desc }}"
                placeholder="{{ __('Пару слов о вас') }}" onInput="data()">
            <p>
                {{ __('Краткая информация о вас, к примеру возраст, город проживания, сфера деятельности.') }}
            </p>
        </div>

        <div class="visually-hidden">
            <button type="submit">
                {{ __('Сохранить') }}
            </button>
        </div>
    </form>

    <p class="text-title">
        {{ __('Восстановить доступ') }}
    </p>

    <div class="container-settings-main">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('settings.profile.password') }}">
                    <span>
                        {{ __('Сменить пароль') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('settings.profile.email') }}">
                    <span>
                        {{ __('Сменить почту') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </a>
            </li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('user.delete') }}">
                    <span class="text-danger">
                        {{ __('Удалить аккаунт') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </a>
            </li>
        </ul>
    </div>
@endsection
