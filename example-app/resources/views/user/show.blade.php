@extends('layouts.user')

@section('page.title', __('Ваш профиль'))

@section('user.content')

<x-user.profile
    name="Даниил Иванов"
    :id=123
    username="newusername"
    :avatar-default=true
    avatar="MAN2"
    :cap-default=true
    cap="BG2"
    desc="Я щоколадный заяц."
    subs="30"
    :subs-count=30
    :sub=15
    :sub-count=15
    :achivs=2
    :achivs-count=2
    :local=false />

@endsection
