-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 08:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typeracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `exersice`
--

CREATE TABLE `exersice` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lobbies`
--

CREATE TABLE `lobbies` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `exersice_id` int(11) NOT NULL,
  `leader` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `started_at` datetime NOT NULL,
  `finished_at` datetime NOT NULL,
  `started` int(11) NOT NULL,
  `finished` int(11) NOT NULL,
  `speed` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exersice`
--
ALTER TABLE `exersice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lobbies`
--
ALTER TABLE `lobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exersice_id` (`exersice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lobbies`
--
ALTER TABLE `lobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lobbies`
--
ALTER TABLE `lobbies`
  ADD CONSTRAINT `lobbies_ibfk_1` FOREIGN KEY (`exersice_id`) REFERENCES `exersice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
