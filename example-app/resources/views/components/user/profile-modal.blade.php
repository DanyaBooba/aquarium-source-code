@props([
    'listData' => [[], [], []],
    'listNames' => ['modalSubscribers', 'modalSubscriptions', 'modalAchievements'],
])

@foreach ($listNames as $modal)
    <div class="modal user-modal fade" id="{{ $modal }}" tabindex="-1" aria-labelledby="{{ $modal }}Label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{ asset('img/user/logo/MAN1.png') }}" alt="">
                                <span>
                                    Даниил Дыбка
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{ asset('img/user/logo/MAN1.png') }}" alt="">
                                <span>
                                    Даниил Дыбка
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
