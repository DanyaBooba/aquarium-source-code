@extends('layouts.addpost')

@section('page.title', 'Настройки')

@section('addpost.content')
<div class="container-settings-main">
    <h1>{{ __('Добавить пост') }}</h1>
    <div class="addpost-container">
        <form action="" method="post">
            <div>
                <input type="text">
            </div>
            <input id="x" type="hidden" name="content">
            <trix-editor input="x"></trix-editor>
            </form>
    </div>
</div>
@endsection
