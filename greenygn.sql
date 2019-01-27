-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 10:14 PM
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
(1, 'Lwin Moe Paing', 'lwinmoepaing007@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, 'Co-Founder @ Readmal.com', 'Ui/Ux Designer,UniHack3-Champion,Wit-2018 Design Winner', '/assets/images/admins/id1_08_19_05_5c48156976705.jpg', '09-420059241', '', '', NULL, '2019-01-18 17:33:54', '2019-01-18 17:33:54'),
(2, 'Htet Naing Linn', 'htetnainglinn@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, 'Co-Founder @ Readmal', '', '/assets/images/admins/id2_00_52_20_5c43b83402230.jpg', '09-449949494', 'Nothing', 'Ma shi', NULL, '2019-01-18 23:45:12', '2019-01-18 23:45:12'),
(3, 'Ko Htet Ko', 'admin@gmail.com', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', 1, 'admin', '', '/assets/images/admins/id3_08_22_09_5c4421a116ef4.jpg', '09-455874454', '', '', NULL, '2019-01-20 04:03:04', '2019-01-20 04:03:04'),
(4, 'Next Admin', '123@cc.sa', '$2y$10$JiwiSrp42aN1QkRg/bOCnenslzUdQ7sVkBCNjZ3MYmUsvmhRMQW1W', 1, 'admin', '', '/assets/images/admins/id4_09_15_08_5c442e0cc2f4a.png', '09-777777777', '', '', NULL, '2019-01-20 14:37:09', '2019-01-20 14:37:09'),
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'Fruits', '2019-01-23 00:41:46', '2019-01-23 00:41:46', NULL),
(2, 'Flowers', '2019-01-23 03:57:45', '2019-01-23 03:57:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT '/assets/images/logo/greenygn_animate.svg',
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `image`, `title`, `description`, `admin_id`, `deleted_at`, `created_at`, `modified_at`) VALUES
(2, '/assets/images/forums/admin_id1_01_33_09_5c47b6453ef80.jpg', 'Ma Lar', '131313', 1, NULL, '2019-01-21 03:47:34', '2019-01-22 18:45:41'),
(3, '/assets/images/forums/admin_id1_01_32_52_5c47b63463864.jpg', 'Ohmar', 'No NO nO', 1, NULL, '2019-01-21 03:49:32', '2019-01-22 20:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `order_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_phone`, `user_address`, `status`, `order_date`, `send_date`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 1, 'User 1', '09-456478541', 'Ygn', 0, '2019-01-25', NULL, NULL, '2019-01-25 21:55:15', '2019-01-25 21:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL DEFAULT '/assets/images/logo/greenygn_animate.svg',
  `quantity` int(11) NOT NULL,
  `plant_amount` int(11) NOT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `plant_id`, `image`, `quantity`, `plant_amount`, `total_amount`) VALUES
(1, 1, '/assets/images/plants/plant_id_23_55_46_5c479f725720a.jpg', 5, 2000, 10000),
(1, 2, '/assets/images/plants/plant_id1_22_35_03_5c478c872d1f0.jpg', 1, 3000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `image` varchar(120) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `image`, `name`, `price`, `category_id`, `admin_id`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, '/assets/images/plants/plant_id_23_55_46_5c479f725720a.jpg', 'Sun Flower', 2000, 1, 1, NULL, '2019-01-23 02:07:56', '2019-01-23 05:31:39'),
(2, '/assets/images/plants/plant_id1_22_35_03_5c478c872d1f0.jpg', 'Rose', 3000, 2, 1, NULL, '2019-01-23 04:05:03', '2019-01-28 01:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT '/assets/images/logo/greenygn_animate.svg',
  `password` varchar(200) NOT NULL,
  `ph` varchar(20) NOT NULL,
  `address` tinytext,
  `bio` varchar(150) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `ph`, `address`, `bio`, `deleted_at`, `created_at`, `modified_at`) VALUES
(1, 'Not User 1', 'user1@gmail.com', '/assets/images/users/id1_21_17_26_5c4b6ed64df90.jpg', '$2y$10$ylEA3AIe8Ad/unGPz.54CeBJVJazs6fN93z3riCY01n7iF2KRoUUm', '09-420059241', 'Ygn', '', NULL, '2019-01-18 16:15:54', '2019-01-24 00:25:11'),
(2, 'Haoi', 'user2@gmail.com', '/assets/images/users/id2_21_25_14_5c4b70aa45174.png', '$2y$10$AlC8LZUCnJtAenE4Nq/FZ.L.uSiSlKAdKXVK3MvqCdRBQXYZ7XeQW', '09-456878541', 'Address _ Bayar', 'Bio', NULL, '2019-01-18 16:16:14', '2019-01-23 23:42:52'),
(3, 'Not A', 'nextuser@gmail.com', '/assets/images/users/id3_19_59_51_5c48b9a76b112.png', '$2y$10$Yp46/cKkyuTI.s1tNdhmOurkuoWY59m0bwq9ZrL8t/KEivZ8WcJQ.', '09-420059241', 'Bay', '', NULL, '2019-01-24 01:29:38', '2019-01-24 01:29:59');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_details_order_foreign` (`order_id`),
  ADD KEY `order_details_plant_foreign` (`plant_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_category_foreign` (`category_id`),
  ADD KEY `plant_admin_foreign` (`admin_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_plant_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`);

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plant_admin_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `plant_category_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
