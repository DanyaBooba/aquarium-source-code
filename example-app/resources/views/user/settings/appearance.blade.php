@extends('layouts.settings')

@section('page.title', 'Настройки персонализации')

@section('settings.left')
<x-settings.header />

<h2>Персонализация</h2>
<x-form.error />
<form action="" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">Имя пользователя</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="К примеру, superman" onInput="data()" value="user10">
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

    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>
@endsection
