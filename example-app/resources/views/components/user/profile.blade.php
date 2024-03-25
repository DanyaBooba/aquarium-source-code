<div class="user-profile">
    <x-user.profile-cap-image
        :cap-default=$capDefault
        :cap=$cap
    />
    <div class="user-profile-content">
        <div class="user-profile-left">
            <div class="user-profile-image">
                <span class="user-profile-image-point" title="{{ __('Активен') }}">
                    <span class="point-red"></span>
                </span>
                <x-user.profile-image
                    :avatar-default=$avatarDefault
                    :avatar=$avatar
                />
            </div>
            <div class="user-profile-text">
                <p class="user-profile-name" title="{{ $name }}">{{ $name ?? __('<безымянный>') }}</p>
                @isset($desc)
                <p class="user-profile-desc" title="{{ $desc }}">{{ $desc }}</p>
                @endisset
            </div>
        </div>
        <div class="user-profile-right">
            <div title="{{ $subsCount }}">
                <p>{{ $subs }}</p>
                <p>{{ use_form_word($subsCount, __('подписчик'), __('подписчика'), __('подписчиков')) }}</p>
            </div>
            <div title="{{ $subCount }}">
                <p>{{ $sub }}</p>
                <p>{{ use_form_word($subCount, __('подписка'), __('подписки'), __('подписок')) }}</p>
            </div>
            <div title="{{ $achivsCount }}">
                <p>{{ $achivs }}</p>
                <p>{{ use_form_word($achivsCount, __('достижение'), __('достижения'), __('достижений')) }}</p>
            </div>
        </div>
    </div>
    <div class="user-profile-buttons">
        <button class="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrCodeModal">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
            {{ __('Поделиться') }}
        </button>
        @if($local)
        <button onClick="buttonOpenURL('{{ route('settings') }}')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
            {{ __('Настройки') }}
        </button>
        <button onClick="buttonOpenURL('{{ route('user.show.id', 1) }}')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><circle cx="12" cy="12" r="1"/><path d="M5 12s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5"/></svg>
            {{ __('Профиль со стороны') }}
        </button>
        <button onClick="buttonOpenURL('{{ route('user.achievements') }}')" class="user-button-mobile">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
            {{ __('Уведомления') }}
        </button>
        <button onClick="buttonOpenURL('{{ route('user.notifications') }}')" class="user-button-mobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
            {{ __('Достижения') }}
        </button>
        @else
        <button class="" onClick="buttonOpenURL('')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
            {{ __('Подписаться') }}
        </button>
        @endif
    </div>
</div>

<x-user.profile.qr-code :nickname=$username :id=$id />
