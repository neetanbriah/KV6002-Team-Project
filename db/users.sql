-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2019 at 03:46 PM
-- Server version: 5.5.58-0+deb7u1-log
-- PHP Version: 5.6.31-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unn_w16028251`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `userType` varchar(50) DEFAULT NULL,
  `suspension` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `surname`, `userType`, `suspension`) VALUES
(1, 'FirstAdmin', '$2y$10$CZUUDmLB8Fd6mrcX8dyURuZRJ8EMhVjPbPgB3hh5UNnFSGZh6u1O2', 'FirstAdmin@gmail.com', 'First', 'Admin', 'Admin', 0),
(2, 'user123', '$2y$10$nOyAC1mdGwpHu9pR4rukaesYYM.HdfirJxMmKNW5eR8r7RaXgIV9K', 'neetanbriah@gmail.com', 'Neetan', 'Briah', 'Member', 0),
(26, 'SteveAdams', '$2y$10$6RHarYjXb0e36H1tjON9bOBGI0XoCy/1MNzZp8SJ1HP07urg5txo6', 'SteveAdams@gmail.com', 'Steve', 'Adams', 'Committee Member', 0),
(27, 'SecondAdmin', '$2y$10$ZOaiXfcAi8BtEN3ZMRcKiOT8trWfwiEI2wA0vKtc5z6xUMwkStrji', 'SecondAdmin@gmail.com', 'Second', 'Admin', 'Admin', 0),
(28, 'SuspendedAdmin', '$2y$10$DNo2oIMFSs6diP2BRqPg2ugZp.XiWY5O0iNUHBKb9AI/e9lj.CzJS', 'SuspendedAdmin@gmail.com', 'Suspended', 'Admin', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
