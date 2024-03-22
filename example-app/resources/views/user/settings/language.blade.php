@extends('layouts.settings')

@section('page.title', __('Настройки языка'))

@section('settings.left')
<x-settings.header>
    {{ __('Язык') }}
</x-settings.header>

<div class="container-settings-main">
    <ul class="list-group">
        <li class="fs-5 list-group-item">
            <a href="{{ route('main.setlocale', 'ru') }}" class="settings-profile">
                {{ __('Русский') }}
            </a>
        </li>
        <li class="fs-5 list-group-item">
            <a href="{{ route('main.setlocale', 'en') }}" class="settings-profile">
                {{ __('Английский') }}
            </a>
        </li>
    </ul>
</div>
@endsection
