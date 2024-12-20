-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 01:41 PM
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
(11, 'Architectural', 'architectural'),
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
  `post_images` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_name`, `thumbnail_image`, `sub_id`, `main_id`, `details`, `status`, `location`, `post_images`, `slug`) VALUES
(59, 'Charter Luxury', '[\"674e94b450611_thumbnail.jpg\"]', 27, 11, '', '', '', '[\"67501b85cd59c_1 - Copy.jpg\"]', 'charter-luxury'),
(60, 'S9 A Lux Living', '[\"674e957c569a0_1.jpg\"]', 27, 11, '', '', '', '[\"674e957c56c86_2.jpg\"]', 's9-a-lux-living'),
(62, 'Mount Unique', '[\"674e99074ad5d_thumbnail.jpg\"]', 27, 11, '', '', '', '[\"674e99074b29a_1.jpg\",\"674e99074b7f3_2.jpg\",\"674e99074bc39_3.jpg\",\"674e99074bffa_4.jpg\",\"674e99074c316_5.jpg\",\"674e99074c638_6.jpg\",\"674e99074c98a_7.jpg\",\"674e99074cf83_8.jpg\"]', 'mount-unique'),
(63, 'Refined Luxury', '[\"674e99a49a052_thumbnail.jpg\"]', 27, 11, '', '', '', '[\"674e99a49a3be_1.jpg\"]', 'refined-luxury'),
(64, 'Captivating Ins and Outs', '[\"674e9c467c343_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674e9c467c607_1.jpg\",\"674e9c467c85a_2.jpg\",\"674e9c467cc73_3.jpg\"]', 'captivating-ins-and-outs'),
(65, 'Reflecting Planes', '[\"674ea27657d85_thumbnail.JPG\"]', 28, 11, '', '', '', '[\"674ea276587dc_1.JPG\",\"674ea27658e79_2.jpg\",\"674ea27659445_3.JPG\",\"674ea27659866_4.JPG\",\"674ea27659ebb_5.jpg\",\"674ea2765a44a_6.JPG\"]', 'reflecting-planes'),
(66, 'Present Times', '[\"674ea361b6828_thumbnail.JPG\"]', 28, 11, '', '', '', '[\"674ea361b6b40_1.JPG\",\"674ea361b6d68_2.JPG\"]', 'present-times'),
(69, 'Layered Blend', '[\"674ea83d5a435_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674ea83d5a6a3_1.jpg\"]', 'layered-blend'),
(70, 'Advait', '[\"674eab922805a_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674eab92283d4_1.jpg\",\"674eab922863f_2.jpg\",\"674eab9228847_3.jpg\",\"674eab9228b4f_4.jpg\",\"674eab9228d8f_5.jpg\",\"674eab9228f67_6.jpg\",\"674eab922910f_7.jpg\",\"674eab92292c5_8.jpg\",\"674eab922945d_9.jpg\",\"674eab9229617_10.jpg\",\"674eab9229798_11.jpg\"]', 'advait'),
(71, 'Gentle Courteous', '[\"674ead1c9e76f_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674ead1c9ebfe_1.jpg\",\"674ead1c9f1cc_2.jpg\"]', 'gentle-courteous'),
(73, 'Aspirational Lifestyle', '[\"674eaec1ebdb2_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674eaec1ec01e_1.jpg\",\"674eaec1ec196_2.jpg\"]', 'aspirational-lifestyle'),
(74, 'Clean Linear Diagram', '[\"674eb037b27a1_thumbnail.JPG\"]', 28, 11, '', '', '', '[\"674eb037b29a8_1.JPG\",\"674eb037b2b4e_2.JPG\"]', 'clean-linear-diagram'),
(75, 'Four Seasons', '[\"674eb1098c6d0_thumbnail.JPG\"]', 28, 11, '', '', '', '[\"674eb1098c963_1.JPG\",\"674eb1098cd1f_2.JPG\"]', 'four-seasons'),
(89, 'Miraki A Through House', '[\"674ec6018398f_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674ec60183bd0_1.jpg\",\"674ec60183e55_2.jpg\",\"674ec601840b8_3.jpg\",\"674ec60184309_4.jpg\",\"674ec60184519_5.jpg\",\"674ec601846d7_6.jpg\",\"674ec6018484e_7.jpg\",\"674ec601849be_8.jpg\",\"674ec60184ba0_9.jpg\",\"674ec60184d5e_10.jpg\",\"674ec60184f2b_11.jpg\",\"674ec601850a3_12.jpg\",\"674ec60185208_13.jpg\",\"674ec60185380_14.jpg\",\"674ec60185544_15.jpg\",\"674ec6018a1df_16.jpg\"]', 'miraki-a-through-house'),
(92, 'A House Under Shadow', '[\"674ed88359a4b_thumbnail.jpg\"]', 28, 11, '', 'published', '', '[\"67518b0952fdb_1.JPG\",\"67518b09534bb_2.JPG\",\"67518b095388f_3.jpg\",\"67518b0953b86_4.JPG\",\"67518b0953e67_5.JPG\",\"67518b09540de_6.JPG\",\"67518b095433f_7.JPG\",\"67518b095458f_8.JPG\",\"67518b09547d9_9.JPG\",\"67518b0954a04_10.JPG\",\"67518b0954c3d_11.JPG\",\"67518b0954e8e_12.JPG\",\"67518b09550e2_13.JPG\",\"67518b095535b_14.JPG\",\"67518b0955686_15.JPG\",\"67518b09559ba_16.JPG\",\"67518b0955ce1_17.JPG\",\"67518b09560fa_18.JPG\",\"67518b09563ad_19.JPG\"]', 'a-house-under-shadow'),
(95, 'A Classical Abode', '[\"674ee246b4ac0_thunmbnail.JPG\"]', 28, 11, '', '', '', '[\"674ee246b4edb_1.JPG\",\"674ee246b52db_2.JPG\",\"674ee246b5687_3.JPG\",\"674ee246b5979_4.JPG\",\"674ee246b5cc2_5.JPG\",\"674ee246b5fb1_6.jpg\",\"674ee246b62a1_7.JPG\",\"674ee246b6541_8.JPG\",\"674ee246b6800_9.JPG\",\"674ee246b6aa1_10.JPG\",\"674ee246b6d45_11.JPG\",\"674ee246b724d_12.jpg\",\"674ee246b7624_13.JPG\",\"674ee246b7b83_14.JPG\",\"674ee246b7fcb_15.JPG\",\"674ee246b83be_16.JPG\",\"674ee246b870f_17.JPG\",\"674ee246b8a14_18.jpg\",\"674ee246b8cca_19.jpg\"]', 'a-classical-abode'),
(96, 'Red Brick in Lap of Green', '[\"674ee5565dab7_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"674ee5565dde9_1.jpg\",\"674ee5565e129_2.jpg\",\"674ee5565e3c1_3.jpg\",\"674ee5565e651_4.jpg\",\"674ee5565e8e7_5.jpg\",\"674ee5565ecc2_7.jpg\",\"674ee5565f02f_8.jpg\",\"674ee5565f37e_9.jpg\",\"674ee5565f672_10.jpg\",\"674ee5565fb00_11.jpg\",\"674ee556600cc_12.jpg\",\"674ee556605b3_13.jpg\"]', 'red-brick-in-lap-of-green'),
(97, 'Nandati', '[\"674fe689977f2_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"67518e31ea267_1.jpg\",\"67518e474ca19_2.jpg\",\"67518e474ce05_3.jpg\",\"67518e474d1b2_4.jpg\",\"67518e474d594_5.jpg\",\"67518e474d844_6.jpg\",\"67518e474dbba_7.jpg\",\"67518e474dec6_8.jpg\",\"67518e474e281_9.jpg\",\"67518e474e66f_10.jpg\",\"67518e474ea20_11.jpg\",\"67518e474eea7_12.jpg\",\"67518e474f277_13.jpg\",\"67518e474f5b5_14.jpg\",\"67518e474f8b5_15.jpg\",\"67518e474fb0f_16.jpg\",\"67518e474fd7b_17.jpg\",\"67518e474fff7_18.jpg\"]', 'nandati'),
(98, 'Timber in Valley', '[\"674feda761263_thumbnail.JPG\"]', 28, 11, '', '', '', '[\"674feda7616d9_1.jpg\",\"674feda761ccd_2.JPG\",\"674feda7622ef_3.jpg\",\"674feda76273d_4.jpg\",\"674feda76422c_5.jpg\",\"674feda764651_6.jpg\",\"674feda764a20_7.jpg\"]', 'timber-in-valley'),
(99, 'Minimalist Abode', '[\"674ff11657b47_thumbnail.JPG\"]', 28, 11, '', '', '', '[\"674ff11657df4_1.JPG\",\"674ff11658053_2.JPG\",\"674ff116582ce_3.JPG\",\"674ff11658521_4.JPG\",\"674ff1165877c_5.JPG\",\"674ff116589d5_6.JPG\",\"674ff11658c27_7.JPG\",\"674ff11658e6c_8.JPG\",\"674ff116590ae_9.JPG\",\"674ff11659309_10.JPG\",\"674ff1165954b_11.JPG\",\"674ff116598d7_12.JPG\",\"674ff11659bf3_13.JPG\",\"674ff11659e2e_14.JPG\",\"674ff1165a06f_15.JPG\",\"674ff1165a29b_16.JPG\",\"674ff1165a463_17.JPG\",\"674ff1165a61f_18.JPG\",\"674ff1165a7dd_19.JPG\"]', 'minimalist-abode'),
(100, 'Sublime Unparalleled Permutation', '[\"674ff4576b2b0_thumbnail.jpg\"]', 28, 11, '', '', '', '[\"67518fbf43bda_1c.jpg\",\"67518fec1e550_2.jpg\",\"67518fec1ef36_3.jpg\",\"67518fec1f6f1_5.jpg\",\"67518fec1fb93_6.jpg\",\"67518fec1ff15_11.jpg\",\"67518fec20244_11a.jpg\",\"67518fec2051d_14.jpg\",\"67518fec20835_16.jpg\",\"67518fec20b2f_21.jpg\",\"67518fec20ebc_27.jpg\",\"67518fec2120d_31.jpg\",\"67518fec21527_37.jpg\",\"67518fec2194b_39.jpg\",\"67518fec21e8e_43.jpg\",\"67518fec222e6_50a.jpg\",\"67518fec226a3_57.jpg\",\"67518fec229ca_61.jpg\"]', 'sublime-unparalleled-permutation'),
(101, 'Kothrud Centre', '[\"674ff5ae71f6a_thumbnail.jpg\"]', 29, 11, '', '', '', '[\"675198256490c_1.jpg\",\"6751982564d2a_2.jpg\",\"675198256517c_3.jpg\"]', 'kothrud-centre'),
(102, 'Ramsukh House', '[\"674ff6e1e6482_thumbnail.jpg\"]', 29, 11, '', '', '', '[\"67519a7ebd35e_3.jpg\",\"67519a7ebdbc6_4.jpg\",\"67519a7ebe5d9_5.jpg\",\"67519a7ebecc6_6.jpg\",\"67519a7ebf19a_7.jpg\",\"67519a7ebf556_8.jpg\",\"67519a7ebf896_9.jpg\",\"67519a7ebfbf7_10.jpg\",\"67519a7ebfea2_11.jpg\",\"67519a7ec01d7_12.jpg\",\"67519a7ec04b9_13.jpg\",\"67519a7ec076c_14.jpg\"]', 'ramsukh-house'),
(103, 'Signature Business Centre', '[\"674ff90b6827e_thumbnail.jpg\"]', 29, 11, '', '', '', '[\"67519b9606498_1.jpg\",\"67519b96068f8_2.jpg\",\"67519b9606ee8_3.jpg\",\"67519b96074e1_4.jpg\",\"67519b960799b_5.jpg\",\"67519b9607fdc_6.jpg\"]', 'signature-business-centre'),
(104, 'Hostel Elevating Young Spirits', '[\"674ff9d959bda_thumbnail.jpg\"]', 29, 11, '', '', '', '[\"67519c3402fef_1.jpg\",\"67519c3403510_2.jpg\",\"67519c3403999_3.jpg\",\"67519c3403f43_4.jpg\"]', 'hostel-elevating-young-spirits'),
(105, 'V.N. Lahoti Hostel', '[\"674ffae46529d_thumbnail.jpg\"]', 29, 11, '', '', '', '[\"67519d1ae626b_01.jpg\",\"67519d1ae6527_02.jpeg\",\"67519d1ae67a7_03.jpg\",\"67519d1ae69f9_04.jpg\",\"67519d1ae6c6a_05.jpeg\",\"67519d1ae6ef7_06.jpeg\",\"67519d1ae7173_07.jpg\",\"67519d1ae73ed_10.jpeg\"]', 'v-n-lahoti-hostel'),
(106, 'Dhanvilla', '[\"674ffc945279e_thumbnail.jpg\"]', 30, 11, '', '', '', '[\"67519e20147ca_1.jpg\",\"67519e2014d27_2.jpg\",\"67519e201521d_3.jpg\",\"67519e20156c2_4.jpg\",\"67519e2015eaf_5.jpg\",\"67519e20161db_6.jpg\",\"67519e2016456_7.jpg\",\"67519e20166d3_8.jpg\",\"67519e2016a41_9.jpg\",\"67519e2016df0_10.jpg\",\"67519e2017165_12.jpg\",\"67519e201746a_13.jpg\"]', 'dhanvilla'),
(107, 'Raceview Cottage', '[\"674ffd9faba6c_thumbnail.jpg\"]', 30, 11, '', '', '', '[\"67519ed2ac9f2_1.jpg\",\"67519ed2acc4d_2.jpg\",\"67519ed2ace92_3.jpg\",\"67519ed2ad0d0_4.jpg\",\"67519ed2ad290_5.jpg\",\"67519ed2ad44f_7.jpg\",\"67519ed2ad627_8.jpg\",\"67519ed2ad800_9.jpg\"]', 'raceview-cottage'),
(108, 'New Mahabaleshwar Ramsukh Resorts', '[\"675000c80b56f_thumbnail.jpg\"]', 31, 11, '', '', '', '[\"675000c80b85c_1.jpg\",\"675000c80baaf_2.jpg\",\"675000c80bd13_3.jpg\",\"675000c80befc_4.jpg\",\"675000c80c152_5.jpg\",\"675000c80c308_6.jpg\",\"675000c80c4ce_7.jpg\",\"675000c80c6e6_8.jpg\",\"675000c80c8bb_9.jpg\",\"675000c80ca55_10.jpg\",\"675000c80cc51_11.jpg\"]', 'new-mahabaleshwar-ramsukh-resorts'),
(109, 'Bellavista', '[\"675001d3aebda_thumbnail.JPG\"]', 31, 11, '', '', '', '[\"6751a021d9abd_1.JPG\",\"6751a021d9d49_2.JPG\",\"6751a021d9fa2_3.JPG\",\"6751a021da1e4_4.JPG\",\"6751a021da443_5.JPG\",\"6751a021da68d_6.JPG\"]', 'bellavista'),
(110, 'Earth and Star', '[\"6750036f58974_thumbnail.jpg\"]', 31, 11, '', '', '', '[\"6751a4cb9b16e__DSC3228.jpg\",\"6751a4cb9b59d__DSC3231.jpg\",\"6751a4cb9b893__DSC3243.jpg\",\"6751a4cb9bc22__DSC3249.jpg\",\"6751a4cb9c0f3__DSC3265.jpg\",\"6751a4cb9c508__DSC3292.jpg\",\"6751a4cb9c7bb__DSC3295.jpg\",\"6751a4cb9ca9e__DSC3304.jpg\",\"6751a4cb9cd47__DSC3315.jpg\",\"6751a4cb9cff9__DSC3320.jpg\",\"6751a4cb9d346__DSC3323.jpg\"]', 'earth-and-star-integrated-project'),
(111, 'Holistic Inspired Advait', '[\"675005756d1b5_thumbnail.jpg\"]', 31, 11, '', '', '', '[\"6751a14c76746_1.JPG\",\"6751a14c76a7f_2.jpg\",\"6751a14c76cfc_3.jpg\",\"6751a14c76fbd_4.jpg\",\"6751a14c77272_5.JPG\",\"6751a14c77555_6.JPG\",\"6751a14c77833_7.JPG\",\"6751a14c77b77_8.JPG\",\"6751a14c77df5_9.jpg\",\"6751a14c78039_10.jpg\",\"6751a14c78398_11.jpg\",\"6751a14c7863d_12.jpg\",\"6751a14c788b6_13.JPG\",\"6751a14c78aee_14.JPG\"]', 'holistic-inspired-advait'),
(112, 'Heritage Amidst Green', '[\"675006a3aac39_thumbnail.jpg\"]', 31, 11, '', '', '', '[\"6751a236c2db6_1.1.jpg\",\"6751a236c319a_2.jpg\",\"6751a236c3542_3.jpg\",\"6751a236c3905_4.jpg\",\"6751a236c3c6e_5.jpg\",\"6751a236c4021_6.jpg\",\"6751a236c438a_7.jpg\",\"6751a236c46e7_8.jpg\",\"6751a236c49c0_9.jpg\",\"6751a236c4cd0_10.jpg\",\"6751a236c5014_11.jpg\"]', 'heritage-amidst-green'),
(113, 'Solitaires in Nature', '[\"675008025cf14_thumbnail.JPG\"]', 31, 11, '', '', '', '[\"6751a39d46d49_1.jpg\",\"6751a39d4703f_2.JPG\",\"6751a39d4733a_3.jpg\",\"6751a39d4760e_4.jpg\",\"6751a39d47893_5.JPG\",\"6751a39d47b0d_6.jpg\",\"6751a39d47d89_7.jpg\",\"6751a39d48031_8.jpg\",\"6751a39d483d7_9.jpg\",\"6751a39d487b4_10.jpg\",\"6751a39d48cc4_11.jpg\",\"6751a39d4913f_12.jpg\",\"6751a39d49484_13.jpg\",\"6751a39d49732_14.jpg\",\"6751a39d49a98_15.jpg\",\"6751a39d49d71_16.jpg\"]', 'solitaires-in-nature'),
(114, 'Loghut', '[\"6750099f51542_thumbnail.jpg\"]', 31, 11, '', '', '', '[\"6751a3db19d94_DSC_8833.jpg\",\"6751a3db1a01a_DSC_8862.jpg\",\"6751a3db1a2bd_DSC_8877.jpg\",\"6751a3db1a5ed_DSC_8886.jpg\",\"6751a3db1a8f0_DSC_8888.jpg\",\"6751a3db1ad0e_DSC_8889.jpg\",\"6751a3db1b0ce_DSC_8894.jpg\",\"6751a3db1b4c6_DSC_8896.jpg\"]', 'loghut'),
(121, 'Luxury With Details', '[\"675192d044c19_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"675192d044ee8_1.jpg\",\"675192d0450c6_2.jpg\",\"675192d04529a_3.jpg\",\"675192d0454bf_4.jpg\",\"675192d0456d7_5.jpg\",\"675192d0458da_6.jpg\",\"675192d045af8_7.jpg\",\"675192d045cd5_8.jpg\",\"675192d045eb7_9.jpg\",\"675192d046118_10.jpg\"]', 'luxury-with-details'),
(122, 'Art Collective', '[\"6751932265ebf_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"6751932266217_1.jpg\",\"6751932266668_2.jpg\",\"67519322669ad_3.jpg\",\"6751932266cb7_4.jpg\",\"6751932266faf_5.jpg\",\"6751932267376_6.jpg\",\"67519322676cb_7.jpg\",\"67519322679f7_8.jpg\",\"6751932267d4d_9.jpg\"]', 'art-collective'),
(123, 'Captivating Senses', '[\"6751933dc27e8_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"6751933dc2c0a_1.jpg\",\"6751933dc32dd_2.jpg\",\"6751933dc3858_3.jpg\",\"6751933dc3bc1_4.jpg\",\"6751933dc3eaa_5.jpg\",\"6751933dc4198_6.jpg\",\"6751933dc4403_7.jpg\",\"6751933dc46af_8.jpg\",\"6751933dc493b_9.jpg\"]', 'captivating-senses'),
(124, 'A Lounge in Sky', '[\"6751938fe9edc_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"6751938fea1d5_1.jpg\",\"6751938fea56d_2.jpg\",\"6751938fea9a6_3.jpg\",\"6751938feadca_4.jpg\",\"6751938feb1f9_5.jpg\",\"6751938feb604_6.jpg\",\"6751938febb05_7.jpg\",\"6751938febe32_8.jpg\",\"6751938fec0be_9.jpg\",\"6751938fec373_10.jpg\",\"6751938fec60e_11.jpg\",\"6751938fec9bd_12.jpg\",\"6751938fecc97_13.jpg\"]', 'a-lounge-in-sky'),
(125, 'Timeless Vocabulary', '[\"675193a9173c9_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"675193a91772a_1.jpg\",\"675193a917b1a_2.jpg\",\"675193a917e5a_3.jpg\",\"675193a9180fb_4.jpg\",\"675193a918387_5.jpg\",\"675193a9185f4_6.jpg\",\"675193a91884b_7.jpg\",\"675193a918aad_8.jpg\",\"675193a918cfb_9.jpg\",\"675193a918f73_10.jpg\",\"675193a9191be_11.jpg\",\"675193a91943c_12.jpg\",\"675193a9196a8_13.jpg\",\"675193a9198f4_14.jpg\",\"675193a919b87_15.jpg\"]', 'timeless-vocabulary'),
(126, 'A Glamorous Living', '[\"675193ca25e6e_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"675193ca26152_1.jpg\",\"675193ca26426_2.jpg\",\"675193ca26768_3.jpg\",\"675193ca26a65_4.jpg\",\"675193ca26d2c_5.jpg\",\"675193ca26fad_6.jpg\",\"675193ca27225_7.jpg\",\"675193ca2749f_8.jpg\"]', 'a-glamorous-living'),
(127, 'Grey, White and Wood', '[\"675193f132405_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"675193f132e04_1.jpg\",\"675193f1333c0_2.jpg\",\"675193f133938_3.jpg\",\"675193f1341db_4.jpg\",\"675193f134835_5.jpg\",\"675193f134caf_6.jpg\",\"675193f13516c_7.jpg\",\"675193f135540_8.jpg\",\"675193f135789_9.jpg\"]', 'grey-white-and-wood'),
(128, 'A Fusion', '[\"6751943db21df_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"6751943db2656_1.jpg\",\"6751943db2ddb_2.jpg\",\"6751943db35f3_3.jpg\",\"6751943db3b92_4.jpg\",\"6751943db41b1_5.jpg\",\"6751943db4639_6.jpg\",\"6751943db4a39_7.jpg\",\"6751943db4f0d_8.jpg\"]', 'a-fusion'),
(129, 'An Ecstatic Expression', '[\"67519462c8fb5_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"67519462c9530_1.jpg\",\"67519462c9a48_2.jpg\",\"67519462c9ea4_3.jpg\",\"67519462ca324_4.jpg\",\"67519462ca6d0_5.jpg\",\"67519462ca9e9_6.jpg\",\"67519462caf4a_7.jpg\",\"67519462cb6bf_8.jpg\",\"67519462cbc5c_9.jpg\",\"67519462cc346_10.jpg\",\"67519462cc6ad_11.jpg\"]', 'an-ecstatic-expression'),
(130, 'Mixing Style', '[\"675194820f389_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"675194820fe13_1.jpg\",\"67519482103bb_2.jpg\",\"6751948210b31_3.jpg\",\"6751948210fed_4.jpg\",\"67519482115f5_5.jpg\"]', 'mixing-style'),
(131, 'Sky Vie - An Integrated Project', '[\"67519499d039a_thumbnail.jpg\"]', 32, 12, '', '', '', '[\"67519499d09e5_1.jpg\",\"67519499d102c_2.jpg\",\"67519499d1454_3.jpg\",\"67519499d19f3_4.jpg\",\"67519499d1ddd_5.jpg\",\"67519499d233c_6.jpg\",\"67519499d26de_7.jpg\",\"67519499d2af7_8.jpg\",\"67519499d2f46_9.jpg\",\"67519499d332f_10.jpg\",\"67519499d3663_11.jpg\"]', 'sky-vie-an-integrated-project'),
(132, 'Collage - Interior Design', '[\"675195aa2ccb5_thumbnail.jpg\"]', 34, 12, '', '', '', '[\"675195aa2d2e5_1.jpg\",\"675195aa2dd21_2.jpg\",\"675195aa2e2a1_3.jpg\",\"675195aa2e879_4.jpg\",\"675195aa2ef3d_5.jpg\",\"675195aa2f6a3_6.jpg\",\"675195aa2fcc7_7.jpg\"]', 'collage-interior-design'),
(133, 'Bhandari', '[\"675195c478b3e_thumbnail.jpg\"]', 34, 12, '', '', '', '[\"675195c478eac_1.jpg\",\"675195c479257_2.jpg\",\"675195c47954e_3.jpg\",\"675195c4798f2_4.jpg\",\"675195c479d46_5.jpg\",\"675195c47a164_6.jpg\",\"675195c47a5ab_7.jpg\",\"675195c47aaa6_8.jpg\",\"675195c47ae49_9.jpg\",\"675195c47b1e7_10.jpg\",\"675195c47b5ac_11.jpg\"]', 'bhandari'),
(134, 'Kothari', '[\"675195e98960e_thumbnail.jpg\"]', 34, 12, '', '', '', '[\"675195e989ca8_1.jpg\",\"675195e98a1e5_2.jpg\",\"675195e98aad5_3.jpg\",\"675195e98b00b_4.jpg\",\"675195e98b557_5.jpg\",\"675195e98bbe9_6.jpg\",\"675195e98bff3_7.jpg\",\"675195e98c293_8.jpg\",\"675195e98c4bd_9.jpg\",\"675195e98c814_10.jpg\",\"675195e98cb2f_11.jpg\"]', 'kothari'),
(135, 'Solitaires in Nature', '[\"675196e878c94_thumbnail.jpg\"]', 35, 12, '', '', '', '[\"675196e879036_1.jpg\",\"675196e8793a7_2.JPG\",\"675196e879878_3.jpg\",\"675196e879b6e_4.jpg\",\"675196e879df2_5.JPG\",\"675196e87a265_6.jpg\",\"675196e87a96b_7.jpg\",\"675196e87adcd_8.jpg\",\"675196e87b1a5_9.jpg\",\"675196e87b564_10.jpg\",\"675196e87b83a_11.jpg\",\"675196e87ba82_12.jpg\",\"675196e87be29_13.jpg\",\"675196e87c070_14.jpg\",\"675196e87c2c0_15.jpg\",\"675196e87c5a9_16.jpg\"]', 'solitaires-in-nature'),
(137, 'Loghut', '[\"675197393ad8f_thumbnail.jpg\"]', 35, 12, '', '', '', '[\"675197393b359_DSC_8833.jpg\",\"675197393b833_DSC_8862.jpg\",\"675197393bb16_DSC_8877.jpg\",\"675197393bd8a_DSC_8886.jpg\",\"675197393c088_DSC_8888.jpg\",\"675197393c484_DSC_8889.jpg\",\"675197393c863_DSC_8894.jpg\",\"675197393cc45_DSC_8896.jpg\"]', 'loghut'),
(138, 'Earth and Star', '[\"675197549e501_thumbnail.jpg\"]', 35, 12, '', '', '', '[\"675197549e81f__DSC3228.jpg\",\"675197549eb74__DSC3231.jpg\",\"675197549f104__DSC3243.jpg\",\"675197549f4e0__DSC3249.jpg\",\"675197549f81b__DSC3265.jpg\",\"675197549fc4b__DSC3292.jpg\",\"675197549ff8a__DSC3295.jpg\",\"67519754a578f__DSC3304.jpg\",\"67519754a5a5d__DSC3315.jpg\",\"67519754a5cbe__DSC3320.jpg\",\"67519754a5f26__DSC3323.jpg\"]', 'earth-and-star'),
(139, 'World of Veg', '[\"6751976fbb467_thumbnail.jpg\"]', 35, 12, '', '', '', '[\"6751976fbb7c2_1.jpg\",\"6751976fbbb7c_2.jpg\",\"6751976fbbf59_3.jpg\",\"6751976fbc23b_4.jpg\",\"6751976fbc48a_5.jpg\",\"6751976fc20ab_6.jpg\",\"6751976fc23b9_7.jpg\",\"6751976fc2716_8.jpg\",\"6751976fc2ade_9.jpg\"]', 'world-of-veg'),
(140, 'Captivating Ins and Outs', '[\"675333dec9a19_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"675333decab82_1.jpg\",\"675333decb2fa_2.jpg\",\"675333decbb9e_3.jpg\"]', 'captivating-ins-and-outs'),
(141, 'Minimalist Abode', '[\"6753341de604c_thumbnail.JPG\"]', 33, 12, '', '', '', '[\"6753341de6682_1.JPG\",\"6753341de6e17_2.JPG\",\"6753341de7509_3.JPG\",\"6753341de7c45_4.JPG\",\"6753341de8474_5.JPG\",\"6753341de8faf_6.JPG\",\"6753341de9815_7.JPG\",\"6753341dea02c_8.JPG\",\"6753341dea927_9.JPG\",\"6753341deafff_10.JPG\",\"6753341deb67c_11.JPG\",\"6753341debde1_12.JPG\",\"6753341dec4c7_13.JPG\",\"6753341decc16_14.JPG\",\"6753341ded5ed_15.JPG\",\"6753341dede26_16.JPG\",\"6753341dee7c4_17.JPG\",\"6753341deeee7_18.JPG\",\"6753341def856_19.JPG\"]', 'minimalist-abode'),
(142, 'Reflecting Planes', '[\"67533476d0f4b_thumbnail.JPG\"]', 33, 12, '', '', '', '[\"67533476d15dd_1.JPG\",\"67533476d1a65_2.jpg\",\"67533476d1e32_3.JPG\",\"67533476d232d_4.JPG\",\"67533476d2623_5.jpg\",\"67533476d28b6_6.JPG\"]', 'reflecting-planes'),
(143, 'Present Times', '[\"675334aa696d6_thumbnail.JPG\"]', 33, 12, '', '', '', '[\"675334aa69c86_1.JPG\",\"675334aa73707_2.JPG\"]', 'present-times'),
(144, 'Layered Blend', '[\"675334d83e5b1_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"675334d83ed6f_1.jpg\"]', 'layered-blend'),
(145, 'Miraki - A Through House', '[\"6753351cdc851_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"6753351cdcd08_1.jpg\",\"6753351cdd25e_2.jpg\",\"6753351cdd73a_3.jpg\",\"6753351cddc2c_4.jpg\",\"6753351cde0bf_5.jpg\",\"6753351cde65d_6.jpg\",\"6753351cdeda3_7.jpg\",\"6753351cdf588_8.jpg\",\"6753351cdfb3d_9.jpg\",\"6753351cdff8a_10.jpg\",\"6753351ce0505_11.jpg\",\"6753351ce09e8_12.jpg\",\"6753351ce0de2_13.jpg\",\"6753351ce12f3_14.jpg\",\"6753351ce1801_15.jpg\",\"6753351ce1c44_16.jpg\"]', 'miraki-a-through-house'),
(146, 'A House Under Shadow', '[\"67533564d25b0_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"67533564d2a40_1.JPG\",\"67533564d305d_2.JPG\",\"67533564d3530_3.jpg\",\"67533564d3885_4.JPG\",\"67533564d3b45_5.JPG\",\"67533564d3e1e_6.JPG\",\"67533564d4148_7.JPG\",\"67533564d4498_8.JPG\",\"67533564d4753_9.JPG\",\"67533564d4a0d_10.JPG\",\"67533564d4d06_11.JPG\",\"67533564d517b_12.JPG\",\"67533564d549e_13.JPG\",\"67533564d575e_14.JPG\",\"67533564d5a14_15.JPG\",\"67533564d5cd2_16.JPG\",\"67533564d5fff_17.JPG\",\"67533564d62ce_18.JPG\",\"67533564d6585_19.JPG\"]', 'a-house-under-shadow'),
(147, 'A Classical Abode', '[\"675335e555a69_thunmbnail.JPG\"]', 33, 12, '', '', '', '[\"675335e555ec5_1.JPG\",\"675335e5561ff_2.JPG\",\"675335e556568_3.JPG\",\"675335e556880_4.JPG\",\"675335e556d4b_5.JPG\",\"675335e5572bf_6.jpg\",\"675335e557678_7.JPG\",\"675335e55797d_8.JPG\",\"675335e557e4d_9.JPG\",\"675335e5581a8_10.JPG\",\"675335e5584c3_11.JPG\",\"675335e558896_12.jpg\",\"675335e558e40_13.JPG\",\"675335e55937a_14.JPG\",\"675335e5596f6_15.JPG\",\"675335e5599f5_16.JPG\",\"675335e559ce0_17.JPG\",\"675335e55a22a_18.jpg\"]', 'a-classical-abode'),
(148, 'Aspirational Lifestyle', '[\"6753365d2393b_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"6753365d2402a_1.jpg\",\"6753365d249fd_2.jpg\"]', 'aspirational-lifestyle'),
(149, 'Gentle Courteous', '[\"675336817285d_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"6753368172e91_1.jpg\",\"6753368173787_2.jpg\"]', 'gentle-courteous'),
(150, 'Advait', '[\"675336a7d7b14_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"675336a7d813a_1.jpg\",\"675336a7d8662_2.jpg\",\"675336a7d8b60_3.jpg\",\"675336a7d905b_4.jpg\",\"675336a7d954f_5.jpg\",\"675336a7d9a3b_6.jpg\",\"675336a7d9f28_7.jpg\",\"675336a7da4c5_8.jpg\",\"675336a7dab00_9.jpg\",\"675336a7db1f1_10.jpg\",\"675336a7db8cf_11.jpg\"]', 'advait'),
(151, 'Red Brick in Lap of Green', '[\"67533788b9192_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"67533788b96d7_1.jpg\",\"67533788b9aa4_2.jpg\",\"67533788b9f6b_3.jpg\",\"67533788ba441_4.jpg\",\"67533788baa20_5.jpg\",\"67533788bae93_7.jpg\",\"67533788bb1f7_8.jpg\",\"67533788bb574_9.jpg\",\"67533788bba02_10.jpg\",\"67533788bc031_11.jpg\",\"67533788bc7eb_12.jpg\",\"67533788bcd06_13.jpg\"]', 'red-brick-in-lap-of-green'),
(152, 'Nandati', '[\"675337d290edb_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"675337d291979_1.jpg\",\"675337d291fa9_2.jpg\",\"675337d29267e_3.jpg\",\"675337d292c8a_4.jpg\",\"675337d2930e3_5.jpg\",\"675337d2934d1_6.jpg\",\"675337d293838_7.jpg\",\"675337d293c84_8.jpg\",\"675337d293fff_9.jpg\",\"675337d2943a6_10.jpg\",\"675337d2946ed_11.jpg\",\"675337d294a5d_12.jpg\",\"675337d294d2e_13.jpg\",\"675337d2950b8_14.jpg\",\"675337d295421_15.jpg\",\"675337d295706_16.jpg\",\"675337d295a1e_17.jpg\",\"675337d295d05_18.jpg\"]', 'nandati'),
(153, 'Clean Linear Diagram', '[\"6753385fe7fc4_thumbnail.JPG\"]', 33, 12, '', '', '', '[\"6753385fe8558_1.JPG\",\"6753385fe886f_2.JPG\"]', 'clean-linear-diagram'),
(154, 'Four Seasons', '[\"675338cb4760b_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"675338cb47c53_1.JPG\",\"675338cb480e9_2.JPG\"]', 'four-seasons'),
(155, 'Timber in Valley', '[\"6753396a9cf5e_thumbnail.JPG\"]', 33, 12, '', '', '', '[\"6753396a9d645_1.jpg\",\"6753396a9dbb3_2.JPG\",\"6753396a9e211_3.jpg\",\"6753396a9e888_4.jpg\",\"6753396a9edb3_5.jpg\",\"6753396a9f337_6.jpg\",\"6753396a9fb4d_7.jpg\"]', 'timber-in-valley'),
(156, 'Sublime Unparalleled Permutation', '[\"675339dcd63dc_thumbnail.jpg\"]', 33, 12, '', '', '', '[\"675339dcd67cb_1c.jpg\",\"675339dcd6af1_2.jpg\",\"675339dcd6df5_3.jpg\",\"675339dcd70e6_5.jpg\",\"675339dcd73d0_6.jpg\",\"675339dcd76bf_11.jpg\",\"675339dcd799e_11a.jpg\",\"675339dcd7c7a_14.jpg\",\"675339dcd7f50_16.jpg\",\"675339dcd824c_17.jpg\",\"675339dcd854e_21.jpg\",\"675339dcd882b_22.jpg\",\"675339dcd8b61_27.jpg\",\"675339dcd8e64_31.jpg\",\"675339dcd9214_37.jpg\",\"675339dcd9592_39.jpg\",\"675339dcd98b7_43.jpg\"]', 'sublime-unparalleled-permutation');

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
(27, 11, 'Apartment Projects', 'apartment-projects'),
(28, 11, 'Bungalows and Villas', 'bungalows-and-villas'),
(29, 11, 'Commercial Projects', 'commercial-projects'),
(30, 11, 'Conservation', 'conservation'),
(31, 11, 'Hospitality Projects', 'hospitality-projects'),
(32, 12, 'Apartment Interiors', 'apartment-interiors'),
(33, 12, 'Bungalows and Villas', 'bungalows-and-villas'),
(34, 12, 'Commercial Interiors', 'commercial-interiors'),
(35, 12, 'Hospitality Interiors', 'hospitality-interiors');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
