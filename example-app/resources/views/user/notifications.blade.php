@extends('layouts.user.user')

@section('page.title', __('Уведомления о профиле в Аквариуме'))
@section('page.ogtitle', __('Уведомления о профиле в Аквариуме'))
@section('page.desc',
    __('Проверьте уведомления о вашем профиле в Аквариуме. Получайте информацию об изменениях личных
    данных и входах в аккаунт.'))
@section('page.ogdesc',
    __('Проверьте уведомления о вашем профиле в Аквариуме. Получайте информацию об изменениях личных
    данных и входах в аккаунт.'))

@section('user.content')

    <h1>
        {{ __('Уведомления') }}
        <span style="opacity: .5">{{ $count }}</span>
    </h1>
    <div class="user-notifications">
        @if ($count == 0)
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
                <img src="{{ asset('img/illustrations/mail-2.png') }}" alt="Уведомлений нет"
                    style="max-width: 150px; margin-top: 1rem; margin-bottom: .5rem;">
                <p>
                    {{ __('Уведомлений нет') }}
                </p>
            </div>
        @else
            @foreach ($notifications as $item)
                <x-user.notifications.item :i="$loop->iteration" :header="$item->title" :text="$item->message" />
            @endforeach
        @endif

    </div>
@endsection
