-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2024 at 10:45 AM
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
-- Database: `jadempinkyweb`
--
CREATE DATABASE IF NOT EXISTS `jadempinkyweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jadempinkyweb`;

-- --------------------------------------------------------

--
-- Table structure for table `globalvars`
--

CREATE TABLE `globalvars` (
  `id` int NOT NULL,
  `Num_Players` int NOT NULL,
  `Num_Guilds` int NOT NULL,
  `Num_Quests` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `globalvars`
--

INSERT INTO `globalvars` (`id`, `Num_Players`, `Num_Guilds`, `Num_Quests`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guild_list`
--

CREATE TABLE `guild_list` (
  `id` int NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `member_count` int NOT NULL,
  `Money` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_quests`
--

CREATE TABLE `public_quests` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `reward` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `difficulty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `friends_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `Titles` text COLLATE utf8mb4_general_ci NOT NULL,
  `Inventory` text COLLATE utf8mb4_general_ci NOT NULL,
  `Creation_date` date NOT NULL,
  `Last_Seen` datetime NOT NULL,
  `Money_user` int NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Basic.png',
  `Admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `friends_id`, `Titles`, `Inventory`, `Creation_date`, `Last_Seen`, `Money_user`, `avatar`, `Admin`) VALUES
(3, 'admin', '$2y$10$1.XWfaU4rqv5vUwPqPnHZuH/EN9P8hXNS.v12wvnTX383yt4LWPxK', '', 'New Begginings', '', '2024-06-07', '2024-06-07 15:13:49', 0, '666314f03b071.jpg', 0),
(4, 'Jadempinky', '$2y$10$y8D.IZTqhUxBfXFVoaTXv.FxovsH03K/yi2wZwexa9O0xim9B5O.q', '', 'New Begginings', '', '2024-06-07', '2024-06-07 16:12:47', 0, '66631589af3cd.jpg', 0),
(5, 'Test123', '$2y$10$mL8G5R7j5aPrlkvPHwCj1eKyxQPzA2dGuc6trso2oMhlLTBBcI73q', '', 'New Begginings', '', '2024-06-07', '2024-06-07 16:35:22', 0, 'Basic.png', 0),
(6, 'Marinou', '$2y$10$lx3UP8xVOUXZhskve/e5uOFt6PKxIPeVGHSSIQppEaAizLcQ40/dG', '', 'New Begginings', '', '2024-06-07', '2024-06-07 16:36:38', 0, '66631b4902af1.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `globalvars`
--
ALTER TABLE `globalvars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guild_list`
--
ALTER TABLE `guild_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_quests`
--
ALTER TABLE `public_quests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `globalvars`
--
ALTER TABLE `globalvars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guild_list`
--
ALTER TABLE `guild_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_quests`
--
ALTER TABLE `public_quests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `jobboring`
--
CREATE DATABASE IF NOT EXISTS `jobboring` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jobboring`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ecole` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nom`, `ecole`, `age`) VALUES
(1, 'Jade', 'La Plateforme', 20),
(2, 'Jadem', 'laplateforme', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `jour09`
--
CREATE DATABASE IF NOT EXISTS `jour09` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jour09`;

-- --------------------------------------------------------

--
-- Table structure for table `etage`
--

CREATE TABLE `etage` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `numéro` int NOT NULL,
  `superficie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etage`
--

INSERT INTO `etage` (`id`, `nom`, `numéro`, `superficie`) VALUES
(1, 'RDC', 0, 500),
(2, 'R+1', 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int NOT NULL,
  `prénom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `naissance` date NOT NULL,
  `genre` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `prénom`, `nom`, `naissance`, `genre`, `email`) VALUES
(1, 'Cyril', 'Zimmermann', '1989-01-02', 'Homme', 'cyril@laplateforme.io'),
(2, 'Jessica ', 'Soriano', '1995-09-08', 'Femme', 'jessica@laplateforme.io'),
(3, 'Roxan', 'Roumégas', '2016-09-08', 'Homme', 'roxan@laplateforme.io'),
(4, 'Pascal', 'Assens', '1999-12-31', 'Homme', 'pascal@laplateforme.io'),
(5, 'Terry', 'Cristinelli', '2005-02-01', 'Homme', 'terry@laplateforme.io'),
(6, 'Ruben', 'Habib', '1993-05-26', 'Homme', 'ruben.habib@laplateforme.io'),
(7, 'Toto', 'Dupont', '2019-11-07', 'Homme', 'toto@laplateforme.io');

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_etage` int NOT NULL,
  `capacité` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `id_etage`, `capacité`) VALUES
(1, 'Biggest Room (Biggest Room - 100 places)', 1, 100),
(2, 'Studio Son', 1, 5),
(3, 'Broadcasting', 2, 50),
(4, 'Bocal Peda', 2, 4),
(5, 'Coworking', 2, 80),
(6, 'Studio Video', 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etage`
--
ALTER TABLE `etage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etage`
--
ALTER TABLE `etage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `livreor`
--
CREATE DATABASE IF NOT EXISTS `livreor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `livreor`;

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
--
-- Database: `moduleconnexion`
--
CREATE DATABASE IF NOT EXISTS `moduleconnexion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moduleconnexion`;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'Jadem', 'Jade', 'Mercante', 'Test123'),
(4, 'Jadem2', 'FJIFN', 'rgrgr', 'test'),
(5, 'momo', 'ev', 'mhd', 'azerty'),
(6, 'Jadempinky', '', '', 'TestPass'),
(7, 'quesquietjauneetquiattent', 'moi', 'toi', 'michtodu13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Database: `testphp`
--
CREATE DATABASE IF NOT EXISTS `testphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testphp`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `age` date NOT NULL,
  `tel` int NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pays` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `metier` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
