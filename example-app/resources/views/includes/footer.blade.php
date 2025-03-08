<div class="container">
    <footer class="footer">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3"
            style="border-color: var(--header-border) !important">
            <li class="nav-item ps-0"><a href="{{ route('main.about') }}"
                    class="nav-link px-3 text-body-secondary">{{ __('О проекте') }}</a>
            </li>
            <li class="nav-item ps-0"><a href="{{ route('main.faq') }}" class="nav-link px-3 text-body-secondary">FAQ</a>
            </li>
            <li class="nav-item ps-0"><a href="{{ route('main.api') }}"
                    class="nav-link px-3 text-body-secondary">API</a>
            </li>
            <li class="nav-item ps-0"><a href="{{ route('main.oauth') }}"
                    class="nav-link px-3 text-body-secondary">OAuth</a></li>
            <li class="nav-item ps-0"><a href="{{ route('main.history') }}"
                    class="nav-link px-3 text-body-secondary">{{ __('История') }}</a>
            </li>
            <li class="nav-item ps-0"><a href="{{ route('main.smi') }}"
                    class="nav-link px-3 text-body-secondary">{{ __('СМИ') }}</a>
            </li>
            <li class="nav-item ps-0"><a href="{{ route('main.terms') }}"
                    class="nav-link px-3 text-body-secondary">{{ __('Приватность') }}</a>
            </li>
            <li class="nav-item ps-0"><a href="https://aquariumsocial.t.me" target="_blank"
                    class="nav-link px-3 text-body-secondary d-flex align-items-center gap-1">
                    {{ __('Телеграм-канал') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right">
                        <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                        <path d="m21 3-9 9" />
                        <path d="M15 3h6v6" />
                    </svg>
                </a>
            </li>
        </ul>
        <div class="footer__bottom">
            <div class="theme-toggle">
                <input onClick="buttonOpenURL('{{ route('main.setlocale', 'ru') }}')" type="radio" class="btn-check"
                    name="language" id="radioLang1" value="light" autocomplete="off"
                    {{ footer_locale_active_link('ru') }}>
                <label class="btn btn-secondary" for="radioLang1">Русский</label>
                <input onClick="buttonOpenURL('{{ route('main.setlocale', 'en') }}')" type="radio" class="btn-check"
                    name="language" id="radioLang2" value="auto" autocomplete="off"
                    {{ footer_locale_active_link('en') }}>
                <label class="btn btn-secondary" for="radioLang2">Английский</label>
            </div>
            <p>
                <span style="opacity: .5">© 2019-{{ date('Y') }}</span>
                <a href="{{ route('main') }}" class="text-decoration-none">
                    {{ __('Аквариум') }}
                </a>
            </p>
            <div class="theme-toggle">
                <input onClick="ButtonLight()" type="radio" class="btn-check" name="color-theme" id="radio1"
                    value="light" autocomplete="off">
                <label class="btn btn-secondary" for="radio1">Светлая</label>
                <input onClick="ButtonAuto()" type="radio" class="btn-check" name="color-theme" id="radio2"
                    value="auto" autocomplete="off" checked>
                <label class="btn btn-secondary" for="radio2">Авто</label>
                <input onClick="ButtonDark()" type="radio" class="btn-check" name="color-theme" id="radio3"
                    value="dark" autocomplete="off">
                <label class="btn btn-secondary" for="radio3">Тёмная</label>
            </div>
        </div>
    </footer>
</div>

{{-- <footer class="footer py-3 mt-4">
    <div class="container">
        <div class="footer__main">
            <span>© 2019-{{ date('Y') }}</span>
            <a href="{{ route('main') }}">
                {{ __('Аквариум') }}
            </a>
        </div>
        <div class="footer__social">
            <div class="footer__privacy">
                <a href="{{ route('main.terms') }}">{{ __('Приватность') }}</a>
            </div>
            <div class="footer__language">
                <a href="{{ route('main.setlocale', 'ru') }}"
                    class="{{ footer_locale_active_link('ru') }}">{{ __('ru') }}</a>
                <a href="{{ route('main.setlocale', 'en') }}"
                    class="{{ footer_locale_active_link('en') }}">{{ __('en') }}</a>
            </div>
        </div>
    </div>
</footer> --}}
