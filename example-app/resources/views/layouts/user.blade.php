@extends('layouts.base')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user/index.css') }}" />
@endpush

@section('body')
<body class="container-fluid">
    <div class="row row-user min-vh-100">
        <section class="row-user-bar">
            @include('includes.user.bar')
        </section>
        <main class="flex-grow-1 row-user-content">
            <div class="border-bottom container py-2 d-flex align-items-center">
                подтвердите аккаунт
                <button class="btn ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-auto"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            @yield('user.alert')
            <section class="py-3">
                <div class="container">
                    @yield('user.content')
                </div>
            </section>
        </main>
        @include('includes.user.nav')
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('js')
</body>
@endsection
