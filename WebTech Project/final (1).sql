-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 11:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(255) NOT NULL,
  `btitle` varchar(255) NOT NULL,
  `bdetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `btitle`, `bdetails`) VALUES
(1, 'First Blog', 'Hellow World!');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eid` int(50) NOT NULL,
  `etitle` varchar(100) NOT NULL,
  `edetails` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eid`, `etitle`, `edetails`) VALUES
(1, 'Football Match', 'On December 16 there will be a friendly football match between the association members and organizers');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `gid` int(25) NOT NULL,
  `guname` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `gdob` varchar(255) NOT NULL,
  `ggender` varchar(255) NOT NULL,
  `gemail` varchar(255) NOT NULL,
  `gmobile` varchar(255) NOT NULL,
  `gaddress` varchar(255) NOT NULL,
  `gphoto` varchar(255) NOT NULL,
  `gblood` varchar(255) NOT NULL,
  `gpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`gid`, `guname`, `gname`, `gdob`, `ggender`, `gemail`, `gmobile`, `gaddress`, `gphoto`, `gblood`, `gpassword`) VALUES
(1, 'Tuhin', 'Tawhid Tuhin', '', '', '', '', '', '', '', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mid` int(25) NOT NULL,
  `muname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `mblood` varchar(255) NOT NULL,
  `mgender` varchar(255) NOT NULL,
  `memail` varchar(255) NOT NULL,
  `mmobile` varchar(255) NOT NULL,
  `maddress` varchar(255) NOT NULL,
  `mphoto` varchar(255) DEFAULT NULL,
  `mpassword` varchar(255) NOT NULL,
  `mdob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mid`, `muname`, `mname`, `mblood`, `mgender`, `memail`, `mmobile`, `maddress`, `mphoto`, `mpassword`, `mdob`) VALUES
(1, 'Fuad', 'Nafees Fuad Rahman', 'O+', 'Male', 'rr231000@gmail.com', '01627737550', 'Dhaka', 'Nafees Fuad Rahman - 2022.08.21 - 01.21.59pm.jpeg', '12345678', '2000-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `oid` int(50) NOT NULL,
  `ouname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `omobile` varchar(255) DEFAULT NULL,
  `oaddress` varchar(255) DEFAULT NULL,
  `oemail` varchar(255) DEFAULT NULL,
  `odob` varchar(255) DEFAULT NULL,
  `ogender` varchar(255) DEFAULT NULL,
  `opass` varchar(255) NOT NULL,
  `ophoto` varchar(255) DEFAULT NULL,
  `oblood` varchar(255) DEFAULT NULL,
  `NIDNo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`oid`, `ouname`, `oname`, `omobile`, `oaddress`, `oemail`, `odob`, `ogender`, `opass`, `ophoto`, `oblood`, `NIDNo`) VALUES
(1, 'Arif', 'MD. AZIZUL HAKIM ARIF', '01236589654', 'Khulna', 'azaz@gmail.com', '2022-08-03', 'Male', '11223344', 'MD. AZIZUL HAKIM ARIF - 2022.08.20 - 06.21.37pm.jpeg', 'A+', '16162162');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `gender`, `blood`, `dob`, `email`, `address`, `photo`, `mobile`) VALUES
(1, 'Arif', '11223344', 'Azizul Hakim Arif', 'Male', 'A+', '2002-01-02', 'arif@gmail.com', 'chillmari', '[Azizul Hakim Arif] - 2022.08.20 - 05.43.26pm.jpeg', '01236598774');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `gid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `oid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
