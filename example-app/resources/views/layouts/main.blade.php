@extends('layouts.base')

@section('body')
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('includes.alert')
        @include('includes.header')

        <main class="flex-grow-1 pb-1" style="padding-top: 6rem">
            <section>
                <div class="container">
                    @yield('main.content')
                </div>
            </section>
        </main>

        @include('includes.footer')
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/page/header.js') }}"></script>
    @stack('js')
</body>
@endsection
