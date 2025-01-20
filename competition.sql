-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 01:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competition`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `img`) VALUES
(1, 'Abdul Wahab', 'admin@gmail.com', '$2y$10$SldKdSgXcG7KQU5uBqCJrO3Xg1TiiNAiwMw4OOB9fbp7Rq0D04VAC', '../upload/new_profile_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity`
--

CREATE TABLE `admin_activity` (
  `id` int(11) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_activity`
--

INSERT INTO `admin_activity` (`id`, `admin`, `action`, `date_time`) VALUES
(1, 'admin@gmail.com', 'Admin Logged In', '2024-02-02 23:20:24'),
(2, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:22:33'),
(3, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:27:37'),
(4, 'admin@gmail.com', 'User Deleted id ( 14 )', '2024-02-03 03:36:18'),
(5, 'admin@gmail.com', 'New user created ( wahaj_khan_@ )', '2024-02-03 03:36:45'),
(6, 'admin@gmail.com', 'Admin Update ProfileAbdul Wahab and admin@gmail.com', '2024-02-03 03:37:25'),
(7, 'admin@gmail.com', 'Admin Update Profile (Abdul Wahab and admin@gmail.com )', '2024-02-03 03:38:31'),
(8, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:39:42'),
(9, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:42:01'),
(10, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:43:36'),
(11, 'admin@gmail.com', 'User Deleted id ( 16 )', '2024-02-03 03:43:45'),
(12, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:45:33'),
(13, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:48:53'),
(14, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 03:49:58'),
(15, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 10:54:25'),
(16, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 10:55:04'),
(17, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 11:35:49'),
(18, 'admin@gmail.com', 'User Deleted id ( 17 )', '2024-02-03 11:36:12'),
(19, 'admin@gmail.com', 'New user created ( Samad )', '2024-02-03 11:38:12'),
(20, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 12:36:49'),
(21, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 13:08:00'),
(22, 'admin@gmail.com', 'New Subject Added ( PHP )', '2024-02-03 13:52:39'),
(23, 'admin@gmail.com', 'New Subject Added ( PHP )', '2024-02-03 13:59:21'),
(24, 'admin@gmail.com', 'Subject Deleted id ( 1 )', '2024-02-03 14:03:46'),
(25, 'admin@gmail.com', 'New Subject Added ( HTML )', '2024-02-03 14:04:22'),
(26, 'admin@gmail.com', 'Subject Deleted id ( 2 )', '2024-02-03 14:04:32'),
(27, 'admin@gmail.com', 'New Subject Added ( PHP )', '2024-02-03 14:04:48'),
(28, 'admin@gmail.com', 'New Subject Added ( HTML )', '2024-02-03 14:04:57'),
(29, 'admin@gmail.com', 'New Resource Added ( PHP )', '2024-02-03 14:27:49'),
(30, 'admin@gmail.com', 'New Resource Added ( CSS )', '2024-02-03 15:45:02'),
(31, 'admin@gmail.com', 'New Resource Added ( JS )', '2024-02-03 15:46:11'),
(32, 'admin@gmail.com', 'New Resource Added ( PHP )', '2024-02-03 15:51:12'),
(33, 'admin@gmail.com', 'New Resource Added ( JAVA )', '2024-02-03 15:54:16'),
(34, 'admin@gmail.com', 'New Subject Added ( JAVA )', '2024-02-03 15:58:32'),
(35, 'admin@gmail.com', 'New Subject Added ( .NET )', '2024-02-03 16:00:17'),
(36, 'admin@gmail.com', 'Admin Update Profile (Abdul Samad and admin@gmail.com )', '2024-02-03 16:04:27'),
(37, 'admin@gmail.com', 'Admin Update Profile (Abdul Samad and admin@gmail.com )', '2024-02-03 16:05:01'),
(38, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 16:05:20'),
(39, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 16:25:46'),
(40, 'admin@gmail.com', 'New Subject Added ( LARAVEL )', '2024-02-03 17:05:03'),
(41, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 17:09:42'),
(42, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 17:22:13'),
(43, 'admin@gmail.com', 'Admin Logged In', '2024-02-03 17:31:51'),
(44, 'admin@gmail.com', 'Admin Update Profile (Abdul Samad and admin@gmail.com )', '2024-02-03 17:32:08'),
(45, 'admin@gmail.com', 'Admin Logged In', '2024-02-04 15:06:24'),
(46, 'admin@gmail.com', 'New Subject Added ( LARAVEL )', '2024-02-04 15:08:52'),
(47, 'admin@gmail.com', 'New Resource Added ( LARAVEL 10 )', '2024-02-04 15:10:50'),
(48, 'admin@gmail.com', 'Admin Logged In', '2024-02-04 15:14:53'),
(49, 'admin@gmail.com', 'Admin Logged In', '2024-02-04 18:54:33'),
(50, 'admin@gmail.com', 'Admin Update Profile (Abdul Samad and admin@gmail.com )', '2024-02-04 19:03:58'),
(51, 'admin@gmail.com', 'Admin Logged In', '2024-02-04 19:04:23'),
(52, 'admin@gmail.com', 'Admin Logged In', '2024-02-04 19:07:13'),
(53, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 14:42:38'),
(54, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 17:22:29'),
(55, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 17:57:43'),
(56, 'admin@gmail.com', 'Admin Update Profile (Abdul Wahab and admin@gmail.com )', '2024-02-20 17:58:30'),
(57, 'admin@gmail.com', 'Admin Update Profile (Abdul Wahab and admin@gmail.com )', '2024-02-20 18:00:32'),
(58, 'admin@gmail.com', 'Admin Update Profile (Abdul Wahab and admin@gmail.com )', '2024-02-20 18:03:59'),
(59, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 19:00:18'),
(60, 'admin@gmail.com', 'Admin Update Profile (admin@gmail.com and  )', '2024-02-20 19:08:27'),
(61, 'admin@gmail.com', 'Admin Update Profile (admin@gmail.com and  )', '2024-02-20 19:11:04'),
(62, 'admin@gmail.com', 'Admin Update Profile', '2024-02-20 19:16:01'),
(63, 'admin@gmail.com', 'Admin Update Profile', '2024-02-20 19:22:29'),
(64, 'admin@gmail.com', 'Admin Update Profile', '2024-02-20 19:22:35'),
(65, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 19:54:04'),
(66, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 20:08:31'),
(67, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 20:28:18'),
(68, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 20:29:30'),
(69, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 21:57:25'),
(70, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 21:58:51'),
(71, 'admin@gmail.com', 'Admin Logged In', '2024-02-20 22:03:09'),
(72, 'admin@gmail.com', 'Admin Logged In', '2024-02-21 01:29:37'),
(73, 'admin@gmail.com', 'Admin Logged In', '2024-02-21 01:36:43'),
(74, 'admin@gmail.com', 'Admin Logged In', '2024-02-21 01:39:19'),
(75, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 01:40:45'),
(76, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 01:41:00'),
(77, 'admin@gmail.com', 'Admin Logged In', '2024-02-21 12:44:38'),
(78, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 12:44:52'),
(79, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 12:45:20'),
(80, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 12:45:34'),
(81, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 12:45:44'),
(82, 'admin@gmail.com', 'Admin Logged In', '2024-02-21 18:48:15'),
(83, 'admin@gmail.com', 'Admin Update Profile', '2024-02-21 18:48:40'),
(84, 'Abdul Samad', 'Admin Logged In', '2024-02-21 18:54:12'),
(85, 'Abdul Samad', 'Admin Logged In', '2024-02-21 18:54:58'),
(86, 'Abdul Samad', 'New Author Added (  )', '2024-02-21 19:08:09'),
(87, 'Abdul Samad', 'New Author Added (  )', '2024-02-21 19:08:22'),
(88, 'Abdul Samad', 'New Author Added ( Noor ul Sajdeen )', '2024-02-21 19:25:56'),
(89, 'Abdul Samad', 'New Genre Added ( samad )', '2024-02-21 19:32:18'),
(90, 'Abdul Samad', 'New Novel Added ( Photography )', '2024-02-21 20:05:00'),
(91, 'Abdul Samad', 'New Novel Added ( Cricket )', '2024-02-21 20:09:35'),
(92, 'Abdul Samad', 'New Novel Added ( test )', '2024-02-22 00:40:37'),
(93, 'Abdul Samad', 'New Novel Added ( testing )', '2024-02-22 00:46:11'),
(94, 'Abdul Samad', 'New Novel Added ( testing )', '2024-02-22 00:48:14'),
(95, 'Abdul Samad', 'New Novel Added ( test )', '2024-02-22 00:50:51'),
(96, 'Abdul Samad', 'New Novel Added ( testt )', '2024-02-22 00:57:58'),
(97, 'Abdul Samad', 'Admin Logged In', '2024-02-22 19:04:49'),
(98, 'Abdul Samad', 'Admin Logged In', '2024-02-22 19:17:48'),
(99, 'Abdul Samad', 'Admin Logged In', '2024-02-22 19:20:19'),
(100, 'Abdul Samad', 'Admin Update Profile', '2024-02-22 19:22:20'),
(101, 'Abdul Samad', 'Admin Logged In', '2024-02-23 04:03:24'),
(102, 'Abdul Samad', 'Admin Update Profile', '2024-02-23 04:07:15'),
(103, 'admin@gmail.com', 'Admin Logged In', '2024-02-23 04:16:52'),
(104, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:17:03'),
(105, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:20:07'),
(106, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:20:19'),
(107, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:20:23'),
(108, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:20:39'),
(109, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:22:04'),
(110, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:22:18'),
(111, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:22:29'),
(112, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:22:49'),
(113, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:23:47'),
(114, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:23:52'),
(115, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:25:03'),
(116, 'admin@gmail.com', 'Admin Update Profile', '2024-02-23 04:26:33'),
(117, 'admin@gmail.com', 'Admin Logged In', '2024-02-23 04:44:27'),
(118, 'admin@gmail.com', 'Admin Logged In', '2024-02-23 14:37:19'),
(119, 'admin@gmail.com', 'New Genre Added ( Horror )', '2024-02-23 14:43:07'),
(120, 'admin@gmail.com', 'New Genre Added ( Mystery )', '2024-02-23 14:44:27'),
(121, 'admin@gmail.com', 'New Genre Added ( Thriller )', '2024-02-23 14:44:46'),
(122, 'admin@gmail.com', 'New Genre Added ( Sci-Fi )', '2024-02-23 14:45:12'),
(123, 'admin@gmail.com', 'New Genre Added ( Fantasy )', '2024-02-23 14:45:31'),
(124, 'admin@gmail.com', 'New Genre Added ( Drama )', '2024-02-23 14:45:39'),
(125, 'admin@gmail.com', 'New Genre Added ( Romance )', '2024-02-23 14:45:46'),
(126, 'admin@gmail.com', 'New Genre Added ( Adventure )', '2024-02-23 14:45:58'),
(127, 'admin@gmail.com', 'New Genre Added ( Comedy )', '2024-02-23 14:46:07'),
(128, 'admin@gmail.com', 'New Genre Added ( Children Literature )', '2024-02-23 14:50:54'),
(129, 'admin@gmail.com', 'New Novel Added ( The Resthouse )', '2024-02-23 15:51:15'),
(130, 'admin@gmail.com', 'New Novel Added ( Jinnah Vision )', '2024-02-23 16:04:17'),
(131, 'admin@gmail.com', 'Admin Logged In', '2024-02-23 18:54:20'),
(132, 'admin@gmail.com', 'New Novel Added ( Don\'t Open the window )', '2024-02-23 19:00:41'),
(133, 'admin@gmail.com', 'Admin Logged In', '2024-02-23 23:05:26'),
(134, 'admin@gmail.com', 'Admin Logged In', '2024-02-24 01:06:21'),
(135, 'admin@gmail.com', 'Admin Logged In', '2024-02-24 02:28:56'),
(136, 'admin@gmail.com', 'Admin Logged In', '2024-02-24 14:13:32'),
(137, 'admin@gmail.com', 'Genre Deleted id ( 6 )', '2024-02-24 14:15:01'),
(138, 'admin@gmail.com', 'New Genre Added ( Fantasy )', '2024-02-24 14:15:26'),
(139, 'admin@gmail.com', 'Author Deleted id ( 1 )', '2024-02-24 14:15:35'),
(140, 'admin@gmail.com', 'Admin Logged In', '2024-02-24 16:31:56'),
(141, 'admin@gmail.com', 'New Author Added ( Malcolm Archibald )', '2024-02-24 16:39:21'),
(142, 'admin@gmail.com', 'New Genre Added ( Biography )', '2024-02-24 16:40:55'),
(143, 'admin@gmail.com', 'New Novel Added ( The Swordswoman )', '2024-02-24 16:42:57'),
(144, 'admin@gmail.com', 'New Author Added ( Colleen Hoover )', '2024-02-24 16:45:54'),
(145, 'admin@gmail.com', 'New Novel Added ( It Ends With Us )', '2024-02-24 16:47:04'),
(146, 'admin@gmail.com', 'New Author Added ( Mark Twain (Samuel Clemens) )', '2024-02-24 16:48:55'),
(147, 'admin@gmail.com', 'New Novel Added ( Adventures of Huckleberry Finn, )', '2024-02-24 16:49:54'),
(148, 'admin@gmail.com', 'New Author Added ( ADA BELL )', '2024-02-24 16:51:47'),
(149, 'admin@gmail.com', 'New Novel Added ( MYSTIC PIECES )', '2024-02-24 16:52:38'),
(150, 'admin@gmail.com', 'New Author Added ( Malcolm Archibald )', '2024-02-24 16:57:03'),
(151, 'admin@gmail.com', 'New Novel Added ( The Fireraisers )', '2024-02-24 16:59:19'),
(152, 'admin@gmail.com', 'Admin Update Profile', '2024-02-24 17:02:29'),
(153, 'admin@gmail.com', 'Admin Logged In', '2024-02-24 17:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `biography` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `biography`) VALUES
(1, 'Malcolm Archibald', 'Copyright (C) 2016 Malcolm Archibald Layout design and Copyright (C) 2022 by Next Chapter Published 2022 by Next Chapter Cover art by Cover Mint Edited by Lorna Read'),
(2, 'Colleen Hoover', 'For my father, who tried his very best not to be his worst. And for my mother, who made sure we never saw him at his worst'),
(3, 'Mark Twain (Samuel Clemens)', 'Author: Mark Twain (Samuel Clemens) Release Date: August 20, 2006 [EBook #76] Last Updated: May 25, 2018 Language: English'),
(4, 'ADA BELL', 'Who is one of the kindest, most giving people I know, an amazing auntie, and a terrific writer. Thank you for helping me turn my coal into diamonds.');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `user_id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `bookmarked_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `novel_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `novel_id`, `comment_text`, `comment_date`, `approved`) VALUES
(1, 7, 4, 'This is recommended by me!', '2024-02-24 12:07:57', 1),
(2, 7, 1, 'Great Story!', '2024-02-24 12:08:01', 1),
(3, 7, 2, 'I am very satisfied!', '2024-02-24 12:08:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `name`) VALUES
(2, 'Horror'),
(3, 'Mystery'),
(4, 'Thriller'),
(5, 'Sci-Fi'),
(7, 'Drama'),
(8, 'Romance'),
(9, 'Adventure'),
(10, 'Comedy'),
(11, 'Children Literature'),
(12, 'Fantasy'),
(13, 'Biography');

-- --------------------------------------------------------

--
-- Table structure for table `novels`
--

CREATE TABLE `novels` (
  `novel_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `banner` text NOT NULL,
  `description` text NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `novels`
--

INSERT INTO `novels` (`novel_id`, `title`, `author_id`, `genre_id`, `publication_date`, `banner`, `description`, `file`) VALUES
(1, 'The Swordswoman', 1, 13, '2024-02-24', './upload/1708774977_8c1ab540bf9e284d.jpg', 'This book is a work of fiction. Names, characters, places, and incidents are the product of the author\'s imagination or are used fictitiously. Any resemblance to actual events, locales, or persons, living or dead, is purely coincidental.', './upload/1708774977_4aa680cc86bc5ea4.pdf'),
(2, 'It Ends With Us', 2, 8, '2024-02-24', './upload/1708775224_6fe14acfc8efe2e7.jpg', 'For my father, who tried his very best not to be his worst. And for my mother, who made sure we never saw him at his worst', './upload/1708775224_7ac056f8eeaed361.pdf'),
(3, 'Adventures of Huckleberry Finn,', 3, 9, '2024-02-24', './upload/1708775394_1f1ac326115a11b2.jpg', 'This eBook is for the use of anyone anywhere at no cost and with almost no restrictions whatsoever. You may copy it, give it away or re-use it under the terms of the Project ', './upload/1708775394_8e3ff63a0405df89.pdf'),
(4, 'MYSTIC PIECES', 4, 3, '2024-02-24', './upload/1708775558_97db627744eb95e3.jpg', 'The attached novel is a work of fiction. Any resemblance to actual persons, places, or events is merely a coincidence.', './upload/1708775558_26aee93f1b63f4f9.pdf'),
(5, 'The Fireraisers', 1, 2, '2024-02-24', './upload/1708775959_fa90213a143fd24d.jpg', 'PROLOGUE: WASHINGTON, UNITED STATES: APRIL 1862 Silhouetted against the window, the man was rangy with narrow shoulders and a head that seemed too large for his body. Allowing his companions to settle, he stepped forward to the table. The room crackled with tension, barely relieved by the birdsong that sweetened the humid air. The rangy man adjusted the fit of his coat and placed his tall hat on the polished table.', './upload/1708775959_74779c24f926139a.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `novel_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `user_img` text NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `password_hash`, `role`, `user_img`) VALUES
(2, 'admin@gmail.com', 'ABDUL WAHAB', '$2y$10$8aVSTufxSt48kQpDdxm2mukS/mnC1eV2cIuhvDzTyNYBgf5t658eO', 'admin', '../upload/new_profile_image.jpg'),
(7, 'Wahababbasi923@gmail.com', 'ABDUL WAHAB', '$2y$10$00AAdZggW5swUJhd6S6xZOKmhZ9awr6q8lhN0SElvp26ahHE5LpuC', 'user', './upload/new_profile_image7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `novel` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `history_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `user_id` int(11) NOT NULL,
  `preferred_genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_activity`
--
ALTER TABLE `admin_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`user_id`,`novel_id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `novels`
--
ALTER TABLE `novels`
  ADD PRIMARY KEY (`novel_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`user_id`,`preferred_genre_id`),
  ADD KEY `preferred_genre_id` (`preferred_genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_activity`
--
ALTER TABLE `admin_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `novels`
--
ALTER TABLE `novels`
  MODIFY `novel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`novel_id`) REFERENCES `novels` (`novel_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`novel_id`) REFERENCES `novels` (`novel_id`);

--
-- Constraints for table `novels`
--
ALTER TABLE `novels`
  ADD CONSTRAINT `novels_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `novels_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`novel_id`) REFERENCES `novels` (`novel_id`);

--
-- Constraints for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD CONSTRAINT `user_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_preferences_ibfk_2` FOREIGN KEY (`preferred_genre_id`) REFERENCES `genres` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
