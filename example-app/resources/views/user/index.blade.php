@extends('layouts.user')

@section('page.title', 'Профиль')

@section('user.content')

<x-user.profile name="Даниил Дыбка" desc="123" :local=true />

@endsection
