@extends('layouts.user.settings')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts/include.css') }}" />
@endpush

@section('page.title', __('Пост'))

@section('user.alert')
    @if ($active == 0)
        <x-user.alert :close=false>
            {{ __('Запись находится на модерации') }}
        </x-user.alert>
    @elseif($active == -1)
        <x-user.alert :close=false>
            <div class="text-danger">
                {{ __('Запись не одобрена к публикации') }}
            </div>
        </x-user.alert>
    @endif
@endsection

@section('settings.content')
    <div class="container-post">
        <div class="container-post__main">
            <x-post.show.header :userId="$user->id" :avatar="$user->avatar" :avatarDefault="$user->avatarDefault" :name="profile_display_name($user->firstName, $user->lastName)" />

            <div>
                {!! $post->message !!}
            </div>
        </div>
        <x-post.show.bottom />
        <x-post.show.comments :comments="$comments" />
    </div>
@endsection
