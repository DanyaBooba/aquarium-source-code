@extends('layouts.settings')

@section('page.title', 'Настройки персонализации')

@section('settings.left')
<x-settings.header />

<h2>Персонализация</h2>
<x-form.error />
{{-- <form action="" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">Фотография</label>
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
</form> --}}

<form action="" method="post" class="form-settings-image" novalidate>
    <h2 class="h3">Аватарка</h2>
    <div class="row">
        @for($i = 1; $i <= 7; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon{{ $i }}" value="{{ $i }}" {{ $i == 1 ? "checked" : "" }}>
            <label class="list-group-item" for="icon{{ $i }}">
                <img src="{{ asset("/img/user/logo/MAN$i.png") }}">
            </label>
        </div>
        @endfor
    </div>
    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>


{{-- <div class="row row-cols-1 row-cols-lg-2 g-2">
    <div class="col">
        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg1" value="1">
        <label class="list-group-item" for="bg1">
            <img src="{{ asset("/img/user/bg/BG1.jpg") }}">
        </label>
    </div>
    <div class="col">
        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg2" value="2">
        <label class="list-group-item" for="bg2">
            <img src="/app/img/users/bg/BG2.jpg">
        </label>
    </div>
    <div class="col">
        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg3" value="3">
        <label class="list-group-item" for="bg3">
            <img src="/app/img/users/bg/BG3.jpg">
        </label>
    </div>
</div> --}}


@endsection
