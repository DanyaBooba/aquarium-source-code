@extends('layouts.user')

@section('page.title', __('Уведомления'))

@section('user.content')

<h1>
    {{ __('Уведомления') }}
</h1>
<div class="user-notifications">
    @foreach($notifications as $item)
    <x-user.notifications.item :i="$loop->iteration" :header="$item['title']" :text="$item['desc']" />
    @endforeach
</div>
@endsection
