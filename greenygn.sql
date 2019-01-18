-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 08:40 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenygn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_role_id` int(11) DEFAULT NULL,
  `image` varchar(120) NOT NULL DEFAULT '/assets/images/logo/greenygn_animate.svg',
  `ph` varchar(20) DEFAULT NULL,
  `address` tinytext,
  `bio` varchar(150) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `admin_role_id`, `image`, `ph`, `address`, `bio`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 'Lwin Moe Paing', 'lwinmoepaing007@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, '/assets/images/logo/greenygn_animate.svg', '0942005924', 'None', 'What the Hell Bro', NULL, '2019-01-18 17:33:54', '2019-01-18 17:33:54'),
(2, 'Htet Naing Linn', 'htetnainglinn@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 2, '/assets/images/logo/greenygn_animate.svg', '09449949494', 'Nothing', 'Ma shi', NULL, '2019-01-18 23:45:12', '2019-01-18 23:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `name`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 'superadmin', NULL, '2019-01-18 16:58:16', '2019-01-18 16:58:16'),
(2, 'admin', NULL, '2019-01-18 16:58:16', '2019-01-18 16:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `ph` varchar(20) DEFAULT NULL,
  `address` tinytext,
  `bio` varchar(150) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `ph`, `address`, `bio`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 'User 1', 'user1@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', NULL, NULL, NULL, NULL, '2019-01-18 16:15:54', '2019-01-18 16:15:54'),
(2, 'User 2', 'user2@gmail.com', '$2y$10$AlC8LZUCnJtAenE4Nq/FZ.L.uSiSlKAdKXVK3MvqCdRBQXYZ7XeQW', NULL, NULL, NULL, NULL, '2019-01-18 16:16:14', '2019-01-18 16:16:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `deleted_at_index` (`deleted_at`) USING BTREE,
  ADD KEY `admin_role_id` (`admin_role_id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `deleted_at_index` (`deleted_at`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_role_foreign` FOREIGN KEY (`admin_role_id`) REFERENCES `admin_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
