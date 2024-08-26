-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 08:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livreor`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int NOT NULL,
  `commentaire` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_utilisateur` int NOT NULL,
  `date` datetime NOT NULL,
  `edited` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`, `edited`) VALUES
(49, 'Ceci est un commentaire, très constructif.', 6, '2024-06-05 10:34:35', 0),
(50, 'test 1234567', 7, '2024-06-05 11:45:59', 0),
(51, 'hfehf', 4, '2024-06-05 11:46:24', 0),
(53, 'ee', 13, '2024-06-05 14:28:44', 0),
(54, 'Yayyyy', 14, '2024-06-05 14:47:42', 0),
(56, 'Ceci est un méssage édité :D', 12, '2024-06-05 16:24:29', 1),
(62, 'Mouais, ça a l\'air mieux. J\'èspère que j\'aurais un retour & gain de côsebon, alors ?  Ça marche enfin ???? J', 15, '2024-06-06 11:10:32', 1),
(67, 'This is a chat that I made in like 2-3h\r\nConsidering that 2 months ago, I did NOT know anything about html, css, php, or sql, I\'m pretty proud lol', 16, '2024-06-06 11:56:50', 0),
(68, ';^;\r\nKill me', 16, '2024-06-06 11:57:01', 0),
(69, 'Wat', 16, '2024-06-06 11:57:07', 0),
(70, 'Ok, that\'s weird, I\'ll look into that', 16, '2024-06-06 11:57:16', 0),
(71, 'Ok, that\'s weird, I\'ll look into that', 16, '2024-06-06 11:57:57', 0),
(72, 'Ok, that\'s weird, I\'ll look into that', 16, '2024-06-06 11:58:52', 0),
(73, 'Test', 16, '2024-06-06 11:58:55', 0),
(74, 'Test', 16, '2024-06-06 11:58:58', 0),
(75, 'Test', 16, '2024-06-06 12:00:15', 0),
(84, 'lol', 17, '2024-06-07 11:33:34', 1),
(85, 'c\'est mon anniversaire aujourd\'hui\r\n', 19, '2024-06-07 18:33:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nbcomment` int NOT NULL DEFAULT '0',
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `nbcomment`, `admin`) VALUES
(20, 'admin', '$2a$15$UvTxu9B/xCFiR.xc2b2xtujBuuNHTi7okweGTaQ855OcNayM8lEcy', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
