@props(['local' => false])

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
            @if($local)
            <button class="btn btn-outline-primary px-4" onClick="buttonOpenURL('{{ route('user.settings.index') }}')">
                {{ __('Редактировать') }}
            </button>
            <button class="btn btn-primary px-4" onClick="buttonOpenURL('{{ route('user.index') }}')">
                {{ __('Добавить пост') }}
            </button>
            {{-- <button class="btn btn-secondary" onClick="buttonOpenURL('{{ route('user.index') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
            </button> --}}
            @else
            <button class="btn btn-primary px-4 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                {{ __('Подписаться') }}
            </button>
            @endif
        </div>
    </div>
</div>
