@extends('layouts.auth')

@section('page.title', 'Выход из аккаунта')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="authentication">
            <div class="authentication-back mb-5">
                <a href="{{ route('user.index') }}" class="authentication-back-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </a>
            </div>
            <x-sign.logo />
            <h1 class="h3">{{ __('Выйти из аккаунта') }}</h1>

            <button class="btn btn-danger mb-2 py-3" type="submit" onClick="buttonOpenURL('{{ route('user.exit.exactly') }}')">{{ __('Выйти') }}</button>

        </div>
    </main>
</body>
@endsection
