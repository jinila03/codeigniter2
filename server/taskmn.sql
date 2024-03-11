-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 10:50 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskmn`
--
CREATE DATABASE IF NOT EXISTS `taskmn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `taskmn`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `place` varchar(32) NOT NULL,
  `loginid` int(11) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `utype` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `status`, `utype`) VALUES
(1, 'anu@gmail.com', '$2y$10$JO9esPsKHdsYVJfo.luwceOA0', '1', '1'),
(4, 'admin@gmail.com', '$2y$10$R.mxsb5XGJi6qmau1htbc.RJB', '1', '1'),
(5, 'j@gmail.com', '123', '1', '0'),
(6, 'jj@gmail.com', '$2y$10$fFw1LBLw5SUrlWyPWCFxD.nur', '1', '1'),
(7, 'p@gmail.com', '111', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(32) NOT NULL,
  `loginid` int(11) NOT NULL,
  `regno` varchar(32) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`tid`, `task`, `loginid`, `regno`) VALUES
(1, 'clean the floor', 7, '0'),
(2, '  work on home', 0, ''),
(3, 'work on b section', 0, ''),
(4, 'sasdas', 0, ''),
(5, 'vdf', 0, ''),
(6, 'dwd', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(28) NOT NULL,
  `regno` varchar(27) NOT NULL,
  `address` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `loginid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `regno`, `address`, `place`, `loginid`) VALUES
(1, 'anu', '123', 'anu villa', 'anchal', 3),
(2, 'admin', '345', 'kollam', 'anchal', 4),
(3, 'jinila', '134', 'kollam', 'anchal', 5),
(4, 'jinila', '134', '4\r\n\r\n4', 'anchal', 6),
(5, 'jinila', '134', '4\r\n\r\n4', 'anchal', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
