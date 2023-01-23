-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 23 Ιαν 2023 στις 23:23:55
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
-- Δομή πίνακα για τον πίνακα `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `appointments`
--

INSERT INTO `appointments` (`id`, `doc_id`, `patient_id`, `date`, `time`) VALUES
(1, 1, 3, '2023-02-15', '16:00:00'),
(2, 4, 5, '2023-02-23', '10:00:00'),
(3, 7, 2, '2023-02-16', '11:30:00'),
(4, 8, 5, '2023-03-02', '09:00:00');

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
(6, 9, 'Doc', 'Jason', 'Athens', '6932323232', 'test5@gmail.com', 'cardiology', 'Helloo'),
(7, 5, 'Lemmon', 'Boy', 'Thessaloniki', '6954545454', 'test@gmail.com', '', ''),
(8, 3, 'In', 'Pain', 'Athens', '6963636363', 'testinpain@gmail.com', '', ''),
(9, 2, 'Mr', 'Patient', 'Athens', '6935353535', 'patient@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'main id',
  `userName` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('patient','doctor','admin') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
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
(9, 'Jason', 'js', 'doctor');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient__fk` (`patient_id`),
  ADD KEY `appointments_doctor_fk` (`doc_id`);

--
-- Ευρετήρια για πίνακα `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'main id', AUTO_INCREMENT=10;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_fk` FOREIGN KEY (`doc_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_patient__fk` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Περιορισμοί για πίνακα `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
