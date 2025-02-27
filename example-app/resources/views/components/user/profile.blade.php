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
            <x-user.profile.profile.right-block :count="$profile->subs" modal="Subscribers" :text="use_form_word($profile->subs, __('подписчик'), __('подписчика'), __('подписчиков'))"
                toastId="userNoSubs" />
            <x-user.profile.profile.right-block :count="$profile->sub" modal="Subscriptions" :text="use_form_word($profile->sub, __('подписка'), __('подписки'), __('подписок'))"
                toastId="userNoSub" />
            <x-user.profile.profile.right-block :count="$profile->achivs" modal="Achievements" :text="use_form_word($profile->achivs, __('достижение'), __('достижения'), __('достижений'))"
                toastId="userNoAchivs" />
        </div>
    </div>
    <div class="user-profile-buttons">
        <x-user.profile.profile.button class='user-button-need-rotate-mobile'
            attr='data-bs-toggle=offcanvas data-bs-target=#canvasInfo aria-controls=canvasInfo id=buttonProfileInfo'>
            {{ __('Информация') }}
            <x-user.profile.profile.icon.info />
        </x-user.profile.profile.button>

        @if ($profile->local)
            <x-user.profile.profile.button class='user-button-settings' :mobile="true" :url="route('settings')">
                <x-user.profile.profile.icon.settings />
                {{ __('Настройки') }}
            </x-user.profile.profile.button>
        @endif

        <x-user.profile.profile.button class='user-button-share user-button-need-rotate-mobile'
            attr='data-bs-toggle=modal data-bs-target=#qrCodeModal'>
            {{ __('Поделиться') }}
            <x-user.profile.profile.icon.share />
        </x-user.profile.profile.button>

        @if ($profile->local)
            <x-user.profile.profile.button :pc="true" :url="route_user_show($profile->id, $profile->username)">
                {{ __('Профиль со стороны') }}
                <x-user.profile.profile.icon.from-the-side />
            </x-user.profile.profile.button>

            <x-user.profile.profile.dropdown-local :profile="$profile" :itsme="$itsme" />

            @if ($profile->verified && have_second_account() == false)
                <x-user.profile.profile.button :pc="true" :url="route('second.auth.signin')">
                    {{ __('Добавить аккаунт') }}
                    <x-user.profile.profile.icon.add-account />
                </x-user.profile.profile.button>
            @endif
        @else
            <x-user.profile.profile.button class='user-button-settings user-button-need-rotate-mobile'
                :url="route('user.sub', $profile->id)" :itsme="$itsme">
                @if ($issub)
                    {{ __('Подписан') }}
                    <x-user.profile.profile.icon.sub-true />
                @else
                    {{ __('Подписаться') }}
                    <x-user.profile.profile.icon.sub-false />
                @endif
            </x-user.profile.profile.button>

            <x-user.profile.profile.button class="user-button-complain" :url="route('user.complain', $profile->id)" :itsme="$itsme">
                {{ __('Пожаловаться') }}
                <x-user.profile.profile.icon.complain />
            </x-user.profile.profile.button>

            <x-user.profile.profile.dropdown :profile="$profile" :issub="$issub" :itsme="$itsme" />

        @endif
    </div>
</div>

<x-user.profile.qr-code :nickname="$profile->username" :id="$profile->id" />

<x-user.profile.offcanvas-info :profile="$profile" />
