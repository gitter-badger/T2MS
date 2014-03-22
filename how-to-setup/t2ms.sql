-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2014 at 07:09 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `t2ms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `t2ms`;
DROP TABLE IF EXISTS `trips`, `tuksessions`,`tags`, `sessions`, `vehicles`,`customer`, `locality`, `owners`;

--
-- Database: `t2ms`
--

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
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `blacklisted`, `maxFare`) VALUES
(1, 'Madawa Soysa', 123123123, 0, 40),
(9, 'Chandana Gamage', 123467890, 0, 500),
(10, 'Nisansa Silva', 214748647, 1, 100),
(11, 'Chathura Silva', 789456123, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `locality`
--

CREATE TABLE IF NOT EXISTS `locality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `locality`
--

INSERT INTO `locality` (`id`, `name`) VALUES
(1, 'Moratuwa'),
(2, 'Ratmalana'),
(3, 'Udupila'),
(4, 'Kelaniya'),
(5, 'Panadura'),
(6, 'Kandy'),
(7, 'Kakka Palliya'),
(8, 'Maradana');

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
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `address`, `contact`, `password`) VALUES
(1, 'Isuru Fernando', 'Katubedda,Moratuwa', 715465178, ''),
(2, 'Menda', 'Address na!', 789452695, '123456'),
(3, 'Rabaa', 'Halawatha', 486756100, '123456'),
(4, 'Cooray', 'Anywhere', 745123689, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `locality_id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`locality_id`,`tag`),
  KEY `locality_id` (`locality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`locality_id`, `tag`) VALUES
(1, 'mora'),
(1, 'moratuwe'),
(2, 'rathmalana'),
(3, 'udhupila'),
(4, 'Kalaniya'),
(4, 'kelaniye'),
(5, 'panadure');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fare` int(11) NULL,
  `status` int(11) NOT NULL,
  `startLocation` int(11) NOT NULL,
  `endLocation` int(11) NOT NULL,
  `vehicleID` int(11),
  `customerID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `localityID` (`startLocation`),
  KEY `vehicleID` (`vehicleID`),
  KEY `customerID` (`customerID`),
  KEY `endLocation` (`endLocation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `time`, `fare`, `status`, `startLocation`, `endLocation`, `vehicleID`, `customerID`) VALUES
(3, '2014-03-05 01:38:00', 45, 2, 1, 1, 1, 1),
(5, '2014-03-10 05:42:00', 452, 1, 2, 4, 2, 1),
(6, '2014-03-10 05:44:00', 45, 1, 5, 1, 4, 9),
(7, '2014-03-09 23:55:00', 45, 2, 5, 1, 2, 11),
(8, '2014-03-09 23:55:00', 45, 2, 5, 1, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tuksessions`
--

CREATE TABLE IF NOT EXISTS `tuksessions` (
  `vehicleID` int(11) NOT NULL,
  `localityID` int(11) NOT NULL,
  `startTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endTime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vehicleID`,`startTime`),
  KEY `session_ibfk_1` (`localityID`),
  KEY `session_ibfk_2` (`vehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerID` (`ownerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `driverName`, `driverContact`, `vehicleNum`, `fare`, `ownerID`) VALUES
(1, 'Kasun Fernando', 712345678, 'KK1234', 35, 1),
(2, 'Shenal', 123456889, '1', 45, 1),
(3, 'Sabra', 245698574, '1', 45879, 2),
(4, 'Nazeer', 643784678, '2', 5, 4),
(5, 'Rajith', 789456254, '2', 40, 3),
(6, 'Malaka', 456987123, '45', 65, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `locality_id` FOREIGN KEY (`locality_id`) REFERENCES `locality` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`startLocation`) REFERENCES `locality` (`id`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `trips_ibfk_4` FOREIGN KEY (`endLocation`) REFERENCES `locality` (`id`);

--
-- Constraints for table `tuksessions`
--
ALTER TABLE `tuksessions`
  ADD CONSTRAINT `tuksessions_ibfk_1` FOREIGN KEY (`localityID`) REFERENCES `locality` (`id`),
  ADD CONSTRAINT `tuksessions_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`ownerID`) REFERENCES `owners` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
