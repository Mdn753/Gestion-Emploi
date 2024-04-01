-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 08:17 PM
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
-- Database: `get`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Nom`, `Prenom`, `Email`, `MDP`) VALUES
(1, 'Samir', 'Suul', 'admin@email.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `emploi_enseignant`
--

CREATE TABLE `emploi_enseignant` (
  `Id_Enseignant` int(11) NOT NULL,
  `jour_semaine` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi') NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `Id_salle` int(11) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emploi_enseignant`
--

INSERT INTO `emploi_enseignant` (`Id_Enseignant`, `jour_semaine`, `heure_debut`, `heure_fin`, `Id_salle`, `filiere`, `matiere`) VALUES
(1, 'Lundi', '08:00:00', '10:00:00', 101, 'IDSIT', 'Probabilites'),
(2, 'Lundi', '08:00:00', '10:00:00', 102, 'GL', 'POO');

-- --------------------------------------------------------

--
-- Table structure for table `emploi_filiere`
--

CREATE TABLE `emploi_filiere` (
  `filiere` varchar(255) NOT NULL,
  `jour_semaine` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi') NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `Id_salle` int(11) NOT NULL,
  `Id_Enseignant` int(11) NOT NULL,
  `matiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emploi_filiere`
--

INSERT INTO `emploi_filiere` (`filiere`, `jour_semaine`, `heure_debut`, `heure_fin`, `Id_salle`, `Id_Enseignant`, `matiere`) VALUES
('GL', 'Lundi', '08:00:00', '10:00:00', 102, 2, 'POO'),
('IDSIT', 'Lundi', '08:00:00', '10:00:00', 101, 1, 'Probabilites');

--
-- Triggers `emploi_filiere`
--
DELIMITER $$
CREATE TRIGGER `insert_session_trigger` AFTER INSERT ON `emploi_filiere` FOR EACH ROW BEGIN
    INSERT INTO occupation_salle (id_salle, jour_semaine, heure_debut, heure_fin)
    VALUES (NEW.id_salle, NEW.jour_semaine, NEW.heure_debut, NEW.heure_fin);
    
    INSERT INTO emploi_enseignant (Id_Enseignant, jour_semaine, heure_debut, heure_fin, Id_salle, filiere, matiere)
    VALUES (NEW.Id_enseignant, NEW.jour_semaine, NEW.heure_debut, NEW.heure_fin, NEW.Id_salle, NEW.filiere, NEW.matiere);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `Id_Enseignant` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`Id_Enseignant`, `Nom`, `Prenom`, `matiere`, `Email`, `MDP`) VALUES
(1, 'Mouad', 'Lbrim', 'POO', 'MouadLbrim@email.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `Id_Etudiant` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`Id_Etudiant`, `Nom`, `Prenom`, `filiere`, `Email`, `MDP`) VALUES
(1, 'Yassine', 'Moudni', 'IDSIT', 'YassineMoudni@email.com', '123456789'),
(2, 'Mokthar', 'Benkirane', 'IDSIT', 'MokhtarBenkirane@email.com', '123456789'),
(3, 'Aymane', 'Moudni', 'GL', 'AymaneMoudni@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `occupation_salle`
--

CREATE TABLE `occupation_salle` (
  `Id_salle` int(11) NOT NULL,
  `jour_semaine` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi') NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `occupation_salle`
--

INSERT INTO `occupation_salle` (`Id_salle`, `jour_semaine`, `heure_debut`, `heure_fin`) VALUES
(101, 'Lundi', '08:00:00', '10:00:00'),
(102, 'Lundi', '08:00:00', '10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `emploi_enseignant`
--
ALTER TABLE `emploi_enseignant`
  ADD PRIMARY KEY (`Id_Enseignant`,`jour_semaine`,`heure_debut`,`heure_fin`);

--
-- Indexes for table `emploi_filiere`
--
ALTER TABLE `emploi_filiere`
  ADD PRIMARY KEY (`filiere`,`jour_semaine`,`heure_debut`,`heure_fin`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`Id_Enseignant`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Id_Etudiant`);

--
-- Indexes for table `occupation_salle`
--
ALTER TABLE `occupation_salle`
  ADD PRIMARY KEY (`Id_salle`,`jour_semaine`,`heure_debut`,`heure_fin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
