-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 06:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is_that_crime`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` text,
  `datetime` varchar(70) DEFAULT NULL,
  `attachment` longblob,
  `blogger_id` int(11) DEFAULT NULL,
  `name_hidden` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `body`, `datetime`, `attachment`, `blogger_id`, `name_hidden`) VALUES
(1, 'First Blog', 'This is my first blog!!aksghdhagsdasgdsagdjgasjdgsajgdjasgdjdsaljdkdhskadhaskhdkashdkashdashdkashdkjashdkashdkashdkjashdkjshadkjsahdkashdkhaskdhksahdkashdsadasdsadsadasdasdsadsadsadasdsadasdasdsadsadsa', '29/10/17 6:41pm', NULL, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `bdate` varchar(9) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pro_pic` blob,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `age`, `bdate`, `username`, `email`, `password`, `pro_pic`, `gender`) VALUES
(10, 'Mr', 'tasty', 27, '1/jan/199', 'thetaste', 'tasty@yummy.com', 'abcd%1abcd', NULL, 'male'),
(12, 'New', 'User', 117, '1/jan/190', 'newbie', 'new@user.com', 'abcd%1abcd', NULL, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blogger_id` (`blogger_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`blogger_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
