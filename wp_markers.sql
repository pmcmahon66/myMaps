-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 06:47 PM
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
-- Table structure for table `wp_markers`
--

CREATE TABLE IF NOT EXISTS `wp_markers` (
  `stop_id` int(11) NOT NULL,
  `stop_name` varchar(60) NOT NULL,
  `stop_lat` float(10,6) NOT NULL,
  `stop_lon` float(10,6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_markers`
--

INSERT INTO `wp_markers` (`stop_id`, `stop_name`, `stop_lat`, `stop_lon`) VALUES
(1, 'Ballygawley Park and Ride', 54.462826, -7.028651),
(2, 'Omagh', 54.610703, -7.323314),
(3, 'Tourist Information O''Connell Street', 53.351028, -6.260513),
(4, 'Dublin Writer''s Museum', 53.354298, -6.263970),
(5, 'Cassidys Hotel', 53.353371, -6.262040),
(6, 'Rotunda, Hugh Lane Galllery', 53.354263, -6.264077),
(7, 'Dublin Airport  ', 53.428970, -6.241244),
(8, 'Dublin Airport  ', 53.428776, -6.240861),
(9, 'Toyota Garage', 53.866371, -6.545041),
(10, 'Cockhill Road', 55.136784, -7.456045),
(11, 'Bunbeg Cross Roads, Gweedore', 55.060890, -8.300553),
(12, 'Car Park, Creeslough', 55.123032, -7.909135),
(13, 'Annagry', 55.021553, -8.315990),
(14, 'Dunfanaghy', 55.183254, -7.971691),
(15, 'Main Street Moville', 55.189049, -7.039814),
(16, 'Letterkenny, Mr. Chippy Chip Shop', 54.953758, -7.729190),
(17, 'Kilmacrennan', 55.030499, -7.779554),
(18, 'McGee''s Service Station', 55.136242, -8.105888),
(19, 'The Diamond Carndonagh', 55.251282, -7.261468),
(20, 'Crolly', 55.026474, -8.260743),
(21, 'Loch Altan, Loch Altan', 55.121529, -8.133126),
(22, 'Loch Altan, Loch Altan', 55.121517, -8.133048),
(23, 'Lifford, AIB Lifford', 54.831825, -7.482939),
(24, 'Derry Road Monaghan', 54.258549, -6.959342),
(25, 'Killybrone, Aughnacloy', 54.415440, -6.977188);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_markers`
--
ALTER TABLE `wp_markers`
  ADD PRIMARY KEY (`stop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_markers`
--
ALTER TABLE `wp_markers`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
