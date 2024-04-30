@extends('layouts.user')

@section('page.title', __('Профиль'))

@section('user.alert')
@if($itsme)
<x-user.alert :close=false>
    {{ __('Вы просматриваете свой профиль со стороны') }}
</x-user.alert>
@endif
@if($alert = session()->pull('alert.success'))
    <x-user.alert-success :title="$alert" />
@endif
@endsection

@section('user.content')

<x-user.profile :profile="$profile" :issub=$issub :itsme=$itsme />

@endsection
