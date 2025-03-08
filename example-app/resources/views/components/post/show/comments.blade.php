@props([
    'comments' => [],
    'login' => false,
    'id' => 0,
])

<h3 id="comments" style="margin-top: 5rem">
    {{ __('Комментарии') }}
    <span style="opacity: .5">{{ count($comments) }}</span>
</h3>

@if (user_login())
    <x-form.error-first />

    <form action="{{ route('post.comment.store') }}" method="post" class="mb-3" style="max-width: 100%">
        @csrf
        <div class="form-floating position-relative">
            <textarea class="form-control" name="message"
                style="border-radius: 12px; padding-right: 120px; min-height: 80px; background-color: var(--color-body-plane) !important;"
                placeholder="Оставьте комментарий здесь" id="floatingTextarea" required></textarea>
            <label for="floatingTextarea">Комментарий</label>

            <input type="hidden" name="id" value="{{ $id }}">

            <button type="submit" class="btn btn-primary position-absolute bottom-0 end-0 m-2"
                style="border-radius: 8px; padding: .375rem .75rem;">
                Отправить
            </button>
        </div>
    </form>
@else
    Войдите в аккаунт, чтобы оставить комментарий
@endif

@if (count($comments) > 0)
    > 0
@else
    <p>
        Комментариев нет.
    </p>
@endif
