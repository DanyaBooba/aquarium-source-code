@extends('layouts.base')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user/index.css') }}" />
@endpush

@section('body')

    <body class="container-fluid">
        <div class="row row-user min-vh-100">
            <section class="row-user-bar">
                <div class="row-user-bar-container">
                    @include('includes.user.bar')
                </div>
            </section>
            <main class="flex-grow-1 row-user-content">
                @include('includes.user.header')
                @yield('user.alert')
                <section class="py-3">
                    <div class="container px-0">
                        @yield('user.content')
                    </div>
                </section>
            </main>
            @include('includes.user.nav')
        </div>

        <script src="{{ asset('js/user/alert.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/bootstrap-2.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </body>
@endsection
