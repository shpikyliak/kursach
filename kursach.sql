-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:8889
-- Время создания: Дек 18 2015 г., 21:46
-- Версия сервера: 5.5.42
-- Версия PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursach`
--

-- --------------------------------------------------------

--
-- Структура таблицы `defect`
--

CREATE TABLE `defect` (
  `id_defect` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_defect_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `defect`
--

INSERT INTO `defect` (`id_defect`, `id_plan`, `id_defect_type`, `amount`) VALUES
(2, 1, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `defect_type`
--

CREATE TABLE `defect_type` (
  `id_defect_type` int(11) NOT NULL,
  `defect_type` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `defect_type`
--

INSERT INTO `defect_type` (`id_defect_type`, `defect_type`) VALUES
(1, 'технічний'),
(2, 'вина робочого'),
(3, 'неякісна сировина');

-- --------------------------------------------------------

--
-- Структура таблицы `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(8) NOT NULL,
  `date` date DEFAULT NULL,
  `amount_to_develop` int(8) DEFAULT NULL,
  `id_style` int(2) DEFAULT NULL,
  `id_size` int(2) DEFAULT NULL,
  `manufactured` int(8) NOT NULL,
  `id_worker` int(8) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `plan`
--

INSERT INTO `plan` (`id_plan`, `date`, `amount_to_develop`, `id_style`, `id_size`, `manufactured`, `id_worker`) VALUES
(1, '2011-11-20', 20, 2, 3, 15, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id_size`, `size`) VALUES
(1, 210),
(2, 215),
(3, 220),
(4, 225),
(5, 230),
(6, 235),
(7, 240);

-- --------------------------------------------------------

--
-- Структура таблицы `style`
--

CREATE TABLE `style` (
  `id_style` int(11) NOT NULL,
  `style` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `style`
--

INSERT INTO `style` (`id_style`, `style`) VALUES
(1, '5828-у1   '),
(2, '58283-у2  '),
(3, '311124-у3'),
(4, '38884-1   ');

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `id_worker` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf16 NOT NULL,
  `second_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`id_worker`, `name`, `second_name`) VALUES
(1, 'Тарас', 'Швирид'),
(2, 'Сергій', 'Приходько'),
(3, 'Ігор', 'Васеньов'),
(4, 'Денис', 'Науменко');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`id_defect`),
  ADD KEY `id_defect_type` (`id_defect_type`),
  ADD KEY `id_plan` (`id_plan`);

--
-- Индексы таблицы `defect_type`
--
ALTER TABLE `defect_type`
  ADD PRIMARY KEY (`id_defect_type`);

--
-- Индексы таблицы `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`),
  ADD KEY `id_style` (`id_style`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_worker` (`id_worker`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Индексы таблицы `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id_style`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id_worker`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `defect`
--
ALTER TABLE `defect`
  MODIFY `id_defect` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `defect_type`
--
ALTER TABLE `defect_type`
  MODIFY `id_defect_type` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `style`
--
ALTER TABLE `style`
  MODIFY `id_style` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `defect`
--
ALTER TABLE `defect`
  ADD CONSTRAINT `defect_ibfk_1` FOREIGN KEY (`id_defect_type`) REFERENCES `defect_type` (`id_defect_type`),
  ADD CONSTRAINT `defect_ibfk_2` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`);

--
-- Ограничения внешнего ключа таблицы `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`id_style`) REFERENCES `style` (`id_style`),
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  ADD CONSTRAINT `plan_ibfk_3` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
