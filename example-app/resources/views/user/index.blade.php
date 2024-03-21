@extends('layouts.user')

@section('page.title', __('Профиль'))

@section('user.alert')
<x-user.alert-email />
@endsection

@section('user.content')

<x-user.profile
    name="Даниил Дыбка"
    username="ddybka"
    :avatar-default=true
    avatar="MAN7"
    :cap-default=true
    cap="BG4"
    desc="Описание профиля."
    subs="300"
    :subs-count=300
    :sub=2
    :sub-count=2
    :achivs=1
    :achivs-count=1
    :local=true />

@endsection
