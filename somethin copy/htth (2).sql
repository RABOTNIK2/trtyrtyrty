-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 23 2023 г., 14:28
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `htth`
--

-- --------------------------------------------------------

--
-- Структура таблицы `argue`
--

CREATE TABLE `argue` (
  `id` int(11) NOT NULL,
  `oglavlenie` varchar(32) NOT NULL,
  `poema` text NOT NULL,
  `datee` date DEFAULT NULL,
  `user_id_arg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `argue`
--

INSERT INTO `argue` (`id`, `oglavlenie`, `poema`, `datee`, `user_id_arg`) VALUES
(14, 'grghrhrhrh', 'hrrhhrrhhrrhrhrhrhrthtj', '2023-08-21', 30),
(15, 'grhrhtjrjryjy', 'tjtyjyrhyrhth', '2023-08-21', 30),
(16, 'httjtrjttjt', 'httjtrjttjt', '2023-08-21', 30),
(17, 'httjtrjttjthttjtrjttjt', 'httjtrjttjthttjtrjttjt', '2023-08-21', 30),
(18, 'ерреккреркр', 'рекрекрекрекрке', '2023-08-23', 31);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `prenadlecit` int(11) NOT NULL,
  `user_id_comm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `content`, `prenadlecit`, `user_id_comm`) VALUES
(29, 'hthtrhrhrhrttjr', 14, 31),
(30, 'tjytjytjjyjtjtyjy', 14, 31),
(31, 'еококекеко', 15, 31),
(32, 'еоекокоенонео', 15, 31),
(33, 'ееререуреркекрк', 16, 31),
(34, 'керрекререкекр', 16, 31),
(35, 'ререекоекоекокееко', 17, 31),
(36, 'окнокононконок', 17, 31),
(37, 'руеркреккрерке', 18, 31),
(38, 'реркрекеркрекрек', 18, 31);

-- --------------------------------------------------------

--
-- Структура таблицы `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `zagalovok` varchar(32) NOT NULL,
  `incridients` text NOT NULL,
  `cookin_steps` text NOT NULL,
  `photo` varchar(10000) DEFAULT '1678950008_papik-pro-p-klassnie-risunki-iz-yedi-15.jpg',
  `datee` date DEFAULT NULL,
  `users_id_pub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `publication`
--

INSERT INTO `publication` (`id`, `zagalovok`, `incridients`, `cookin_steps`, `photo`, `datee`, `users_id_pub`) VALUES
(50, 'rgreehthhtrthrhtr', 'rgreehthhtrthrhtr', 'rgreehthhtrthrhtr', '1663865857_34-mykaleidoscope-ru-p-iziskannie-blyuda-yeda-krasivo-44.jpg', '2023-08-21', 30),
(51, 'rgehtrht', 'trrthrty', 'trhgtrhrrthrt', '1677730811_2-3.jpg', '2023-08-21', 30),
(52, 'Азу по-домашнему', 'Говядина — 500 г Картофель — 1 кг Лук репчатый — 2 шт Огурец соленый — 2 шт Томатная паста — 70 г Чеснок — 3 зуб. Лист лавровый — 4 шт Орех мускатный — 1 ч. л. Куркума — 1 ч. л. Соль — 2 ч. л. Масло растительное — 1 ст. л.', 'Как приготовить азу по-татарски? Говядину промываем и нарезаем тонкими полосками. Важно резать мясо против волокон. Обжариваем в казане на растительном масле. ', 'i.webp', '2023-08-23', 31);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(16) DEFAULT NULL,
  `age` int(11) DEFAULT 18,
  `photoshop` varchar(1000) NOT NULL DEFAULT 'dummy-profile-image-male.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `age`, `photoshop`) VALUES
(30, 'Бабуля Николавна22', '$2y$10$/0ML5lOU6WO.ESYmkkWXNuQ5d2GkadQNCprlNaDVv1ER7hihmGxxi', 'rrerhrrhr@54b4u6', 70, '1649921183_32-kartinkof-club-p-rzhachnie-kartinki-starie-babki-33.jpg'),
(31, 'Королина22', '$2y$10$Hxls5VkzltGEGR8nz3vx9ezUbhMHBzFaQ/t/FKNpn01nIRm/Vzgw.', 'korolina@666', 45, '1574061724_152223.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `argue`
--
ALTER TABLE `argue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_arg` (`user_id_arg`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`prenadlecit`),
  ADD KEY `user_id_comm` (`user_id_comm`);

--
-- Индексы таблицы `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id_pub` (`users_id_pub`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `argue`
--
ALTER TABLE `argue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `argue`
--
ALTER TABLE `argue`
  ADD CONSTRAINT `argue_ibfk_1` FOREIGN KEY (`user_id_arg`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`prenadlecit`) REFERENCES `argue` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id_comm`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`users_id_pub`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
