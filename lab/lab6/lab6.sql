-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2017 at 10:30 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lab6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(10) NOT NULL,
  `pass` varchar(60) NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', '$2y$11$zApGlD6AofRA2Cddm88j2e29izX35p3vjw4/gP/04IJE7gXUD1GfC');

-- --------------------------------------------------------

--
-- Table structure for table `userList`
--

CREATE TABLE IF NOT EXISTS `userList` (
  `name` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `animal` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `userList`
--

INSERT INTO `userList` (`name`, `pass`, `animal`, `color`, `id`) VALUES
('Tim McTimothonian', '$2y$11$YCaaxW6w01eVEZ73OTFha.nivoORqclG9kRKGNGUsS5zx7f56CUFK', 'Chickens', 'Yellow', 1),
('Cullen Marchenko', '$2y$11$WDRdrTxkkJcqUGv/ijxrkOX1/2X4P7BlEo1OhPEjswJ4cL.SBXJoC', 'Bear', 'Ruby Red', 2),
('13readAnd13utta', '$2y$11$nkSira.dydFqB4Evj8ENlOSL/VSVfi.FBnxTd9j1n0xKomUlDjpzi', 'panda', 'blue', 3),
('Mr Mayhem', '$2y$11$RUPaUwRLaAQYNVQy1dI1HuncC1cdW7lgSmLtaOeh1K0MHxP7Ptvau', 'Explosions', 'Black', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
