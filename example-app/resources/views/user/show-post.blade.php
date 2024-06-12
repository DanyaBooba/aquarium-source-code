@extends('layouts.user.settings')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/posts/include.css') }}" />
@endpush

@section('page.title', __('Пост'))

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

@section('settings.content')

<div class="profile-posts">

</div>

<div>
    {!! $post->message !!}
</div>

@endsection
