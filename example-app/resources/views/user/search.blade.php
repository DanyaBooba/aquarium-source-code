@extends('layouts.user.user')

@section('page.title', __('Поиск профилей в Аквариуме — найдите друзей и единомышленников'))
@section('page.ogtitle', __('Поиск профилей в Аквариуме — найдите друзей и единомышленников'))
@section('page.desc', __('Ищите профили пользователей в Аквариуме. Найдите друзей, знакомых и интересных людей в
    социальной сети.'))
@section('page.ogdesc', __('Ищите профили пользователей в Аквариуме. Найдите друзей, знакомых и интересных людей в
    социальной сети.'))

@section('user.content')

    <x-user.search.input />

    <div class="d-flex flex-wrap g-3 search-users">
        @foreach ($users as $user)
            <x-user.search.search-user :user="$user" />
        @endforeach
    </div>

    <p class="text-center mt-2 display-none" id="search-empty-field">
        {{ __('Пользователи не найдены.') }}
    </p>

    <script src="{{ asset('js/user/search.js') }}"></script>
@endsection
