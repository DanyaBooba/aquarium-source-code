<div class="col p-2 mt-0" name="{{ $user->name }}" desc="{{ $user->desc }}" username="{{ $user->username }}">
    <a href="{{ route('user.show.id', $user->id) }}" class="user-search-users-content">
        <x-user.profile-image
            :avatar-default="$user->avatarDefault"
            :avatar="$user->avatar"
        />
        <p class="h5 mb-4">
            {{ $user->name }}
        </p>
        @if($user->sub)
        <button class="btn btn-outline-light" onClick="buttonOpenURL('{{ route('user.show.id', $user->id) }}')">
            Подписан
        </button>
        @else
        <button class="btn btn-outline-light" onClick="buttonOpenURL('{{ route('user.show.id', $user->id) }}')">
            Подписаться
        </button>
        @endif
    </a>
</div>
