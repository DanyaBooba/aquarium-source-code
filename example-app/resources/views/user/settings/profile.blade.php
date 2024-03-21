@extends('layouts.settings')

@section('page.title', 'Настройки профиля')

@section('settings.left')
<x-settings.header>
    {{ __('Профиль') }}
</x-settings.header>

<p class="text-title">
    {{ __('Сведение') }}
</p>

<x-form.error />

<form action="" onsubmit="sendForm('{{ route('user.settings.index') }}')" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">Имя пользователя</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="К примеру, superman" onInput="data()" value="user10" required>
        <p>Может содержать только латинские буквы в нижнем регистре.</p>
    </div>
    <div>
        <label for="first_name" class="form-label">Имя</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Даниил" onInput="data()">
    </div>
    <div>
        <label for="last_name" class="form-label">Фамилия</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Иванов" onInput="data()">
    </div>

    {{-- <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button> --}}
</form>

<p class="text-title">
{{ __('Доступ') }}
</p>

<ul class="list-links">
    <li>
        <a href="{{ route('user.settings.profile.password') }}">
            {{ __('Восстановить пароль') }}
        </a>
    </li>
    <li>
        <a href="#" class="text-danger">
            {{ __('Удалить аккаунт') }}
        </a>
    </li>
</ul>
@endsection
