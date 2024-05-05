-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 06:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_roshita`
--
CREATE DATABASE IF NOT EXISTS `patient_roshita` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `patient_roshita`;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `specialization`, `description`) VALUES
(55, 'admin', ''),
(57, 'family medicine', 'this is the description for doctor '),
(59, 'Ophtalmologiste', ''),
(60, 'Ophtalmologiste', ''),
(61, 'Ophtalmologiste', 'this is the description for doctor 6'),
(65, 'tt', ''),
(66, 'qq', 'empty'),
(68, 'as', 'empty');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `user_id` int(11) NOT NULL,
  `dr_access` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`user_id`, `dr_access`) VALUES
(1, NULL),
(1, 61),
(1, 57);

-- --------------------------------------------------------

--
-- Table structure for table `roshita`
--

CREATE TABLE `roshita` (
  `patient_id` int(11) NOT NULL,
  `roshita_date` datetime NOT NULL DEFAULT current_timestamp(),
  `roshita` text NOT NULL,
  `heart rate` int(4) NOT NULL,
  `systolic_blood_pressure` int(4) NOT NULL,
  `diastolic_blood_pressure` int(4) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roshita`
--

INSERT INTO `roshita` (`patient_id`, `roshita_date`, `roshita`, `heart rate`, `systolic_blood_pressure`, `diastolic_blood_pressure`, `doctor_id`) VALUES
(1, '2023-12-24 06:16:19', 'diagnoses of illnesses', 74, 116, 64, 59),
(1, '2023-12-24 06:38:21', 'diagnoses of illnesses', 79, 126, 72, 61),
(64, '2023-12-24 06:57:57', 'diagnoses of illnesses', 70, 120, 70, 57),
(56, '2023-12-25 00:40:12', 'mmm', 70, 120, 90, 57),
(1, '2023-12-25 01:51:01', 'test', 70, 120, 90, 59),
(1, '2023-12-25 01:52:29', 'qq', 12, 12, 12, 57),
(1, '2023-12-25 01:53:40', 'test2', 70, 120, 70, 57),
(64, '2023-12-25 02:03:39', 'The doctor did not write the prescription', 70, 120, 80, 57),
(1, '2023-12-25 04:10:57', 'test', 70, 120, 80, 57),
(1, '2023-12-27 09:17:16', 'ta3ban', 70, 120, 80, 68);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_image`, `username`, `password`, `name`, `is_doctor`) VALUES
(1, 'IMG_1941.jpg', 'yousef', '123', 'YouSeF Hesham', 0),
(55, '', 'admin1', '123', 'admin1', 1),
(56, 'the_starry_yaZxELWAUX.jpg', 'yousef1', '123', 'yousef hesham abd', 0),
(57, 'doctor07.jpg', 'doctor', '123', 'doctor', 1),
(59, 'doctor02.jpg', 'doctor2', '123', 'doctor2', 1),
(60, 'doctor05.jpg', 'doctor3', '123', 'doctor3', 1),
(61, 'doctor06.jpg', 'doctor6', '123', 'doctor6', 1),
(64, 'IMG_20200827_155616_611.jpg', 'yousef2', '123', 'yousef2', 0),
(65, '', 'tt', '123', 'tt', 1),
(66, '', 'qq', '123', 'qq', 1),
(67, '', 'YouSeF Hesham', '123', 'yousef', 0),
(68, '', 'aya ayman', '123', 'aya ayman', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`dr_access`);

--
-- Indexes for table `roshita`
--
ALTER TABLE `roshita`
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id_` (`doctor_id`),
  ADD KEY `patient_id_` (`patient_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`dr_access`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `roshita`
--
ALTER TABLE `roshita`
  ADD CONSTRAINT `roshita_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roshita_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
