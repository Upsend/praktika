-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 04 2019 г., 22:34
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
(1, '1', 'Р373ХВ 56', 'УАЗ 455'),
(2, '3', 'о111оо56', 'КАМАЗ 255'),
(3, '4', 'Р781ОТ56', 'ЗИЛ 874 21 '),
(4, '5', 'Т019ЛП56', 'ГАЗ 200 01 ');

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
(1, '1', 'ИвановИванИванович', '52147989', 'B,C,CE', 1),
(2, '2', 'ПетровПетрПетрович', '2022535', 'В С', 2),
(4, '3', 'АндреевАнатолийСеменович', '6789557', 'В,С,Е', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE `objects` (
  `id_оъекта` int(11) NOT NULL,
  `объект` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`id_оъекта`, `объект`) VALUES
(2, 'ул. Молодежная'),
(3, 'ул. Набережная '),
(4, 'ул. Транспортная '),
(5, 'ул. Соловьева'),
(6, 'ул. Фабричная'),
(7, 'ул. Устюженское шоссе'),
(8, 'ул. 8 Марта'),
(9, 'ул. Чкалова');

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
(2, 'ИвановИванИванович', '52147989', 'B,C,CE', '1', 'P373XB', '1', 'УАЗ', '2019-04-15'),
(3, 'ИвановИванИванович', '52147989', 'B,C,CE', '1', 'P373XB', '1', 'УАЗ', '2019-04-18'),
(4, 'АндреевАнатолийСеменович', '6789557', 'В,С,Е', '3', 'Р781ОТ56', '4', 'ЗИЛ', '2019-06-04'),
(5, 'ИвановИванИванович', '52147989', 'B,C,CE', '1', 'Р373ХВ', '1', 'УАЗ', '2019-06-19'),
(6, '', '', '', '', '', '', '', '0000-00-00'),
(7, 'ПетровПетрПетрович', '2022535', 'В', '2', 'о111оо56', '3', 'КАМАЗ', '2019-06-11');

-- --------------------------------------------------------

--
-- Структура таблицы `remont`
--

CREATE TABLE `remont` (
  `id_записи` int(11) NOT NULL,
  `Объект` varchar(100) NOT NULL,
  `Тип_ремонта` varchar(100) NOT NULL,
  `Расстояние (м)` varchar(20) NOT NULL,
  `Дата` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `remont`
--

INSERT INTO `remont` (`id_записи`, `Объект`, `Тип_ремонта`, `Расстояние (м)`, `Дата`) VALUES
(1, 'ул. Молодежная ', 'Ямочный ремонт', '875', '2018-04-12'),
(2, 'ул. Набережная ', 'Ямочный ремонт', '500', '2017-04-12'),
(3, 'ул. Транспортная ', 'Ремонт гравийных участков дорог', '235', '2017-03-07'),
(4, 'ул. Соловьева', 'Ремоннт грунтовых автомобильных дорог', '590', '2017-07-20'),
(5, 'ул. Фабричная', 'В рамках гарантийных обязательств', '50', '2019-06-27'),
(6, 'ул. Устюженское шоссе', 'По муниципальному контракту', '700', '2017-09-07'),
(7, 'ул. 8 Марта', 'В рамках гарантийных обязательств', '150', '2019-05-27');

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
(1, 'Ненашев Сергей Павлович', 'Дорожное строительство', 'Инжинер-нарядчик', 'nenashev_drsu', '123'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin'),
(7, 'Головин Анатолий Иванович', 'Дорожное строительство', 'Главный инженер', 'golovindrsu@mail.com', '3333');

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
-- Индексы таблицы `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id_оъекта`);

--
-- Индексы таблицы `putevki`
--
ALTER TABLE `putevki`
  ADD PRIMARY KEY (`номер путевки`);

--
-- Индексы таблицы `remont`
--
ALTER TABLE `remont`
  ADD PRIMARY KEY (`id_записи`);

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
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `objects`
--
ALTER TABLE `objects`
  MODIFY `id_оъекта` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `putevki`
--
ALTER TABLE `putevki`
  MODIFY `номер путевки` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `remont`
--
ALTER TABLE `remont`
  MODIFY `id_записи` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
