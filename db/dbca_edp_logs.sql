-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2026 at 03:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbca_edp_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_edp_logs`
--

CREATE TABLE `tbl_edp_logs` (
  `id` int(11) NOT NULL,
  `ticketId` varchar(100) DEFAULT NULL,
  `date_troubleshoot` varchar(100) DEFAULT NULL,
  `services` varchar(100) DEFAULT NULL,
  `end_user` varchar(100) DEFAULT NULL,
  `problem` longtext DEFAULT NULL,
  `assessment` longtext DEFAULT NULL,
  `unit_status` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `remarks_specific` longtext DEFAULT NULL,
  `status_report` varchar(100) DEFAULT NULL,
  `stats_report_specify` longtext DEFAULT NULL,
  `technician` varchar(100) DEFAULT NULL,
  `tech_user_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_edp_logs_history`
--

CREATE TABLE `tbl_edp_logs_history` (
  `id` int(11) NOT NULL,
  `ticketId` varchar(100) DEFAULT NULL,
  `date_troubleshoot` varchar(100) DEFAULT NULL,
  `services` varchar(100) DEFAULT NULL,
  `end_user` varchar(100) DEFAULT NULL,
  `problem` longtext DEFAULT NULL,
  `assessment` longtext DEFAULT NULL,
  `unit_status` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `remarks_specific` longtext DEFAULT NULL,
  `status_report` varchar(100) DEFAULT NULL,
  `stats_report_specify` longtext DEFAULT NULL,
  `technician` varchar(100) DEFAULT NULL,
  `update_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_edp_logs`
--
ALTER TABLE `tbl_edp_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_edp_logs_history`
--
ALTER TABLE `tbl_edp_logs_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_edp_logs`
--
ALTER TABLE `tbl_edp_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_edp_logs_history`
--
ALTER TABLE `tbl_edp_logs_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
