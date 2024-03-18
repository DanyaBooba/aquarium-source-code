@extends('layouts.settings')

@section('page.title', 'Настройки уведомлений')

@section('settings.left')
<x-settings.header />

<h2>Уведомления</h2>
<x-form.error />
<form action="" method="post">
    @csrf
    {{-- <div>
        <label for="username" class="form-label">Имя пользователя</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="К примеру, superman" onInput="data()" value="user10">
        <p>Может содержать только латинские буквы в нижнем регистре.</p>
    </div> --}}
    <div class="form-check form-switch">
        <input class="form-check-input" name="authorization" type="checkbox" role="switch" id="check1" onInput="data()">
        <label class="form-check-label" for="check1">Вход в аккаунт</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" name="data_change" type="checkbox" role="switch" id="check2" onInput="data()">
        <label class="form-check-label" for="check2">Изменение личных данных</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" name="password_change" type="checkbox" role="switch" id="check3" onInput="data()">
        <label class="form-check-label" for="check3">Смена пароля</label>
    </div>

    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>
@endsection
