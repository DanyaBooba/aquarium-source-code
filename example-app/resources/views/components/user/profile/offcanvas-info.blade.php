@props([
    'profile' => (object) [],
])

<div class="offcanvas offcanvas-bottom" data-bs-toggle="offcanvas" tabindex="-1" id="canvasInfo"
    aria-labelledby="canvasInfoLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="canvasInfoLabel">
            {{ __('Информация о профиле') }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <div class="offcanvas-body">
        <div class="user-offcanvas">
            <div class="user-profile-text">
                <p class="user-profile-name" title="{{ $profile->name }}">{{ $profile->name }}</p>
                @if ($profile->desc)
                    <p class="user-profile-desc" title="{{ $profile->desc }}">{{ $profile->desc }}</p>
                @endif
                @if ($profile->username)
                    <p class="user-profile-desc" title="{{ $profile->username }}">
                        <a href="{{ route_user_show($profile->id, $profile->username) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            {{ $profile->username }}
                        </a>
                    </p>
                @endif
            </div>
            <div class="user-profile-data user-profile-data-mobile">
                <x-user.profile.profile.right-block :count="$profile->subs" modal="Subscribers" :text="use_form_word($profile->subs, __('подписчик'), __('подписчика'), __('подписчиков'))"
                    toastId="userNoSubs" />
                <x-user.profile.profile.right-block :count="$profile->sub" modal="Subscriptions" :text="use_form_word($profile->sub, __('подписка'), __('подписки'), __('подписок'))"
                    toastId="userNoSub" />
                <x-user.profile.profile.right-block :count="$profile->achivs" modal="Achievements" :text="use_form_word($profile->achivs, __('достижение'), __('достижения'), __('достижений'))"
                    toastId="userNoAchivs" />
            </div>
        </div>
    </div>
</div>
