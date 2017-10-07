-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 02:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hostipalps`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(11) NOT NULL,
  `weight` double NOT NULL,
  `pressure` double NOT NULL,
  `temperature` double NOT NULL,
  `symptom` text NOT NULL,
  `status` enum('pending','queue','seen') NOT NULL,
  `arrivaldate` date NOT NULL,
  `assignto` int(11) NOT NULL,
  `nurseid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `patientid`, `weight`, `pressure`, `temperature`, `symptom`, `status`, `arrivaldate`, `assignto`, `nurseid`) VALUES
(1, 7, 45, 232, 212, 'weludy eqiudb qu', 'seen', '2017-10-01', 3, 5),
(2, 6, 70, 90.5, 37, 'wwq eqwuqwsaa<br />\nwqueyqw qwuyqqd<br />\nqw45d 7qw, oiq<br />\n-qwygbd<br />\n- uywqiuqw <br />\n- qwiuyqw', 'seen', '2017-10-01', 3, 5),
(3, 6, 130, 45, 23, 'ewue euqoqwe qweqw eqwoi', 'seen', '2017-10-02', 3, 5),
(4, 11, 72, 50, 37, 'tr gryt gruy grjytg ruy', 'seen', '2017-10-05', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `labexam`
--

CREATE TABLE IF NOT EXISTS `labexam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `WBC_COUNT` double DEFAULT NULL,
  `RBC_COUNT` double DEFAULT NULL,
  `HEMOGLOBIN` double DEFAULT NULL,
  `HEMATOCRIT` double DEFAULT NULL,
  `MCV` double DEFAULT NULL,
  `MCH` double DEFAULT NULL,
  `MCHC` double DEFAULT NULL,
  `RDW_CV` double DEFAULT NULL,
  `PLATELET_COUNT` double DEFAULT NULL,
  `MPV` double DEFAULT NULL,
  `madedate` date DEFAULT NULL,
  `pay` int(11) DEFAULT NULL,
  `status` enum('queue','done') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `labexam`
--

INSERT INTO `labexam` (`id`, `cid`, `WBC_COUNT`, `RBC_COUNT`, `HEMOGLOBIN`, `HEMATOCRIT`, `MCV`, `MCH`, `MCHC`, `RDW_CV`, `PLATELET_COUNT`, `MPV`, `madedate`, `pay`, `status`) VALUES
(3, 2, 12, 13, 24, 13, 21, 51, 54, 21, 21, 21, '2017-10-02', 70, 'done'),
(4, 4, 13, 13, 435, 53, 53, 353, 53, 53, 53, 53, '2017-10-05', 100, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay` double NOT NULL,
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `paydate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `pay`, `aid`, `pid`, `cid`, `paydate`) VALUES
(1, 70, 8, 7, 1, '2017-10-01 18:36:49'),
(3, 70, 8, 6, 2, '2017-10-01 18:37:36'),
(4, 120, 8, 6, 3, '2017-10-02 17:10:57'),
(5, 100, 8, 11, 4, '2017-10-05 12:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `cid`, `did`, `cdate`, `note`) VALUES
(1, 1, 3, '2017-10-01', 'uqy weuwe qweuasd asiduas dasoiudqw eoasd asldihq wuass<br />\r\n- qwiueyqwueyoqw <br />\r\n-  wqueyoqwiehqwe<br />\r\n- qwoeuywqoieoqw <br />\r\n- qweuiqwe<br />\r\nquwewqe qwieuyq assduasodas dasudasd askuhs'),
(2, 1, 3, '2017-10-02', 'fewhy htrjd erjyf d<br />\r\njyr'),
(3, 1, 3, '2017-10-02', 'yqwtew qeqowieqw eoiqwb qw'),
(4, 2, 3, '2017-10-02', 'tqwiwq qwiuehqw eqwue asoidas dasouhdas douiqw dasoubd as'),
(5, 3, 3, '2017-10-02', 'wuwqyeoiw asdhna s,duqw e'),
(6, 4, 3, '2017-10-05', 'teuydhythgduyx reytr dhtgd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `phone` int(9) unsigned zerofill NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `birthday` date NOT NULL,
  `usertype` int(1) NOT NULL,
  `registrationdate` datetime NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `sex`, `birthday`, `usertype`, `registrationdate`, `username`, `pass`) VALUES
(1, 'Adminisatrator', 000000000, 'Male', '2014-04-15', 6, '2017-10-01 12:46:10', 'admin', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9'),
(3, 'Fredius Tout Court', 123456789, 'Male', '1993-11-06', 5, '2017-10-01 14:38:43', 'fredius', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9'),
(4, 'Fredius Tout Court Ori', 123456789, 'Male', '1993-11-06', 4, '2017-10-01 14:40:21', 'frediustc', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9'),
(5, 'Andreas Tout Court Gisel', 123456789, 'Female', '1994-06-06', 2, '2017-10-01 15:21:50', 'Andytc', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9'),
(6, 'Kouadio Kan', 123456789, 'Male', '2003-10-06', 1, '2017-10-01 16:48:06', NULL, NULL),
(7, 'Anabel Wong', 546161301, 'Female', '1990-12-12', 1, '2017-10-01 16:49:06', NULL, NULL),
(8, 'Barklays Don', 123456789, 'Male', '1992-11-11', 4, '2017-10-01 18:14:54', 'Barklays', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9'),
(9, 'Laboratoire', 123456789, 'Female', '1993-01-01', 3, '2017-10-01 20:31:02', 'labor', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9'),
(10, 'Fredius Tout Court Jr', 987654321, 'Male', '1994-12-06', 1, '2017-10-02 18:11:22', NULL, NULL),
(11, 'Ernest', 123456789, 'Male', '1993-10-10', 1, '2017-10-05 12:06:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`) VALUES
(1, 'Patient'),
(2, 'Nurse'),
(3, 'Lab'),
(4, 'Acounting'),
(5, 'Doctor'),
(6, 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
