@props([
    'data' => [
        0 => [
            'name' => 'По умолчанию',
            'background' => '#eff0f8',
            'accent' => '#8d77fe',
            'text' => '#000000',
        ],
        1 => [
            'name' => 'Океанская свежесть',
            'background' => '#f4f9ff',
            'accent' => '#00B4D8',
            'text' => '#283340',
        ],
        2 => [
            'name' => 'Летний закат',
            'background' => '#faf5eb',
            'accent' => '#FF6F61',
            'text' => '#422420',
        ],
        3 => [
            'name' => 'Лесная гармония',
            'background' => '#eef8f3',
            'accent' => '#2E8B57',
            'text' => '#214f35',
        ],
        4 => [
            'name' => 'Лавандовый раф',
            'background' => '#F9F6FF',
            'accent' => '#9A8FDD',
            'text' => '#585181',
        ],
        5 => [
            'name' => 'Песчаные дюны',
            'background' => '#fbf5ee',
            'accent' => '#D2B48C',
            'text' => '#615039',
        ],
        6 => [
            'name' => 'Арктический лед',
            'background' => '#f4fafc',
            'accent' => '#A8D8EA',
            'text' => '#2d4b56',
        ],
        7 => [
            'name' => 'Клубничный десерт',
            'background' => '#FFF0F5',
            'accent' => '#FF6F91',
            'text' => '#673742',
        ],
        8 => [
            'name' => 'Золотой закат',
            'background' => '#FFF8E7',
            'accent' => '#FFD700',
            'text' => '#685d22',
        ],
        9 => [
            'name' => 'Городские огни',
            'background' => '#F5F5F5',
            'accent' => '#FFA500',
            'text' => '#60430f',
        ],
        10 => [
            'name' => 'Лунная ночь',
            'background' => '#F5F5F5',
            'accent' => '#6C5B7B',
            'text' => '#4c3f58',
        ],
    ],
])

<x-user.settings.themes.scheme :data="$data" />
