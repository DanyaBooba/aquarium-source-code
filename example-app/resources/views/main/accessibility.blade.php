@extends('layouts.main.main')

@section('page.title', 'Цифровая доступность')

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
                {{ __('Цифровая доступность') }}
            </h1>
            <p class="fs-5">
                {{ __('...') }}
            </p>
            <h2>{{ __('...') }}</h2>

        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
