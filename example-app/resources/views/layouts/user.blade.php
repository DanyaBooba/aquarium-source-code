@extends('layouts.base')

@section('body')
<body>
    <div class="row min-vh-100">
        <section class="col-3">
            @include('includes.user.bar')
        </section>
        <main class="flex-grow-1 col-9">
            <section class="py-3">
                <div class="container">
                    @yield('user.content')
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('js')
</body>
@endsection
