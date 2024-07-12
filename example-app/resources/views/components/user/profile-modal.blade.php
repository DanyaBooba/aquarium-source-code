@props([
    'listData' => [[], [], []],
    'listNames' => ['modalSubscribers', 'modalSubscriptions', 'modalAchievements'],
])

@foreach ($listNames as $modal)
    <div class="modal fade" id="{{ $modal }}" tabindex="-1" aria-labelledby="{{ $modal }}Label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    {{ $modal }}
                </div>
            </div>
        </div>
    </div>
@endforeach
