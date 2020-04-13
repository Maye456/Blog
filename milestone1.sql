-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2020 at 02:54 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milestone1`
--
CREATE DATABASE IF NOT EXISTS `milestone1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `milestone1`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `userID_PostBy` int(11) DEFAULT NULL,
  `userID_UpdatedBy` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `userID_PostBy`, `userID_UpdatedBy`, `title`, `content`, `post_date`, `update_date`, `delete_flag`) VALUES
(1, 1, NULL, 'My First Blog Entry', 'Hi! My name is Jeanna Maye Benitez', '2020-03-05 19:17:26', '2020-03-05 19:17:26', NULL),
(2, 1, NULL, 'My First Blog Entry', 'Hi! This is the second blog post entry test.', '2020-03-06 18:03:21', '2020-03-06 18:03:21', NULL),
(3, 1, NULL, 'My First Blog Entry', 'Hi! This is the third blog post entry test.', '2020-03-06 18:05:20', '2020-03-06 18:05:20', NULL),
(4, 1, NULL, 'My First Blog Entry', 'Hi! This is the 4th blog post entry test.', '2020-03-06 18:09:20', '2020-03-06 18:09:20', NULL),
(14, 1, NULL, 'My First Blog Entry', 'Hi! This is the 5th blog post entry test.\r\n!@#$% !@#$% !@#$%', '2020-03-06 19:34:21', '2020-03-06 19:34:21', NULL),
(25, 1, NULL, 'My First Blog Entry', 'Hi! This is the 6th blog post entry test.\r\n** ** **\r\nMother Fucker!\r\n**!!', '2020-03-06 19:49:49', '2020-03-06 19:49:49', NULL),
(30, 1, NULL, 'Test Blog Entry', 'TEST!!! #1\r\nLike holy **!', '2020-03-07 16:31:37', '2020-03-07 16:31:37', NULL),
(31, 1, NULL, 'My First Blog Entry', 'HELLO!', '2020-03-10 12:42:45', '2020-03-10 12:42:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pswRepeat` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userID`, `firstName`, `lastName`, `email`, `username`, `password`, `pswRepeat`, `gender`, `dateOfBirth`) VALUES
(1, 'Jeanna Maye', 'Benitez', 'benitezjeanna@yahoo.com', 'Maye456', 'Jmaye2001', 'Jmaye2001', 'Female', '2001-09-06'),
(2, 'Kara', 'Danvers', 'kara.danvers@catco.co', 'sunshinegirl', 'Ilovepotstickers!', 'Ilovepotstickers!', 'Female', '1991-09-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
