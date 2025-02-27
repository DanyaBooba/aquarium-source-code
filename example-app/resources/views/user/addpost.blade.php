@extends('layouts.user.addpost')

@section('page.title', __('Добавить запись'))

@section('addpost.content')
    <div class="container-settings-main">
        <div class="div-has-back">
            <h1 class="title-has-back">
                {{ __('Добавить запись') }}
            </h1>
        </div>

        <x-form.error-first />

        <div class="addpost-container addpost-container-addpost">
            <form action="{{ route('post.add.store') }}" method="post" class="mb-4">
                @csrf
                <input id="x" type="hidden" name="message">
                <trix-editor input="x" placeholder="{{ addpost_placeholder() }}" id="textarea"></trix-editor>
                {{-- @if (!$whiteList)
                    <x-addpost.post-moderate />
                @endif --}}
                <button type="submit" class="btn btn-success w-100 mt-3 py-3" style="border-radius: 12px;">
                    {{ __('Опубликовать') }}
                </button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/user/post/textarea-scroll.js') }}"></script>
@endpush
