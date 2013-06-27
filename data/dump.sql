-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 24 2013 г., 00:44
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
-- Структура таблицы `posts`
--
USE evercodebase;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `date`, `content`) VALUES
(1, 'Test name', '2013-05-19', 'Редактируем базу данных'),
(3, 'Запись # 3', '1985-12-12', 'Ололо, работает'),
(7, 'Сноуден, возможно, летит через Москву транзитом', '2013-06-23', 'Агент сообщил о том, что за участниками саммита "большой двадцатки" велась слежка в Лондоне в 2009 году. В том числе проходила информация, что велась попытка прослушать разговоры Дмитрия Медведева.'),
(12, 'Задержанные за поджог лагеря геологов отпущены', '2013-06-23', 'Полиция отпустила 25 человек, задержанных накануне для выяснения обстоятельств инцидента на никелевом месторождении под Воронежем, где пострадали трое сотрудников правоохранительных органов, сообщила РИА Новости в воскресенье начальник пресс-службы регионального главка МВД Наталья Куликова.'),
(13, 'Сноуден попросил политическое убежище в Эквадоре', '2013-06-23', '22:26<br>Министр иностранных дел Эквадора Рикардо Патиньо проведет в понедельник специальную пресс-конференцию, посвященную теме обращения Эдварда Сноудена с прошением об убежище, сообщают эквадорские СМИ.<br>21:58<br>Около десяти минут назад с территории аэропорта выехала машина посла Эквадора, в ней находился только водитель. Представители СМИ не покидают "Шереметьево", поскольку там остается еще одна посольская машина.<br>21:23<br>Бывший сотрудник спецслужб США Эдвард Сноуден намерен отправиться в Эквадор, сообщает сайт WikiLeaks.<br>21:13<br>Сноуден сможет продолжить путь в Латинскую Америку даже при отсутствии американского паспорта: если власти США действительно аннулировали его паспорт, в то время как он попросил политического убежища в Эквадоре, власти Эквадора могут выдать ему документ беженца или предоставить в специальном порядке эквадорское гражданство, выдав паспорт или соответствующую справку.<br>20:55<br>Отъезд Сноудена из Гонконга вызвал жесткую реакцию членов конгресса США: по их мнению, бегство "разоблачителя" ставит под сомнение мотивы его действий и может осложнить отношения США со странами его пребывания.<br>20:52<br>Как сообщает корреспондент "Голоса России", водитель посольского автомобиля Эквадора достал бутерброд, чтобы подкрепиться: вероятно, Сноуден все еще проводит встречу с послом Эквадора в России, и их разговор может затянуться.'),
(14, 'Оружейник Калашников доставлен в Москву в тяжелом состоянии', '2013-06-23', 'С аэродрома Раменское Михаила Калашникова отправили на "скорой" в Центральный военный клинический госпиталь имени Мандрыка. У 93-летнего конструктора диагностирована тромбоэмболия мелких ветвей легочной артерии. В настоящее время он находится в сознании, несмотря на тяжелое состояние.'),
(15, 'Автобус упал в пропасть в Черногории, около 20 человек погибли', '1994-03-02', 'Автобус слетел в пропасть в Черногории, по предварительным данным, 20 человек погибли, сообщает государственное телерадио Черногории. По данным гостелерадио, автобус был с румынскими номерами, в нем находились, по предварительным данным, около 50 человек, 20 из них погибли.'),
(16, 'Россия заняла первое место на чемпионате Европы по легкой атлетике', '1923-04-05', 'Сборная России по легкой атлетике заняла первое место на командном чемпионате Европы, проходившем в Гейтсхеде, Великобритания, сообщает пресс-служба соревнований.'),
(17, 'Lorem ipsum dolor sit amet', '2013-06-24', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. <br><br>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(19, 'Lorem ipsum dolor sit amet 2', '2013-06-24', 'Aenean2 commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. <br><br>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. <br><br>2Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,<br><br>test'),
(21, 'Test new', '1506-04-02', 'Final<br><br>sdg<br>3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
