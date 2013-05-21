-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2013 at 11:09 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knightgaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `newspost`
--

CREATE TABLE IF NOT EXISTS `newspost` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'News ID',
  `newsTitle` varchar(50) NOT NULL COMMENT 'News Title',
  `newsDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'News Post Date',
  `newsPoster` varchar(50) NOT NULL COMMENT 'News Poster',
  `newsContent` longtext NOT NULL COMMENT 'News Content',
  PRIMARY KEY (`newsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newspost`
--

INSERT INTO `newspost` (`newsID`, `newsTitle`, `newsDate`, `newsPoster`, `newsContent`) VALUES
(1, 'Welcome to Knight Gaming', '2013-05-21 20:43:12', '1', 'Hello Everyone'),
(2, 'This is a second post', '2013-05-21 21:00:13', '1', 'Hey, Just wanted to test to make sure everything was working correctly.');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE IF NOT EXISTS `userinformation` (
  `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `firstName` varchar(30) NOT NULL COMMENT 'First Name',
  `lastName` varchar(30) NOT NULL COMMENT 'Last Name',
  `username` varchar(30) NOT NULL COMMENT 'Username',
  `password` mediumtext NOT NULL COMMENT 'Password',
  `email` varchar(30) NOT NULL COMMENT 'Email Address',
  `birthday` date NOT NULL COMMENT 'Birthday',
  `admin` int(1) NOT NULL DEFAULT '0' COMMENT 'Admin',
  `class` varchar(10) NOT NULL COMMENT 'Class',
  `position` varchar(20) NOT NULL COMMENT 'Position',
  `joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Join Date',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`userID`, `firstName`, `lastName`, `username`, `password`, `email`, `birthday`, `admin`, `class`, `position`, `joinDate`) VALUES
(1, 'Greg', 'Ellis', 'gellis', '123', 'gellis@arcadia.edu', '2013-05-01', 1, 'junior', 'President', '2013-05-21 20:42:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
