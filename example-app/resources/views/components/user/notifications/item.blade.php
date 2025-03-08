@props([
    'i' => 0,
    'header' => '',
    'text' => '',
])

@if ($header && $text)
    <div class="accordion" id="acc{{ $i }}">
        <div class="accordion-item" style="background-color: var(--color-body-plane) !important">
            <h2 class="accordion-header mt-0">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                    aria-controls="collapse{{ $i }}">
                    {{ $header }}
                </button>
            </h2>
            <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                data-bs-parent="#acc{{ $i }}">
                <div class="accordion-body" style="background-color: var(--color-body-plane); border-radius: 12px;">
                    {!! $text !!}
                </div>
            </div>
        </div>
    </div>
@endif
