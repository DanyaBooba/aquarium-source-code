@extends('layouts.user.addpost')

@section('page.title', __('Изменить запись'))

@section('addpost.content')
    <div class="container-settings-main">
        <div class="div-has-back">
            <a href="{{ route('post.show', [$userId, $post->idPost]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </a>
            <h1 class="title-has-back">
                {{ __('Изменить запись') }}
            </h1>
        </div>

        <x-form.error-first />

        <div class="addpost-container">
            @if (!$whiteList)
                <x-addpost.post-change />
            @endif
            <form action="{{ route('post.edit.store') }}" method="post">
                @csrf
                <input id="x" type="hidden" name="message">
                <input type="hidden" name="idPost" value="{{ $post->idPost }}">
                <trix-editor input="x" placeholder="{{ __('Сообщение') }}" id="textarea">
                    {!! $post->message !!}
                </trix-editor>
                <div class="d-flex flex-wrap gap-3" style="margin-top: 1rem;">
                    <button type="submit" class="d-block btn btn-primary w-100 py-3" style="border-radius: 12px;">
                        {{ __('Изменить') }}
                    </button>
                    <a href="{{ route('post.delete', $post->idPost) }}" class="btn btn-danger w-100 py-3"
                        style="border-radius: 12px;">
                        {{ __('Удалить запись') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/user/post/textarea-scroll.js') }}"></script>
@endpush
