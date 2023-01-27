-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 07:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docwebdox`
--
CREATE DATABASE IF NOT EXISTS `docwebdox` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `docwebdox`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doc_id`, `patient_id`, `date`, `time`) VALUES
(7, 7, 3, '2023-02-02', '14:00:00'),
(8, 9, 5, '2023-02-12', '19:00:00'),
(10, 4, 5, '2023-02-05', '08:59:00'),
(11, 14, 3, '2023-02-23', '03:03:00'),
(12, 16, 10, '2027-03-25', '13:09:00'),
(13, 9, 10, '2023-03-15', '14:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(60) NOT NULL,
  `SureName` varchar(60) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Specialization` varchar(60) NOT NULL,
  `bio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `FirstName`, `SureName`, `Address`, `PhoneNumber`, `email`, `Specialization`, `bio`) VALUES
(1, 1, 'Master', 'Doc', 'Thessaloniki', '694585825', 'test@gmail.com', 'cardiology', 'Hello, I\'m the best cardiology in town.'),
(2, 4, 'Herr', 'Doc', 'Athens', '6954248512', 'test2@gmail.com', 'Pathology', 'Hello, I\'m Dr Herr welcome to my profile!'),
(4, 7, 'Doctor', 'Test1', 'Thessaloniki', '6958585858', 'test3@gmail.com', 'cardiology', 'Hello there!'),
(5, 8, 'Doc', 'Test2', 'Athens', '6958545454', 'test4@gmail.com', 'pathology', 'Hello, I\'m the best '),
(6, 9, 'Doc', 'Jason', 'Athens', '6932323232', 'test5@gmail.com', 'cardiology', 'Jooo'),
(7, 5, 'Lemmon', 'Boy', 'Thessaloniki', '695555555', 'lemm@gmail.com', '', ''),
(8, 3, 'In', 'Pain', 'Athens', '6963636363', 'testinpain@gmail.com', '', ''),
(9, 2, 'Mr', 'Patient', 'Athens', '6935353535', 'patient@gmail.com', '', ''),
(10, 9, 'Jason', 'Malkotsis', 'Thessaloniki', '6955555555', 'jason@gmail.com', 'pathology', 'Hello, what\'s up?'),
(11, 10, 'Maria', 'Papadopoulu', 'Patra', '69888888888', 'maria@gmail.com', '', ''),
(12, 11, 'Mr', 'Doc', 'Patra', '6933333333', 'mrdoc@gmail.com', 'Pathology', 'Hello, I\'m MrDoc!'),
(13, 12, 'Kostas', 'Konstantinidis', 'Thessaloniki', '6955555555', 'kostas@gmail.com', 'Psychologist', 'I\'m looking for crazy people'),
(14, 13, 'Mpampis', 'Papagianis', 'Ioannina', '6988888888', 'papagianis@gmail.com', 'Cardiology', 'Hello, I\'m the best cardiologist'),
(15, 18, 'Dona', 'Heri', 'Thessaloniki', '69888888888', 'dona@gmail.com', '', ''),
(16, 17, 'Thanos', 'Athanasiadis', 'Athens', '6933333333', 'athanasiadis@gmail.com', '', ''),
(17, 14, 'Giwrgos', 'Papagewrgiou', 'Ioannina', '69555555555', 'giwrgos@gmail.com', 'Pathology', 'Hello, there!'),
(18, 15, 'Antonis', 'Zerbas', 'Thessaloniki', '6944444444', 'zerbas@gmail.com', 'psychologist', 'Hellooo'),
(19, 16, 'Lefteris', 'Eleutheriadis', 'Patras', '6977777777', 'lef@gmail.com', 'Vet', 'Give me all your cats');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'main id',
  `userName` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('patient','doctor','admin') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `type`) VALUES
(1, 'MasterDoc', 'password', 'doctor'),
(2, 'Patient', 'password', 'patient'),
(3, 'inPain', 'pain', 'patient'),
(4, 'Herr', 'Doktor', 'doctor'),
(5, 'LemmonBoy', 'covid19', 'patient'),
(6, 'admin', 'god', 'admin'),
(7, 'TestDoc1', 'pass', 'doctor'),
(8, 'TestDoc2', 'pass', 'doctor'),
(9, 'Jason', 'js', 'doctor'),
(10, 'Mariapap', 'papad', 'patient'),
(11, 'MrDoc1', 'pass', 'doctor'),
(12, 'Koskonsantinidis', 'pass', 'doctor'),
(13, 'papagianis', 'pass', 'doctor'),
(14, 'papagewrgiou', 'pass', 'doctor'),
(15, 'zerbas', 'password', 'doctor'),
(16, 'eleutheriadis', 'pass', 'doctor'),
(17, 'athanasiadis', 'pass', 'patient'),
(18, 'dona', 'pass', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient__fk` (`patient_id`),
  ADD KEY `appointments_doctor_fk` (`doc_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'main id', AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_fk` FOREIGN KEY (`doc_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient__fk` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
