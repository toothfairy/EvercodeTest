-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 02 2013 г., 21:15
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
(1, 'Тестовое название 1', 'testovoe_nazvanie_1'),
(2, 'Тестовое название 2', 'testovoe_nazvanie_2'),
(3, 'Тестовое название 2', 'testovoe_nazvanie_2_2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `category_id`, `cleanurl`, `author_login`, `time`) VALUES
(1, 'Test name 2', 'Редактируем базу<br><br> данных', 0, '', '', '0000-00-00 00:00:00'),
(3, 'Запись # 3', 'Ололо, работает', 0, '', '', '0000-00-00 00:00:00'),
(7, 'Сноуден, возможно, летит через Москву транзитом', 'Агент сообщил о том, что за участниками саммита "большой двадцатки" велась слежка в Лондоне в 2009 году. В том числе проходила информация, что велась попытка прослушать разговоры Дмитрия Медведева.', 0, '', '', '0000-00-00 00:00:00'),
(12, 'Задержанные за поджог лагеря геологов отпущены', 'Полиция отпустила 25 человек, задержанных накануне для выяснения обстоятельств инцидента на никелевом месторождении под Воронежем, где пострадали трое сотрудников правоохранительных органов, сообщила РИА Новости в воскресенье начальник пресс-службы регионального главка МВД Наталья Куликова.', 0, '', '', '0000-00-00 00:00:00'),
(13, 'Сноуден попросил политическое убежище в Эквадоре', '22:26<br>Министр иностранных дел Эквадора Рикардо Патиньо проведет в понедельник специальную пресс-конференцию, посвященную теме обращения Эдварда Сноудена с прошением об убежище, сообщают эквадорские СМИ.<br>21:58<br>Около десяти минут назад с территории аэропорта выехала машина посла Эквадора, в ней находился только водитель. Представители СМИ не покидают "Шереметьево", поскольку там остается еще одна посольская машина.<br>21:23<br>Бывший сотрудник спецслужб США Эдвард Сноуден намерен отправиться в Эквадор, сообщает сайт WikiLeaks.<br>21:13<br>Сноуден сможет продолжить путь в Латинскую Америку даже при отсутствии американского паспорта: если власти США действительно аннулировали его паспорт, в то время как он попросил политического убежища в Эквадоре, власти Эквадора могут выдать ему документ беженца или предоставить в специальном порядке эквадорское гражданство, выдав паспорт или соответствующую справку.<br>20:55<br>Отъезд Сноудена из Гонконга вызвал жесткую реакцию членов конгресса США: по их мнению, бегство "разоблачителя" ставит под сомнение мотивы его действий и может осложнить отношения США со странами его пребывания.<br>20:52<br>Как сообщает корреспондент "Голоса России", водитель посольского автомобиля Эквадора достал бутерброд, чтобы подкрепиться: вероятно, Сноуден все еще проводит встречу с послом Эквадора в России, и их разговор может затянуться.', 0, '', '', '0000-00-00 00:00:00'),
(14, 'Оружейник Калашников доставлен в Москву в тяжелом состоянии', 'С аэродрома Раменское Михаила Калашникова отправили на "скорой" в Центральный военный клинический госпиталь имени Мандрыка. У 93-летнего конструктора диагностирована тромбоэмболия мелких ветвей легочной артерии. В настоящее время он находится в сознании, несмотря на тяжелое состояние.', 0, '', '', '0000-00-00 00:00:00'),
(15, 'Автобус упал в пропасть в Черногории, около 20 человек погибли', 'Автобус слетел в пропасть в Черногории, по предварительным данным, 20 человек погибли, сообщает государственное телерадио Черногории.<br><br> По данным гостелерадио, автобус был с румынскими номерами, в нем находились, по предварительным данным, около 50 человек, 20 из них погибли.', 0, '', '', '0000-00-00 00:00:00'),
(16, 'Россия заняла первое место на чемпионате Европы по легкой атлетике', 'Сборная России по легкой атлетике заняла первое место на командном чемпионате Европы, проходившем в Гейтсхеде, Великобритания, сообщает пресс-служба соревнований.', 0, '', '', '0000-00-00 00:00:00'),
(17, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. <br><br>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 0, '', '', '0000-00-00 00:00:00'),
(19, 'Lorem ipsum dolor sit amet 2', 'Aenean2 commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. <br><br>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. <br><br>2Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,<br><br>test', 0, '', '', '0000-00-00 00:00:00'),
(36, 'Тест ЧПУ', '1 2 3', 0, 'test chpu', '', '0000-00-00 00:00:00'),
(37, 'Тест ЧПУ 2', 'бьваидл', 3, 'test_chpu_2', '', '0000-00-00 00:00:00'),
(38, 'Тест ЧПУ 3', 'Раздва<br>три ва<br>четыре', 0, 'test_chpu_3', '', '0000-00-00 00:00:00'),
(39, 'Тест sql', 'lknlknsfdbn<br>fe<br>hbretnb<br>retnb  ds', 0, 'test_sql', '', '0000-00-00 00:00:00'),
(43, 'Тест ЧПУ 3', 'дльоджьоджьжздь', 0, 'test_chpu_3_2', '', '0000-00-00 00:00:00'),
(44, 'Тест времени и автора', 'ждьавыпжрдьивж', 0, 'test_vremeni_i_avtora', 'admin', '0000-00-00 00:00:00'),
(45, 'Тест времени и автора 2', 'ждлотжлоти', 1, 'test_vremeni_i_avtora_2', 'admin', '0000-00-00 00:00:00'),
(46, 'ДЛТДТ', 'тджлтжд', 0, 'dltdt', 'admin', '0000-00-00 00:00:00'),
(47, 'тум', 'длтд', 0, 'tum', 'admin', '2013-07-30 23:22:04'),
(48, 'Тест 5', 'тдлтдлтsdf vsd v', 0, 'test_5', 'admin', '2013-07-30 23:36:07'),
(49, 'Тест добавления в категорию', 'оДЛТлвыЛОТлдвт ИДв', 2, 'test_dobavleniya_v_kategoriyu', 'admin', '2013-07-31 23:55:45'),
(50, 'Тест добавления в категорию 2', 'оДЛТлвыЛОТлдвт ИДв', 1, 'test_dobavleniya_v_kategoriyu_2', 'admin', '2013-07-31 23:55:54'),
(51, 'Тест добавления в категорию 2', 'оДЛТлвыЛОТлдвт ИДвsdvdsv kj sdfv', 2, 'test_dobavleniya_v_kategoriyu_2_2', 'admin', '2013-07-31 23:57:22'),
(52, 'Тест добавления в категорию 2', 'оДЛТлвыЛОТлдвт ИДв', 1, 'test_dobavleniya_v_kategoriyu_2_2', 'admin', '2013-07-31 23:57:25'),
(53, 'Тест добавления в категорию 2', 'оДЛТлвыЛОТлдвт ИДв', 1, 'test_dobavleniya_v_kategoriyu_2_2', 'admin', '2013-07-31 23:57:28');

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
(7, 'admin', '306c837121336bb803993d6cf477e10c', 'admin@admin.ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
