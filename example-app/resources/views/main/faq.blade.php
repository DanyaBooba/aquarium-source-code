@extends('layouts.main.main')

@section('page.title', __('FAQ Аквариума — ответы на часто задаваемые вопросы'))
@section('page.ogtitle', __('FAQ Аквариума — ответы на часто задаваемые вопросы'))
@section('page.desc',
    __('Найдите ответы на популярные вопросы о Аквариуме. Все, что нужно знать о регистрации,
    настройках и использовании платформы.'))
@section('page.ogdesc',
    __('Найдите ответы на популярные вопросы о Аквариуме. Все, что нужно знать о регистрации,
    настройках и использовании платформы.'))

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
                {{ __('Ответы на вопросы') }}
            </h1>
            <p class="fs-5">
                {{ __('Социальная сеть Аквариум — это место, где вы можете создать свой мир, отражающий вашу личность, интересы и уникальность.') }}
            </p>
            <h2>{{ __('Возможности') }}</h2>
            <ul>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">🐬 {{ __('Тематика') }}</span>
                    {{ __('Аквариум предлагает тематику подводного мира. Это создает особую атмосферу и позволяет людям с общими интересами объединиться вокруг одной идеи') }}
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">🎨 {{ __('Кастомизация') }}</span>
                    {{ __('Меняйте свою страницу, используя различные аватарки, шапки и элементы дизайна, чтобы создать визуальное представление о себе и своих интересах') }}
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">📸 {{ __('Публикации') }}</span>
                    {{ __('Вы можете делиться своими приключениями, публиковать фотографии, видео и писать посты о том, что важно именно для вас.') }}
                </li>
            </ul>
            <h2>{{ __('Целевая аудитория') }}</h2>
            <p>
                {{ __('Целевая аудитория социальной сети — подростки и молодёжь 12 до 35 лет.') }}
            </p>
            <p>
                {{ __('Выделяется несколько групп аудитории:') }}
            </p>
            <ul>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">{{ __('Обычные люди') }}</span>
                    {{ __('Большинство пользователей, которые рады вести свои социальные сети') }}
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">{{ __('Общественные личности') }}</span>
                    {{ __('Те, кто стремится к объединению общественных усилий, обсуждению проблем и поиску партнеров') }}
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">{{ __('Фотографы') }}</span>
                    {{ __('Аквариум приветствует всех, кто вдохновляется красотой мира, обожает фотографировать удивительные создания и желает поделиться этой красотой с другими') }}
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">{{ __('Художники') }}</span>
                    {{ __('Аквариум предлагает возможность творческой самореализации для фотографов, художников и всех, кто искал место для выражения своего вдохновения и творчества в контексте морской жизни и окружения') }}
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">{{ __('Путешественники') }}</span>
                    {{ __('Те, кто ценит пейзажи и мечтает делиться увлекательными рассказами и впечатлениями о своих подводных приключениях с широкой аудиторией.') }}
                </li>
            </ul>
            <h2>{{ __('Интерфейсы') }}</h2>
            <h3>{{ __('Веб-сайт') }}</h3>
            <p>
                {{ __('Социальная сеть Аквариум располагается по адресу:') }} <a
                    href="//aquariumsocial.ru">aquariumsocial.ru</a>.
                {{ __('С этого адреса доступна сама социальная сеть, ведутся медиа каналы и располагаются доступы для разработчиков.') }}
            </p>
            <p>
                {{ __('Основной интерфейс взаимодействия с социальной сетью — веб-сайт, именно с его помощью можно создать новый аккаунт или войти в существующий, производить настройку и персонализацию своих данных, находить новых людей и вести свою страницу.') }}
            </p>
            <h3>{{ __('Мобильные приложения') }}</h3>
            <p>
                {{ __('Для доступа к социальной сети на мобильных устройствах лучше использовать') }} <a
                    href="{{ route('main.download') }}">{{ __('мобильные приложения') }}</a>,
                {{ __('которые доступны для Android и iOS. У пользователей с мобильных устройств сохраняется доступ к веб-версии соцсети Аквариум.') }}
            </p>
            <h3>{{ __('API') }}</h3>
            <p>
                {{ __('Для взаимодействия с социальной сетью Аквариум для разработчиков имеется возможность использования API социальной сети Аквариум для получения доступа к собственному аккаунту и базовым возможностям соцсети. Для этого используйте') }}
                <a href="{{ route('main.api') }}">{{ __('документацию') }}</a>.
            </p>
            <h2>{{ __('Технологии проекта') }}</h2>
            <p>
                {{ __('Сайт соцсети Аквариум работает на PHP 8, используя фреймворк Laravel 10. Для интерфейса используется фреймворк Bootstrap 5. Подробнее про технологии проекта на') }}
                <a href="{{ route('main.tech') }}">{{ __('отдельной странице') }}</a>.
            </p>
            <h3>{{ __('OAuth') }}</h3>
            <p>
                {{ __('Открытый протокол авторизации при помощи соцсети Аквариум. С помощью OAuth у пользователей есть возможность входить в аккаунты других сервисов используя аккаунт социальной сети Аквариум. При авторизации у пользователя есть возможность указать, какими данными можно поделиться.') }}
            </p>
            <p>
                {{ __('Больше информации в ') }} <a href="{{ route('main.oauth') }}">{{ __('документации') }}</a>.
            </p>
            <h3>{{ __('Безопасность и защита данных') }}</h3>
            <p>
                {{ __('При регистрации пользователь использует электронную почту для закрепления доступа к аккаунту и возможности восстановления доступа к аккаунту. При авторизации пользователь указывает введённую электронную почту и собственный пароль, либо использует код, отправленный на указанную почту.') }}
            </p>
            <p>
                {{ __('При регистрации или изменении пароля, он хранится в зашифрованном виде, используя хэширование Bcrypt без возможности дешифровки. При несанкционированным доступе, получить пароль от аккаунта невозможно.') }}
            </p>
            <h3>{{ __('Открытый код') }}</h3>
            <p>
                {{ __('Проект социальной сети Аквариум представляет собой проект открытого исходного кода, расположенного на') }}
                <a href="https://github.com/DanyaBooba/aquarium-social" target="_blank">GitHub</a> и <a
                    href="https://gitflic.ru/project/daniil_dybka/aquarium-social" target="_blank">GitFlic</a>.

            </p>
            <p>
                {{ __('Каждый желающий может участвовать в развитии проекта, вносить изменения, разрабатывать дополнения и предлагать улучшения через:') }}
                <a href="//github.com/DanyaBooba/aquarium-social/issues" target="_blank">Issue</a> {{ __('и') }} <a
                    href="//github.com/DanyaBooba/aquarium-social/pulls" target="_blank">{{ __('Pull Request') }}</a>.
            </p>
            <h2>{{ __('Личный кабинет') }}</h2>
            <h3>{{ __('Авторизация') }}</h3>
            <p>
                {{ __('Для того, чтобы получить доступ к личному кабинету пользователю требуется авторизоваться в свой аккаунт, либо создать новый. Для создания аккаунта можно использовать 2 способа авторизации: через почту и с использованием сервисов.') }}
            </p>
            <h4>{{ __('Через почту') }}</h4>
            <p>
                {{ __('При регистрации аккаунта через почту, пользователю потребуется подтвердить почту через код, отправленный на почту. Регистрация через почту удобна, потому что пользователь явно знает, какая почта используется при регистрации.') }}
            </p>
            <h4>{{ __('С использованием сервисов') }}</h4>
            <p>
                {{ __('Использование сервисов не требует подтверждения почты. Использование сервисов — самый быстрый вариант регистрации аккаунта, потому что требует нажатия 1 кнопки.') }}
            </p>
            <h3>{{ __('Добавить второй аккаунт') }}</h3>
            <p>
                {{ __('У пользователей есть возможность добавить второй аккаунт и удобно переключаться между ними в один клик.') }}
            </p>
            <h3>{{ __('Выход из аккаунта') }}</h3>
            <p>
                {{ __('Выход из аккаунта не удаляет сам аккаунт или данные с аккаунта, выход из аккаунта освобождает запись об авторизации в аккаунт. После выхода из аккаунта потребуется заново авторизоваться в него. Выход из аккаунта на одном устройстве не приводит к выходу из аккаунта на другом.') }}
            </p>
            <h3>{{ __('Изменить аватарку, шапку') }}</h3>
            <p>
                {{ __('Для изменения аватарки или шапки аккаунта следует использовать настройки, вкладку с кастомизацией.') }}
            </p>
            <h3>{{ __('Уведомления аккаунта') }}</h3>
            <p>
                {{ __('У пользователей есть возможность настроить уведомления аккаунта, включить только необходимые для аккаунта уведомления. Настроить уведомления можно через настройки, пункт уведомления.') }}
            </p>
            <h3>{{ __('Изменить пароль') }}</h3>
            <p>
                {{ __('Для изменения пароля следует использовать настройки, пункт изменения пароля. Если забыли пароль — потребуется подтвердить владение почтой, либо использовать старый пароль от аккаунта.') }}
            </p>
            <h3>{{ __('Изменение личных данных') }}</h3>
            <p>
                {{ __('Изменение личный данных аккаунта доступно через настройки вкладку личные данные. Для изменения доступно имя, фамилия и никнейм пользователя. По никнейму есть возможность найти аккаунт пользователя.') }}
            </p>
            <h3>{{ __('Подтверждение почты') }}</h3>
            <p>
                {{ __('Подтверждение почты в аккаунте соцсети Аквариум обеспечивает повышенный уровень безопасности и помогает поддерживать более надежное и прозрачное сообщество пользователей. Подтверждение почты помогает удостоверить личность пользователя и защитить аккаунт от несанкционированного доступа или создания фальшивых профилей.') }}
            </p>
            <p>
                {{ __('Подтвержденная электронная почта делает процесс восстановления учетной записи более эффективным и облегченным в случае утери доступа к аккаунту.') }}
            </p>
            <h3>{{ __('Удаление аккаунта') }}</h3>
            <p>
                {{ __('У любого пользователя есть возможность навсегда удалить аккаунт с социально сети Аквариум. Для этого следует заполнить форму удаления аккаунта в настройках, потребуется подтвердить аккаунт.') }}
            </p>
            <h2>{{ __('Про социальную сеть') }}</h2>
            <h3>{{ __('Брендбук') }}</h3>
            <p>
                {{ __('Все принципы любых коммуникаций Аквариума, логотип Аквариума и дизайн-система.') }} <a
                    href="{{ route('main.brand') }}">{{ __('Открыть') }}</a>
            </p>
            <h3>{{ __('История проекта') }}</h3>
            <p>
                {{ __('Социальная сеть Аквариум начала свое существование с 2019 года. Посмотрите, какие изменения успели произойти за это время: ') }}
                <a href="{{ route('main.history') }}">{{ __('Открыть') }}</a>
            </p>
            <h3>{{ __('Страница для СМИ') }}</h3>
            <p>
                {{ __('Формулировки, тексты и материалы, предназначенные для СМИ: ') }}
                <a href="{{ route('main.smi') }}">{{ __('Открыть') }}</a>
            </p>
            <h3>{{ __('Как пришла идея') }}</h3>
            <p>
                {{ __('В 2019 году при разработке мобильных игр появилась задача сохранения прогресса между разными устройствами. Для этого требовалось разработать личный кабинет, реализовать возможность авторизации, сохранять прогресс игры на сервер и с других устройств считывать этот прогресс для того, чтобы была «бесшовная» игра между разными устройствами.') }}
            </p>
            <p>
                {{ __('Удалось реализовать личный кабинет через мобильную игру, но появилась задача — потребовалось реализовать доступ к аккаунту через браузер для возможности удобной настройки аккаунта. Именно для решения этой задачи в 2019 году параллельно началась разработка веб-версии личного кабинета.') }}
            </p>
            <h3>{{ __('Начало разработки') }}</h3>
            <p>
                {{ __('В 2019 году появился первый проект, в котором была «попытка» реализации личного кабинета. К сожалению, успеха у данного сайта не было: он не позволял ни создать аккаунт, ни войти в существующий.') }}
            </p>
            <p>
                {{ __('В 2020-2022 годах была более успешная попытка разработать на чистом PHP личный кабинет. Проект имел название «Creagoo ID» и располагался по адресу') }}
                <a href="//id.creagoo.ru" target="_blank">id.creagoo.ru</a>,
                {{ __('сейчас по этому адресу открывается текущая социальная сеть. Разработка вышла лучше, у пользователей появилась возможность входить в аккаунты и создавать новые, была базовая настройка аккаунта.') }}
            </p>
            <p>
                {{ __('В 2023 году произошел перезапуск проекта 2020-2022 года, реализация была на том же чистом PHP, но появилась интеграция с OAuth других сервисов, отправка писем и уведомлений, интеграция с другими пользователями и «начало» постов. Данный проект существует уже как «социальная сеть».') }}
            </p>
            <h3>{{ __('Смысл названия') }}</h3>
            <p>
                {{ __('«Аквариум» — это символ виртуального подводного мира, где пользователи могут общаться, делиться своими моментами и наблюдениями, и быть частью удивительной зоны обмена идей и эмоций. Название «Аквариум» воплощает в себе свежесть, прозрачность и разнообразие, которые характеризуют нашу социальную сеть.') }}
            </p>
            <h3>{{ __('#пригласи_друга') }}</h3>
            <p>
                {{ __('Акция «Пригласи друга» — это возможность отправить личное приглашение другу, чтобы участвовать в конкурсе на большее количество приглашенных людей. Не забудьте сказать другу, что он тоже может участвовать! Чтобы использовать личное приглашение, следует скопировать ссылку-приглашение в личном кабинете.') }}
            </p>
            <h2>{{ __('Команда') }}</h2>
            <p>
                {{ __('Разработка социальной сети Аквариум отражает захватывающий и креативный процесс, способствующий созданию привлекательной онлайн-платформы. В этой работе принимают участие разные люди, каждому из которых мы хотим выразить личную благодарность:') }}
            </p>
            <ul>
                <li>
                    {{ __('Даниил Дыбка – разработчик проекта, автор,') }}
                    <a href="//ddybka.t.me" target="_blank">@@ddybka</a>
                </li>
                <li>
                    {{ __('Анастасия Пара – художник, автор стикеров,') }}
                    <a href="//paraananas.t.me" target="_blank">@@paraananas</a>
                </li>
                <li>
                    {{ __('Роман Казин – художник, автор шапок') }}
                </li>
                <li>
                    {{ __('Дарья Уткина – художник, консультация по UI,') }}
                    <a href="//CarpetAladdin.t.me" target="_blank">@@CarpetAladdin</a>
                </li>
                <li>
                    {{ __('Владимир Вяхирев – дизайнер, автор дизайна постов, консультация по UI,') }}
                    <a href="//br0k3_b01.t.me" target="_blank">@@br0k3_b01</a>
                </li>
                <li>
                    {{ __('Макар Климов – помощь в актуализации проекта,') }}
                    <a href="//makar_klimov.t.me" target="_blank">@@makar_klimov</a>
                </li>
            </ul>
            <h2>{{ __('Ссылки') }}</h2>
            <h3>{{ __('Обратная связь') }}</h3>
            <ul>
                <li>
                    {{ __('Телеграм') }}: <a href="//ddybka.t.me" target="_blank">@ddybka</a>
                </li>
                <li>
                    {{ __('Почта') }}: <a href="mailto:daniil@dybka.ru">daniil@dybka.ru</a>
                </li>
            </ul>
            <h3>{{ __('Разработка') }}</h3>
            <ul>
                <li>
                    {{ __('GitHub репозиторий') }}: <a href="//github.com/DanyaBooba/aquarium-social"
                        target="_blank">aquarium-2024</a>
                </li>
                <li>
                    {{ __('GitFlic репозиторий') }}: <a
                        href="https://gitflic.ru/project/daniil_dybka/aquarium-social/issue"
                        target="_blank">aquarium-2024</a>
                </li>
                <li>
                    {{ __('GitHub Issue') }}: <a href="//github.com/DanyaBooba/aquarium-social/issues"
                        target="_blank">aquarium-2024/issues</a>
                </li>
                <li>
                    {{ __('GitHub Pull Request') }}: <a href="//github.com/DanyaBooba/aquarium-social/pulls"
                        target="_blank">aquarium-2024/pulls</a>
                </li>
            </ul>
            <h3>{{ __('Медиа') }}</h3>
            <ul>
                <li>
                    <a href="//aquariumsocial.t.me">{{ __('Телеграм канал') }}</a>
                </li>
                <li>
                    <a href="//vk.com/aquariumsocial">{{ __('Паблик ВКонтакте') }}</a>
                </li>
            </ul>
        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
