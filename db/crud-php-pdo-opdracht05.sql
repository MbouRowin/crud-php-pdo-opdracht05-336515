-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basicfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `inschrijving`
--

CREATE TABLE `inschrijving` (
  `id` int(11) NOT NULL,
  `homeclub` varchar(128) NOT NULL,
  `lidmaatschap` varchar(128) NOT NULL,
  `looptijd` varchar(128) NOT NULL,
  `extra` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vestiging`
--

CREATE TABLE `vestiging` (
  `straatnaam` varchar(128) NOT NULL,
  `huisnummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vestiging`
--

INSERT INTO `vestiging` (`straatnaam`, `huisnummer`) VALUES
('Moreelsehoek', 2),
('Arjanstraat', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inschrijving`
--
ALTER TABLE `inschrijving`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inschrijving`
--
ALTER TABLE `inschrijving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
