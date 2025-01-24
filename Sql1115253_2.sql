-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 31.11.39.170
-- Generation Time: Jan 24, 2025 at 02:00 PM
-- Server version: 8.0.36-28
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Sql1115253_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('123456789', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `bungalow_double`
--

CREATE TABLE `bungalow_double` (
  `id` int NOT NULL,
  `id_acheteur` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bungalow` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'BUNGALOW DOUBLE',
  `rom_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bungalow_double`
--

INSERT INTO `bungalow_double` (`id`, `id_acheteur`, `nom`, `prenom`, `bungalow`, `rom_id`) VALUES
(1, 57, 'RAKOTOARIMAHA', 'Isaia Precieux', 'BUNGALOW DOUBLE', 1),
(2, 70, 'RAKOTOARIMAHA', 'Isaia Precieux', 'BUNGALOW DOUBLE', 11);

-- --------------------------------------------------------

--
-- Table structure for table `bungalow_familiale`
--

CREATE TABLE `bungalow_familiale` (
  `id` int NOT NULL,
  `id_acheteur` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bungalow` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BUNGALOW FAMILIALE',
  `rom_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enattente`
--

CREATE TABLE `enattente` (
  `id` int NOT NULL,
  `date_d'enregistrement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traitement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bungalow` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_single` int DEFAULT NULL,
  `nombre_de_personnes` int NOT NULL,
  `nombre_de_personne_inscrit_au_activité` int DEFAULT NULL,
  `nombre_d'adulte` int NOT NULL,
  `nombre_d'enfant` int DEFAULT NULL,
  `nombre_de_séjour` int NOT NULL,
  `date_d'arrivé` date DEFAULT NULL,
  `date_de_départ` date DEFAULT NULL,
  `activité` json NOT NULL,
  `prixAE` decimal(12,2) NOT NULL,
  `prix_adulte` decimal(12,2) NOT NULL,
  `prix_enfant` decimal(12,2) DEFAULT NULL,
  `prix_du_traitement` decimal(12,2) NOT NULL,
  `prix_des_activités` decimal(12,2) DEFAULT NULL,
  `prix_single` decimal(12,2) DEFAULT NULL,
  `total_sf` decimal(12,2) NOT NULL,
  `frai_paypal` decimal(12,2) NOT NULL,
  `prix_totale` decimal(12,2) NOT NULL,
  `prix_totale1` decimal(12,2) NOT NULL,
  `status` int DEFAULT '0',
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enattente`
--

INSERT INTO `enattente` (`id`, `date_d'enregistrement`, `nom`, `prenom`, `mail`, `adresse`, `adresse1`, `zip`, `ville`, `pay`, `traitement`, `bungalow`, `sup_single`, `nombre_de_personnes`, `nombre_de_personne_inscrit_au_activité`, `nombre_d'adulte`, `nombre_d'enfant`, `nombre_de_séjour`, `date_d'arrivé`, `date_de_départ`, `activité`, `prixAE`, `prix_adulte`, `prix_enfant`, `prix_du_traitement`, `prix_des_activités`, `prix_single`, `total_sf`, `frai_paypal`, `prix_totale`, `prix_totale1`, `status`, `token`) VALUES
(86, '2025-01-24 12:31:04', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 5, '2025-01-24', '2025-01-29', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '247.50', '11.24', '258.74', '825.00', 0, 'c5cb586dff537b55c09c2183379b1a0cf0e22ce0f8294352cd37232e658a7fc7');

--
-- Triggers `enattente`
--
DELIMITER $$
CREATE TRIGGER `activitéAttente` BEFORE INSERT ON `enattente` FOR EACH ROW IF NEW.activité = "" THEN
SET NEW.activité = '["Pas d'activité"]';
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteAttente` BEFORE DELETE ON `enattente` FOR EACH ROW BEGIN
INSERT INTO `reservation`(`id`, `date_d'enregistrement`, `nom`, `prenom`, `mail`, `adresse`, `adresse1`, `zip`, `ville`, `pay`, `traitement`, `bungalow`, `sup_single`, `nombre_de_personnes`, `nombre_de_personne_inscrit_au_activité`, `nombre_d'adulte`, `nombre_d'enfant`, `nombre_de_séjour`, `date_d'arrivé`, `date_de_départ`, `activité`, `prixAE`, `prix_adulte`, `prix_enfant`, `prix_du_traitement`, `prix_des_activités`, `prix_single`, `total_sf`, `frai_paypal`, `prix_totale`, `prix_totale1`) VALUES (OLD.id, OLD.`date_d'enregistrement`, OLD.nom, OLD.prenom, OLD.mail, OLD.adresse, OLD.adresse1, OLD.zip, OLD.ville, OLD.pay, OLD.traitement, OLD.bungalow, OLD.sup_single,OLD.nombre_de_personnes, OLD.nombre_de_personne_inscrit_au_activité, OLD.`nombre_d'adulte`, OLD.`nombre_d'enfant`, OLD.nombre_de_séjour, OLD.`date_d'arrivé`, OLD.date_de_départ, OLD.activité,OLD.prixAE, OLD.prix_adulte, OLD.prix_enfant, OLD.prix_du_traitement, OLD.prix_des_activités, OLD.prix_single,OLD.total_sf, OLD.frai_paypal, OLD.prix_totale, OLD.prix_totale1);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `date_d'enregistrement` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traitement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bungalow` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_single` int DEFAULT NULL,
  `nombre_de_personnes` int DEFAULT NULL,
  `nombre_de_personne_inscrit_au_activité` int DEFAULT NULL,
  `nombre_d'adulte` int DEFAULT NULL,
  `nombre_d'enfant` int DEFAULT NULL,
  `nombre_de_séjour` int DEFAULT NULL,
  `date_d'arrivé` date DEFAULT NULL,
  `date_de_départ` date DEFAULT NULL,
  `activité` json NOT NULL,
  `prixAE` decimal(12,2) DEFAULT NULL,
  `prix_adulte` decimal(12,2) DEFAULT NULL,
  `prix_enfant` decimal(12,2) DEFAULT NULL,
  `prix_du_traitement` decimal(12,2) DEFAULT NULL,
  `prix_des_activités` decimal(12,2) DEFAULT NULL,
  `prix_single` decimal(12,2) DEFAULT NULL,
  `total_sf` decimal(12,2) DEFAULT NULL,
  `frai_paypal` decimal(12,2) DEFAULT NULL,
  `prix_totale` decimal(12,2) DEFAULT NULL,
  `prix_totale1` decimal(12,2) DEFAULT NULL,
  `rom_number` int DEFAULT NULL,
  `status` int DEFAULT '1',
  `payer` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date_d'enregistrement`, `nom`, `prenom`, `mail`, `adresse`, `adresse1`, `zip`, `ville`, `pay`, `traitement`, `bungalow`, `sup_single`, `nombre_de_personnes`, `nombre_de_personne_inscrit_au_activité`, `nombre_d'adulte`, `nombre_d'enfant`, `nombre_de_séjour`, `date_d'arrivé`, `date_de_départ`, `activité`, `prixAE`, `prix_adulte`, `prix_enfant`, `prix_du_traitement`, `prix_des_activités`, `prix_single`, `total_sf`, `frai_paypal`, `prix_totale`, `prix_totale1`, `rom_number`, `status`, `payer`) VALUES
(58, '2025-01-13 13:35:39', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 2, '2025-01-13', '2025-01-15', '[\"Pas d\'activité\"]', '264.00', '264.00', '0.00', '66.00', '0.00', '0.00', '158.40', '7.32', '165.72', '528.00', NULL, 1, 1),
(59, '2025-01-15 13:30:45', 'RAKOTOARIMAHA', 'Isaia Precieux', 'email@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 2, '2025-01-15', '2025-01-17', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '118.80', '5.58', '124.38', '396.00', NULL, 1, 1),
(60, '2025-01-15 13:32:17', 'RAKOTOARIMAHA', 'Isaia Precieux', 'email@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 9, '2025-01-28', '2025-02-06', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '534.60', '23.87', '558.47', '1782.00', NULL, 1, 1),
(62, '2025-01-20 06:37:58', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-20', '2025-01-23', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '148.50', '6.88', '155.38', '495.00', NULL, 1, 1),
(63, '2025-01-21 13:02:00', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 2, '2025-01-21', '2025-01-23', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '99.00', '4.71', '103.71', '330.00', NULL, 1, 1),
(64, '2025-01-23 07:07:59', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 6, 0, 4, 2, 2, '2025-01-23', '2025-01-25', '[\"Pas d\'activité\"]', '275.00', '220.00', '55.00', '55.00', '0.00', '0.00', '165.00', '7.61', '172.61', '550.00', NULL, 1, 1),
(65, '2025-01-23 07:08:14', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 6, 0, 4, 2, 2, '2025-01-23', '2025-01-25', '[\"Pas d\'activité\"]', '275.00', '220.00', '55.00', '55.00', '0.00', '0.00', '165.00', '7.61', '172.61', '550.00', NULL, 1, 1),
(66, '2025-01-23 07:14:12', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 6, 0, 4, 2, 2, '2025-01-23', '2025-01-25', '[\"Pas d\'activité\"]', '275.00', '220.00', '55.00', '55.00', '0.00', '0.00', '165.00', '7.61', '172.61', '550.00', NULL, 1, 1),
(67, '2025-01-23 07:14:13', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 6, 0, 4, 2, 2, '2025-01-23', '2025-01-25', '[\"Pas d\'activité\"]', '275.00', '220.00', '55.00', '55.00', '0.00', '0.00', '165.00', '7.61', '172.61', '550.00', NULL, 1, 1),
(68, '2025-01-23 07:16:11', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 3, '2025-01-23', '2025-01-26', '[\"Pas d\'activité\"]', '220.00', '220.00', '0.00', '55.00', '0.00', '0.00', '198.00', '9.06', '207.06', '660.00', NULL, 1, 1),
(69, '2025-01-23 07:16:12', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 3, '2025-01-23', '2025-01-26', '[\"Pas d\'activité\"]', '220.00', '220.00', '0.00', '55.00', '0.00', '0.00', '198.00', '9.06', '207.06', '660.00', NULL, 1, 1);

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `activité` BEFORE INSERT ON `reservation` FOR EACH ROW IF NEW.activité = "" THEN
SET NEW.activité = '["Pas d'activité"]';
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bungalow_send` BEFORE UPDATE ON `reservation` FOR EACH ROW BEGIN
IF NEW.bungalow = "BUNGALOW DOUBLE" THEN
INSERT INTO bungalow_double(`id_acheteur`,`nom`,`prenom`,`rom_id`) VALUES(OLD.id,OLD.nom,OLD.prenom,NEW.rom_number);
END IF;
IF NEW.bungalow = "BUNGALOW FAMILIALE" THEN
INSERT INTO bungalow_familiale(`id_acheteur`,`nom`,`prenom`,`rom_id`) VALUES(OLD.id,OLD.nom,OLD.prenom,NEW.rom_number);
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `endStatus` AFTER UPDATE ON `reservation` FOR EACH ROW BEGIN
    IF NEW.status != "1" THEN
    INSERT INTO `sejour_terminer`(`id`, `date_d'enregistrement`, `nom`, `prenom`, `mail`, `adresse`, `adresse1`, `zip`, `ville`, `pay`, `traitement`, `bungalow`, `sup_single`, `nombre_de_personnes`, `nombre_de_personne_inscrit_au_activité`, `nombre_d'adulte`, `nombre_d'enfant`, `nombre_de_séjour`, `date_d'arrivé`, `date_de_départ`, `activité`, `prixAE`, `prix_adulte`, `prix_enfant`, `prix_du_traitement`, `prix_des_activités`, `prix_single`, `total_sf`, `frai_paypal`, `prix_totale`, `prix_totale1`,`status`) VALUES (OLD.id, OLD.`date_d'enregistrement`, OLD.nom, OLD.prenom, OLD.mail, OLD.adresse, OLD.adresse1, OLD.zip, OLD.ville, OLD.pay, OLD.traitement, OLD.bungalow, OLD.sup_single, OLD.nombre_de_personnes, OLD.nombre_de_personne_inscrit_au_activité, OLD.`nombre_d'adulte`, OLD.`nombre_d'enfant`, OLD.nombre_de_séjour, OLD.`date_d'arrivé`, OLD.date_de_départ, OLD.activité, OLD.prixAE, OLD.prix_adulte, OLD.prix_enfant, OLD.prix_du_traitement, OLD.prix_des_activités, OLD.prix_single, OLD.total_sf, OLD.frai_paypal, OLD.prix_totale,OLD.prix_totale1,NEW.status);

DELETE FROM `bungalow_double` WHERE id_acheteur = OLD.id;
DELETE FROM `bungalow_familiale` WHERE id_acheteur = OLD.id;
UPDATE `rom` SET `id_client`='0',`status`='libre' WHERE id_client = OLD.id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `send_rom` AFTER UPDATE ON `reservation` FOR EACH ROW UPDATE rom SET id_client = NEW.id, status = "prise" WHERE rom_id = NEW.rom_number
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rom`
--

CREATE TABLE `rom` (
  `rom_id` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `bungalow` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rom`
--

INSERT INTO `rom` (`rom_id`, `id_client`, `bungalow`, `status`) VALUES
(1, 57, 'BD', 'prise'),
(2, NULL, 'BD', 'libre'),
(3, NULL, 'BD', 'libre'),
(4, NULL, 'BD', 'libre'),
(5, NULL, 'BD', 'libre'),
(6, NULL, 'BD', 'libre'),
(7, NULL, 'BF', 'libre'),
(8, NULL, 'BF', 'libre'),
(9, NULL, 'BF', 'libre'),
(10, NULL, 'BF', 'libre'),
(11, 70, 'BD', 'prise'),
(12, NULL, 'BD', 'libre');

-- --------------------------------------------------------

--
-- Table structure for table `sejour_terminer`
--

CREATE TABLE `sejour_terminer` (
  `id` int NOT NULL,
  `date_d'enregistrement` datetime DEFAULT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adresse1` varchar(255) DEFAULT NULL,
  `zip` int DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `traitement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bungalow` varchar(255) DEFAULT NULL,
  `sup_single` int DEFAULT NULL,
  `nombre_de_personnes` int DEFAULT NULL,
  `nombre_de_personne_inscrit_au_activité` int DEFAULT NULL,
  `nombre_d'adulte` int DEFAULT NULL,
  `nombre_d'enfant` int DEFAULT NULL,
  `nombre_de_séjour` int DEFAULT NULL,
  `date_d'arrivé` date DEFAULT NULL,
  `date_de_départ` date DEFAULT NULL,
  `activité` json NOT NULL,
  `prixAE` decimal(12,2) NOT NULL,
  `prix_adulte` decimal(12,2) DEFAULT NULL,
  `prix_enfant` decimal(12,2) DEFAULT NULL,
  `prix_du_traitement` decimal(12,2) DEFAULT NULL,
  `prix_des_activités` decimal(12,2) DEFAULT NULL,
  `prix_single` decimal(12,2) DEFAULT NULL,
  `total_sf` decimal(12,2) NOT NULL,
  `frai_paypal` decimal(12,2) NOT NULL,
  `prix_totale` decimal(12,2) DEFAULT NULL,
  `prix_totale1` decimal(12,2) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sejour_terminer`
--

INSERT INTO `sejour_terminer` (`id`, `date_d'enregistrement`, `nom`, `prenom`, `mail`, `adresse`, `adresse1`, `zip`, `ville`, `pay`, `traitement`, `bungalow`, `sup_single`, `nombre_de_personnes`, `nombre_de_personne_inscrit_au_activité`, `nombre_d'adulte`, `nombre_d'enfant`, `nombre_de_séjour`, `date_d'arrivé`, `date_de_départ`, `activité`, `prixAE`, `prix_adulte`, `prix_enfant`, `prix_du_traitement`, `prix_des_activités`, `prix_single`, `total_sf`, `frai_paypal`, `prix_totale`, `prix_totale1`, `status`) VALUES
(1, '2024-10-31 08:16:23', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'Madagascar', 'BED & BREAKFAST', 'BUNGALOW DOUBLE', 0, 3, 0, 3, 0, 2, '2024-10-31', '2024-11-02', '[\"Pas d\'activité\"]', '84.00', '84.00', '0.00', '28.00', '0.00', '0.00', '50.40', '2.57', '52.97', '168.00', 3),
(2, '2024-10-31 08:22:28', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW FAMILIALE', 0, 4, 0, 2, 2, 2, '2024-10-31', '2024-11-02', '[\"Pas d\'activité\"]', '165.00', '110.00', '55.00', '55.00', '0.00', '0.00', '99.00', '4.71', '103.71', '330.00', 2),
(3, '2024-10-31 08:24:30', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW DOUBLE', 0, 4, 0, 4, 0, 3, '2024-10-31', '2024-11-03', '[\"Pas d\'activité\"]', '176.00', '176.00', '0.00', '44.00', '0.00', '0.00', '158.40', '7.32', '165.72', '528.00', 3),
(4, '2024-10-31 08:45:06', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW FAMILIALE', 0, 4, 0, 4, 0, 4, '2024-11-01', '2024-11-05', '[\"Pas d\'activité\"]', '220.00', '220.00', '0.00', '55.00', '0.00', '0.00', '264.00', '11.97', '275.97', '880.00', 2),
(5, '2024-10-31 08:49:37', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW DOUBLE', 0, 2, 0, 2, 0, 2, '2024-10-31', '2024-11-02', '[\"Pas d\'activité\"]', '88.00', '88.00', '0.00', '44.00', '0.00', '0.00', '52.80', '2.67', '55.47', '176.00', 3),
(6, '2024-10-31 08:51:45', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW DOUBLE', 0, 2, 0, 2, 0, 2, '2024-10-31', '2024-11-02', '[\"Pas d\'activité\"]', '88.00', '88.00', '0.00', '44.00', '0.00', '0.00', '52.80', '2.67', '55.47', '176.00', 2),
(7, '2024-10-31 08:53:36', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW FAMILIALE', 0, 5, 0, 4, 1, 2, '2024-11-01', '2024-11-03', '[\"Pas d\'activité\"]', '247.50', '220.00', '28.00', '55.00', '0.00', '0.00', '148.50', '6.88', '155.38', '495.00', 2),
(8, '2024-11-04 08:54:54', 'RAKOTOARIMAHA', 'Isaia Precieux', 'email@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', 'BUNGALOW DOUBLE', 0, 2, 0, 2, 0, 2, '2024-11-04', '2024-11-06', '[\"Pas d\'activité\"]', '88.00', '88.00', '0.00', '44.00', '0.00', '0.00', '52.80', '2.67', '55.47', '176.00', 2),
(9, '2024-11-07 12:49:56', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 2, 1, 1, '2024-11-07', '2024-11-08', '[\"Pas d\'activité\"]', '137.50', '110.00', '27.50', '55.00', '0.00', '0.00', '41.25', '2.17', '43.42', '137.50', 2),
(11, '2025-01-06 14:09:34', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 5, '2025-01-06', '2025-01-11', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '297.00', '13.42', '310.42', '990.00', 3),
(13, '2025-01-07 07:27:39', '', '', '', '', '', 0, '', '', 'BED & BREAKFAST', NULL, 0, 2, 0, 2, 0, 14, '2025-01-08', '2025-01-22', '[\"Pas d\'activité\"]', '132.00', '132.00', '0.00', '66.00', '0.00', '0.00', '554.40', '24.74', '579.14', '1848.00', 2),
(20, '2025-01-08 13:31:48', '', '', '', '', '', 0, '', '', 'BED & BREAKFAST', NULL, 0, 3, 0, 2, 1, 4, '2025-01-08', '2025-01-12', '[\"Pas d\'activité\"]', '97.50', '78.00', '19.50', '39.00', '0.00', '0.00', '117.00', '5.50', '122.50', '390.00', 2),
(22, '2025-01-09 08:14:26', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 2, '2025-01-09', '2025-01-11', '[\"Pas d\'activité\"]', '264.00', '264.00', '0.00', '66.00', '0.00', '0.00', '158.40', '7.32', '165.72', '528.00', 2),
(26, '2025-01-09 08:22:13', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 2, '2025-01-09', '2025-01-11', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '118.80', '5.58', '124.38', '396.00', 2),
(27, '2025-01-09 08:34:20', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-09', '2025-01-12', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '178.20', '8.19', '186.39', '594.00', 2),
(28, '2025-01-09 08:34:20', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-09', '2025-01-12', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '178.20', '8.19', '186.39', '594.00', 2),
(29, '2025-01-09 08:34:20', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-09', '2025-01-12', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '178.20', '8.19', '186.39', '594.00', 2),
(30, '2025-01-09 08:34:20', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-09', '2025-01-12', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '178.20', '8.19', '186.39', '594.00', 2),
(31, '2025-01-09 08:34:20', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-09', '2025-01-12', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '178.20', '8.19', '186.39', '594.00', 2),
(32, '2025-01-09 08:34:21', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 3, '2025-01-09', '2025-01-12', '[\"Pas d\'activité\"]', '198.00', '198.00', '0.00', '66.00', '0.00', '0.00', '178.20', '8.19', '186.39', '594.00', 2),
(33, '2025-01-09 13:26:39', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 6, '2025-01-09', '2025-01-15', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '297.00', '13.42', '310.42', '990.00', 2),
(40, '2025-01-09 13:26:39', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 6, '2025-01-09', '2025-01-15', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '297.00', '13.42', '310.42', '990.00', 3),
(41, '2025-01-09 13:26:40', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 6, '2025-01-09', '2025-01-15', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '297.00', '13.42', '310.42', '990.00', 2),
(42, '2025-01-09 13:26:40', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 6, '2025-01-09', '2025-01-15', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '297.00', '13.42', '310.42', '990.00', 3),
(44, '2025-01-09 13:26:40', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 3, 0, 6, '2025-01-09', '2025-01-15', '[\"Pas d\'activité\"]', '165.00', '165.00', '0.00', '55.00', '0.00', '0.00', '297.00', '13.42', '310.42', '990.00', 2),
(48, '2025-01-10 11:45:42', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 2, '2025-01-10', '2025-01-12', '[\"Pas d\'activité\"]', '264.00', '264.00', '0.00', '66.00', '0.00', '0.00', '158.40', '7.32', '165.72', '528.00', 3),
(51, '2025-01-10 12:36:15', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 3, 0, 2, 1, 1, '2025-01-10', '2025-01-11', '[\"Pas d\'activité\"]', '165.00', '132.00', '33.00', '66.00', '0.00', '0.00', '49.50', '2.53', '52.03', '165.00', 2),
(52, '2025-01-10 12:43:27', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 2, 0, 2, 0, 2, '2025-01-10', '2025-01-12', '[\"Pas d\'activité\"]', '110.00', '110.00', '0.00', '55.00', '0.00', '0.00', '66.00', '3.25', '69.25', '220.00', 2),
(53, '2025-01-13 07:35:52', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 5, '2025-01-13', '2025-01-18', '[\"Pas d\'activité\"]', '264.00', '264.00', '0.00', '66.00', '0.00', '0.00', '396.00', '17.77', '413.77', '1320.00', 3),
(54, '2025-01-13 07:35:58', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 8, '2025-01-13', '2025-01-21', '[\"Pas d\'activité\"]', '264.00', '264.00', '0.00', '66.00', '0.00', '0.00', '633.60', '28.23', '661.83', '2112.00', 2),
(55, '2025-01-13 07:36:06', 'RAKOTOARIMAHA', 'Isaia Precieux', 'rakototarimahaprecieux.copscall@gmail.com', 'LOT IVE 37 BEHORIRIKA', '', 101, 'ANTANANARIVO', 'MG', 'BED & BREAKFAST', NULL, 0, 4, 0, 4, 0, 4, '2025-01-13', '2025-01-17', '[\"Pas d\'activité\"]', '264.00', '264.00', '0.00', '66.00', '0.00', '0.00', '316.80', '14.29', '331.09', '1056.00', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bungalow_double`
--
ALTER TABLE `bungalow_double`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_acheteur` (`id_acheteur`);

--
-- Indexes for table `bungalow_familiale`
--
ALTER TABLE `bungalow_familiale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_acheteur` (`id_acheteur`);

--
-- Indexes for table `enattente`
--
ALTER TABLE `enattente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rom`
--
ALTER TABLE `rom`
  ADD PRIMARY KEY (`rom_id`);

--
-- Indexes for table `sejour_terminer`
--
ALTER TABLE `sejour_terminer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bungalow_double`
--
ALTER TABLE `bungalow_double`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bungalow_familiale`
--
ALTER TABLE `bungalow_familiale`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enattente`
--
ALTER TABLE `enattente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
