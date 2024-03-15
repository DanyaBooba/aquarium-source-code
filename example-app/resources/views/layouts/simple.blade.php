@extends('layouts.base')

@section('body')
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        <main class="flex-grow-1 py-1">
            <section>
                <div class="container mt-2">
                    @yield('simple.content')
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('js')
</body>
@endsection
