@extends('layouts.main.simple')

@section('page.title', __('О проекте Аквариум'))

@section('simple.content')
<div class="d-flex justify-content-center mt-5">
    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
</div>
<h1 class="text-center display-3 mt-2">
    История проекта Аквариум
</h1>

<div class="container px-0" style="max-width: 500px">
    <p class="text-center fs-5" style="line-height: 180%">
        Проект Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab praesentium rerum enim eos iste cum doloribus nostrum molestias quis nesciunt!
    </p>
</div>
@endsection
