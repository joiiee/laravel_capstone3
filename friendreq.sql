-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 10:59 AM
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
(4, '21', '4', 0, NULL, NULL),
(7, '21', '2', 0, NULL, NULL),
(8, '21', '9', 0, NULL, NULL),
(10, '21', '1', 0, NULL, NULL),
(11, '21', '11', 0, NULL, NULL),
(12, '21', '22', 0, NULL, NULL),
(13, '21', '7', 0, NULL, NULL);

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
(3, '2017_07_20_023237_friendRequest', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mariane Heidenreich', 'pleffler@bruen.net', '$2y$10$vMUGa8p25JJc52/FUkFeQ.aVPdsX1wkHYhKDZxu6KgHP3nss2bgQK', 'http://lorempixel.com/200/200/?69144', NULL, NULL, NULL),
(2, 'Dr. Ken Reilly', 'kutch.caleb@yahoo.com', '$2y$10$sE0bWOlAWf1P/qz1qgmtVO1XxjAJv6dPotYlWU69CfDm/S67WCpfG', 'http://lorempixel.com/200/200/?34879', NULL, NULL, NULL),
(3, 'Ms. Alyson Witting III', 'abelardo.brown@nader.info', '$2y$10$40NUH2E78It5yrODEWo.X.2HbCunahskI6O0aUpwO7gLYs15L/OeK', 'http://lorempixel.com/200/200/?80970', NULL, NULL, NULL),
(4, 'Dr. Jaycee Thiel V', 'dell97@little.com', '$2y$10$1NG/AYfh53ol0faMoH76R.IvtZ1O9epBlZirY9gi8Q5V7h0eTmleC', 'http://lorempixel.com/200/200/?14898', NULL, NULL, NULL),
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
(15, 'Barry Ziemann', 'grayce92@hotmail.com', '$2y$10$RKBw6d0L9VAJCnzZosTdeOTesYu8Omvas3U7DdM6.bhRBkMAqNFXC', 'http://lorempixel.com/200/200/?88065', NULL, NULL, NULL),
(16, 'Kyle Carter', 'windler.robert@cremin.info', '$2y$10$zbx2HIjoiFx4IMyAn50HtOfaO2Qv4edCXQqogYQEKMYINmJxygVCO', 'http://lorempixel.com/200/200/?44010', NULL, NULL, NULL),
(17, 'Janick Muller', 'wilfredo37@harber.com', '$2y$10$sRUjSmXV6BgWRER7CqYKreR8qHBEI9g4FK/9KtB8MFWvsqnZ8tuUe', 'http://lorempixel.com/200/200/?28270', NULL, NULL, NULL),
(18, 'Norberto Cassin', 'zbergnaum@hauck.com', '$2y$10$Iijb4Nr351Gir.Rg4aE2SeJqJwXx/GGerDrlyIwgvb0ljAUdnbvC2', 'http://lorempixel.com/200/200/?23523', NULL, NULL, NULL),
(19, 'Dr. Elmer Koch MD', 'zkunde@yahoo.com', '$2y$10$WgsiPSqTHbkrQ042jmlH2e./Xm7ezd/pXr6vL4J1VXGI1YLEgIji6', 'http://lorempixel.com/200/200/?71526', NULL, NULL, NULL),
(20, 'Domenic Glover', 'grant32@aufderhar.biz', '$2y$10$C8Ln.nv6Rj4NU6p83q3C8OYfRa5/ms6c4L8FMHBDmLqmjZF3ucjyC', 'http://lorempixel.com/200/200/?94704', NULL, NULL, NULL),
(21, 'juliecabs', 'julie@gmail.com', '$2y$10$3QLnfEHVXuThQtphtutgDu7Ts0VZnZFJ6lQ1BLiDsHJ3Spd9Tfme6', 'alone.jpg', 'Q74r5oRxRZZa9B4BnE89CVBuYbS82dm8leJjPOGAgSAX4vqt9jaBRVbOBrJ2', '2017-07-19 17:33:46', '2017-07-19 17:33:46'),
(22, 'jcab', 'jcab@email.com', '$2y$10$lRO.g6tMpOrJUFqHvOxn8uYUoBAXwk2wmNy9MK3fHxgTMnR0JCgm.', 'bg3.jpeg', 'N2o7BvQmNIvvd4DcEF4XFstsZnYRVQ6fsuMbCctHgteEX9cnHJyflKekfPyD', '2017-07-19 17:35:55', '2017-07-19 17:35:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
