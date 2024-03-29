@extends('layouts.user')

@section('page.title', __('Поиск'))

@section('user.content')

<x-user.search.input />

<div class="row g-3 user-search-users">
    @foreach($users as $user)
        <x-user.search-profile :user="$user" />
    @endforeach
</div>

<p class="text-center mt-2 display-none" id="search-empty-field">
    Не найдено ни одного пользователя.
</p>

{{-- <x-blog.pagination /> --}}
@endsection

@push('js')
<script src="{{ asset('js/user/search.js') }}"></script>
@endpush
