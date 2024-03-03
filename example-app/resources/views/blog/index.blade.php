@extends('layouts.blog')

@section('main.content')
<div class="d-flex align-items-start" style="margin-bottom: 50px; margin-top: 30px; margin-left: 100px">
    <h1 class="display-1 col-6 mb-0 text-end pe-5">{{ __('Новости') }}</h1>
    <div class="d-flex justify-content-end flex-column py-3 ps-5 col-3">
        <p class="mb-1 small text-end">Информация</p>
        <p class="mb-1 small text-end">15 посещений</p>
        <p class="mb-0 small text-end">Блок компании</p>
    </div>
</div>

<div class="row row-blog row-cols-3 g-2">
    @for($i = 0; $i < 12; $i++)
    <x-blog.card />
    @endfor
</div>
<x-blog.pagination />
@endsection
