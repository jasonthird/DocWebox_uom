-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 27 Ιαν 2023 στις 19:17:12
-- Έκδοση διακομιστή: 10.4.18-MariaDB
-- Έκδοση PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `docwebdox`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `profile`
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
-- Άδειασμα δεδομένων του πίνακα `profile`
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

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
