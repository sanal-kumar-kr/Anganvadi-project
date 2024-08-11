-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 07:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anganvadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_days`
--

CREATE TABLE `tbl_days` (
  `did` int(11) NOT NULL,
  `day_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_days`
--

INSERT INTO `tbl_days` (`did`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_items`
--

CREATE TABLE `tbl_food_items` (
  `fid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food_items`
--

INSERT INTO `tbl_food_items` (`fid`, `name`) VALUES
(1, 'Candy'),
(2, 'Payasam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_menu`
--

CREATE TABLE `tbl_food_menu` (
  `mid` int(11) NOT NULL,
  `food_item` int(11) NOT NULL,
  `week_day` int(11) NOT NULL,
  `Food _time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredients`
--

CREATE TABLE `tbl_ingredients` (
  `iid` int(11) NOT NULL,
  `food_item` int(11) NOT NULL,
  `row_item` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_row_items`
--

CREATE TABLE `tbl_row_items` (
  `rid` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `locale_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_row_items`
--

INSERT INTO `tbl_row_items` (`rid`, `item`, `unit`, `locale_title`) VALUES
(1, 'Sugar', 'grams', 'പഞ്ചസാര'),
(2, 'Rice', 'Gra', 'അരി'),
(3, 'Sarkara', 'Grams', 'ശർക്കര');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `aganvadi_number` varchar(50) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `password`, `email`, `contact`, `aganvadi_number`, `teacher_name`, `user_type`) VALUES
(1, 'e6e061838856bf47e1de730719fb2609', 'admin@gmail.com', 1236547890, 'admin', 'Admin', 1),
(3, 'e6e061838856bf47e1de730719fb2609', 'teacher@gmail.com', 1236547893, 'agn1009', 'Teacher', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_days`
--
ALTER TABLE `tbl_days`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_food_items`
--
ALTER TABLE `tbl_food_items`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tbl_food_menu`
--
ALTER TABLE `tbl_food_menu`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `food_item` (`food_item`);

--
-- Indexes for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `food_item` (`food_item`),
  ADD KEY `row_item` (`row_item`);

--
-- Indexes for table `tbl_row_items`
--
ALTER TABLE `tbl_row_items`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique email` (`email`),
  ADD UNIQUE KEY `unique_contact` (`contact`),
  ADD UNIQUE KEY `unique_an` (`aganvadi_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_days`
--
ALTER TABLE `tbl_days`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_food_items`
--
ALTER TABLE `tbl_food_items`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_food_menu`
--
ALTER TABLE `tbl_food_menu`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_row_items`
--
ALTER TABLE `tbl_row_items`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_food_menu`
--
ALTER TABLE `tbl_food_menu`
  ADD CONSTRAINT `tbl_food_menu_ibfk_1` FOREIGN KEY (`food_item`) REFERENCES `tbl_food_items` (`fid`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD CONSTRAINT `tbl_ingredients_ibfk_1` FOREIGN KEY (`food_item`) REFERENCES `tbl_food_items` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ingredients_ibfk_2` FOREIGN KEY (`row_item`) REFERENCES `tbl_row_items` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
