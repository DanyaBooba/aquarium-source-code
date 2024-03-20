@extends('layouts.user')

@section('page.title', __('Достижения'))

@section('user.content')
<h1>{{ __('Достижения') }}</h1>
<ul class="list-achievements">
    @for($i = 1; $i < 15; $i++)
    <li>
        <img src="{{ asset("/img/user/achivs/achiv-$i.jpg") }}" alt="">
        <p>
            Достижение {{ $i }}
        </p>
    </li>
    @endfor
</ul>
@endsection
