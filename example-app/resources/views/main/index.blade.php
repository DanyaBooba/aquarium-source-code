@extends('layouts.main')

@section('page.title', 'Социальная сеть')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/index.css') }}" />
@endpush

@section('main.content')
    <div class="row row-first mb-2 gx-3">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="p-3">
                <div class="d-flex justify-content-center pb-2 mt-auto" style="margin-top: -10px">
                    <a href="#" aria-label="Скачать для Android" style="margin-right: -30px; margin-top: 10px;">
                        <img src="{{ asset('img/main/android.png') }}" class="img-fluid" width="200">
                    </a>
                    <a href="#" aria-label="Скачать для iOS">
                        <img src="{{ asset('img/main/iphone.png') }}" class="img-fluid" width="210">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 mb-3">
            <div class="p-3">
                <div class="py-3 p-2">
                    <h1 class="mb-4">Аквариум</h1>
                    <p class="fs-5">
                        Социальная сеть для каждого: поддержка пользователей,
                        уютное общение <nobr>и удобный</nobr> сервис.
                    </p>
                </div>
                <div class="row-first-button">
                    <button class="btn btn-light col-md-6" onClick="buttonOpenURL('{{ route('auth.signin') }}')">Войти</button>
                </div>
                {{-- <img src="{{ asset('img/stickers/sticker1-2.png') }}" alt="Морская звезда"> --}}
            </div>
        </div>
    </div>

    <div class="row row-second g-3">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4">
                <h2>Стикеры за регистрацию</h2>
                <div class="row-second-content row-second-stickers">
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker1.png') }}" alt="Стикер аквариума">
                    </a>
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker2.png') }}" alt="Стикер аквариума">
                    </a>
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker3.png') }}" alt="Стикер аквариума">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4">
                <h2>Удобная авторизация через соцсети</h2>
                <div class="row-second-content row-second-social">
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/yandex.svg') }}" alt="Яндекс">
                    </a>
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/vk.svg') }}" alt="Вконтакте">
                    </a>
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/mail_text.svg') }}" class="row-second-social-mailru" alt="Меил ру">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4 row-second-telegram">
                <h2>
                    <a href="{{ route('blog.index') }}">
                        Новости проекта
                    </a>
                    <nobr>и телеграм</nobr> канал
                </h2>
                <a href="//aquariumsocial.t.me" target="_blank">
                    <img src="{{ asset('img/social/telegram.svg') }}" alt="Телеграм">
                </a>
            </div>
        </div>
    </div>

    <div class="container container-blog">
        <div class="row row-third row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <img src="{{ asset('img/emoji/partying-face.png') }}" alt="Белый голубь">
                <h3>{{ __('Удобство') }}</h3>
                <p>Для мобильных <nobr>и десктопных</nobr> версий.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/robot.png') }}" alt="Робот">
                <h3>{{ __('Безопасность') }}</h3>
                <p>Шифрование <nobr>и конфиденциальность</nobr>.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/rocket.png') }}" alt="Ракета">
                <h3>{{ __('Скорость') }}</h3>
                <p>Быстрая загрузка даже при слабой сети.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/fish.png') }}" alt="Рыбка">
                <h3>{{ __('Тематика') }}</h3>
                <p>Социальная платформа понравится каждому.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/friends.png') }}" alt="Друзья">
                <h3>{{ __('Аудитория') }}</h3>
                <p>Большое количество разных интересных людей.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/dizzy.png') }}" alt="Звезда">
                <h3>{{ __('Лента') }}</h3>
                <p>Персональная лента <nobr>с вашими</nobr> подписками.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/heart.png') }}" alt="Сердце">
                <h3>{{ __('Эмоции') }}</h3>
                <p>Сохраняйте воспоминания <nobr>и делитесь</nobr> <nobr>с друзьями</nobr>.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/shooting-star.png') }}" alt="Падающая звезда">
                <h3>{{ __('Фотографии') }}</h3>
                <p>Персонализируйте свою страницу.</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/dove.png') }}" alt="Белый голубь">
                <h3>{{ __('Открытость') }}</h3>
                <p>Открытый исходный код <nobr>и API</nobr> для разработчиков.</p>
            </div>
        </div>
    </div>

    <div class="container container-blog" style="margin-top: 60px">
        <h2 class="display-4 mb-3 text-center">Новости проекта</h2>
        <div class="row row-blog row-cols-sm-1 row-cols-sm-2 row-cols-lg-3 g-2">
            @for($i = 0; $i < 3; $i++)
            <x-blog.card />
            @endfor
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('blog.index') }}">
                Читать ещё
            </a>
        </div>
    </div>
@endsection
