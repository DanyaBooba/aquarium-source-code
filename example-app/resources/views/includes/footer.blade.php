<footer class="footer py-3 mt-4">
    <div class="container">
        <p class="small me-auto">
            © 2020-{{ date('Y') }}
            <a href="{{ route('main.index') }}">
                {{ env('APP_TITLE_SHORT') }}
            </a>
        </p>
        <a href="{{ route('main.user.privacy') }}" class="small">Политика конфиденциальности</a>
    </div>
</footer>
