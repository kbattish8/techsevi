-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2022 at 07:25 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technology`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`name`, `email`, `date`) VALUES
('kb', 'kb@gmail.com', '2022-11-19'),
('kms', 'k@gmail.com', '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sno`, `fname`, `lname`, `email`, `mobile`, `message`) VALUES
(4, 'kn', 'd', 'k@gmail.com', 14522, 'good'),
(3, 'kb', 'kj', 'k@gmail.com', 896745, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'karmanyab24', 'battish23', '', ''),
(2, 'kb77', '12345', 'karmanya', 'battish'),
(3, 'kb273', '123456', 'k', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `img` text NOT NULL,
  `discription` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `category`, `qty`, `price`, `img`, `discription`) VALUES
(1, 'Bose bluetooth mx100', 'speaeker', 1, 10000, 'bose.png', 'Simple setup:  Connect this smart soundbar to your TV via an optical audio cable (included) or an HDMI cable (sold separately) and download the Bose Music app for step by step setup.'),
(2, 'Samsung VR', 'VR', 1, 20500, 'samsung.png', 'Brand:Samsung\r\nManufacturer:Samsung\r\nModel:SM-R322NZWAXAR\r\nModel Year:2016\r\nProduct Dimensions:23.11 x 10.41 x 19.05 cm; 317.51 Grams\r\nBatteries:2 AA batteries required.'),
(3, 'Xbox Series X', 'console', 1, 39999, 'xbox x.png', 'Experience next-gen speed and performance with the Xbox velocity architecture, powered by a custom SSD and integrated software\r\n'),
(4, 'Skullcandy bluetooth', 'headphone', 1, 15000, 'skullcandy.png', 'Brand:Skullcandy\r\nModel Name:Hesh Evo\r\nColour:White Yellow\r\nForm Factor:Over Ear\r\nConnector Type:Wireless'),
(5, 'Steelseries mx100', 'headphone', 1, 10000, 'headphones.png', 'Brand:SteelSeries\r\nModel Name:Arctis\r\nColour:White\r\nForm Factor:On Ear\r\nConnector Type:Wired'),
(6, 'Oculus VR', 'VR', 1, 37500, 'vr.png', 'Standalone Headset no pc no wire'),
(7, 'B&O W1000', 'speaeker', 1, 7500, 'speaker.png', 'Brand:GOgroove\r\nSpeaker Type:Subwoofer\r\nSpecial Feature:Subwoofer\r\nRecommended Uses:For Product Music,Gaming\r\nCompatible Device:Laptop, Desktop'),
(8, 'Sony Playstation 5', 'console', 1, 45000, 'ps5.png', '3D audio via built-in TV speakers or analogue/USB stereo headphones. Setup required.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
