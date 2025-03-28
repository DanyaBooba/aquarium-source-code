<header class="header navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <div class="header-content justify-content-lg-start">
            <a href="{{ route('main') }}" aria-label="{{ __('Главная страница') }}"
                class="header-content-logo link-body-emphasis">
                <x-header-logo />
            </a>
            <button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" x2="20" y1="12" y2="12" />
                    <line x1="4" x2="20" y1="6" y2="6" />
                    <line x1="4" x2="20" y1="18" y2="18" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="nav col-12 col-lg-auto mx-lg-auto mb-md-0 header-content-links">
                    <li><a href="{{ route('main.about') }}"
                            class="nav-link {{ header_route_active_link('main.about') }}">{{ __('О проекте') }}</a>
                    </li>
                    {{-- <li><a href="{{ route('main.about') }}"
                            class="nav-link {{ header_route_visible_link('main.about') }}">{{ __('Галерея') }}</a>
                    </li> --}}
                    <li><a href="{{ route('main.faq') }}"
                            class="nav-link {{ header_route_active_link('main.faq') }}">{{ __('FAQ') }}</a></li>
                    <li><a href="{{ route('main.api') }}"
                            class="nav-link {{ header_route_active_link('main.api') }}">{{ __('API') }}</a></li>
                    <li><a href="{{ route('main.history') }}"
                            class="nav-link {{ header_route_visible_link('main.history') }}">{{ __('История') }}</a>
                    </li>
                    <li><a href="https://t.me/s/aquariumsocial" target="_blank"
                            class="nav-link {{ header_route_active_link('blog.index') }}">
                            {{ __('Новости') }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-square-arrow-out-up-right">
                                <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                                <path d="m21 3-9 9" />
                                <path d="M15 3h6v6" />
                            </svg>
                        </a>
                    </li>
                    <li><a href="{{ route('main.smi') }}"
                            class="nav-link {{ header_route_visible_link('main.smi') }}">{{ __('СМИ') }}</a>
                    </li>
                    <li><a href="{{ route('main.oauth') }}"
                            class="nav-link {{ header_route_visible_link('main.oauth') }}">{{ __('OAuth') }}</a>
                    </li>
                </ul>
                <ul class="nav col-12 col-lg-auto mb-md-0 header-content-links">
                    {{-- @if (user_login())
                        <li>
                            <a href="{{ route('user') }}" class="link-body-emphasis header-content-profile">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                {{ __('Профиль') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('auth.signin') }}" class="nav-link link-secondary header-content-sign">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-in">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                    <polyline points="10 17 15 12 10 7" />
                                    <line x1="15" x2="3" y1="12" y2="12" />
                                </svg>
                                {{ __('Войти') }}
                            </a>
                        </li>
                    @endif --}}
                    <li style="padding: 0 !important">
                        @if (user_login())
                            <a href="{{ route('user') }}" class="nav-link link-download ms-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                {{ __('Профиль') }}
                            </a>
                        @else
                            <a href="{{ route('auth.signin') }}" class="nav-link ms-0 link-download">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-in">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                    <polyline points="10 17 15 12 10 7" />
                                    <line x1="15" x2="3" y1="12" y2="12" />
                                </svg>
                                {{ __('Войти') }}
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
