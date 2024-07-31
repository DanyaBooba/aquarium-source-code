@extends('layouts.user.addpost')

@section('page.title', __('Импортировать записи'))

@section('addpost.content')
    <div class="container-settings-main">
        <h1>{{ __('Импортировать записи') }}</h1>

        <div class="addpost-container">
            <p>
                {{ __('Импортировать записи') }}.
            </p>
        </div>
    </div>
@endsection
