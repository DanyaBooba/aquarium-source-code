@extends('layouts.user.settings')

@section('settings.content')
    <x-settings.header>
        {{ __('Тест!') }}
    </x-settings.header>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <p class="text-title">
            Загрузка изображения
        </p>

        <input type="file" name="image">

        <button type="submit" class="btn btn-primary">
            Отправить форму
        </button>
    </form>
@endsection
