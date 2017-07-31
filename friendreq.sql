-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 11:05 AM
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
(19, 11, 21, 'www', '2017-07-31 01:04:36', '2017-07-31 01:04:36');

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
(7, '21', '2', 1, NULL, NULL),
(10, '21', '1', 1, NULL, NULL),
(11, '21', '11', 0, NULL, NULL),
(13, '21', '7', 0, NULL, NULL),
(14, '21', '10', 0, NULL, NULL),
(16, '1', '2', 1, NULL, NULL),
(17, '21', '22', 1, NULL, NULL),
(18, '22', '20', 0, NULL, NULL),
(20, '22', '1', 0, NULL, NULL),
(22, '22', '2', 0, NULL, NULL),
(23, '26', '22', 0, NULL, NULL),
(24, '21', '14', 0, NULL, NULL);

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
(11, 1, 22, '2017-07-27 00:48:40', '2017-07-27 00:48:40');

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
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 21, 'sample post kitakita', 'japan', '2017-08-06', 'fadfasf', '2017-07-26 00:33:05', '2017-07-26 00:33:05', 'cam.jpg'),
(5, 21, 'sample itey itey', 'sample itey itey', '2017-07-27', 'sample caption itey', '2017-07-26 03:48:46', '2017-07-30 21:27:42', 'noimagepost.jpg'),
(6, 22, 'binagyo', 'tuitt', '2017-07-27', 'hetooo akoooo basang basa sa ulaaaaaaaaan!!!! XD', '2017-07-26 17:10:30', '2017-07-26 17:10:30', 'bg4.jpg'),
(7, 21, 'faaaaaaaak', 'faaaaaaaaak', '2017-07-28', 'faaaaaaaaaaaaaak', '2017-07-27 19:03:35', '2017-07-27 19:03:35', 'imageUploads/1501211015.jpg'),
(8, 21, 'AWESOME', 'awesome', '2017-07-28', 'awesome', '2017-07-27 20:48:08', '2017-07-30 22:05:47', 'noimagepost.jpg'),
(9, 1, 'dfasfdsafdsf', 'asdfasdfsaf', '2017-07-28', 'adsfasfsda', '2017-07-27 23:14:57', '2017-07-27 23:14:57', 'imageUploads/1501226097.jpg'),
(11, 21, 'awtss', 'awtss', '2017-07-31', 'awtwss', '2017-07-30 22:33:39', '2017-07-30 22:33:39', NULL),
(12, 21, 'owyeahh', 'tuittee', '2017-07-31', 'adfasdf', '2017-07-30 22:43:35', '2017-07-30 23:53:18', 'imageUploads/edited/1501487598.jpg');

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
(1, 'Mariane Heidenreich', 'pleffler@bruen.net', '$2y$10$vMUGa8p25JJc52/FUkFeQ.aVPdsX1wkHYhKDZxu6KgHP3nss2bgQK', 'http://lorempixel.com/200/200/?69144', 'bUME17MzHqtC2SYkWzXqema5xll7Lumkat4WAqiwPO39BxNGPRQuTsssbB4F', NULL, NULL),
(2, 'Dr. Ken Reilly', 'kutch.caleb@yahoo.com', '$2y$10$sE0bWOlAWf1P/qz1qgmtVO1XxjAJv6dPotYlWU69CfDm/S67WCpfG', 'http://lorempixel.com/200/200/?34879', 'akrIm06akmh9m6FNYMQ0nJWN4Dmk8pdJGKUeITEEqjyTjkZnrt17iJCZuk4a', NULL, NULL),
(3, 'Ms. Alyson Witting III', 'abelardo.brown@nader.info', '$2y$10$40NUH2E78It5yrODEWo.X.2HbCunahskI6O0aUpwO7gLYs15L/OeK', 'http://lorempixel.com/200/200/?80970', '1dpMmD6uxYCxkwh6xiklBlg7XNndx0YahmFYUjAKyoZkFei83KTYzrghO9fA', NULL, NULL),
(4, 'Dr. Jaycee Thiel V', 'dell97@little.com', '$2y$10$1NG/AYfh53ol0faMoH76R.IvtZ1O9epBlZirY9gi8Q5V7h0eTmleC', 'http://lorempixel.com/200/200/?14898', 'XpeqLl3cEjUewUkOtLWxZFdMCZ6p4GXHWsRBuEIPkH6XiHKNYOKOnV5mmFhU', NULL, NULL),
(5, 'Cole Lehner', 'sylvester.volkman@zboncak.com', '$2y$10$bED9uxYjFfNUK2eReD97b.s.pZWtaTe2m1Ug2/EP.IcUwnEzIUhne', 'http://lorempixel.com/200/200/?80731', NULL, NULL, NULL),
(6, 'Marcelle Mertz', 'johns.adolf@hotmail.com', '$2y$10$aUZe8WbdDmdLT4toU7BBVOpeNpzglfldBVbxWa.e3fNQeWdW40dqu', 'http://lorempixel.com/200/200/?36048', NULL, NULL, NULL),
(7, 'Novella Lakin', 'georgette.rosenbaum@barrows.biz', '$2y$10$TTma85sDc7tslxPdXjn7C.7vuuIw6pDjQqIKNAENGS7HZfUSmr0gK', 'http://lorempixel.com/200/200/?70796', NULL, NULL, NULL),
(8, 'Dr. Jorge Lebsack Jr.', 'pfeffer.katelynn@hotmail.com', '$2y$10$zrOsY2248qnTW1lFPgnQFOJIQIpSxtlfFCTLtEmPVAxRgFSa2uHDq', 'http://lorempixel.com/200/200/?41735', NULL, NULL, NULL),
(9, 'Mr. Abelardo Reichel', 'marks.cydney@pfannerstill.biz', '$2y$10$v0RbobVpycQBZP6wvnKGTOx4wzVG/GOFCTVyzcfi4hBRTEQqzvBUi', 'http://lorempixel.com/200/200/?64874', NULL, NULL, NULL),
(10, 'Aliyah Ward', 'lillian15@gmail.com', '$2y$10$KGDB/Av28lghXLEddrOpmeY.4Xx6QUmrzv9Ace7TsvAKOWlxEEIDm', 'http://lorempixel.com/200/200/?37867', NULL, NULL, NULL),
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
(21, 'juliecabss', 'julie@gmail.com', '$2y$10$3QLnfEHVXuThQtphtutgDu7Ts0VZnZFJ6lQ1BLiDsHJ3Spd9Tfme6', 'user/1501345497.jpg', 'iJDWXhGXBZFWKEfyUFP9SPfKv6nM1uZqSQKRoHyJckMsH75dh6kaw0sA7Z6g', '2017-07-19 17:33:46', '2017-07-29 08:24:57'),
(22, 'jcabsieyeaaah', 'jcab@email.com', '$2y$10$lRO.g6tMpOrJUFqHvOxn8uYUoBAXwk2wmNy9MK3fHxgTMnR0JCgm.', 'user/1501302873.jpg', 'SvY4sZzIqMkzYLPn1mr8oXWt5LEhnQT1fnXvS3K4yeYBTg0nPajhjhuiddz6', '2017-07-19 17:35:55', '2017-07-28 23:56:56'),
(23, 'jolesyie', 'jolesyie@gmail.com', '$2y$10$.WSzcCacXLSxvMyzktaGe.ayZuQ4wqL48BRbSXD6ZYeHvrzsX5O.6', 'user/newuser.jpg', 'dWdfFbjWylNUHBC7O5ZR6dHsnau4KQ8xjdL0l74fIRi4vc1ZFygqaE0iYNfl', '2017-07-27 23:22:28', '2017-07-27 23:22:28'),
(26, 'jolescabs', 'jolescabs@gmail.com', '$2y$10$i84XsgiZWVXjzflw03mBzu/CFlfHO3oxusPmNTRyS/JHK4PCr3332', 'user/1501316466.jpg', 'PIC0pES6lsklFIWQhrdnPtYhCDoBZRCaqfwtNLh0xWDgMA6xXyDU8C2YeYcL', '2017-07-29 00:20:29', '2017-07-29 00:21:06');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
