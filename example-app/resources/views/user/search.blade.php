@extends('layouts.user')

@section('page.title', 'Поиск')

@section('user.content')

<div class="row gx-3 user-search">
    <div class="col-md-8 user-search-input">
        <input class="form-control" type="search" name="search" placeholder="Найти..." onInput="searchOnInput()">
    </form>
</div>

<div class="user-search-filters">
    <button class="btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter-x"><path d="M13.013 3H2l8 9.46V19l4 2v-8.54l.9-1.055"/><path d="m22 3-5 5"/><path d="m17 3 5 5"/></svg>
        Очистить фильтры
    </button>
</div>

<div class="row g-3 user-search-users">
    @foreach($users as $user)
        <x-user.search-profile :user="$user" />
    @endforeach
</div>

<p class="text-center mt-2 d-none" id="search-empty-field">
    Не найдено ни одного пользователя.
</p>

<x-blog.pagination />

<script src="{{ asset('js/user/search.js') }}"></script>

@endsection
