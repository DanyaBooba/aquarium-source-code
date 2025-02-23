@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))

@section('image')
    <img src="/img/illustrations/404.png" alt="Не найдено"
        style="max-width: 150px; padding-bottom: 1rem; margin-left: auto; margin-right: auto">
@endsection
