@props([
    'comments' => [],
    'login' => false,
])

<h3 id="comments" style="margin-top: 5rem">
    {{ __('Комментарии') }}
    <span style="opacity: .5">{{ count($comments) }}</span>
</h3>

<x-form.error-first />

<form method="post" class="mb-3" style="max-width: 100%">
    @csrf
    <div class="form-floating position-relative">
        <textarea class="form-control" style="border-radius: 12px; padding-right: 120px; min-height: 80px"
            placeholder="Оставьте комментарий здесь" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Комментарий</label>
        <!-- Кнопка отправки -->
        <button type="button" class="btn btn-primary position-absolute bottom-0 end-0 m-2" style="border-radius: 8px;">
            Отправить
        </button>
    </div>
</form>

@if (count($comments) > 0)
    > 0
@else
    <p>
        Комментариев нет.
    </p>
@endif
