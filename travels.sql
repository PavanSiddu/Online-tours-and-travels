-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 07:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `travel_det` ()  SELECT * FROM travel_agency$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(10) NOT NULL,
  `a_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_pass`) VALUES
(1, 'pavan', '123'),
(2, 'praveen', '987');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ticket_no` int(11) NOT NULL,
  `no_pass` int(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `card_no` bigint(20) NOT NULL,
  `travelled` int(11) NOT NULL DEFAULT '0',
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `cancel` AFTER DELETE ON `booking` FOR EACH ROW INSERT INTO cancelled(`t_no`,`no_pass`,`pid`,`uid`,`total`,`card_no`) VALUES(old.ticket_no,old.no_pass,old.pid,old.u_id,old.total,old.card_no )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled`
--

CREATE TABLE `cancelled` (
  `t_no` int(11) NOT NULL,
  `no_pass` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `card_no` int(11) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `p_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mode` varchar(11) NOT NULL,
  `from` varchar(11) NOT NULL,
  `to` varchar(11) NOT NULL,
  `agency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`p_id`, `amount`, `date&time`, `mode`, `from`, `to`, `agency_id`) VALUES
(1, 500, '2018-11-04 18:30:00', 'bus', 'bangalore', 'mysore', 9),
(2, 300, '2018-11-04 23:59:04', 'aeroplane', 'bangalore', 'mysore', 8),
(3, 500, '2018-11-20 18:30:00', 'aeroplane', 'mysore', 'bangalore', 1),
(4, 300, '2017-12-31 23:30:00', 'bus', 'mandya', 'bangalore', 1),
(5, 1000, '2018-10-08 06:30:00', 'train', 'mangalore', 'mysore', 8),
(6, 400, '2018-10-07 19:30:00', 'train', 'arsikere', 'mysore', 9),
(7, 1500, '2018-10-08 01:30:00', 'aeroplane', 'bangalore', 'chennai', 9),
(9, 500, '2018-10-09 01:30:00', 'bus', 'koppa', 'arsikere', 10),
(10, 1000, '2018-10-09 23:35:05', 'train', 'mumbai', 'bangalore', 1),
(11, 500, '2018-10-09 01:30:00', 'aeroplane', 'mangalore', 'chennai', 8);

-- --------------------------------------------------------

--
-- Table structure for table `selects`
--
-- Error reading structure for table travels.selects: #1932 - Table 'travels.selects' doesn't exist in engine
-- Error reading data for table travels.selects: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `travels`.`selects`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `travel_agency`
--

CREATE TABLE `travel_agency` (
  `t_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `t_mail` varchar(20) NOT NULL,
  `t_password` varchar(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_agency`
--

INSERT INTO `travel_agency` (`t_id`, `name`, `t_mail`, `t_password`, `phone`, `address`, `approval`) VALUES
(1, 'vrl', 'vrl@gmail.com', 'vrl', 12345678, 'no1 ,jp nagar', 1),
(8, 'srs', 'srs@gmail.com', 'srs', 900876, 'no60,,jayanagar', 1),
(9, 'kaveri travels', 'kaveri@gmail.com', 'kaveri', 99876, 'sciuscusiusc', 1),
(10, 'ravi tours', 'ravi@gmail.com', 'ravi', 9880899747, 'hvhjbskjbjsb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `phno` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `id`, `phno`, `mail`, `password`) VALUES
('pavan', 1, 98808, 'pav@gmail', '123'),
('pavan', 2, 90087655, 'pavan@cmr', '567'),
('praveen', 3, 90087655, 'prav@gmail', '123'),
('nitesh', 4, 2147483647, 'nits@cmrit.com', '987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `pid` (`pid`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `cancelled`
--
ALTER TABLE `cancelled`
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Indexes for table `travel_agency`
--
ALTER TABLE `travel_agency`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ticket_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `travel_agency`
--
ALTER TABLE `travel_agency`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `package` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cancelled`
--
ALTER TABLE `cancelled`
  ADD CONSTRAINT `cancelled_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `travel_agency` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
