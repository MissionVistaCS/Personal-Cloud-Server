-- phpMyAdmin SQL Dump
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2016 at 02:35 AM
-- Server version: 5.6.24-log
-- PHP Version: 5.6.9-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `personal-cloud`

-- --------------------------------------------------------

-- Table structure for table `images`

CREATE TABLE IF NOT EXISTS `images` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path` varchar(1024) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Example entries for table 'images'

-- INSERT INTO `images` (`timestamp`, `path`, `name`) VALUES
-- ('2016-11-15 15:36:41', 'null_path1', 'null_name1'),
-- ('2016-11-18 15:54:30', 'null_path2', 'null_name2');

-- --------------------------------------------------------

-- Table structure for table `users`

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Example entries for table `users`

-- INSERT INTO `users` (`id`, `username`, `password`) VALUES
-- Remember passwords are hashed and salted (plain text won't work)
-- (1, 'root', '$2y$13$i1C/ph0iQn0qCNvT3cePP.vZYwW0i/a19r3bksm.NXFD2c2yZKJQa');


-- --------------------------------------------------------


-- Indexes for table `images`

ALTER TABLE `images`
  ADD PRIMARY KEY (`timestamp`);

-- Indexes for table `users`

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `users`

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
