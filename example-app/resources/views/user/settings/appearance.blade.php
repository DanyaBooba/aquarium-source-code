@extends('layouts.user.settings')

@section('page.title', __('Настройки персонализации'))

@section('settings.content')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-settings.header>
        {{ __('Персонализация') }}
    </x-settings.header>

    <x-form.error-first />

    <p class="text-title">
        {{ __('Загрузить аватарку') }}
    </p>

    <main class="container px-0">
        <div class="mb-4" id="block-upload-demo">
            <div id="upload-demo" style="width: 350px"></div>
            <button class="btn btn-success upload-result">
                {{ __('Сохранить') }}
            </button>
        </div>
        <div class="mb-4" id="block-upload-input">
            <div class="col col-load">
                <input type="file" id="upload" onInput="showAvatar()" class="visually-hidden">
                <label for="upload" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    {{ __('Загрузить') }}
                </label>
            </div>
        </div>
    </main>

    {{-- <form action="{{ route('settings.appearance.loadfile') }}" method="post" enctype="multipart/form-data"
        class="form-settings-image">
        @csrf
        <div class="row row-settings-avatar">
            <div class="col col-load">
                <input class="form-control visually-hidden" name="avatar" type="file" id="avatarLoad"
                    onInput="loadAvatar()">
                <label for="avatarLoad" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    {{ __('Загрузить') }}
                </label>
            </div>
            @if ($profile->avatarDefault == false)
                <div class="col">
                    <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon"
                        value="0" onInput="data()" checked>
                    <label class="list-group-item list-group-item-another" for="icon">
                        <img src="{{ $profile->avatar }}">
                    </label>
                </div>
            @endif
        </div>
    </form> --}}

    {{-- <p class="text-title mt-4">
        {{ __('Загрузить шапку') }}
    </p>

    <form action="{{ route('settings.appearance.loadfile') }}" method="post" enctype="multipart/form-data"
        class="form-settings-image">
        @csrf
        <div class="row row-settings-avatar">
            <div class="col col-load">
                <input class="form-control visually-hidden" name="avatar" type="file" id="avatarLoad"
                    onInput="loadAvatar()">
                <label for="avatarLoad" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    {{ __('Загрузить') }}
                </label>
            </div>
            @if ($profile->avatarDefault == false)
                <div class="col">
                    <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon"
                        value="0" onInput="data()" checked>
                    <label class="list-group-item list-group-item-another" for="icon">
                        <img src="{{ $profile->avatar }}">
                    </label>
                </div>
            @endif
        </div>
    </form> --}}

    <p class="text-title mt-4">
        {{ __('Аватарка') }}
    </p>

    <form action="{{ route('settings.appearance.store') }}" onsubmit="sendForm('{{ route('settings') }}')" method="post"
        class="form-settings-image">
        @csrf
        <div class="row row-settings-avatar">
            @for ($i = 1; $i <= 7; $i++)
                <div class="col">
                    <input class="form-check-input visually-hidden" type="radio" name="icon"
                        id="icon_man_{{ $i }}" value="MAN{{ $i }}" onInput="data()"
                        {{ user_settings_active_image_avatar('MAN' . $i, $profile->avatar) }}>
                    <label class="list-group-item" for="icon_man_{{ $i }}">
                        <img src="{{ asset("/img/user/logo/MAN$i.png") }}">
                    </label>
                </div>
            @endfor
        </div>
        <div class="row row-settings-avatar">
            @for ($i = 1; $i <= 7; $i++)
                <div class="col">
                    <input class="form-check-input visually-hidden" type="radio" name="icon"
                        id="icon_woman_{{ $i }}" value="WOMAN{{ $i }}" onInput="data()"
                        {{ user_settings_active_image_avatar('WOMAN' . $i, $profile->avatar) }}>
                    <label class="list-group-item" for="icon_woman_{{ $i }}">
                        <img src="{{ asset("/img/user/logo/WOMAN$i.png") }}">
                    </label>
                </div>
            @endfor
        </div>
        <p class="text-title mt-4">
            {{ __('Шапка') }}
        </p>
        <div class="row row-settings-cap">
            @for ($i = 1; $i <= 11; $i++)
                <div class="col">
                    <input class="form-check-input visually-hidden" type="radio" name="bg"
                        id="bg{{ $i }}" value="{{ $i }}" onInput="data()"
                        {{ user_settings_active_image_cap($i, $profile->cap) }}>
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

    {{-- <div class="modal fade" id="loadAvatar" tabindex="-1" aria-labelledby="loadAvatarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="upload-demo" style="width: 350px"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success upload-result w-100">
                        {{ __('Сохранить') }}
                    </button>
                    <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">
                        {{ __('Отменить изменения') }}
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@push('js')
    <script src="{{ asset('js/settings/load-image.js') }}"></script>
    <script src="{{ asset('js/jquery.croppie.js') }}"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script src="{{ asset('js/settings/croppie-logic.js') }}"></script>
@endpush
