<header class="container">
    <div class="header__logo">
        <a href="{{ route('user') }}">
            <x-header-logo />
        </a>
    </div>
    <div class="header__meta">
        <div>
            <a href="{{ route('user.achievements') }}" class="{{ header_route_active_link('user.achievements') }}"
                title="{{ __('Достижения') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                    <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                    <path d="M4 22h16" />
                    <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                    <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                    <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                </svg>
            </a>
        </div>
        <div>
            <a href="{{ route('user.notifications') }}"
                class="notification {{ header_route_active_link('user.notifications') }}"
                title="{{ __('Уведомления') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                </svg>
            </a>
            @if (session()->has('notificationsUnread'))
                <div class="red-dot">
                    <div class="red-dot-content"></div>
                </div>
            @endif
        </div>
    </div>
</header>
