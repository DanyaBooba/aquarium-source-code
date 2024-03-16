@extends('layouts.user')

@section('page.title', 'Профиль')

@section('user.alert')
<x-user.alert-email />
@endsection

@section('user.content')

<x-user.profile
    name="Даниил Дыбка"
    desc="123"
    avatar=""
    :local=true />

@endsection
