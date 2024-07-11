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
            {{ __('Запись не одобрена к публикации') }}
        </x-user.alert>
    @endif
@endsection

@section('settings.content')

    <x-post.show.header :userId="$user->id" :avatar="$user->avatar" :avatarDefault="$user->avatarDefault" :name="profile_display_name($user->firstName, $user->lastName)" />

    <div>
        {!! $post->message !!}
    </div>

    <x-post.show.bottom />

@endsection
