-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 10:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `to_do_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `things_to_do`
--

CREATE TABLE IF NOT EXISTS `things_to_do` (
  `TaskId` int(12) NOT NULL AUTO_INCREMENT,
  `TaskName` varchar(32) NOT NULL,
  `TaskDay` varchar(20) NOT NULL,
  `TaskAction` varchar(50) NOT NULL,
  `TaskStatus` enum('Done','Undone','','') NOT NULL,
  PRIMARY KEY (`TaskId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `things_to_do`
--

INSERT INTO `things_to_do` (`TaskId`, `TaskName`, `TaskDay`, `TaskAction`, `TaskStatus`) VALUES
(12, 'Dishes', 'Everyday', 'Take care of dishes after meal', 'Done'),
(13, 'dentist', 'monday', 'Voicing of Mudi', 'Done');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
