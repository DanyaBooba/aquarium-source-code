@extends('errors::minimal')

@section('title', __('Payment Required'))
@section('code', '402')
@section('message', __('Payment Required'))

@section('image')
    <img src="{{ asset('img/illustrations/404.png') }}" alt="Не найдено"
        style="max-width: 150px; padding-bottom: 1rem; margin-left: auto; margin-right: auto">
@endsection
