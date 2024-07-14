@props([
    'userId' => '',
    'avatar' => '',
    'avatarDefault' => '',
    'name' => '',
])

<div class="post-show-back">
    <a href="{{ route('user.show.id', $userId) }}" class="post-show-back__profile">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-left">
            <path d="m15 18-6-6 6-6" />
        </svg>
        <x-user.profile-image :avatar="$avatar" :avatar-default="$avatarDefault" />
        <div>{{ $name }}</div>
    </a>
    <a href="#" class="post-show-back__edit">
        Редактировать
    </a>
</div>
