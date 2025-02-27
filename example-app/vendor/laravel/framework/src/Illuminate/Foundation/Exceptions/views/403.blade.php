@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section('image')
    <img src="{{ asset('img/illustrations/404.png') }}" alt="Не найдено"
        style="max-width: 150px; padding-bottom: 1rem; margin-left: auto; margin-right: auto">
@endsection
