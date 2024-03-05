@extends('layouts.user')

@section('page.title', 'Ваш профиль')

@section('user.content')

<x-user.profile :local=false />

@endsection
