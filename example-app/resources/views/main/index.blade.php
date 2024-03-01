@extends('layouts.main')

@push('css')
<style>
    .row.gx-3 {
        margin-bottom: 60px;
    }

    .row.g-4 .col.p-4 {
        text-align: center;
    }
</style>
@endpush

@section('main.content')
    <div class="row g-0 gx-3">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="bg-white p-3" style="border-radius: 8px; min-height: 500px">
                123
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="bg-dark p-3" style="border-radius: 8px; min-height: 500px">
                213
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3 g-4">
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
