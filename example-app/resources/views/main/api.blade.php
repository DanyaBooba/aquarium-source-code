@extends('layouts.main')

@section('page.title', 'API')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/index.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <ul id="left-bar-anchors"></ul>
        </div>
        <div class="col-7 p-3">
            <h1>{{ __('API') }}</h1>
            <p class="fs-5">
                Социальная сеть Аквариум. Это место, где вы можете создать свой подводный мир, отражающий вашу личность, интересы и уникальность.
            </p>
        </div>
    </div>
@endsection

@once
    @push('js')
        <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
    @endpush
@endonce
