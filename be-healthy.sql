-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 09:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be-healthy`
--

-- --------------------------------------------------------

--
-- Table structure for table `1nsurance`
--

CREATE TABLE `1nsurance` (
  `id` int(11) NOT NULL,
  `InsuranceName` varchar(50) NOT NULL,
  `InsuranceType` varchar(50) NOT NULL,
  `Amount` int(50) NOT NULL,
  `Doctor` enum('booked','not booked yet') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `1nsurance`
--

INSERT INTO `1nsurance` (`id`, `InsuranceName`, `InsuranceType`, `Amount`, `Doctor`) VALUES
(7, 'treatMed', 'premium', 2000, 'booked'),
(10, 'team', 'sedwick', 2000, 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'admin1', 'admin1@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `calltb`
--

CREATE TABLE `calltb` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phonenumber` int(100) NOT NULL,
  `Suggestions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healthytb`
--

CREATE TABLE `healthytb` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` char(50) NOT NULL,
  `Hname` varchar(50) NOT NULL,
  `Illness` longtext NOT NULL,
  `Price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthytb`
--

INSERT INTO `healthytb` (`id`, `Name`, `Email`, `Password`, `Hname`, `Illness`, `Price`) VALUES
(19, 'Julia Gerald', 'Gerald@gmail.com', 'green', 'Medical', 'Malaria', 25000),
(21, 'Michael Kane', 'Kane@gmail.com', 'gill', '', '', 0),
(22, 'Mikayla Johns', 'Johns@gmail.com', '1234', '', '', 0),
(23, 'bluey', 'bluey@gmail.com', 'bluey', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Illness` longtext NOT NULL,
  `Price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `Name`, `Illness`, `Price`) VALUES
(9, 'McKaza Medic', 'Influenza\r\nSexually Transmitted Infections (STIs)\r\nHIV/AIDS\r\nHepatitis\r\nMalaria', 25000),
(10, 'Medical ', 'Chronic Kidney Disease\r\nAcute Kidney Injury\r\nKidney Stones\r\nUrinary Tract Infections', 30000),
(11, 'Healthy', 'Stroke,\r\nEpilepsy,\r\nMultiple Sclerosis,\r\nMigraines,\r\n', 15000),
(13, 'BronCally', 'COVID-19\r\nInfluenza\r\nCommon cold\r\nTuberculosis\r\nSexually transmitted infections', 20000),
(14, 'SaviourLively', 'Pregnancy-related conditions\r\nPediatric illnesses and infections\r\nNeonatal care', 30000),
(15, 'GripLifeDaily', 'Diabetes Mellitus\r\nThyroid Disorders\r\nAdrenal Disorders\r\nPituitary Disorders', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_content` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1nsurance`
--
ALTER TABLE `1nsurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calltb`
--
ALTER TABLE `calltb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthytb`
--
ALTER TABLE `healthytb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1nsurance`
--
ALTER TABLE `1nsurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calltb`
--
ALTER TABLE `calltb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healthytb`
--
ALTER TABLE `healthytb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
