-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 05:02 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monopoly`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `startMoney` int(11) DEFAULT NULL,
  `passGO` int(11) DEFAULT NULL,
  `freeParking` int(11) DEFAULT NULL,
  `jail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`startMoney`, `passGO`, `freeParking`, `jail`) VALUES
(1500, 200, 100, 50);

-- --------------------------------------------------------

--
-- Table structure for table `moneyhistory`
--

CREATE TABLE `moneyhistory` (
  `id` int(11) NOT NULL,
  `p1Money` int(11) DEFAULT NULL,
  `p2Money` int(11) DEFAULT NULL,
  `time` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `pId` int(11) NOT NULL,
  `pName` varchar(25) DEFAULT NULL,
  `pColor` varchar(25) DEFAULT NULL,
  `pBal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`pId`, `pName`, `pColor`, `pBal`) VALUES
(0, 'player1', 'Red', 0),
(1, 'player2', 'Blue', 0),
(2, 'Bank', 'Black', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `chartName` varchar(25) DEFAULT NULL,
  `showInHome` varchar(25) DEFAULT NULL,
  `showInStatsPage` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`chartName`, `showInHome`, `showInStatsPage`) VALUES
('pie', 'yes', 'yes'),
('moneyChart', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `tId` int(11) NOT NULL,
  `fromName` varchar(25) DEFAULT NULL,
  `toName` varchar(25) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `dateTime` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moneyhistory`
--
ALTER TABLE `moneyhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`tId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
