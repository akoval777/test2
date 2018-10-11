-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 11 2018 г., 19:33
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `conversions`
--

CREATE TABLE `conversions` (
  `conversion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payout` float NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `conversions`
--

INSERT INTO `conversions` (`conversion_id`, `user_id`, `payout`, `datetime`) VALUES
(1, 1, 120, '2018-10-01 03:28:40'),
(2, 2, 250.5, '2018-10-01 10:10:20'),
(3, 1, 356, '2018-10-01 12:30:00'),
(4, 2, 123, '2018-10-01 00:45:00'),
(5, 1, 777, '2018-10-01 09:30:00'),
(6, 1, 121, '2018-10-01 09:50:00'),
(7, 3, 366, '2018-10-01 11:00:00'),
(8, 1, 26, '2018-10-15 05:00:00'),
(9, 2, 45, '2018-10-15 03:00:00'),
(10, 2, 4, '2018-10-01 10:17:00'),
(11, 1, 6, '2018-10-07 00:00:00'),
(12, 1, 60, '2018-09-26 05:00:00'),
(13, 1, 80, '2018-09-27 13:00:00'),
(14, 2, 55, '2018-09-23 13:00:00'),
(15, 2, 45, '2018-09-23 16:22:00');

-- --------------------------------------------------------

--
-- Структура таблицы `impressions`
--

CREATE TABLE `impressions` (
  `impression_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `impressions`
--

INSERT INTO `impressions` (`impression_id`, `user_id`, `datetime`) VALUES
(1, 1, '2018-10-01 08:00:00'),
(2, 2, '2018-10-01 17:00:00'),
(3, 1, '2018-10-01 05:30:00'),
(4, 2, '2018-10-09 06:45:00'),
(5, 1, '2018-10-01 05:20:00'),
(6, 1, '2018-10-01 09:13:00'),
(7, 1, '2018-10-01 09:48:00'),
(8, 1, '2018-10-02 05:20:00'),
(9, 3, '2018-09-02 14:00:00'),
(10, 2, '2018-09-17 10:00:00'),
(11, 2, '2018-10-04 05:00:00'),
(12, 1, '2018-09-25 02:00:00'),
(13, 1, '2018-09-25 02:25:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`conversion_id`);

--
-- Индексы таблицы `impressions`
--
ALTER TABLE `impressions`
  ADD PRIMARY KEY (`impression_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
