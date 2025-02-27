@extends('layouts.error')

@section('error', '404')

@section('message', __('Не найдено'))

@section('image')
    <img src="{{ asset('img/illustrations/404.png') }}" alt="Не найдено"
        style="max-width: 150px; padding-bottom: 1rem; margin-left: auto; margin-right: auto">
@endsection
