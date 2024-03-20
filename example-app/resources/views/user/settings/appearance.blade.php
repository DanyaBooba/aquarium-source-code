@extends('layouts.settings')

@section('page.title', 'Настройки персонализации')

@section('settings.left')
<x-settings.header />

<h2>Персонализация</h2>
<x-form.error />

<form action="" onsubmit="sendForm()" method="post" class="form-settings-image">
    <h2 class="h3">Аватарка</h2>
    <div class="row row-settings-avatar">
        @for($i = 1; $i <= 7; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon{{ $i }}" value="{{ $i }}" onInput="data()" {{ $i == 1 ? "checked" : "" }}>
            <label class="list-group-item" for="icon{{ $i }}">
                <img src="{{ asset("/img/user/logo/MAN$i.png") }}">
            </label>
        </div>
        @endfor
    </div>
    <h2 class="h3">Шапка</h2>
    <div class="row row-settings-cap">
        @for($i = 1; $i <= 11; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg{{ $i }}" value="{{ $i }}" onInput="data()" {{ $i == 1 ? "checked" : "" }}>
            <label class="list-group-item" for="bg{{ $i }}">
                <img src="{{ asset("/img/user/bg/BG$i.jpg") }}">
            </label>
        </div>
        @endfor
    </div>
    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>

@endsection
