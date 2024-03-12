<div class="social">
    <div class="social-left">
        <div>
            <a href="{{ route('user.exit') }}" class="social-left-exit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
            </a>
        </div>
        <div>
            <a href="{{ route('main.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </a>
        </div>
    </div>
    <div class="social-right">
        <div>
            <a href="{{ route('user.add-post') }}" class="{{ active_link('user.add-post') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
            </a>
        </div>
        <div>
            <a href="{{ route('user.search') }}" class="{{ active_link('user.search') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </a>
        </div>
    </div>
</div>

<a href="{{ route('user.index') }}">
    <svg viewBox="0 0 57 10" xmlns="http://www.w3.org/2000/svg" class="logo">
        <path d="M0.636 5.344C0.636 4.32 1.288 3.74 2.592 3.604L4.968 3.376C4.912 2.288 4.352 1.744 3.288 1.744C2.808 1.744 2.408 1.864 2.088 2.104C1.776 2.344 1.62 2.728 1.62 3.256H0.66C0.66 2.608 0.896 2.056 1.368 1.6C1.84 1.144 2.48 0.916 3.288 0.916C4.112 0.916 4.76 1.164 5.232 1.66C5.712 2.156 5.952 2.808 5.952 3.616V6.16H6.828V7H5.772C5.3 7 5.064 6.768 5.064 6.304V5.98L5.22 5.356H4.932C4.636 6.532 3.868 7.12 2.628 7.12C2.3 7.12 2.008 7.08 1.752 7C1.504 6.912 1.312 6.808 1.176 6.688C1.04 6.56 0.928 6.412 0.84 6.244C0.752 6.068 0.696 5.912 0.672 5.776C0.648 5.632 0.636 5.488 0.636 5.344ZM1.62 5.224C1.62 5.56 1.72 5.82 1.92 6.004C2.12 6.188 2.396 6.28 2.748 6.28C3.412 6.28 3.948 6.076 4.356 5.668C4.764 5.26 4.968 4.74 4.968 4.108L2.76 4.336C2.368 4.376 2.08 4.464 1.896 4.6C1.712 4.728 1.62 4.936 1.62 5.224ZM12.9341 7H11.7821L9.65813 4.408C9.56213 4.432 9.46213 4.444 9.35813 4.444H8.93813V7H7.95413V1.036H8.93813V3.568H9.43013L10.9781 1.48C11.1941 1.184 11.4861 1.036 11.8541 1.036H12.7901V1.876H11.8181L10.3541 3.844L12.9341 7ZM14.2119 7V1.036H16.3719C17.1559 1.036 17.7479 1.14 18.1479 1.348C18.5559 1.556 18.7599 1.928 18.7599 2.464C18.7599 2.904 18.6439 3.22 18.4119 3.412C18.1879 3.596 17.9199 3.7 17.6079 3.724V4.012C18.6719 4.028 19.2039 4.5 19.2039 5.428C19.2039 6.476 18.4079 7 16.8159 7H14.2119ZM15.1719 3.508H16.3719C16.9159 3.508 17.2879 3.46 17.4879 3.364C17.6959 3.26 17.7999 3.012 17.7999 2.62C17.7999 2.292 17.6919 2.076 17.4759 1.972C17.2599 1.868 16.8919 1.816 16.3719 1.816H15.1719V3.508ZM15.1719 6.22H16.8159C17.3359 6.22 17.7039 6.164 17.9199 6.052C18.1359 5.932 18.2439 5.684 18.2439 5.308C18.2439 4.908 18.1319 4.64 17.9079 4.504C17.6919 4.36 17.3279 4.288 16.8159 4.288H15.1719V6.22ZM20.3704 5.344C20.3704 4.32 21.0224 3.74 22.3264 3.604L24.7024 3.376C24.6464 2.288 24.0864 1.744 23.0224 1.744C22.5424 1.744 22.1424 1.864 21.8224 2.104C21.5104 2.344 21.3544 2.728 21.3544 3.256H20.3944C20.3944 2.608 20.6304 2.056 21.1024 1.6C21.5744 1.144 22.2144 0.916 23.0224 0.916C23.8464 0.916 24.4944 1.164 24.9664 1.66C25.4464 2.156 25.6864 2.808 25.6864 3.616V6.16H26.5624V7H25.5064C25.0344 7 24.7984 6.768 24.7984 6.304V5.98L24.9544 5.356H24.6664C24.3704 6.532 23.6024 7.12 22.3624 7.12C22.0344 7.12 21.7424 7.08 21.4864 7C21.2384 6.912 21.0464 6.808 20.9104 6.688C20.7744 6.56 20.6624 6.412 20.5744 6.244C20.4864 6.068 20.4304 5.912 20.4064 5.776C20.3824 5.632 20.3704 5.488 20.3704 5.344ZM21.3544 5.224C21.3544 5.56 21.4544 5.82 21.6544 6.004C21.8544 6.188 22.1304 6.28 22.4824 6.28C23.1464 6.28 23.6824 6.076 24.0904 5.668C24.4984 5.26 24.7024 4.74 24.7024 4.108L22.4944 4.336C22.1024 4.376 21.8144 4.464 21.6304 4.6C21.4464 4.728 21.3544 4.936 21.3544 5.224ZM27.6885 1.036H28.6725V1.912L28.5165 2.596H28.7925C28.9285 2.1 29.2005 1.696 29.6085 1.384C30.0165 1.072 30.5485 0.916 31.2045 0.916C32.0525 0.916 32.7365 1.208 33.2565 1.792C33.7845 2.376 34.0485 3.12 34.0485 4.024C34.0485 4.92 33.7845 5.66 33.2565 6.244C32.7365 6.828 32.0525 7.12 31.2045 7.12C30.5565 7.12 30.0245 6.968 29.6085 6.664C29.2005 6.352 28.9285 5.948 28.7925 5.452H28.5165L28.6725 6.124V9.184H27.6885V1.036ZM28.6725 4.024C28.6725 4.776 28.8805 5.34 29.2965 5.716C29.7205 6.092 30.2605 6.28 30.9165 6.28C31.5645 6.28 32.0845 6.092 32.4765 5.716C32.8685 5.34 33.0645 4.776 33.0645 4.024C33.0645 3.272 32.8685 2.708 32.4765 2.332C32.0845 1.948 31.5645 1.756 30.9165 1.756C30.2605 1.756 29.7205 1.944 29.2965 2.32C28.8805 2.696 28.6725 3.264 28.6725 4.024ZM41.2875 7H40.3155V1.888L40.4715 1.324H40.1955L37.5435 7H35.5635V1.036H36.5475V6.136L36.3915 6.724H36.6675L39.3195 1.036H41.2875V7ZM47.5577 1.036H48.6257L46.0337 6.94V8.608C46.0337 9.104 45.7577 9.34 45.2057 9.316L42.9017 9.208V8.368L45.0497 8.476V6.94L42.4457 1.036H43.5257L45.3977 5.68V6.136H45.6857V5.68L47.5577 1.036ZM49.8955 7V1.036H51.8635L53.2675 6.724H53.5435L54.9475 1.036H56.9275V7H55.9435V1.9L56.1115 1.324H55.8235L54.3955 7H52.4275L50.9995 1.324H50.7235L50.8795 1.9V7H49.8955Z" />
    </svg>
</a>

<ul>
    <li>
        <a href="{{ route('user.feed') }}" class="{{ active_link('user.feed') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
            {{ __('Лента') }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.trends') }}" class="{{ active_link('user.trends') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
            {{ __('Актуальное') }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.index') }}" class="{{ active_link('user.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            {{ __('Профиль') }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.notifications') }}" class="{{ active_link('user.notifications') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
            {{ __('Уведомления') }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.achievements') }}" class="{{ active_link('user.achievements') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
            {{ __('Достижения') }}
        </a>
    </li>
    <li>
        <a href="{{ route('user.settings') }}" class="{{ active_link('user.settings') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
            {{ __('Настройки') }}
        </a>
    </li>
</ul>
