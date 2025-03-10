@props([
    'posts' => [],
    'empty' => 'Нет записей.',
    'showUser' => false,
    '_test' => ['default', 'image', 'theme'],
])

@if (count($posts) == 0)
    <p>{{ $empty }}</p>
@else
    <div class="row row-cols-1 row-cols-lg-1 gx-3 px-2">
        @foreach ($posts as $post)
            <x-post.card :post="$post" :showUser="$showUser" status='default' />
        @endforeach
    </div>
@endif
