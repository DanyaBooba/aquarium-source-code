<div class="user-profile">
    <img class="user-profile-cap" src="{{ asset('img/user/bg/BG1.jpg') }}">
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
            <button class="btn btn-outline-primary px-4">
                {{ __('Редактировать') }}
            </button>
            <button class="btn btn-primary ms-2 px-4">
                {{ __('Добавить пост') }}
            </button>
        </div>
    </div>
</div>
