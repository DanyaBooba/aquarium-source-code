@props([
    'data' => [
        0 => [
            'name' => 'По умолчанию',
            'background' => '#1d1b35',
            'accent' => '#8d77fe',
            'text' => '#ffffff',
        ],
        1 => [
            'name' => 'Глубины океана',
            'background' => '#050543',
            'accent' => '#0077B6',
            'text' => '#f0f0ff',
        ],
        2 => [
            'name' => 'Ночной закат',
            'background' => '#1E1E1E',
            'accent' => '#C44536',
            'text' => '#f6f6f6',
        ],
        3 => [
            'name' => 'Тайный лес',
            'background' => '#0A0A0A',
            'accent' => '#228B22',
            'text' => '#e6f3e6',
        ],
        4 => [
            'name' => 'Полуночная лаванда',
            'background' => '#312e3b',
            'accent' => '#B39EB5',
            'text' => '#eeedf5',
        ],
        5 => [
            'name' => 'Темные дюны',
            'background' => '#2C2C2C',
            'accent' => '#8B7355',
            'text' => '#e5e5e5',
        ],
        6 => [
            'name' => 'Полярная ночь',
            'background' => '#1E2A3A',
            'accent' => '#66A6B3',
            'text' => '#d9dde2',
        ],
        7 => [
            'name' => 'Темная клубника',
            'background' => '#2E1E1E',
            'accent' => '#D94A64',
            'text' => '#ece5e5',
        ],
        8 => [
            'name' => 'Золотая полночь',
            'background' => '#1E1E1E',
            'accent' => '#D4AF37',
            'text' => '#e5e5e5',
        ],
        9 => [
            'name' => 'Ночной город',
            'background' => '#121212',
            'accent' => '#FF8C00',
            'text' => '#dfdfdf',
        ],
        10 => [
            'name' => 'Лунная тень',
            'background' => '#0A0A0A',
            'accent' => '#4B3B47',
            'text' => '#dfdfdf',
        ],
    ],
])

<x-user.settings.themes.scheme :data="$data" scheme='dark' />
