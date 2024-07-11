@extends('layouts.user.user')

@section('page.title', __('Лента'))

@section('user.content')
    <div class="posts container">
        <x-post.show :posts="$posts" :showUser="true" />
    </div>
@endsection
