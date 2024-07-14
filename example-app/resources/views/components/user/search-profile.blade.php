<div class="search-users__profile" name="{{ $user->name != __('<безымянный>') ? $user->name : '' }}"
    desc="{{ $user->desc }}" username="{{ $user->username }}">
    <a href="{{ route('user.show.id', $user->id) }}" class="search-users-content">
        <x-user.profile-image :avatar-default="$user->avatarDefault" :avatar="$user->avatar" />
        <p class="h5">{{ $user->name }}</p>
        <div class="search-users-content-info">
            <div class="search-users-content-info__block">
                <div>
                    5
                </div>
                <div>
                    подписчиков
                </div>
            </div>
            <div class="search-users-content-info__block">
                <div>
                    2
                </div>
                <div>
                    подписки
                </div>
            </div>
        </div>
    </a>
</div>
