@extends('layouts.base')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user/index.css') }}" />
@endpush

@section('body')
<body class="container-fluid">
    <div class="row row-user min-vh-100">
        <section class="row-user-bar p-5">
            @include('includes.user.bar')
        </section>
        <main class="flex-grow-1 row-user-content">
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
