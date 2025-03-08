<div class="px-4 mb-5 py-5 text-center"
    style="background-color: var(--color-body-plane); margin-top: 3rem; border-radius: 24px;">
    <div class="pb-4">
        <svg width="150" height="150" viewBox="0 0 92 63" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M21.8646 33.0171C37.7476 3.85975 72.9545 5.11909 85.6855 17.3508C85.6855 17.3508 83.8313 35.7035 60.3841 45.8328C43.1074 53.2759 26.2946 45.4367 26.2946 45.4367C23.9046 48.9748 22.9488 56.161 11.7371 61.2757L15.6908 42.2047C13.6958 40.5813 7.88237 35.8465 0.588324 29.8947C11.4523 27.1416 16.1994 30.6105 21.8646 33.0171Z"
                fill="var(--page-main-accent)" />
            <circle cx="62.6046" cy="19.7019" r="5.57944" fill="var(--color-body-plane)" />
        </svg>
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
