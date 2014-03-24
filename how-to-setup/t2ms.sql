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


-- --------------------------------------------------------

--
-- Table structure for table `locality`
--

CREATE TABLE IF NOT EXISTS `locality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;


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
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `SMSs` (
  `phone` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (phone,message)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


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


            if($contact==123&&$password==456){
                $this->Session->write('userid','admin');
                $this->Session->write('userrole','admin');
                return $this->redirect('/dashboard');
            }