@extends('layouts.user.user')

@section('page.title', __('Все публикации в Аквариуме'))
@section('page.ogtitle', __('Все публикации в Аквариуме'))
@section('page.desc',
    __('Читайте все публикации пользователей Аквариума. Будьте в курсе новостей, идей и вдохновения от
    сообщества.'))
@section('page.ogdesc',
    __('Читайте все публикации пользователей Аквариума. Будьте в курсе новостей, идей и вдохновения
    от сообщества.'))

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/feed/include.css') }}">
    @endpush

@section('user.feed', 'row-user-content-feed')

@section('user.content')
    <div class="posts mt-0 container">
        <div class="feed-title">
            <h1 class="visually-hidden">{{ __('Записи пользователей') }}</h1>
        </div>
        <x-post.show :posts="$posts" :showUser="true" />
    </div>
@endsection
