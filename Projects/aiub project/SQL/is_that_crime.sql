-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 06:05 AM
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
CREATE DATABASE IF NOT EXISTS `is_that_crime` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `is_that_crime`;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` text,
  `datetime` varchar(70) DEFAULT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `blogger_id` int(11) DEFAULT NULL,
  `name_hidden` tinyint(1) DEFAULT NULL,
  `location` text,
  `category` varchar(50) DEFAULT NULL,
  `del` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `body`, `datetime`, `attachment`, `blogger_id`, `name_hidden`, `location`, `category`, `del`) VALUES
(1, 'Test Blog', 'Hello World....this is a test blog..', '24/12/2017 10:05:06am', NULL, 20, 0, 'Mirpur Road #10,circle', 'robbery', 0),
(2, 'Testing blog with attachment', 'This is test blog with attachment', '24/12/2017 10:06:22am', 'http://localhost:80/Projects/aiub project/uploads/newguy/Testing blog with attachment(24 12 2017)/23380249_2110139912333408_9070847043921940983_n.jpg', 20, 0, 'Banani  Kamal Attaturk', 'murder', 0),
(3, 'Another test blog with attachment and being anonymous', 'This is a test blog with attachment and being anonymous..', '24/12/2017 10:08:19am', 'http://localhost:80/Projects/aiub project/uploads/first_user/Another test blog with attachment and being anonymous(24 12 2017)/gunshot.wav', 16, 1, 'Mirpur  ', 'robbery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` text,
  `datetime` varchar(70) DEFAULT NULL,
  `del` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criminals`
--

DROP TABLE IF EXISTS `criminals`;
CREATE TABLE `criminals` (
  `criminal_id` int(11) NOT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `bdate` varchar(11) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pro_pic` varchar(180) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `del` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminals`
--

INSERT INTO `criminals` (`criminal_id`, `fname`, `lname`, `age`, `bdate`, `username`, `email`, `pro_pic`, `gender`, `role`, `del`) VALUES
(1, 'Crimi', 'Mama', 82, '1/jan/1935', 'crimi1', 'crimi1@yahoo.com', 'http://localhost:80/Projects/aiub project/Uploads/Crimi Mama/Profile Picture/', 'male', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(50) DEFAULT NULL,
  `crimes` int(11) DEFAULT '0',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`, `crimes`, `latitude`, `longitude`) VALUES
(1, 'Shyamoli', 0, 23.7718, 90.3631),
(2, 'Mirpur', 2, 23.8223, 90.3654),
(3, 'Banani', 1, 23.794, 90.4043),
(4, 'Motijheel', 0, 23.733, 90.4172),
(5, 'Other', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `bdate` varchar(11) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pro_pic` varchar(180) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `del` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `age`, `bdate`, `username`, `email`, `password`, `pro_pic`, `gender`, `role`, `del`) VALUES
(16, 'admin', 'user', 82, '12/jan/1935', 'first_user', 'admin@user.com', '$2y$10$yrsbr/WD.WZt7GkbX/mDC.dyN.CtGwoFN/KxpqZRbaJkq3izy0P9S', 'http://localhost:80/Projects/aiub project/uploads/first_user/Profile Picture/', 'male', 1, 0),
(20, 'new ', 'user', 82, '1/jan/1935', 'newguy', 'new@user.com', '$2y$10$h0H8f.W3MIKwdvTqTDENn.yu09Uloe0q9V95rBP79je7zd29iryZK', 'http://localhost:80/Projects/aiub project/uploads/newguy/Profile Picture/LL.jpg', 'male', 2, 0),
(21, 'Crimi', 'Mama', 82, '1/jan/1935', 'crimi1', 'crimi1@yahoo.com', '$2y$10$.gSc.6qWuVt1XP9KX1fTxORANT8msuhd/6ebAH3AWGW8pjpJJKzFa', NULL, 'male', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'General'),
(3, 'Criminal');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `criminals`
--
ALTER TABLE `criminals`
  ADD PRIMARY KEY (`criminal_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_role_fk` (`role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criminals`
--
ALTER TABLE `criminals`
  MODIFY `criminal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`blogger_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`blog_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `criminals`
--
ALTER TABLE `criminals`
  ADD CONSTRAINT `criminals_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`role_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`role`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
