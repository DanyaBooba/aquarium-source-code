@props([
    'idUser' => '',
    'avatar' => '',
    'avatarDefault' => '',
    'userName' => '',
    'message' => '',
    'date' => '',
])

<div class="comments__comment">
    <div class="comments__user">
        <a href="{{ route('user.show.id', $idUser) }}" aria-label="Открыть профиль человека">
            <x-user.profile.image :avatar="$avatar" :avatar-default="$avatarDefault" />
        </a>
    </div>
    <div class="comments__content">
        <div class="comments__name">
            <a href="{{ route('user.show.id', $idUser) }}" aria-label="Открыть профиль человека">
                {{ $userName }}
            </a>
        </div>
        <div class="comments__date">
            {{ $date }}
        </div>
        <div class="comments__text">
            {{ $message }}
        </div>
    </div>
    <div class="comments__more">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-ellipsis-vertical">
            <circle cx="12" cy="12" r="1" />
            <circle cx="12" cy="5" r="1" />
            <circle cx="12" cy="19" r="1" />
        </svg>
    </div>
</div>
