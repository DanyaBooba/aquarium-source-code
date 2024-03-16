@extends('layouts.simple')

@section('page.title', 'О проекте Аквариум')

@section('simple.content')
<x-lending.logo />
<p class="text-center mt-4 fs-3">
    Социальная сеть с открытым кодом
</p>
<div class="row" style="margin-top: 6rem;">
    <div class="col">
        <p class="display-1">🐠</p>
        <p class="fs-5" style="line-height: 180%">
            Аквариум — это место, где вы можете создать свой мир, отражающий вашу личность, интересы <nobr>и уникальность</nobr>.
        </p>
    </div>
    <div class="col text-center">
        <p class="display-1">🎨</p>
        <p class="fs-5" style="line-height: 180%">
            Меняйте свой профиль, используя различные картинки <nobr>и элементы</nobr> дизайна, чтобы создать визуальное представление <nobr>о себе</nobr>.
        </p>
    </div>
</div>
<div class="row" style="margin-top: 4rem;">
    <div class="col">
        <p class="display-1">🥳</p>
        <p class="fs-5" style="line-height: 180%">
            Аквариум отлично работает <nobr>в вебе</nobr> <nobr>и на</nobr> мобильных устройствах, доставляя только положительные эмоции.
        </p>
    </div>
    <div class="col text-center">
        <p class="display-1">👫</p>
        <p class="fs-5" style="line-height: 180%">
            В соцсети зарегистрировано более 50-ти человек. И каждый день людей становится все больше.
        </p>
    </div>
</div>
{{-- <div style="margin-top: 6rem">
    <h2 class="display-4 mb-3">Цифры</h2>
    <ul class="list-unstyled">
        <li class="fs-3 mb-2">
            <span class="text-success">60</span> человек зарегистрировано
        </li>
        <li class="fs-3 mb-2">
            по <span class="text-success">20</span> человек заходит каждый день
        </li>
        <li class="fs-3 mb-2">
            <span class="text-success">>80%</span> пользователей подтвердили почту
        </li>
        <li class="fs-3 mb-2">
            <span class="text-success">5&#x2009;000</span> раз заходили в соцсеть
        </li>
        <li class="fs-3 mb-2">
            <span class="text-success">5</span> масштабных изменений за <span class="text-success">5</span> месяцев разработки
        </li>
    </ul>
</div> --}}
<div style="margin-top: 5rem">
    <div style="margin-top: 1rem">
        <h2 class="d-flex">
            <span class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> <span class="display-3 text-success" style="margin-top: .5rem">60</span>
            </span>
            <span class="ms-3" style="margin-top: 2rem">человек зарегистрировано</span>
        </h2>
    </div>
    <div style="margin-top: 1rem">
        <h2 class="d-flex">
            <span class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg> <span class="display-3 text-success" style="margin-top: .5rem">5&#x2009;000</span>
            </span>
            <span class="ms-3" style="margin-top: 2rem">раз заходили в соцсеть</span>
        </h2>
    </div>
    <div style="margin-top: 1rem">
        <h2 class="d-flex">
            <span class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><line x1="19" x2="5" y1="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg> <span class="display-3 text-success" style="margin-top: .5rem">80</span>
            </span>
            <span class="ms-3" style="margin-top: 2rem">пользователей подтвердили почту</span>
        </h2>
    </div>
</div>
<div style="margin-top: 6rem">
    <a href="{{ route('main.index') }}" class="fs-2 text-decoration-none d-flex justify-content-center align-items-center">
        {{ __('Перейти в Аквариум') }}
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="ms-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
    </a>
</div>
@endsection
