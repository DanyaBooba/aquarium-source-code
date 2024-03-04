@extends('layouts.main')

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
                        Социальная сеть для каждого: открытая платформа,
                        уютное общение и удобный сервис.
                    </p>
                </div>
                <div class="row-first-button">
                    <button class="btn btn-light col-md-6" onClick="buttonOpenURL('{{ route('auth.signin') }}')">Войти</button>
                </div>
                <img src="{{ asset('img/stickers/sticker1-2.png') }}" alt="Морская звезда">
            </div>
        </div>
    </div>

    <div class="row row-second gx-3">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="p-4">
                <h2>Стикеры за регистрацию</h2>
                <div class="row-second-content row-second-stickers">
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker1.png') }}" width="120px" alt="Стикер аквариума">
                    </a>
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker2.png') }}" width="120px" alt="Стикер аквариума">
                    </a>
                    <a href="{{ route('auth.signup') }}">
                        <img src="{{ asset('img/stickers/sticker3.png') }}" width="120px" alt="Стикер аквариума">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="p-4">
                <h2>Удобная авторизация через соцсети</h2>
                <div class="row-second-content row-second-social">
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/yandex.svg') }}" width="60px" class="me-2" alt="Яндекс">
                    </a>
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/vk.svg') }}" width="60px" class="mx-2" alt="Вконтакте">
                    </a>
                    <a href="{{ route('auth.signin') }}">
                        <img src="{{ asset('img/social/mail_text.svg') }}" width="140px" class="ms-2" alt="Меил ру">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="p-4">
                <h2>
                    <a href="{{ route('blog.index') }}">
                        Новости проекта
                    </a>
                и телеграм канал</h2>
                <a href="//aquariumsocial.t.me" target="_blank">
                    <img src="{{ asset('img/social/telegram.svg') }}" width="80px" class="mt-3" alt="Телеграм">
                </a>
            </div>
        </div>
    </div>

    <div class="container container-blog">
        <div class="row row-third row-cols-1 row-cols-lg-3 g-4">
            <div class="col p-4">
                <img src="{{ asset('img/emoji/partying-face.png') }}" width="80" class="img-fluid mb-3" alt="Белый голубь">
                <h3 class="mb-2">Удобство</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Для мобильных и десктопных версий.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/robot.png') }}" width="80" class="img-fluid mb-3" alt="Робот">
                <h3 class="mb-2">Безопасность</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Шифрование и конфиденциальность.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/rocket.png') }}" width="80" class="img-fluid mb-3" alt="Ракета">
                <h3 class="mb-2">Скорость</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Быстрая загрузка даже при слабой сети.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/fish.png') }}" width="80" class="img-fluid mb-3" alt="Рыбка">
                <h3 class="mb-2">Тематика</h3>
                <p class="fs-6 mx-auto col-md-10">
                    Социальная платформа подойдет для каждого.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/friends.png') }}" width="80" class="img-fluid mb-3" alt="Друзья">
                <h3 class="mb-2">Аудитория</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Большое количество разных интересных людей.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/dizzy.png') }}" width="80" class="img-fluid mb-3" alt="Звезда">
                <h3 class="mb-2">Лента</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Персональная лента с вашими подписками.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/heart.png') }}" width="80" class="img-fluid mb-3" alt="Сердце">
                <h3 class="mb-2">Эмоции</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Сохраняйте воспоминания и делитесь с друзьями.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/shooting-star.png') }}" width="80" class="img-fluid mb-3" alt="Падающая звезда">
                <h3 class="mb-2">Фотографии</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Персонализируйте вашу страницу.
                </p>
            </div>
            <div class="col p-4">
                <img src="{{ asset('img/emoji/dove.png') }}" width="80" class="img-fluid mb-3" alt="Белый голубь">
                <h3 class="mb-2">Открытость</h3>
                <p class="mb-0 fs-6 mx-auto col-md-10">
                    Открытый исходный код <nobr>и API</nobr> для разработчиков.
                </p>
            </div>
        </div>
    </div>

    <div class="container container-blog" style="margin-top: 60px">
        <h2 class="display-4 mb-3 text-center">Новости проекта</h2>
        <div class="row row-blog row-cols-3 g-2">
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
