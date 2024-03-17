@extends('layouts.user')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/settings/index.css') }}" />
@endpush

@section('user.content')
<div class="container-settings">
    <div class="row g-2">
        <div class="container-settings-left">
            @yield('settings.left')
        </div>
        <div class="container-settings-right">
            @yield('settings.right')
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/settings/settings-back.js') }}"></script>
@endpush
