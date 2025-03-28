@extends('layouts.user.user')

@section('page.title', __('Профиль пользователя ') . $profile->name . __(' в Аквариуме'))
@section('page.ogtitle', __('Профиль пользователя ') . $profile->name . __(' в Аквариуме'))
@section('page.desc',
    __('Профиль пользователя ') .
    $profile->name .
    __(' в Аквариуме. Узнайте больше о его записях,
    активности и интересах.'))
@section('page.ogdesc',
    __('Профиль пользователя ') .
    $profile->name .
    __(' в Аквариуме. Узнайте больше о его записях,
    активности и интересах.'))

@section('user.alert')
    @if ($itsme)
        <x-user.alert.alert :close=false>
            {{ __('Вы просматриваете свой профиль со стороны') }}
        </x-user.alert.alert>
    @elseif($profile->usertype === -1)
        <x-user.alert.alert :close=false>
            {{ __('Тестовый аккаунт, используется в качестве демонстрации возможностей') }}
        </x-user.alert.alert>
    @elseif($profile->verified != 1)
        <x-user.alert.alert name="verifiedAdmin">
            {{ __('Почта человека не подтверждена, профиль виден из-за того, что вы администратор') }}
        </x-user.alert.alert>
    @endif

    @if ($alert = session()->pull('alert.success'))
        <x-user.alert.alert-success :title="$alert" />
    @endif
@endsection

@section('user.content')

    <x-user.profile :profile="$profile" :issub=$issub :itsme=$itsme />
    <x-user.profile.modal :listData="$listData" />

    <x-user.profile.posts-show :local="false" :posts="$posts" :count="$countAllPosts" />

    <x-user.profile.toasts />

@endsection

@push('js')
    <script src={{ asset('js/user/toasts.js') }}></script>
@endpush
