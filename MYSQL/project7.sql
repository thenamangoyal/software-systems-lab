-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2017 at 09:44 PM
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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL DEFAULT '0',
  `venue` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `details` varchar(1000) NOT NULL,
  `going_count` int(11) NOT NULL DEFAULT '0',
  `maybe_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `user_id`, `created`, `category_id`, `usertype_id`, `venue`, `time`, `details`, `going_count`, `maybe_count`) VALUES
(1, 'Director Town Hall Meeting', 1, '2017-03-05 16:50:17', 4, 1, 'MP Hall', '2017-04-10 21:30:00', ' The purpose of this meeting is to discuss various issues related to students including teaching, research, student life, moving to the new campus next year, strategic planning etc. It will be an open forum to discuss any other issues/problems faced by students directly with the Director himself.', 50, 5),
(2, 'Marathon', 1, '2017-03-29 18:24:05', 2, 0, 'chandigarh', '2017-04-09 02:30:00', 'A half marathon', 50, 10),
(3, 'CSP', 1, '2017-04-01 12:32:37', 2, 0, 'Lab2', '2017-04-05 02:30:00', 'Lab Demo', 0, 0),
(33, 'Lab11', 1, '2017-04-04 07:46:47', 2, 0, 'CS Lab 2', '2017-04-04 09:45:00', 'CSP', 0, 0),
(34, 'Baisakhi(langar)', 9, '2017-04-04 09:25:20', 1, 0, 'MP HALL', '2017-04-13 12:23:00', 'Free lunch', 0, 0),
(35, 'baisakhi bhangra', 5, '2017-04-04 09:26:09', 2, 0, 'mercury hostel', '2017-04-13 14:30:00', 'It is a get together for all the members of the college.', 0, 0),
(36, 'IBCC', 9, '2017-04-04 09:28:15', 1, 0, 'CRICKET GROUND', '2017-04-15 14:26:00', 'A dj night...Do come everybody', 0, 0),
(37, 'Daru Party', 9, '2017-04-04 09:31:09', 1, 1, 'Mercury room', '2017-04-15 16:28:00', 'Lets parry on eve of IBCC....HURRRAAAAAYYYYYYY', 0, 0),
(38, 'Cricket Match', 9, '2017-04-04 09:33:19', 3, 0, 'CRICKET GROUND', '2017-04-08 08:31:00', 'Match btw 2nd year and phd....fo come to support your teams.', 0, 0),
(39, 'SME-BAJA', 5, '2017-04-04 09:34:18', 3, 1, 'College Track', '2018-03-04 04:30:00', 'The biggest festivel of the college where cars from all India come and show their rage.', 0, 0),
(40, 'Tech show', 1, '2017-04-04 10:09:27', 3, 0, 'L3', '2017-04-07 11:30:00', 'Technical show', 0, 0),
(41, 'test', 1, '2017-04-11 16:32:53', 1, 0, 'ghd', '2017-04-12 16:31:00', 'ghh', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `name`, `password`, `usertype_id`, `created`) VALUES
(1, '2015csb1021@iitrpr.ac.in', 'Naman Goyal', '$2y$10$QNQB43CuphPc0//cHfFeeu3vIuMGrHbUOpjYoGMR0A1ZiG9m7Pso.', 1, '2017-03-31 19:05:31'),
(5, '2015csb1040@iitrpr.ac.in', 'Vishal Singh', '$2y$10$ajTlVuud/1jRRg.371UZ5.7RGIhtbbr3Gd5MIlUYme2v03IsChEI2', 1, '2017-04-01 17:03:59'),
(6, '2015csb1067@iitrpr.ac.in', 'Nittin Singh', '$2y$10$lj4KDlN8Uu620WYsBgesBuYqCW85GzZDCs8r/HHxmEFzpJKJdDs.e', 1, '2017-04-01 17:07:06'),
(7, 'nittin@iitrpr.ac.in', 'nittin', '$2y$10$4BgiWZi4QdSlUDNFfWzPwOFyJg93tArsDchKOqXKbjJ4Dlmhjw96y', 1, '2017-04-01 17:36:05'),
(8, '2015csb1029@iitrpr.ac.in', 'sarthak', '$2y$10$10yrL2A2F8C6otBnz7ob9OEn6ZVSJRRQj3kxsQBpazElVuOHCAe/e', 2, '2017-04-04 06:19:12'),
(9, 'Sarthak@iitrpr.ac.in', 'sarthak', '$2y$10$htAVdRdbeFGAfJZ5ThC2U.h5THVtPIaSsI5yJym5HvvwZuL8/PSKq', 1, '2017-04-04 06:19:44');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `age`, `password`) VALUES
(1, 'Administrator', 'admin', 19, '$2y$10$gfp6cu9cK5NEViPVBmrPpOqYHYL5mfM5yhp6chtPBTPE.zJC/ms36'),
(2, 'Naman Goyal', '2015csb1021@iitrpr.ac.in', 19, '$2y$10$NwJMcJGw69ysI4satUHOmuDEi3hWiugq1GFggYDVZlfdWaW2pGJVO'),
(3, 'vishal', '2015csb1040@iitrpr.ac.in', 19, '$2y$10$wchwJ81ntOmxSurjCtoHDOJA5c9CW3v3ZQqRyrF9QwHFWXMTwzax.'),
(10, 'vishal', 'vishal02@iitrpr.ac.in', 19, '$2y$10$/tCxpFw64mt3s7qYpxQna.ucImMCEFBw0HweaHU12SGK0FfgiWEV.'),
(11, 'nittin', 'nittin@iitrpr.ac.in', 20, '$2y$10$pMjGMTyABFGdLUEc54ICiuz0A0Ustl8H.F.31Fg2cCkyuOw5c7vwK');

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
