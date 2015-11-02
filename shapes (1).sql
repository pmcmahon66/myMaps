-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 09:25 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcginleybus`
--

-- --------------------------------------------------------

--
-- Table structure for table `shapes`
--

CREATE TABLE IF NOT EXISTS `shapes` (
  `shape_id` int(11) NOT NULL,
  `shape_pt_lat` float(10,6) NOT NULL,
  `shape_pt_lon` float(10,6) NOT NULL,
  `shape_pt_sequence` int(11) NOT NULL,
  `shape_dist_traveled` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`shape_id`, `shape_pt_lat`, `shape_pt_lon`, `shape_pt_sequence`, `shape_dist_traveled`) VALUES
(13, 54.953800, -7.729315, 1, 0.000000),
(13, 54.954018, -7.729064, 2, 0.000000),
(13, 54.954044, -7.728954, 3, 0.000000),
(13, 54.954025, -7.728689, 4, 0.000000),
(13, 54.953819, -7.728862, 5, 0.000000),
(13, 54.953495, -7.729021, 6, 0.000000),
(13, 54.953423, -7.728865, 7, 0.000000),
(13, 54.953297, -7.728897, 8, 0.000000),
(13, 54.953083, -7.728414, 9, 0.000000),
(13, 54.952358, -7.726265, 10, 0.000000),
(13, 54.951389, -7.722931, 11, 0.000000),
(13, 54.951080, -7.721794, 12, 0.000000),
(13, 54.950321, -7.719317, 13, 0.000000),
(13, 54.950237, -7.718958, 14, 0.000000),
(13, 54.949722, -7.717276, 15, 0.000000),
(13, 54.949596, -7.716965, 16, 0.000000),
(13, 54.949120, -7.716235, 17, 0.000000),
(13, 54.949162, -7.716141, 18, 0.000000),
(13, 54.949188, -7.715984, 19, 0.000000),
(13, 54.949181, -7.715828, 20, 0.000000),
(13, 54.949116, -7.715673, 21, 0.000000),
(13, 54.949055, -7.715595, 22, 0.000000),
(13, 54.948975, -7.715564, 23, 0.000000),
(13, 54.948532, -7.714740, 24, 0.000000),
(13, 54.948097, -7.713807, 25, 0.000000),
(13, 54.947952, -7.713605, 26, 0.000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
