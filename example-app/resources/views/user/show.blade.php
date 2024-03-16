@extends('layouts.user')

@section('page.title', 'Ваш профиль')

@section('user.content')

<x-user.profile
    name="Даниил Дыбка"
    username="ddybka"
    desc="Описание профиля."
    subs=">100М"
    :subs-count=1000000
    :sub=2
    :sub-count=2
    :achivs=1
    :achivs-count=1
    :local=false />

@endsection
