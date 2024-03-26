@extends('layouts.user')

@section('page.title', __('Уведомления'))

@section('user.content')
<h1>
    {{ __('Уведомления') }}
</h1>
<div class="user-notifications">
    @for($i = 0; $i < 5; $i++)
    <x-user.notifications.item :i=$i header='Заголовок' text='Текст' />
    @endfor
</div>
@endsection
