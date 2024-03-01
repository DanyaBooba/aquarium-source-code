@extends('layouts.blog')

@section('main.content')
<div class="row row-blog row-cols-3 g-2">
    <x-blog.card />
    <x-blog.card />
    <x-blog.card />
    <x-blog.card />
    <x-blog.card />
    <x-blog.card />
</div>
<x-blog.pagination />
@endsection
