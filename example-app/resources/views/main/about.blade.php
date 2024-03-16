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
        <p class="display-1">🎨</p>
        <p class="fs-5" style="line-height: 180%">
            Меняйте свой профиль, используя различные картинки и элементы дизайна, чтобы создать визуальное представление о себе.
        </p>
    </div>
</div>
@endsection
