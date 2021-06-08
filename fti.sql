-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2021 at 03:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fti`
--

-- --------------------------------------------------------

--
-- Table structure for table `lendet`
--

CREATE TABLE `lendet` (
  `lenda_id` int(11) NOT NULL,
  `viti` int(11) NOT NULL,
  `lenda_emri` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lendet`
--

INSERT INTO `lendet` (`lenda_id`, `viti`, `lenda_emri`) VALUES
(4, 1, 'Gjuhë e huaj 1'),
(5, 1, 'Analizë Matematike 1'),
(6, 1, 'Fizikë 1'),
(7, 1, 'Elementet e Informatikës'),
(32, 1, 'Algjebër dhe Gjeometri'),
(33, 1, 'Komunikime Inxhinierike'),
(34, 1, 'Analizë Matematike 2'),
(35, 1, 'Fizikë 2'),
(39, 1, 'Elektroteknikë '),
(40, 1, 'Analizë Matematike 3'),
(41, 1, 'TGJH'),
(44, 1, 'Probabiliteti');

-- --------------------------------------------------------

--
-- Table structure for table `mesazhet`
--

CREATE TABLE `mesazhet` (
  `msg_id` int(11) NOT NULL,
  `msg_title` varchar(64) NOT NULL,
  `msg_description` varchar(512) NOT NULL,
  `msg_priority` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesazhet`
--

INSERT INTO `mesazhet` (`msg_id`, `msg_title`, `msg_description`, `msg_priority`, `student_id`) VALUES
(3, 'Test Numer 2', 'Ckemi! Si jeni. Nota Juaj ne lenden Teori Sinjali eshte 8.', 2, 8),
(4, 'Test Numer 3', 'Hello there', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `nota_id` int(11) NOT NULL,
  `vlera` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `lenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`nota_id`, `vlera`, `user`, `lenda`) VALUES
(9, 8, 6, 5),
(11, 10, 8, 4),
(12, 8, 8, 39),
(13, 4, 8, 6),
(14, 7, 8, 32),
(15, 9, 8, 44),
(16, 10, 8, 35),
(17, 5, 8, 41),
(18, 4, 8, 33),
(21, 10, 8, 34),
(22, 4, 8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pagesat`
--

CREATE TABLE `pagesat` (
  `pagesaId` int(11) NOT NULL,
  `cmimi` int(11) NOT NULL,
  `viti` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `fushaEStudimit` varchar(30) NOT NULL,
  `std_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagesat`
--

INSERT INTO `pagesat` (`pagesaId`, `cmimi`, `viti`, `status`, `fushaEStudimit`, `std_id`) VALUES
(2, 30000, 3, 1, 'Inxhinieri Informatike', 8),
(3, 15000, 1, 0, 'Inxhinieri Informatike', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `std_id` int(11) NOT NULL,
  `std_emri` varchar(64) NOT NULL,
  `std_email` varchar(64) NOT NULL,
  `std_viti` varchar(64) NOT NULL,
  `std_grupi` varchar(32) NOT NULL,
  `std_kodi` varchar(128) NOT NULL,
  `std_tipi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`std_id`, `std_emri`, `std_email`, `std_viti`, `std_grupi`, `std_kodi`, `std_tipi`) VALUES
(6, 'klejvi', 'k@fti.edu.al', '3', 'A', '1212', 'student'),
(8, 'Jona Kapaj', 'jona.kapaj@fti.edu.al', '1', 'C', '$2y$10$Yi1pDQzYtdvTnjNqQpNCZeYLhVn2vXbwhHVwvDpIIcpJLS.Q/.vEq', 'student'),
(9, 'klejvi', 'klejvisiper@fti.edu.al', '1', 'D', '$2y$10$pEAiyroHValjdOHJP/NDe.7m1vrqHGZqf5b8Cr2XFiK.oJtfR/2pu', 'student'),
(15, 'anasta anas', 'anas.ak@fti.edu.al', '-1', 'S', '$2y$10$BXOfYJKoUC5VM9pFVl0wu..GmPU7t.g9qs4LPfkg.eaV1DABRmEjS', 'sekretar'),
(17, 'kkadsklf da', 'kaldflk@fti.edu.al', '-1', 'S', '$2y$10$dF.12GDLExNVdKb06hjPMOwtMtLPQBh38GoLl2qXDiWYfLl94EHSS', 'sekretar'),
(18, 'Sekretar Test', 'jk@fti.edu.al', '-1', 'S', '$2y$10$nTIKaqtVevlnTyjdgqqCReAnPe9ip70bWHuqcikxy8wQ.bpYHne6.', 'sekretar');

-- --------------------------------------------------------

--
-- Table structure for table `usr_data`
--

CREATE TABLE `usr_data` (
  `usr_data_id` int(11) NOT NULL,
  `usr_atesia` varchar(30) NOT NULL,
  `usr_nr_matrikullimi` int(10) NOT NULL,
  `usr_cikli` varchar(30) NOT NULL,
  `usr_dega` varchar(30) NOT NULL,
  `usr_gjinia` varchar(30) NOT NULL,
  `usr_datelindja` varchar(30) NOT NULL,
  `usr_vendlindja` varchar(30) NOT NULL,
  `std_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usr_data`
--

INSERT INTO `usr_data` (`usr_data_id`, `usr_atesia`, `usr_nr_matrikullimi`, `usr_cikli`, `usr_dega`, `usr_gjinia`, `usr_datelindja`, `usr_vendlindja`, `std_id`) VALUES
(1, 'Lavdimir Kapaj', 415097, 'Bachelor', 'Inxhinieri Informatike', 'Femer', '15/04/2000', 'Ballsh', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lendet`
--
ALTER TABLE `lendet`
  ADD PRIMARY KEY (`lenda_id`);

--
-- Indexes for table `mesazhet`
--
ALTER TABLE `mesazhet`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `user` (`user`),
  ADD KEY `lenda` (`lenda`);

--
-- Indexes for table `pagesat`
--
ALTER TABLE `pagesat`
  ADD PRIMARY KEY (`pagesaId`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `usr_data`
--
ALTER TABLE `usr_data`
  ADD PRIMARY KEY (`usr_data_id`),
  ADD KEY `std_id` (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lendet`
--
ALTER TABLE `lendet`
  MODIFY `lenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mesazhet`
--
ALTER TABLE `mesazhet`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pagesat`
--
ALTER TABLE `pagesat`
  MODIFY `pagesaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usr_data`
--
ALTER TABLE `usr_data`
  MODIFY `usr_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mesazhet`
--
ALTER TABLE `mesazhet`
  ADD CONSTRAINT `mesazhet_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`std_id`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`lenda`) REFERENCES `lendet` (`lenda_id`);

--
-- Constraints for table `pagesat`
--
ALTER TABLE `pagesat`
  ADD CONSTRAINT `pagesat_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `user` (`std_id`);

--
-- Constraints for table `usr_data`
--
ALTER TABLE `usr_data`
  ADD CONSTRAINT `usr_data_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `user` (`std_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
