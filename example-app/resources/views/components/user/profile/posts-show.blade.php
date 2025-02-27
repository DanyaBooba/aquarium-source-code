@props([
    'local' => true,
    'posts' => [],
    'privatePosts' => [],
    'nullPosts' => [],
    'count' => 0,
])

@if ($count > 0)
    @if ($local)
        @if (count($posts) > 0)
            <h2 style="margin-top: 2rem">{{ __('Ваши записи') }}</h2>
            <x-user.profile.posts :posts="$posts" />
        @endif

        @if (count($privatePosts) > 0)
            <h2 style="margin-top: 2rem">{{ __('Записи на модерации') }}</h2>
            <x-user.profile.posts :posts="$privatePosts" empty="{{ __('Нет записей.') }}" />
        @endif

        @if (count($nullPosts) > 0)
            <h2 style="margin-top: 2rem">{{ __('Отклоненные записи') }}</h2>
            <x-user.profile.posts :posts="$nullPosts" empty="{{ __('Нет записей.') }}" />
        @endif
    @else
        <h2 style="margin-top: 2rem">{{ __('Записи пользователя') }}</h2>
        <x-user.profile.posts :posts="$posts" />
    @endif
@else
    <div>
        <img src="{{ asset('img/illustrations/mail.png') }}" alt="Записей не найдено"
            style="display: flex; max-width: 150px; margin-left: auto; margin-right: auto; margin-top: 3rem">
    </div>
    <h4 class="text-center fs-3" style="margin-top: 2rem; margin-bottom: 5rem">
        {{ __('Записей не найдено') }}
    </h4>
@endif
