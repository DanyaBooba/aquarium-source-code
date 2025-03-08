<h2 class="pb-2 fs-1 mb-4 border-bottom d-flex align-items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="calc(1.375rem + 1.5vw)" height="calc(1.375rem + 1.5vw)"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" class="lucide lucide-notebook-pen">
        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
        <path d="M2 6h4" />
        <path d="M2 10h4" />
        <path d="M2 14h4" />
        <path d="M2 18h4" />
        <path
            d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
    </svg>
    {{ __('В планах на реализацию') }}
</h2>
<div class="d-flex flex-wrap gap-3" style="margin-bottom: 5rem">
    <div style="border: .2rem dashed var(--color-body-plane); border-radius: 24px; width: fit-content; padding: 2rem;">
        <h3 class="d-flex flex-wrap flex-column h-100 justify-content-center mb-0">
            <span class="container-simple-numbers-text">{{ __('Автоматическое') }}</span>
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('тестирование') }}</span>
            </span>
        </h3>
    </div>
    <div style="border: .2rem dashed var(--color-body-plane); border-radius: 24px; width: fit-content; padding: 2rem;">
        <h3 class="d-flex flex-wrap flex-column h-100 justify-content-center mb-0">
            <span class="container-simple-numbers-text">{{ __('Расширенная') }}</span>
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('доступность') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('для лиц с ОВЗ') }}</span>
        </h3>
    </div>
    <div style="border: .2rem dashed var(--color-body-plane); border-radius: 24px; width: fit-content; padding: 2rem;">
        <h3 class="d-flex flex-wrap flex-column h-100 justify-content-center mb-0">
            <span class="container-simple-numbers-text">{{ __('Личные') }}</span>
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('сообщения') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('в Аквариуме') }}</span>
        </h3>
    </div>
    <div style="border: .2rem dashed var(--color-body-plane); border-radius: 24px; width: fit-content; padding: 2rem;">
        <h3 class="d-flex flex-wrap flex-column h-100 justify-content-center mb-0">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('Android и iOS') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('приложения') }}</span>
        </h3>
    </div>
    <div style="border: .2rem dashed var(--color-body-plane); border-radius: 24px; width: fit-content; padding: 2rem;">
        <h3 class="d-flex flex-wrap flex-column h-100 justify-content-center mb-0">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('OAuth') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('Аквариума') }}</span>
        </h3>
    </div>
</div>
