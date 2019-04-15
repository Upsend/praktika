-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2019 г., 19:24
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `drsu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autos`
--

CREATE TABLE `autos` (
  `id_auto` int(11) NOT NULL,
  `Гаражный номер` varchar(25) NOT NULL,
  `ГосНомер` varchar(25) NOT NULL,
  `Автомобиль` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autos`
--

INSERT INTO `autos` (`id_auto`, `Гаражный номер`, `ГосНомер`, `Автомобиль`) VALUES
(1, '1', 'P373XB', 'УАЗ 455 ');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `Табельный номер` varchar(25) NOT NULL,
  `ФИО` varchar(25) NOT NULL,
  `Водительское удосоверение` varchar(25) NOT NULL,
  `Открытые категории` varchar(25) NOT NULL,
  `id_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id`, `Табельный номер`, `ФИО`, `Водительское удосоверение`, `Открытые категории`, `id_auto`) VALUES
(1, '1', 'ИвановИванИванович', '52147989', 'B,C,CE', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orrder`
--

CREATE TABLE `orrder` (
  `order_id` int(11) NOT NULL,
  `FIO` varchar(200) NOT NULL,
  `Otdel` varchar(200) NOT NULL,
  `Doljnost` varchar(200) NOT NULL,
  `Datetoday` date NOT NULL,
  `date_end` date NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orrder`
--

INSERT INTO `orrder` (`order_id`, `FIO`, `Otdel`, `Doljnost`, `Datetoday`, `date_end`, `Description`, `Status`) VALUES
(3, 'Ненашев Сергей Павлович', 'Дорожное строительство', 'Дорожный мастер', '2019-04-03', '2019-04-04', 'Асфальт 25 тонн', 'не выполено'),
(4, 'Ненашев Сергей Павлович', 'Дорожное строительство', 'Дорожный мастер', '2019-04-03', '2019-04-04', 'Асфальт 25 тонн', 'не выполено');

-- --------------------------------------------------------

--
-- Структура таблицы `putevki`
--

CREATE TABLE `putevki` (
  `номер путевки` int(11) NOT NULL,
  `ФИО` varchar(50) NOT NULL,
  `Водительское удостоверения` varchar(50) NOT NULL,
  `Категории` varchar(50) NOT NULL,
  `Табельный номер` varchar(50) NOT NULL,
  `Гос.номер автомобиля` varchar(50) NOT NULL,
  `Гаражный номер автомобиля` varchar(50) NOT NULL,
  `Марка Автомобиля` varchar(50) NOT NULL,
  `Дата` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `putevki`
--

INSERT INTO `putevki` (`номер путевки`, `ФИО`, `Водительское удостоверения`, `Категории`, `Табельный номер`, `Гос.номер автомобиля`, `Гаражный номер автомобиля`, `Марка Автомобиля`, `Дата`) VALUES
(2, 'ИвановИванИванович', '52147989', 'B,C,CE', '1', 'P373XB', '1', 'УАЗ', '2019-04-15');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `FIO` varchar(50) NOT NULL,
  `Otdel` varchar(50) NOT NULL,
  `Doljnost` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `FIO`, `Otdel`, `Doljnost`, `username`, `password`) VALUES
(1, 'Ненашев Сергей Павлович', 'Дорожное строительство', 'Дорожный мастер', 'nenashev_drsu', '123'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Индексы таблицы `orrder`
--
ALTER TABLE `orrder`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `putevki`
--
ALTER TABLE `putevki`
  ADD PRIMARY KEY (`номер путевки`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orrder`
--
ALTER TABLE `orrder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `putevki`
--
ALTER TABLE `putevki`
  MODIFY `номер путевки` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `autos` (`id_auto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
