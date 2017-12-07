-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 09:08 PM
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
(1, 'First Blog', 'This is my first blog!!aksghdhagsdasgdsagdjgasjdgsajgdjasgdjdsaljdkdhskadhaskhdkashdkashdashdkashdkjashdkashdkashdkjashdkjshadkjsahdkashdkhaskdhksahdkashdsadasdsadsadasdasdsadsadsadasdsadasdasdsadsadsa', '29/10/17 6:41pm', NULL, 12, 0, NULL, NULL, 0),
(9, 'testing blog', 'This is a test blog..hurrrrrrraaaaaaaaaaaaaaaaaaaaaaaaaaaayyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy.....', '22/11/2017 04:44:34am', NULL, 10, 0, 'Shymoli', 'robbery', 0),
(10, 'testing blog 2', 'this is a testing blog number 2...i am gonna try to be Anonymous here.', '22/11/2017 04:45:50am', NULL, 10, 1, 'Shymoli', 'robbery', 0),
(23, 'Final Test??', 'I was robbed!!! Not really just had to make this real. This is just for testing purpose', '24/11/2017 04:48:57am', NULL, 10, 0, 'Mirpur Mirpur-10 , cirle', 'robbery', 0),
(24, 'Can i Delete?', 'Delete testing blog!!', '01/12/2017 03:24:34am', NULL, 10, 0, 'Shyamoli ', 'robbery', 1),
(25, 'test with attachment', 'This is a test blog with attachment!', '07/12/2017 01:27:10am', 'http://localhost:80/Projects/aiub project/uploads/thetaste/test with attachment(07 12 2017)/Doctor Strange Theme on Guitar.mp3', 10, 0, 'Shyamoli ', 'robbery', 0),
(40, 'keep testing', 'testing testing testing', '07/12/2017 10:37:13am', NULL, 15, 0, 'Shyamoli ', 'robbery', 0);

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `blog_id`, `user_id`, `body`, `datetime`, `del`) VALUES
(4, 1, 10, 'Seriously Dude???!!', '02/11/2017 12:21:17am', 0),
(5, 1, 10, 'This is a shit post!!', '02/11/2017 12:21:32am', 0),
(9, 1, 12, 'Fuck You!!', '11/11/2017 03:29:10am', 0),
(14, 1, 10, 'You too!!', '17/11/2017 12:32:49am', 0),
(15, 9, 10, 'kuttar baccha!!', '30/11/2017 01:14:37am', 1),
(16, 24, 10, 'shit\r\n', '01/12/2017 05:50:14am', 0),
(17, 24, 10, 'yeah\r\n', '01/12/2017 05:50:18am', 0),
(18, 24, 10, 'fuck', '01/12/2017 05:50:22am', 1),
(19, 1, 15, 'test comment', '07/12/2017 10:50:22am', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(50) DEFAULT NULL,
  `crimes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`, `crimes`) VALUES
(1, 'Shyamoli', 4),
(2, 'Mirpur', 3),
(3, 'Banani', 0),
(4, 'Motijheel', 1),
(5, 'Other', 0);

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
(10, 'Mr', 'tasty', 27, '7/feb/1990', 'thetaste', 'tasty@yummy.com', 'abcd%1abcd', 'http://localhost:80/Projects/aiub project/uploads/thetaste/Profile Picture/', 'male', 1, 0),
(12, 'New', 'User', 82, '5/apr/1935', 'newbie', 'new@user.com', 'abcd%1abcd', NULL, 'male', 2, 0),
(15, 'test', 'user', 16, '14/nov/2001', 'testuser', 'aanondos@yahoo.com', 'abcd%1abcd', 'http://localhost:80/Projects/aiub project/Uploads/testuser/Profile Picture/17352401_1582781845127502_2733895837477039183_n.jpg', 'male', 2, 0);

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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
