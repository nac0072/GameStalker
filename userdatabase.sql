-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2012 at 04:52 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `psn_friends`
--

CREATE TABLE IF NOT EXISTS `psn_friends` (
  `fk_pUserId` int(11) NOT NULL,
  `FriendUser` varchar(45) DEFAULT NULL,
  KEY `pUserId` (`fk_pUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `steam_friends`
--

CREATE TABLE IF NOT EXISTS `steam_friends` (
  `fk_sUserId` int(11) NOT NULL,
  `FriendUser` varchar(45) DEFAULT NULL,
  KEY `sUserId` (`fk_sUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `XboxId` varchar(45) DEFAULT NULL,
  `PsnId` varchar(45) DEFAULT NULL,
  `SteamId` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Password`, `XboxId`, `PsnId`, `SteamId`) VALUES
(1, 'agbishop', 'adebff52799054233f37c96cd8fe569f', NULL, 'blackbird7180', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `xbox_friends`
--

CREATE TABLE IF NOT EXISTS `xbox_friends` (
  `fk_xUserId` int(11) NOT NULL,
  `FriendUser` varchar(45) DEFAULT NULL,
  KEY `xUserId` (`fk_xUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `psn_friends`
--
ALTER TABLE `psn_friends`
  ADD CONSTRAINT `pUserId` FOREIGN KEY (`fk_pUserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `steam_friends`
--
ALTER TABLE `steam_friends`
  ADD CONSTRAINT `sUserId` FOREIGN KEY (`fk_sUserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `xbox_friends`
--
ALTER TABLE `xbox_friends`
  ADD CONSTRAINT `xUserId` FOREIGN KEY (`fk_xUserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
