<div class="container px-0 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-12 col-lg-6 lending-hero-image">
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
