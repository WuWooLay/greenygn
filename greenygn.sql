-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 11:04 AM
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
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `description`, `admin_id`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 'We are going to save tree for Future .', 1, NULL, '2019-01-20 16:32:51', '2019-01-20 16:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `position` varchar(80) NOT NULL DEFAULT 'admin',
  `other_position` varchar(120) DEFAULT NULL,
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

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `admin_role_id`, `position`, `other_position`, `image`, `ph`, `address`, `bio`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 'Lwin Moe Paing', 'lwinmoepaing007@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, 'Co-Founder @ Readmal.com', 'Ui/Ux Designer,UniHack3-Champion,Wit-2018 Design Winner', '/assets/images/admins/id1_08_20_56_5c44215837539.jpg', '09-420059241', '', '', NULL, '2019-01-18 17:33:54', '2019-01-18 17:33:54'),
(2, 'Htet Naing Linn', 'htetnainglinn@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, 'Co-Founder @ Readmal', '', '/assets/images/admins/id2_00_52_20_5c43b83402230.jpg', '09-449949494', 'Nothing', 'Ma shi', NULL, '2019-01-18 23:45:12', '2019-01-18 23:45:12'),
(3, 'Ko Htet Ko', 'admin@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, 'admin', '', '/assets/images/admins/id3_08_22_09_5c4421a116ef4.jpg', '09-455874454', '', '', NULL, '2019-01-20 04:03:04', '2019-01-20 04:03:04'),
(4, 'Next Admin', '123@cc.sa', '$2y$10$JiwiSrp42aN1QkRg/bOCnenslzUdQ7sVkBCNjZ3MYmUsvmhRMQW1W', 2, 'admin', '', '/assets/images/admins/id4_09_15_08_5c442e0cc2f4a.png', '09-777777777', '', '', NULL, '2019-01-20 14:37:09', '2019-01-20 14:37:09'),
(5, 'L w', 'admin2@gmail.com', '$2y$10$iM9WZ3R9jFdcghUpEp2.4OrtjhidnmsY6priZ55jyiFIihod.uzru', 2, 'admin', '', '/assets/images/logo/greenygn_animate.svg', NULL, NULL, NULL, NULL, '2019-01-20 15:00:16', '2019-01-20 15:00:16');

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
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_page_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `deleted_at_index` (`deleted_at`) USING BTREE,
  ADD KEY `admin_role_foreign` (`admin_role_id`);

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
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `about_page`
--
ALTER TABLE `about_page`
  ADD CONSTRAINT `about_page_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_role_foreign` FOREIGN KEY (`admin_role_id`) REFERENCES `admin_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
