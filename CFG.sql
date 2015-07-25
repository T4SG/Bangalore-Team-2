-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2015 at 07:15 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CFG`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AID` int(10) NOT NULL COMMENT 'Admin ID',
  `A_NAME` varchar(50) DEFAULT NULL,
  `A_EMAIL` varchar(100) DEFAULT NULL,
  `A_PHNO` int(10) NOT NULL,
  `LEVEL` int(2) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `A_NAME`, `A_EMAIL`, `A_PHNO`, `LEVEL`) VALUES
(1, 'Ram Kumar', 'ram@gmail.com', 2147483647, 12),
(2, 'Gopal Kumar', 'gopal@gmail.com', 991723737, 12),
(3, 'Gopal', 'Kumar', 2147483647, 13),
(4, 'Krithika', 'kruthika@gmail.com', 827468984, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `mentor` (
  `mid` int(11) NOT NULL,
  `mname` varchar(45) NOT NULL,
  `mgender` varchar(45) NOT NULL,
  `mdob` date NOT NULL,
  `mqual` varchar(45) NOT NULL,
  `mph` int(11) NOT NULL,
  `maddr` varchar(100) NOT NULL,
  PRIMARY KEY (`mid`),
  UNIQUE KEY `mid_UNIQUE` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mid`, `mname`, `mgender`, `mdob`, `mqual`, `mph`, `maddr`) VALUES
(1, 'Rajat Kumar', 'Male', '2015-07-09', 'B.E', 818177625, 'Q/no 21 bangalore'),
(2, 'sim', 'female', '2015-07-20', 'computers', 2147483647, 'banglore'),
(3, 'raj', 'male', '2015-07-08', 'writing', 2147483647, 'mp synergy ap'),
(4, 'ravi', 'male', '2015-07-19', 'communication', 2147483647, 'banglore');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `AID` int(10) NOT NULL,
  `MSG` varchar(500) NOT NULL,
  `MID` int(10) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`AID`, `MSG`, `MID`) VALUES
(1, 'Many Many returns of the day.', 2),
(2, 'Bye Bye', 3),
(3, 'Helloo Hello', 4),
(123, 'Hello how are you !', 12334);

-- --------------------------------------------------------

--
-- Table structure for table `mlang`
--

CREATE TABLE IF NOT EXISTS `mlang` (
  `mid` int(11) NOT NULL,
  `mlan` varchar(50) NOT NULL,
  PRIMARY KEY (`mid`,`mlan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mstren`
--

CREATE TABLE IF NOT EXISTS `mstren` (
  `mid` int(10) NOT NULL,
  `mstrengths` varchar(50) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `SID` varchar(10) NOT NULL,
  `MID` varchar(10) NOT NULL,
  `TASK` varchar(80) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`SID`, `MID`, `TASK`, `DATE`) VALUES
('1', '2', 'Learn quant. in math', '2015-07-23'),
('2', '2', 'Learn Physics', '2015-07-22'),
('3', '4', 'Learn Biology', '2015-07-15'),
('4', '4', 'Learn Math', '2015-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `slang`
--

CREATE TABLE IF NOT EXISTS `slang` (
  `sid` int(11) NOT NULL,
  `slan` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`,`slan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `sgender` varchar(45) NOT NULL,
  `sdob` date NOT NULL,
  `squal` varchar(45) NOT NULL,
  `sph` int(11) NOT NULL,
  `saddr` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid_UNIQUE` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sweak`
--

CREATE TABLE IF NOT EXISTS `sweak` (
  `sid` int(10) NOT NULL,
  `sweakness` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mlang`
--
ALTER TABLE `mlang`
  ADD CONSTRAINT `mid` FOREIGN KEY (`mid`) REFERENCES `mentor` (`mid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slang`
--
ALTER TABLE `slang`
  ADD CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
