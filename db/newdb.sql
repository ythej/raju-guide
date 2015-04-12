-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2015 at 09:30 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `contest`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `cost` bigint(6) NOT NULL,
  `rating` int(2) NOT NULL,
  `address` varchar(200) default NULL,
  `ph` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`id`, `name`, `cost`, `rating`, `address`, `ph`) VALUES
(1, 'Mountain View', 1500, 4, 'Vasco', '9999999999'),
(2, 'Holiday Inn', 2000, 5, 'Madgoan', '8888888888'),
(3, 'Mouya Hotel', 800, 3, 'Pangim', '7777777777'),
(4, 'Taj Hotel', 5000, 5, 'Arambol Beach', '6666666666'),
(5, 'Linkin Cottage', 1500, 4, 'Calangute Beach', '5555555555');

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE `attraction` (
  `id` int(5) NOT NULL auto_increment,
  `cid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `open` int(5) NOT NULL,
  `close` int(11) NOT NULL,
  `best` int(11) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cid` (`cid`,`location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `attraction`
--

INSERT INTO `attraction` (`id`, `cid`, `name`, `open`, `close`, `best`, `desc`, `location`) VALUES
(1, 1, 'Condolim Water Sports', 10, 17, 600, 'Water Jets, Banana Ride, Parachute ride', 'Condolim Beach'),
(2, 1, 'Baga Night Light', 18, 24, 600, 'Dance, Sing', 'Baga Beach'),
(3, 1, 'Aguada fort', 10, 17, 0, 'Fort', 'Panaji'),
(4, 1, 'Agonda fort', 10, 17, 0, 'Fort', 'Vasco'),
(5, 1, 'Deltin Royole', 18, 24, 2000, 'Gain Money', 'Panjim'),
(6, 1, 'Dana paula Beach', 10, 18, 0, 'Beach', 'Dana paula'),
(7, 1, 'Ship Cruising', 18, 20, 300, 'Boating', 'Panjim'),
(8, 1, 'Agape Church', 9, 17, 0, 'Temple', 'Karmali'),
(9, 1, 'Butterfly Beach', 9, 18, 1200, 'Private Beach', 'Pollelem'),
(10, 1, 'Scuba Diving', 9, 17, 800, 'Deep sea diving', 'North Goa');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `month` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `type`, `month`) VALUES
(1, 'Goa', 'Beach', 'Oct-Jan'),
(3, 'Kashmir', 'Hill Station', 'Apr-Jul'),
(4, 'Agra', 'Monuments', 'Sep-Jan'),
(5, 'Rameshwaram', 'Religious', 'Oct-Jan');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(10) NOT NULL auto_increment,
  `mid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `member`
--


-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(5) NOT NULL auto_increment,
  `oid` int(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `min` int(5) NOT NULL,
  `max` int(5) NOT NULL,
  `pdate` date NOT NULL,
  `last_date` date NOT NULL,
  `nod` int(5) NOT NULL,
  `budget` int(6) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `commute` varchar(50) NOT NULL,
  `dt` datetime NOT NULL,
  `hid` int(5) NOT NULL,
  `status` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `oid` (`oid`,`pdate`,`last_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `plan`
--


-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

CREATE TABLE `planner` (
  `id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `day` int(5) NOT NULL,
  `attraction` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planner`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(16) NOT NULL,
  `city` varchar(20) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `phn` varchar(10) NOT NULL,
  `dp` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `pwd`, `city`, `dob`, `phn`, `dp`) VALUES
(1, 'rishabh parashar', 'm', 'rishucoolbuddy@gmail.com', 'Abc123@', 'surat', '04/15/2015', '9724783389', ''),
(2, 'Brijesh borad', 'm', 'birju@gmail.com', 'Abc123@', 'surat', '03/01/2015', '9724783390', '');
