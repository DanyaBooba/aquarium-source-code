@extends('layouts.base')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/index.css') }}" />
@endpush

@section('body')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    @yield('auth.content')

    <script src="{{ asset('js/auth/sign.js') }}"></script>
    <script src="{{ asset('js/auth/signin.js') }}"></script>
</body>
@endsection
