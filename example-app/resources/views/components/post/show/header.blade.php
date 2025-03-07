@props([
    'userId' => '',
    'postId' => '',
    'avatar' => '',
    'avatarDefault' => '',
    'name' => '',
    'mypost' => false,
])

<div class="post-show-back">
    <a href="{{ route('user.feed') }}" class="post-show-back__profile">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-left">
            <path d="m15 18-6-6 6-6" />
        </svg>
        <div class="fs-5">Назад</div>
    </a>
    @if ($mypost)
        <a href="{{ route('post.edit', $postId) }}" class="post-show-back__edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-pencil">
                <path
                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                <path d="m15 5 4 4" />
            </svg>
            <span class="fs-5">Изменить</span>
        </a>
    @endif
</div>
