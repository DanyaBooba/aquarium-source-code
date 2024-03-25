@extends('layouts.settings')

@section('page.title', 'Настройки уведомлений')

@section('settings.content')
<x-settings.header>
    {{ __('Уведомления') }}
</x-settings.header>

<x-form.error />

<form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post">
    @csrf
    <div class="form-check form-switch">
        <input class="form-check-input" name="authorization" type="checkbox" role="switch" id="check1" value="1" onInput="data()">
        <label class="form-check-label" for="check1">{{ __('Вход в аккаунт') }}</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" name="data_change" type="checkbox" role="switch" id="check2" value="1" onInput="data()">
        <label class="form-check-label" for="check2">{{ __('Изменение личных данных') }}</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" name="password_change" type="checkbox" role="switch" id="check3" value="1" onInput="data()">
        <label class="form-check-label" for="check3">{{ __('Смена пароля') }}</label>
    </div>

    {{-- <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button> --}}
</form>
@endsection
