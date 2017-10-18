-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 06:51 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `device_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
CREATE TABLE IF NOT EXISTS `device` (
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`name`, `type`, `availability`, `price`) VALUES
('ComputerX', 'computer', 1, 400.5),
('ComputerY', 'computer', 1, 800.99),
('ZED', 'computer', 0, 3499.99),
('Mini14', 'phone', 1, 30.7),
('SksPro', 'phone', 1, 120.05),
('Kar98', 'phone', 1, 750.5),
('LenovoIdea', 'laptop', 0, 259.9),
('Dell XPS 15', 'laptop', 1, 1100),
('Dell XPS 10', 'laptop', 1, 400.39),
('squareBook', 'tablet', 1, 88.88),
('notemaker9000', 'tablet', 0, 130.7),
('The Beast''s Book', 'tablet', 1, 666.66);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
