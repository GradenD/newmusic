-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 30 2023 г., 20:02
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bacharev_music`
--

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE `album` (
  `id` int NOT NULL,
  `tytle` varchar(255) NOT NULL,
  `autor` int NOT NULL,
  `listening` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `new` bit(1) NOT NULL,
  `indexPage` bit(1) NOT NULL,
  `music_autor` varchar(1000) NOT NULL,
  `music_profile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id`, `tytle`, `autor`, `listening`, `img`, `date`, `new`, `indexPage`, `music_autor`, `music_profile`) VALUES
(1, 'Great Depression', 1, 100, '/images/albums/great.jpg', '2020-12-20', b'0', b'0', '1,3', ''),
(2, '3D19', 2, 150, '/images/albums/3d.jpg', '2020-12-20', b'1', b'0', '9', ''),
(3, 'ICE CREAM', 2, 377, '/images/albums/ice.jpg', '2020-12-20', b'0', b'0', '9', ''),
(4, 'FILES', 2, 666, '/images/albums/files.jpg', '2020-12-20', b'1', b'0', '6', ''),
(5, 'Use Me', 8, 1111, '/images/albums/use.jpg', '2020-12-20', b'0', b'0', '', ''),
(6, 'White Noise', 8, 153, '/images/albums/white.jpg', '2020-12-20', b'0', b'0', '', ''),
(7, 'All We Know Of Heaven, All We Need Of Hell', 8, 3234, '/images/albums/all-we.jpg', '2020-12-20', b'0', b'0', '', ''),
(8, 'знаки зодиака Ч. 2', 9, 543, '/images/albums/znak.jpg', '2020-12-20', b'0', b'1', '', ''),
(9, '53:55', 9, 33, '/images/albums/53_55.jpg', '2020-12-20', b'0', b'0', '', ''),
(10, 'Убегу', 9, 66, '/images/albums/run.jpg', '2020-12-20', b'0', b'0', '', ''),
(11, 'Интернет-принц', 9, 373, '/images/albums/internet.jpg', '2020-12-20', b'0', b'0', '', ''),
(12, 'New Empire, Vol. 2', 7, 377, '/images/albums/new2.jpeg', '2020-12-20', b'0', b'0', '', ''),
(13, 'New Empire, Vol. 1', 7, 88, '/images/albums/new1.jpg', '2020-12-20', b'0', b'0', '', ''),
(14, 'Five', 7, 87, '/images/albums/five.jpg', '2020-12-20', b'0', b'1', '', ''),
(15, 'Day Of The Dead', 7, 333, '/images/albums/day.jpg', '2020-12-20', b'0', b'0', '', ''),
(16, 'MIRRORS', 4, 1356, '/images/albums/mirror.jpg', '2020-12-20', b'0', b'1', '', ''),
(17, 'One More City', 10, 555, '/images/albums/lcp.jpg', '2020-12-20', b'0', b'1', '', ''),
(18, 'Unleashed', 11, 1577, '/images/albums/unleashed.jpg', '2020-12-20', b'0', b'0', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `album_user`
--

CREATE TABLE `album_user` (
  `id` int NOT NULL,
  `tytle` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `user` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `music_autor` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `music_profile` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `album_user`
--

INSERT INTO `album_user` (`id`, `tytle`, `autor`, `user`, `img`, `music_autor`, `music_profile`) VALUES
(2, 'тест', 'Chase Atlantic', 1, '/upload/img/music/Nastoyashhuyu-4-800x445.jpg', '3', ''),
(3, 'тест2', 'Hikiray', 1, '/upload/img/music/bf1abdf705b79d1042f4864688b46e71.1000x1000x1.jpg', '9,3', ''),
(4, 'тест', 'Chase Atlantic', 10, '/upload/img/music/768f109f0f2a6bc0ca4f8521ddc823a0.1000x1000x1.png', NULL, '19'),
(5, 'тест2', 'тестовый2', 10, '/upload/img/music/Nastoyashhuyu-4-800x445.jpg', '7', '20'),
(6, 'тест', '', 1, '/upload/img/music/', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Markul'),
(2, 'OBLADAET'),
(3, 'Beau Young Prince '),
(4, 'MARKUSPHOENIX '),
(5, 'Mnogoznaal'),
(6, 'Pharaoh'),
(7, 'Hollywood Undead'),
(8, 'PVRIS'),
(9, 'Егор Натс'),
(10, 'ЛСП'),
(11, 'skillet');

-- --------------------------------------------------------

--
-- Структура таблицы `instagram`
--

CREATE TABLE `instagram` (
  `id` int NOT NULL,
  `tytle` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `instagram`
--

INSERT INTO `instagram` (`id`, `tytle`, `img`, `date`) VALUES
(1, 'monogozanaal', 'mnogo.jpg', '2020-12-18 09:22:27'),
(2, 'pharaoh', 'pharaoh.jpg', '2020-12-18 09:22:52'),
(3, 'pvris', 'pvris.jpg', '2020-12-18 09:23:29'),
(4, 'skillet', 'skillet.jpg', '2020-12-18 09:26:10'),
(5, 'obla', 'obla.jpg', '2020-12-18 09:28:28'),
(6, 'markul', 'markul.jpg', '2020-12-18 09:29:05');

-- --------------------------------------------------------

--
-- Структура таблицы `music_autor`
--

CREATE TABLE `music_autor` (
  `id` int NOT NULL,
  `tytle` varchar(255) NOT NULL,
  `autor` int NOT NULL,
  `listening` int DEFAULT NULL,
  `mp3` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `music_autor`
--

INSERT INTO `music_autor` (`id`, `tytle`, `autor`, `listening`, `mp3`, `img`) VALUES
(1, 'Скалы', 1, 456, '/upload/music/Markul - Скалы.mp3', '/upload/img/music/masrk-skall.jpg'),
(2, '3D19', 2, 987, '/upload/music/Obladaet - 3D19.mp3', '/upload/img/music/obladaet.jpg'),
(3, 'B.I.D', 1, 150, '/upload/music/Markul - B.I.D.mp3', '/upload/img/music/markul.jpg'),
(4, 'Mirrors', 4, 1111, '/upload/music/MARKUSPHOENIX - Mirrors.mp3', '/upload/img/music/markus.jpg'),
(5, 'Речная Часть', 5, 1577, '/upload/music/Mnogoznaal - Речная Часть.mp3', '/upload/img/music/mnogo.jpg'),
(6, 'Let Go', 3, 988, '/upload/music/Beau Young Prince - Let Go.mp3', '/upload/img/music/let-go.jpg'),
(7, 'На Луне', 6, 333, '/upload/music/Pharaoh - На Луне.mp3', '/upload/img/music/pharaoh_lune.jpg'),
(8, 'Coming Home', 7, 266, '/upload/music/Hollywood Undead - Coming Home.mp3', '/upload/img/music/hollywood.jpg'),
(9, 'Wish You Well', 8, 999, '/upload/music/PVRIS - Wish You Well.mp3', '/upload/img/music/pvris.jpg'),
(10, 'You and I', 8, 1234, '/upload/music/Pvris - You and I.mp3', '/upload/img/music/pvris-you.jpg'),
(14, 'Fata Morgana', 11, NULL, '/upload/music/Markul feat. Oxxxymiron – Fata Morgana.mp3', '/upload/img/music/768f109f0f2a6bc0ca4f8521ddc823a0.1000x1000x1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `music_profile`
--

CREATE TABLE `music_profile` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'audio-defoult.jpg',
  `tytle` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `listening` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `music_profile`
--

INSERT INTO `music_profile` (`id`, `user`, `url`, `img`, `tytle`, `autor`, `date`, `listening`) VALUES
(16, 1, '/upload/music/Hikiray - Sad Side.mp3', '/upload/img/music/953584649385e6e555f1206c9168f3b7.1000x1000x1.jpg', 'Sad Side', 'Hikiray', '2023-07-29 15:41:08', 0),
(17, 1, '/upload/music/Loli', '/upload/img/music/bf1abdf705b79d1042f4864688b46e71.1000x1000x1.jpg', 'Loli', 'MIDIX ', '2023-07-29 15:57:09', 0),
(18, 1, '/upload/music/Настоящую', '/upload/img/music/Nastoyashhuyu-4-800x445.jpg', 'Настоящую', 'Katya Tu', '2023-07-29 17:03:28', 0),
(19, 10, '/upload/music/FACE - Коттон.mp3', '/upload/img/music/artworks-X19Hfi4YOOloTCAH-XJMJNg-t500x500.jpg', 'Коттон', 'FACE', '2023-07-30 00:40:49', 0),
(20, 10, '/upload/music/Kill Paris feat. Royal - Operate (Illenium Remix).mp3', '/upload/img/music/953584649385e6e555f1206c9168f3b7.1000x1000x1.jpg', 'Operate', 'Kill Paris feat. Royal', '2023-07-30 02:12:11', 0),
(22, 11, '/upload/music/Nickelback - After The Rain [vzvuke.net].mp3', '/upload/img/music/b620b17be97677a36e6fee4da6227ee5.300x300x1.jpg', 'After The Rain', 'Nickelback', '2023-07-30 16:46:43', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news_glav`
--

CREATE TABLE `news_glav` (
  `id` int NOT NULL,
  `tytle` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news_glav`
--

INSERT INTO `news_glav` (`id`, `tytle`, `text`, `img`) VALUES
(1, '', 'cantus find the music your Choice & discover our new tracks. Connect directly with your favorite band member.', 'slide-1.jpg'),
(2, '', 'cantus find the music your Choice & discover our new tracks. Connect directly with your favorite band member.', 'slide-2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL DEFAULT 'Enter your Last Name',
  `phone` varchar(20) NOT NULL DEFAULT 'Enter your Phone',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Enter your Country',
  `skype` varchar(255) NOT NULL DEFAULT 'Enter your Skype',
  `instagram` varchar(255) NOT NULL DEFAULT 'Enter your Instagram',
  `role` int NOT NULL DEFAULT '2',
  `likeMusic` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `likeAlbum` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `phone`, `email`, `password`, `country`, `skype`, `instagram`, `role`, `likeMusic`, `likeAlbum`) VALUES
(1, 'Иван2', 'Бахарев', '89507260264', 'bacharevia@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Russian', 'live:.cid.d1924dba0ec65b2b', 'The Gallywix Community', 1, '7,8,6', '16,14,4'),
(3, 'Олежа', 'Олегович', '76776678', 'paxom.tema2@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Enter your Country 2', 'Enter your Skype 2', 'instagram 222', 2, '0', ''),
(4, 'bacharevia', 'Enter your Last Name', 'Enter your Phone', '1234@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Enter your Country', 'Enter your Skype', 'Enter your Instagram', 2, '0', ''),
(5, 'bacharevia', 'Enter your Last Name', 'Enter your Phone', 'bacharevia2@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Enter your Country', 'Enter your Skype', 'Enter your Instagram', 2, '0', ''),
(10, 'Тест', 'Enter your Last Name', 'Enter your Phone', 'bacharevia12312@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Enter your Country', 'Enter your Skype', 'Enter your Instagram', 2, '14', '2'),
(11, 'Тест', 'Enter your Last Name', 'Enter your Phone', 'test123123@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Enter your Country', 'Enter your Skype', 'Enter your Instagram', 2, NULL, NULL),
(12, 'Тест', 'Enter your Last Name', 'Enter your Phone', 'test34534@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Enter your Country', 'Enter your Skype', 'Enter your Instagram', 2, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Индексы таблицы `album_user`
--
ALTER TABLE `album_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `music_autor`
--
ALTER TABLE `music_autor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Индексы таблицы `music_profile`
--
ALTER TABLE `music_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `news_glav`
--
ALTER TABLE `news_glav`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `album`
--
ALTER TABLE `album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `album_user`
--
ALTER TABLE `album_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `instagram`
--
ALTER TABLE `instagram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `music_autor`
--
ALTER TABLE `music_autor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `music_profile`
--
ALTER TABLE `music_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `news_glav`
--
ALTER TABLE `news_glav`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `author` (`id`);

--
-- Ограничения внешнего ключа таблицы `album_user`
--
ALTER TABLE `album_user`
  ADD CONSTRAINT `album_user_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `music_autor`
--
ALTER TABLE `music_autor`
  ADD CONSTRAINT `music_autor_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `author` (`id`);

--
-- Ограничения внешнего ключа таблицы `music_profile`
--
ALTER TABLE `music_profile`
  ADD CONSTRAINT `music_profile_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
