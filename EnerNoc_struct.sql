-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2013 at 04:30 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `green`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumption`
--

CREATE TABLE IF NOT EXISTS `consumption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` double NOT NULL,
  `temp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36574 ;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL,
  `sub_industry` varchar(100) NOT NULL,
  `sq` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `rate` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
