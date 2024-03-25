@extends('layouts.main')

@section('page.title', __('Брендбук'))

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <x-page.title-anchor />
        </div>
        <div class="col-7 p-3">
            <h1>
                {{ __('Брендбук') }}
            </h1>
            <p class="fs-5">
                {{ __('Описания позиционирования, концепций Аквариума, логотип и дизайн-система.') }}
            </p>
            <h2>
                {{ __('Логотип') }}
            </h2>
            <ul>
                <li>
                    <a href="{{ asset('download/logo_ru.zip') }}" download>
                        {{ __('Скачать RU') }}
                    </a>
                </li>
                <li>
                    <a href="{{ asset('download/logo_en.zip') }}" download>
                        {{ __('Скачать EN') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
