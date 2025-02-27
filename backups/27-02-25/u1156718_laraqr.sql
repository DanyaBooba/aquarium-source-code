-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 26 2025 г., 11:34
-- Версия сервера: 8.0.25-15
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1156718_laraqr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achivs`
--

CREATE TABLE `achivs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `achivs`
--

INSERT INTO `achivs` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'с первых минут'),
(2, NULL, NULL, 'любовь к проекту'),
(3, NULL, NULL, 'поддержка проекта'),
(4, NULL, NULL, 'автор проекта'),
(5, NULL, NULL, 'менеджер проекта'),
(6, NULL, NULL, 'подписка на телеграм'),
(7, NULL, NULL, 'google'),
(8, NULL, NULL, 'яндекс');

-- --------------------------------------------------------

--
-- Структура таблицы `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagecap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `likesJson` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `created_at`, `updated_at`, `active`, `title`, `content`, `imagecap`, `likes`, `likesJson`) VALUES
(1, NULL, NULL, 1, 'Первая запись!', '123', '123', 0, NULL),
(2, NULL, NULL, 1, 'Первая запись!', '123', NULL, 0, NULL),
(3, NULL, NULL, 1, 'Первая запись!', '123', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `codes`
--

CREATE TABLE `codes` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unixtimeCreate` int NOT NULL,
  `unixtimeToLife` int NOT NULL,
  `idUser` int NOT NULL,
  `code` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `complains`
--

CREATE TABLE `complains` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idUser` int NOT NULL,
  `idUserFrom` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `complains`
--

INSERT INTO `complains` (`id`, `created_at`, `updated_at`, `idUser`, `idUserFrom`) VALUES
(21, '2024-06-12 15:16:29', '2024-06-12 15:16:29', 21, 1),
(22, '2024-06-15 19:44:43', '2024-06-15 19:44:43', 96, 57),
(23, '2024-07-22 13:29:36', '2024-07-22 13:29:36', 1, 85),
(24, '2024-07-22 16:03:54', '2024-07-22 16:03:54', 46, 1),
(25, '2024-07-29 16:37:50', '2024-07-29 16:37:50', 1, 107),
(26, '2024-10-10 08:53:15', '2024-10-10 08:53:15', 101, 20),
(27, '2024-10-15 12:12:48', '2024-10-15 12:12:48', 107, 1),
(28, '2024-10-26 04:29:39', '2024-10-26 04:29:39', 104, 20),
(29, '2024-10-31 06:45:33', '2024-10-31 06:45:33', 109, 1),
(30, '2024-11-12 10:45:58', '2024-11-12 10:45:58', 1, 6),
(31, '2024-11-12 10:46:36', '2024-11-12 10:46:36', 75, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_03_29_071523_create_notifications_table', 2),
(6, '2024_04_30_150219_create_complains_table', 3),
(9, '2024_05_02_115852_create_verifies_table', 5),
(11, '2024_05_02_124037_create_blocks_table', 6),
(14, '2024_04_30_223933_create_posts_table', 8),
(16, '2024_03_16_210455_create_blogs_table', 10),
(18, '2024_05_14_231243_create_restores_table', 12),
(19, '2024_05_15_102817_create_codes_table', 13),
(20, '2024_03_16_210501_create_users_table', 14),
(21, '2018_08_08_100000_create_telescope_entries_table', 15),
(23, '2024_06_12_164414_create_achivs_table', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `iduser` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `active`, `iduser`, `title`, `message`) VALUES
(1, '2024-04-01 12:31:35', '2024-04-01 12:31:35', 1, 2, 'title', 'message');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `idPost` int NOT NULL,
  `idUser` int NOT NULL,
  `haveimage` tinyint(1) NOT NULL DEFAULT '0',
  `imagename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `active`, `idPost`, `idUser`, `haveimage`, `imagename`, `message`, `desc`) VALUES
(28, '2024-06-13 11:31:48', '2024-11-17 20:11:31', 1, 2, 21, 0, NULL, '<strong>PHP is good!!</strong>', 'PHP is good!!'),
(29, '2024-06-13 11:35:43', '2024-07-16 08:10:44', 1, 3, 21, 0, NULL, '<div>in urgency panel kicks</div>', 'in urgency panel kicks'),
(30, '2024-06-15 19:44:19', '2024-07-16 08:10:48', 1, 1, 57, 0, NULL, '<div>1</div>', '1'),
(33, '2024-07-11 16:05:58', '2024-07-11 16:05:58', 1, 1, 77, 0, NULL, 'R', 'R'),
(36, '2024-07-14 16:47:07', '2024-07-22 16:28:11', 1, 1, 1, 0, NULL, '<div>Социальная сеть Аквариум — это платформа для создания постов и социального взаимодействия с пользователями.&nbsp;</div>', 'Социальная сеть Аквариум — это платформа для создания постов и социального взаимодействия с пользователями.&nbsp;'),
(37, '2024-07-14 18:01:43', '2024-07-22 16:29:15', 1, 2, 1, 0, NULL, '<div>В программировании первая программа — это так называемый «Hello World!». Когда разработчики знакомятся с синтаксисом нового языка, они создают программу, которая позволит вывести на экран надпись «Привет Мир!»</div>', 'В программировании первая программа — это так называемый «Hello World!». Когда разработчики знакомятся с синтаксисом нового языка, они создают программу, которая позволит вывести на экран надпись «Привет Мир!»'),
(38, '2024-07-16 05:31:13', '2024-07-16 08:10:56', 1, 1, 85, 0, NULL, '<div>Начал делать новую игру , придумал название WriteCode, чтобы проходить головоломки, надо написать код !!</div>', 'Начал делать новую игру , придумал название WriteCode, чтобы проходить головоломки, надо написать код !!'),
(39, '2024-07-22 14:12:26', '2024-07-22 19:18:17', 1, 1, 101, 0, NULL, '<div>Хеллоу ворлд</div>', 'Хеллоу ворлд'),
(40, '2024-07-22 17:30:59', '2024-07-22 19:18:24', 1, 2, 85, 0, NULL, '<div>Сегодня я вам расскажу правду об программировании на таких языках как: html, css, php , на самом деле это английский язык 😭😭😭😭</div>', 'Сегодня я вам расскажу правду об программировании на таких языках как: html, css, php , на самом деле это английский язык 😭😭😭😭'),
(41, '2024-07-22 18:28:13', '2024-07-22 19:18:28', 1, 1, 102, 0, NULL, '<div>У знал у знакомого про эту соц сеть. Прикольно выглядит)</div>', 'У знал у знакомого про эту соц сеть. Прикольно выглядит)'),
(42, '2024-07-22 18:56:57', '2024-07-22 19:18:33', 1, 2, 102, 0, NULL, '<div>(⁠☞ﾟ⁠ヮﾟ⁠)⁠☞</div>', '(⁠☞ﾟ⁠ヮﾟ⁠)⁠☞'),
(43, '2024-07-22 19:29:05', '2024-07-23 10:27:53', 1, 1, 103, 0, NULL, '<div>Привет пупсики. Когда сеть расхайпится, я буду гордиться тем, что я здесь есть!!</div>', 'Привет пупсики. Когда сеть расхайпится, я буду гордиться тем, что я здесь есть!!'),
(44, '2024-07-23 02:19:51', '2024-07-23 02:20:11', 1, 1, 62, 0, NULL, '<div>Тестовый пост!&nbsp;</div>', 'Тестовый пост!&nbsp;'),
(45, '2024-07-23 19:25:22', '2024-07-23 19:26:46', 1, 1, 104, 0, NULL, '<h1><strong>О чём этот пост?</strong></h1><div><br></div><div>Послушайте!</div><div><br></div><div>Ведь, если звезды зажигают —</div><div>значит — это кому-нибудь нужно?</div><div><br></div><div>Если тысячи мух летят в одну сторону — значит — существует причина?</div><div><br></div><div>Если Вы читаете это — значит — вам интересно, всё-таки</div><div><br></div><div><strong>Так о чём этот пост?</strong></div>', 'О чём этот пост?Послушайте!Ведь, если звезды зажигают —значит — это кому-нибудь нужно?Если тысячи мух летят в одну сторону — значит — существует причина?Если Вы читаете это — значит — вам интересно, всё-такиТак о чём этот пост?'),
(46, '2024-07-26 10:32:20', '2024-07-26 10:34:14', 1, 1, 106, 0, NULL, '<div>Всем привет!<br>Теперь я пользователь Аквариума!</div>', 'Всем привет!Теперь я пользователь Аквариума!'),
(48, '2024-07-27 10:48:31', '2024-07-27 10:48:31', 1, 1, 99, 0, NULL, 'alert(\'123\')', 'alert(\'123\')'),
(49, '2024-07-29 07:05:00', '2024-07-30 13:46:17', 1, 3, 1, 0, NULL, 'Hi', 'Hi'),
(50, '2024-07-31 11:41:28', '2024-08-02 16:35:19', 1, 1, 98, 0, NULL, 'Всем привет, подписывайтесь на меня! Взаимная подписка!', 'Всем привет, подписывайтесь на меня! Взаимная подписка!'),
(51, '2024-08-23 15:19:21', '2024-08-23 15:19:21', 1, 1, 12, 0, NULL, 'я кушаю нагенсы с сыром', 'я кушаю нагенсы с сыром'),
(53, '2024-08-23 15:21:09', '2024-08-23 15:21:09', 1, 2, 12, 0, NULL, 'я честно&nbsp;', 'я честно&nbsp;'),
(54, '2024-08-23 15:21:47', '2024-09-10 07:27:22', 0, 3, 12, 0, NULL, 'дыбка, разблокай, я больше так не буду', 'дыбка, разблокай, я больше так не буду'),
(55, '2024-08-24 18:36:05', '2024-08-26 16:41:10', 1, 2, 101, 0, NULL, '#FREEDUROV', '#FREEDUROV'),
(56, '2024-08-27 20:04:54', '2024-08-27 20:05:54', 1, 4, 1, 0, NULL, '<p>Друзья, хочется продублировать пост про Павла Дурова, написанный в канале платформы Аквариум. </p>\r\n\r\n<p>Очень страшно наблюдать за тем, что сейчас происходит с Дуровым. Безусловно, я выражаю слова поддержки для него, его команды и проекта Телеграм.</p> \r\n\r\n<p>Мы каждый день пользуемся тем, что создал Павел Дуров. В начале это было Вконакте, где мы в 2014 году смотрели мемы, играли в ВК Коин, а после стали наблюдать деградацию платформы после ухода Павла.</p> \r\n\r\n<p>Далее, мы стали всем миром общаться в Телеграме, создавать и вести каналы и многое другое. Благодаря Телеграму множество людей обрело связь с близкими. Такую же безопасную, как и в Сигнале, благодаря секретным чатам.</p>\r\n\r\n<p>Но сейчас про Павла говорят, что он является участником тех преступлений, которые координируются в Телеграме. Мое мнение следующее: в телеграме слабая модерация, из-за чего люди, задачи которых не сходятся с задачами обычных граждан: переписки и общение стали пользоваться Телеграмом для координации действий, направленных против безопасности людей.</p> \r\n\r\n<p>Я осуждаю действия тех людей, которые пользуются Телеграмом во вред. Любой вид атак, их обсуждение и планирование. Данный вид преступлений, в том числе и кибер, должны быть исключены из Телеграма. </p>\r\n\r\n<p>Наверняка Павел знает про все то, что происходит в «темной» части Телеграма, в том числе он высказывался неоднократно на этот счет. В Телеграме должны произойти изменения, касательно модерации контента, при этом, свободное общение людей, цели которых безобидны и невинны, не должны пострадать от нападков на Телеграм. </p>\r\n\r\n<p>Свободу Павлу и свобода воли Телеграма.</p>\r\n\r\n<p>#FREEDUROV</p>', 'Друзья, хочется продублировать пост про Павла Дурова, написанный в канале платформы Аквариум. \r\n\r\nОчень страшно наблюдать за тем, что сейчас происходит с Дуровым. Безусловно, я выражаю слова поддержки для него, его команды и проекта Телеграм. \r\n\r\nМы кажды'),
(58, '2024-10-04 03:28:37', '2024-10-09 06:55:03', 1, 1, 108, 0, NULL, 'Приветствую вас!', 'Приветствую вас!'),
(59, '2024-11-20 08:19:14', '2024-11-20 08:19:14', 1, 1, 6, 0, NULL, 'Меня зовут Миша и я не помню, как писал этот пост!', 'Меня зовут Миша и я не помню, как писал этот пост!'),
(60, '2024-11-28 20:57:36', '2024-11-28 20:57:36', 1, 4, 21, 0, NULL, '<h1>My name is Bella Hadid</h1>', 'My name is Bella Hadid'),
(61, '2024-12-24 06:14:24', '2024-12-24 06:14:24', 0, 3, 85, 0, NULL, 'Знаете что общего между тобой и мной ? Мы оба хотим сделать мир лучше...', 'Знаете что общего между тобой и мной ? Мы оба хотим сделать мир лучше...');

-- --------------------------------------------------------

--
-- Структура таблицы `restores`
--

CREATE TABLE `restores` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unixtimeCreate` int NOT NULL,
  `unixtimeToLife` int NOT NULL,
  `idUser` int NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `restores`
--

INSERT INTO `restores` (`id`, `created_at`, `updated_at`, `unixtimeCreate`, `unixtimeToLife`, `idUser`, `code`) VALUES
(2, '2024-07-16 07:30:32', '2024-07-16 07:30:32', 1721125832, 1721212232, 8, 'OHVQAfQnhd.girmocoomfaeogf@claDPvnUMULaI8'),
(5, '2024-09-10 13:04:39', '2024-09-10 13:04:39', 1725984279, 1726070679, 12, 'ZOmXw11HyZigkaa0o@aricvansm2.o0tmdla0yOHINj1mL0M12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatarDefault` tinyint(1) NOT NULL DEFAULT '1',
  `capDefault` tinyint(1) NOT NULL DEFAULT '1',
  `sub` int NOT NULL DEFAULT '0',
  `subs` int NOT NULL DEFAULT '0',
  `achivs` int NOT NULL DEFAULT '0',
  `subJson` json DEFAULT NULL,
  `subsJson` json DEFAULT NULL,
  `achivsJson` json DEFAULT NULL,
  `shareToken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceLogin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings_notifications` json DEFAULT NULL,
  `usertype` int NOT NULL DEFAULT '0',
  `md5use` tinyint(1) DEFAULT NULL,
  `md5salt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `verified`, `blocked`, `username`, `email`, `firstName`, `lastName`, `avatar`, `cap`, `desc`, `avatarDefault`, `capDefault`, `sub`, `subs`, `achivs`, `subJson`, `subsJson`, `achivsJson`, `shareToken`, `serviceLogin`, `settings_notifications`, `usertype`, `md5use`, `md5salt`, `password`, `remember_token`) VALUES
(1, NULL, '2025-02-25 19:33:17', 1, 0, 'dybka', 'danil.dybko@gmail.com', 'Даниил', 'Дыбка', 'https://aquariumsocial.ru/public/loads/tYKbU-tVjER-UGw4u-WEKp1-mjk1o-00001-17304-11973.jpg', 'https://aquariumsocial.ru/public/loads/Zh27f-TUKR4-2NsaY-YEhvm-A5rkP-00001-17304-12007.jpg', 'Автор', 0, 0, 5, 12, 3, '[25, 98, 106, 107, 105]', '[5, 19, 25, 77, 99, 85, 102, 105, 106, 107, 98, 21]', '[1, 3, 4]', 'OCSk1ggSm', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 100, NULL, NULL, '$2y$12$AbagJ/iN.eoQ80AmeGCKc.v1sQMoomp7mRPypvd/A3p9FpjIi.hnq', NULL),
(2, NULL, NULL, 1, 0, 'snowdrit', 'solingennavi@gmail.com', 'Матфей', 'Артюхин', 'MAN1', 'BG4', '', 1, 1, 0, 0, 3, '[]', '[]', '[1, 3, 6]', '61zP22N3C', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, '46n2a05z1Yksaxpv', '$2y$10$7D5EgK5kZFxaqkkPLV1POuwCHRaYWwXvCT53j1dH69GZHJ.9HNRra', NULL),
(3, NULL, NULL, 1, 0, 'megnatiy', 'mrignatiy05@gmail.com', 'Игнатий', 'Герасимов', 'MAN4', 'BG4', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'm6BC3fuic', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'fzFV5x0m2foE9Qkh', '$2y$10$3DyO2sF6RHxC0G63Plwuoew6PUboYH0hLQxwF.s0/qrr7ek60oHYq', NULL),
(4, NULL, NULL, 1, 0, 'renkort', 'renkort33@gmail.com', 'Роман', 'Казин', 'MAN4', 'BG4', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'KFaP4xMYW', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'G1y6745iCFVO7lPF', '$2y$10$2Q6GskStEVVB6VvzQH.Ve.ajKKttTgzvEur5sa5BQmorSpado7sNy', NULL),
(5, NULL, NULL, 1, 0, 'evo', 'rephose@mail.ru', 'Александр', 'Семченко', 'MAN1', 'BG4', '', 1, 1, 1, 0, 3, '[1]', '[]', '[1, 3, 6]', 'Wric5rljC', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'LE2fJJefApSxHHBx', '$2y$10$Hw2EOcJ8a69irLRvQWi1zOrZChfabR4WEWIXW4e/XFG31iMkJ3tii', NULL),
(6, NULL, '2024-11-12 10:47:22', 1, 0, 'marknerok', 'misaromasin@mail.ru', 'Михаил', 'Ромашин', 'MAN6', 'BG8', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'yzx36hGRH', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$IraDp1xY0SPhBB8POawHlumZ5P1b.3EKX1MikNR3CKb4P6uJEWxh6', NULL),
(7, NULL, NULL, 1, 0, 'give.me.peace', 'give.me.peace@yandex.ru', 'Даниил', 'Иванов', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[8]', '15aS753a4', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'lzR2WKsJj8I8g134', '$2y$10$Hu1IVMIl0J/wPTMqGQZTSeMZhmB9s8/QZNrt/OFz1NFpc2AimRhAm', NULL),
(8, NULL, NULL, 1, 0, '', 'creagoooff@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 's2Fg8XEni', '', '{\"dataChange\": false, \"authorization\": false, \"passwordChange\": true}', 0, 1, 'gs2zDENqOBsudool', '$2y$10$zUlRB3OtxJ6JRXsAYHTNoutsBrha1GdWGfh68kqlybdQIyd.RrDEC', NULL),
(9, NULL, NULL, 1, 0, 'joban', 'vanbubnov@gmail.com', 'Иоанн', 'Бубнов', 'MAN1', 'BG2', '', 1, 1, 0, 0, 3, '[]', '[]', '[1, 3, 7]', 'Dz8f95Vji', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'ExZMWlK37YGUtnt5', '$2y$10$oecXlWVOQmbEvCQGYbnQ0OFpetX2VRPCnhwILiOBJppslQmbAiMZu', NULL),
(10, NULL, NULL, 1, 0, '', 'mega.aktep@mail.ru', 'Давид', 'Козлов', 'MAN1', 'BG2', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'cPFZ108Czy', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, '7L57uej53l419bGU', '$2y$10$kh8Y7NPiWXajQRhEzj3QLezki7l8mUDXgh6cyYVujxvWNasymAt42', NULL),
(11, NULL, NULL, 1, 0, 'evg', 'budo1@ya.ru', 'Евгений', 'Петров', 'MAN1', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'yB3u11RQQi', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'zI0UoNnYnVfc3ArH', '$2y$10$KrqIE.YXi.0mwiL/GZnAd.LeEM0rtfKsPBJCD90tiDBMDuKkeIF8m', NULL),
(12, NULL, '2024-09-10 13:08:16', 1, 0, 'nastya', 'kadirovanastya2000@gmail.com', 'Няшка', 'Альтушка', 'WOMAN5', 'BG6', 'Ну крч, классная тянка,хелп пж, чурка краш', 1, 1, 0, 1, 2, '[]', '[29]', '[1, 3]', 'ljVe12Qtti', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'a9QLwwG12JYUsc3M', '$2y$12$PGMCezCoyCzBteMrr0NZhe2v4cKVcD7AOLASh2gepZwJX0vwc.pOK', NULL),
(13, NULL, '2024-09-10 15:56:01', 1, 0, 'informeazacom', 'blogioaneu@gmail.com', '', '', 'MAN1', 'BG5', '', 1, 1, 1, 0, 1, '[103]', '[]', '[7]', 'GDoA13i2ae', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'DDjavFN2FnlH3DXD', '$2y$10$NG9kic2PsI5z8re.zN0vaezP0i54yK2OF7xmOH4y8DGFDB2SX56de', NULL),
(14, NULL, NULL, 1, 0, 'user1033', 'zipper018@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'dRqh14muzI', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'rEnwunVbZS7QHkhT', '$2y$10$YQZVFh8cCx7e/JfT9s8Pi.YroEEWH8uVaSLAB35iFiS4NPFGNzyQq', NULL),
(15, NULL, NULL, 1, 0, '', 'a.khlimankov@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'fvdP15DakH', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'y94m2DamGKfR3UAU', '$2y$10$H87WarsqEohSjBKY.cx03OFuM1V8dM/vA3DvztJQYLH4Xu6L98bCe', NULL),
(16, NULL, NULL, 1, 0, 'yuran', 'agentzv@mail.ru', 'Юрий', 'Гуляев', 'MAN1', 'BG4', 'Профиль', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'bSjv16oXVF', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'wVi1YfTNEpl6Akj7', '$2y$10$xaswsTk0r7qw.oY.9kY/y.xjoL//21VMQe7Dzw/b1X1ZZPS29G2ry', NULL),
(17, NULL, NULL, 1, 0, '', 'danila@posevin.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[3]', 'neV417Jx49', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'UYTg68Huih', '$2y$10$X6nNTblWL91tAhOFEj3NnumtAqmT.uEVwMy11rb2.v.2iHk0l9Hr6', NULL),
(18, NULL, NULL, 0, 0, '', 'bab.tv@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'UYGuygUT876', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'OIubytG8787hu', '$2y$10$WFpY4Solx.qYGg8dutP2YeHbiQLiESRzUto7DilCRzvQkH0V1NrV.', NULL),
(19, NULL, NULL, 1, 0, '', 'tribmd@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 1, 0, 0, '[1]', '[]', '[]', 'gzYc1918Tb', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'nW2VDeOsQwMwYHTRHDZCYQ0kBVnLXPSGAL7G8oG3TyV1diBM3VyzJyLSuWZIGMbF2CUAv18AFALYeOHM', '$2y$10$rGpRTaz3jRR81PMBZ4pnP.GjAQR2mPeUXMV8qK47CYYdxb7Ix4wWW', NULL),
(20, NULL, '2024-10-26 04:29:29', 1, 0, 'ddybka', 'creagoo@yandex.ru', 'Даниил', 'Дыбка', 'MAN4', 'BG5', 'Новая социальная сеть!', 1, 1, 0, 0, 1, '[]', '[]', '[8]', 'lK8q20MG4R', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'rykmhOmllz34ThO3', '$2y$10$67NpPg4bG3kk69gWp8GsD.tx9fyICXwz/6OHq8L5.znX13bX7NMCa', NULL),
(21, NULL, '2024-11-28 21:48:12', 1, 0, 'alsem4encko', 'alsem4encko@yandex.ru', 'Александр', 'Семченко', 'https://aquariumsocial.ru/public/loads/rRO1a-BMKvi-fyRfD-xEnbv-TQ4db-00021-17328-38431.jpg', 'https://aquariumsocial.ru/public/loads/h3nub-2sp5t-k07MY-mZm7h-OyNUx-00021-17328-38539.jpg', 'senior', 0, 0, 2, 1, 4, '[75, 1]', '[102]', '[1, 3, 6, 8]', 'WpWt21Kln9', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'mORVteysKOm9tIkW', '$2y$10$yl3WsSbqxNWchg4ijyE/W.qAnXMIe8/5lIgZNDlIuU4IMxhdRlxQm', NULL),
(22, NULL, NULL, 1, 0, 'sergeevizh', 'sergeevizh@yandex.ru', 'Кирилл', 'Трубецкой', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[8]', 'cFcu22iF8T', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'dfpzVsmJgSwN0Xtx', '$2y$10$MjYPNVzO6lrQP1dtaevDZOMdwHVJcE6HdPUKR0LTKcdTTg0F9Kh0C', NULL),
(23, NULL, NULL, 1, 0, 'mapc2012', 'MAPC2012@yandex.ru', 'Виктор', 'Швецов', 'MAN4', 'BG5', '', 1, 1, 1, 0, 1, '[54]', '[]', '[8]', 'vuis23NjIJ', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'hC6cV0ABtx8YNGyV', '$2y$10$1v/FStnd0hQlHz3FSa8wxORORTOl.PqMF4nlkCdlRHcadV8qwV3lq', NULL),
(24, NULL, NULL, 0, 0, '', 'maxblake2015@hotmail.com', '', '', 'MAN2', 'BG5', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ugytHTygt67guy', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '0BGte6RGmyrXnvhuDGc5NIEe51hWGA7SjyDu3kzGV4U7VPbrWQCmXS6RnJu76D1JIVF97ag4Iuk7pP7D', '$2y$10$O./f.Psa4SZYUo3jOtnOCO75AwWCFC5Y/zPJmZQoEymzSM8X/Z6RO', NULL),
(25, NULL, NULL, 1, 0, 'zxc', 'eli1starboom@gmail.com', 'Петух', 'Жареный', 'MAN1', 'BG4', '', 1, 1, 1, 1, 2, '[1]', '[1]', '[3, 6]', 'ixo325vY2j', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'OckPgJwFuBwyg9J4', '$2y$10$WzB69ABhP6X1rjzd2YnlQucW1utkWbm8TVFbwADWZlHXpemd1X25K', NULL),
(26, NULL, NULL, 1, 0, '', 'damochkin.nikita@yandex.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'EaNM26pg9Q', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'qIERmZLN6AToyDC6XnHkhjbM0OxZzngxb6CPwbuSZfiRzudYJWtt4BiscK6hTzIMZepkuNLwDl98Pb8u', '$2y$10$UuSlUdC6vFkDfGzZOd2QmeF2Dr2vHz.tG7UklhUrj1h8OxRTH2ZaO', NULL),
(27, NULL, NULL, 1, 0, 'pavelex', 'bypavelex@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'XL8q27xp3r', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'S4maseoQhEiijVr3', '$2y$10$RIlkZXnQMMvLXRBe3pw3Fus2fziTHxPuB5njHqXPXK7oZzAJukCpq', NULL),
(28, NULL, NULL, 1, 0, '', 'wfdaj@126.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'UM6E28QbFy', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'VzBg7n4n57fPjj23h0iFS3R0O6gvUx85FRTLxWYZDfoL6xMc9wWmvNZhw3jVqY2ENljLe26N9kHtVSEJ', '$2y$10$jiGF3VH8SgnB8Hpfvy7KIu/5iSthOpYSIojV8ZHlv4LCbSG8d.xQW', NULL),
(29, NULL, '2024-09-10 13:08:16', 1, 0, '', 'kadirovanastya12@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 1, 0, 1, '[12]', '[]', '[1]', 'D688tyHihu', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$gv6EeCXWuGsx6YKotdRV0OzwVa7wQmz2WC2pDYCChSDvRHyHmnpAu', NULL),
(30, NULL, NULL, 0, 0, '', 'olen54172@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'rfg&G7G8', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'mrpkYiNJQky66wDmHH7lwsfC6ia0tg9A4JRjRQFYwMaTjZqvVGtfUMxyjq585cyonHvmeivgjXxv1kXR', '$2y$10$2t1SaGzFcVA.PdYXZvdyPerQIYA7bV1AhZ8Y6ArmnSevsGZGmWXUS', NULL),
(31, NULL, NULL, 0, 0, '', 'aaa@aaa.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '*&GTh8ttg', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'kfy59njaQMrxgvtLy79VEm6wKHbfROVxoc5g38lHRuInkKd5L0zf4TKAZ9tJSu4BqJ1lnBsc5XtpOgsa', '$2y$10$2mH2pNIXmH8cQHLVusU7yedkOr6bnzYlF98TWWJqwcGlrC0KK0wpe', NULL),
(32, NULL, NULL, 1, 0, 'essamkafafy', 'essamkafafy@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'j8q4329fn1', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'z2bVg8z2HSPdLSpR', '$2y$10$iveB1Ti.z6.D7.j2pbyEc.HPhsC7wsbnmVHft8Ena23q.JSNib7hK', NULL),
(33, NULL, NULL, 1, 0, '', 'jeedeaky@yandex.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'HNci330UPi', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '9xPADSvXOxZVA2CCocL9O9hEB0FCT0WgzMZONdG1zVFJKs6DNUUeBcv1J2HjHn5zptlw9gOthsYX14ZP', '$2y$10$2ekOGQ3TPz7i5O9bwDTMfOhkYAi/SKcvKx8PjO5RdDvkEnotjeUXO', NULL),
(34, NULL, NULL, 1, 0, 'alegvasukov', 'sobakatianeya@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'cBF434da20', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'sc6xgANNv9WcHA8a', '$2y$10$iAFsYFw.1QaxADy3RIGG9uFqbTitjppbA2sSuqJDn9dI9ER4Ejrfy', NULL),
(35, NULL, NULL, 1, 0, 'tikhon.belikov', 'tiKhon.belikov@yandex.ru', 'Тихон', 'Беликов', 'MAN3', 'BG2', '', 1, 1, 0, 0, 2, '[]', '[]', '[6, 8]', 'n74e35GFRo', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'DoZoAYN7DkCWF84i', '$2y$10$x93Ziq5.72GDAv2wiFzrwevUtjlLjGfaq3i6dQ2KTN4Bs5qoI33aG', NULL),
(39, NULL, '2024-05-28 13:13:35', 1, 0, '', 'anovlvvkl@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '0RLt39BIPw', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, NULL, NULL, '$2y$12$easXhVmo6mU7Bc2X.YL8aO5ETbOcqTH7J/duoUJG5OwXMAQN7YMHK', NULL),
(40, NULL, NULL, 0, 0, '', 'numismad@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '^GTb8GgY', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'eIBVddVClt0gjU98', '$2y$10$yHCSTwnFYCq/lCsKNV6t4.XyoFNGLf1ZxC7bwAg8J6jQ3h4sUYjMy', NULL),
(41, NULL, NULL, 0, 0, '', 'asadic@vk.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'IYHf6R6', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'WQilCBld3hsLYJEa', '$2y$10$LEqU9oiOgErTXzb5tWQj/OxSH/5LF0KvpM3Cyl6x2dq7qEqgBA0/a', NULL),
(42, NULL, '2024-07-13 13:10:41', 1, 0, 'prsupport', 'info@pr-support.su', 'Менеджер', 'ПиарСаппорт', 'MAN5', 'BG2', 'Только PR-поддержка. Ни больше, ни меньше. Вот и всё.', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'kslN42Ii4H', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'CDSUoJHRN6zmTMrm', '$2y$10$Bee6QrdW7eOjbmAomTrq6eilQBjRfY4k1Il/SV3GabRyTgbGeL.fO', NULL),
(43, NULL, NULL, 1, 0, '', 'weiuhg@erwuhg.wegu', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 't8CA43Jrpq', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'aCQj7GYCgBuatJOZ', '$2y$10$SKujt6qLENfzfFBWRJOpqOYXreILE4VAJcIcijzbWfpPacDW1RDIC', NULL),
(44, NULL, NULL, 1, 0, 'looower', 'thermo101@hearourvoicetee.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '8yp244p3ta', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'Wsr3wBQvyHHvD9r1', '$2y$10$KsNtK.ZXK7MKl0DBQC5koOs4kulaBBJnxY8E4H4jrNjjaMvEDAXIy', NULL),
(45, NULL, NULL, 1, 0, '', 'vakarin.vl.vl@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'TJuU4583A5', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'pdoHLToCRx97BN3H', '$2y$10$Fj7CPqjj66skCC7IzapXLeVj58qMb4M3IwyeXLFDrurzZip/cY5.C', NULL),
(46, NULL, '2024-07-22 16:03:53', 1, 0, '', 'kovalenko20100925@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'yeJT46xuNg', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'CKGWqyEImtKYfFAV', '$2y$10$4v9o7O8AJ1HcdJ27c0xlZet77EntoInJgtoFh08r.Hto.OMgHN.lG', NULL),
(47, NULL, NULL, 1, 0, 'nower', 'watuluv@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'tHDQ4740E0', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'KNkYUFWbSrDEAa3v', '$2y$10$FfYIPpQe9j.1q1nDm56VIORdHEf9DeJHZd523G8LynXg2CZtiK6E2', NULL),
(48, NULL, NULL, 1, 0, 'iouser', 'adfinogenov@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'QlpU48veka', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '2auFIfKjNPaNRsrO', '$2y$10$i/tiqY28ac52gFy.5oI.xOOgaGEHzZ7aPrkdGUSvMxxW/PjhFuYu2', NULL),
(49, NULL, NULL, 1, 0, 'dev', 'shturmanvany2009@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'abji49zwYp', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'pLD0uAf8qvKli4hf', '$2y$10$g5N1BfezMPiZn3zUCE1QAOWPCdRM7VqI3q.w9YrlpYtuNY.oaDJDi', NULL),
(51, NULL, NULL, 0, 0, '', 'nokhchoadam@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'e7oZ50W8Yc', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'cdo09pqtHdEaGQpJ', '$2y$10$Cmm2.3bDpz2RO4AvPYSoWe8Y0Y8KMojXrqE1HJ3.zdDYc4yZqT3mi', NULL),
(52, NULL, NULL, 1, 0, 'phantom', 'vpromashin@gmail.com', 'Василий', 'Ромашин', 'MAN5', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'vUiH52HQgK', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '0n4FN1QaqkEc2QlX', '$2y$10$uBkyfBRAGQd848gf6mpsKOPQwaNSaE.WRCxqL7BHUa8BajVI4qbQS', NULL),
(53, NULL, NULL, 1, 0, '', 'babrirkutsk@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'PPKD53QcCA', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'iII7NOkM5UZTmEkO', '$2y$10$qDeqZbXG7QKdSB1JCENF2OYTcP2hMaqMB8Z6PrsYphYNeWupkip2G', NULL),
(54, NULL, NULL, 1, 0, 'ananashyena', 'ananashyena@yandex.ru', 'Анастасия', 'Пара', 'WOMAN6', 'BG6', '', 1, 1, 0, 1, 0, '[]', '[23]', '[]', 'bVIz54egsU', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'vEuX4IT6t9CgQGu7', '$2y$10$PJIK6MgC5thGA4zPfm6H9eDXcVSDLFrK.4a9r3aTaS6ww4v/H8JwS', NULL),
(55, NULL, NULL, 1, 0, '', 'aquarium122234@yopmail.com', '', '', 'MAN1', 'BG7', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'arjF55SwIj', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'vl8JcwvrXTeKi4OY', '$2y$10$EL7Pzk6GMYbwJZDiiddmPeGUXN2slojVh9V.5K6rwa3hlkOCdccDK', NULL),
(56, NULL, NULL, 1, 0, 'glonkscom', 'glonkscom@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'oggN56BBA5', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'bZQrtTOjEdDlmveG', '$2y$10$pg72Nca8crL6SA3eWIzf7.rBt3NuWVrbr4/NcjkNCAx3oO9ExhCEa', NULL),
(57, NULL, '2024-07-22 18:51:37', 1, 0, 'sskatalasskatala', 'cc.katala@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 1, 1, 0, '[96]', '[102]', '[]', '8SES57FNG4', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'g80JPcv9TLR8kgpL', '$2y$10$nxo5LYfleA57XAaWOp0ZNuC3UBS2XJFwhnAbqaOjkuBuWgXJHdhp6', NULL),
(58, NULL, NULL, 1, 0, 'cerberus', 'qwqzx1485@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ZKVY58qwyS', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'yWbkObdhbnrdeUEf', '$2y$10$A5pd1NyM1HurXoUp9LjaIeQg4TGVCqNSBtJeMBzt1dADgMvBGfMXm', NULL),
(59, NULL, NULL, 0, 0, '', 'maxblake20@hotmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'jmYr59jplU', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'axfBHSxZzDMNYH56', '$2y$10$W9VJOmPr1LX/D7Mbwsv3m.FDXZv0UC13vP1N9Q9rzs9wTUpHECuG2', NULL),
(60, NULL, NULL, 0, 0, '', 'chucmaevmt@gmail.com', '', '', 'MAN7', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ffPa60S2zz', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'yet1ezjoiQeaFrR8', '$2y$10$o3X/IOxfNOOi9z05ff84HOxvTzQDOIwqjO71jHhI7OLuFN9VqJ6e.', NULL),
(61, NULL, NULL, 0, 0, '', 'chuchmaevmt@gmail.com', '', '', 'MAN1', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'nrmD61P0iI', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'rfpS7sZsFwPDgZNf', '$2y$10$vSHlzQ7VV0AN1S/nfCrf8uKTriVbzcawH8wNn67SWzq6UfWXzkXkq', NULL),
(62, NULL, NULL, 1, 0, 'levzvonky', 'zvonkijlev@gmail.com', 'Лев', 'Звонкий', 'WOMAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Ox13628Udr', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'wm94wW9iNHN98O5d', '$2y$10$gaW6kMeEPLBhowEEZ6Q8wOwlvcy7z38TRbQJ.adPrwQdlJ9Y4xRD6', NULL),
(63, NULL, NULL, 1, 0, 'vladimirlobyntsev', 'vofkav@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Vual63vC6B', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'it2QsvwquKqP4dwx', '$2y$10$hVxx/eOijI9T9S4QtgVD8OZuVajfzjOJyNWb/vxLKP37smZ5D96GG', NULL),
(64, NULL, NULL, 1, 0, 'harryanglov', 'harrisanjohns@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'zYjD64Th6c', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'swV1benxPlfGGu94', '$2y$10$/HonBLz4d3tbPp8TZilx3.XpEDjs1C3.RCMjvcUmHGe0.GsHmixSi', NULL),
(65, NULL, NULL, 1, 0, 'eanlaml?', 'eanlamli@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '1MDR65lByF', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '39iSTKiA3r2banAT', '$2y$10$jrs8uVk7NOc4eiUsPPH3z.IkTECjA7Ev5J8bvDnuVZHpEFY.iaLV.', NULL),
(67, NULL, NULL, 0, 0, '', 'shylepind@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '870D67wrD3', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'dzqznmHcekppLjId', '$2y$10$EVfyub11rJQe583KDCr.W.NZpv.qH7b6Y4cMaDy6B0Tyyhyg.iXji', NULL),
(68, NULL, NULL, 1, 0, 'rustem.vertical777', 'rustem.vertical777@yandex.ru', 'Рустем', 'Гилязетдинов', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Pt0k68LUvh', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'kFcdAdo67yCSFgKX', '$2y$10$vGl2DEEvcR4r38WHDxuotebjCSbWirJZCn82AMAWm5XSPfeayyZqC', NULL),
(69, NULL, NULL, 1, 0, '', 'olgalat@rambler.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'jtNo692LeI', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '2qSRUPYra98jtSm2', '$2y$10$nXNM6O47P/n4ZFtBI4tHMuiZQCFYDPg6kfZVSaYoO26zh.d.JFw7.', NULL),
(70, NULL, NULL, 1, 0, 'br0k3b01', 'thevovaliontv@yandex.ru', 'броукбойчик', 'безфамильный', 'MAN1', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '9tR270Ck8d', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'PQ3AaCq7G4sbzhNb', '$2y$10$KqyPwmbAoFpCh20enWJh2e77hB9NLn2IRA8szW2mKtB/6EZ7d5anu', NULL),
(73, NULL, '2024-07-27 10:50:46', 1, 0, 'marzipan', 'Knyazkina.2005@bk.ru', 'Мерцана', 'Князькина', 'WOMAN2', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'DZR271Wob2', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, '3ifloul7x0Jrd8DO', '$2y$10$JjMnDsiJM4bhlTX/l9KSUOA8JLfn4jurqUkagmipxd.5E9tz8mCFG', NULL),
(74, NULL, '2024-07-16 08:01:39', 1, 0, 'braziliy', 'vasiliyvv2005@mail.ru', 'Василий', 'Воронцов', 'MAN4', 'BG5', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '4pNl748ekH', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'u03BFCKZALUxo2xR', '$2y$10$28GZP1D..CbLpShF5McbNuTo3uBZPF2EJ8924.sxkke6qKlzv9dPa', NULL),
(75, NULL, '2024-06-13 11:35:04', 1, 0, 'angryteacher', 'amber.ashes@yandex.ru', 'Светлана', 'Юж', 'WOMAN1', 'BG1', '', 1, 1, 0, 1, 0, '[]', '[21]', '[]', 'tyMT75p53z', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'dQhXsS6N6DXN689j', '$2y$10$Pn/HwSyKRxrcg8cJYjfFz.eUC0JxJwWk5Slw5uFdKLJdp9GWEYV7e', NULL),
(76, NULL, NULL, 0, 0, '', 'rand@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'FdR0763knT', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'AsM9tkLSKaxnD0Kv', '$2y$10$amiE1fCSV9lh9e/7TytFwueC08TCn/XllNv/6RHi9haLLqsJW.Mc6', NULL),
(77, NULL, '2024-07-22 18:51:54', 1, 0, 'aplelol', 'mosreg150@gmail.com', 'Роман', 'Москаленко', 'MAN5', 'BG3', NULL, 1, 1, 1, 1, 0, '[1]', '[102]', '[]', 'EjE177piCe', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'kLsx2DRjq8JkX8LN', '$2y$10$TiMj5.sbAvV0VhToPV2UkuQJNjTq86mZKN46U3RFilHOW9Ko3xhR6', NULL),
(78, NULL, NULL, 0, 0, '', 'aleksbirukova10@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '6OdO781Hno', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'KklJLeEP4coZHwBw', '$2y$10$FRwXt.jPoZyfcjXixBiLM.ju5UXZYfFkpTrUdklNeuDLvmHMdOL.q', NULL),
(79, NULL, NULL, 1, 0, '', 'vip.trofimowahoza@gmail.com', '', '', 'WOMAN3', 'BG6', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'vgCf79yivW', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'OIe7aCTTJWNLwiNs', '$2y$10$9kKplXJnfEJUhEqSDbuq/OiGiEJ.W/weXOAJlknwErjc8Eg5NOy66', NULL),
(80, NULL, NULL, 1, 0, '', 'davidkozlov19@gmail.com', '', '', 'MAN1', 'BG2', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'EudJ80JR8N', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'hjrfPxLZbcYKubxH', '$2y$10$VDfw3On8utA/iF9UIDwND.CRwJBgOSO9gJUnuING5zuShbKV0ETCu', NULL),
(81, NULL, NULL, 1, 0, '', 'Olga240301@bk.ru', 'Ольга', 'Кожаева', 'WOMAN3', 'BG5', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'dnvt81Yedt', '', '{\"dataChange\": false, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'CZJuIzRqBpJd6aQB', '$2y$10$0/gU1xF4lt38oOSJrKpO6uPpvZlukHfAdaIMRPkcFaB7ULnI6rJ7a', NULL),
(82, NULL, NULL, 1, 0, '', 'biaspeway666@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ApGh825JzW', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'lC3nRjqLl1cDfr7y', '$2y$10$VwmECLqYgr.S/oT/7pQsqeIfst31e6DOLLnHnsua9KHjfQQULBhme', NULL),
(83, NULL, NULL, 0, 0, '', 'fayazovam@bk.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'LAYl83f6NW', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'lbAERrXJI8PfktCO', '$2y$10$rvnt9AIgkew3WyXT9GpvW.J2U8.s7qWu1MncumRPM9yzEIMFoRAI2', NULL),
(84, NULL, NULL, 0, 0, '', 'dwxgaimangu@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Crvg84Z9uq', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'GS7TXxRKlioDUosc', '$2y$10$biZdzkS3mZVoTZdjz1/eFO.i.eag8B3JbTIbwAdt780iL2aAbXaGK', NULL),
(85, NULL, '2024-12-24 06:11:54', 1, 0, 'gutaryoutube', 'legolego2009@gmail.com', 'Дмитрий', 'Нагиев', 'https://aquariumsocial.ru/public/loads/RbtcR-7Ciyt-8VEPG-6iDqb-ShD9D-00085-17216-71242.jpg', 'BG10', 'Программист , люблю делать игры , мне 15 лет', 0, 1, 1, 1000002, 0, '[1]', '[102, 101]', '[]', 'fAXZ85gyct', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, NULL, NULL, '$2y$12$n/Puv4d7DEszmWdA353bZutF0T.OAy0qnZMRIi0L/13Ik7zNewOTa', NULL),
(86, NULL, NULL, 0, 0, '', 'milanifruitik@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'rdIU86ZCve', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'I7BsOBARgELIJHmV', '$2y$10$RgG/01yJBYkfn8EGuqOjGeGizBhB9onBq4h9oPvOL6q8TkNZPa8ay', NULL),
(87, NULL, NULL, 0, 0, '', 'wwaninnkm111@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'KSmW87JxIA', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'paOQEfRck0SgTlE9', '$2y$10$mWa4WAygI7kOUu4fqNmy7uFEurE/d/v4NdHlgx8x4INLH2lNQp0N6', NULL),
(88, NULL, NULL, 1, 0, 'artem', 'iimya266@gmail.com', NULL, NULL, 'MAN1', 'BG1', NULL, 1, 1, 0, 0, 0, '[]', '[]', '[]', 'd1UB88W1ZL', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'VOueCXJn60E5FjUJ', '$2y$10$HRl0qRx2Byujk3s8Zo5qz.3y8.UM54gTnzj82dMzwa0miNbJStB2K', NULL),
(89, NULL, NULL, 1, 0, NULL, 'nenty.exe@gmail.com', NULL, NULL, 'MAN1', 'BG1', NULL, 1, 1, 0, 0, 0, '[]', '[]', '[]', 'WgUh89Bsba', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'T8AaHeKTzv4JO74H', '$2y$10$IbRGxAlWZvdnf2xP0Mg/uOf9ZvOiiwLgTksVP.uLzpxd8Q9jJeiKa', NULL),
(90, NULL, NULL, 0, 0, NULL, 'misha.osipov.08@inbox.ru', NULL, NULL, 'MAN1', 'BG1', NULL, 1, 1, 0, 0, 0, '[]', '[]', '[]', '0wIs90YIGx', NULL, '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'fKK4qqoVjUDz3Nkl', '$2y$10$EP4AfVy8nDvNL4e7E2SBtOcjIqYdCqzydUzACIRrWo.7FwAjcU0Zm', NULL),
(95, '2024-06-10 18:06:56', '2024-07-23 10:24:27', 1, 0, NULL, 'testaccount', 'Даниил', 'Иванов', 'MAN2', 'BG10', 'Описание профиля.', 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '{\"dataChange\": false, \"authorization\": true, \"passwordChange\": false}', -1, NULL, NULL, '', NULL),
(96, '2024-06-13 19:22:35', '2024-06-15 19:44:39', 1, 0, '', 'polinaa.kuzmenokk@gmail.com', 'Polina', 'Kuzmenok', 'https://lh3.googleusercontent.com/a/ACg8ocJJsg1OZ9JYRnEGKaCVpNq5VEWL88qyihGJ0MCU5_J7jvZBjqQe=s96-c', 'BG4', NULL, 0, 1, 0, 1, 0, NULL, '[57]', NULL, 'KjxEVfeLhBPGvjsdhBzN', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$gFdihxtQPttC/Q.2SnikpeAItJGEr6GzE0zUVAn4OXt.Cy3rsY23K', NULL),
(97, '2024-07-04 21:47:51', '2024-07-04 21:47:51', 1, 0, '', 'debube577@gmail.com', 'David', 'Ebube', 'https://lh3.googleusercontent.com/a/ACg8ocJWU_UTIFlp7Xik2dOE4vYJbIAbssEL4vakxsnL-RKqGn1bIWdX=s96-c', 'BG11', NULL, 0, 1, 0, 0, 0, NULL, NULL, NULL, 'WWKkvQauXzoYwmrYGMX3', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$jLEe8aFNbeBfzOGj2pzTU.4X0Cr.TUQmunppRsnBTY2HpEnO35vzC', NULL),
(98, '2024-07-13 13:06:52', '2024-10-04 03:28:24', 1, 0, 'sufiner', 'ascrapa449@gmail.com', 'Никита', 'Осипов', 'https://lh3.googleusercontent.com/a/ACg8ocIjBHnPWy7stmzEUQHwXBLOPswD3_zPPo-jmaepXQGJbwgxDXVm=s96-c', 'BG5', 'Гений, миллиардер, филантроп.', 0, 1, 1, 3, 0, '[1]', '[1, 102, 108]', NULL, 'dKn4BnW64dq8Qz9AqFu2', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$97rnHmYlQqit0OB3d.6XgeW.epatY1XBCocIvjNmMDotqOpd17u8O', NULL),
(99, '2024-07-15 08:26:06', '2024-07-27 10:48:08', 1, 0, 'danyabooba', 'daniil@dybka.ru', 'Daniil', 'Dybka', 'https://avatars.githubusercontent.com/u/77530242?v=4', 'BG5', 'Профиль GitHub', 0, 1, 1, 0, 0, '[1]', '[]', NULL, 'snHSlMmu0BDPlWXJhwOt', 'gi', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$mCXGAiJgdRFaNMVnfjoDGe8xv3vKasgI1wYt8ia7KJl94cb9TaSZe', NULL),
(100, '2024-07-20 08:37:58', '2024-07-20 08:45:09', 1, 0, 'lilmelanholia', 'titamotitawww@gmail.com', NULL, NULL, 'MAN4', 'BG6', NULL, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$mrgy9JI.PVZ2TOpfKi5GwOZPPS8TgiQ1zM1r4uzgahl5Lg5AqoQu2', NULL),
(101, '2024-07-22 13:54:22', '2024-08-24 18:37:15', 1, 0, 'dispelin', 'konstantinivanov14558@gmail.com', 'Константин', 'Диспель', 'https://aquariumsocial.ru/public/loads/g9qdW-Tdjux-WCwyX-aJKij-WTdkg-00101-17219-43324.jpg', 'BG4', 'Геймдев', 0, 1, 3, 0, 0, '[103, 85, 105]', NULL, NULL, 'GxLSOLHq2oDrUlghZ5xI', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$esn9PhBV9jxQf9SYWkhpMOWoyMg8pLSnd0J1g5SNH4aQqkmAGMV7u', NULL),
(102, '2024-07-22 18:22:08', '2024-10-04 04:09:14', 1, 0, 'belustu', 'gamesplaygameslolyt@gmail.com', 'Belus', 'Tu', 'https://aquariumsocial.ru/public/loads/kcSBG-oV8qQ-Zt38C-u9gFG-8JmgJ-00102-17216-83637.jpg', 'https://aquariumsocial.ru/public/loads/QJMsW-jbj7R-BX34H-x9b5J-4pvy1-00102-17280-25754.jpg', 'Гейм-дизайрер, моделирование в блендере.', 0, 0, 6, 1, 0, '[1, 85, 98, 57, 21, 77]', '[108]', NULL, 'T5RrtLzWbR9j2nswn71F', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$7TFa2LPz2/85jWwkwLlubuOI3feJEaZt3uqtZCd63Gbo7J9WS0fi.', NULL),
(103, '2024-07-22 19:27:42', '2024-09-10 15:56:01', 1, 0, '', 'samodurovskyslava@yandex.ru', 'Вячеслав', 'Самодуровский', 'https://sun1-47.userapi.com/s/v1/ig2/Z2s2Px43mmh4AUk6NHjK1cjmJHK0XmalaZTHE7vOJh9A4KhV9II9QUJbo9py9Pa0UNpBh_SM5OxyGSYuK9nPt2qj.jpg?size=200x200&quality=95&crop=0,0,1438,1438&ava=1', 'BG2', NULL, 0, 1, 0, 2, 0, NULL, '[101, 13]', NULL, 'PL2HyDxPYXO0jT1stI2w', 'vk', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$natQi.mCya7guBn3r/d0oO2kxD1xNB6Ga3qTFuYKm.o7AlhK8SwQm', NULL),
(104, '2024-07-23 19:10:43', '2024-10-26 04:29:29', 1, 0, 'brokeboidesign', 'thevovaliontv2@gmail.com', 'BrokeBoi', 'Design', 'https://aquariumsocial.ru/public/loads/eHTQz-7sF49-bUmQu-4Vs5n-m6502-00104-17217-73329.jpg', 'https://aquariumsocial.ru/public/loads/AseDm-UaPVo-RhoBH-9wxjv-Os367-00104-17217-73118.jpg', 'и тут эти ваши бедные дизайнеры', 0, 0, 0, 0, 0, NULL, '[]', NULL, 'yOec21r9mEhIXUHd9ovf', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$lgKlkx1ZGFCtsrU33M4hfuI8YLRMaud7QGvkgAklUfiu13IAgdLqG', NULL),
(105, '2024-07-25 19:18:19', '2024-08-24 18:37:15', 1, 0, 'fivedragondev', 'fivedragondev@gmail.com', 'fivedragondev', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJ-xQgG_uzFaV-a56IrucrjZSsoUeYnVn46SwIrtTUA_pSxs5A=s96-c', 'BG5', NULL, 0, 1, 1, 2, 0, '[1]', '[1, 101]', NULL, 'uMs1lCanhORlWy17Cevc', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$7vWW0ljT/97ahSwe9yAz9uW3P5qeBRkQomUbtOly.G.6GUIhI9mSW', NULL),
(106, '2024-07-26 10:26:55', '2024-07-26 10:33:54', 1, 0, '', 'lysenko567@gmail.com', 'Zhenya', 'Lysenko', 'https://lh3.googleusercontent.com/a/ACg8ocJ4Mut1Bsw1bvXkKS6QiT8aamu59UO6qn0diT9T2r3L0Mfdo1U=s96-c', 'BG2', NULL, 0, 1, 1, 1, 0, '[1]', '[1]', NULL, 'jNAw4pyW6flYkEyhN8LJ', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$Ow2NKBwSI8hlWe5dMhIhMeQBPXMZQ871Fbvq.LxVXbWu3q3BkyHlG', NULL),
(107, '2024-07-29 16:36:48', '2024-07-29 20:05:42', 1, 0, 'Butonix', '', 'Butonix', '', 'https://avatars.githubusercontent.com/u/29381099?v=4', 'BG4', NULL, 0, 1, 1, 1, 0, '[1]', '[1]', NULL, 'gUerTMlbyphDfW8zmitG', 'gi', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$WNjIKTJ9bP7pbQSXqmwZreq9BBgMiBA/Dm6gSnaNJ5zP5DzSzABhC', NULL),
(108, '2024-10-04 03:27:50', '2024-10-04 03:31:16', 1, 0, 'bbbe8fjs83jcj', 'bbbe8fjs83jcj@yandex.ru', 'BelusTu', 'Team', 'https://avatars.yandex.net/get-yapic/29310/2ul6qLjQlt6tA3B3TZfOD8iV1A-1/islands-200', 'BG7', NULL, 0, 1, 2, 0, 0, '[98, 102]', NULL, NULL, '1R1jbh8CR85lOvsMLUbC', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$K.m99S/jhdyU0EZiF/4cgeWqvD04E.mU1zstW1HrY8Mpl4.rlRrXm', NULL),
(109, '2024-10-06 05:15:59', '2025-02-26 03:51:06', 1, 0, 'sdgsdgsdgsdgsdg', 'ckatala@yandex.ru', 'dsgsdgsd', 'sdgsdgs', 'WOMAN3', 'BG4', NULL, 1, 1, 0, 0, 0, NULL, '[]', NULL, 'bALDly9MeIrSxtpb58jE', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$FCWUJwDBABaYNr.D94Q5JenAXQn5erVEMq6XCH4vnQKGxccz/2TJS', NULL),
(110, '2024-10-31 19:06:15', '2024-10-31 19:06:15', 1, 0, '', 'FiveDragonDev@yandex.ru', 'Dmitry', 'Rybnikov', 'https://avatars.yandex.net/get-yapic/49368/6SBmX7NwB6GwsiEsWPaPv6IuppY-1/islands-200', 'BG5', NULL, 0, 1, 0, 0, 0, NULL, NULL, NULL, 'kBetbPZOCdysRTCEe4Ac', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$T/hGWmYT4xfN6vu38dbmZ.EaU/7BoaiZjD9go6RvYWJUEcsJdt/Le', NULL),
(111, '2024-12-23 13:26:19', '2024-12-23 13:26:19', 1, 0, 'kwexys', 'kwexys@yandex.ru', 'Иван', 'Моисеев', 'https://avatars.yandex.net/get-yapic/39803/6CKXlwGQie0VWh1T5E7W9vcwTQ-1/islands-200', 'BG4', NULL, 0, 1, 0, 0, 0, NULL, NULL, NULL, 'KIPuN7LtUWd93o8S6Yhi', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$P2GAMXE3epMrS9c9tQjeTOpRJ7dO64cN2hMt8d3k0I7s.m59aRv3i', NULL),
(112, '2025-02-02 00:47:44', '2025-02-02 00:47:44', 0, 0, NULL, 'vamasorugo796@gmail.com', NULL, NULL, 'MAN3', 'BG9', NULL, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, NULL, NULL, '$2y$12$Ksyb8CRzs3GEKLfs3PsQR.2uCL5W9P3fWPJT3lOAJvT8MiSXq42Vm', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_clone`
--

CREATE TABLE `users_clone` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatarDefault` tinyint(1) NOT NULL DEFAULT '1',
  `capDefault` tinyint(1) NOT NULL DEFAULT '1',
  `sub` int NOT NULL DEFAULT '0',
  `subs` int NOT NULL DEFAULT '0',
  `achivs` int NOT NULL DEFAULT '0',
  `subJson` json DEFAULT NULL,
  `subsJson` json DEFAULT NULL,
  `achivsJson` json DEFAULT NULL,
  `shareToken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceLogin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings_notifications` json DEFAULT NULL,
  `usertype` int NOT NULL DEFAULT '0',
  `md5use` tinyint(1) DEFAULT NULL,
  `md5salt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_clone`
--

INSERT INTO `users_clone` (`id`, `created_at`, `updated_at`, `verified`, `blocked`, `username`, `email`, `firstName`, `lastName`, `avatar`, `cap`, `desc`, `avatarDefault`, `capDefault`, `sub`, `subs`, `achivs`, `subJson`, `subsJson`, `achivsJson`, `shareToken`, `serviceLogin`, `settings_notifications`, `usertype`, `md5use`, `md5salt`, `password`, `remember_token`) VALUES
(1, NULL, NULL, 1, 0, 'dybka', 'danil.dybko@gmail.com', 'Даниил', 'Дыбка', 'MAN4', 'BG5', 'Автор', 1, 1, 3, 4, 3, '[12, 25, 73]', '[5, 19, 25, 77]', '[1, 3, 4]', 'OCSk1ggSm', '', '{\"dataChange\": false, \"authorization\": false, \"passwordChange\": true}', 100, 1, 'Uzjt8H9Jr7lxPBst', '$2y$10$OJDA6AhxhKAuakWL.armLuo6vUK04sqKA2VFpdQ2CbIWUgljdtOei', NULL),
(2, NULL, NULL, 1, 0, 'snowdrit', 'solingennavi@gmail.com', 'Матфей', 'Артюхин', 'MAN1', 'BG4', '', 1, 1, 0, 0, 3, '[]', '[]', '[1, 3, 6]', '61zP22N3C', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, '46n2a05z1Yksaxpv', '$2y$10$7D5EgK5kZFxaqkkPLV1POuwCHRaYWwXvCT53j1dH69GZHJ.9HNRra', NULL),
(3, NULL, NULL, 1, 0, 'megnatiy', 'mrignatiy05@gmail.com', 'Игнатий', 'Герасимов', 'MAN4', 'BG4', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'm6BC3fuic', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'fzFV5x0m2foE9Qkh', '$2y$10$3DyO2sF6RHxC0G63Plwuoew6PUboYH0hLQxwF.s0/qrr7ek60oHYq', NULL),
(4, NULL, NULL, 1, 0, 'renkort', 'renkort33@gmail.com', 'Роман', 'Казин', 'MAN4', 'BG4', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'KFaP4xMYW', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'G1y6745iCFVO7lPF', '$2y$10$2Q6GskStEVVB6VvzQH.Ve.ajKKttTgzvEur5sa5BQmorSpado7sNy', NULL),
(5, NULL, NULL, 1, 0, 'evo', 'rephose@mail.ru', 'Александр', 'Семченко', 'MAN1', 'BG4', '', 1, 1, 1, 0, 3, '[1]', '[]', '[1, 3, 6]', 'Wric5rljC', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'LE2fJJefApSxHHBx', '$2y$10$Hw2EOcJ8a69irLRvQWi1zOrZChfabR4WEWIXW4e/XFG31iMkJ3tii', NULL),
(6, NULL, NULL, 1, 0, 'marknerok', 'misaromasin@mail.ru', 'Михаил', 'Ромашин', 'MAN3', 'BG1', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'yzx36hGRH', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'b3LcJI7zE9oNye47', '$2y$10$WcRIqmLDUVXDK/zNhRm92OV69eTPb09aC2J0Mzx7h6iDjM0ZOLeOG', NULL),
(7, NULL, NULL, 1, 0, 'give.me.peace', 'give.me.peace@yandex.ru', 'Даниил', 'Иванов', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[8]', '15aS753a4', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'lzR2WKsJj8I8g134', '$2y$10$Hu1IVMIl0J/wPTMqGQZTSeMZhmB9s8/QZNrt/OFz1NFpc2AimRhAm', NULL),
(8, NULL, NULL, 1, 0, '', 'creagoooff@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 's2Fg8XEni', '', '{\"dataChange\": false, \"authorization\": false, \"passwordChange\": true}', 0, 1, 'gs2zDENqOBsudool', '$2y$10$zUlRB3OtxJ6JRXsAYHTNoutsBrha1GdWGfh68kqlybdQIyd.RrDEC', NULL),
(9, NULL, NULL, 1, 0, 'joban', 'vanbubnov@gmail.com', 'Иоанн', 'Бубнов', 'MAN1', 'BG2', '', 1, 1, 0, 0, 3, '[]', '[]', '[1, 3, 7]', 'Dz8f95Vji', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'ExZMWlK37YGUtnt5', '$2y$10$oecXlWVOQmbEvCQGYbnQ0OFpetX2VRPCnhwILiOBJppslQmbAiMZu', NULL),
(10, NULL, NULL, 1, 0, '', 'mega.aktep@mail.ru', 'Давид', 'Козлов', 'MAN1', 'BG2', '', 1, 1, 0, 0, 2, '[]', '[]', '[1, 3]', 'cPFZ108Czy', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, '7L57uej53l419bGU', '$2y$10$kh8Y7NPiWXajQRhEzj3QLezki7l8mUDXgh6cyYVujxvWNasymAt42', NULL),
(11, NULL, NULL, 1, 0, 'evg', 'budo1@ya.ru', 'Евгений', 'Петров', 'MAN1', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'yB3u11RQQi', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'zI0UoNnYnVfc3ArH', '$2y$10$KrqIE.YXi.0mwiL/GZnAd.LeEM0rtfKsPBJCD90tiDBMDuKkeIF8m', NULL),
(12, NULL, NULL, 1, 0, 'nastya', 'kadirovanastya2000@gmail.com', 'Анастасия', 'Кадирова', 'WOMAN5', 'BG6', '', 1, 1, 0, 1, 2, '[]', '[1]', '[1, 3]', 'ljVe12Qtti', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'a9QLwwG12JYUsc3M', '$2y$10$/yr/q6H8JA3a5xS6eFYhq.4O9XPkUDLaACTRIxIrPvW1e5t8NFuqe', NULL),
(13, NULL, NULL, 1, 0, 'informeazacom', 'blogioaneu@gmail.com', '', '', 'MAN1', 'BG5', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'GDoA13i2ae', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'DDjavFN2FnlH3DXD', '$2y$10$NG9kic2PsI5z8re.zN0vaezP0i54yK2OF7xmOH4y8DGFDB2SX56de', NULL),
(14, NULL, NULL, 1, 0, 'user1033', 'zipper018@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'dRqh14muzI', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'rEnwunVbZS7QHkhT', '$2y$10$YQZVFh8cCx7e/JfT9s8Pi.YroEEWH8uVaSLAB35iFiS4NPFGNzyQq', NULL),
(15, NULL, NULL, 1, 0, '', 'a.khlimankov@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'fvdP15DakH', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'y94m2DamGKfR3UAU', '$2y$10$H87WarsqEohSjBKY.cx03OFuM1V8dM/vA3DvztJQYLH4Xu6L98bCe', NULL),
(16, NULL, NULL, 1, 0, 'yuran', 'agentzv@mail.ru', 'Юрий', 'Гуляев', 'MAN1', 'BG4', 'Профиль', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'bSjv16oXVF', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'wVi1YfTNEpl6Akj7', '$2y$10$xaswsTk0r7qw.oY.9kY/y.xjoL//21VMQe7Dzw/b1X1ZZPS29G2ry', NULL),
(17, NULL, NULL, 1, 0, '', 'danila@posevin.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[3]', 'neV417Jx49', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'UYTg68Huih', '$2y$10$X6nNTblWL91tAhOFEj3NnumtAqmT.uEVwMy11rb2.v.2iHk0l9Hr6', NULL),
(18, NULL, NULL, 0, 0, '', 'bab.tv@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'UYGuygUT876', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'OIubytG8787hu', '$2y$10$WFpY4Solx.qYGg8dutP2YeHbiQLiESRzUto7DilCRzvQkH0V1NrV.', NULL),
(19, NULL, NULL, 1, 0, '', 'tribmd@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 1, 0, 0, '[1]', '[]', '[]', 'gzYc1918Tb', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'nW2VDeOsQwMwYHTRHDZCYQ0kBVnLXPSGAL7G8oG3TyV1diBM3VyzJyLSuWZIGMbF2CUAv18AFALYeOHM', '$2y$10$rGpRTaz3jRR81PMBZ4pnP.GjAQR2mPeUXMV8qK47CYYdxb7Ix4wWW', NULL),
(20, NULL, NULL, 1, 0, 'creagoo', 'creagoo@yandex.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[8]', 'lK8q20MG4R', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'rykmhOmllz34ThO3', '$2y$10$67NpPg4bG3kk69gWp8GsD.tx9fyICXwz/6OHq8L5.znX13bX7NMCa', NULL),
(21, NULL, NULL, 1, 0, 'alsem4encko', 'alsem4encko@yandex.ru', 'Александр', 'Семченко', 'MAN1', 'BG1', '', 1, 1, 0, 0, 4, '[]', '[]', '[1, 3, 6, 8]', 'WpWt21Kln9', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'mORVteysKOm9tIkW', '$2y$10$yl3WsSbqxNWchg4ijyE/W.qAnXMIe8/5lIgZNDlIuU4IMxhdRlxQm', NULL),
(22, NULL, NULL, 1, 0, 'sergeevizh', 'sergeevizh@yandex.ru', 'Кирилл', 'Трубецкой', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[8]', 'cFcu22iF8T', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'dfpzVsmJgSwN0Xtx', '$2y$10$MjYPNVzO6lrQP1dtaevDZOMdwHVJcE6HdPUKR0LTKcdTTg0F9Kh0C', NULL),
(23, NULL, NULL, 1, 0, 'mapc2012', 'MAPC2012@yandex.ru', 'Виктор', 'Швецов', 'MAN4', 'BG5', '', 1, 1, 1, 0, 1, '[54]', '[]', '[8]', 'vuis23NjIJ', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'hC6cV0ABtx8YNGyV', '$2y$10$1v/FStnd0hQlHz3FSa8wxORORTOl.PqMF4nlkCdlRHcadV8qwV3lq', NULL),
(24, NULL, NULL, 0, 0, '', 'maxblake2015@hotmail.com', '', '', 'MAN2', 'BG5', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ugytHTygt67guy', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '0BGte6RGmyrXnvhuDGc5NIEe51hWGA7SjyDu3kzGV4U7VPbrWQCmXS6RnJu76D1JIVF97ag4Iuk7pP7D', '$2y$10$O./f.Psa4SZYUo3jOtnOCO75AwWCFC5Y/zPJmZQoEymzSM8X/Z6RO', NULL),
(25, NULL, NULL, 1, 0, 'zxc', 'eli1starboom@gmail.com', 'Петух', 'Жареный', 'MAN1', 'BG4', '', 1, 1, 1, 1, 2, '[1]', '[1]', '[3, 6]', 'ixo325vY2j', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'OckPgJwFuBwyg9J4', '$2y$10$WzB69ABhP6X1rjzd2YnlQucW1utkWbm8TVFbwADWZlHXpemd1X25K', NULL),
(26, NULL, NULL, 1, 0, '', 'damochkin.nikita@yandex.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'EaNM26pg9Q', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'qIERmZLN6AToyDC6XnHkhjbM0OxZzngxb6CPwbuSZfiRzudYJWtt4BiscK6hTzIMZepkuNLwDl98Pb8u', '$2y$10$UuSlUdC6vFkDfGzZOd2QmeF2Dr2vHz.tG7UklhUrj1h8OxRTH2ZaO', NULL),
(27, NULL, NULL, 1, 0, 'pavelex', 'bypavelex@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'XL8q27xp3r', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'S4maseoQhEiijVr3', '$2y$10$RIlkZXnQMMvLXRBe3pw3Fus2fziTHxPuB5njHqXPXK7oZzAJukCpq', NULL),
(28, NULL, NULL, 1, 0, '', 'wfdaj@126.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'UM6E28QbFy', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'VzBg7n4n57fPjj23h0iFS3R0O6gvUx85FRTLxWYZDfoL6xMc9wWmvNZhw3jVqY2ENljLe26N9kHtVSEJ', '$2y$10$jiGF3VH8SgnB8Hpfvy7KIu/5iSthOpYSIojV8ZHlv4LCbSG8d.xQW', NULL),
(29, NULL, NULL, 0, 0, '', 'kadirovanastya12@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[1]', 'D688tyHihu', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'R6zXztebU3CEhu1KhcoHSkaAP1q6LluRJ8hcHbw85BTq4zmmjetu53ydMJteRtjNqjakFmWnov2h25pe', '$2y$10$n0f/ZjgZ3qthjZp1yh/6aeWVxzwoT7ctcFbnqfhPo8yYN47zt7Roi', NULL),
(30, NULL, NULL, 0, 0, '', 'olen54172@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'rfg&G7G8', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'mrpkYiNJQky66wDmHH7lwsfC6ia0tg9A4JRjRQFYwMaTjZqvVGtfUMxyjq585cyonHvmeivgjXxv1kXR', '$2y$10$2t1SaGzFcVA.PdYXZvdyPerQIYA7bV1AhZ8Y6ArmnSevsGZGmWXUS', NULL),
(31, NULL, NULL, 0, 0, '', 'aaa@aaa.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '*&GTh8ttg', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'kfy59njaQMrxgvtLy79VEm6wKHbfROVxoc5g38lHRuInkKd5L0zf4TKAZ9tJSu4BqJ1lnBsc5XtpOgsa', '$2y$10$2mH2pNIXmH8cQHLVusU7yedkOr6bnzYlF98TWWJqwcGlrC0KK0wpe', NULL),
(32, NULL, NULL, 1, 0, 'essamkafafy', 'essamkafafy@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'j8q4329fn1', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'z2bVg8z2HSPdLSpR', '$2y$10$iveB1Ti.z6.D7.j2pbyEc.HPhsC7wsbnmVHft8Ena23q.JSNib7hK', NULL),
(33, NULL, NULL, 1, 0, '', 'jeedeaky@yandex.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'HNci330UPi', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '9xPADSvXOxZVA2CCocL9O9hEB0FCT0WgzMZONdG1zVFJKs6DNUUeBcv1J2HjHn5zptlw9gOthsYX14ZP', '$2y$10$2ekOGQ3TPz7i5O9bwDTMfOhkYAi/SKcvKx8PjO5RdDvkEnotjeUXO', NULL),
(34, NULL, NULL, 1, 0, 'alegvasukov', 'sobakatianeya@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 1, '[]', '[]', '[7]', 'cBF434da20', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'sc6xgANNv9WcHA8a', '$2y$10$iAFsYFw.1QaxADy3RIGG9uFqbTitjppbA2sSuqJDn9dI9ER4Ejrfy', NULL),
(35, NULL, NULL, 1, 0, 'tikhon.belikov', 'tiKhon.belikov@yandex.ru', 'Тихон', 'Беликов', 'MAN3', 'BG2', '', 1, 1, 0, 0, 2, '[]', '[]', '[6, 8]', 'n74e35GFRo', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'DoZoAYN7DkCWF84i', '$2y$10$x93Ziq5.72GDAv2wiFzrwevUtjlLjGfaq3i6dQ2KTN4Bs5qoI33aG', NULL),
(39, NULL, '2024-05-28 13:13:35', 1, 0, '', 'anovlvvkl@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '0RLt39BIPw', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, NULL, NULL, '$2y$12$easXhVmo6mU7Bc2X.YL8aO5ETbOcqTH7J/duoUJG5OwXMAQN7YMHK', NULL),
(40, NULL, NULL, 0, 0, '', 'numismad@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '^GTb8GgY', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'eIBVddVClt0gjU98', '$2y$10$yHCSTwnFYCq/lCsKNV6t4.XyoFNGLf1ZxC7bwAg8J6jQ3h4sUYjMy', NULL),
(41, NULL, NULL, 0, 0, '', 'asadic@vk.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'IYHf6R6', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'WQilCBld3hsLYJEa', '$2y$10$LEqU9oiOgErTXzb5tWQj/OxSH/5LF0KvpM3Cyl6x2dq7qEqgBA0/a', NULL),
(42, NULL, NULL, 1, 0, 'prsupport', 'info@pr-support.su', 'Менеджер', 'ПиарСаппорт', 'MAN5', 'BG2', 'Только PR-поддержка. Ни больше, ни меньше. Вот и всё.', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'kslN42Ii4H', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'CDSUoJHRN6zmTMrm', '$2y$10$Bee6QrdW7eOjbmAomTrq6eilQBjRfY4k1Il/SV3GabRyTgbGeL.fO', NULL),
(43, NULL, NULL, 1, 0, '', 'weiuhg@erwuhg.wegu', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 't8CA43Jrpq', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'aCQj7GYCgBuatJOZ', '$2y$10$SKujt6qLENfzfFBWRJOpqOYXreILE4VAJcIcijzbWfpPacDW1RDIC', NULL),
(44, NULL, NULL, 1, 0, 'looower', 'thermo101@hearourvoicetee.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '8yp244p3ta', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'Wsr3wBQvyHHvD9r1', '$2y$10$KsNtK.ZXK7MKl0DBQC5koOs4kulaBBJnxY8E4H4jrNjjaMvEDAXIy', NULL),
(45, NULL, NULL, 1, 0, '', 'vakarin.vl.vl@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'TJuU4583A5', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'pdoHLToCRx97BN3H', '$2y$10$Fj7CPqjj66skCC7IzapXLeVj58qMb4M3IwyeXLFDrurzZip/cY5.C', NULL),
(46, NULL, NULL, 1, 0, '', 'kovalenko20100925@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'yeJT46xuNg', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'CKGWqyEImtKYfFAV', '$2y$10$4v9o7O8AJ1HcdJ27c0xlZet77EntoInJgtoFh08r.Hto.OMgHN.lG', NULL),
(47, NULL, NULL, 1, 0, 'nower', 'watuluv@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'tHDQ4740E0', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'KNkYUFWbSrDEAa3v', '$2y$10$FfYIPpQe9j.1q1nDm56VIORdHEf9DeJHZd523G8LynXg2CZtiK6E2', NULL),
(48, NULL, NULL, 1, 0, 'iouser', 'adfinogenov@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'QlpU48veka', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '2auFIfKjNPaNRsrO', '$2y$10$i/tiqY28ac52gFy.5oI.xOOgaGEHzZ7aPrkdGUSvMxxW/PjhFuYu2', NULL),
(49, NULL, NULL, 1, 0, 'dev', 'shturmanvany2009@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'abji49zwYp', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'pLD0uAf8qvKli4hf', '$2y$10$g5N1BfezMPiZn3zUCE1QAOWPCdRM7VqI3q.w9YrlpYtuNY.oaDJDi', NULL),
(51, NULL, NULL, 0, 0, '', 'nokhchoadam@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'e7oZ50W8Yc', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'cdo09pqtHdEaGQpJ', '$2y$10$Cmm2.3bDpz2RO4AvPYSoWe8Y0Y8KMojXrqE1HJ3.zdDYc4yZqT3mi', NULL),
(52, NULL, NULL, 1, 0, 'phantom', 'vpromashin@gmail.com', 'Василий', 'Ромашин', 'MAN5', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'vUiH52HQgK', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '0n4FN1QaqkEc2QlX', '$2y$10$uBkyfBRAGQd848gf6mpsKOPQwaNSaE.WRCxqL7BHUa8BajVI4qbQS', NULL),
(53, NULL, NULL, 1, 0, '', 'babrirkutsk@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'PPKD53QcCA', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'iII7NOkM5UZTmEkO', '$2y$10$qDeqZbXG7QKdSB1JCENF2OYTcP2hMaqMB8Z6PrsYphYNeWupkip2G', NULL),
(54, NULL, NULL, 1, 0, 'ananashyena', 'ananashyena@yandex.ru', 'Анастасия', 'Пара', 'WOMAN6', 'BG6', '', 1, 1, 0, 1, 0, '[]', '[23]', '[]', 'bVIz54egsU', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'vEuX4IT6t9CgQGu7', '$2y$10$PJIK6MgC5thGA4zPfm6H9eDXcVSDLFrK.4a9r3aTaS6ww4v/H8JwS', NULL),
(55, NULL, NULL, 1, 0, '', 'aquarium122234@yopmail.com', '', '', 'MAN1', 'BG7', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'arjF55SwIj', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'vl8JcwvrXTeKi4OY', '$2y$10$EL7Pzk6GMYbwJZDiiddmPeGUXN2slojVh9V.5K6rwa3hlkOCdccDK', NULL),
(56, NULL, NULL, 1, 0, 'glonkscom', 'glonkscom@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'oggN56BBA5', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'bZQrtTOjEdDlmveG', '$2y$10$pg72Nca8crL6SA3eWIzf7.rBt3NuWVrbr4/NcjkNCAx3oO9ExhCEa', NULL),
(57, NULL, NULL, 1, 0, 'sskatalasskatala', 'cc.katala@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '8SES57FNG4', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'g80JPcv9TLR8kgpL', '$2y$10$nxo5LYfleA57XAaWOp0ZNuC3UBS2XJFwhnAbqaOjkuBuWgXJHdhp6', NULL),
(58, NULL, NULL, 1, 0, 'cerberus', 'qwqzx1485@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ZKVY58qwyS', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'yWbkObdhbnrdeUEf', '$2y$10$A5pd1NyM1HurXoUp9LjaIeQg4TGVCqNSBtJeMBzt1dADgMvBGfMXm', NULL),
(59, NULL, NULL, 0, 0, '', 'maxblake20@hotmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'jmYr59jplU', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'axfBHSxZzDMNYH56', '$2y$10$W9VJOmPr1LX/D7Mbwsv3m.FDXZv0UC13vP1N9Q9rzs9wTUpHECuG2', NULL),
(60, NULL, NULL, 0, 0, '', 'chucmaevmt@gmail.com', '', '', 'MAN7', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ffPa60S2zz', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'yet1ezjoiQeaFrR8', '$2y$10$o3X/IOxfNOOi9z05ff84HOxvTzQDOIwqjO71jHhI7OLuFN9VqJ6e.', NULL),
(61, NULL, NULL, 0, 0, '', 'chuchmaevmt@gmail.com', '', '', 'MAN1', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'nrmD61P0iI', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'rfpS7sZsFwPDgZNf', '$2y$10$vSHlzQ7VV0AN1S/nfCrf8uKTriVbzcawH8wNn67SWzq6UfWXzkXkq', NULL),
(62, NULL, NULL, 1, 0, 'levzvonky', 'zvonkijlev@gmail.com', 'Лев', 'Звонкий', 'WOMAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Ox13628Udr', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'wm94wW9iNHN98O5d', '$2y$10$gaW6kMeEPLBhowEEZ6Q8wOwlvcy7z38TRbQJ.adPrwQdlJ9Y4xRD6', NULL),
(63, NULL, NULL, 1, 0, 'vladimirlobyntsev', 'vofkav@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Vual63vC6B', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'it2QsvwquKqP4dwx', '$2y$10$hVxx/eOijI9T9S4QtgVD8OZuVajfzjOJyNWb/vxLKP37smZ5D96GG', NULL),
(64, NULL, NULL, 1, 0, 'harryanglov', 'harrisanjohns@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'zYjD64Th6c', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'swV1benxPlfGGu94', '$2y$10$/HonBLz4d3tbPp8TZilx3.XpEDjs1C3.RCMjvcUmHGe0.GsHmixSi', NULL),
(65, NULL, NULL, 1, 0, 'eanlaml?', 'eanlamli@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '1MDR65lByF', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '39iSTKiA3r2banAT', '$2y$10$jrs8uVk7NOc4eiUsPPH3z.IkTECjA7Ev5J8bvDnuVZHpEFY.iaLV.', NULL),
(67, NULL, NULL, 0, 0, '', 'shylepind@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '870D67wrD3', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'dzqznmHcekppLjId', '$2y$10$EVfyub11rJQe583KDCr.W.NZpv.qH7b6Y4cMaDy6B0Tyyhyg.iXji', NULL),
(68, NULL, NULL, 1, 0, 'rustem.vertical777', 'rustem.vertical777@yandex.ru', 'Рустем', 'Гилязетдинов', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Pt0k68LUvh', 'ya', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'kFcdAdo67yCSFgKX', '$2y$10$vGl2DEEvcR4r38WHDxuotebjCSbWirJZCn82AMAWm5XSPfeayyZqC', NULL),
(69, NULL, NULL, 1, 0, '', 'olgalat@rambler.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'jtNo692LeI', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, '2qSRUPYra98jtSm2', '$2y$10$nXNM6O47P/n4ZFtBI4tHMuiZQCFYDPg6kfZVSaYoO26zh.d.JFw7.', NULL),
(70, NULL, NULL, 1, 0, 'br0k3b01', 'thevovaliontv@yandex.ru', 'броукбойчик', 'безфамильный', 'MAN1', 'BG4', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '9tR270Ck8d', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'PQ3AaCq7G4sbzhNb', '$2y$10$KqyPwmbAoFpCh20enWJh2e77hB9NLn2IRA8szW2mKtB/6EZ7d5anu', NULL),
(73, NULL, NULL, 1, 0, 'marzipan', 'Knyazkina.2005@bk.ru', 'Мерцана', 'Князькина', 'WOMAN2', 'BG1', '', 1, 1, 0, 1, 0, '[]', '[1]', '[]', 'DZR271Wob2', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, '3ifloul7x0Jrd8DO', '$2y$10$JjMnDsiJM4bhlTX/l9KSUOA8JLfn4jurqUkagmipxd.5E9tz8mCFG', NULL),
(74, NULL, NULL, 0, 0, 'braziliy', 'vasiliyvv2005@mail.ru', 'Василий', 'Воронцов', 'MAN4', 'BG5', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '4pNl748ekH', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'u03BFCKZALUxo2xR', '$2y$10$28GZP1D..CbLpShF5McbNuTo3uBZPF2EJ8924.sxkke6qKlzv9dPa', NULL),
(75, NULL, NULL, 1, 0, 'angryteacher', 'amber.ashes@yandex.ru', 'Светлана', 'Юж', 'WOMAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'tyMT75p53z', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'dQhXsS6N6DXN689j', '$2y$10$Pn/HwSyKRxrcg8cJYjfFz.eUC0JxJwWk5Slw5uFdKLJdp9GWEYV7e', NULL),
(76, NULL, NULL, 0, 0, '', 'rand@mail.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'FdR0763knT', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'AsM9tkLSKaxnD0Kv', '$2y$10$amiE1fCSV9lh9e/7TytFwueC08TCn/XllNv/6RHi9haLLqsJW.Mc6', NULL),
(77, NULL, NULL, 1, 0, 'aplelol', 'mosreg150@gmail.com', 'Роман', 'Москаленко', 'MAN5', 'BG3', '', 1, 1, 1, 0, 0, '[1]', '[]', '[]', 'EjE177piCe', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'kLsx2DRjq8JkX8LN', '$2y$10$TiMj5.sbAvV0VhToPV2UkuQJNjTq86mZKN46U3RFilHOW9Ko3xhR6', NULL),
(78, NULL, NULL, 0, 0, '', 'aleksbirukova10@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', '6OdO781Hno', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'KklJLeEP4coZHwBw', '$2y$10$FRwXt.jPoZyfcjXixBiLM.ju5UXZYfFkpTrUdklNeuDLvmHMdOL.q', NULL),
(79, NULL, NULL, 1, 0, '', 'vip.trofimowahoza@gmail.com', '', '', 'WOMAN3', 'BG6', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'vgCf79yivW', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'OIe7aCTTJWNLwiNs', '$2y$10$9kKplXJnfEJUhEqSDbuq/OiGiEJ.W/weXOAJlknwErjc8Eg5NOy66', NULL),
(80, NULL, NULL, 1, 0, '', 'davidkozlov19@gmail.com', '', '', 'MAN1', 'BG2', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'EudJ80JR8N', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": true}', 0, 1, 'hjrfPxLZbcYKubxH', '$2y$10$VDfw3On8utA/iF9UIDwND.CRwJBgOSO9gJUnuING5zuShbKV0ETCu', NULL),
(81, NULL, NULL, 1, 0, '', 'Olga240301@bk.ru', 'Ольга', 'Кожаева', 'WOMAN3', 'BG5', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'dnvt81Yedt', '', '{\"dataChange\": false, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'CZJuIzRqBpJd6aQB', '$2y$10$0/gU1xF4lt38oOSJrKpO6uPpvZlukHfAdaIMRPkcFaB7ULnI6rJ7a', NULL),
(82, NULL, NULL, 1, 0, '', 'biaspeway666@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'ApGh825JzW', 'go', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'lC3nRjqLl1cDfr7y', '$2y$10$VwmECLqYgr.S/oT/7pQsqeIfst31e6DOLLnHnsua9KHjfQQULBhme', NULL),
(83, NULL, NULL, 0, 0, '', 'fayazovam@bk.ru', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'LAYl83f6NW', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'lbAERrXJI8PfktCO', '$2y$10$rvnt9AIgkew3WyXT9GpvW.J2U8.s7qWu1MncumRPM9yzEIMFoRAI2', NULL),
(84, NULL, NULL, 0, 0, '', 'dwxgaimangu@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'Crvg84Z9uq', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'GS7TXxRKlioDUosc', '$2y$10$biZdzkS3mZVoTZdjz1/eFO.i.eag8B3JbTIbwAdt780iL2aAbXaGK', NULL),
(85, NULL, NULL, 0, 0, '', 'legolego2009@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'fAXZ85gyct', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'nWfbR25ZqlMdocD5', '$2y$10$M7xg.TkryVdVs9h8DudopOZDhXkYPG1.dw/T71isXCFZLRUBW9dVm', NULL),
(86, NULL, NULL, 0, 0, '', 'milanifruitik@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'rdIU86ZCve', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'I7BsOBARgELIJHmV', '$2y$10$RgG/01yJBYkfn8EGuqOjGeGizBhB9onBq4h9oPvOL6q8TkNZPa8ay', NULL),
(87, NULL, NULL, 0, 0, '', 'wwaninnkm111@gmail.com', '', '', 'MAN1', 'BG1', '', 1, 1, 0, 0, 0, '[]', '[]', '[]', 'KSmW87JxIA', '', '{\"dataChange\": true, \"authorization\": true, \"passwordChange\": false}', 0, 1, 'paOQEfRck0SgTlE9', '$2y$10$mWa4WAygI7kOUu4fqNmy7uFEurE/d/v4NdHlgx8x4INLH2lNQp0N6', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `verifies`
--

CREATE TABLE `verifies` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduser` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unixtime` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `verifies`
--

INSERT INTO `verifies` (`id`, `created_at`, `updated_at`, `iduser`, `email`, `code`, `unixtime`) VALUES
(11, '2024-06-13 19:22:35', '2024-06-13 19:22:35', 96, 'polinaa.kuzmenokk@gmail.com', 'lt7aHaL8cvQL7xPHUaEm1718317355j1qOF60gHVY9qfIYB40L96', 1718317355),
(12, '2024-07-04 21:47:51', '2024-07-04 21:47:51', 97, 'debube577@gmail.com', '0pKldacf76BIqbvGXopy1720140471C1mR6HQySMoBIJnObCQ997', 1720140471),
(13, '2024-07-13 13:06:52', '2024-07-13 13:06:52', 98, 'ascrapa449@gmail.com', 'F4X9cWhOQAfKggOtqJg71720886812e1ytdsH49YAp5UdpNhHF98', 1720886812),
(14, '2024-07-15 08:26:06', '2024-07-15 08:26:06', 99, 'daniil@dybka.ru', 'Oh6H2RlPE5b0jeDW4TLb1721042766WPizUgSJQ6WepD4jS7oD99', 1721042766),
(17, '2024-07-22 13:54:22', '2024-07-22 13:54:22', 101, 'konstantinivanov14558@gmail.com', 'gYyVE0PccGf0qPQRsQXi172166726215ZRzMZeRZumq4phWv0x101', 1721667262),
(18, '2024-07-22 18:22:09', '2024-07-22 18:22:09', 102, 'gamesplaygameslolyt@gmail.com', 'V2oPXA12qu8Z0YzFHOUt1721683329VrVnZgEZXFFFWJw1p7xG102', 1721683329),
(19, '2024-07-22 19:27:42', '2024-07-22 19:27:42', 103, 'samodurovskyslava@yandex.ru', 'XmsgJ2SE3NfpY5r1AgtN1721687262K1yvIGa9dqK4Al5qAESl103', 1721687262),
(20, '2024-07-23 19:10:43', '2024-07-23 19:10:43', 104, 'thevovaliontv2@gmail.com', '94x7RZa9hwku3jNpHh7s1721772643sFIVOUJJIcldYi1ttusc104', 1721772643),
(21, '2024-07-25 19:18:19', '2024-07-25 19:18:19', 105, 'fivedragondev@gmail.com', 'YRU8Qbxl1m3w5XK066CV1721945899I0SkdoLGUOkepGLHTHGC105', 1721945899),
(23, '2024-07-29 16:36:48', '2024-07-29 16:36:48', 107, '', 'fAK4cqBiBD9vIjN8ZBU21722281808NYWxxDMY0ZeaI6EaM2nK107', 1722281808),
(24, '2024-10-04 03:27:50', '2024-10-04 03:27:50', 108, 'bbbe8fjs83jcj@yandex.ru', 'B47Pkt69iNTkXXyCKPVV1728023270RGp6FmUOQveKxAo8Hbe1108', 1728023270),
(25, '2024-10-06 05:15:59', '2024-10-06 05:15:59', 109, 'ckatala@yandex.ru', 'a6NXpnVTm3gnBXSmBloq17282025594rR3GlmpiewUvaZikk2Y109', 1728202559),
(26, '2024-10-31 19:06:15', '2024-10-31 19:06:15', 110, 'FiveDragonDev@yandex.ru', 'o5jbxxD1fME7khO5Pkyf1730412375fz30HrhuMfmdI800Os6T110', 1730412375),
(27, '2024-12-23 13:26:19', '2024-12-23 13:26:19', 111, 'kwexys@yandex.ru', 'x0EAbeP7bFlnNHQGDFT21734971179SEAeBFz5O1mLa5OgiTIx111', 1734971179),
(28, '2025-02-02 00:47:44', '2025-02-02 00:47:44', 112, 'vamasorugo796@gmail.com', 'nvmxsLOnE2zMOGnxnmFF1738468064hUHiJ0kGw53i30UAgoFf112', 1738468064);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achivs`
--
ALTER TABLE `achivs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `restores`
--
ALTER TABLE `restores`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `users_clone`
--
ALTER TABLE `users_clone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `verifies`
--
ALTER TABLE `verifies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verifies_iduser_unique` (`iduser`),
  ADD UNIQUE KEY `verifies_email_unique` (`email`),
  ADD UNIQUE KEY `verifies_code_unique` (`code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `achivs`
--
ALTER TABLE `achivs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `codes`
--
ALTER TABLE `codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `restores`
--
ALTER TABLE `restores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT для таблицы `users_clone`
--
ALTER TABLE `users_clone`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `verifies`
--
ALTER TABLE `verifies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
