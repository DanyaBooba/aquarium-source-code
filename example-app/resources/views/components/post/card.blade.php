@props([
    'post' => (object) [],
    'showUser' => false,
    'status' => 'default',
])

@props([
    '_status' => in_array($status, ['default', 'image', 'theme']) ? $status : 'default',
])

@if ($_status == 'image')
    <div class="col col-image">
        <a href="{{ route('post.show', [$post->idUser, $post->idPost]) }}" class="col-image__post">
            <div class="col-image__text">
                {{ $post->desc }}
            </div>
            <div class="col-image__image" style="background-image: url(/img/posts/gradient-example-2.jpg)"></div>
        </a>
        <div class="col-image__bottom">
            @if ($showUser)
                <a href="{{ route('user.show.id', $post->idUser) }}" class="col-image__user">
                    <div>
                        <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                        <span>{{ $post->userName }}</span>
                    </div>
                </a>
            @endif
            <div class="col-image__info">
                {{ $post->updated_at->diffForHumans() }}
            </div>
        </div>
    </div>
@elseif($_status == 'theme')
    <div class="col col-theme">
        <a href="{{ route('post.show', [$post->idUser, $post->idPost]) }}" class="col-theme__post">
            <div class="col-theme__post-bg" style="background-image: url(/img/posts/gradient-example-1.jpg)">
                <div class="col-theme__post-content">
                    {{ $post->desc }}
                </div>
            </div>
        </a>
        <div class="col-theme__bottom">
            @if ($showUser)
                <a href="{{ route('user.show.id', $post->idUser) }}" class="col-theme__user">
                    <div>
                        <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                        <span>{{ $post->userName }}</span>
                    </div>
                </a>
            @endif
            <div class="col-theme__info">
                {{ $post->updated_at->diffForHumans() }}
            </div>
        </div>
    </div>
@else
    <div class="col col-text">
        <a href="{{ route('post.show', [$post->idUser, $post->idPost]) }}" class="col-text__post">
            <div>
                {{ $post->desc }}
            </div>
        </a>
        <div class="col-text__bottom">
            @if ($showUser)
                <a href="{{ route('user.show.id', $post->idUser) }}" class="col-text__user">
                    <div>
                        <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                        <span>{{ $post->userName }}</span>
                    </div>
                </a>
            @endif
            <div class="col-text__info">
                {{ $post->updated_at->diffForHumans() }}
            </div>
        </div>
    </div>
@endif


{{-- @if ($post->haveimage)
    <div class="col col-img">
        @if ($showUser)
            <a href="{{ route('user.show.id', $post->idUser) }}" class="card-overflow">
                <div class="card-overflow__profile">
                    <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                    <span>{{ $post->userName }}</span>
                </div>
            </a>
        @endif
        <a href="{{ route('post.show', [$post->idUser, $post->idPost]) }}" class="card">
            <img src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}" class="card-img">
            <div class="card-img-overlay">
                <div class="post">
                    <p>
                        {{ $post->desc }}
                    </p>
                </div>
            </div>
        </a>
    </div>
@else
    <div class="col col-text">
        @if ($showUser)
            <a href="{{ route('user.show.id', $post->idUser) }}" class="card-overflow">
                <div class="card-overflow__profile">
                    <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                    <span>{{ $post->userName }}</span>
                </div>
            </a>
        @endif
        <a href="{{ route('post.show', [$post->idUser, $post->idPost]) }}" class="card">
            <div class="post">
                <p>
                    {{ $post->desc }}
                </p>
            </div>
        </a>
    </div>
@endif --}}
