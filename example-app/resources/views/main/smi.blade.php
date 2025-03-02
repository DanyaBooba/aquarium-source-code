@extends('layouts.main.main')

@section('page.title', __('Аквариум для СМИ — материалы и информация о проекте'))
@section('page.ogtitle', __('Аквариум для СМИ — материалы и информация о проекте'))
@section('page.desc', __('Официальная страница Аквариума для СМИ. Основная информация, тексты, материалы и медиа-ресурсы
    о проекте.'))
@section('page.ogdesc', __('Официальная страница Аквариума для СМИ. Основная информация, тексты, материалы и
    медиа-ресурсы о проекте.'))

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
    @endpush

@section('main.content')
    <style>
        figure {
            margin-bottom: 1rem;
        }

        figure img {
            border-radius: 8px;
            box-shadow: 0 0 .25rem var(--shadow) !important;
        }

        figure figcaption {
            font-size: .875rem;
            color: var(--text-muted);
            margin-top: .25rem;
        }
    </style>

    <div class="row gx-3">
        <div class="col-3 p-3">
            <x-page.title-anchor />
        </div>
        <div class="col-7 p-3">
            <h1>{{ __('СМИ') }}</h1>
            <p class="fs-5">
                {{ __('На данной странице можно найти тексты, предназначенные для СМИ или других заинтересованных лиц, чтобы описать проект Аквариум, используя правильные слова и формулировки, также здесь можно найти изображения, которые можно использовать для демонстрации функционала.') }}
            </p>
            <h2>
                {{ __('Аквариум в «2 словах»') }}
            </h2>
            <p>
                {{ __('Аквариум – это платформа для социального взаимодействия между пользователями наподобие ВКонтакте или Телеграма.') }}
            </p>
            <p>
                {{ __('В Аквариуме можно быстро зарегистрироваться с помощью сервисов Яндекс, Google, ВКонакте и GitHub, персонализировать свой аккаунт при помощи настроек: выбрать тему, изменить аватарку и выбрать уникальное короткое имя.') }}
            </p>
            <p>
                {{ __('Для социального взаимодействия у пользователей есть возможность подписываться на других людей, следить за их публикациями и создавать собственные.') }}
            </p>
            <h2>
                {{ __('Что такое Аквариум?') }}
            </h2>
            <p>
                {{ __('Социальная сеть Аквариум — это место, где вы можете создать свой мир, отражающий вашу личность, интересы и уникальность.') }}
            </p>
            <h2>
                {{ __('Возможности') }}
            </h2>
            <p>
                {{ __('Быстрый вход, написание постов, загрузка фотографий, подписка на людей и лента записей.') }}
            </p>
            <h2>
                {{ __('Для кого Аквариум?') }}
            </h2>
            <p>
                {{ __('Социальная сеть Аквариум предназначена для всех, кто ценит красоту мира и стремится поделиться своими удивительными фотографиями со всеми.') }}
            </p>
            <h2>
                {{ __('Как используется Аквариум?') }}
            </h2>
            <p>
                {{ __('Аквариум используется как платформа для публикации постов, развития собственного профиля, удобная социальная сеть для коммуникаций с друзьями.') }}
            </p>
            <h3>
                {{ __('Как зарегистрироваться в Аквариуме?') }}
            </h3>
            <p>
                {{ __('Поддерживается быстрая регистрация и авторизация через сервисы Яндекс, Google, ВКонтакте и GitHub, а также можно использовать e-mail и почту, тогда после регистрации потребуется подтвердить аккаунт по ссылке в письме.') }}
            </p>
            <p>
                {{ __('Если забыли пароль, его можно восстановить через соответствущую форму, либо войти удобным образом через код, отправленный на указанную почту.') }}
            </p>
            <h3>
                {{ __('Скорость работы') }}
            </h3>
            <p>
                {{ __('Аквариум эффективно использует ресурсы устройства, благодаря чему загрузка страниц достигает нескольких десятых секунд, для этого в интерфейсе используются современные форматы изображений и грамотное распределение ресурс.') }}
            </p>
            <p>
                {{ __('Серверная часть сайта, отвечающая за логические действия, обрабатывает запросы менее чем за 200мс, благодаря чему для пользователей загрузка сайта будет моментальной.') }}
            </p>
            <h3>
                {{ __('Безопасность') }}
            </h3>
            <p>
                {{ __('На сайте Аквариума применяется большое количество методов, помогающих поддерживать безопасную платформу, среди которых: защита от CSRF-атак в формах, защита от SQL-инъекций в запросах к БД, шифрование Cookie и применение технологии Session, шифрование пароля безопасным алгоритмом Bcrypt.') }}
            </p>
            <h3>
                {{ __('Фотографии проекта') }}
            </h3>
            <p>
                <a href="{{ asset('file-download/smi-img-full.zip') }}" download>
                    {{ __('Скачать фото без сжатия') }}
                </a>
            </p>
            <figure>
                <img src="{{ asset('img/smi/img-1.jpg') }}" class="img-fluid" alt="{{ __('Главная страница') }}">
                <figcaption>
                    {{ __('Главная страница.') }}
                </figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/smi/img-2.jpg') }}" class="img-fluid" alt="{{ __('Выбор аватарок') }}">
                <figcaption>
                    {{ __('Выбор аватарок.') }}
                </figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/smi/img-3.jpg') }}" class="img-fluid" alt="{{ __('Настройки профиля') }}">
                <figcaption>
                    {{ __('Настройки профиля.') }}
                </figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/smi/img-4.jpg') }}" class="img-fluid" alt="{{ __('Пользователи платформы') }}">
                <figcaption>
                    {{ __('Пользователи платформы.') }}
                </figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/smi/img-5.jpg') }}" class="img-fluid" alt="{{ __('Профиль на мобильных') }}">
                <figcaption>
                    {{ __('Профиль на мобильных.') }}
                </figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/smi/img-6.jpg') }}" class="img-fluid" alt="{{ __('Профиль пользователя') }}">
                <figcaption>
                    {{ __('Профиль пользователя.') }}
                </figcaption>
            </figure>
            <h4>
                {{ __('Кем создан Аквариум?') }}
            </h4>
            <p>
                {{ __('Аквариум разработан Даниилом Дыбка, студентом 1 курса ФИПМ ПСТГУ.') }}
            </p>
            <p>
                {{ __('Информация для связи:') }}
            </p>
            <ul>
                <li>
                    {{ __('почта:') }}
                    <a href="mailto:daniil@dybka.ru">
                        daniil@dybka.ru
                    </a>
                </li>
                <li>
                    {{ __('Телеграм:') }}
                    <a href="https://ddybka.t.me" target="_blank">
                        @ddybka
                    </a>
                </li>
            </ul>
            <h4>
                {{ __('Дополнительная информация и ссылки') }}
            </h4>
            <ul>
                <li>
                    {{ __('Ссылка на проект:') }}
                    <a href="https://aquariumsocial.ru" target="_blank">
                        https://aquariumsocial.ru
                    </a>
                </li>
                <li>
                    {{ __('Ссылка на Телеграм-канал:') }}
                    <a href="https://aquariumsocial.t.me" target="_blank">
                        https://aquariumsocial.t.me
                    </a>
                </li>
                <li>
                    {{ __('Ссылка на информацию о проекте:') }}
                    <a href="https://github.com/DanyaBooba/aquarium" target="_blank">
                        https://github.com/DanyaBooba/aquarium
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
