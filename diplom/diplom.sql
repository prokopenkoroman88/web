-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2020 г., 09:59
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `name`, `slug`, `descr`, `img`, `product_id`, `created_at`, `updated_at`) VALUES
(26, 'Бухгалтерская отчетность', 'radza-buxgalterskaya-otcetnost', '<p>документы и бланки, связанные с бухгалтерией</p>\r\n\r\n<ol>\r\n	<li>Во первых, аоплдыважпоа</li>\r\n	<li>Во вторых, паолыавжпаож</li>\r\n	<li>В третьих, рофыавыфадв</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>', NULL, 1, '2020-04-10 11:43:41', '2020-04-12 15:39:55'),
(27, 'Зарплата', 'radza-zarplata', 'Составление табеля, расчет и выплата зарплаты', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(28, 'Здравница', 'radza-zdravnica', 'Документы и отчеты об отдыхающих', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(29, 'Основные средства', 'radza-osnovnye-sredstva', 'необоротные активы, малоценные быстроизнашивающиеся предметы', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(30, 'Первичные документы', 'radza-pervicnye-dokumenty', 'первичка', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(31, 'Производство', 'radza-proizvodstvo', 'Производственные документы и отчеты. Материалы и изделия', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(32, 'Товарно материальный учет', 'radza-tovarno-materialnyi-ucet', 'Справочник товаров и услуг, документы прихода и отпуска', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(33, 'Учет НДС', 'radza-ucet-nds', 'Декларации по НДС, налоговые накладные и приложения к ним', NULL, 1, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(34, 'Бухгалтерский учет', 'x-door-buxgalterskii-ucet', 'документы и бланки, связанные с бухгалтерией', NULL, 2, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(35, 'Зарплата', 'x-door-zarplata', 'Составление табеля, расчет и выплата зарплаты', NULL, 2, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(36, 'Единый социальный взнос', 'x-door-edinyi-socialnyi-vznos', 'Расчет ЕСВ', NULL, 2, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(37, 'Торговый склад 2', 'x-door-torgovyi-sklad-2', 'Справочник товаров и услуг, документы прихода и отпуска', NULL, 2, '2020-04-10 11:43:42', '2020-04-10 11:43:42'),
(38, 'мояТорговля', 'tovar-moyatorgovlya', '<p>Модуль, обрабатывающий торовые запросы.</p>', NULL, 4, '2020-04-13 12:08:07', '2020-05-01 12:34:50'),
(39, 'Приложение созд в архиве', 'tovar-prilozenie-sozd-v-arxive', '<p>ожлдолдо ждло</p>', '/images/applications/logo_xdoor.gif', 4, '2020-04-13 15:12:59', '2020-04-15 16:02:12'),
(40, 'новый модуль', 'tovar-novyi-modul', '<p>новые возможности</p>', NULL, 4, '2020-04-16 12:10:34', '2020-04-16 12:10:34'),
(41, 'еще приложение', 'tovar-eshhe-prilozenie', '<p>описание приложения</p>', NULL, 4, '2020-04-16 12:16:54', '2020-04-16 12:16:54'),
(42, 'Бухгалтерия', 'rtx-door-buxgalteriya', '<p>для бухгалтеров</p>', NULL, 3, '2020-04-16 12:17:35', '2020-04-16 12:17:35'),
(43, 'Складское', 'rtx-door-skladskoe', '<p>Всё для склада</p>', '/images/applications/logo_rtxdoor.gif', 3, '2020-04-22 05:14:28', '2020-04-22 05:14:29'),
(44, 'Зарплата', 'rtx-door-zarplata', '<p>Модуль, обслуживающий расчет зарплаты</p>', NULL, 3, '2020-04-30 13:33:41', '2020-04-30 13:33:41'),
(46, 'Зарплатные документы', 'rtx-door-zarplatnye-dokumenty', '<p>Модуль, обслуживающий расчет зарплаты</p>', NULL, 3, '2020-04-30 13:37:40', '2020-04-30 13:37:40'),
(47, 'Зарплатные документы2', 'rtx-door-zarplatnye-dokumenty2', '<p>Модуль, обслуживающий расчет зарплаты</p>', NULL, 3, '2020-04-30 13:45:31', '2020-04-30 13:45:31'),
(48, 'Календарь', 'tovar-kalendar', '<p>календарь рабочего времени</p>', NULL, 4, '2020-05-01 12:37:02', '2020-05-01 12:37:02');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `release_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mark` tinyint(4) DEFAULT '0',
  `descr` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `release_id`, `mark`, `descr`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 7, 5, 'Excelent!', '2020-04-18 16:13:47', '2020-04-18 16:13:47'),
(2, 1, 4, 7, 4, 'good work!', '2020-04-18 16:14:59', '2020-04-18 16:14:59'),
(3, 1, 4, 7, 3, 'taxebe', '2020-04-18 16:16:01', '2020-04-18 16:16:01'),
(4, 1, 4, 7, 2, 'bad', '2020-04-18 16:27:24', '2020-04-18 16:27:24'),
(5, 1, 4, 7, 1, 'the <b>worst</b>', '2020-04-18 16:41:14', '2020-04-18 16:41:14'),
(6, 1, 4, 7, 5, 'Многострочный\r\nкомментарий\r\nна несколько строк.\r\nИнтересно,\r\nА растянет ли он\r\nтег Артикул?', '2020-04-18 16:55:24', '2020-04-18 16:55:24'),
(7, 1, 4, 7, 5, '<br>аааааааааааа\r\n<br>ббббббббббббб\r\n<br>вввввввввввввв\r\n<br>ггггггггггггггг\r\n<br>ддддддддддддд\r\n<br>ееееееееееее', '2020-04-18 16:56:10', '2020-04-18 16:56:10'),
(8, 1, 4, 7, 0, 'нулевая оценка <i class=\"fas fa-star\"></i>', '2020-04-18 18:15:11', '2020-04-18 18:15:11'),
(9, 1, 4, 7, 5, 'коммент для оценки в 3.5', '2020-04-18 18:46:32', '2020-04-18 18:46:32'),
(10, 1, 4, 7, 4, 'fower', '2020-04-18 18:46:46', '2020-04-18 18:46:46'),
(11, 1, 4, 7, 5, 'gfdsgfgfg', '2020-04-18 18:48:24', '2020-04-18 18:48:24'),
(12, 1, 4, 7, 3, 'ghkhjkhjkkk', '2020-04-18 19:13:19', '2020-04-18 19:13:19'),
(13, 1, 4, 7, 2, 'dva', '2020-04-18 19:13:36', '2020-04-18 19:13:36'),
(14, 2, 4, 7, 3, 'trojechka', '2020-04-19 12:05:41', '2020-04-19 12:05:41'),
(15, 2, 4, 7, 1, '11111111111111', '2020-04-19 12:06:31', '2020-04-19 12:06:31'),
(16, 2, 4, 7, 5, '<p>Большой отзыв</p>\r\n\r\n<ul>\r\n	<li>во первых</li>\r\n	<li>во вторых</li>\r\n	<li>еще</li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p>кыгрица, ...</p>\r\n</blockquote>', '2020-04-19 12:38:24', '2020-04-19 12:38:24'),
(17, 2, 4, 7, 3, '<p>Сам ставит 3 звездочки</p>', '2020-04-19 17:05:53', '2020-04-19 17:05:53'),
(18, 2, 4, 7, 1, '<p>1</p>', '2020-04-19 17:09:00', '2020-04-19 17:09:00'),
(19, 2, 4, 7, 5, '<p>555555555555</p>', '2020-04-19 17:12:04', '2020-04-19 17:12:04'),
(20, 2, 4, 7, 5, '<p>55</p>', '2020-04-19 17:12:15', '2020-04-19 17:12:15'),
(21, 2, 4, 7, 5, '<p>5</p>', '2020-04-19 17:12:30', '2020-04-19 17:12:30'),
(22, 2, 4, 7, 5, '<p>55555</p>', '2020-04-19 17:12:43', '2020-04-19 17:12:43'),
(23, 2, 1, 2, 1, '<p>Неправильный размер файлов</p>', '2020-04-19 17:43:34', '2020-04-19 17:43:34'),
(24, 2, 1, 2, 2, '<p>на два</p>', '2020-04-19 17:44:18', '2020-04-19 17:44:18'),
(25, 2, 1, 2, 3, '<p>333</p>', '2020-04-19 17:45:19', '2020-04-19 17:45:19'),
(26, 2, 1, 2, 3, '<p>3</p>', '2020-04-19 17:45:49', '2020-04-19 17:45:49'),
(27, 2, 1, 1, 5, '<p>Все позиции есть</p>', '2020-04-19 17:46:26', '2020-04-19 17:46:26'),
(28, 2, 1, 1, 2, '<p>Нет ниодного файла</p>', '2020-04-19 17:46:43', '2020-04-19 17:46:43'),
(29, 1, 1, 8, 5, '<p>Файл удачно скачался</p>', '2020-04-20 08:41:59', '2020-04-20 08:41:59'),
(30, 1, 1, 8, 4, '<p>Но не сразу загрузился</p>', '2020-04-20 08:42:19', '2020-04-20 08:42:19'),
(31, 1, 4, 6, 4, '<p>Хорошо видно описание</p>', '2020-04-20 09:22:07', '2020-04-20 09:22:07'),
(32, 1, 4, 5, 4, '<p>рлрлорлорлорло</p>', '2020-04-20 11:14:29', '2020-04-20 11:14:29'),
(33, 1, 3, 9, 5, '<p>super</p>', '2020-04-26 06:28:18', '2020-04-26 06:28:18'),
(34, 1, 4, 3, 4, '<p>Choro&scaron;o</p>', '2020-04-28 11:15:34', '2020-04-28 11:15:34');

-- --------------------------------------------------------

--
-- Структура таблицы `components`
--

CREATE TABLE `components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `release_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `components`
--

INSERT INTO `components` (`id`, `release_id`, `application_id`, `created_at`, `updated_at`) VALUES
(1, 1, 26, NULL, NULL),
(2, 1, 27, NULL, NULL),
(3, 1, 28, NULL, NULL),
(4, 1, 29, NULL, NULL),
(5, 1, 30, NULL, NULL),
(6, 1, 31, NULL, NULL),
(7, 1, 32, NULL, NULL),
(8, 1, 33, NULL, NULL),
(9, 2, 26, NULL, NULL),
(10, 2, 27, NULL, NULL),
(11, 8, 27, NULL, NULL),
(12, 8, 31, NULL, NULL),
(13, 8, 32, NULL, NULL),
(14, 8, 33, NULL, NULL),
(15, 6, 41, NULL, NULL),
(16, 6, 38, NULL, NULL),
(17, 6, 40, NULL, NULL),
(18, 9, 42, NULL, NULL),
(19, 9, 43, NULL, NULL),
(20, 3, 41, NULL, NULL),
(21, 3, 38, NULL, NULL),
(22, 3, 40, NULL, NULL),
(23, 3, 39, NULL, NULL),
(24, 2, 29, NULL, NULL),
(25, 2, 30, NULL, NULL),
(26, 2, 33, NULL, NULL),
(27, 7, 38, NULL, NULL),
(28, 10, 42, NULL, NULL),
(29, 10, 43, NULL, NULL),
(30, 11, 28, NULL, NULL),
(31, 11, 30, NULL, NULL),
(32, 11, 32, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2020_03_29_171730_create_products_table', 2),
(10, '2020_03_29_171908_create_applications_table', 2),
(11, '2020_03_29_172551_create_releases_table', 3),
(12, '2020_03_29_172604_create_components_table', 3),
(13, '2020_04_15_191206_create_comments_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `sku` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `descr`, `img`, `price`, `sku`, `created_at`, `updated_at`) VALUES
(1, 'Раджа', 'rajah', '<p>Программа сопровождения бизнеса.</p>\r\n\r\n<p>Проект РАДЖА - это целая линейка программных продуктов, предназначенных для решения прикладных задач из совершенно разных областей деятельности. Уже сегодня фирма поставляет на рынок такие программы семейства:</p>\r\n\r\n<ul>\r\n	<li><strong>РАДЖА. Склад, торговля, бухгалтерия.</strong>&nbsp;Это программа, решающая задачи в области &ldquo;склад, торговля, бухгалтерия&hellip;&rdquo;. Взаимоотношения с партнерами, учет товара, налоговые обязательства, счета, выписки, накладные, отчеты, бухгалтерские проводки и многое, многое другое.</li>\r\n	<li><strong>РАДЖА. Программа мониторинга эксплуатации парка игровых автоматов.</strong>&nbsp;Эта программа решает многочисленные задачи, возникающие при эксплуатации игрового оборудования. Учет автоматов, перемещение их между площадками, ремонт, инкассация, учет движения безналичных и наличных денег и т.п. Работа с филиалами и консолидированная отчетность.</li>\r\n	<li><strong>РАДЖА. Станция переливания крови.</strong>&nbsp;Программа для медицинских учреждений. Учет доноров. Банк данных донорской крови и плазмы. Обширная информация в картотеке доноров. Автоматическое определение лиц, не допускающихся к сдаче крови. Почетные доноры.</li>\r\n	<li><strong>РАДЖА. Здравница.</strong>&nbsp;Программа для санаторно-курортных комплексов. Учет путевок: плановые графики заездов отдыхающих и фактическая реализация путевок. Счета, накладные, акты выпуска путевок, налоговые накладные, возвратные накладные. Регистратура: регистрация отдыхающих, поселение, бронирование, постановка комнат на ремонт. Пакет сводных отчетов. Появление коммерческого релиза программы запланировано на начало 2005 года.</li>\r\n</ul>\r\n\r\n<p>Существуют еще несколько проектов, находящихся в стадии разработки. Все эти задачи с прикладной точки зрения не имеют ничего общего.<br />\r\n<strong>Однако их обьединяет другое - общая технологическая платформа, методика и приемы разработки, сопроводжения, тестирования и продажи.</strong></p>', '/images/products/logo_rajah.gif', 100.00, '0', '2020-04-10 11:10:35', '2020-04-29 18:08:32'),
(2, 'X-Door', 'x-door', '<p>Помимо всех возможностей RTX-DOOR, программа X-DOOR содержит полный набор инструментальных средств, предназначенных для пользователей, планирующих использовать собственные методы учета либо анализа на предприятии, изменять алгоритмы работы приложений и создавать новые.</p>\r\n\r\n<ol>\r\n	<li>во первых</li>\r\n	<li>во вторых</li>\r\n</ol>', '/images/products/logo_xdoor.gif', 200.00, '1', '2020-04-10 11:10:35', '2020-04-29 18:21:19'),
(3, 'rtx-Door', 'rtx-door', '<p>rtX-Door</p>', '/images/products/logo_rtxdoor.gif', 150.00, '2', '2020-04-10 11:10:35', '2020-04-11 13:18:12'),
(4, 'tovar', 'tovar', '<p>opisanie</p>', '/images/products/logo_xdoor.gif', 1278.00, '0022', '2020-04-12 10:00:20', '2020-04-12 10:00:44');

-- --------------------------------------------------------

--
-- Структура таблицы `releases`
--

CREATE TABLE `releases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` text COLLATE utf8mb4_unicode_ci,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `included_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_version` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_version` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `releases`
--

INSERT INTO `releases` (`id`, `name`, `slug`, `files`, `descr`, `price`, `date`, `included_id`, `last_id`, `product_id`, `version`, `server_version`, `client_version`, `created_at`, `updated_at`) VALUES
(1, 'Дистрибутив', 'radza-1-8-93', NULL, '<p>&nbsp;</p>\r\n\r\n<article>\r\n<h4>Бухгалтерская отчетность</h4>\r\n\r\n<ul>\r\n	<li>бухгалтерия</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Зарплата</h4>\r\n\r\n<ul>\r\n	<li>зарплатные отчеты</li>\r\n	<li>зарплатные документы</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Здравница</h4>\r\n\r\n<ul>\r\n	<li>справочник и картотека отдыхающих</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Основные средства</h4>\r\n\r\n<ul>\r\n	<li>оооо</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Первичные документы</h4>\r\n\r\n<ul>\r\n	<li>пд</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Производство</h4>\r\n\r\n<ul>\r\n	<li>произ</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Товарно материальный учет</h4>\r\n\r\n<ul>\r\n	<li>тму</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Учет НДС</h4>\r\n\r\n<ul>\r\n	<li>вапвапа</li>\r\n</ul>\r\n</article>', 1000.00, '2020-04-10', NULL, NULL, 1, '1.8.93', '1.8.93.1001', '1.8.93.1501', '2020-04-10 12:04:17', '2020-04-10 12:04:17'),
(2, 'обновление Раджи 94', 'rajah-1-8-94', '', '<p>&nbsp;</p>\r\n\r\n<p>Бухгалтерская отчетность</p>\r\n\r\n<ul>\r\n	<li>впвыпвапыва</li>\r\n</ul>\r\n\r\n<p>Зарплата</p>\r\n\r\n<ul>\r\n	<li>ывапваыпвапвы</li>\r\n</ul>\r\n\r\n<p>Основные средства</p>\r\n\r\n<ul>\r\n	<li>MNMA</li>\r\n</ul>\r\n\r\n<p>Первичные документы</p>\r\n\r\n<ul>\r\n	<li>pervichnye</li>\r\n</ul>\r\n\r\n<article>\r\n<h4>Учет НДС</h4>\r\n\r\n<ul>\r\n	<li>hjjhkjh</li>\r\n</ul>\r\n</article>', 100.00, '2020-04-10', NULL, 1, 1, '1.8.94', '1.8.94.1002', '1.8.94.1502', '2020-04-10 12:06:24', '2020-04-28 12:18:02'),
(3, 'ttttttttttttttttttt', 'tovar-2-1', '', '<p>ttttttttttttttttttttttttttttt</p>\r\n\r\n<article>\r\n<h4>еще приложение</h4>\r\n\r\n<ul>\r\n	<li>gfhfgh</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>мояТорговля</h4>\r\n\r\n<ul>\r\n	<li>hgfdh</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>новый модуль</h4>\r\n\r\n<ul>\r\n	<li>hdfhfgh</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Приложение созд в архиве</h4>\r\n\r\n<ul>\r\n	<li>sdfgdfgsf</li>\r\n</ul>\r\n</article>', 800.00, '2020-04-12', NULL, NULL, 4, '2.1', '2.1.1', '2.1.1', '2020-04-12 10:24:44', '2020-04-28 09:53:52'),
(5, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'tovar-2-2', '', '<p>ttttttttttttttttttttttttttttt</p>', 800.00, '2020-04-12', NULL, NULL, 4, '2.2', '2.2.1', '2.2.1', '2020-04-12 10:26:23', '2020-04-12 10:26:23'),
(6, 'Третье обновление', 'tovar-2-3', '/update/tovar/comment.txt', '<p>&nbsp;</p>\r\n\r\n<article>\r\n<h4>еще приложение</h4>\r\n\r\n<ul>\r\n	<li>фывфыв</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>мояТорговля</h4>\r\n\r\n<ul>\r\n	<li>аывфав <strong>жирное</strong>&nbsp;</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>новый модуль</h4>\r\n\r\n<ul>\r\n	<li>пывапвапыва</li>\r\n</ul>\r\n</article>', 900.00, '2020-04-12', NULL, 5, 4, '2.3', '2.3.1', '2.3.1', '2020-04-12 10:59:25', '2020-04-20 09:21:18'),
(7, 'chetvert', 'tovar-2-4', '', '<p>ghgfhghdfhf</p>\r\n\r\n<article>\r\n<h4>мояТорговля</h4>\r\n\r\n<ul>\r\n	<li>torgovlia</li>\r\n</ul>\r\n</article>', 901.00, '2020-04-12', NULL, 6, 4, '2.4', '2.4.1', '2.4.1', '2020-04-12 11:03:36', '2020-04-28 17:24:34'),
(8, 'обновление Rajah 95', 'rajah-1-8-95', '/update/rajah/update_95_170418.exe', '<p>&nbsp;</p>\r\n\r\n<p>Учет НДС</p>\r\n\r\n<ul>\r\n	<li>В соответствии с приказом Министерства финансов Украины №276 от 23.02.2017 г. внесены изменения в порядок заполнения и печатные формы документов:\r\n	<ul>\r\n		<li>Декларация по НДС;</li>\r\n		<li>Приложение 1 к декларации по НДС;</li>\r\n		<li>Приложение 5 к декларации по НДС.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Реализована выгрузка декларации по НДС и приложений к ней в файл xml-формата на основании приказа Министерства финансов Украины №276 от 23.02.2017 г.</li>\r\n	<li>Документ &laquo;Налоговая накладная&raquo;:\r\n	<ul>\r\n		<li>внесены изменения в алгоритм выгрузки в xml-файл документов с типом причины 11 (не выгружаются графы 4-7);</li>\r\n		<li>реализовано отображение в отчете и выгрузка в xml-файл кода филиала покупателя.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>Товарно материальный учет</p>\r\n\r\n<ul>\r\n	<li>Справочник &laquo;Партнеры&raquo;. Добавлена возможность указания в карточке партнера кода филиала для отображения в налоговой накладной (поле &laquo;Код филиала&raquo;).</li>\r\n	<li>Документ &laquo;Расходная накладная&raquo;. Изменен алгоритм вычисления суммы дополнительного сбора.</li>\r\n	<li>Отчет &laquo;Расходная накладная (данные производителя)&raquo;. Реализовано отображение суммы дополнительного сбора.</li>\r\n</ul>\r\n\r\n<p>Зарплата</p>\r\n\r\n<ul>\r\n	<li>Документ &laquo;Расчет зарплаты&raquo;. Исправлена ошибка при начислении индексации.</li>\r\n	<li>Отчет &laquo;Расчетный листок&raquo;. Изменен алгоритм формирования отчета.</li>\r\n</ul>\r\n\r\n<p>Производство</p>\r\n\r\n<ul>\r\n	<li>Документ &laquo;Заказ на производство&raquo;. Реализовано заполнение цены для услуг (работ) себестоимостью, заданной в картотеке ТМЦ, при заполнении перечня материалов без спецификации.</li>\r\n</ul>', 100.00, '2020-04-18', NULL, 2, 1, '1.8.95', '1.8.95.3111', '1.8.95.2317', '2020-04-20 08:35:20', '2020-04-20 08:40:43'),
(9, 'Дистрибутив', 'rtx-door-rtx1', '', '<p>&nbsp;</p>\r\n\r\n<article>\r\n<h4>Бухгалтерия</h4>\r\n\r\n<ul>\r\n	<li>бухгалтерский учет</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Складское</h4>\r\n\r\n<ul>\r\n	<li>Складские документы</li>\r\n</ul>\r\n</article>', 10.00, '2020-04-22', NULL, NULL, 3, 'rtx1', 'rtx1.1', 'rtx1.1', '2020-04-22 12:51:46', '2020-04-22 12:51:46'),
(10, 'обновление 1122', 'rtx-door-1-8-107', '', '<p>&nbsp;</p>\r\n\r\n<article>\r\n<h4>Бухгалтерия</h4>\r\n\r\n<ul>\r\n	<li>пав</li>\r\n</ul>\r\n</article>\r\n\r\n<article>\r\n<h4>Складское</h4>\r\n\r\n<ul>\r\n	<li>апа</li>\r\n</ul>\r\n</article>', 8.00, '2020-04-30', NULL, NULL, 3, '1.8.107', '19', '1.8.100.12598', '2020-04-30 13:25:30', '2020-04-30 13:25:30'),
(11, 'обновление Rajah 96', 'rajah-1-8-96', '/update/rajah/update_96_180125.exe', '<p>&nbsp;</p>\r\n\r\n<p>Товарно материальный учет</p>\r\n\r\n<ul>\r\n	<li>Расходная накладная</li>\r\n	<li>Приходный ордер</li>\r\n</ul>\r\n\r\n<p>Здравница</p>\r\n\r\n<ul>\r\n	<li>Карточка отдыхающего</li>\r\n</ul>\r\n\r\n<p>Первичные документы</p>\r\n\r\n<ul>\r\n	<li>Касса и банк\r\n	<ul>\r\n		<li>Авансовый отчет</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 700.00, '2020-05-01', NULL, 8, 1, '1.8.96', '1.8.96.3112', '1.8.96.2318', '2020-05-01 12:48:38', '2020-05-01 12:52:25');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Роман', 'roman.prokop@mail.zp.ua', NULL, '$2y$10$eT4BX2TlBDRjopATyVIyg.HuarXt0cqHMqsu.FFJsuycZikayeWku', 'admin', NULL, NULL, '2020-03-28 15:40:00', '2020-03-28 15:40:00'),
(2, 'Vasya', 'vasya@zp.ua', NULL, '$2y$10$uCazIDKgYJk8mTY39P4UNOG75vB0SRmwGxOYyI4qDm24vKSAHjXdm', NULL, NULL, NULL, '2020-04-03 05:15:05', '2020-04-03 05:15:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_slug_unique` (`slug`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_release_id_foreign` (`release_id`);

--
-- Индексы таблицы `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `components_release_id_foreign` (`release_id`),
  ADD KEY `components_application_id_foreign` (`application_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Индексы таблицы `releases`
--
ALTER TABLE `releases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `releases_slug_unique` (`slug`),
  ADD KEY `releases_included_id_foreign` (`included_id`),
  ADD KEY `releases_last_id_foreign` (`last_id`),
  ADD KEY `releases_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `components`
--
ALTER TABLE `components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `releases`
--
ALTER TABLE `releases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_release_id_foreign` FOREIGN KEY (`release_id`) REFERENCES `releases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `components_release_id_foreign` FOREIGN KEY (`release_id`) REFERENCES `releases` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `releases`
--
ALTER TABLE `releases`
  ADD CONSTRAINT `releases_included_id_foreign` FOREIGN KEY (`included_id`) REFERENCES `releases` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `releases_last_id_foreign` FOREIGN KEY (`last_id`) REFERENCES `releases` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `releases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
