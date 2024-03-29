@extends('layouts.blog')

@section('page.title', __('Блог'))

@section('main.content')

<x-blog.header />

<div class="row row-blog row-cols-sm-1 row-cols-sm-2 row-cols-lg-3 g-2">
    @for($i = 0; $i < 12; $i++)
    <x-blog.card />
    @endfor
</div>

<x-blog.pagination />

@endsection
