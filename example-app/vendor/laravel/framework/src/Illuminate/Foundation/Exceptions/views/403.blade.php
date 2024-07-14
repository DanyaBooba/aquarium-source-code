@extends('layouts.error')

@section('error', '403')

@section('message', __($exception->getMessage() ?: 'Доступ к запрашиваемой странице запрещён'))
