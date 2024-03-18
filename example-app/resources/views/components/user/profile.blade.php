<div class="user-profile">
    <img class="user-profile-cap" src="{{ asset('img/user/bg/BG7.jpg') }}">
    <div class="user-profile-content">
        <div class="user-profile-left">
            <div class="user-profile-image">
                <span class="user-profile-image-point">
                    <span class="point-red"></span>
                </span>
                <img src="{{ asset('img/user/logo/MAN1.png') }}">
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
        <button class="" onClick="buttonOpenURL('')">
            Поделиться
        </button>
        <button onClick="buttonOpenURL('{{ route('user.settings.profile') }}')">
            Изменить профиль
        </button>
        <button onClick="buttonOpenURL('{{ route('user.settings.index') }}')">
            Настройки
        </button>
    </div>
</div>
