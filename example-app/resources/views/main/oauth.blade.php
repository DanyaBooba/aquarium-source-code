@extends('layouts.main')

@section('page.title', 'OAuth')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/oauth/index.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <ul id="left-bar-anchors"></ul>
        </div>
        <div class="col-7 p-3">
            <h1>{{ __('OAuth') }}</h1>
            <p class="fs-5">
                Открытый протокол авторизации при помощи соцсети Аквариум. С помощью OAuth у пользователей есть возможность входить в аккаунты других сервисов используя аккаунт социальной сети Аквариум. При авторизации у пользователя есть возможность указать, какими данными можно поделиться.
            </p>
            <h2>{{ __('Для чего нужен OAuth?') }}</h2>
            <p>
                Одной из главных целей OAuth является обеспечение безопасности, упрощение процесса авторизации и содействие безопасному обмену данными между пользователями и онлайн-ресурсами.
            </p>
            <p>
                С помощью этой технологии пользователи могут удобно авторизоваться в других сервисах, контролировать доступ к своей личной информации и быть уверенным, что их данные будут передаваться только в соответствии с их собственными настройками и разрешениями.
            </p>
            <p>
                OAuth играет важную роль в создании более сильной, связанной и безопасной онлайн среды. Благодаря этой технологии веб-приложения могут интегрироваться, обмениваться данными и предоставлять передовые услуги, сохраняя при этом высокий уровень безопасности и конфиденциальности.
            </p>
            <h2>{{ __('Дизайн кнопки авторизации') }}</h2>
            <div class="faq-design-button">
                <div class="faq-design-button-light">
                    <button class="btn btn-dark btn-lg">
                        Авторизоваться
                    </button>
                </div>
                <div class="faq-design-button-dark">
                    <button class="btn btn-light btn-lg">
                        Авторизоваться
                    </button>
                </div>
            </div>
            <h2>{{ __('Подключить OAuth') }}</h2>
            <h3>{{ __('Регистрация') }}</h3>
            <p>
                Вам необходимо зарегистрироваться в панели разработчиков Аквариума по <a href="#">ссылке</a>. Вы можете использовать аккаунт Аквариума.
            </p>
            <h3>{{ __('Создание приложения') }}</h3>
            <p>
                После регистрации аккаунта потребуется зарегистрировать приложение по <a href="#">ссылке</a>.
            </p>
            <h3>{{ __('Настройка приложения') }}</h3>
            <p>
                После регистрации аккаунта и создания приложения, потребуется его настроить. Для настройки приложения нужно указать название приложения, добавить аватарку по желанию, указать данные, которые потребуется для авторизации и указать Redirect URI.
            </p>
            <h4>{{ __('Redirect URI') }}</h4>
            <p>
                Для того, чтобы иметь возможность обработать полученные данные пользователей после успешной авторизации через OAuth Аквариума, потребуется внести данные пути в настройки приложения — Redirect URI. Если попытаться отправить запрос на неавторизированный путь, запрос будет отклонен. Данная защита работает против несанкционированного доступа.
            </p>
            <h4>{{ __('ClientID, Client secret, токен') }}</h4>
            <p>
                ClientID — идентификатор приложения. Используется в запросах для получения OAuth-токена.
            </p>
            <p>
                Client secret — секретный ключ, который используется для подписи запросов.
            </p>
            <p>
                Токен — единоразовый ключ для доступа к данным пользователя.
            </p>
            <h3>{{ __('Публикация приложения') }}</h3>
            <p>
                После настройки приложения, следует отправить его на модерацию. После успешного прохождения модерации, у вас появится возможность использовать OAuth Аквариума для авторизации через сервисы. В противном случае вам потребуется внести изменения в приложение и повторно отправить на проверку модератором.
            </p>
            <h2>{{ __('Пример приложения') }}</h2>
            <h3>{{ __('Клиент на PHP') }}</h3>
            <code>
                <pre>
$yandex_url = 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query([
    'client_id' => TokenYandex()["client_id"],
    'redirect_uri' => TokenYandex()["redirect_uri"],
    'response_type' => 'code'
]));</pre>
            </code>
            <h3>{{ __('Сервер на PHP') }}</h3>
            <code>
                <pre>
if (!empty($_GET['code'])) {

    $params = array(
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code'],
        'client_id'     => TokenYandex()["client_id"],
        'client_secret' => TokenYandex()["client_secret"],
    );

    $ch = curl_init('https://oauth.yandex.ru/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);

    if (!empty($data['access_token'])) {
        $ch = curl_init('https://login.yandex.ru/info');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['format' => 'json']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: OAuth ' . $data['access_token']]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $info = curl_exec($ch);
        curl_close($ch);

        $info = json_decode($info, true);

        // ...
    }
}</pre>
            </code>
        </div>
    </div>

    <x-button-top />
@endsection

@once
    @push('js')
        <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
    @endpush
@endonce
