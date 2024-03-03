<div class="fixed-bottom row row-cols-5 justify-content-around fixed-bottom-nav">
    <div class="container-fluid">
        <div>
            <a href="{{ route('main.index') }}" class="{{ active_link('main.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
                {{ __('Лента') }}
            </a>
        </div>
        <div>
            <a href="{{ route('main.index') }}" class="{{ active_link('main.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
                {{ __('Горячее') }}
            </a>
        </div>
        <div>
            <a href="{{ route('main.index') }}" class="{{ active_link('main.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                {{ __('Написать') }}
            </a>
        </div>
        <div>
            <a href="{{ route('main.index') }}" class="{{ active_link('main.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                {{ __('Поиск') }}
            </a>
        </div>
        <div>
            <a href="{{ route('main.index') }}" class="{{ active_link('main.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                {{ __('Профиль') }}
            </a>
        </div>
        {{-- <button onClick="ButtonLeftBar('feed')" aria-label="Лента" class="fixed-bottom__link">
            <svg class="fixed-bottom__svg" id="mobile-bar-feed">
                <use xlink:href=" /app/img/icons/bootstrap.min.svg#house"></use>
            </svg>
            <span>
                Лента
            </span>
        </button>
        <button onClick="ButtonLeftBar('search')" aria-label="Поиск" class="ms-2 fixed-bottom__link">
            <svg class="fixed-bottom__svg" id="mobile-bar-search">
                <use xlink:href="/app/img/icons/bootstrap.min.svg#search"></use>
            </svg>
            <span>
                Поиск
            </span>
        </button>
        <button onClick="ButtonLeftBar('add')" aria-label="Добавить пост" class="ms-2 fixed-bottom__link">
            <svg class="fixed-bottom__svg" id="mobile-bar-add">
                <use xlink:href="/app/img/icons/bootstrap.min.svg#plus-circle"></use>
            </svg>
            <span>
                Добавить
            </span>
        </button>
        <button onClick="ButtonLeftBar('person')" aria-label="Профиль" class="fixed-bottom__link">
            <svg class="fixed-bottom__svg" id="mobile-bar-person">
                <use xlink:href="/app/img/icons/bootstrap.min.svg#person"></use>
            </svg>
            <span>
                Профиль
            </span>
        </button>
        <button onClick="ButtonLeftBar('settings')" aria-label="Настройки" class="fixed-bottom__link">
            <svg class="fixed-bottom__svg" id="mobile-bar-settings">
                <use xlink:href="/app/img/icons/bootstrap.min.svg#gear-wide-connected"></use>
            </svg>
            <span>
                Настройки
            </span>
        </button> --}}
    </div>
</div>
