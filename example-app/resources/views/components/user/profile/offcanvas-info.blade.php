@props([
    'profile' => (object) [],
])

{{-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
    aria-controls="offcanvasExample">
    Link with href
</a>
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
    aria-controls="offcanvasExample">
    Button with data-bs-target
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
            etc.
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div> --}}

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
