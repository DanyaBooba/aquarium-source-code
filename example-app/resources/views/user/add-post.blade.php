@extends('layouts.user')

@section('page.title', 'Ваш профиль')

@section('user.alert')
<div class="border-bottom container py-2 d-flex align-items-center">
    пригласи друга
    <button class="btn ms-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-auto"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>
</div>
@endsection

@section('user.content')

<x-user.profile :local=true />

@endsection
