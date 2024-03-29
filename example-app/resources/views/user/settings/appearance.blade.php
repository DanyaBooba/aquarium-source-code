@extends('layouts.settings')

@section('page.title', __('Настройки персонализации'))

@section('settings.content')
<x-settings.header>
    {{ __('Персонализация') }}
</x-settings.header>

<x-form.error />

<form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post" class="form-settings-image">
    @csrf
    <p class="text-title">
        {{ __('Аватарка') }}
    </p>
    <div class="row row-settings-avatar">
        @for($i = 1; $i <= 7; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon{{ $i }}" value="{{ $i }}" onInput="data()" {{ user_settings_active_image_avatar($i, $profile->avatar) }}>
            <label class="list-group-item" for="icon{{ $i }}">
                <img src="{{ asset("/img/user/logo/MAN$i.png") }}">
            </label>
        </div>
        @endfor
    </div>
    <p class="text-title">
        {{ __('Шапка') }}
    </p>
    <div class="row row-settings-cap">
        @for($i = 1; $i <= 11; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg{{ $i }}" value="{{ $i }}" onInput="data()" {{ user_settings_active_image_cap($i, $profile->cap) }}>
            <label class="list-group-item" for="bg{{ $i }}">
                <img src="{{ asset("/img/user/bg/BG$i.jpg") }}">
            </label>
        </div>
        @endfor
    </div>

    <div class="visually-hidden">
        <button type="submit">
            {{ __('Сохранить') }}
        </button>
    </div>
</form>

@endsection
