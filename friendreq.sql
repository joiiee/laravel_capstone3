-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 11:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendreq`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 9, 21, 'This is a great post!', '2017-07-27 16:00:00', '2017-07-27 16:00:00'),
(2, 7, 22, 'Awesome! I want it too!', '2017-07-28 16:00:00', '2017-07-28 16:00:00'),
(3, 9, 21, 'this is a comment', '2017-07-30 00:09:03', '2017-07-30 00:09:03'),
(4, 8, 21, 'Woah, it look wonderful!', '2017-07-30 00:09:42', '2017-07-30 00:09:42'),
(5, 8, 21, 'this is another comment', '2017-07-30 00:19:05', '2017-07-30 00:19:05'),
(6, 6, 21, 'posted a comment here', '2017-07-30 01:38:58', '2017-07-30 01:38:58'),
(7, 6, 21, 'haaaaaaaaaaaaaay', '2017-07-30 06:01:00', '2017-07-30 06:01:00'),
(8, 8, 21, 'hmmm', '2017-07-30 10:03:39', '2017-07-30 10:03:39'),
(9, 12, 21, 'hadfadsf', '2017-07-30 22:46:30', '2017-07-30 22:46:30'),
(10, 12, 21, 'helloo', '2017-07-31 00:35:38', '2017-07-31 00:35:38'),
(11, 9, 21, 'afadsfds', '2017-07-31 00:35:51', '2017-07-31 00:35:51'),
(12, 12, 21, 'asd', '2017-07-31 00:56:02', '2017-07-31 00:56:02'),
(13, 9, 21, 'asd', '2017-07-31 00:58:26', '2017-07-31 00:58:26'),
(14, 12, 21, 'asd', '2017-07-31 00:59:12', '2017-07-31 00:59:12'),
(15, 12, 21, 'qwe', '2017-07-31 00:59:34', '2017-07-31 00:59:34'),
(16, 11, 21, 'wala pa', '2017-07-31 01:03:46', '2017-07-31 01:03:46'),
(17, 11, 21, 'wala na', '2017-07-31 01:03:53', '2017-07-31 01:03:53'),
(18, 11, 21, 'ewan', '2017-07-31 01:04:32', '2017-07-31 01:04:32'),
(19, 11, 21, 'www', '2017-07-31 01:04:36', '2017-07-31 01:04:36'),
(20, 4, 21, 'smile! :)', '2017-07-31 18:29:59', '2017-07-31 18:29:59'),
(21, 11, 21, 'huy', '2017-08-01 20:55:37', '2017-08-01 20:55:37'),
(22, 8, 21, 'hey', '2017-08-01 22:03:57', '2017-08-01 22:03:57'),
(23, 14, 1, 'oo wala nga talaga hahaha :D', '2017-08-01 22:48:54', '2017-08-01 22:48:54'),
(24, 15, 27, 'dasfdsafd', '2017-08-01 23:18:12', '2017-08-01 23:18:12'),
(25, 17, 21, 'hi', '2017-08-02 18:45:51', '2017-08-02 18:45:51'),
(26, 17, 21, 'hello', '2017-08-02 22:29:11', '2017-08-02 22:29:11'),
(27, 1, 21, 'arrggggh!!', '2017-08-02 23:38:08', '2017-08-02 23:38:08'),
(28, 18, 21, 'advance happy birthday !', '2017-08-03 08:29:53', '2017-08-03 08:29:53'),
(29, 6, 22, 'huhhuuuuuuuuuuuuuu', '2017-08-03 14:15:06', '2017-08-03 14:15:06'),
(30, 13, 21, 'sheeet', '2017-08-03 15:03:56', '2017-08-03 15:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(1, '21', '3', 0, NULL, NULL),
(2, '21', '5', 0, NULL, NULL),
(3, '21', '6', 0, NULL, NULL),
(4, '21', '4', 1, NULL, NULL),
(10, '21', '1', 1, NULL, NULL),
(11, '21', '11', 0, NULL, NULL),
(13, '21', '7', 0, NULL, NULL),
(16, '1', '2', 1, NULL, NULL),
(18, '22', '20', 0, NULL, NULL),
(24, '21', '14', 0, NULL, NULL),
(29, '22', '9', 0, NULL, NULL),
(33, '21', '15', 1, NULL, NULL),
(34, '15', '5', 0, NULL, NULL),
(35, '15', '1', 0, NULL, NULL),
(37, '23', '21', 0, NULL, NULL),
(38, '23', '22', 1, NULL, NULL),
(39, '23', '26', 0, NULL, NULL),
(42, '1', '27', 1, NULL, NULL),
(43, '21', '2', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(20, 12, 2, '2017-07-31 21:30:28', '2017-07-31 21:30:28'),
(21, 12, 22, '2017-07-31 21:55:27', '2017-07-31 21:55:27'),
(22, 11, 22, '2017-07-31 22:04:02', '2017-07-31 22:04:02'),
(27, 8, 22, '2017-07-31 22:05:30', '2017-07-31 22:05:30'),
(28, 8, 22, '2017-07-31 22:05:39', '2017-07-31 22:05:39'),
(29, 7, 22, '2017-07-31 22:07:42', '2017-07-31 22:07:42'),
(30, 7, 22, '2017-07-31 22:07:48', '2017-07-31 22:07:48'),
(35, 3, 22, '2017-07-31 22:22:15', '2017-07-31 22:22:15'),
(40, 5, 22, '2017-07-31 22:31:59', '2017-07-31 22:31:59'),
(41, 9, 2, '2017-07-31 22:47:49', '2017-07-31 22:47:49'),
(42, 12, 21, '2017-08-01 03:08:07', '2017-08-01 03:08:07'),
(45, 14, 1, '2017-08-01 22:48:39', '2017-08-01 22:48:39'),
(49, 18, 4, '2017-08-03 08:33:47', '2017-08-03 08:33:47'),
(51, 3, 21, '2017-08-03 14:11:38', '2017-08-03 14:11:38'),
(53, 6, 22, '2017-08-03 14:20:37', '2017-08-03 14:20:37'),
(54, 4, 21, '2017-08-03 14:24:48', '2017-08-03 14:24:48'),
(57, 5, 21, '2017-08-03 14:30:24', '2017-08-03 14:30:24'),
(59, 7, 21, '2017-08-03 14:35:17', '2017-08-03 14:35:17'),
(60, 8, 21, '2017-08-03 14:36:32', '2017-08-03 14:36:32'),
(63, 17, 21, '2017-08-03 15:02:23', '2017-08-03 15:02:23'),
(65, 11, 21, '2017-08-03 15:03:11', '2017-08-03 15:03:11'),
(66, 13, 21, '2017-08-03 15:03:37', '2017-08-03 15:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_20_023237_friendRequest', 2),
(4, '2017_07_26_055851_createPostsTable', 3),
(5, '2017_07_26_082537_add_image_to_posts_table', 4),
(6, '2017_07_27_080443_create_likes_table', 5),
(7, '2017_07_29_140515_create_comments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jcab@email.com', '$2y$10$VrhY/ku9UULo6ytP.eLxT.J6bws8flPUBuE0uyEFamNoTmPEP8pu.', '2017-07-30 02:01:55'),
('julie@gmail.com', '$2y$10$hUqNH5WhxuaqduPSFzRah.K6IEwQZXs8xEBOjH0AoVC3jfjcJsMTC', '2017-07-30 02:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `what` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `where` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `when` date NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagepost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `what`, `where`, `when`, `caption`, `created_at`, `updated_at`, `imagepost`) VALUES
(1, 21, 'adfadsfsd', 'fadfsadsf', '2017-07-26', 'adfasdfsd', '2017-07-25 22:48:26', '2017-07-25 22:48:26', ''),
(2, 21, 'aq', 'aq', '2017-07-26', 'aq', '2017-07-25 22:50:45', '2017-07-25 22:50:45', ''),
(3, 21, 'adfadsf', 'asdfasdf', '2017-07-27', 'adfadsf', '2017-07-25 22:51:44', '2017-07-25 22:51:44', ''),
(4, 21, 'sample post kitakita', 'japan', '2017-08-06', 'fadfasf', '2017-07-26 00:33:05', '2017-07-31 18:29:26', 'imageUploads/edited/1501554566.jpg'),
(5, 21, 'sample itey itey', 'sample itey itey', '2017-07-27', 'sample caption itey', '2017-07-26 03:48:46', '2017-07-30 21:27:42', 'noimagepost.jpg'),
(6, 22, 'binagyoooo', 'tuitt', '2017-07-27', 'hetooo akoooo basang basa sa ulaaaaaaaaan!!!! XD', '2017-07-26 17:10:30', '2017-08-03 14:14:52', 'bg4.jpg'),
(7, 21, 'faaaaaaaak', 'faaaaaaaaak', '2017-07-28', 'faaaaaaaaaaaaaak', '2017-07-27 19:03:35', '2017-07-27 19:03:35', 'imageUploads/1501211015.jpg'),
(8, 21, 'AWESOME', 'awesome', '2017-07-28', 'awesome', '2017-07-27 20:48:08', '2017-07-30 22:05:47', 'noimagepost.jpg'),
(9, 1, 'dfasfdsafdsf', 'asdfasdfsaf', '2017-07-28', 'adsfasfsda', '2017-07-27 23:14:57', '2017-07-27 23:14:57', 'imageUploads/1501226097.jpg'),
(11, 21, 'awtss', 'awtss', '2017-07-31', 'awtwss', '2017-07-30 22:33:39', '2017-07-30 22:33:39', NULL),
(12, 21, 'owyeahh', 'tuittee', '2017-07-31', 'adfasdf', '2017-07-30 22:43:35', '2017-07-30 23:53:18', 'imageUploads/edited/1501487598.jpg'),
(13, 21, 'Graduation of Batch 4 Day Tuitt Students, last day naaaaa :\'(', 'Uncle Moe\'s', '2017-08-08', 'Till we meet again, sana we\'ll keep in touch pa din after graduation. #sepanxAttack -_-', '2017-08-01 05:41:13', '2017-08-01 19:30:59', 'imageUploads/edited/1501595078.jpg'),
(14, 27, 'walang poreber!!', 'sa earth', '2017-08-02', 'tseee', '2017-08-01 22:17:32', '2017-08-01 23:17:39', 'imageUploads/edited/1501654672.jpg'),
(17, 21, 'uwian na', 'tuitt', '2017-08-02', 'uwian na, tara na', '2017-08-02 00:46:58', '2017-08-02 00:46:58', 'imageUploads/1501663618.jpg'),
(18, 4, 'Birthday ni papsikels', 'Bahay langs', '2017-08-07', NULL, '2017-08-03 07:45:25', '2017-08-03 08:12:59', NULL),
(19, 22, 'sample plan for today', 'dito lang sa tuitt', '2017-08-04', NULL, '2017-08-03 20:26:39', '2017-08-03 20:26:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mariane Heidenreich', 'pleffler@bruen.net', '$2y$10$vMUGa8p25JJc52/FUkFeQ.aVPdsX1wkHYhKDZxu6KgHP3nss2bgQK', 'http://lorempixel.com/200/200/?69144', 'Uf3iXSWEV8aHsnPC28D7FyAXMabOBoh7Tg3h6OB3lMMovFAhtW4BplAyH3uz', NULL, NULL),
(2, 'Dr. Ken Reilly', 'kutch.caleb@yahoo.com', '$2y$10$sE0bWOlAWf1P/qz1qgmtVO1XxjAJv6dPotYlWU69CfDm/S67WCpfG', 'http://lorempixel.com/200/200/?34879', 'aJEaiETlkz90KTtDZLdE8BkGtwAVzzLfzr5aW5IYLhI4qLFob9nLICXUszTM', NULL, NULL),
(3, 'Ms. Alyson Witting III', 'abelardo.brown@nader.info', '$2y$10$40NUH2E78It5yrODEWo.X.2HbCunahskI6O0aUpwO7gLYs15L/OeK', 'http://lorempixel.com/200/200/?80970', '1dpMmD6uxYCxkwh6xiklBlg7XNndx0YahmFYUjAKyoZkFei83KTYzrghO9fA', NULL, NULL),
(4, 'Dr. Jaycee Thiel V', 'dell97@little.com', '$2y$10$1NG/AYfh53ol0faMoH76R.IvtZ1O9epBlZirY9gi8Q5V7h0eTmleC', 'http://lorempixel.com/200/200/?14898', 'cwMlH7rnngB2FJQgd0uMZMbloAHcMRL0zDdK4VcDidA62ptHHajQLkUrKzVc', NULL, NULL),
(5, 'Cole Lehner', 'sylvester.volkman@zboncak.com', '$2y$10$bED9uxYjFfNUK2eReD97b.s.pZWtaTe2m1Ug2/EP.IcUwnEzIUhne', 'http://lorempixel.com/200/200/?80731', NULL, NULL, NULL),
(6, 'Marcelle Mertz', 'johns.adolf@hotmail.com', '$2y$10$aUZe8WbdDmdLT4toU7BBVOpeNpzglfldBVbxWa.e3fNQeWdW40dqu', 'http://lorempixel.com/200/200/?36048', NULL, NULL, NULL),
(7, 'Novella Lakin', 'georgette.rosenbaum@barrows.biz', '$2y$10$TTma85sDc7tslxPdXjn7C.7vuuIw6pDjQqIKNAENGS7HZfUSmr0gK', 'http://lorempixel.com/200/200/?70796', 'ouq8ecJ61j5Qlvu3cO1De53uIUr1U5tpoDwL9pLGi0nq4COqBv5cPTY3GWXv', NULL, NULL),
(8, 'Dr. Jorge Lebsack Jr.', 'pfeffer.katelynn@hotmail.com', '$2y$10$zrOsY2248qnTW1lFPgnQFOJIQIpSxtlfFCTLtEmPVAxRgFSa2uHDq', 'http://lorempixel.com/200/200/?41735', NULL, NULL, NULL),
(9, 'Mr. Abelardo Reichel', 'marks.cydney@pfannerstill.biz', '$2y$10$v0RbobVpycQBZP6wvnKGTOx4wzVG/GOFCTVyzcfi4hBRTEQqzvBUi', 'http://lorempixel.com/200/200/?64874', 'h0GdDTBRXcmji0ntzpOAB3snor3R5rV6jSszhN0po4bVlEnNRtKGviwrpu1M', NULL, NULL),
(10, 'Aliyah Ward', 'lillian15@gmail.com', '$2y$10$KGDB/Av28lghXLEddrOpmeY.4Xx6QUmrzv9Ace7TsvAKOWlxEEIDm', 'http://lorempixel.com/200/200/?37867', 'fLyYRSDbPq1uSfTAqv1S90S7bjGYCWsNN5cZndam6UxyUtYu48PKiits305g', NULL, NULL),
(11, 'Prof. Karson Corkery', 'miracle20@gmail.com', '$2y$10$ZwkO9kDfcmDnbFwH07z2k.oytaN1MvALS6kEd02ZLCxWWLcz/3EXO', 'http://lorempixel.com/200/200/?12792', NULL, NULL, NULL),
(12, 'Prof. Mohammad McCullough', 'gerlach.fiona@hotmail.com', '$2y$10$QfYoyRMhLHubSlqbp2C85OGX0lE9J6VEwC74AWJfXtLzb4D41TeOi', 'http://lorempixel.com/200/200/?23859', NULL, NULL, NULL),
(13, 'Miss Roselyn Hickle PhD', 'hledner@hotmail.com', '$2y$10$CTmy8YhR737yT2bxf/7lm.xO8qZ1/hKiRNZ3FFkuJP5Z1RQhql9em', 'http://lorempixel.com/200/200/?53374', NULL, NULL, NULL),
(14, 'Dr. Agustin Renner', 'queen82@koelpin.com', '$2y$10$uPqqiKuOROBY7LKZHD6YVeWW0l8Dutscmx3AGFtx536WOfyR/l3Zu', 'http://lorempixel.com/200/200/?77730', NULL, NULL, NULL),
(15, 'Barry Ziemann', 'grayce92@hotmail.com', '$2y$10$RKBw6d0L9VAJCnzZosTdeOTesYu8Omvas3U7DdM6.bhRBkMAqNFXC', 'http://lorempixel.com/200/200/?88065', 'w6jg53f76maQhoQpwG0wTAFzNNyhtVQ0X3z7mwwuNJqxIkRsDG6Etk1eO4mW', NULL, NULL),
(16, 'Kyle Carter', 'windler.robert@cremin.info', '$2y$10$zbx2HIjoiFx4IMyAn50HtOfaO2Qv4edCXQqogYQEKMYINmJxygVCO', 'http://lorempixel.com/200/200/?44010', NULL, NULL, NULL),
(17, 'Janick Muller', 'wilfredo37@harber.com', '$2y$10$sRUjSmXV6BgWRER7CqYKreR8qHBEI9g4FK/9KtB8MFWvsqnZ8tuUe', 'http://lorempixel.com/200/200/?28270', NULL, NULL, NULL),
(18, 'Norberto Cassin', 'zbergnaum@hauck.com', '$2y$10$Iijb4Nr351Gir.Rg4aE2SeJqJwXx/GGerDrlyIwgvb0ljAUdnbvC2', 'http://lorempixel.com/200/200/?23523', NULL, NULL, NULL),
(19, 'Dr. Elmer Koch MD', 'zkunde@yahoo.com', '$2y$10$WgsiPSqTHbkrQ042jmlH2e./Xm7ezd/pXr6vL4J1VXGI1YLEgIji6', 'http://lorempixel.com/200/200/?71526', NULL, NULL, NULL),
(20, 'Domenic Glover', 'grant32@aufderhar.biz', '$2y$10$C8Ln.nv6Rj4NU6p83q3C8OYfRa5/ms6c4L8FMHBDmLqmjZF3ucjyC', 'http://lorempixel.com/200/200/?94704', NULL, NULL, NULL),
(21, 'juliecabss', 'julie@gmail.com', '$2y$10$3QLnfEHVXuThQtphtutgDu7Ts0VZnZFJ6lQ1BLiDsHJ3Spd9Tfme6', 'user/1501345497.jpg', 'z3FcN4nhYxeD7qu8TZXQQkXA3G0OFABqBV3oOCP2EwnzUjgMVfthVdKJ7hUq', '2017-07-19 17:33:46', '2017-07-29 08:24:57'),
(22, 'jcabsieyeaaah', 'jcab@email.com', '$2y$10$lRO.g6tMpOrJUFqHvOxn8uYUoBAXwk2wmNy9MK3fHxgTMnR0JCgm.', 'user/1501302873.jpg', 'CPRvcHy1J8TxSxNOebKqNYPi08jEXUGdKoHvt1cg8IcxqrpZ3jcK3jxIhsVH', '2017-07-19 17:35:55', '2017-07-28 23:56:56'),
(23, 'jolesyie', 'jolesyie@gmail.com', '$2y$10$.WSzcCacXLSxvMyzktaGe.ayZuQ4wqL48BRbSXD6ZYeHvrzsX5O.6', 'user/newuser.jpg', '9NEnULW88dvkyrKEWwSIgqzSer31BcbpM7Px8lfVGkdzTrc0OZ18SE1Aa4dP', '2017-07-27 23:22:28', '2017-07-27 23:22:28'),
(26, 'jolescabs', 'jolescabs@gmail.com', '$2y$10$i84XsgiZWVXjzflw03mBzu/CFlfHO3oxusPmNTRyS/JHK4PCr3332', 'user/1501316466.jpg', 'PIC0pES6lsklFIWQhrdnPtYhCDoBZRCaqfwtNLh0xWDgMA6xXyDU8C2YeYcL', '2017-07-29 00:20:29', '2017-07-29 00:21:06'),
(27, 'justin', 'justin@gmail.com', '$2y$10$pKybBdU4Elfv6dsN3Q7j/uPLYUafv1qhKW0EAFtait7ILgQIE8bNe', 'user/newuser.jpg', 'o6VQvmt61k5aWHmzV337Jys3uo3QidbZgfswtgs8NjNXEXunBmu7GkmkNeS5', '2017-08-01 22:12:08', '2017-08-01 22:12:08'),
(28, 'ruel', 'ruel@gmail.com', '$2y$10$KZBY8c0mgKBCPAznpuuDKuG2qzJ0cLLwy6Jf2oXUW/RWYHD63PfR.', 'user/1501663702.jpg', 'koHq8W0V2wVl0cd3soOjIkPIsuCJt15cAlB37T3CFrvID68IqHkvXAaJAMDq', '2017-08-02 00:47:35', '2017-08-02 00:48:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
