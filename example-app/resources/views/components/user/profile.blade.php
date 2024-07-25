@props([
    'profile' => (object) [],
    'issub' => false,
    'itsme' => false,
])

<div class="user-profile">
    <x-user.profile.cap-image :cap="$profile->cap" :cap-default="$profile->capDefault" />
    <div class="user-profile-content">
        <div class="user-profile-left">
            <div class="user-profile-image">
                <x-user.profile.image :avatar="$profile->avatar" :avatar-default="$profile->avatarDefault" />
            </div>
            <div class="user-profile-text">
                <p class="user-profile-name" title="{{ $profile->name }}">{{ $profile->name }}</p>
                <p class="user-profile-desc" title="{{ $profile->desc }}">{{ $profile->desc }}</p>
            </div>
        </div>
        <div class="user-profile-right">
            <x-user.profile.profile.right-block :count="$profile->subs" modal="Subscribers" :text="use_form_word($profile->subs, __('подписчик'), __('подписчика'), __('подписчиков'))" />
            <x-user.profile.profile.right-block :count="$profile->sub" modal="Subscriptions" :text="use_form_word($profile->sub, __('подписка'), __('подписки'), __('подписок'))" />
            <x-user.profile.profile.right-block :count="$profile->achivs" modal="Achievements" :text="use_form_word($profile->achivs, __('достижение'), __('достижения'), __('достижений'))" />
        </div>
    </div>
    <div class="user-profile-buttons">
        <x-user.profile.profile.button
            attr='data-bs-toggle=offcanvas data-bs-target=#canvasInfo aria-controls=canvasInfo'>
            <x-user.profile.profile.icon.info />
            {{ __('Информация') }}
        </x-user.profile.profile.button>

        <x-user.profile.profile.button attr='data-bs-toggle=modal data-bs-target=#qrCodeModal'>
            <x-user.profile.profile.icon.share />
            {{ __('Поделиться') }}
        </x-user.profile.profile.button>

        @if ($profile->local)
            <x-user.profile.profile.button :url="route_user_show($profile->id, $profile->username)">
                <x-user.profile.profile.icon.from-the-side />
                {{ __('Профиль со стороны') }}
            </x-user.profile.profile.button>

            @if ($profile->verified && have_second_account() == false)
                <x-user.profile.profile.button :url="route('second.auth.signin')">
                    <x-user.profile.profile.icon.add-account />
                    {{ __('Добавить аккаунт') }}
                </x-user.profile.profile.button>
            @endif

            <x-user.profile.profile.button :mobile="true" :url="route('settings')">
                <x-user.profile.profile.icon.settings />
                {{ __('Настройки') }}
            </x-user.profile.profile.button>

            <x-user.profile.profile.button :mobile="true" :url="route('user.notifications')">
                <x-user.profile.profile.icon.notifications />
                {{ __('Уведомления') }}
            </x-user.profile.profile.button>

            <x-user.profile.profile.button :mobile="true" :url="route('user.achievements')">
                <x-user.profile.profile.icon.achivs />
                {{ __('Достижения') }}
            </x-user.profile.profile.button>
        @else
            <button onClick="buttonOpenURL('{{ route('user.sub', $profile->id) }}')" {{ $itsme ? 'disabled' : '' }}>
                @if ($issub)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <polyline points="16 11 18 13 22 9" />
                    </svg>
                    {{ __('Подписан') }}
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="19" x2="19" y1="8" y2="14" />
                        <line x1="22" x2="16" y1="11" y2="11" />
                    </svg>
                    {{ __('Подписаться') }}
                @endif
            </button>
            <button onClick="buttonOpenURL('{{ route('user.complain', $profile->id) }}')"
                {{ $itsme ? 'disabled' : '' }}>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                    <path d="M12 8v4" />
                    <path d="M12 16h.01" />
                </svg>
                {{ __('Пожаловаться') }}
            </button>
        @endif
    </div>
</div>

<x-user.profile.qr-code :nickname="$profile->username" :id="$profile->id" />

<x-user.profile.offcanvas-info />
