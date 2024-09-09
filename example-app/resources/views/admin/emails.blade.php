@extends('layouts.admin.admin')

@section('admin.content')
    <h1>
        Админка
    </h1>

    <p>
        Письма пользователям
    </p>

    <p>
        <a href="{{ route('admin.email.google-block-1') }}">
            Отправить письмо о невозможности авторизации при помощи Google с 1 октября.
        </a>
    </p>
@endsection
