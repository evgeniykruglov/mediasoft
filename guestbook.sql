-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2016 г., 19:26
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guestbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `CONTENT` text NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`ID`, `TITLE`, `CONTENT`, `DATE`) VALUES
(1, 'Первая запись', 'Контент', '2016-10-02'),
(2, 'Вторая запись', 'Контент', '2016-10-29'),
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum consequat dapibus. Maecenas et felis euismod, viverra dui vitae, porttitor dui. Quisque posuere, metus at faucibus laoreet, magna tellus dictum elit, sed pulvinar neque dolor sed turpis. Proin eget lobortis nisl. Nam sodales euismod sem eu cursus. Quisque sapien arcu, consequat non porttitor vitae, hendrerit nec libero. Nulla in leo ut neque interdum lacinia quis vel magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id mattis nisi.', '2016-10-19'),
(4, 'Женя и Ангелина', 'Счет 3:1', '2016-10-30'),
(50, '123', '321', '2016-10-31'),
(51, '123', '321', '2016-10-31'),
(52, 'Ghbdtn', 'ldjskvjbrjbvjhrsbvjhbrjhvbnsdbcnm', '2016-10-31');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(255) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`ID`, `USERNAME`, `PASS`, `NAME`, `EMAIL`) VALUES
(5, 'zhe', 'zhe', 'Евгений', 'zhe.73@bk.ru'),
(6, 'angost', 'angost', 'Ангелина', 'angost@mail.ru'),
(7, 'DedMoroz', 'moroz', 'Дед Мороз', 'ded@moroz.ru'),
(8, 'hamada', 'hamada', 'хамада', 'hamada@ham.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE` (`ID`,`USERNAME`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
