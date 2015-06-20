-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `1898624_contacts`
--

-- --------------------------------------------------------

--
-- Структура на таблица `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `contacts`
--

INSERT INTO `contacts` (`id`, `userId`, `name`, `phone`, `email`, `address`) VALUES
(1, 2, 'pesho', '123123123', 'pesho@madafaka.com', 'nqkadetam'),
(2, 2, '1231231', '2123123', '123123', '12313213');

-- --------------------------------------------------------

--
-- Структура на таблица `customfields`
--

CREATE TABLE IF NOT EXISTS `customfields` (
  `id` int(11) NOT NULL,
  `field` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `contactId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `groups`
--

INSERT INTO `groups` (`id`, `name`, `userId`) VALUES
(0, 'pesho', 2),
(1, 'Home', 2),
(2, 'Family', 2),
(3, 'Friends', 2),
(34, 'Work', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `groups-contacts`
--

CREATE TABLE IF NOT EXISTS `groups-contacts` (
  `groupId` int(11) NOT NULL,
  `contactId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `groups-contacts`
--

INSERT INTO `groups-contacts` (`groupId`, `contactId`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'm', 'm'),
(2, 'v', '9e3669d19b675bd57058fd4664205d2a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customfields`
--
ALTER TABLE `customfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
