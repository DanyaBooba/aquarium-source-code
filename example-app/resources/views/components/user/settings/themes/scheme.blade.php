@props([
    'data' => [],
    'scheme' => 'light',
])

<div class="container container-settings__theme" style="padding-left: 0 !important; padding-right: 0 !important">
    <div class="row row-cols-1 row-cols-lg-3 g-3">
        @for ($i = 0; $i < count($data); $i++)
            <a href="{{ route('main.settheme.' . $scheme, $i == 0 ? 'default' : strval($i)) }}"
                class="col {{ settings_theme_active_link($i == 0 ? 'default' : strval($i), $scheme == 'light') }}">
                <div class="container-settings__theme-container">
                    <div class="container-settings__theme-background"
                        style="background-color: {{ $data[$i]['background'] }}">
                        <svg width="100" height="100" viewBox="0 0 92 63" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.8646 33.0171C37.7476 3.85975 72.9545 5.11909 85.6855 17.3508C85.6855 17.3508 83.8313 35.7035 60.3841 45.8328C43.1074 53.2759 26.2946 45.4367 26.2946 45.4367C23.9046 48.9748 22.9488 56.161 11.7371 61.2757L15.6908 42.2047C13.6958 40.5813 7.88237 35.8465 0.588324 29.8947C11.4523 27.1416 16.1994 30.6105 21.8646 33.0171Z"
                                fill="{{ $data[$i]['accent'] }}" />
                            <circle cx="62.6046" cy="19.7019" r="5.57944" fill="{{ $data[$i]['background'] }}" />
                        </svg>
                        <p style="color: {{ $data[$i]['text'] }} !important">
                            Аквариум
                        </p>
                    </div>
                    <p>
                        {{ $data[$i]['name'] }}
                    </p>
                </div>
            </a>
        @endfor
    </div>
</div>
