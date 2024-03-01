@extends('layouts.base')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/index.css') }}" />
@endpush

@section('body')
@yield('auth.content')
@endsection
