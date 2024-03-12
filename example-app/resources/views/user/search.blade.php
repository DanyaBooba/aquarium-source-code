@extends('layouts.user')

@section('page.title', 'Поиск')

@section('user.content')

<div class="row gx-3 user-search">
    <form action="?" method="get" class="col-md-8">
        <input type="search" name="search" oninput="searchOnInput()" class="form-control" placeholder="Найти" />
    </form>
</div>

<div class="row row-cols-5 g-3 user-search-users">
    @for($i = 0; $i < 30; $i++)
        <x-user.search-profile />
    @endfor
</div>

<p class="text-center mt-2 d-none" id="search-empty-field">
    Не найдено ни одного пользователя.
</p>

<x-blog.pagination />

<script src="{{ asset('js/user/search.js') }}"></script>

@endsection
