@extends('layouts.main')

@section('page.title', 'Ответы на вопросы')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/index.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <ul id="left-bar-anchors"></ul>
        </div>
        <div class="col-7 p-3">
            <h1>
                Ответы на вопросы
            </h1>
            <p class="fs-5">
                Социальная сеть Аквариум. Это место, где вы можете создать свой подводный мир, отражающий вашу личность, интересы и уникальность.
            </p>
            <h2>Возможности</h2>
            <ul>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">🐬 Тематика</span> Аквариум предлагает тематику подводного мира. Это создает особую атмосферу и позволяет людям с общими интересами объединиться вокруг одной идеи
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">🎨 Кастомизация</span> Меняйте свою страницу, используя различные аватарки, шапки и элементы дизайна, чтобы создать визуальное представление о себе и своих интересах
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">📸 Публикации</span> Вы можете делиться своими приключениями, публиковать фотографии, видео и писать посты о том, что важно именно для вас.
                </li>
            </ul>
            <h2>Целевая аудитория</h2>
            <p>
                Целевая аудитория социальной сети: подростки и молодёжь, мальчики и девочки от 13-ти лет и мужчины и девушки до 42 лет. Ограничений в использовании соцсети для других возрастов наблюдаться не будет, кроме детей до 13-ти лет.
            </p>
            <p>
                Детям до 13-ти лет нужно получить согласие от родителей на обработку персональных данных. Заполнить форму можно по ссылке: <a href="#">Форма для детей до 13-ти лет</a>.
            </p>
            <p>
                Выделяется несколько групп аудитории:
            </p>
            <ul>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">Обычные люди</span> Большинство пользователей, которые рады вести свои социальные сети
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">Общественные личности</span> Те, кто стремится к объединению общественных усилий, обсуждению проблем и поиску партнеров
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">Фотографы</span> Аквариум приветствует всех, кто вдохновляется красотой мира, обожает фотографировать удивительные создания и желает поделиться этой красотой с другими
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">Художники</span> Аквариум предлагает возможность творческой самореализации для фотографов, художников и всех, кто искал место для выражения своего вдохновения и творчества в контексте морской жизни и окружения
                </li>
                <li class="mb-2">
                    <span class="border border-1 rounded-2 m-1 p-1 ms-0">Путешественники</span> Те, кто ценит пейзажи и мечтает делиться увлекательными рассказами и впечатлениями о своих подводных приключениях с широкой аудиторией.
                </li>
            </ul>
            <h2>Доступы</h2>
            <h3>Веб-сайт</h3>
            <p>
                Социальная сеть Аквариум располагается по адресу: <a href="//aquarium.org.ru">aquarium.org.ru</a>. С этого адреса доступна сама социальная сеть, ведутся медиа каналы и располагаются доступы для разработчиков.
            </p>
            <p>
                Основной интерфейс взаимодействия с социальной сетью — веб-сайт, именно с его помощью можно создать новый аккаунт или войти в существующий, производить настройку и персонализацию своих данных, находить новых людей и вести свою страницу.
            </p>
            <h3>Мобильные приложения</h3>
            <p>
                Для доступа к социальной сети на мобильных устройствах лучше использовать <a href="{{ route('main.download') }}">мобильные приложения</a>, которые доступны для Android и iOS. У пользователей с мобильных устройств сохраняется доступ к веб-версии соцсети Аквариум.
            </p>
            <h3>API</h3>
            <p>
                Для взаимодействия с социальной сетью Аквариум для разработчиков имеется возможность использования API социальной сети Аквариум для получения доступа к собственному аккаунту и базовым возможностям соцсети. Для этого используйте <a href="{{ route('main.api') }}">документацию</a>.
            </p>
            <h2>Технологии проекта</h2>
            <p>
                Сайт соцсети Аквариум работает на PHP 8, используя фреймворк Laravel 10. Для интерфейса используется фреймворк Bootstrap 5. Подробнее про технологии проекта на <a href="{{ route('main.tech') }}">отдельной странице</a>.
            </p>
            <h3>OAuth</h3>
            <p>
                Открытый протокол авторизации при помощи соцсети Аквариум. С помощью OAuth у пользователей есть возможность входить в аккаунты других сервисов используя аккаунт социальной сети Аквариум. При авторизации у пользователя есть возможность указать, какими данными можно поделиться.
            </p>
            <h3>Безопасность и защита данных</h3>
            <p>
                При регистрации пользователь использует электронную почту для закрепления доступа к аккаунту и возможности восстановления доступа к аккаунту. При авторизации пользователь указывает введённую электронную почту и собственный пароль, либо использует код, отправленный на указанную почту.
            </p>
            <p>
                При регистрации или изменении пароля, он хранится в зашифрованном виде, используя хэширование MD5 без возможности дешифрации. При несанкционированным доступе, получить пароль от аккаунта невозможно.
            </p>
            <h3>Открытый код</h3>
            <p>
                Проект социальной сети Аквариум представляет собой проект открытого исходного кода, расположенного на GitHub: <a href="//github.com/DanyaBooba/aquarium-2024" target="_blank">исходный код</a>.
            </p>
            <p>
                Каждый желающий может участвовать в развитии проекта, вносить изменения, разрабатывать дополнения и предлагать улучшения. Доступ к <a href="//github.com/DanyaBooba/aquarium-2024/issues" target="_blank">Issue</a>. Доступ к <a href="//github.com/DanyaBooba/aquarium-2024/pulls" target="_blank">Pull Request</a>.
            </p>
            <h2>Личный кабинет</h2>
            <h3>Авторизация</h3>
            <p>
                Для того, чтобы получить доступ к личному кабинету пользователю требуется авторизоваться в свой аккаунт, либо создать новый. Для создания аккаунта можно использовать 2 способа авторизации: через почту и с использованием сервисов.
            </p>
            <h4>Через почту</h4>
            <p>
                При регистрации аккаунта через почту, пользователю потребуется подтвердить почту через код, отправленный на почту. Регистрация через почту удобна, потому что пользователь явно знает, какая почта используется при регистрации.
            </p>
            <h4>С использованием сервисов</h4>
            <p>
                Использование сервисов не требует подтверждения почты. Использование сервисов — самый быстрый вариант регистрации аккаунта, потому что требует нажатия 1 кнопки.
            </p>
            <h3>Добавить второй аккаунт</h3>
            <p>
                У пользователей есть возможность добавить второй аккаунт и удобно переключаться между ними в один клик.
            </p>
            <h3>Выход из аккаунта</h3>
            <p>
                Выход из аккаунта не удаляет сам аккаунт или данные с аккаунта, выход из аккаунта освобождает запись об авторизации в аккаунт. После выхода из аккаунта потребуется заново авторизоваться в него. Выход из аккаунта на одном устройстве не приводит к выходу из аккаунта на другом.
            </p>
            <h3>Изменить аватарку, шапку</h3>
            <p>
                Для изменения аватарки или шапки аккаунта следует использовать настройки, вкладку с кастомизацией.
            </p>
            <h3>Уведомления аккаунта</h3>
            <p>
                У пользователей есть возможность настроить уведомления аккаунта, включить только необходимые для аккаунта уведомления. Настроить уведомления можно через настройки, пункт уведомления.
            </p>
            <h3>Изменить пароль</h3>
            <p>
                Для изменения пароля следует использовать настройки, пункт изменения пароля. Если забыли пароль — потребуется подтвердить владение почтой, либо использовать старый пароль от аккаунта.
            </p>
            <h3>Изменение личных данных</h3>
            <p>
                Изменение личный данных аккаунта доступно через настройки вкладку личные данные. Для изменения доступно имя, фамилия и никнейм пользователя. По никнейму есть возможность найти аккаунт пользователя.
            </p>
            <h3>Подтверждение почты</h3>
            <p>
                Подтверждение почты в аккаунте соцсети Аквариум обеспечивает повышенный уровень безопасности и помогает поддерживать более надежное и прозрачное сообщество пользователей. Подтверждение почты помогает удостоверить личность пользователя и защитить аккаунт от несанкционированного доступа или создания фальшивых профилей.
            </p>
            <p>
                Подтвержденная электронная почта делает процесс восстановления учетной записи более эффективным и облегченным в случае утери доступа к аккаунту.
            </p>
            <h3>Удаление аккаунта</h3>
            <p>
                У любого пользователя есть возможность навсегда удалить аккаунт с социально сети Аквариум. Для этого следует заполнить форму удаления аккаунта в настройках, потребуется подтвердить аккаунт.
            </p>
            <h2>Про социальную сеть</h2>
            <h3>Как пришла идея</h3>
            <p>
                В 2019 году при разработке мобильных игр появилась задача сохранения прогресса между разными устройствами. Для этого требовалось разработать личный кабинет, реализовать возможность авторизации, сохранять прогресс игры на сервер и с других устройств считывать этот прогресс для того, чтобы была «бесшовная» игра между разными устройствами.
            </p>
            <p>
                Удалось реализовать личный кабинет через мобильную игру, но появилась задача — потребовалось реализовать доступ к аккаунту через браузер для возможности удобной настройки аккаунта. Именно для решения этой задачи в 2019 году параллельно началась разработка веб-версии личного кабинета.
            </p>
            <h3>Начало разработки</h3>
            <p>
                В 2019 году появился первый проект, в котором была «попытка» реализации личного кабинета. К сожалению, успеха у данного сайта не было: он не позволял ни создать аккаунт, ни войти в существующий.
            </p>
            <p>
                В 2020-2022 годах была более успешная попытка разработать на чистом PHP личный кабинет. Проект имел название «Creagoo ID» и располагался по адресу <a href="//id.creagoo.ru" target="_blank">id.creagoo.ru</a>, сейчас по этому адресу открывается текущая социальная сеть. Разработка вышла лучше, у пользователей появилась возможность входить в аккаунты и создавать новые, была базовая настройка аккаунта.
            </p>
            <p>
                В 2023 году произошел перезапуск проекта 2020-2022 года, реализация была на том же чистом PHP, но появилась интеграция с OAuth других сервисов, отправка писем и уведомлений, интеграция с другими пользователями и «начало» постов. Данный проект существует уже как «социальная сеть».
            </p>
            <h3>Смысл названия</h3>
            <p>
                «Аквариум» — это символ виртуального подводного мира, где пользователи могут общаться, делиться своими моментами и наблюдениями, и быть частью удивительной зоны обмена идей и эмоций. Название «Аквариум» воплощает в себе свежесть, прозрачность и разнообразие, которые характеризуют нашу социальную сеть.
            </p>
            <h3>Цели на 2024-2025 года</h3>
            <ul>
                <li class="mb-2">
                    Разработка мобильного приложения для Аквариума. Мобильные приложения для Android и iOS планируются создаваться с использованием фреймворка React Native. На разработку планируется потратить минимум 9 месяцев
                </li>
                <li class="mb-2">
                    Добавление фотографий. Фотографии в социальной сети могут быть использованы в личном кабинете, в шапке профиля, в постах
                </li>
                <li class="mb-2">
                    Увеличение аудитории до 100 человек. Постоянный рост аудитории — стимул продолжать работу над социальной сетью
                </li>
                <li>
                    Реализация OAuth.
                </li>
                <li>
                    Реализация API.
                </li>
            </ul>
            <h3>#пригласи_друга</h3>
            <p>
                Акция «Пригласи друга» — это возможность отправить личное приглашение другу, чтобы участвовать в конкурсе на большее количество приглашенных людей. Не забудьте сказать другу, что он тоже может участвовать!
            </p>
            <p>
                Чтобы использовать личное приглашение, следует скопировать её из своего профиля.
            </p>
            <h2>Ссылки</h2>
            <h3>Обратная связь</h3>
            <ul>
                <li>
                    Обратная связь: <a href="//ddybka.t.me" target="_blank">@ddybka</a>
                </li>
                <li>
                    Обратная связь: <a href="mailto:daniil@dybka.ru">daniil@dybka.ru</a>
                </li>
                <li>
                    GitHub репозиторий: <a href="//github.com/DanyaBooba/aquarium-2024" target="_blank">aquarium-2024</a>
                </li>
                <li>
                    GitHub Issue: <a href="//github.com/DanyaBooba/aquarium-2024/issues" target="_blank">aquarium-2024/issues</a>
                </li>
                <li>
                    GitHub Pull Request: <a href="//github.com/DanyaBooba/aquarium-2024/pulls" target="_blank">aquarium-2024/pulls</a>
                </li>
            </ul>
            <h3>Медиа</h3>
            <ul>
                <li>
                    <a href="//aquariumsocial.t.me">Телеграм канал</a>
                </li>
                <li>
                    <a href="//vk.com/aquariumsocial">Паблик ВКонтакте</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@once
    @push('js')
        <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
    @endpush
@endonce
