@props([
    'comments' => [],
    'login' => false,
])

<h3 id="comments" style="margin-top: 5rem">
    {{ __('Комментарии') }}
    <span style="opacity: .5">{{ count($comments) }}</span>
</h3>

<x-form.error-first />

<form action={{ '' }} method="post" style="max-width: 100%">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control py-3 mb-0" placeholder="Написать комментарий..."
            aria-label="Написать комментарий" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
    </div>
    {{-- <div class="d-flex align-items-center" style="gap: .5rem">
        <div class="form-floating" style="flex: 1; margin: 0 !important">
            <input type="text" name="comment" class="form-control" id="comment" placeholder="Сообщение комментария"
                onInput="checkOnInput()" value="{{ old('comment') }}" required>
            <label for="comment">{{ __('Сообщение комментария') }}</label>
        </div>

        <button class="btn btn-primary" type="submit" style="margin: 0 !important">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-send">
                <path
                    d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                <path d="m21.854 2.147-10.94 10.939" />
            </svg>
        </button>
    </div> --}}
</form>

@if (count($comments) > 0)
    > 0
@else
    <p>
        Комментариев нет.
    </p>
@endif
