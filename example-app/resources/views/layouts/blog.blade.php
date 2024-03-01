@extends('layouts.base')

@section('body')
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('includes.alert')
        @include('includes.header')

        <main class="flex-grow-1 py-1">
            <section>
                <div class="container" style="max-width: 1000px">
                    <div class="d-flex align-items-start" style="margin-bottom: 50px; margin-top: 30px">
                        <h1 class="display-1 col-6 mb-0 text-end pe-5">{{ __('Блог') }}</h1>
                        <div class="d-flex justify-content-end flex-column py-3 ps-5 col-2">
                            <p class="mb-1 small text-end">Информация</p>
                            <p class="mb-1 small text-end">15 посещений</p>
                            <p class="mb-0 small text-end">Блок компании</p>
                        </div>
                    </div>
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
