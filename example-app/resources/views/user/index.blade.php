@extends('layouts.user.user')

@section('page.title', __('Личный кабинет в Аквариуме — ваш профиль и настройки'))
@section('page.ogtitle', __('Личный кабинет в Аквариуме — ваш профиль и настройки'))
@section('page.desc',
    __('Управляйте своим профилем в Аквариуме. Настройте личные данные, просматривайте активность и
    редактируйте записи в личном кабинете.'))
@section('page.ogdesc',
    __('Управляйте своим профилем в Аквариуме. Настройте личные данные, просматривайте активность и
    редактируйте записи в личном кабинете.'))

@section('user.alert')
    @if ($alert = session()->pull('alert.success'))
        <x-user.alert.alert-success :title="$alert" />
    @endif

    @unless ($profile->verified)
        <x-user.alert.alert-email />
    @endunless
@endsection

@section('user.content')
    <x-user.profile :profile="$profile" />
    <x-user.profile.modal :listData="$listData" />
    <x-user.profile.me-info :profile="$profile" />

    <h2>{{ __('Добавить запись') }}</h2>
    <x-user.profile.addpost :profile="$profile" />

    <x-user.profile.posts-show :posts="$posts" :privatePosts="$privatePosts" :nullPosts="$nullPosts" :count="$countAllPosts" />

    <x-user.profile.toasts />
@endsection

@push('js')
    <script src={{ asset('js/user/toasts.js') }}></script>
@endpush
