@extends('layouts.error')

@section('error', '418')

@section('message', __('Сервер не может приготовить кофе, потому что он чайник'))

@section('image')
    <img src="{{ asset('img/illustrations/tea.png') }}" alt="Ошибка на стороне клиента"
        style="max-width: 150px; padding-bottom: 1rem; margin-left: auto; margin-right: auto">
@endsection
