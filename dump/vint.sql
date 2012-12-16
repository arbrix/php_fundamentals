-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 16 2012 г., 11:55
-- Версия сервера: 5.1.41
-- Версия PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `vint`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `desc` varchar(2048) NOT NULL,
  `mark` int(10) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estimate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `alias`, `title`, `desc`, `mark`, `created`, `estimate`, `deadline`) VALUES
(1, 'test1', 'test1', 'test1', 1, '2012-12-16 09:15:56', '2012-12-16 10:00:00', '2012-12-16 12:00:00'),
(2, 'test2', 'test2', 'test2', 1, '2012-12-16 09:16:18', '2012-12-16 10:00:00', '2012-12-16 12:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `patronymic` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_vizit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `surname`, `patronymic`, `password`, `last_vizit`) VALUES
(1, 'test@test.com', 'test', 'test', 'test', '5a367d8a4541e22e31053d113b47f8c342e62a11', '2012-12-16 09:09:58');

-- --------------------------------------------------------

--
-- Структура таблицы `user_task`
--

CREATE TABLE IF NOT EXISTS `user_task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user_task`
--

INSERT INTO `user_task` (`id`, `user_id`, `task_id`, `status`, `created`, `updated`) VALUES
(1, 1, 1, 1, '2012-12-16 09:10:31', '0000-00-00 00:00:00'),
(2, 1, 2, 1, '2012-12-16 09:10:31', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
