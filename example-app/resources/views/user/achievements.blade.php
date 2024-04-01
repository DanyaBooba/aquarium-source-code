@extends('layouts.user')

@section('page.title', __('Достижения'))

@section('user.content')

<h1>{{ __('Достижения') }}</h1>
@unless($achievements)
<p>
    {{ __('Участвуйте в жизни социальной сети и получайте за это достижения!') }}
</p>
<p>
    {{ __('Первое достижение вы можете получить за подписку на ') }}
    <a href="//aquariumsocial.t.me" target="_blank">
        {{ __('телеграм канал') }}.
    </a>
</p>
@else
<div class="list-achievements row row-cols-md-3">
    @foreach($achievements as $item)
    <div class="col">
        <span>
            <img src="{{ asset("/img/user/achivs/" . $item['img'] . ".jpg") }}" alt="{{ $item['title'] }}">
        </span>
        <x-circle-text-simple>
            {{ $item['title'] }}
        </x-circle-text-simple>
    </div>
    @endforeach
</div>
@endunless

@endsection
