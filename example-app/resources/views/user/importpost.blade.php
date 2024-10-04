@extends('layouts.user.addpost')

@section('page.title', __('Импортировать записи'))

@section('addpost.content')
    <div class="container-settings-main">
        <h1>{{ __('Импортировать записи') }}</h1>

        <div class="addpost-container import-post">
            <h2>
                {{ __('1. Выберите социальную сеть:') }}
            </h2>
            <div class="import-post__choose">
                <button id="choose-telegram" onClick="chooseChange('telegram')">
                    <img src="{{ asset('img/social/telegram.svg') }}" alt="{{ __('Телеграм') }}">
                </button>
                <button id="choose-vk" onClick="chooseChange('vk')">
                    <x-sign.logo.vk />
                </button>
            </div>
            <h2>
                {{ __('2. Скопируйте ссылку на пост:') }}
            </h2>
            <form action="">
                <input type="text">
                <button>
                    submit
                </button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/user/import-post.js') }}"></script>
@endpush
