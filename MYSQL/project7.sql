-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2017 at 09:44 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project7`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `bookmark_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`bookmark_id`),
  UNIQUE KEY `bookmark_id` (`bookmark_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`bookmark_id`, `user_id`, `event_id`, `updated`, `active`) VALUES
(4, 1, 70, '2017-04-23 08:50:41', 0),
(5, 5, 70, '2017-04-24 14:27:34', 0),
(14, 1, 79, '2017-04-24 09:03:13', 0),
(19, 1, 39, '2017-04-25 11:53:22', 1),
(20, 1, 116, '2017-04-24 14:52:42', 0),
(22, 1, 125, '2017-04-24 12:52:52', 0),
(23, 5, 39, '2017-04-24 15:07:24', 1),
(28, 1, 132, '2017-04-25 00:40:25', 1),
(31, 16, 39, '2017-04-25 07:43:49', 1),
(33, 7, 116, '2017-04-25 10:19:32', 0),
(34, 7, 74, '2017-04-25 08:30:41', 0),
(35, 7, 39, '2017-04-25 10:19:24', 1),
(36, 5, 170, '2017-04-25 09:21:15', 1),
(37, 7, 131, '2017-04-25 10:35:32', 1),
(38, 21, 175, '2017-04-25 11:14:31', 1),
(39, 1, 178, '2017-04-25 11:21:49', 1),
(40, 7, 132, '2017-04-25 11:25:17', 1),
(41, 1, 131, '2017-04-25 11:32:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(0, 'All'),
(1, 'Cultural'),
(4, 'Seminar'),
(3, 'Sports'),
(2, 'Technical');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL DEFAULT '0',
  `venue` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `details` varchar(1000) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=196 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `user_id`, `updated`, `category_id`, `usertype_id`, `venue`, `time`, `details`) VALUES
(1, 'Director Town Hall Meeting', 1, '2017-03-05 16:50:17', 4, 1, 'MP Hall', '2017-04-10 21:30:00', ' The purpose of this meeting is to discuss various issues related to students including teaching, research, student life, moving to the new campus next year, strategic planning etc. It will be an open forum to discuss any other issues/problems faced by students directly with the Director himself.'),
(2, 'Marathon', 1, '2017-03-29 18:24:05', 2, 0, 'chandigarh', '2017-04-09 02:30:00', 'A half marathon'),
(3, 'CSP', 1, '2017-04-01 12:32:37', 2, 0, 'Lab2', '2017-04-05 02:30:00', 'Lab Demo'),
(33, 'CSP Lab Demo', 1, '2017-04-24 17:38:07', 4, 1, 'Mp Hall', '2017-04-05 01:30:00', 'Demo'),
(35, 'baisakhi bhangra', 5, '2017-04-04 09:26:09', 2, 0, 'mercury hostel', '2017-04-13 14:30:00', 'It is a get together for all the members of the college.'),
(39, 'SME-BAJA', 5, '2017-04-04 09:34:18', 3, 1, 'College Track', '2018-03-04 04:30:00', 'The biggest festivel of the college where cars from all India come and show their rage.'),
(42, 'project presentation', 5, '2017-04-21 14:15:24', 2, 1, 'L3', '2017-04-25 08:00:00', 'show your innovative ideas'),
(70, 'Volleyball', 1, '2017-04-23 08:50:21', 3, 1, 'Volleyball ground', '2017-04-24 12:47:00', 'Match'),
(71, 'dance', 12, '2017-04-23 09:46:44', 1, 2, 'L3', '2017-04-23 09:44:00', 'Nothing'),
(72, 'roy exam', 5, '2017-04-23 09:49:08', 2, 1, 'l3', '2017-04-23 09:47:00', 'control engg'),
(73, 'dance', 12, '2017-04-23 09:51:47', 1, 0, 'mp hall', '2017-04-24 09:49:00', 'dance'),
(74, 'singing', 12, '2017-04-23 09:52:34', 1, 1, 'mp hall', '2017-04-25 09:50:00', 'sing'),
(83, 'Seminar 1', 1, '2017-04-28 12:31:23', 4, 0, 'L5', '2017-04-23 11:30:00', 'Seminar'),
(85, 'Seminar CSE', 1, '2017-04-28 13:00:03', 4, 0, 'sg', '2017-04-23 13:58:00', 'd'),
(99, 'football', 7, '2017-04-23 14:20:48', 3, 3, 'ground', '2017-04-23 14:24:00', 'ggd'),
(100, 'party', 7, '2017-04-23 14:22:11', 1, 1, 'mphall', '2017-04-23 15:20:00', 'nothing'),
(103, 'news', 1, '2017-04-23 14:25:31', 1, 0, 'newsroom', '2017-04-23 14:24:00', 'done'),
(104, 'quiz', 7, '2017-04-23 14:26:20', 4, 1, 'l4', '2017-04-23 14:24:00', 'test'),
(105, 'talk', 7, '2017-04-23 14:27:51', 4, 2, 'mp hall', '2017-04-25 14:26:00', 'hdhd'),
(106, 'Seminar CSE 2', 1, '2017-04-28 14:28:38', 4, 0, 'l5', '2017-04-25 14:27:00', 'CS'),
(107, 'talk by PG', 7, '2017-04-25 11:35:14', 4, 1, 'mp hall', '2017-04-25 14:28:00', 'hdbdjjfn'),
(110, 'Discussion', 7, '2017-04-23 14:39:32', 4, 2, 'l7', '2017-04-23 16:30:00', 'to discuss'),
(113, 'symposium', 7, '2017-04-25 11:35:19', 4, 1, 'mp hall', '2017-04-25 06:41:00', 'Hello no info'),
(114, 'symposium 2', 7, '2017-04-23 14:46:22', 4, 0, 'mp hall', '2017-04-23 14:43:00', 'Hello there no info still'),
(115, 'Consult all', 1, '2017-04-25 11:34:02', 1, 0, 'l4', '2017-04-25 14:45:00', 'new hope'),
(116, 'Final demo is here', 1, '2017-04-23 14:48:26', 2, 0, 'venue', '2017-04-26 14:47:00', 'detail'),
(117, 'symposium 3', 7, '2017-04-25 09:33:13', 4, 1, 'mp hall', '2017-04-25 14:46:00', 'Not gonna tell'),
(120, 'dance folk', 14, '2017-04-23 19:49:17', 1, 0, 'mp hall', '2017-04-25 19:47:00', 'Nothing'),
(131, 'Volleyball Match', 7, '2017-04-25 09:30:44', 3, 1, 'Volleyball court', '2017-04-26 17:11:00', 'health is wealth'),
(132, 'ISMP Meeting', 7, '2017-04-25 11:26:40', 1, 1, 'cafeteria', '2017-04-26 17:15:00', 'interested all are invited. and be prepared for interview'),
(133, 'Musical Chairs', 7, '2017-04-24 17:21:45', 1, 0, 'Mp hall', '2017-04-01 17:19:00', 'fun activity'),
(164, 'studnet 1', 22, '2017-04-25 08:08:14', 1, 1, 'fgd', '2017-04-25 08:07:00', 'vhsjs'),
(165, 'faculty', 23, '2017-04-25 08:09:54', 1, 0, 'aghs', '2017-04-25 08:08:00', 'shjd'),
(166, 'o 1', 23, '2017-04-25 08:10:37', 1, 1, 'fh', '2017-04-25 08:09:00', 'dj'),
(167, 'o2', 23, '2017-04-25 08:10:49', 2, 0, 'gj', '2017-04-25 08:09:00', 'fj'),
(168, 'o4', 23, '2017-04-25 08:11:18', 1, 0, 'gh', '2017-04-25 08:10:00', 'dg'),
(169, 'sydh', 23, '2017-04-25 08:12:14', 1, 2, 'rud', '2017-04-25 08:10:00', 'dgh'),
(170, 'bhara', 24, '2017-04-25 08:53:46', 1, 0, 'mp hall', '2017-04-26 08:51:00', 'Girls also coming'),
(172, 'Test notify', 1, '2017-04-25 09:20:47', 1, 0, 'Mphall', '2017-04-25 09:19:00', 'tsst'),
(174, 'Organise', 21, '2017-04-25 10:13:24', 1, 1, 'dg', '2017-04-25 10:12:00', 'ffg'),
(175, 'hi', 21, '2017-04-25 10:20:53', 1, 0, 'such', '2017-04-26 10:19:00', 'dusk'),
(176, 'test faculty', 1, '2017-04-25 10:21:41', 1, 1, 'dhsu', '2017-04-25 10:20:00', 'dgss'),
(177, 'JK', 21, '2017-04-25 10:22:50', 1, 0, 'mp halll', '2017-04-26 10:21:00', 'CJ FM'),
(178, 'session', 7, '2017-04-25 10:35:10', 2, 1, 'mp hall', '2017-04-27 10:33:00', 'hsh'),
(185, 'an another event', 1, '2017-04-25 11:22:35', 1, 1, 'venue', '2017-04-25 14:30:00', 'all invited'),
(186, 'any', 7, '2017-04-25 11:35:08', 2, 1, 'mp hall', '2017-04-26 11:24:00', 'gdh'),
(195, 'Add', 1, '2017-04-25 13:53:00', 2, 0, 'sc', '2017-04-25 14:51:00', 'dg');

-- --------------------------------------------------------

--
-- Table structure for table `fcm`
--

CREATE TABLE IF NOT EXISTS `fcm` (
  `fcm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(400) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fcm_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `fcm`
--

INSERT INTO `fcm` (`fcm_id`, `user_id`, `token`, `updated`) VALUES
(4, 1, 'e2QmtEu7mO8:APA91bFRjgZfS3GJz-tdg0M7aG9Sezj3ONVkum8cHl9zz-6ynaGh15_EC8N-pSCqqMIf6gJX4kmhYq1PccyVr_GITsWtFctrZzPduYIkU1Y9RZS_NiDgeqMl3xK44UF6kaRlMAjFBNQK', '2017-04-25 13:52:22'),
(5, 5, 'fs10AEAsgmk:APA91bGDAtChC0ZB0vvMBQu7InNdnsn1nQ0TStO57gBwMUv_gpTjFnFIGldDXKlfzR6qwbyq8gfrheW9LUR8Vx83LvVugFajjWFbijlSCmATyJdUUraEjRKUaqhANLqWvDvKHl3EjIvg', '2017-04-25 09:18:13'),
(6, 7, 'fs10AEAsgmk:APA91bGDAtChC0ZB0vvMBQu7InNdnsn1nQ0TStO57gBwMUv_gpTjFnFIGldDXKlfzR6qwbyq8gfrheW9LUR8Vx83LvVugFajjWFbijlSCmATyJdUUraEjRKUaqhANLqWvDvKHl3EjIvg', '2017-04-25 11:24:42'),
(7, 12, 'fgMQt6rV7Ww:APA91bH8rHdKzsX0Gx57q3EDkBSK7tGcVwfLxMM7DiwzAzQXdDi98uYJ1C_O9yXLPZZ-AJmEoXgJTf41tBtR-YgJCC6cYO-x8lTuIlGUteF1ZoUyafpcygZNL0jUbYcqH56eUbS-klPg', '2017-04-23 09:44:35'),
(8, 14, 'dapzB2-_138:APA91bFeniP3UhE4wzZRRIuJz1VI52ta_RoYphYGYYXfB2JGSnuUWYmSHXNPWRg3SSA3BUgRA4pgknpI7pe36eTnEfd_KYplpxz9Fudi5w-7Ho_cvYRV-70qu4CC-dQcFmPYNClNQjjI', '2017-04-24 15:56:07'),
(9, 15, 'eVG99Edpblo:APA91bFgeQRz1rzlIBScXl6FeHIKFm1_ePjb5OoKlQ2BrP-v_1Gb8gCQRwfatHnpZu_OO3Q1WuoIi6TdcbqBygqyoDiJPPi2KYs2YEhltYvbjReKcRN5HbxRFBEwsM8ll6nu0cSx8s87', '2017-04-23 19:53:05'),
(10, 16, 'fT_9rUx3VJw:APA91bEarrvapDaD64DZ_PvXepZ2UVhcA8MvG9klVIlLohyZ3nh-Oj-EYiIJI8NVm-TRe4mxRqHwh6sQo5aq8RzcNZMx-yqydXmlqoWXZPfeCRskNu7R9hDBXgtK2ofkugcFvHtUtAtl', '2017-04-24 20:30:17'),
(12, 17, 'didAqeke2sk:APA91bG8kl7gllsq4BNVRNDlzxbbL-fy5N4Z9x18SjyMnZ3W74hsqVP0NgIV85z61TvsOf0Fv5jr6ekJb1QKEnBEruM-yHf82Itd35Qq3EIEkHdYflxmdxPfIx1h6StOmvoZJylntW9d', '2017-04-24 21:13:36'),
(13, 18, 'eJN9cyAV5sk:APA91bHoKqtSKln3oGeUSFNBSZxy-KtsVpy_xPEmj5yPhuwS3eDSLKjiaprc98-o6RQCXPakCQqaifoer9NDlk9JbmxWYJ1QBBYqnfvLxPsNRuvql1GT81waBNPnQ1rq8myQdzIYbxh_', '2017-04-24 21:25:34'),
(14, 19, 'eLZGNdrbm8s:APA91bGZ28ctN2pYDP9bDaij_qS3aMLMOwkAVftL9OuyLKTFPQ5uFMjCMxFLg7mLvjQnwmnfxWHTDKC6ww1QNHCrOpF6x7v2NyYhAY9jSbqe0wovbQBf7qoJVt62iXxGqcrELRhzLy9n', '2017-04-24 21:27:31'),
(15, 20, 'ep8eBpftbPA:APA91bFrYqrZFVxcJeAwnx8H49EL7ewvs2cyV_Rh482SAUaEHaNVTI9FJVsCOUGxIoL2NmtR9ywa9ZqxZVUa5RFbcYhF1IMX26ON62hQP4cmggmytw36yNJAYUryjQHsUGiS_f2sLeo4', '2017-04-24 21:46:29'),
(16, 21, 'dsvlTvc1V6Q:APA91bGAgZ8DNsPkYwuC8hy-A5TvQT7YL0DXOZn6BSYlnOwlpPIVLjqIAYGQ99Rl84TiAqdS7vWyMpzgfrRS6Gi_S8yisjqSacrHNWTusW-kI4pH54qKRyGWunUSsM3dYWg9BDYqEYI2', '2017-04-25 10:20:28'),
(17, 22, 'egRFPg6_il8:APA91bFB6SDHizeSn208bTncMPJI9kDLduxQSR-UAE81HCaFMqQU3Sog9ndJyKqooC3I_omAz9LzTwPNBeqimo9vfsunSC8G_gUSAWuTNXPpGnFs0hRo9yhdGcHmepyfaI3fya0OkoN4', '2017-04-25 08:07:00'),
(18, 23, 'egRFPg6_il8:APA91bFB6SDHizeSn208bTncMPJI9kDLduxQSR-UAE81HCaFMqQU3Sog9ndJyKqooC3I_omAz9LzTwPNBeqimo9vfsunSC8G_gUSAWuTNXPpGnFs0hRo9yhdGcHmepyfaI3fya0OkoN4', '2017-04-25 08:09:25'),
(19, 24, 'fs10AEAsgmk:APA91bGDAtChC0ZB0vvMBQu7InNdnsn1nQ0TStO57gBwMUv_gpTjFnFIGldDXKlfzR6qwbyq8gfrheW9LUR8Vx83LvVugFajjWFbijlSCmATyJdUUraEjRKUaqhANLqWvDvKHl3EjIvg', '2017-04-25 08:52:44'),
(20, 26, 'fjysamk2l-M:APA91bFX3PCmQEq_II2Wce3GUWGkAMgnMrmk1NgVeKAyQ1SzWsa_C1zaA78tmacF7vrmcMXKAgZzI4NtxvCTaMxQIhHz74-wrZYWNclFKK6yFM-eSI_ReyWg0bVkMQg7fL6TEXJd-hHd', '2017-04-25 14:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `name`, `password`, `usertype_id`, `created`) VALUES
(1, '2015csb1021@iitrpr.ac.in', 'Naman Goyal', '$2y$10$3IgCWwMLPV9p56KMC1cAOOYjbcHTG5dNc9cwQ.EPN.ZVh/K7Jh2JK', 1, '2017-03-31 19:05:31'),
(5, '2015csb1040@iitrpr.ac.in', 'Vishal Singh', '$2y$10$xk/BiawMVb9QuxhN0spW4ufzyVkEBVRVmlc4bD60GFMnykqB68cIO', 1, '2017-04-01 17:03:59'),
(6, '2015csb1067@iitrpr.ac.in', 'Nittin Singh', '$2y$10$lj4KDlN8Uu620WYsBgesBuYqCW85GzZDCs8r/HHxmEFzpJKJdDs.e', 1, '2017-04-01 17:07:06'),
(7, 'nittin@iitrpr.ac.in', 'nittin', '$2y$10$4BgiWZi4QdSlUDNFfWzPwOFyJg93tArsDchKOqXKbjJ4Dlmhjw96y', 1, '2017-04-01 17:36:05'),
(10, 'abc@iitrpr.ac.in', 'abc', '$2y$10$XGZXvos8P9JNrARMIGr0xuJn/JR7jPxJiw1KomCH3W3oprdpIQvwG', 1, '2017-04-23 09:25:55'),
(11, 'singh@iitrpr.ac.in', 'Nittin', '$2y$10$um1lh5sCisA71TAijhzeH.MdKynmt1tkZYsAHHlUmC7rAcyl4EMr.', 1, '2017-04-23 09:33:18'),
(12, 'nittin1234@iitrpr.ac.in', 'Nittin Singh', '$2y$10$qKNfSFzjfxoOhHCSAkxq6uorA9EYzm7TIbwkyvZ4zj/3DVED4EO/6', 1, '2017-04-23 09:44:12'),
(13, 'shubham@iitrpr.ac.in', 'Shubham', '$2y$10$BSpz94UjF5wKBwL5OVr1v.veGOxIJ4E/Cv.raKJlnWP7OBvt7h.Dq', 1, '2017-04-23 17:35:25'),
(14, 'neha@iitrpr.ac.in', 'Neha', '$2y$10$.f4ffLYD8sAtgg5aPEBRvOLOhIdG29aX1OibBywaeo0s4KRX8yUGi', 1, '2017-04-23 17:44:36'),
(15, 'anuj@iitrpr.ac.in', 'anuj', '$2y$10$9iJOG1dsxt5IgUgM6uNM8.IqcOG3qoYXh/qQHEiA0lLNqImfYaUf2', 1, '2017-04-23 19:52:50'),
(16, '2015meb1096@iitrpr.ac.in', 'Mayank Agrawal', '$2y$10$F42jrqS33UCfjMhXqc66MOsk/7ki/5Yq6XztP1qg1zN2G2sm31Jf2', 1, '2017-04-24 20:29:56'),
(17, '2015meb1120@iitrpr.ac.in', 'Vikash Kumar', '$2y$10$3.Y1qhfn09Q/XB8y./PODuc1QuPb2pBX15RKjyDDim88BUVpqIa/.', 1, '2017-04-24 21:12:14'),
(18, '2015meb1095@iitrpr.ac.in', 'Harsha B T', '$2y$10$37MEnqfxI5Pqkn/dA4vyuesBi6gsBIEK6E2Qbo.qLM059BGXUq0AS', 1, '2017-04-24 21:24:59'),
(19, '2015csb1037@iitrpr.ac.in', 'sai', '$2y$10$iNhC/hNPktn2lTkohh2.teyk8bxmmG04aiIFQkL2pK.n2jOMBBdoS', 1, '2017-04-24 21:26:52'),
(20, '2015csb1009@iitrpr.ac.in', 'yugandhar', '$2y$10$f8zXDTIvxw9k20JRGU0v5.WrFA2vUXDm3SDsI/iuPTyLJ40OahADq', 1, '2017-04-24 21:34:15'),
(21, '2015csb1029@iitrpr.ac.in', 'Sarthak', '$2y$10$r1NqBDf62WU.Gw9ZcQSw0elCMZQVyBzvawjlr8fb5nuP9lAJonwiG', 1, '2017-04-25 08:04:47'),
(22, 'facultytest@iitrpr.ac.in', 'Faculty test', '$2y$10$eg8rk4sWOnNbrBSSUWKFBez1/aPJXbfEr08HxiExAMCQAa81Sy1w2', 1, '2017-04-25 08:06:37'),
(23, 'test@iitrpr.ac.in', 'Faculty test', '$2y$10$oj9N5h77d3zuPxTYk3O9Y.pRzJAKim3yqbfKfhxqiZJ0NhQqySM3e', 2, '2017-04-25 08:09:13'),
(24, 'hi@iitrpr.ac.in', 'Shubham', '$2y$10$81AE1IohOO/1QU1kU8k93ebGIx6a5.87XlWFrue3b2QVdOEtk54JS', 1, '2017-04-25 08:52:21'),
(25, '2015eeb1079@iitrpr.ac.in', 'Pratyush Singh', '$2y$10$/JeqMmJhcNUwtgTLuIOTf.O/nYptKMP5z/iWL9ZRYWJIB/eYRjCPG', 1, '2017-04-25 14:02:06'),
(26, '2015eeb1070@iitrpr.ac.in', 'Pratyush', '$2y$10$thYE7/X12/NLTH640zJZMOG.aOkYB/5yH3TIf1EvB0r7zJyFZbCq6', 1, '2017-04-25 14:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `usertype_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`usertype_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `name`) VALUES
(2, 'Faculty'),
(0, 'Public'),
(3, 'Staff'),
(1, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `visible`
--

CREATE TABLE IF NOT EXISTS `visible` (
  `visible_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visible`
--

INSERT INTO `visible` (`visible_id`, `name`) VALUES
(1, 'Student'),
(2, 'Faculty'),
(3, 'Staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
