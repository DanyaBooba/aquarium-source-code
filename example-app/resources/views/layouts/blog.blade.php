@extends('layouts.base')

@section('body')
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('includes.alert')
        @include('includes.header')

        <main class="flex-grow-1 py-1">
            <section>
                <div class="container">
                    @yield('main.content')
                </div>
            </section>
        </main>

        @include('includes.footer')
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('js')
</body>
@endsection
