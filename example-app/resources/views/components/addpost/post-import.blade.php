<div class="addpost-import-container">
    <div class="addpost-import">
        <h4>
            {{ __('Импортируйте записи из других соцсетей') }}
        </h4>
        <p>
            {{ __('Для этого достаточно просто поделиться ссылкой на запись.') }}
        </p>
        <p>
            <a href="{{ route('user.importpost') }}">
                {{ __('Импортировать записи') }}
            </a>
        </p>
    </div>
</div>
