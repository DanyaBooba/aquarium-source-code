@extends('layouts.main.main')

@section('page.title', __('Аквариум — создай свой профиль и начни общаться'))
@section('page.ogtitle', __('Аквариум — создай свой профиль и начни общаться'))
@section('page.desc',
    __('Присоединяйтесь к Аквариуму, кастомизируйте профиль, выбирайте цветовые темы, делитесь
    записями и находите друзей. Зарегистрируйтесь сейчас в один клик.'))
@section('page.ogdesc',
    __('Присоединяйтесь к Аквариуму, кастомизируйте профиль, выбирайте цветовые темы, делитесь
    записями и находите друзей. Зарегистрируйтесь сейчас в один клик.'))

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lending/include.css') }}" />
        <style>
            .feature {
                margin-bottom: 1rem;
            }

            .feature-icon {
                width: 4rem;
                height: 4rem;
                border-radius: .75rem;
            }

            .icon-square {
                width: 3rem;
                height: 3rem;
                border-radius: .75rem;
            }

            .text-shadow-1 {
                text-shadow: 0 .125rem .25rem rgba(0, 0, 0, .25);
            }

            .text-shadow-2 {
                text-shadow: 0 .25rem .5rem rgba(0, 0, 0, .25);
            }

            .text-shadow-3 {
                text-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .25);
            }

            .card-cover {
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
            }

            .feature-icon-small {
                width: 3rem;
                height: 3rem;
            }

            .bg-gradient {
                background-color: var(--color-body-plane);
            }

            .bg-gradient svg {
                stroke: var(--page-main-accent);
            }

            .border-bottom {
                border-color: var(--header-border) !important;
            }

            /* main { background-color: rgb(from #ff0000 r g b / 0.5); } */

            @media(max-width: 575px) {
                .lending-hero-image {
                    display: none !important;
                }
            }

            @media(max-width: 767.98px) {
                .lending__row {
                    flex-direction: column;
                }
            }
        </style>
    @endpush

@section('main.content')
    <x-lending.blocks.hero />

    <x-lending.blocks.stats />

    <x-lending.blocks.reason />

    <x-lending.blocks.privacy />

    <x-lending.blocks.test-account />

    <x-lending.blocks.plans />

    <x-lending.blocks.already-done />

    <x-lending.blocks.come />
@endsection
