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
                background-color: var(--page-main-accent);
            }

            .bg-gradient svg {
                stroke: white;
            }
        </style>
    @endpush

@section('main.content')
    <div class="container px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-12 col-lg-6">
                <img src="{{ asset('img/logo/cap.png') }}" class="d-block mx-lg-auto img-fluid" alt="Социальная сеть Аквариум"
                    width="700" height="500" loading="lazy" style="border-radius: 12px">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-2 mb-3">
                    {{ __('Аквариум — ваше пространство для общения и вдохновения') }}
                </h1>
                <p class="lead">
                    {{ __('Присоединяйтесь к сообществу, где каждый найдет что-то интересное для себя.') }}
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" onClick="buttonOpenURL('{{ route('auth.signup') }}')"
                        class="btn btn-primary btn-lg px-4 me-md-2" style="border-radius: 100px">
                        {{ __('Создать аккаунт') }}
                    </button>
                    <button type="button" onClick="buttonOpenURL('{{ route('main.faq') }}')"
                        class="btn btn-outline-secondary btn-lg px-4" style="border-radius: 100px">
                        {{ __('Узнать больше') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <h2 class="pb-2 fs-1 border-bottom d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="calc(1.375rem + 1.5vw)" height="calc(1.375rem + 1.5vw)"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-chart-no-axes-combined">
                <path d="M12 16v5" />
                <path d="M16 14v7" />
                <path d="M20 10v11" />
                <path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15" />
                <path d="M4 18v3" />
                <path d="M8 14v7" />
            </svg>
            {{ __('Статистика') }}
        </h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-user-round">
                        <path d="M18 20a6 6 0 0 0-12 0" />
                        <circle cx="12" cy="10" r="4" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">Большая аудитория</h3>
                <p>
                    Аудитория соцсети более 100 человек. Каждый пользователь может самовыражаться как он хочет.
                </p>
                <a href="{{ route('auth.signup') }}" class="icon-link">
                    Зарегистрироваться
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-headset">
                        <path
                            d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z" />
                        <path d="M21 16v2a4 4 0 0 1-4 4h-5" />
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">{{ __('Лучшие подписчики') }}</h3>
                <p>
                    На Телеграм-канал подписано более 50 человек. Там мы освещаем обновления и изменения соцсети.
                </p>
                <a href="https://aquariumsocial.t.me" target="_blank" class="icon-link">
                    Подписаться
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-cable">
                        <path d="M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1" />
                        <path d="M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9" />
                        <path d="M21 21v-2h-4" />
                        <path d="M3 5h4V3" />
                        <path d="M7 5a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a1 1 0 0 1 1-1V3" />
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">{{ __('Доступ по API') }}</h3>
                <p>
                    {{ __('API доступен для разработчиков. Это возможность работать с данными в удобном формате.') }}
                </p>
                <a href="{{ route('main.api') }}" class="icon-link">
                    Читать документацию
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <h2 class="pb-2 fs-1 border-bottom d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="calc(1.375rem + 1.5vw)" height="calc(1.375rem + 1.5vw)"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-shield-ban">
                <path
                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                <path d="m4.243 5.21 14.39 12.472" />
            </svg>
            {{ __('Безопасность') }}
        </h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-globe-lock">
                        <path d="M15.686 15A14.5 14.5 0 0 1 12 22a14.5 14.5 0 0 1 0-20 10 10 0 1 0 9.542 13" />
                        <path d="M2 12h8.5" />
                        <path d="M20 6V4a2 2 0 1 0-4 0v2" />
                        <rect width="8" height="5" x="14" y="6" rx="1" />
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">{{ __('Шифрование') }}</h3>
                <p>
                    {{ __('Пароли пользователей хранятся в зашифрованном виде с использованием алгоритма Bcrypt.') }}
                </p>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-hard-drive">
                        <line x1="22" x2="2" y1="12" y2="12" />
                        <path
                            d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                        <line x1="6" x2="6.01" y1="16" y2="16" />
                        <line x1="10" x2="10.01" y1="16" y2="16" />
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">{{ __('HTTPS') }}</h3>
                <p>
                    {{ __('Все данные передаются по защищенному протоколу HTTPS.') }}
                </p>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-shield-user">
                        <path
                            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                        <path d="M6.376 18.91a6 6 0 0 1 11.249.003" />
                        <circle cx="12" cy="11" r="4" />
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">{{ __('Прочая защита') }}</h3>
                <p>
                    {{ __('В Аквариуме используется защита от CSRF-атак, SQL-инъекций и используется шифрование cookie.') }}
                </p>
            </div>
        </div>
    </div>

    <h2>О проекте</h2>
    <h2>Преимущества</h2>
    <h2>Статистика и достижения</h2>
    <h2>Планы на будущее</h2>

    <div class="px-4 py-5 text-center"
        style="background-color: var(--color-body-plane); margin-top: 3rem; border-radius: 24px;">
        <div class="py-5">
            <h1 class="display-5 fw-bold">{{ __('Присоединяйтесь к Аквариуму прямо сейчас!') }}</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">
                    {{ __('Создайте аккаунт в один клик и начните общаться с людьми, которые разделяют ваши интересы.') }}
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" onClick="buttonOpenURL('{{ route('auth.signup') }}')"
                        class="btn btn-primary btn-lg px-4 me-md-2" style="border-radius: 100px">
                        {{ __('Создать аккаунт') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
