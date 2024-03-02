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
                    <h1>Аквариум</h1>
                </div>
                <div class="d-flex flex-column mt-auto">
                    <button class="btn btn-outline-light py-3 mb-3" onClick="buttonOpenURL('{{ route('auth.signin') }}')">Войти</button>
                    <button class="btn btn-success py-3" onClick="buttonOpenURL('{{ route('auth.signup') }}')">Зарегистрироваться</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-second gx-3">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="p-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, incidunt.</p>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="p-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, incidunt.</p>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="p-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, incidunt.</p>
            </div>
        </div>
    </div>

    <div class="row row-third row-cols-1 row-cols-lg-3 g-4">
        <div class="col p-4">
            <img src="{{ asset('img/emoji/fish.png') }}" width="80" class="img-fluid mb-3" alt="Рыбка">
            <h3 class="mb-2">Тематика</h3>
            <p class="fs-6 mx-auto col-md-8">
                Социальная сеть для всех. Поиск друзей и общения.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/friends.png') }}" width="80" class="img-fluid mb-3" alt="Друзья">
            <h3 class="mb-2">Аудитория</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Находите единомышленников и друзей.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/dizzy.png') }}" width="80" class="img-fluid mb-3" alt="Звезда">
            <h3 class="mb-2">Лента</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Ваша лента с новостями и записями друзей.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/robot.png') }}" width="80" class="img-fluid mb-3" alt="Робот">
            <h3 class="mb-2">Безопасность</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Шифрование и конфиденциальность.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/heart.png') }}" width="80" class="img-fluid mb-3" alt="Сердце">
            <h3 class="mb-2">Эмоции</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Сохраняйте воспоминания и делитесь с друзьями.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/shooting-star.png') }}" width="80" class="img-fluid mb-3" alt="Падающая звезда">
            <h3 class="mb-2">Фотографии</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Публикуйте фотографии, расскажите друзьям.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/rocket.png') }}" width="80" class="img-fluid mb-3" alt="Ракета">
            <h3 class="mb-2">Скорость</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Быстрая скорость работы благодаря оптимизации.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/dove.png') }}" width="80" class="img-fluid mb-3" alt="Белый голубь">
            <h3 class="mb-2">Свобода</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Выражайте любое мнение, Вы никогда не будете за него заблокированы.
            </p>
        </div>
        <div class="col p-4">
            <img src="{{ asset('img/emoji/dove.png') }}" width="80" class="img-fluid mb-3" alt="Белый голубь">
            <h3 class="mb-2">Свобода</h3>
            <p class="mb-0 fs-6 mx-auto col-md-8">
                Выражайте любое мнение, Вы никогда не будете за него заблокированы.
            </p>
        </div>
    </div>
@endsection
