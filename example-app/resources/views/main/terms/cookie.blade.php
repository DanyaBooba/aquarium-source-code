@extends('layouts.main.main')

@section('page.title', __('Политика обработки файлов cookie'))

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <x-page.title-anchor />
        </div>
        <div class="col-7 p-3">
            <h1>
                {{ __('Политика обработки файлов cookie') }}
            </h1>
            <p>
                {{ __('Посещая сайт «Аквариум» в сети «Интернет», вы соглашаетесь с настоящей политикой, в том числе с тем, что «Аквариум» может использовать файлы cookie и иные данные для их последующей обработки системами Google Analytics, Яндекс.Метрика и другие, а также может передавать их третьим лицам для проведения исследований, выполнения работ или оказания услуг.') }}
            </p>
            <h2>{{ __('Что такое файлы cookie?') }}</h2>
            <p>
                {{ __('Файлы cookie – текстовые файлы небольшого размера, которые сохраняются на вашем устройстве (персональном компьютере, ноутбуке, планшете, мобильном телефоне и тому подобное), когда вы посещаете сайты в сети «Интернет».') }}
            </p>
            <p>
                {{ __('Кроме того, при посещении сайта «Аквариум» в сети «Интернет» происходит автоматический сбор иных данных, в том числе: технических характеристик устройства, IP-адреса, информации об используемом браузере и языке, даты и времени доступа к сайту, адресов запрашиваемых страниц сайта и иной подобной информации.') }}
            </p>
            <h2>{{ __('Какие виды файлов cookie используются?') }}</h2>
            <p>
                {{ __('В зависимости от используемых вами браузера и устройства используются разные наборы файлов cookie, включающие в себя строго необходимые, эксплуатационные, функциональные и аналитические файлы cookie.') }}
            </p>
            <h2>{{ __('Для чего могут использоваться файлы cookie?') }}</h2>
            <p>
                {{ __('При посещении вами сайта «Аквариум» в сети «Интернет» файлы cookie могут использоваться для:') }}
            </p>
            <ul>
                <li>{{ __('обеспечения функционирования и безопасности сайта;') }}</li>
                <li>{{ __('улучшения качества сайта;') }}</li>
                <li>{{ __('регистрации в системе самообслуживания (личном кабинете);') }}</li>
                <li>{{ __('предоставлении вам информации об «Аквариуме», его продуктах и услугах;') }}</li>
                <li>{{ __('усовершенствования продуктов и (или) услуг и для разработки новых продуктов и (или) услуг.') }}</li>
            </ul>
            <p>
                {{ __('Иная собираемая информация может быть использована для генерации вашего «списка интересов», состоящего из случайного идентификатора, категории интереса и отметки времени для демонстрации вам интернет-контента и рекламных объявлений, соответствующих вашим интересам.') }}
            </p>
            <h2>{{ __('Как управлять файлами cookie?') }}</h2>
            <p>
                {{ __('Используемые вами браузер и (или) устройство могут позволять вам блокировать, удалять или иным образом ограничивать использование файлов cookie. Но файлы cookie являются важной частью сайта «Аквариум» в сети «Интернет», поэтому блокировка, удаление или ограничение их использования может привести к тому, что вы будете иметь доступ не ко всем функциям сайта.') }}
            </p>
            <p>
                {{ __('Чтобы узнать, как управлять файлами cookie с помощью используемых вами браузера или устройства, вы можете воспользоваться инструкцией, предоставляемой разработчиком браузера или производителем устройства.') }}
            </p>
        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
