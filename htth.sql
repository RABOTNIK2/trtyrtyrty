-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 20 2023 г., 11:31
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
(11, 'rhthth', 'thhththtyte', '2023-08-19', 24),
(12, 'rtytey5ty', 'rtyrtyrtyrt', '2023-08-19', 24),
(13, 'hyrthethrt', 'hrthtrhrththr', '2023-08-20', 24);

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
(41, 'апеаеррее', 'ерсерсерсерсрес', 'ермерсресрсерес', '1647174466_38-vsegda-pomnim-com-p-reka-les-foto-41.jpg', '2023-08-19', 24),
(42, 'gthrttrt', 'rthrtrtrtth', 'rtrtrtrtrthrth', '8b370cfce4e735c83f97aaf8e7260597.jpg', '2023-08-19', 24),
(43, 'реккекекке', 'еккеркеркере', 'рекрекркерекрк', '1647174466_38-vsegda-pomnim-com-p-reka-les-foto-41 (1).jpg', '2023-08-20', 24),
(46, 'укекенеккн', 'укекенеккнукекенеккн', 'укекенеккнукекенеккнукекенеккн', 'png-clipart-pancake-pancake.png', '2023-08-20', 28),
(47, 'рерккркркнр', 'рерккркркнррерккркркнр', 'рерккркркнррерккркркнррерккркркнр', '0_1425034615.jpg', '2023-08-20', 28);

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
(19, 'jttjtjj', '$2y$10$q/s1sZAbwxurd3i6bNmVou4kUj9ASQlH3et1vH1PyjmuBMdnnO7V2', 'jttjtjj@digifjij', 77, '0_1425034615.jpg'),
(20, 'rjjyrjyryj111', '$2y$10$tYxMWgk5d1dIE0aRokzuPODca8NH3xIifzr7METpFlKed43Ch/XIC', 'gandon3365@grf55', 33, 'i (4).webp'),
(24, 'аериререер', '$2y$10$ZdHHqKqjBxhzSS.xni8wK.2Wyg2hDyUTkP9uQW3BS/zxWRlBMEMy6', NULL, 18, 'dummy-profile-image-male.jpg'),
(28, 'пкпкпкпкпк', '$2y$10$GV58WfB71uWHqoNbBdKPYuIKDMSBp3p0mjO59QA3AVN6XlG9VfZ1S', NULL, 18, 'dummy-profile-image-male.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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