@extends('layouts.main.main')

@section('page.title', __('Аквариум — создай свой профиль и начни общаться'))
@section('page.ogtitle', __('Аквариум — создай свой профиль и начни общаться'))
@section('page.desc',
    __('Присоединяйтесь к Аквариуму, кастомизируйте профиль, выбирайте цветовые темы, делитесь
    записями и находите друзей. Зарегистрируйтесь сейчас в один клик.'))
@section('page.ogdesc',
    __('Присоединяйтесь к Аквариуму, кастомизируйте профиль, выбирайте цветовые темы, делитесь
    записями и находите друзей. Зарегистрируйтесь сейчас в один клик.'))

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lending/include.css') }}" />
    @endpush

@section('main.content')
    <div class="container px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>

    <h2>О проекте</h2>
    <h2>Преимущества</h2>
    <h2>Статистика и достижения</h2>
    <h2>Планы на будущее</h2>

    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Dark color hero</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Custom button</button>
                    <button type="button" class="btn btn-outline-light btn-lg px-4">Secondary</button>
                </div>
            </div>
        </div>
    </div>
@endsection
