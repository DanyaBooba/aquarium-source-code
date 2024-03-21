@extends('layouts.user')

@section('page.title', __('Достижения'))

@section('user.content')

<h1>{{ __('Достижения') }}</h1>
<div class="list-achievements row row-cols-md-3">
    @for($i = 1; $i < 15; $i++)
    <div class="col">
        <span>
            <img src="{{ asset("/img/user/achivs/achiv-$i.jpg") }}" alt="">
        </span>
        <x-circle-text-simple>
            подписан на телеграм
        </x-circle-text-simple>
    </div>
    @endfor
</ul>
@endsection
