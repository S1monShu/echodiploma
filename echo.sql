-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2024 г., 18:33
-- Версия сервера: 8.0.24
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `echo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favourite_songs`
--

CREATE TABLE `favourite_songs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favourite_songs`
--

INSERT INTO `favourite_songs` (`id`, `user_id`, `song_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(2, 1, 2, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(3, 1, 30, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(4, 1, 32, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(5, 1, 22, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(6, 1, 12, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(7, 2, 10, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(8, 2, 11, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(9, 2, 12, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(10, 2, 13, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(11, 2, 28, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(12, 3, 19, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(13, 3, 29, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(14, 3, 22, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(15, 3, 20, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(16, 3, 33, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(17, 3, 25, '2024-04-17 07:39:41', '2024-04-17 07:39:41'),
(18, 3, 34, '2024-04-20 10:45:39', '2024-04-20 10:45:39');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` double NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `title`, `popularity`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Поп-музыка', 97, 'http://127.0.0.1:8000/storage/genres/POP.png', '2024-04-17 07:16:30', '2024-04-17 07:16:30'),
(2, 'Электроника', 84, 'http://127.0.0.1:8000/storage/genres/ELECTRO.png', '2024-04-17 07:16:30', '2024-04-17 07:16:30'),
(3, 'Танцевальная', 15, 'http://127.0.0.1:8000/storage/genres/DANCE.png', '2024-04-17 07:16:31', '2024-04-17 07:16:31'),
(4, 'Хип-хоп', 56, 'http://127.0.0.1:8000/storage/genres/HIP-HOP.png', '2024-04-17 07:16:31', '2024-04-17 07:16:31'),
(5, 'Русский рок', 68, 'http://127.0.0.1:8000/storage/genres/ROCK.png', '2024-04-17 07:16:31', '2024-04-17 07:16:31'),
(6, 'Легкая музыка', 96, 'http://127.0.0.1:8000/storage/genres/LIGHT.png', '2024-04-17 07:16:31', '2024-04-17 07:16:31');

-- --------------------------------------------------------

--
-- Структура таблицы `genre_songs`
--

CREATE TABLE `genre_songs` (
  `id` bigint UNSIGNED NOT NULL,
  `genre_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genre_songs`
--

INSERT INTO `genre_songs` (`id`, `genre_id`, `song_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(2, 1, 2, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(3, 1, 3, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(4, 1, 4, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(5, 1, 5, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(6, 1, 6, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(7, 1, 7, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(8, 1, 8, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(9, 1, 9, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(10, 1, 10, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(11, 1, 11, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(12, 1, 12, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(13, 2, 13, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(14, 2, 14, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(15, 2, 15, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(16, 2, 16, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(17, 2, 17, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(18, 2, 18, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(19, 2, 19, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(20, 2, 20, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(21, 3, 21, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(22, 3, 22, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(23, 3, 23, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(24, 4, 24, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(25, 4, 25, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(26, 4, 26, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(27, 4, 27, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(28, 5, 28, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(29, 5, 29, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(30, 5, 30, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(31, 5, 31, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(32, 6, 32, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(33, 6, 33, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(34, 6, 34, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(35, 6, 35, '2024-04-17 07:16:39', '2024-04-17 07:16:39'),
(36, 6, 36, '2024-04-17 07:16:39', '2024-04-17 07:16:39');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_26_100144_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_26_071306_create_genres_table', 1),
(7, '2023_04_26_071301_create_songs_table', 1),
(8, '2023_04_26_071545_create_genre_songs_table', 1),
(9, '2023_04_26_101900_create_user_songs_table', 1),
(10, '2023_05_11_165253_create_favourite_songs_table', 1),
(11, '2024_04_09_132311_create_playlists_table', 1),
(12, '2024_04_09_155004_create_user_playlist_table', 1),
(13, '2024_04_09_171050_create_playlist_song', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `playlists`
--

INSERT INTO `playlists` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Первый', 'img', '2024-04-17 07:17:07', '2024-04-17 07:17:07');

-- --------------------------------------------------------

--
-- Структура таблицы `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `id` bigint UNSIGNED NOT NULL,
  `playlist_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `playlist_songs`
--

INSERT INTO `playlist_songs` (`id`, `playlist_id`, `song_id`, `created_at`, `updated_at`) VALUES
(3, 1, 3, '2024-04-17 07:17:36', '2024-04-17 07:17:36'),
(7, 1, 13, '2024-04-20 11:45:22', '2024-04-20 11:45:22'),
(9, 1, 8, '2024-04-20 11:46:00', '2024-04-20 11:46:00'),
(10, 1, 27, '2024-04-20 11:48:06', '2024-04-20 11:48:06');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'user', '2024-04-17 07:16:30', '2024-04-17 07:16:30'),
(2, 'artist', '2024-04-17 07:16:30', '2024-04-17 07:16:30'),
(3, 'admin', '2024-04-17 07:16:30', '2024-04-17 07:16:30');

-- --------------------------------------------------------

--
-- Структура таблицы `songs`
--

CREATE TABLE `songs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_application` tinyint(1) NOT NULL,
  `agree_application` tinyint(1) NOT NULL,
  `popularity` int NOT NULL DEFAULT '0',
  `song_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `songs`
--

INSERT INTO `songs` (`id`, `title`, `is_application`, `agree_application`, `popularity`, `song_url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Угонщица', 0, 1, 92, 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-Угонщица.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-Угонщица.jpg', '2024-04-17 07:16:34', '2024-04-17 07:16:34'),
(2, 'Любимый человек', 0, 1, 34, 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-ЛюбимыйЧеловек.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-ЛюбимыйЧеловек.jpg', '2024-04-17 07:16:34', '2024-04-17 07:16:34'),
(3, 'Не дружим', 0, 1, 51, 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-Недружим.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-Недружим.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(4, 'Москва-Сочи', 0, 1, 24, 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-Москва-Сочи.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-Недружим.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(5, 'Beverly Hills', 0, 1, 65, 'http://127.0.0.1:8000/storage/songs/source/Zivert-Beverly-Hills.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Life.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(6, 'Залипательно', 0, 1, 5, 'http://127.0.0.1:8000/storage/songs/source/Zivert-Залипательно.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Залипательно.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(7, 'Зеленые волны', 0, 1, 7, 'http://127.0.0.1:8000/storage/songs/source/Zivert-Зелёныеволны.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Зеленыеволны.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(8, 'LIFE', 0, 1, 82, 'http://127.0.0.1:8000/storage/songs/source/Zivert-Life.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Зеленыеволны.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(9, 'Позвони', 0, 1, 20, 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-Позвони.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-Позвони.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(10, 'CO2', 0, 1, 17, 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-CO2.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-CO2.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(11, 'Пятница', 0, 1, 28, 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-Пятница.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-Пятница.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(12, 'Беги', 0, 1, 24, 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-Беги.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-Беги.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(13, 'WOAH', 0, 1, 73, 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-WOAH.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-WOAH.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(14, 'SNEAKY', 0, 1, 9, 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-SNEAKY.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-WOAH.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(15, 'LIKE IT', 0, 1, 11, 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-Like_it.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-Like_it.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(16, 'ЯR', 0, 1, 33, 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-ЯR.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-ЯR.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(17, 'WAKANDA', 0, 1, 16, 'http://127.0.0.1:8000/storage/songs/source/Maga-WAKANDA.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Maga-WAKANDA.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(18, 'THOR', 0, 1, 57, 'http://127.0.0.1:8000/storage/songs/source/Maga-THOR.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Maga-THOR.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(19, 'BATMAN', 0, 1, 38, 'http://127.0.0.1:8000/storage/songs/source/Maga-BATMAN.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Maga-BATMAN.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(20, 'Notorious', 0, 1, 45, 'http://127.0.0.1:8000/storage/songs/source/Maga-Notorious.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Maga-Notorious.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(21, 'Relax', 0, 1, 7, 'http://127.0.0.1:8000/storage/songs/source/Junona_Boys-Relax.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Junona_Boys-Relax.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(22, 'Don\'t Be', 0, 1, 71, 'http://127.0.0.1:8000/storage/songs/source/Junona_Boys-Dont_Be.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Junona_Boys-Dont_Be.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(23, 'Faded', 0, 1, 72, 'http://127.0.0.1:8000/storage/songs/source/Junona_Boys-Faded.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Junona_Boys-Faded.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(24, 'Blinding Lights', 0, 1, 8, 'http://127.0.0.1:8000/storage/songs/source/Weeknd-Blinding_Lights.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(25, 'Save Your Tears', 0, 1, 72, 'http://127.0.0.1:8000/storage/songs/source/Weeknd-Save_Your_Tears.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(26, 'Starboy', 0, 1, 40, 'http://127.0.0.1:8000/storage/songs/source/Weeknd-Starboy.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(27, 'The Hills', 0, 1, 60, 'http://127.0.0.1:8000/storage/songs/source/Weeknd-The_Hills.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(28, 'Кукла колдуна', 0, 1, 55, 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Кукла_колдуна.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Кукла_колдуна.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(29, 'Лесник', 0, 1, 18, 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Лесник.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Лесник.jpg', '2024-04-17 07:16:35', '2024-04-17 07:16:35'),
(30, 'Ром', 0, 1, 6, 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Ром.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Ром.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(31, 'Джокер', 0, 1, 97, 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Джокер.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Ром.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(32, 'Wicked Game', 0, 1, 6, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Wicked_Game.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Wicked_Game.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(33, 'Falling in Love', 0, 1, 52, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Falling_in_Love.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Falling_in_Love.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(34, 'Life Will Go', 0, 1, 32, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Life_Will_Go.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(35, 'Always Got Tonight', 0, 1, 35, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Always_Got_Tonight.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(36, 'Nothing To Say', 0, 1, 21, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(37, 'May be', 1, 0, 59, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(38, 'Stay with me', 1, 0, 93, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(39, 'ANSWER', 1, 0, 93, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(40, 'NEW ASK', 1, 0, 83, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(41, 'Go to..', 1, 0, 54, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(42, 'New music', 0, 0, 65, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(43, 'Test Song', 0, 0, 26, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(44, 'Creating this', 0, 0, 34, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(45, 'And go.', 0, 0, 19, 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3', 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg', '2024-04-17 07:16:36', '2024-04-17 07:16:36');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `is_candidate` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_candidate`, `name`, `image`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Allogikal', 'http://[::1]:5173/storage/app/public/users/avatars/Allogikal.jpg', 'user@mail.ru', '2024-04-17 07:16:31', '$2y$10$lVtlGb2nS5FxExXZyGKhUOJzRVC/x.QWEwSPVbsu/uIraqWy1i4Wm', 1, 'SXlDycyZEe', '2024-04-17 07:16:31', '2024-04-21 10:09:47'),
(2, 0, 'ROOT', 'http://[::1]:5173/storage/app/public/users/avatars/ROOT.jpg', 'admin@mail.ru', '2024-04-17 07:16:31', '$2y$10$Mdyr7OPrkh2wVv425fcKxueQXly2PgJrph6cfLQnYbeCRR.mO98he', 3, '96lo1Kd2u4', '2024-04-17 07:16:31', '2024-04-17 07:16:31'),
(3, 0, 'МИЧЕЛЗ', 'http://[::1]:5173/storage/app/public/users/avatars/image 25.png', 'artist@mail.ru', '2024-04-17 07:16:31', '$2y$10$7txAd3/hKasbFJzMSq7fFe4O3yhQT2fSSI7fTCt6XubZiyp99qxVm', 2, 'W657U8TCKS', '2024-04-17 07:16:31', '2024-04-17 07:40:31'),
(4, 0, 'Zivert', 'http://[::1]:5173/storage/app/public/users/avatars/Zivert.jpg', 'zivertOf@mail.ru', '2024-04-17 07:16:32', '$2y$10$gBHwaO8auiplVg4BpCg2juSWbrzf2Efg3i8R71Dnn0FbjOhQpG57G', 2, 'cot0U1VXiX', '2024-04-17 07:16:32', '2024-04-17 07:16:32'),
(5, 0, 'DJ SMASH', 'http://[::1]:5173/storage/app/public/users/avatars/DJ_SMASH.jpg', 'dj_smash@mail.ru', '2024-04-17 07:16:32', '$2y$10$LxweC3.TmJj2rElANdHfRuGWoMVGzAQ.xsGaMkWNS2SRgdOMpCiXm', 2, 'uCfC1qmTRJ', '2024-04-17 07:16:32', '2024-04-17 07:16:32'),
(6, 0, 'WYR GEMI', 'http://[::1]:5173/storage/app/public/users/avatars/WYR_GEMI.jpg', 'wyrr_gemi@mail.ru', '2024-04-17 07:16:32', '$2y$10$O3FFtd9kC1M/5HRONwEqouVS/FXDVdXPLdpNWZx2D3vPl4Da.25O.', 2, 'HRZCiodgU4', '2024-04-17 07:16:32', '2024-04-17 07:16:32'),
(7, 0, 'MAGA', 'http://[::1]:5173/storage/app/public/users/avatars/MAGA.jpg', 'maga@mail.ru', '2024-04-17 07:16:32', '$2y$10$6pHRKUe8Z9eWwMExGpHO5uSivWu4/8QguXR135sZyEqr2gaNxXwjW', 2, 'fxyguAsY6c', '2024-04-17 07:16:32', '2024-04-17 07:16:32'),
(8, 0, 'Junona Boys', 'http://[::1]:5173/storage/app/public/users/avatars/JUNONA_BOYS.jpg', 'junona_boys@mail.ru', '2024-04-17 07:16:33', '$2y$10$o4ra8HLclZ1dksTu5YLQX.wQg3Zt5FVpVsX2q2EkDBJqOaw0pV/ie', 2, '0DMIDSeEq8', '2024-04-17 07:16:33', '2024-04-17 07:16:33'),
(9, 0, 'WEEKND', 'http://[::1]:5173/storage/app/public/users/avatars/WEEKND.jpg', 'the_weeknd@mail.ru', '2024-04-17 07:16:33', '$2y$10$CTp5Os/KFZgXafUN6L43mOVHuSVV.44VsZMRyZqYT3j0PqK6P0fcm', 2, 'gkQWFpIlS3', '2024-04-17 07:16:33', '2024-04-17 07:16:33'),
(10, 0, 'Король и Шут', 'http://[::1]:5173/storage/app/public/users/avatars/КОРОЛЬИШУТ.jpg', 'king@mail.ru', '2024-04-17 07:16:33', '$2y$10$yGc.NZS76TrZF0ZLoLUffOqObopyhIEvgc2DcNoLO45b6i5S..0Xy', 2, '0Rp9Sq2EJu', '2024-04-17 07:16:33', '2024-04-17 07:16:33'),
(11, 0, 'Chris Isaak', 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg', 'chris@mail.ru', '2024-04-17 07:16:33', '$2y$10$BwJ8b8qFoNB42/guV1cxa.ICImZ186ZRd/qemR2MwEjyvkS./A3oa', 2, 'xmXPmXpZA9', '2024-04-17 07:16:33', '2024-04-17 07:16:33'),
(12, 1, 'Robert D.S.', 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg', 'robert@mail.ru', '2024-04-17 07:16:33', '$2y$10$8jn23WH51BI7LGXL8bhS9O0OIr94rriRtwqVCyvDZdgLu8FZ.x6W6', 2, 'HCP7Job16X', '2024-04-17 07:16:33', '2024-04-17 07:16:33'),
(13, 1, 'New player', 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg', 'player@mail.ru', '2024-04-17 07:16:34', '$2y$10$u/48Z7iH2sr0lLOYx54FjON6WU9.nku.Tr/Oen.kabzWFu1cF3kQ2', 2, '9jvpgpOkYu', '2024-04-17 07:16:34', '2024-04-17 07:16:34'),
(14, 1, 'Cancel', 'http://[::1]:5173/storage/app/public/users/avatars/Chris_Isaak.jpg', 'cancel@mail.ru', '2024-04-17 07:16:34', '$2y$10$ItSidJxRzD.iKSn1VozIxuXvfeHORRLYwY/Gla3MhfT.X0irftkj6', 2, 'LpvQCW9JGU', '2024-04-17 07:16:34', '2024-04-17 07:16:34');

-- --------------------------------------------------------

--
-- Структура таблицы `user_playlists`
--

CREATE TABLE `user_playlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `playlist_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_playlists`
--

INSERT INTO `user_playlists` (`id`, `user_id`, `playlist_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-04-17 07:17:14', '2024-04-17 07:17:14');

-- --------------------------------------------------------

--
-- Структура таблицы `user_songs`
--

CREATE TABLE `user_songs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_songs`
--

INSERT INTO `user_songs` (`id`, `user_id`, `song_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(2, 3, 2, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(3, 3, 3, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(4, 3, 4, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(5, 4, 5, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(6, 4, 6, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(7, 4, 7, '2024-04-17 07:16:36', '2024-04-17 07:16:36'),
(8, 4, 8, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(9, 5, 9, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(10, 5, 10, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(11, 5, 11, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(12, 5, 12, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(13, 6, 13, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(14, 6, 14, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(15, 6, 15, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(16, 6, 16, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(17, 7, 17, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(18, 7, 18, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(19, 7, 19, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(20, 7, 20, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(21, 8, 21, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(22, 8, 22, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(23, 8, 23, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(24, 9, 24, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(25, 9, 25, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(26, 9, 26, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(27, 9, 27, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(28, 10, 28, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(29, 10, 29, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(30, 10, 30, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(31, 10, 31, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(32, 11, 32, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(33, 11, 33, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(34, 11, 34, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(35, 11, 35, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(36, 11, 36, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(37, 3, 37, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(38, 3, 38, '2024-04-17 07:16:37', '2024-04-17 07:16:37'),
(39, 3, 39, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(40, 3, 40, '2024-04-17 07:16:38', '2024-04-17 07:16:38'),
(41, 3, 41, '2024-04-17 07:16:38', '2024-04-17 07:16:38');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `favourite_songs`
--
ALTER TABLE `favourite_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_songs_user_id_foreign` (`user_id`),
  ADD KEY `favourite_songs_song_id_foreign` (`song_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genre_songs`
--
ALTER TABLE `genre_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_songs_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_songs_song_id_foreign` (`song_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_songs_playlist_id_foreign` (`playlist_id`),
  ADD KEY `playlist_songs_song_id_foreign` (`song_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `user_playlists`
--
ALTER TABLE `user_playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_playlists_user_id_foreign` (`user_id`),
  ADD KEY `user_playlists_playlist_id_foreign` (`playlist_id`);

--
-- Индексы таблицы `user_songs`
--
ALTER TABLE `user_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_songs_user_id_foreign` (`user_id`),
  ADD KEY `user_songs_song_id_foreign` (`song_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `favourite_songs`
--
ALTER TABLE `favourite_songs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `genre_songs`
--
ALTER TABLE `genre_songs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `playlist_songs`
--
ALTER TABLE `playlist_songs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user_playlists`
--
ALTER TABLE `user_playlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_songs`
--
ALTER TABLE `user_songs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favourite_songs`
--
ALTER TABLE `favourite_songs`
  ADD CONSTRAINT `favourite_songs_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourite_songs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `genre_songs`
--
ALTER TABLE `genre_songs`
  ADD CONSTRAINT `genre_songs_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_songs_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlist_songs_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_songs_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_playlists`
--
ALTER TABLE `user_playlists`
  ADD CONSTRAINT `user_playlists_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_playlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_songs`
--
ALTER TABLE `user_songs`
  ADD CONSTRAINT `user_songs_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_songs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
