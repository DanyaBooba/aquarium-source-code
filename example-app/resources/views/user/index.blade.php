@extends('layouts.user.user')

@section('page.title', $profile->name)

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

    <h2>{{ __('Ваши записи') }}</h2>
    <x-user.profile.posts :posts="$posts" />

    <h2>{{ __('Записи, ожидающие модерацию') }}</h2>
    <x-user.profile.posts :posts="$privatePosts" empty="{{ __('Нет записей.') }}" />

    <h2>{{ __('Отклоненные записи') }}</h2>
    <x-user.profile.posts :posts="$nullPosts" empty="{{ __('Нет записей.') }}" />

    <x-user.profile.toasts />

@endsection

@push('js')
    <script src={{ asset('js/user/share-link.js') }}></script>
@endpush
