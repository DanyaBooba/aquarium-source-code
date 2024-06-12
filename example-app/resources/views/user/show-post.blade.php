@extends('layouts.user.user')

@section('page.title', __('Профиль'))

@section('user.alert')
@if($active == 0)
<x-user.alert :close=false>
    {{ __('Запись находится на модерации') }}
</x-user.alert>
@elseif($active == -1)
<x-user.alert :close=false>
    {{ __('Запись не одобрена к публикации') }}
</x-user.alert>
@endif
@endsection

@section('user.content')

@endsection
