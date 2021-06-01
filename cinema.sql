-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2021 г., 00:58
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `poster` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `director_id` int(10) UNSIGNED NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `name`, `description`, `poster`, `release_date`, `director_id`, `duration`, `trailer_url`, `created_at`) VALUES
(1, 'Skyfall: Quantum of Spectre', 'Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth\'s mightiest heroes must come together once again to protect the world from global extinction.', '/images/uploads/movie-single.jpg', '2015-05-01', 6, 141, 'https://www.youtube.com/embed/o-0hcF97wy0', '2021-05-17 18:59:19'),
(2, 'Marriage Story', 'Marriage Story is a 2019 British-American drama film written and directed by Noah Baumbach, who produced the film with David Heyman. It stars Scarlett Johansson and Adam Driver, with Laura Dern, Alan Alda, Ray Liotta, Julie Hagerty, and Merritt Wever in supporting roles. The film follows a married couple, an actress and a stage director (Johansson and Driver), going through a coast-to-coast divorce. ', '/images/uploads/MarriageStoryPoster.png', '2019-11-15', 7, 136, '', '2021-05-19 20:56:45'),
(3, 'Форсаж 9', 'Доминик Торетто ведет спокойную жизнь вместе с Летти и своим сыном Брайаном, однако, они знают, что новая опасность всегда где-то рядом. В этот раз Доминику придется встретиться с призраками прошлого, если он хочет спасти самых близких. Команда снова собирается вместе, чтобы предотвратить дерзкий план по захвату мира, который придумал самый опасный преступник и безбашенный водитель из всех, с кем они сталкивались ранее. Ситуация усложняется тем, что этот человек — брат Доминика Джейкоб, которого много лет назад изгнали из семьи.', '/images/uploads/fast-and-furious.webp', '2021-05-19', 1, 145, '', '2021-05-19 20:02:52');

-- --------------------------------------------------------

--
-- Структура таблицы `films_actors`
--

CREATE TABLE `films_actors` (
  `film_id` int(10) UNSIGNED NOT NULL,
  `human_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films_actors`
--

INSERT INTO `films_actors` (`film_id`, `human_id`) VALUES
(1, 1),
(1, 2),
(2, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `films_genres`
--

CREATE TABLE `films_genres` (
  `film_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films_genres`
--

INSERT INTO `films_genres` (`film_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `title`) VALUES
(1, 'Action'),
(2, 'Sci-Fi'),
(3, 'Adventure'),
(4, 'Dramas');

-- --------------------------------------------------------

--
-- Структура таблицы `humans`
--

CREATE TABLE `humans` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `humans`
--

INSERT INTO `humans` (`id`, `name`, `photo`) VALUES
(1, 'Robert Downey Jr.', '/images/uploads/cast1.jpg'),
(2, 'Chris Hemsworth', '/images/uploads/cast2.jpg'),
(3, 'Scarlett Johansson', ''),
(4, 'Adam Driver', ''),
(5, 'Laura Dern', ''),
(6, 'Joss Whedon', ''),
(7, 'Noah Baumbach', '');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `started_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `film_id`, `started_at`) VALUES
(1, 3, '2021-06-01 12:15:00');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions_reservations`
--

CREATE TABLE `sessions_reservations` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `row` int(10) UNSIGNED NOT NULL,
  `seat` int(10) UNSIGNED NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions_reservations`
--

INSERT INTO `sessions_reservations` (`session_id`, `row`, `seat`, `phone`) VALUES
(1, 1, 14, '+79178803550'),
(1, 1, 15, '+79178803550'),
(1, 1, 18, '+79178803550'),
(1, 2, 17, '+79178803550');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `privilege`) VALUES
(1, 'admin', 'admin', 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_ibfk_1` (`director_id`);

--
-- Индексы таблицы `films_actors`
--
ALTER TABLE `films_actors`
  ADD UNIQUE KEY `unique_pair` (`film_id`,`human_id`),
  ADD KEY `actor_id` (`human_id`);

--
-- Индексы таблицы `films_genres`
--
ALTER TABLE `films_genres`
  ADD UNIQUE KEY `unique_pair` (`film_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `humans`
--
ALTER TABLE `humans`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_session` (`film_id`,`started_at`);

--
-- Индексы таблицы `sessions_reservations`
--
ALTER TABLE `sessions_reservations`
  ADD UNIQUE KEY `film_position` (`session_id`,`row`,`seat`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `humans`
--
ALTER TABLE `humans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `films_actors`
--
ALTER TABLE `films_actors`
  ADD CONSTRAINT `films_actors_ibfk_1` FOREIGN KEY (`human_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `films_actors_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `films_genres`
--
ALTER TABLE `films_genres`
  ADD CONSTRAINT `films_genres_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `films_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sessions_reservations`
--
ALTER TABLE `sessions_reservations`
  ADD CONSTRAINT `sessions_reservations_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
