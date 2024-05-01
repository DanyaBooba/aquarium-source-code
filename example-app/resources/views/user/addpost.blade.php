@extends('layouts.addpost')

@section('page.title', 'Настройки')

@section('addpost.content')
<div class="container-settings-main">
    <h1>{{ __('Добавить пост') }}</h1>
    <div class="addpost-container">
        <form action="{{ route('user') }}" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="inp" placeholder="Название">
            </div>
            <input id="x" type="hidden" name="content">
            <trix-editor input="x" placeholder="Сообщение"></trix-editor>
            <button type="submit" class="btn btn-primary mt-3">
                Сохранить
            </button>
        </form>
    </div>
</div>
@endsection
