@extends('layouts.user')

@section('page.title', __('Профиль'))

@section('user.alert')
<x-user.alert-email />
@endsection

@section('user.content')

<x-user.profile :profile="$profile" />

@endsection
