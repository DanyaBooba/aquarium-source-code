@extends('layouts.base')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/index.css') }}" />
@endpush

@section('body')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        @yield('auth.root')

        {{-- <div class="authentication">
            @yield('auth.header')
            @yield('auth.content')

            <p class="authentication-text-more">
                © 2020–{{ date('Y') }}
                <a href="{{ route('main.index') }}" class="text-decoration-none">
                    {{ __('Аквариум') }}
                </a>
            </p>
        </div> --}}
    </main>
</body>
@endsection

@push('js')
<script src="{{ asset('js/auth/button-password.js') }}"></script>
<script src="{{ asset('js/auth/button-disabled.js') }}"></script>
@endpush
