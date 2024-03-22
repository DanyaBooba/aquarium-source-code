@extends('layouts.main')

@section('page.title', __('Социальная сеть'))

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/index.css') }}" />
@endpush

@section('main.content')
    <div class="row row-first mb-2 gx-3">
        <div class="row-first-left">
            <div class="p-3">
                <div class="d-flex justify-content-center pb-2 mt-auto" style="margin-top: -10px">
                    <a href="#" aria-label="{{ __('Скачать для Android') }}" style="margin-right: -30px; margin-top: 10px;">
                        <img src="{{ asset('img/main/android-' . (App::isLocale('ru') ? "ru" : "en") . '.png') }}" class="img-fluid" width="200">
                    </a>
                    <a href="#" aria-label="{{ __('Скачать для iOS') }}">
                        <img src="{{ asset('img/main/iphone-' . (App::isLocale('ru') ? "ru" : "en") . '.png') }}" class="img-fluid" width="210">
                    </a>
                </div>
            </div>
        </div>
        <div class="row-first-right">
            <div class="p-3">
                <div class="py-3 p-2">
                    <h1 class="mb-4">{!! __('Аквариум — ') !!}<br><i id="js-change">{{ __('удобная') }}</i><br> {!! __('<nobr>социальная сеть</nobr>') !!}</h1>
                </div>
                <div class="row-first-button">
                    <button class="btn btn-light" onClick="buttonOpenURL('{{ route('auth.signin') }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
                        {{ __('Войти') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-second g-3">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4">
                <h2>{{ __('Стикеры за регистрацию') }}</h2>
                <div class="row-second-content row-second-stickers">
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker1.png') }}" alt="{{ __('Стикер аквариума') }}">
                    </a>
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker2.png') }}" alt="{{ __('Стикер аквариума') }}">
                    </a>
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker3.png') }}" alt="{{ __('Стикер аквариума') }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4">
                <h2>{{ __('Удобная авторизация через соцсети') }}</h2>
                <div class="row-second-content row-second-social">
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/yandex.svg') }}" alt="{{ __('Яндекс') }}">
                    </a>
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/vk.svg') }}" alt="{{ __('Вконтакте') }}">
                    </a>
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/mail_text.svg') }}" class="row-second-social-mailru" alt="{{ __('Меил ру') }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4 row-second-telegram">
                <h2>
                    <a href="{{ route('blog.index') }}">
                        {{ __('Новости проекта') }}
                    </a>
                    {!! __('<nobr>и телеграм</nobr> канал') !!}
                </h2>
                <a href="//aquariumsocial.t.me" target="_blank">
                    <img src="{{ asset('img/social/telegram.svg') }}" alt="{{ __('Телеграм') }}">
                </a>
            </div>
        </div>
    </div>

    <div class="container container-blog">
        <div class="row row-third row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <img src="{{ asset('img/emoji/partying-face.png') }}" alt="{{ __('Счастливое лицо') }}">
                <h3>{{ __('Удобство') }}</h3>
                <p>{!! __('Для мобильных <nobr>и десктопных</nobr> версий.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/robot.png') }}" alt="{{ __('Робот') }}">
                <h3>{{ __('Безопасность') }}</h3>
                <p>{!! __('Шифрование <nobr>и конфиденциальность</nobr>.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/rocket.png') }}" alt="{{ __('Ракета') }}">
                <h3>{{ __('Скорость') }}</h3>
                <p>{{ __('Быстрая загрузка даже при слабой сети.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/fish.png') }}" alt="{{ __('Рыбка') }}">
                <h3>{{ __('Тематика') }}</h3>
                <p>{{ __('Социальная платформа понравится каждому.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/friends.png') }}" alt="{{ __('Друзья') }}">
                <h3>{{ __('Аудитория') }}</h3>
                <p>{{ __('Большое количество разных интересных людей.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/dizzy.png') }}" alt="{{ __('Звезда') }}">
                <h3>{{ __('Лента') }}</h3>
                <p>{!! __('Персональная лента <nobr>с вашими</nobr> подписками.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/heart.png') }}" alt="{{ __('Сердце') }}">
                <h3>{{ __('Эмоции') }}</h3>
                <p>{!! __('Сохраняйте воспоминания <nobr>и делитесь</nobr> <nobr>с друзьями</nobr>.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/shooting-star.png') }}" alt="{{ __('Падающая звезда') }}">
                <h3>{{ __('Фотографии') }}</h3>
                <p>{{ __('Персонализируйте свою страницу.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/dove.png') }}" alt="{{ __('Белый голубь') }}">
                <h3>{{ __('Открытость') }}</h3>
                <p>{!! __('Открытый исходный код <nobr>и API</nobr> для разработчиков.') !!}</p>
            </div>
        </div>
    </div>

    {{-- <div class="container container-blog" style="margin-top: 60px">
        <h2 class="display-4 mb-3 text-center">{{ __('Новости проекта') }}</h2>
        <div class="row row-blog row-cols-sm-1 row-cols-sm-2 row-cols-lg-3 g-2">
            @for($i = 0; $i < 3; $i++)
            <x-blog.card />
            @endfor
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('blog.index') }}">
                {{ __('Читать ещё') }}
            </a>
        </div>
    </div> --}}
@endsection

@push('js')
<script src="{{ asset('js/main/js-change-text.js') }}"></script>
@endpush
