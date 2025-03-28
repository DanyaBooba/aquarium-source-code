@extends('layouts.auth.base')

@section('auth.root')
    <main class="form-signup row gx-5 w-100 m-auto align-items-center justify-content-center">
        <div class="col-md-6 form-signup-display">
            <div style="margin-top: 1rem">
                <h4 class="d-flex flex-wrap flex-column">
                    <span class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-2"
                            fill="none" stroke="var(--text-success)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg> <span class="display-5 text-success" style="margin-top: .5rem">100</span>
                    </span>
                    <span style="margin-top: .5rem">{{ __('человек зарегистрировано') }}</span>
                </h4>
            </div>
            <div style="margin-top: 2rem">
                <h4 class="d-flex flex-wrap flex-column">
                    <span class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            class="me-2" fill="none" stroke="var(--text-success)" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <polyline points="10 17 15 12 10 7" />
                            <line x1="15" x2="3" y1="12" y2="12" />
                        </svg> <span class="display-5 text-success" style="margin-top: .5rem">5&#x2009;000</span>
                    </span>
                    <span style="margin-top: .5rem">{!! __('посещений страниц за год') !!}</span>
                </h4>
            </div>
            <div style="margin-top: 2rem">
                <h4 class="d-flex flex-wrap flex-column">
                    <span class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" class="me-1"
                            viewBox="0 0 24 24" fill="none" stroke="var(--text-success)" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-heart">
                            <path d="M3 10h18V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7" />
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <path
                                d="M21.29 14.7a2.43 2.43 0 0 0-2.65-.52c-.3.12-.57.3-.8.53l-.34.34-.35-.34a2.43 2.43 0 0 0-2.65-.53c-.3.12-.56.3-.79.53-.95.94-1 2.53.2 3.74L17.5 22l3.6-3.55c1.2-1.21 1.14-2.8.19-3.74Z" />
                        </svg><span class="display-5 text-success" style="margin-top: .5rem">50</span>
                    </span>
                    <span style="line-height: 140%">{!! __('подписчиков Телеграм канала') !!}</span>
                </h4>
            </div>
        </div>

        <div class="authentication col-md-4">
            @yield('auth.header')

            @yield('auth.signup')

            <p class="authentication-text-more">
                © 2020–{{ date('Y') }}
                <a href="{{ route('main') }}" class="text-decoration-none">
                    {{ __('Аквариум') }}
                </a>
            </p>
        </div>

    </main>
@endsection
