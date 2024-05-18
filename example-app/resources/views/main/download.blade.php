@extends('layouts.main.main')

@section('page.title', 'Скачать приложения')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/include.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/download.css') }}" />
@endpush

@section('main.content')

<div class="page-download">
    <div class="p-3 page-download__container">
        <div class="d-flex justify-content-center pb-2 mt-auto" style="margin-top: -10px">
            <a href="{{ route('main.download') }}" aria-label="{{ __('Скачать для Android') }}" style="margin-right: -30px; margin-top: 10px;">
                <img src="{{ asset('img/main/android-' . (App::isLocale('ru') ? "ru" : "en") . '.png') }}" class="img-fluid" width="200" aria-label="{{ __('Телефон со страницей сайта') }}">
            </a>
            <a href="{{ route('main.download') }}" aria-label="{{ __('Скачать для iOS') }}">
                <img src="{{ asset('img/main/iphone-' . (App::isLocale('ru') ? "ru" : "en") . '.png') }}" class="img-fluid" width="210" aria-label="{{ __('Телефон со страницей сайта') }}">
            </a>
        </div>
    </div>
</div>

@endsection
