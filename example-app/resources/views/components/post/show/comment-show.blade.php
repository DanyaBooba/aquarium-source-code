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
    {{-- <div class="comments__more">
        <div class="dropdown">
            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-ellipsis-vertical">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="12" cy="5" r="1" />
                    <circle cx="12" cy="19" r="1" />
                </svg>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">
                        {{ __('Изменить') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-pencil">
                            <path
                                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                            <path d="m15 5 4 4" />
                        </svg>
                    </a>
                </li>
                <li class="comments__dropdown-delete">
                    <a class="dropdown-item" href="#">
                        {{ __('Удалить') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-trash-2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        {{ __('Пожаловаться') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-shield-alert">
                            <path
                                d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                            <path d="M12 8v4" />
                            <path d="M12 16h.01" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div> --}}
</div>
