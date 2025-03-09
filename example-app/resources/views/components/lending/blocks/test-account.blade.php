<div class="px-4 py-5 text-center"
    style="background-color: var(--color-body-plane); margin-bottom: 7rem; border-radius: 24px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-2">
        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
        <path d="M8 11h8" />
        <path d="M8 7h6" />
    </svg>
    <h2 class="fs-1 text-center mb-2">{{ __('Не хотите вводить данные?') }}</h2>
    <p class="fs-5 mb-4 text-center">
        Просто воспользуйтесь тестовым аккаунтом.
    </p>
    <button type="button" onClick="buttonOpenURL('{{ route('auth.sign.test') }}')"
        class="btn btn-primary btn-lg px-4 me-md-2"
        style="border-radius: 100px; background-color: var(--page-main-accent) !important; border: none !important;">
        {{ __('Войти в тестовый аккаунт') }}
    </button>
</div>
