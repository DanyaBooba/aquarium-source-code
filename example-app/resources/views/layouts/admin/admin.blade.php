@extends('layouts.base')

@push('meta')
    <x-head.no-index />
@endpush

@section('body')

    <body class="container-fluid">
        <div class="row min-vh-100">
            <section class="col-md-2 mt-4">
                @include('includes.admin.bar')
            </section>
            <main class="col-md-10 mt-4 flex-grow-1 row-user-content px-0">
                <div class="container">
                    @yield('admin.content')
                </div>
            </main>
        </div>
    </body>
@endsection

@push('js')
    <script src="{{ asset('js/module/bootstrap.js') }}"></script>
@endpush
