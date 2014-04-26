-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 26 2014 г., 21:34
-- Версия сервера: 5.5.27
-- Версия PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `evercodebase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cleanurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `cleanurl`) VALUES
(1, 'Категория 1', 'cat_1'),
(2, 'Новости', 'news'),
(3, 'Общество', 'obshhestvo');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `cleanurl` varchar(255) NOT NULL,
  `author_login` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `category_id`, `cleanurl`, `author_login`, `time`) VALUES
(1, 'ОБСЕ направила на Украину переговорщиков для освобождения наблюдателей', 'Госсекретарь США Джон Керри в телефонном разговоре заверил российского коллегу Сергея Лаврова, что Вашингтон будет стремиться использовать свои возможности, чтобы побудить киевские власти к конкретным шагам по снижению напряженности на востоке Украины, говорится в сообщении МИД России.', 1, 'obse_napravila_na_ukrainu_peregovorschikov_dlya_osvobojdeniya_nablyudateley', 'admin', '2014-04-26 21:26:25'),
(2, 'Жители Берлина не позволили неонацистам провести марш по улицам города', 'Бой между Денисом Лебедевым и Гильермо Джонсом отменен Промоутеры российского боксера Дениса Лебедева будут настаивать на дисквалификации панамца Гильермо Джонса.', 2, 'zhiteli_berlina_ne_pozvolili_neonatsistam_provesti_marsh_po_ulitsam_goroda', 'admin', '2014-04-26 21:26:47'),
(3, 'Минэнергетики и Газпром проконсультировались по поставкам газа', 'Министр энергетики РФ Александр Новак и глава "Газпрома" Алексей Миллер провели 26 апреля в Москве консультации с представителями Боснии и Герцеговины, Македонии и Молдавии по вопросу обеспечения транзитных поставок газа через территорию Украины.', 1, 'minenergetiki_i_gazprom_prokonsultirovalis_po_postavkam_gaza', 'admin', '2014-04-26 21:27:01'),
(6, 'Пятнадцать детей из интерната в Туве попали в больницу с отравлением', 'Пятнадцать воспитанников школы-интерната в Туве попали в больницу с отравлением, у одного ребенка была зафиксирована клиническая смерть, сообщила РИА Новости представитель регионального МВД в субботу.', 3, 'pyatnadtsat_detey_iz_internata_v_tuve_popali_v_bolnitsu_s_otravleniem', 'admin', '2014-04-26 21:27:31'),
(7, 'Екатеринбургский Театр оперы и балета получил четыре «Золотых маски»', 'Артисты Екатеринбургского Театра оперы и балета стали лауреатами Российской национальной театральной премии и фестиваля "Золотая маска" в нескольких номинациях, сообщается на сайте фестиваля. Оперный театр получил награду в номинации "Балет" за постановку "Вариации Сальери".', 1, 'ekaterinburgskiy_teatr_opery_i_baleta_poluchil_chetyre_zolotyh_maski', 'admin', '2014-04-26 21:29:23'),
(8, '29 апреля земляне увидят кольцевое солнечное затмение', '29 апреля произойдет крайне редкое космическое явление. С территории Южного Полушария можно будет наблюдать полное солнечное затмение. При этом, светило окрасится в ярко-красный цвет.', 2, '29_aprelya_zemlyane_uvidyat_koltsevoe_solnechnoe_zatmenie', 'admin', '2014-04-26 21:31:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(6, 'tester3', '8bea6827a557b7b55ec26b16c8ed173e', 'qwerty@qwfv.ru'),
(7, 'admin', '8bea6827a557b7b55ec26b16c8ed173e', 'admin@admin.ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
