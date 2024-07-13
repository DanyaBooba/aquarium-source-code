@props([
    'listData' => [[], [], []],
    'listNames' => ['modalSubscribers', 'modalSubscriptions', 'modalAchievements'],
])

@foreach ($listNames as $modal)
    @if (count($listData[$loop->index]) > 0)
        <div class="modal user-modal fade" id="{{ $modal }}" tabindex="-1"
            aria-labelledby="{{ $modal }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <ul class="user-modal-list-people">
                            @foreach ($listData[$loop->index] as $data)
                                <li>
                                    <a href="{{ route('user.show.id', 1) }}">
                                        <img src="{{ asset('img/user/logo/MAN1.png') }}" alt="">
                                        <span>
                                            Даниил Дыбка
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
