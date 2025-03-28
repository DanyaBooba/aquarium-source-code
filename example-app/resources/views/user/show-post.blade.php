@extends('layouts.user.settings')

@section('page.title', truncate_text($post->desc, 60) . ' — Аквариум')
@section('page.ogtitle', truncate_text($post->desc, 60) . ' — Аквариум')
@section('page.desc', truncate_text($post->desc, 150, true))
@section('page.ogdesc', truncate_text($post->desc, 150, true))

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts/include.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}" />
    <script src="{{ asset('js/module/fancybox.js') }}"></script>
@endpush

@section('user.feed', 'row-user-content-feed')

@section('user.alert')
    @if ($alert = session()->pull('alert.error'))
        <x-user.alert.alert :close=false>
            {{ $alert }}
        </x-user.alert.alert>
    @endif

    @if ($active == 0)
        <x-user.alert.alert :close=false>
            {{ __('Запись находится на модерации') }}
        </x-user.alert.alert>
    @elseif($active == -1)
        <x-user.alert.alert :close=false>
            <div class="text-danger">
                {{ __('Запись не одобрена к публикации. Измените содержимое или напишите новую запись') }}
            </div>
        </x-user.alert.alert>
    @endif
@endsection

@section('settings.content')
    <div class="container-post">
        <div class="container-post__main">
            <x-post.show.header :userId="$user->id" :avatar="$user->avatar" :avatarDefault="$user->avatarDefault" :name="profile_display_name($user->firstName, $user->lastName)" :postId="$post->idPost"
                :mypost="$itsmypost" />
            @if ($post->haveimage)
                <a data-fancybox="" data-src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}">
                    <span class="post-image">
                        <img src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}"
                            alt="{{ $post->desc }}">
                    </span>
                </a>
            @endif

            <div id="postMain">
                {!! $post->message !!}
            </div>

            <x-post.modal-link />
            <x-post.show.bottom :like="false" :idPost="$post->idPost" :idUser="$user->id" />
            <x-post.show.footer :like="$like" :views="$views" :countLikes="$countLikes" :idPost="$post->idPost"
                :idUser="$user->id" :date="$post->updated_at->translatedFormat('j F Y')" />
        </div>
        <x-post.show.comments :comments="$comments" :id="$post->id" />
    </div>
@endsection

@push('js')
    <script src={{ asset('js/user/post/change-links.js') }}></script>
@endpush
