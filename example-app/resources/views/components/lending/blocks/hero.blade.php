<div class="container px-0 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-12 col-lg-6 lending-hero-image">
            <div class="d-flex justify-content-center my-auto">
                <a href="{{ route('auth.signup') }}" aria-label="{{ __('Создать аккаунт в соцсети Аквариум') }}"
                    style="margin-right: -30px; margin-top: -4px;">
                    <picture>
                        <source type="image/webp" srcSet="{{ asset('img/main/Nothing Phone.webp') }}" />
                        <img src="{{ asset('img/main/Nothing Phone.png') }}" class="img-fluid" width="200"
                            alt="{{ __('Телефон со страницей сайта') }}" />
                    </picture>
                </a>
                <a href="{{ route('auth.signup') }}" aria-label="{{ __('Создать аккаунт в соцсети Аквариум') }}">
                    <picture>
                        <source type="image/webp" srcSet="{{ asset('img/main/iPhone.webp') }}" />
                        <img src="{{ asset('img/main/iPhone.png') }}" class="img-fluid" width="200"
                            alt="{{ __('Телефон со страницей сайта') }}" />
                    </picture>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-2 mb-3">
                {{ __('Аквариум — ваше пространство для общения и вдохновения') }}
            </h1>
            <p class="lead mb-5">
                {{ __('Присоединяйтесь к сообществу, где каждый найдет что-то интересное для себя.') }}
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" onClick="buttonOpenURL('{{ route('auth.signup') }}')"
                    class="btn btn-primary btn-lg me-md-3"
                    style="border-radius: 100px; background-color: var(--page-main-accent) !important; border: none !important; padding: 12px 30px;">
                    {{ __('Создать аккаунт') }}
                </button>
                <button type="button" onClick="buttonOpenURL('{{ route('main.faq') }}')"
                    class="btn btn-outline-secondary btn-lg" style="border-radius: 100px; padding: 12px 30px;">
                    {{ __('Узнать больше') }}
                </button>
            </div>
        </div>
    </div>
</div>
