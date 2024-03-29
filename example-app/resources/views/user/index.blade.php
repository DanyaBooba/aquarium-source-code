@extends('layouts.user')

@section('page.title', __('Профиль'))

@section('user.alert')
@unless($profile->verified)
<x-user.alert-email />
@endunless
@endsection

@section('user.content')

<x-user.profile :profile="$profile" />

@endsection
