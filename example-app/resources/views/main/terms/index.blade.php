@extends('layouts.main.main')

@section('page.title', __('Правовая информация Аквариума'))
@section('page.ogtitle', __('Правовая информация Аквариума'))
@section('page.desc', __('Правовая информация Аквариума: политика конфиденциальности, условия использования и обработки
    файлов cookie. Ознакомьтесь с документами платформы.'))
@section('page.ogdesc', __('Правовая информация Аквариума: политика конфиденциальности, условия использования и
    обработки файлов cookie. Ознакомьтесь с документами платформы.'))

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
    @endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
        </div>
        <div class="col-7 p-3">
            <h1>{{ __('Правовая информация') }}</h1>
            <ul>
                <li>
                    <a href="{{ route('main.terms.privacy') }}">
                        {{ __('Политика конфиденциальности') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('main.terms.termsofuse') }}">
                        {{ __('Условия использования') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('main.terms.cookie') }}">
                        {{ __('Политика обработки файлов cookie') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
