@props([
    'post' => (object) [],
])

@if ($post->haveimage)
    <div class="col col-img">
        <a href="{{ route('user.post.show.id', [$post->idUser, $post->idPost]) }}" class="card">
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
        <a href="{{ route('user.post.show.id', [$post->idUser, $post->idPost]) }}" class="card">
            <div class="post">
                <p>
                    {{ $post->desc }}
                </p>
            </div>
        </a>
    </div>
@endif
