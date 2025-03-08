@props([
    'posts' => [],
    'empty' => 'Нет записей.',
    'showUser' => false,
])

@if (count($posts) == 0)
    <p>{{ $empty }}</p>
@else
    <div class="row row-cols-1 row-cols-lg-1 gx-3">
        @foreach ($posts as $post)
            <x-post.card :post="$post" :showUser="$showUser" status='deul' />
        @endforeach
    </div>
@endif
