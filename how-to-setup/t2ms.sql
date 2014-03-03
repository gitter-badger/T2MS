-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2014 at 11:11 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `t2ms`
--
CREATE DATABASE IF NOT EXISTS `t2ms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `t2ms`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `blacklisted` tinyint(1) NOT NULL DEFAULT '0',
  `maxFare` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `blacklisted`, `maxFare`) VALUES
(1, 'Madawa Soysa', 123123123, 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `locality`
--

CREATE TABLE IF NOT EXISTS `locality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `locality`
--

INSERT INTO `locality` (`id`, `name`) VALUES
(1, 'Moratuwa');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` int(11) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `address`, `contact`, `password`) VALUES
(1, 'Isuru Fernando', 'Katubedda,Moratuwa', 715465178, '');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `vehicleID` int(11) NOT NULL,
  `localityID` int(11) NOT NULL,
  `startTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `session_ibfk_1` (`localityID`),
  KEY `session_ibfk_2` (`vehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `locality_id` int(11) NOT NULL,
  `tag` varchar(20) DEFAULT NULL,
  KEY `locality_id` (`locality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fare` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `localityID` int(11) NOT NULL,
  `vehicleID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `localityID` (`localityID`),
  KEY `vehicleID` (`vehicleID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `time`, `fare`, `status`, `localityID`, `vehicleID`, `customerID`) VALUES
(1, '2014-01-09 18:10:16', 30, 'Finished', 1, 1, 1),
(2, '2014-01-09 18:13:31', 35, 'On Going', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverName` text NOT NULL,
  `driverContact` int(11) NOT NULL,
  `vehicleNum` text NOT NULL,
  `fare` int(11) NOT NULL DEFAULT '100',
  `ownerID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerID` (`ownerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `driverName`, `driverContact`, `vehicleNum`, `fare`, `ownerID`) VALUES
(1, 'Kasun Fernando', 712345678, 'KK1234', 35, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`localityID`) REFERENCES `locality` (`id`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `locality_id` FOREIGN KEY (`locality_id`) REFERENCES `locality` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`localityID`) REFERENCES `locality` (`id`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`ownerID`) REFERENCES `owners` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
