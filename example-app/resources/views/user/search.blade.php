@extends('layouts.user')

@section('page.title', 'Поиск')

@section('user.content')

<div class="row gx-3 user-search">
    <form action="?" method="get" class="col-md-8">
        <input type="search" name="search" class="form-control" placeholder="Найти" />
    </form>
</div>

<div class="row row-cols-5 g-3 user-search-users">
    @for($i = 0; $i < 100; $i++)
        <x-user.search-profile />
    @endfor
</div>

<x-blog.pagination />

@endsection
