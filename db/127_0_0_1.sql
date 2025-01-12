-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 02:16 PM
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
-- Database: `scholarship`
--
CREATE DATABASE IF NOT EXISTS `scholarship` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `scholarship`;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `Document_id` int(11) NOT NULL,
  `Stud_Id` int(11) NOT NULL,
  `Doc_id` int(11) NOT NULL,
  `Sem_id` int(11) NOT NULL,
  `File_name` varchar(555) NOT NULL,
  `Confirm_status` bit(1) NOT NULL DEFAULT b'0',
  `eDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documenttype`
--

CREATE TABLE `documenttype` (
  `doc_id` int(11) NOT NULL,
  `Doc_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `Par_id` int(12) NOT NULL,
  `Stud_id` int(12) NOT NULL,
  `Par_f_fname` varchar(255) NOT NULL,
  `Par_f_mname` varchar(255) NOT NULL,
  `Par_f_lname` varchar(255) NOT NULL,
  `Par_f_age` int(12) NOT NULL,
  `Par_f_occ` varchar(255) NOT NULL,
  `Par_f_contact` varchar(11) NOT NULL,
  `Par_f_income` int(11) NOT NULL,
  `Par_m_fname` varchar(255) NOT NULL,
  `Par_m_mname` varchar(255) NOT NULL,
  `Par_m_lname` varchar(255) NOT NULL,
  `Par_m_age` int(12) NOT NULL,
  `Par_m_occ` varchar(255) NOT NULL,
  `Par_m_contact` varchar(11) NOT NULL,
  `Par_m_income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stud_id` int(11) NOT NULL,
  `userId` int(12) NOT NULL,
  `courseId` int(12) NOT NULL,
  `Stud_code` varchar(20) NOT NULL,
  `Stud_fname` varchar(255) NOT NULL,
  `Stud_mname` varchar(255) NOT NULL,
  `Stud_lname` varchar(255) NOT NULL,
  `Stud_gender` varchar(50) NOT NULL,
  `Stud_dob` date NOT NULL,
  `Stud_add` varchar(555) NOT NULL,
  `Stud_contact` varchar(11) NOT NULL,
  `Stud_email` varchar(255) NOT NULL,
  `Stud_highschool` varchar(555) NOT NULL,
  `Stud_prefer_school` varchar(555) NOT NULL,
  `Stud_grade` decimal(2,2) NOT NULL,
  `Stud_year_status` bit(1) NOT NULL DEFAULT b'0',
  `Stud_status` varchar(50) NOT NULL,
  `Finace_status` bit(1) NOT NULL DEFAULT b'0',
  `Date_qualified` datetime NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `eDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` bit(1) NOT NULL DEFAULT b'0',
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `eDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `isAdmin`, `isActive`, `eDate`) VALUES
(1, 'admin', 'admin', b'1', b'1', '2025-01-12 17:05:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`Document_id`);

--
-- Indexes for table `documenttype`
--
ALTER TABLE `documenttype`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`Par_id`),
  ADD UNIQUE KEY `Stud_id` (`Stud_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Stud_id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `Document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documenttype`
--
ALTER TABLE `documenttype`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `Par_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Stud_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
