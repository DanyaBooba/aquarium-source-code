@extends('layouts.auth.signin')

@section('page.title', __('Восстановить пароль'))

@section('auth.header')
<x-sign.header route-back="{{ route('auth.signin') }}">
    {{ __('Восстановить пароль') }}
</x-sign.header>
@endsection

@section('auth.signin')

<x-form.error-first />

<form action={{ route('auth.signin.email.store') }} method="post">
    @csrf
    <div class="form-floating">
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
        <label for="email">{{ __('Почта') }}</label>
    </div>

    <button class="btn btn-primary py-3 mt-3" type="submit">{{ __('Восстановить') }}</button>
</form>
@endsection
