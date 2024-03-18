@extends('layouts.settings')

@section('page.title', 'Настройки')

@section('settings.left')
<x-settings.header />

<h2>Профиль</h2>
<form action="" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">Имя пользователя</label>
        <input type="text" class="form-control" id="username" placeholder="К примеру, daniil_dybka" onInput="settingsSetChangeFormTrue()">
        <p>Может содержать только латинские буквы в нижнем регистре.</p>
    </div>

    <div>
        <label for="username" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="username" placeholder="Имя пользователя" onInput="settingsSetChangeFormTrue()">
    </div>

    <div>
        <label for="username" class="form-label">Email address</label>
        <input type="text" class="form-control" id="username" placeholder="Имя пользователя" onInput="settingsSetChangeFormTrue()">
    </div>

    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>
@endsection
