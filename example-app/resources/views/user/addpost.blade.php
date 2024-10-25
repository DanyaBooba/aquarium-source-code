@extends('layouts.user.addpost')

@section('page.title', __('Добавить запись'))

@section('addpost.content')
    <div class="container-settings-main">
        <h1 class="mb-4">{{ __('Добавить запись') }}</h1>

        <x-form.error-first />

        <div class="addpost-container addpost-container-addpost">
            <form action="{{ route('post.add.store') }}" method="post" class="mb-4">
                @csrf
                <input id="x" type="hidden" name="message">
                <trix-editor input="x" placeholder="{{ addpost_placeholder() }}"></trix-editor>
                @if (!$whiteList)
                    <x-addpost.post-moderate />
                @endif
                <div>
                    <button type="submit" class="btn btn-success">
                        {{ __('Опубликовать') }}
                    </button>
                </div>
            </form>
            <x-addpost.post-import />
        </div>
    </div>
@endsection
