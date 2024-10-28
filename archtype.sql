-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archtype`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`) VALUES
(1, '357cd5320aa20671e1a8227e2f255991', 'f8a92e6e15925ae8253e3d2f2c0c2af3');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `category_name`, `slug`) VALUES
(11, 'Architecture', 'architecture'),
(12, 'Interior', 'interior');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `status` enum('published','archived') NOT NULL DEFAULT 'published',
  `location` varchar(255) DEFAULT NULL,
  `post_images` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_name`, `thumbnail_image`, `sub_id`, `main_id`, `details`, `status`, `location`, `post_images`, `slug`) VALUES
(36, 'Fusion', '[\"671c7e5d64f7f_fustion_thumbnail.jpg\"]', 23, 12, '', 'published', 'Pune, Maharashtra', '[\"671c7e5d65421_7.jpg\",\"671c7e5d659ff_5.jpg\",\"671c7e5d65d11_4.jpg\",\"671c7e5d65fe3_3.jpg\",\"671c7e5d662c8_2.jpg\",\"671c7e5d665e9_1.jpg\"]', 'fusion'),
(37, 'Art Collective', '[\"671c7ef085f85_art_thumb.jpg\"]', 23, 12, '', 'published', 'Pune, Maharashtra', '[\"671c7ef086288_11.jpg\",\"671c7ef08657f_4.jpg\",\"671c7ef08684b_3.jpg\",\"671c7ef086aa8_2.jpg\",\"671c7ef086d3f_1.jpg\",\"671c7ef0870f7_7.jpg\"]', 'art-collective'),
(38, 'Glamorous Living', '[\"671c7f889b922_glamrous_thumb.jpg\"]', 23, 12, '', 'published', 'Pune, Maharashtra', '[\"671c7f889bc4a_8.jpg\",\"671c7f889bf92_6.jpg\",\"671c7f889c2a1_4.jpg\",\"671c7f889c552_2.jpg\",\"671c7f889c7f0_1.jpg\",\"671c7f889cab1_11.jpg\"]', 'glamorous-living'),
(39, 'Sky View', '[\"671c80d1af07f_skyvie_thumb.jpg\"]', 23, 12, '', 'published', 'Pune, Maharashtra', '[\"671c80d1b5bf7_9.jpg\",\"671c80d1b6038_8.jpg\",\"671c80d1b6398_7.jpg\",\"671c80d1b66b9_6.jpg\",\"671c80d1b698c_5.jpg\",\"671c80d1b6c4e_4.jpg\",\"671c80d1b6f60_3.jpg\"]', 'sky-view'),
(40, 'Collage', '[\"671c81901539a_thumb.jpg\"]', 23, 12, '', 'published', 'Pune, Maharashtra', '[\"671c819015663_7.jpg\",\"671c819015b36_6.jpg\",\"671c819015f82_5.jpg\",\"671c8190164f2_4.jpg\",\"671c8190168c0_2.jpg\",\"671c819016bbd_1.jpg\"]', 'collage'),
(41, 'Dhanvilla', '[\"671c824a98e8d_thumb.jpg\"]', 22, 11, '', 'published', 'Pune, Maharashtra', '[\"671c824a992ac_2.jpg\",\"671c824a99a59_3.jpg\",\"671c824a9a17f_4.jpg\",\"671c824a9a60f_5.jpg\",\"671c824a9a8a0_6.jpg\"]', 'dhanvilla'),
(42, 'Conservation of Heritage', '[\"671c82f449f6d_thumb.jpg\"]', 22, 11, '', 'published', 'Pune, Maharashtra', '[\"671c82f44a548_6.jpg\",\"671c82f44aada_4.jpg\",\"671c82f44af71_3.jpg\",\"671c82f44b2a9_1.jpg\"]', 'conservation-of-heritage'),
(43, 'Ramsukh House', '[\"671c83b5edfa6_thumb.jpg\"]', 20, 11, '', 'published', 'Pune, Maharashtra', '[\"671c83b5ee355_15.jpg\",\"671c83b5ee6a6_14.jpg\",\"671c83b5ee9d5_13.jpg\",\"671c83b5eecb5_12.jpg\",\"671c83b5eeeec_8.jpg\",\"671c83b5ef0ea_7.jpg\",\"671c83b5ef36e_5.jpg\",\"671c83b5ef6e5_4.jpg\",\"671c83b5efac9_2.jpg\",\"671c83b5efd36_1.jpg\",\"671c83b5effce_6.jpg\"]', 'ramsukh-house'),
(44, 'Baylon', '[\"671c842b5e1c6_thumb.jpg\"]', 20, 11, '', 'published', 'Pune, Maharashtra', '[\"671c842b5e6e6_4.jpg\",\"671c842b5eb5e_3.jpg\",\"671c842b5ee2b_2.jpg\"]', 'baylon'),
(45, 'World of Veg', '[\"671c84ad9159b_thumb.jpg\"]', 20, 11, '', 'published', 'Pune, Maharashtra', '[\"671c84ad91b76_14.jpg\",\"671c84ad91ff8_12.jpg\",\"671c84ad923c1_11.jpg\",\"671c84ad927c9_9.jpg\",\"671c84ad92b37_8.jpg\",\"671c84ad92e6a_6.jpg\",\"671c84ad93133_5.jpg\",\"671c84ad9336c_3.jpg\",\"671c84ad93590_2.jpg\",\"671c84ad93794_1.jpg\",\"671c84ad93a5f_4.jpg\"]', 'world-of-veg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `main_category_id`, `subcategory_name`, `slug`) VALUES
(20, 11, 'Integrated Projects', 'integrated-projects'),
(22, 11, 'Conservation Projects', 'conservation-projects'),
(23, 12, 'Interior Designs', 'interior-designs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `main_id` (`main_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_category_id` (`main_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`main_id`) REFERENCES `main_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `main_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
