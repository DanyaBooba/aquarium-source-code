<div class="profile-info">
    @unless($profile->verified)
        <x-user.profile.info-block svg="<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5'/><path d='m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7'/><path d='M18 15.28c.2-.4.5-.8.9-1a2.1 2.1 0 0 1 2.6.4c.3.4.5.8.5 1.3 0 1.3-2 2-2 2'/><path d='M20 22v.01'/></svg>">
            <span>
                {{ __('Для взаимодействия с пользователями, подтвердите почту.') }}
            </span>
            <span>
                <a href="#">
                    {{ __('Отправить ссылку') }}
                </a>
            </span>
        </x-user.profile.info-block>
    @else
        @if($profile->sub == 0)
            <x-user.profile.info-block svg="<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-users'><path d='M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2'/><circle cx='9' cy='7' r='4'/><path d='M22 21v-2a4 4 0 0 0-3-3.87'/><path d='M16 3.13a4 4 0 0 1 0 7.75'/></svg>">
                <span>
                    {{ __('Давайте подпишемся на кого-нибудь!') }}
                </span>
                <span>
                    <a href="{{ route('user.search') }}">
                        {{ __('Смотреть пользователей') }}
                    </a>
                </span>
            </x-user.profile.info-block>
        @endif

        @if($profile->achivs == 0)
            <x-user.profile.info-block svg="<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-headset'><path d='M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z'/><path d='M21 16v2a4 4 0 0 1-4 4h-5'/></svg>">
                <span>
                    {{ __('Получите ваше первое достижение за подписку на телеграм канал.') }}
                </span>
                <span>
                    <a href="//aquariumsocial.t.me" target="_blank">
                        {{ __('Подписаться на телеграм') }}
                    </a>
                </span>
            </x-user.profile.info-block>
        @endif
    @endunless
</div>
