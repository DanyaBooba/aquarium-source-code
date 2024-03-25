@extends('layouts.new-auth')

@section('auth.root')
<div class="authentication">
    @yield('auth.header')

    <div id="signin-choose">
        <div class="d-flex flex-column">
            @yield('auth.sign')
        </div>
    </div>

    <p class="authentication-text-more">
        © 2020–{{ date('Y') }}
        <a href="{{ route('main.index') }}" class="text-decoration-none">
            {{ __('Аквариум') }}
        </a>
    </p>
</div>
@endsection
