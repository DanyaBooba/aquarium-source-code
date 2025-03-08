@extends('layouts.user.settings')

@section('page.title', __('Настройки тем в Аквариуме — 20 цветовых тем, светлый и темный режим'))
@section('page.ogtitle', __('Настройки тем в Аквариуме — 20 цветовых тем, светлый и темный режим'))
@section('page.desc',
    __('Выберите одну из 20 цветовых тем и настройте светлый или темный режим в Аквариуме.
    Персонализируйте внешний вид платформы.'))
@section('page.ogdesc',
    __('Выберите одну из 20 цветовых тем и настройте светлый или темный режим в Аквариуме.
    Персонализируйте внешний вид платформы.'))

@section('settings.content')
    <x-settings.header>
        {{ __('Темы') }}
    </x-settings.header>

    <div class="container-settings-main">
        <p class="text-title mt-4">
            {{ __('Выбор режима') }}
        </p>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ url()->current() }}" class="settings-profile" id="changethemeauto" OnClick="ButtonAuto()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun-moon">
                        <path d="M12 8a2.83 2.83 0 0 0 4 4 4 4 0 1 1-4-4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.9 4.9 1.4 1.4" />
                        <path d="m17.7 17.7 1.4 1.4" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.3 17.7-1.4 1.4" />
                        <path d="m19.1 4.9-1.4 1.4" />
                    </svg>
                    <span>
                        {{ __('Системная') }}
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ url()->current() }}" class="settings-profile" id="changethemelight" OnClick="ButtonLight()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun">
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.93 4.93 1.41 1.41" />
                        <path d="m17.66 17.66 1.41 1.41" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.34 17.66-1.41 1.41" />
                        <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                    <span>
                        {{ __('Всегда светлая') }}
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ url()->current() }}" class="settings-profile" id="changethemedark" OnClick="ButtonDark()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                    <span>
                        {{ __('Всегда темная') }}
                    </span>
                </a>
            </li>
        </ul>

        <p class="text-title mt-4">
            {{ __('Светлая цветовая схема') }}
        </p>
        <x-user.settings.themes.light-scheme />

        <p class="text-title mt-4">
            {{ __('Темная цветовая схема') }}
        </p>
        <x-user.settings.themes.dark-scheme />

    </div>
@endsection
