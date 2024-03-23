{{-- <footer class="footer py-3 mt-4">
    <div class="container">
        <p class="small me-auto">
            © 2020-{{ date('Y') }}
            <a href="{{ route('main.index') }}">
                {{ __('Аквариум') }}
            </a>
        </p>
        <a href="{{ route('main.terms.privacy') }}" class="small">{{ __('Политика конфиденциальности') }}</a>
    </div>
</footer> --}}

<footer class="footer">
    <div class="container">
        <div class="footer-left">
            <h4>
                <a href="/" class="d-block mb-2" aria-label="Главная страница">
                    {{ __('Аквариум') }}
                </a>
            </h4>
            <p>
                {!! __('Аквариум — это социальная сеть,<br> где вы можете создать свой мир.') !!}
            </p>
            <ul class="nav flex-column">
                <li>
                    <a href="//aquariumsocial.t.me" target="_blank">
                        {{ __('Телеграм') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                    </a>
                </li>
                <li>
                    <a href="//vk.com/aquariumsocial" target="_blank">
                        {{ __('ВКонтакте') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                    </a>
                </li>
            </ul>
            <ul class="list-locales">
                <li>
                    <a href="{{ route('main.setlocale', 'ru') }}" class="{{ footer_language_locale('ru') }}">
                        ru
                    </a>
                </li>
                <li>
                    <a href="{{ route('main.setlocale', 'en') }}" class="{{ footer_language_locale('en') }}">
                        en
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer-list">
            <h5>
                {{ __('Исследуй') }}
            </h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('main.about') }}" class="nav-link">
                        {{ __('Информация') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('main.faq') }}" class="nav-link">
                        {{ __('FAQ') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
