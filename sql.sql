-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 09:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0t`
--

-- --------------------------------------------------------

--
-- Table structure for table `imdb_all`
--

CREATE TABLE `imdb_all` (
  `id` int(11) NOT NULL,
  `mo_tv_ep` text NOT NULL,
  `imdb_id` varchar(64) NOT NULL,
  `title` text NOT NULL,
  `year_r` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `genre` text NOT NULL,
  `plot` text NOT NULL,
  `rating` text NOT NULL,
  `number_of_people` text NOT NULL,
  `moviemeter` text NOT NULL,
  `director` text NOT NULL,
  `writers` text NOT NULL,
  `artists` text NOT NULL,
  `image_url` text NOT NULL,
  `ep` varchar(255) DEFAULT NULL,
  `tv_id` varchar(255) DEFAULT NULL,
  `youtube_t` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imdb_all`
--
ALTER TABLE `imdb_all`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imdb_id` (`imdb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imdb_all`
--
ALTER TABLE `imdb_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
