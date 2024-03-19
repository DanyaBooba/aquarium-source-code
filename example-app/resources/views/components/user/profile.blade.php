<div class="user-profile">
    <x-user.profile-cap-image
        :cap-default=$capDefault
        :cap=$cap
    />
    <div class="user-profile-content">
        <div class="user-profile-left">
            <div class="user-profile-image">
                <span class="user-profile-image-point">
                    <span class="point-red"></span>
                </span>
                <x-user.profile-image
                    :avatar-default=$avatarDefault
                    :avatar=$avatar
                />
            </div>
            <div class="user-profile-text">
                <p class="user-profile-name">{{ $name ?? "<безымянный>" }}</p>
                @isset($desc)
                <p class="user-profile-desc">{{ $desc }}</p>
                @endisset
            </div>
        </div>
        <div class="user-profile-right">
            <div>
                <p>{{ $subs }}</p>
                <p>{{ use_form_word($subsCount, __('подписчик'), __('подписчика'), __('подписчиков')) }}</p>
            </div>
            <div>
                <p>{{ $sub }}</p>
                <p>{{ use_form_word($subCount, __('подписка'), __('подписки'), __('подписок')) }}</p>
            </div>
            <div>
                <p>{{ $achivs }}</p>
                <p>{{ use_form_word($achivsCount, __('достижение'), __('достижения'), __('достижений')) }}</p>
            </div>
        </div>
    </div>
    <div class="user-profile-buttons">
        @if($local)
        <button class="" onClick="buttonOpenURL('')">
            Поделиться
        </button>
        <button onClick="buttonOpenURL('{{ route('user.settings.profile') }}')">
            Изменить профиль
        </button>
        <button onClick="buttonOpenURL('{{ route('user.settings.index') }}')">
            Настройки
        </button>
        @else
        <button class="" onClick="buttonOpenURL('')">
            Поделиться
        </button>
        <button class="" onClick="buttonOpenURL('')">
            Подписаться
        </button>
        @endif
    </div>
</div>
