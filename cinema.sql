-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2021 г., 14:10
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
(3, 'The Walk', 'Американский исторический фильм о французском канатоходце Филиппе Пети, снятый режиссёром Робертом Земекисом. В центре сюжета — предпринятый французом в 1974 году проход по канату, натянутому между Башнями-Близнецами Всемирного торгового центра. Роль Пети исполнил Джозеф Гордон-Левитт. Сценарий написан Земекисом в соавторстве с Кристофером Брауном и основан на книге Пети «Достать до облаков». В североамериканский прокат фильм вышел 30 сентября 2015 года.', '/images/uploads/mv-item4.jpg', '2015-10-15', 1, 123, 'https://www.youtube.com/watch?v=GR1EmTKAWIw', '2021-05-19 20:02:52'),
(4, 'Oblivion', 'Американский фантастический боевик режиссёра Джозефа Косински по одноимённому неопубликованному графическому роману. В главных ролях — Том Круз, Ольга Куриленко, Андреа Райсборо, Морган Фримен, Мелисса Лео, Зои Белл и Николай Костер-Вальдау. Джозеф Косински написал сценарий, спродюсировал и выступил в качестве режиссёра фильма.', '/images/uploads/mv-it1.jpg', '2013-04-11', 5, 127, 'https://www.youtube.com/watch?v=dbEiZnBFSYk', '2021-06-02 11:01:03'),
(5, 'The Forest', 'Сюжет разворачивается в лесу Аокигахара, реально существующем у Северо-Западного подножия горы Фудзияма в Японии. Сара Прайс (Натали Дормер), молодая американка, получает звонок из полиции Японии, в котором ей сообщают, что её сестра-близнец Джесс, работающая учительницей английского языка в токийской школе, пропала в лесу Аокигахара (который имеет нехорошую славу, поскольку в нём каждый год случаются десятки самоубийств). Поскольку с момента её исчезновения прошло уже несколько дней, полиция уверена, что Джесс уже мертва. Сара отказывается в это верить, так как, будучи её близнецом, она продолжает чувствовать её душу. Не обращая внимания на предостережение своего бойфренда Роба (Оуэн Маккен), девушка прилетает в Японию, дав слово, что вернётся через несколько дней.', '/images/uploads/mv-it5.jpg', '2016-01-14', 7, 95, 'https://www.youtube.com/watch?v=4-esgPQVhic', '2021-06-02 11:03:55');

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
(2, 7),
(3, 5),
(3, 7),
(4, 4),
(4, 6),
(4, 7),
(5, 1),
(5, 2),
(5, 3);

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
(3, 1),
(4, 1),
(4, 2),
(4, 3),
(5, 3),
(5, 4);

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
(1, 3, '2021-06-01 12:15:00'),
(2, 3, '2021-06-03 12:10:00'),
(3, 3, '2021-06-04 10:00:00');

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
(1, 2, 17, '+79178803550'),
(3, 1, 1, '+79178803550'),
(3, 1, 2, '+79178803550'),
(3, 1, 3, '+79178803550'),
(3, 1, 4, '+79178803550');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
