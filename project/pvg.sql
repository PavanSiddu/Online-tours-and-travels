-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 03:10 PM
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
-- Database: `pvg`
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
  `a_name` varchar(20) NOT NULL,
  `a_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_pass`) VALUES
(1, 'pavan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ticket_no` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `no_pass` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `card_no` int(11) NOT NULL,
  `travelled` int(11) NOT NULL DEFAULT '0',
  `a_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ticket_no`, `pack_id`, `no_pass`, `total`, `u_id`, `card_no`, `travelled`, `a_id`) VALUES
(4, 4, 2, 600, 6, 98076643, 0, 1),
(5, 5, 3, 900, 3, 12098765, 0, 1),
(7, 6, 2, 1000, 6, 98767543, 0, 1),
(8, 7, 2, 4000, 3, 123456789, 0, 1),
(9, 1, 1, 500, 3, 123, 0, 1);

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `cancel` AFTER DELETE ON `booking` FOR EACH ROW INSERT INTO cancelled_ticket(`ticket_no`,`no_pass`,`pack_id`,`u_id`,`total`,`card`) VALUES(old.ticket_no,old.no_pass,old.pack_id,old.u_id,old.total,old.card_no )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_ticket`
--

CREATE TABLE `cancelled_ticket` (
  `ticket_no` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `no_pass` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `a_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancelled_ticket`
--

INSERT INTO `cancelled_ticket` (`ticket_no`, `u_id`, `pack_id`, `total`, `no_pass`, `card`, `a_id`) VALUES
(1, 3, 1, 1500, 3, 12344567, 1),
(2, 3, 2, 2000, 2, 12345678, 1),
(5, 3, 3, 4000, 2, 98765433, 1),
(6, 3, 7, 4000, 2, 123459876, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `p_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date&time` text NOT NULL,
  `mode` varchar(20) NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`p_id`, `amount`, `date&time`, `mode`, `from`, `to`, `agency_id`, `a_id`) VALUES
(1, 500, '2018-01-01 05:00:00', 'bus', 'mysore', 'bangalore', 4, 1),
(2, 1000, '2018-12-01', 'train', 'koppa', 'arsikere', 4, 1),
(3, 2000, '2018-12-02', 'aeroplane', 'bangalore', 'mysore', 5, 1),
(4, 300, '2018-12-03 00:00:00', 'bus', 'mandya', 'mysore', 5, 1),
(5, 300, '2018-12-06 05:00:00', 'train', 'bangalore', 'mysore', 6, 1),
(6, 500, '2018-12-06 12:30:00', 'bus', 'bangalore', 'mysore', 7, 1),
(7, 2000, '2018-12-06 01:00:00', 'aeroplane', 'bangalore', 'mysore', 4, 1),
(8, 400, '2018-12-06 12:00:00', 'bus', 'koppa', 'arsikere', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `travel_agency`
--

CREATE TABLE `travel_agency` (
  `t_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `t_mail` varchar(20) NOT NULL,
  `t_password` varchar(20) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT '0',
  `a_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_agency`
--

INSERT INTO `travel_agency` (`t_id`, `name`, `phone`, `address`, `t_mail`, `t_password`, `approval`, `a_id`) VALUES
(4, 'vrl', 2147483647, 'no60,,jayanagar', 'vrl@gmail.com', 'vrl', 1, 1),
(5, 'srs', 1234567890, 'no60,,jayanagar', 'srs@gmail.com', 'srs', 1, 1),
(6, 'kaveri travels', 2147483647, 'no20,kr puram', 'kaveri@gmail.com', 'kav', 1, 1),
(7, 'ravi tours', 2147483647, 'jayanagar 4th block', 'ravi@gmail.com', 'ravi', 1, 1),
(8, 'Ayravatha', 2147483647, 'no9 kolar', 'Ayr@gmail.com', 'ayr', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `a_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `mail`, `password`, `name`, `phone`, `a_id`) VALUES
(3, 'pav@gmail', '123', 'pavan', 90087655, 1),
(4, 'prav@gmail', 'prav', 'praveen', 2147483647, 1),
(6, 'shubz@gmail.com', 'shu', 'shuba', 2147483647, 1),
(7, 'raj@gmail.com', 'raj', 'raj', 988007654, 1);

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
  ADD KEY `pack_id` (`pack_id`),
  ADD KEY `a_id` (`a_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `cancelled_ticket`
--
ALTER TABLE `cancelled_ticket`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `agency_id` (`agency_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `travel_agency`
--
ALTER TABLE `travel_agency`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `a_id` (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ticket_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `travel_agency`
--
ALTER TABLE `travel_agency`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`pack_id`) REFERENCES `package` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cancelled_ticket`
--
ALTER TABLE `cancelled_ticket`
  ADD CONSTRAINT `cancelled_ticket_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `travel_agency` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `travel_agency`
--
ALTER TABLE `travel_agency`
  ADD CONSTRAINT `travel_agency_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
