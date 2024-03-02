@extends('layouts.auth')

@section('page.title', 'Вход в аккаунт')

@section('auth.content')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="authentication">
            <div class="authentication-back mb-5">
                <a href="{{ route('main.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </a>
            </div>
            {{-- <svg viewBox="0 0 1403 270" xmlns="http://www.w3.org/2000/svg" class="authentication-logo mb-5">
                <path d="M1356.22 62.9C1387.42 62.9 1402.42 87.8 1402.42 121.1V215H1377.82V126.8C1377.82 98 1371.52 83.9 1347.22 83.9C1317.52 83.9 1299.82 110.3 1299.82 149.3V215H1275.22V126.8C1275.22 98 1268.92 83.9 1244.62 83.9C1214.92 83.9 1197.22 110.3 1197.22 149.3V215H1172.62V65.9H1197.22V91.4L1193.32 108.2H1200.22C1206.22 81.2 1221.82 62.9 1253.62 62.9C1280.62 62.9 1295.02 81.5 1298.32 108.2H1302.82C1308.82 81.2 1324.42 62.9 1356.22 62.9Z" />
                <path d="M1055.07 197C1086.57 197 1108.77 172.1 1108.77 132.2V65.9H1133.07V215H1108.77V189.2L1112.67 172.1H1105.77C1099.77 199.1 1080.87 218 1048.47 218C1014.57 218 992.67 198.5 992.67 157.1V65.9H1017.27V153.8C1017.27 185 1029.27 197 1055.07 197Z" />
                <path d="M907.341 42.2C895.041 42.2 885.741 33.2 885.741 21.2C885.741 9.8 895.041 0.5 907.341 0.5C919.341 0.5 928.941 9.8 928.941 21.2C928.941 33.2 919.341 42.2 907.341 42.2ZM857.541 215V194H899.541V84.2L868.641 86.9V65.9L903.141 62.9C917.241 61.7 922.641 69.5 922.641 80.9V194H964.641V215H857.541Z" />
                <path d="M731.119 215V83.6C731.119 69.5 737.719 62.6 751.819 63.2L834.619 65.9V86.9L755.719 84.2V215H731.119Z" />
                <path d="M548.166 173.6C548.166 149.9 562.266 133.7 597.066 130.1L656.466 124.4C654.966 97.1 640.266 83.6 614.466 83.6C592.866 83.6 572.766 93.2 572.766 121.4H548.766C548.766 90.5 572.166 62.9 614.466 62.9C656.166 62.9 681.066 90.5 681.066 130.4V194H702.966V215H676.566C665.166 215 658.866 208.7 658.866 197.6V189.5L662.766 173.9H655.566C649.866 196.7 633.966 218 597.966 218C554.766 218 548.166 189.2 548.166 173.6ZM572.766 170.6C572.766 187.7 583.566 197 600.966 197C634.866 197 656.466 173.6 656.466 142.7L601.266 148.4C582.366 150.2 572.766 155.9 572.766 170.6Z" />
                <path d="M433.683 197C465.183 197 487.383 172.1 487.383 132.2V65.9H511.683V215H487.383V189.2L491.283 172.1H484.383C478.383 199.1 459.483 218 427.083 218C393.183 218 371.283 198.5 371.283 157.1V65.9H395.883V153.8C395.883 185 407.883 197 433.683 197Z" />
                <path d="M331.58 65.9V269.6H306.98V193.1L311.18 176.3H303.98C297.68 199.4 277.88 218 243.98 218C200.48 218 172.58 184.7 172.58 140.6C172.58 96.2 200.48 62.9 243.98 62.9C277.88 62.9 297.68 81.5 303.98 104.9H311.18L306.98 87.8V65.9H331.58ZM306.98 140.6C306.98 100.7 281.78 83.9 250.88 83.9C219.98 83.9 197.18 101.3 197.18 140.6C197.18 179.6 219.98 197 250.88 197C281.78 197 306.98 180.2 306.98 140.6Z" />
                <path d="M0.900024 173.6C0.900024 149.9 15 133.7 49.8 130.1L109.2 124.4C107.7 97.1 93 83.6 67.2 83.6C45.6 83.6 25.5 93.2 25.5 121.4H1.50003C1.50003 90.5 24.9 62.9 67.2 62.9C108.9 62.9 133.8 90.5 133.8 130.4V194H155.7V215H129.3C117.9 215 111.6 208.7 111.6 197.6V189.5L115.5 173.9H108.3C102.6 196.7 86.7 218 50.7 218C7.50003 218 0.900024 189.2 0.900024 173.6ZM25.5 170.6C25.5 187.7 36.3 197 53.7 197C87.6 197 109.2 173.6 109.2 142.7L54 148.4C35.1 150.2 25.5 155.9 25.5 170.6Z" />
            </svg> --}}
            <svg viewBox="0 0 57 10" class="authentication-logo mb-5" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.636 5.344C0.636 4.32 1.288 3.74 2.592 3.604L4.968 3.376C4.912 2.288 4.352 1.744 3.288 1.744C2.808 1.744 2.408 1.864 2.088 2.104C1.776 2.344 1.62 2.728 1.62 3.256H0.66C0.66 2.608 0.896 2.056 1.368 1.6C1.84 1.144 2.48 0.916 3.288 0.916C4.112 0.916 4.76 1.164 5.232 1.66C5.712 2.156 5.952 2.808 5.952 3.616V6.16H6.828V7H5.772C5.3 7 5.064 6.768 5.064 6.304V5.98L5.22 5.356H4.932C4.636 6.532 3.868 7.12 2.628 7.12C2.3 7.12 2.008 7.08 1.752 7C1.504 6.912 1.312 6.808 1.176 6.688C1.04 6.56 0.928 6.412 0.84 6.244C0.752 6.068 0.696 5.912 0.672 5.776C0.648 5.632 0.636 5.488 0.636 5.344ZM1.62 5.224C1.62 5.56 1.72 5.82 1.92 6.004C2.12 6.188 2.396 6.28 2.748 6.28C3.412 6.28 3.948 6.076 4.356 5.668C4.764 5.26 4.968 4.74 4.968 4.108L2.76 4.336C2.368 4.376 2.08 4.464 1.896 4.6C1.712 4.728 1.62 4.936 1.62 5.224ZM12.9341 7H11.7821L9.65813 4.408C9.56213 4.432 9.46213 4.444 9.35813 4.444H8.93813V7H7.95413V1.036H8.93813V3.568H9.43013L10.9781 1.48C11.1941 1.184 11.4861 1.036 11.8541 1.036H12.7901V1.876H11.8181L10.3541 3.844L12.9341 7ZM14.2119 7V1.036H16.3719C17.1559 1.036 17.7479 1.14 18.1479 1.348C18.5559 1.556 18.7599 1.928 18.7599 2.464C18.7599 2.904 18.6439 3.22 18.4119 3.412C18.1879 3.596 17.9199 3.7 17.6079 3.724V4.012C18.6719 4.028 19.2039 4.5 19.2039 5.428C19.2039 6.476 18.4079 7 16.8159 7H14.2119ZM15.1719 3.508H16.3719C16.9159 3.508 17.2879 3.46 17.4879 3.364C17.6959 3.26 17.7999 3.012 17.7999 2.62C17.7999 2.292 17.6919 2.076 17.4759 1.972C17.2599 1.868 16.8919 1.816 16.3719 1.816H15.1719V3.508ZM15.1719 6.22H16.8159C17.3359 6.22 17.7039 6.164 17.9199 6.052C18.1359 5.932 18.2439 5.684 18.2439 5.308C18.2439 4.908 18.1319 4.64 17.9079 4.504C17.6919 4.36 17.3279 4.288 16.8159 4.288H15.1719V6.22ZM20.3704 5.344C20.3704 4.32 21.0224 3.74 22.3264 3.604L24.7024 3.376C24.6464 2.288 24.0864 1.744 23.0224 1.744C22.5424 1.744 22.1424 1.864 21.8224 2.104C21.5104 2.344 21.3544 2.728 21.3544 3.256H20.3944C20.3944 2.608 20.6304 2.056 21.1024 1.6C21.5744 1.144 22.2144 0.916 23.0224 0.916C23.8464 0.916 24.4944 1.164 24.9664 1.66C25.4464 2.156 25.6864 2.808 25.6864 3.616V6.16H26.5624V7H25.5064C25.0344 7 24.7984 6.768 24.7984 6.304V5.98L24.9544 5.356H24.6664C24.3704 6.532 23.6024 7.12 22.3624 7.12C22.0344 7.12 21.7424 7.08 21.4864 7C21.2384 6.912 21.0464 6.808 20.9104 6.688C20.7744 6.56 20.6624 6.412 20.5744 6.244C20.4864 6.068 20.4304 5.912 20.4064 5.776C20.3824 5.632 20.3704 5.488 20.3704 5.344ZM21.3544 5.224C21.3544 5.56 21.4544 5.82 21.6544 6.004C21.8544 6.188 22.1304 6.28 22.4824 6.28C23.1464 6.28 23.6824 6.076 24.0904 5.668C24.4984 5.26 24.7024 4.74 24.7024 4.108L22.4944 4.336C22.1024 4.376 21.8144 4.464 21.6304 4.6C21.4464 4.728 21.3544 4.936 21.3544 5.224ZM27.6885 1.036H28.6725V1.912L28.5165 2.596H28.7925C28.9285 2.1 29.2005 1.696 29.6085 1.384C30.0165 1.072 30.5485 0.916 31.2045 0.916C32.0525 0.916 32.7365 1.208 33.2565 1.792C33.7845 2.376 34.0485 3.12 34.0485 4.024C34.0485 4.92 33.7845 5.66 33.2565 6.244C32.7365 6.828 32.0525 7.12 31.2045 7.12C30.5565 7.12 30.0245 6.968 29.6085 6.664C29.2005 6.352 28.9285 5.948 28.7925 5.452H28.5165L28.6725 6.124V9.184H27.6885V1.036ZM28.6725 4.024C28.6725 4.776 28.8805 5.34 29.2965 5.716C29.7205 6.092 30.2605 6.28 30.9165 6.28C31.5645 6.28 32.0845 6.092 32.4765 5.716C32.8685 5.34 33.0645 4.776 33.0645 4.024C33.0645 3.272 32.8685 2.708 32.4765 2.332C32.0845 1.948 31.5645 1.756 30.9165 1.756C30.2605 1.756 29.7205 1.944 29.2965 2.32C28.8805 2.696 28.6725 3.264 28.6725 4.024ZM41.2875 7H40.3155V1.888L40.4715 1.324H40.1955L37.5435 7H35.5635V1.036H36.5475V6.136L36.3915 6.724H36.6675L39.3195 1.036H41.2875V7ZM47.5577 1.036H48.6257L46.0337 6.94V8.608C46.0337 9.104 45.7577 9.34 45.2057 9.316L42.9017 9.208V8.368L45.0497 8.476V6.94L42.4457 1.036H43.5257L45.3977 5.68V6.136H45.6857V5.68L47.5577 1.036ZM49.8955 7V1.036H51.8635L53.2675 6.724H53.5435L54.9475 1.036H56.9275V7H55.9435V1.9L56.1115 1.324H55.8235L54.3955 7H52.4275L50.9995 1.324H50.7235L50.8795 1.9V7H49.8955Z" />
            </svg>

            <h1 class="h3">{{ __('Войти в аккаунт') }}</h1>

            <div id="signin-choose">
                <div class="d-flex flex-column">
                    <div id="signin-choose-yandex">
                        <button class="btn fs-5" onClick="signinYandex()">
                            <x-yandex />
                            {{ __('Яндекс') }}
                        </button>
                    </div>
                    <div id="signin-choose-google">
                        <button class="btn fs-5" onClick="signinGoogle()">
                            <x-google />
                            {{ __('Google') }}
                        </button>
                    </div>
                    <x-sign.choose-or />
                    <div id="signin-choose-email">
                        <button class="btn fs-5" onClick="showEmail()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                            {{ __('Почта') }}
                        </button>
                    </div>
                </div>
            </div>

            <form id="signin-email" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" autofocus>
                    <label for="email">{{ __('Почта') }}</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">{{ __('Пароль') }}</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ __('Запомнить меня') }}
                    </label>
                </div>

                <button class="btn btn-primary py-3" type="submit">{{ __('Войти') }}</button>
            </form>

            <p class="mt-5 mb-3 text-body-secondary text-center">© 2020–{{ date('Y') }} {{ env('APP_TITLE_SHORT') }}</p>
        </div>
    </main>

    <script src="{{ asset('js/auth/sign.js') }}"></script>
    <script src="{{ asset('js/auth/signin.js') }}"></script>
</body>
@endsection
