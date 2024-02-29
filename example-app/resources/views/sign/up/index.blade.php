@extends('layouts.auth')

@section('page.title', 'Зарегистрироваться')

@section('auth.content')
<h1 class="h3">Зарегистрироваться</h1>

<div id="signin-choose">
    <div class="d-flex flex-column">
        <div id="signin-choose-yandex">
            <button class="btn" onClick="signinYandex()">
                <x-yandex />
                Яндекс
            </button>
        </div>
        <div id="signin-choose-google">
            <button class="btn" onClick="signinGoogle()">
                <x-google />
                Google
            </button>
        </div>
        <div class="signin-choose-or-background"></div>
        <div class="signin-choose-or"><span>или</span></div>
        <div id="signin-choose-email">
            <button class="btn" onClick="showEmail()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail">
                    <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
                Почта
            </button>
        </div>
    </div>
</div>

<form id="signin-email" method="post">
    @csrf
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

    <button class="btn btn-primary py-2" type="submit">Войти</button>
</form>

<p class="mt-5 mb-3 text-body-secondary text-center">© 2020–{{ date('Y') }}</p>
@endsection
