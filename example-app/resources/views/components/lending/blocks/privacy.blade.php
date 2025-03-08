<div class="container px-0 py-5">
    <h2 class="pb-2 fs-1 border-bottom d-flex align-items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="calc(1.375rem + 1.5vw)" height="calc(1.375rem + 1.5vw)"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-shield-ban">
            <path
                d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
            <path d="m4.243 5.21 14.39 12.472" />
        </svg>
        {{ __('Безопасность') }}
    </h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
            <div
                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-globe-lock">
                    <path d="M15.686 15A14.5 14.5 0 0 1 12 22a14.5 14.5 0 0 1 0-20 10 10 0 1 0 9.542 13" />
                    <path d="M2 12h8.5" />
                    <path d="M20 6V4a2 2 0 1 0-4 0v2" />
                    <rect width="8" height="5" x="14" y="6" rx="1" />
                </svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">{{ __('Шифрование') }}</h3>
            <p>
                {{ __('Пароли пользователей хранятся в зашифрованном виде с использованием алгоритма Bcrypt.') }}
            </p>
        </div>
        <div class="feature col">
            <div
                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-hard-drive">
                    <line x1="22" x2="2" y1="12" y2="12" />
                    <path
                        d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                    <line x1="6" x2="6.01" y1="16" y2="16" />
                    <line x1="10" x2="10.01" y1="16" y2="16" />
                </svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">{{ __('HTTPS') }}</h3>
            <p>
                {{ __('Все данные передаются по защищенному протоколу HTTPS.') }}
            </p>
        </div>
        <div class="feature col">
            <div
                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shield-user">
                    <path
                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                    <path d="M6.376 18.91a6 6 0 0 1 11.249.003" />
                    <circle cx="12" cy="11" r="4" />
                </svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">{{ __('Прочая защита') }}</h3>
            <p>
                {{ __('В Аквариуме используется защита от CSRF-атак, защита от SQL-инъекций и шифрование cookie.') }}
            </p>
        </div>
    </div>
</div>
