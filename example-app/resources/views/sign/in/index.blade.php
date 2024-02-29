@extends('layouts.auth')

@section('page.title', 'Вход в аккаунт')

@section('auth.content')
<h1 class="h3">Войти в аккаунт</h1>

<div id="signin-choose">
    <p class="text-center">
        Выбор как залогиниться
    </p>
</div>

<div id="signin-email">
    <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" autofocus>
        <label for="email">Почта</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Пароль</label>
    </div>

    <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Запомнить меня
        </label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
</div>

<p class="mt-5 mb-3 text-body-secondary text-center">© 2017–{{ date('Y') }}</p>
@endsection
