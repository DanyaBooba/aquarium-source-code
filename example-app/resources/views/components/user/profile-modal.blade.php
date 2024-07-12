@props([
    'listData' => [[], [], []],
    'listNames' => ['modal1', 'modal2', 'modal3'],
])

@foreach ($listNames as $modal)
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $modal }}">
        Открыть
    </button>

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
