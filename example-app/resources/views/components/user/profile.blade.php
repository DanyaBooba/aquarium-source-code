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
                <p class="user-profile-name">
                    Даниил Дыбка
                </p>
                <p class="user-profile-desc">
                    Описание профиля.
                </p>
            </div>
        </div>
        <div class="user-profile-right">
            <button class="btn btn-outline-primary px-4" onClick="buttonOpenURL('{{ route('user.settings') }}')">
                {{ __('Редактировать') }}
            </button>
            <button class="btn btn-primary px-4" onClick="buttonOpenURL('{{ route('user.index') }}')">
                {{ __('Добавить пост') }}
            </button>
        </div>
    </div>
</div>
