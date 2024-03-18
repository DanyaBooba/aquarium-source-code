@extends('layouts.main')

@section('page.title', 'Ответы на вопросы')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/index.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <x-page.title-anchor />
        </div>
        <div class="col-7 p-3">
            <h1>
                Брендбук
            </h1>
            <p class="fs-5">
                Описания позиционирования, концепций Аквариума, логотип и дизайн-система.
            </p>
            <h2>Логотип</h2>
            <p>
                <a href="#">
                    Скачать RU
                </a>
            </p>
            <p>
                <a href="#">
                    Скачать EN
                </a>
            </p>
            <h2>Логотип Ч/Б</h2>
            <p>
                <a href="#">
                    Скачать RU
                </a>
            </p>
            <p>
                <a href="#">
                    Скачать EN
                </a>
            </p>
        </div>
    </div>

    <x-button-top />
@endsection

@once
    @push('js')
        <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
    @endpush
@endonce
