@extends('layouts.settings')

@section('page.title', 'Настройки профиля')

@section('settings.content')
<x-settings.header>
    {{ __('Профиль') }}
</x-settings.header>

<p class="text-title">
    {{ __('Сведение') }}
</p>

<x-form.error />

<form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">{{ __('Имя пользователя') }}</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="{{ __('К примеру,') }} superman" onInput="data()" value="user10" required>
        <p>
            {{ __('Может содержать только латинские буквы в нижнем регистре.') }}
        </p>
    </div>
    <div>
        <label for="first_name" class="form-label">{{ __('Имя') }}</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="{{ __('Даниил') }}" onInput="data()">
    </div>
    <div>
        <label for="last_name" class="form-label">{{ __('Фамилия') }}</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="{{ __('Иванов') }}" onInput="data()">
    </div>
</form>

<p class="text-title">
{{ __('Доступ') }}
</p>

<div class="container-settings-main">
    <ul class="list-group">
        <li class="fs-5 list-group-item">
            <a href="{{ route('settings.profile.password') }}">
                <span>
                    {{ __('Восстановить пароль') }}
                </span>
            </a>
        </li>
        <li class="fs-5 list-group-item">
            <a href="#">
                <span class="text-danger">
                    {{ __('Удалить аккаунт') }}
                </span>
            </a>
        </li>
    </ul>
</div>
@endsection
