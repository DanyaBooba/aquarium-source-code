<header class="header navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <div class="header-content justify-content-lg-start">
            <a href="{{ route('main.index') }}" aria-label="{{ __('Главная страница') }}" class="header-content-logo link-body-emphasis">
                <x-header-logo />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="nav col-12 ms-lg-3 col-lg-auto me-lg-auto mb-md-0 header-content-links">
                    <li><a href="{{ route('main.about') }}" class="nav-link {{ active_link('main.about') }}">{{ __('Информация') }}</a></li>
                    <li><a href="{{ route('main.faq') }}" class="nav-link {{ active_link('main.faq') }}">{{ __('FAQ') }}</a></li>
                    <li><a href="{{ route('blog.index') }}" class="nav-link {{ active_link('blog.index') }}" style="pointer-events: none">{{ __('Новости') }}</a></li>
                    <li><a href="{{ route('main.api') }}" class="nav-link {{ active_link('main.api') }}" style="pointer-events: none">{{ __('API') }}</a></li>
                    <li><a href="{{ route('main.oauth') }}" class="nav-link {{ active_link('main.oauth') }}" style="pointer-events: none">{{ __('OAuth') }}</a></li>
                </ul>
                <ul class="nav col-12 col-lg-auto ms-lg-auto mb-md-0 header-content-links">
                    @if(user_login())
                    <li>
                        <a href="{{ route('user.index') }}" class="link-body-emphasis header-content-profile">
                            <span>
                                <img src="{{ asset('img/user/logo/MAN1.png') }}" alt="{{ __('Профиль') }}">
                            </span>
                            <p>{{ __('Профиль') }}</p>
                        </a>
                    </li>
                    @else
                    <li><a href="{{ route('auth.signin') }}" class="nav-link link-secondary">{{ __('Войти') }}</a></li>
                    @endif
                    <li><a href="{{ route('main.download') }}" class="nav-link link-download" style="pointer-events: none">{{ __('Скачать') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
