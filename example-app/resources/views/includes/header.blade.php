<header class="p-3 mb-3 border-bottom header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start header-content">
            <a href="/" aria-label="Главная страница" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none header-content-logo">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="{{ route('main.index') }}bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 header-content-links">
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-secondary">{{ __('Привет') }}</a></li>
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-body-emphasis">{{ __('Привет') }}</a></li>
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-body-emphasis">{{ __('Привет') }}</a></li>
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-body-emphasis">{{ __('Привет') }}</a></li>
            </ul>

            <a href="{{ route('main.index') }}" class="d-block link-body-emphasis text-decoration-none dropdown-toggle header-content-profile" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 header-content-sign">
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-secondary">Overview</a></li>
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-body-emphasis">Inventory</a></li>
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-body-emphasis">Customers</a></li>
                <li><a href="{{ route('main.index') }}" class="nav-link px-2 link-body-emphasis">Products</a></li>
            </ul>
        </div>
    </div>
</header>
