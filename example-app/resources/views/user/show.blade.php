@extends('layouts.user')

@section('page.title', __('Профиль'))

@section('user.content')

<x-user.profile :profile="$profile" />

@endsection
