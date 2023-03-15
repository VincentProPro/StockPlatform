-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 mars 2023 à 06:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinicdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `achatcoursier`
--

CREATE TABLE `achatcoursier` (
  `matricule` bigint(20) NOT NULL,
  `matricule_article` text NOT NULL,
  `poids` decimal(10,0) NOT NULL DEFAULT 0,
  `prixachat` decimal(11,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `quantityperunit` int(11) NOT NULL DEFAULT 0,
  `matricule_format` bigint(20) NOT NULL DEFAULT 2,
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `dateachat` datetime NOT NULL,
  `matricule_comand` bigint(20) NOT NULL,
  `numfacture` text NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `tempsvalidation` datetime DEFAULT NULL,
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `achatcoursier`
--

INSERT INTO `achatcoursier` (`matricule`, `matricule_article`, `poids`, `prixachat`, `prixvente`, `quantity`, `quantityperunit`, `matricule_format`, `benefice`, `description`, `dateachat`, `matricule_comand`, `numfacture`, `validation`, `tempsvalidation`, `matriculevalidation`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(3, '3', '7', '800', '0', 8, 9, 1, '0', 'Boite Dafalgan 500mg description', '2022-05-28 00:00:00', 39, 'numfacture', 1, '2022-06-24 00:59:35', 40118262, 'vsakouvogui@gmail.com', '2022-06-23 22:59:35', '2022-05-28 16:08:08'),
(47, '17', '10', '888', '10', 99, 99, 2, '88', 'description', '2022-06-09 15:20:43', 39, 'vincent555', 1, '2022-06-24 00:59:41', 40118262, 'vsakouvogui@gmail.com', '2022-06-23 22:59:41', '2022-06-09 15:20:43'),
(92, '3', '1', '50', '0', 2, 1, 1, '0', 'gg', '2022-06-09 16:41:17', 39, 'vincent555', 1, '2022-06-24 00:59:44', 40118262, 'vsakouvogui@gmail.com', '2022-06-23 22:59:44', '2022-06-09 16:41:17'),
(93, '14', '6', '56000', '0', 6, 2, 1, '0', 'description Boite Quinine 500mg ', '2022-06-09 16:42:50', 39, 'vincent555', 1, '2022-06-24 00:59:47', 40118262, 'vsakouvogui@gmail.com', '2022-06-23 22:59:47', '2022-06-09 16:42:50'),
(94, '14', '1', '30000', '0', 2, 2, 1, '0', 'rie', '2022-06-20 13:14:37', 100, 'vincent555', 1, '2022-06-24 00:59:50', 40118262, 'vsakouvogui@gmail.com', '2022-06-23 22:59:50', '2022-06-20 13:14:37'),
(96, '13', '1', '1500', '0', 22, 10, 1, '0', 'enfant', '2023-01-09 20:54:23', 135, '8585', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-09 19:54:23', '2023-01-09 20:54:23'),
(97, '4', '2', '1500', '0', 4, 10, 1, '0', 'jjjj', '2023-01-09 20:56:25', 135, '8585', 1, '2023-01-09 20:57:50', 40118262, 'vsakouvogui@gmail.com', '2023-01-09 19:57:50', '2023-01-09 20:56:25'),
(98, '4', '2', '2200', '0', 12, 1, 3, '0', 'nonnn', '2023-01-11 16:24:50', 135, '7777', 1, '2023-02-23 12:54:08', 40118262, 'vsakouvogui@gmail.com', '2023-02-23 11:54:08', '2023-01-11 16:24:50'),
(102, '8', '0', '15000', '0', 5, 10, 1, '0', 'nonee', '2023-02-23 10:24:01', 139, '7777', 1, '2023-02-23 13:43:19', 40118262, 'vsakouvogui@gmail.com', '2023-02-23 12:43:19', '2023-02-23 10:24:01'),
(103, '5', '1', '1500', '0', 40, 5, 1, '0', 'gaviscon lololo', '2023-02-23 12:34:52', 141, '484850', 1, '2023-02-23 12:45:50', 40118262, 'vsakouvogui@gmail.com', '2023-02-23 11:45:50', '2023-02-23 12:34:52'),
(104, '11', '2', '2000', '0', 1, 20, 2, '0', 'none', '2023-02-27 13:29:58', 142, '2024', 1, '2023-02-27 13:34:48', 40118262, 'vsakouvogui@gmail.com', '2023-02-27 12:34:48', '2023-02-27 13:29:58'),
(105, '11', '2', '2000', '0', 5, 5, 1, '0', 'jj', '2023-02-27 13:33:13', 142, '2024', 1, '2023-02-27 13:34:55', 40118262, 'vsakouvogui@gmail.com', '2023-02-27 12:34:55', '2023-02-27 13:33:13');

-- --------------------------------------------------------

--
-- Structure de la table `achatentrer`
--

CREATE TABLE `achatentrer` (
  `matricule` bigint(20) NOT NULL,
  `magasin` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `fournicode` int(11) NOT NULL,
  `libeller` text NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `matricule_comand` bigint(20) NOT NULL,
  `numfacture` text NOT NULL,
  `validation` tinyint(11) NOT NULL DEFAULT 0,
  `tempsvalidation` date DEFAULT NULL,
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matriculredacteur` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `achatentrer`
--

INSERT INTO `achatentrer` (`matricule`, `magasin`, `reference`, `fournicode`, `libeller`, `tarif`, `matricule_comand`, `numfacture`, `validation`, `tempsvalidation`, `matriculevalidation`, `timestamp`, `matriculredacteur`, `date`, `heure`, `lastmodification`) VALUES
(7, '1', 'vincent', 1, 'vincent', '5000', 39, 'vincent555', 1, '2023-02-23', 40118262, '2023-02-23 11:53:55', 'vsakouvogui@gmail.com', '2022-05-28', '07:06:39', '2022-05-28 20:06:39'),
(8, '6', 'reference', 8, 'libeller', 'tarif', 99, 'numfacture', 1, '2022-06-09', 40118262, '2022-06-09 21:30:36', 'vsakouvogui@gmail.com', '2022-06-09', '10:29:11', '2022-06-09 23:29:11'),
(9, '1', 'vincent test', 4, 'test', '9000', 43, '5044', 1, '2023-02-23', 40118262, '2023-02-23 11:55:23', 'vsakouvogui@gmail.com', '2022-06-09', '10:30:07', '2022-06-09 23:30:07'),
(10, '1', 'vincent test', 1, 'delphine', '70000', 100, '5ttdede', 1, '2022-06-10', 40118262, '2022-06-10 01:25:34', 'vsakouvogui@gmail.com', '2022-06-10', '02:25:07', '2022-06-10 03:25:07'),
(11, '1', 'new test', 1, 'new test', '60000', 100, '77hhhh', 0, NULL, NULL, '2022-06-20 12:17:45', 'vsakouvogui@gmail.com', '2022-06-20', '01:17:45', '2022-06-20 14:17:45'),
(12, '1', 'kkk', 1, 'kkk', '1000', 101, '1448', 0, NULL, NULL, '2023-01-07 18:24:52', 'vsakouvogui@gmail.com', '2023-01-07', '07:24:52', '2023-01-07 19:24:52'),
(13, '1', 'monday para', 1, 'pour monday para', '18000', 135, '8585', 1, '2023-01-09', 40118262, '2023-01-09 20:01:27', 'vsakouvogui@gmail.com', '2023-01-09', '08:34:54', '2023-01-09 20:34:54'),
(15, '1', 'wednesday Doliprane', 1, 'Doli out', '10500', 135, '7788', 0, NULL, NULL, '2023-01-11 14:23:11', 'vsakouvogui@gmail.com', '2023-01-11', '03:23:11', '2023-01-11 15:23:11'),
(16, '1', 'wednesday Doliprane', 1, 'Doli', '4444', 135, '7777', 0, NULL, NULL, '2023-01-11 15:23:38', 'vsakouvogui@gmail.com', '2023-01-11', '04:23:38', '2023-01-11 16:23:38'),
(17, '1', 'lolo', 8, 'gaviscon', '40000', 141, '484850', 0, NULL, NULL, '2023-02-23 11:33:59', 'vsakouvogui@gmail.com', '2023-02-23', '12:33:59', '2023-02-23 12:33:59'),
(18, '1', 'Nivaquine 10', 1, 'Nivaquine 500mg ', '12000', 142, '2024', 1, '2023-02-27', 40118262, '2023-02-27 12:30:27', 'vsakouvogui@gmail.com', '2023-02-27', '01:24:29', '2023-02-27 13:24:29'),
(19, '1', 'paracetamol 1000g', 1, 'para', '2000', 142, '2025', 1, '2023-02-27', 40118262, '2023-02-27 12:34:40', 'vsakouvogui@gmail.com', '2023-02-27', '01:26:08', '2023-02-27 13:26:08');

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `matricule` bigint(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `lien` varchar(250) NOT NULL,
  `dateadded` datetime NOT NULL,
  `addedby` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`matricule`, `title`, `description`, `lien`, `dateadded`, `addedby`) VALUES
(6, 'ggggg', 'jjjj', 'http://localhost/StockPlatform/comptable/uploads/DSIMagazine.pdf', '2023-02-22 00:00:00', 'vsakouvogui@gmail.com'),
(7, 'hhh', 'rtyuiol', 'http://localhost/StockPlatform/comptable/uploads/scenario.pdf', '2023-02-22 15:54:47', 'vsakouvogui@gmail.com'),
(8, 'aaa', 'eeeee', 'http://localhost/StockPlatform/comptable/uploads/T-NSA-700_project.pdf', '2023-02-23 09:58:43', 'vsakouvogui@gmail.com'),
(9, 'eee', 'ddd', 'http://localhost/StockPlatform/comptable/uploads/Moncv.pdf', '2023-02-24 10:01:27', 'vsakouvogui@gmail.com'),
(10, 'H', 'EEE', 'http://localhost/StockPlatform/comptable/uploads/EOT.docx', '2023-02-24 10:07:11', 'vsakouvogui@gmail.com'),
(11, 'reeegg nono', 'gvhgkkhh', 'http://localhost/StockPlatform/comptable/uploads/VLan.pptx', '2023-02-24 16:08:03', 'vsakouvogui@gmail.com'),
(12, 'arrrr', 'archive   eee', 'http://localhost/StockPlatform/comptable/uploads/Mycv.pdf', '2023-02-24 16:11:37', 'vsakouvogui@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `matricule` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `designation` text NOT NULL,
  `groupcode` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `poids_kg` decimal(10,0) NOT NULL,
  `code_category` varchar(100) NOT NULL,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `tmc` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(11,0) NOT NULL DEFAULT 0,
  `format` varchar(100) NOT NULL DEFAULT 'carton',
  `quantity_per_unit` int(11) NOT NULL DEFAULT 1,
  `modeuse` varchar(250) NOT NULL DEFAULT 'normale',
  `matriculredacteur` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`matricule`, `code`, `designation`, `groupcode`, `description`, `poids_kg`, `code_category`, `prixachat`, `tmc`, `prixvente`, `benefice`, `format`, `quantity_per_unit`, `modeuse`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(2, 'BANTRN', 'Boite Antarene 500mg     ', 'ANTRN', 'Antarene 500mg en boite     ', '2', 'HF1', '1500', '0', '2000', '500', '1', 1, 'normale', '', '2021-12-15 12:11:03', '2023-03-03 11:39:45'),
(3, 'BDFGN', 'Boite Dafalgan 500mg ', 'DFGN', 'Dafalgan 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(4, 'BDLPN', 'Boite Doliprane 500mg ', 'DLPN', 'Doliprane 500mg en boite ', '12', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(5, 'BGVSCN', 'Boite Gaviscon 500mg ', 'GVSCN', 'Gaviscon 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(6, 'BHLCDN', 'Boite Helicidine 500mg ', 'HLCDN', 'Helicidine 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(7, 'BIMODM', 'Boite Imodium 500mg ', 'IMODM', 'Imodium 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(8, 'BLMLIN', 'Boite Lamaline 500mg ', 'LMLIN', 'Lamaline 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(9, 'BLVTYRX', 'Boite Levothyrox 500mg ', 'LVTYRX', 'Levothyrox 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(10, 'BNSNX', 'Boite Nasonex 500mg ', 'NSNX', 'Nasonex 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(11, 'BNVQ', 'Boite Nivaqine 500mg ', 'NVQ', 'Nivaqine 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(12, 'BORLOX', 'Boite Orelox 500mg ', 'ORLOX', 'Orelox 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(13, 'BPCML', 'Boite Paracetamol 500mg ', 'PCML', 'Du paracetamol 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(14, 'BQNIN', 'Boite Quinine 500mg ', 'QNIN', 'Quinine 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(15, 'BRNOFMCIL', 'Boite Rhinofluimucil 500mg ', 'RNOFMCIL', 'Rhinofluimucil 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(16, 'BRVTRL', 'Boite Rivotril 500mg ', 'RVTRL', 'Rivotril 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(17, 'BSPSFN', 'Boite Spasfon 500mg ', 'SPSFN', 'Spasfon 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(18, 'CAGMTIN', 'Carton Augmentin 500mg ', 'AGMTIN', 'Augmentin 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(19, 'CANTRN', 'Carton Antarene 500mg ', 'ANTRN\r\n', 'Antarene 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(20, 'CDFGN', 'Carton Dafalgan 500mg ', 'DFGN', 'Dafalgan 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(21, 'CDLPN', 'Carton Doliprane 500mg ', 'DLPN', 'Doliprane 500mg en carton ', '9', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(22, 'CEFRG', 'Carton Efferalgan 500mg X12boites', 'EFRG', 'Efferalgant 500mg en carton ', '4', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(23, 'CGVSCN', 'Carton Gaviscon 500mg ', 'GVSCN', 'Gaviscon 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(24, 'CHLCDN', 'Carton Helicidine 500mg ', 'HLCDN', 'Helicidine 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(25, 'CIMODM', 'Carton Imodium 500mg ', 'IMODM', 'Imodium 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(26, 'CLMLIN', 'Carton Lamaline 500mg ', 'LMLIN', 'Lamaline 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(27, 'CLVTYRX', 'Carton Levothyrox 500mg ', 'LVTYRX', 'Levothyrox 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(28, 'CNSNX', 'Carton Nasonex 500mg ', 'NSNX', 'Nasonex 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(29, 'CNVQ', 'Carton Nivaqine 500mg ', 'NVQ', 'Nivaqine 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(30, 'CORLOX', 'Carton Orelox 500mg ', 'ORLOX', 'Orelox 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(31, 'CPCML', 'Carton Paracetamol 500mg X12boites', 'PCML', 'Du paracetamol 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(32, 'CQNIN', 'Carton Quinine 500mg ', 'QNIN', 'Quinine 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(33, 'CRNOFMCIL', 'Carton Rhinofluimucil 500mg ', 'RNOFMCIL', 'Rhinofluimucil 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(34, 'CRVTRL', 'Carton Rivotril 500mg ', 'RVTRL', 'Rivotril 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(35, 'CSPSFN', 'Carton Spasfon 500mg ', 'SPSFN', 'Spasfon 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, 'normale', '', '2021-12-15 12:11:03', ''),
(48, 'BPADE54', 'PADERYL', 'PADE54', 'PADÉRYL contre la toux', '1', 'Beb01', '1500', '1', '2000', '500', '1', 5, 'normale', 'vsakouvogui@gmail.com', '2023-03-03 12:18:27', '2023-03-03 13:18:27');

-- --------------------------------------------------------

--
-- Structure de la table `bondecommandedb`
--

CREATE TABLE `bondecommandedb` (
  `matricule` bigint(20) NOT NULL,
  `libeller` text NOT NULL,
  `description` text NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `magazincode` varchar(100) NOT NULL,
  `situation` varchar(50) NOT NULL DEFAULT 'EAVSI',
  `status` varchar(100) NOT NULL DEFAULT 'En attente',
  `validation` tinyint(4) NOT NULL DEFAULT 0,
  `tempsvalidation` date DEFAULT NULL,
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` date NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bondecommandedb`
--

INSERT INTO `bondecommandedb` (`matricule`, `libeller`, `description`, `tarif`, `magazincode`, `situation`, `status`, `validation`, `tempsvalidation`, `matriculevalidation`, `timestamp`, `lastmodification`, `matriculredacteur`) VALUES
(22, 'ii', 'ii', 'iii', 'MGS01', 'CVSI', '1', 1, NULL, NULL, '2022-05-28 10:17:40', '2022-05-26', 'vsakouvogui@gmail.com'),
(23, 'ddd', 'ddd', 'ddd', 'MGS01', 'CVSI', '1', 1, NULL, NULL, '2023-02-23 08:59:31', '2022-05-26', 'vsakouvogui@gmail.com'),
(28, 'uuuu', 'uuu', '777', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-05-27 17:27:38', '2022-05-27', 'vsakouvogui@gmail.com'),
(31, 'bbb', 'bbb', 'bbbb', 'MGS01', 'CVSI', '1', 1, '2022-05-28', 40118262, '2023-01-07 08:31:17', '2022-05-28', 'vsakouvogui@gmail.com'),
(32, 'eeeeeee', 'eeeeeeee', 'eeeeeeee', 'MGS01', 'CVSI', 'En attente', 1, NULL, NULL, '2022-05-28 10:19:10', '2022-05-27', 'vsakouvogui@gmail.com'),
(34, 'yyyy', 'description', '44444', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-05-27 17:46:03', '2022-05-27', 'vsakouvogui@gmail.com'),
(35, 'yyyy', 'gg', '80', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-05-27 17:49:36', '2022-05-27', 'vsakouvogui@gmail.com'),
(36, 'hhh', 'hhh', 'hhh', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-05-28 09:46:30', '2022-05-28', 'vsakouvogui@gmail.com'),
(37, 'hhh', 'hhh', 'hhh', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-05-28 09:51:50', '2022-05-28', 'vsakouvogui@gmail.com'),
(38, 'pillule', 'pillule enfant', '4000cfa', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-05-28 10:21:33', '2022-05-28', 'vsakouvogui@gmail.com'),
(39, 'ttttcomptable', 'description ttttcomptable', '66000cfa', 'MGS01', 'CVSI', 'En attente', 1, '2023-01-07', 40118262, '2023-01-07 08:31:59', '2023-01-07', 'vsakouvogui@gmail.com'),
(40, 'nouveau', 'Quinine nouveaau', '40000', 'MGS01', 'CVSI', 'En attente', 1, '2022-06-20', 40118262, '2022-06-20 12:20:30', '2022-06-20', 'vsakouvogui@gmail.com'),
(41, 'nouveau', 'Quinine nouveaau', '40000', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-06-09 15:48:04', '2022-06-09', 'vsakouvogui@gmail.com'),
(42, 'nouveau', 'Quinine nouveaau', '40000', 'MGS01', 'CVSI', 'En attente', 0, NULL, NULL, '2022-06-09 15:48:23', '2022-06-09', 'vsakouvogui@gmail.com'),
(43, 'nouvel commande', 'new', '5000', 'MGS01', 'CVSI', '1', 1, '2023-01-07', 40118262, '2023-01-07 23:18:34', '2023-01-07', 'vsakouvogui@gmail.com'),
(44, 'comptable commande', 'compt', '40000', 'MGS01', 'EAVSI', '1', 1, '2022-06-20', 40118262, '2023-01-07 19:04:06', '2022-06-20', 'vsakouvogui@gmail.com'),
(99, 'yyyy', 'yyyy', 'yyyy', 'NOM88', 'EXPD6MS', '1', 1, NULL, NULL, '2022-06-09 22:38:12', '2022-05-27', 'vsakouvogui@gmail.com'),
(100, 'Delphine', 'gggg', '60000', 'MGS01', 'URGSI', '1', 1, '2022-06-10', 40118262, '2023-01-07 08:31:42', '2022-06-10', 'vsakouvogui@gmail.com'),
(101, 'Guinococie et Quora', 'pour enfant - carton', '10000', 'MGS01', 'URGSI', '1', 1, '2023-01-07', 40118262, '2023-01-07 19:03:26', '2023-01-07', 'vsakouvogui@gmail.com'),
(107, 'kkk', 'kkkk', '10500', 'MGS01', 'URGSI', '1', 1, '2023-01-07', 40118262, '2023-01-07 19:40:55', '2023-01-07', 'vsakouvogui@gmail.com'),
(113, 'para et niquiki', 'enfant', '45000', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 19:56:48', '2023-01-07', 'vsakouvogui@gmail.com'),
(118, 'para et niquiki', 'enfant', '8000', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:28:20', '2023-01-07', 'vsakouvogui@gmail.com'),
(119, 'para et niquiki', 'enfant', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:37:03', '2023-01-07', 'vsakouvogui@gmail.com'),
(120, 'para et niquiki', 'kkkk', '45000', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:40:01', '2023-01-07', 'vsakouvogui@gmail.com'),
(121, 'kkk', 'enfant', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:45:47', '2023-01-07', 'vsakouvogui@gmail.com'),
(122, 'kkk', 'enfant', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:49:15', '2023-01-07', 'vsakouvogui@gmail.com'),
(123, 'kkk', 'enfant', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:49:42', '2023-01-07', 'vsakouvogui@gmail.com'),
(124, 'kkk', 'enfant', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 20:49:58', '2023-01-07', 'vsakouvogui@gmail.com'),
(125, 'para et niquiki', 'enfant', '10500', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 21:02:04', '2023-01-07', 'vsakouvogui@gmail.com'),
(126, 'para et niquiki', 'enfant', '10500', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 21:05:38', '2023-01-07', 'vsakouvogui@gmail.com'),
(127, 'para et niquiki', 'enfant', '45000', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 21:06:15', '2023-01-07', 'vsakouvogui@gmail.com'),
(128, 'kkk', 'df', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 21:09:15', '2023-01-07', 'vsakouvogui@gmail.com'),
(129, 'para et niquiki', 'kkkk', '45000', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 22:07:32', '2023-01-07', 'vsakouvogui@gmail.com'),
(130, 'para et niquiki', 'enfant', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 22:07:59', '2023-01-07', 'vsakouvogui@gmail.com'),
(131, 'para et niquiki', 'enfant', '10500', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 22:10:16', '2023-01-07', 'vsakouvogui@gmail.com'),
(132, 'kkk', 'enfant', '45000', 'MGS01', 'URGSI', '1', 1, '2023-01-08', 40118262, '2023-01-07 23:17:01', '2023-01-08', 'vsakouvogui@gmail.com'),
(133, 'kkk', 'df', '4444', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 23:04:37', '2023-01-08', 'vsakouvogui@gmail.com'),
(134, 'para et niquiki last', 'last', '77000', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-07 23:12:02', '2023-01-08', 'vsakouvogui@gmail.com'),
(135, 'monday 09Paramol', 'nonne', '55000', 'MGS01', 'URGSI', 'En attente', 1, '2023-01-09', 40118262, '2023-01-09 19:07:28', '2023-01-09', 'vsakouvogui@gmail.com'),
(136, '1\'', '1\'', '1\'', 'MGS01', 'URGSI', 'En attente', 0, NULL, NULL, '2023-01-12 05:06:05', '2023-01-12', 'vsakouvogui@gmail.com'),
(139, 'kkkk', 'ddd', '12200', 'MGS01', 'URGSI', 'En attente', 1, '2023-02-23', 40118262, '2023-02-23 08:59:42', '2023-02-23', 'vsakouvogui@gmail.com'),
(140, 'fnana', 'fgdf,ldf, ls', '40000', 'MGS01', 'URGSI', 'En attente', 1, '2023-02-23', 40118262, '2023-02-23 11:27:25', '2023-02-23', 'vsakouvogui@gmail.com'),
(141, 'lolollo', 'lololo', '4000', 'MGS01', 'URGSI', 'En attente', 1, '2023-02-23', 40118262, '2023-02-23 11:32:16', '2023-02-23', 'vsakouvogui@gmail.com'),
(142, 'besoin nivaquine', 'nivaquine 10 carton', '12000', 'MGS01', 'URGSI', 'En attente', 1, '2023-02-27', 40118262, '2023-02-27 12:18:48', '2023-02-27', 'vsakouvogui@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `matricule` bigint(20) NOT NULL,
  `matricule_module` bigint(20) NOT NULL,
  `titre` text NOT NULL,
  `description` text DEFAULT NULL,
  `prix` int(11) NOT NULL DEFAULT 0,
  `recu` int(11) NOT NULL,
  `payement` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` datetime NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`matricule`, `matricule_module`, `titre`, `description`, `prix`, `recu`, `payement`, `timestamp`, `lastmodification`, `matriculredacteur`) VALUES
(2, 1, 'hhhh', 'Boite Dafalgan 500mg ,5,Boite Spasfon 500mg ,51', 4000, 5000, 'oui', '2023-01-13 20:14:31', '2023-01-13 21:14:31', 'vsakouvogui@gmail.com'),
(3, 1, '', 'Boite Dafalgan 500mg ,10,Boite Doliprane 500mg ,10', 12, 1400, 'oui', '2023-02-23 09:15:00', '2023-02-23 10:15:00', 'vsakouvogui@gmail.com'),
(4, 1, 'gaviscon', 'Boite Gaviscon 500mg ,5', 1200, 1200, 'oui', '2023-02-23 13:19:41', '2023-02-23 14:19:41', 'vsakouvogui@gmail.com'),
(5, 1, 'patient 4', 'Boite Dafalgan 500mg ,2,Boite Dafalgan 500mg ,1,Boite Doliprane 500mg ,1', 12200, 12000, 'oui', '2023-02-27 12:08:22', '2023-02-27 13:08:22', 'vsakouvogui@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `categoritable`
--

CREATE TABLE `categoritable` (
  `matricule` int(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `nom` varchar(100) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categoritable`
--

INSERT INTO `categoritable` (`matricule`, `code`, `description`, `nom`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(1, 'Beb01', 'Pour Bebe de moins de 1 an', 'Bebe', 'vsakouvogui@gmail.com', '2021-12-15 12:38:39', '2023-03-03 13:58:30'),
(2, 'DROP42', 'Pour les dropanositaires', 'Dropa', 'gastron@gmail.com', '2022-02-02 13:02:57', '2022-02-02 14:02:57'),
(3, 'ENF', 'Pour enfant', 'Enfant', '', '2021-12-15 12:38:39', ''),
(4, 'Fem01', 'Pour Femme', 'Femme', '', '2021-12-15 12:38:39', ''),
(5, 'HF1', 'Pour Homme et Femme', 'Homme&Femme', '', '2021-12-15 12:38:39', ''),
(6, 'Hom1', 'Pour Homme Seulement', 'Homme', 'gastron@gmail.com', '2021-12-15 12:38:39', '2022-02-02 13:59:51');

-- --------------------------------------------------------

--
-- Structure de la table `cmuentrer`
--

CREATE TABLE `cmuentrer` (
  `matricule` bigint(20) NOT NULL,
  `sortimagasin_matricule` bigint(20) NOT NULL,
  `article_matricule` bigint(20) NOT NULL,
  `groupcode_article` varchar(100) NOT NULL,
  `situation_matricule` bigint(20) NOT NULL,
  `quantityperunit` int(11) NOT NULL DEFAULT 0,
  `previousqty` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `currentqty` int(11) NOT NULL DEFAULT 0,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `taxe` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `validation` tinyint(2) NOT NULL DEFAULT 0,
  `tempsvalidation` datetime DEFAULT NULL,
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cmuentrer`
--

INSERT INTO `cmuentrer` (`matricule`, `sortimagasin_matricule`, `article_matricule`, `groupcode_article`, `situation_matricule`, `quantityperunit`, `previousqty`, `quantity`, `currentqty`, `prixachat`, `taxe`, `prixvente`, `benefice`, `date`, `validation`, `tempsvalidation`, `matriculevalidation`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(993, 2, 3, 'DFGN', 1, 1, 5, 63, 68, '700', '0', '840', '140', '2022-07-15', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2022-07-15 21:31:22', '2022-07-15 23:31:22'),
(994, 2, 3, 'DFGN', 1, 1, 63, 63, 126, '700', '0', '840', '140', '2022-08-04', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2022-08-04 10:28:18', '2022-08-04 12:28:18'),
(995, 2, 3, 'DFGN', 1, 1, 63, 5, 68, '56', '0', '67', '11', '2022-08-04', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2022-08-04 10:28:59', '2022-08-04 12:28:59'),
(996, 7, 4, 'DLPN', 1, 1, 0, 10, 10, '375', '0', '450', '75', '2023-01-09', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-09 20:38:18', '2023-01-09 21:38:18'),
(997, 2, 17, 'SPSFN', 1, 1, 198, 198, 396, '18', '0', '22', '4', '2023-01-11', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-11 08:17:55', '2023-01-11 09:17:55'),
(998, 2, 3, 'DFGN', 1, 1, 0, 3, 3, '33', '0', '40', '7', '2023-01-11', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-11 08:28:44', '2023-01-11 09:28:44'),
(999, 2, 4, 'DLPN', 1, 1, 10, 4, 14, '150', '0', '180', '30', '2023-01-12', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-12 13:28:50', '2023-01-12 14:28:50'),
(1000, 7, 4, 'DLPN', 1, 1, 4, 20, 24, '750', '0', '900', '150', '2023-01-12', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-12 13:30:29', '2023-01-12 14:30:29'),
(1001, 7, 4, 'DLPN', 1, 1, 20, 20, 40, '750', '0', '900', '150', '2023-01-12', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-12 13:31:30', '2023-01-12 14:31:30'),
(1002, 2, 4, 'DLPN', 1, 1, 20, 70, 90, '2625', '0', '3150', '525', '2023-01-12', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-01-12 13:45:58', '2023-01-12 14:45:58'),
(1003, 2, 3, 'DFGN', 1, 1, 1, 63, 64, '700', '0', '840', '140', '2023-02-23', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 11:55:58', '2023-02-23 12:55:58'),
(1004, 8, 5, 'GVSCN', 1, 1, 0, 100, 100, '750', '0', '900', '150', '2023-02-23', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 13:09:19', '2023-02-23 14:09:19'),
(1005, 2, 4, 'DLPN', 1, 1, 83, 7, 90, '263', '0', '315', '53', '2023-02-27', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-27 12:47:56', '2023-02-27 13:47:56'),
(1006, 2, 4, 'DLPN', 1, 1, 90, 3, 93, '113', '0', '135', '23', '2023-02-27', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-27 12:48:19', '2023-02-27 13:48:19'),
(1007, 9, 11, 'NVQ', 1, 1, 0, 10, 10, '1000', '0', '1200', '200', '2023-02-27', 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-27 12:48:41', '2023-02-27 13:48:41');

-- --------------------------------------------------------

--
-- Structure de la table `cmusorti`
--

CREATE TABLE `cmusorti` (
  `matricule` bigint(20) NOT NULL,
  `article_matricule` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `previousqty` int(11) NOT NULL DEFAULT 0,
  `currentqty` int(11) NOT NULL DEFAULT 0,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `taxe` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `totalbenefice` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `numerofacture` varchar(100) NOT NULL DEFAULT 'nofacture',
  `situation_matricule` bigint(20) NOT NULL,
  `validation` tinyint(2) NOT NULL DEFAULT 0,
  `tempsvalidation` datetime DEFAULT NULL,
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cmusorti`
--

INSERT INTO `cmusorti` (`matricule`, `article_matricule`, `quantity`, `previousqty`, `currentqty`, `prixachat`, `prixvente`, `taxe`, `benefice`, `totalbenefice`, `date`, `numerofacture`, `situation_matricule`, `validation`, `tempsvalidation`, `matriculevalidation`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(1, 3, 1, 693, 692, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 1, '2022-07-07 03:23:54', 40118262, 'vsakouvogui@gmail.com', '2023-02-23 16:28:24', '2022-05-26 00:26:43'),
(2, 3, 1, 692, 691, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:07', '2022-05-26 00:26:54'),
(3, 3, 1, 691, 690, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:28:55', '2022-05-26 00:27:32'),
(4, 3, 1, 690, 689, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:16', '2022-05-26 00:27:50'),
(5, 3, 1, 689, 688, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:22', '2022-05-26 20:56:55'),
(6, 3, 1, 688, 687, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:30', '2022-05-26 20:57:01'),
(7, 3, 1, 687, 686, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:49', '2022-05-26 20:58:55'),
(8, 3, 1, 686, 685, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:53', '2022-05-26 21:02:21'),
(9, 3, 1, 685, 684, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:29:56', '2022-05-26 21:02:25'),
(10, 3, 1, 684, 683, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:00', '2022-05-26 21:03:48'),
(11, 3, 1, 683, 682, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:03', '2022-05-26 21:03:56'),
(12, 3, 1, 682, 681, '6', '3', '0', '4', '4', '2022-05-26', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:08', '2022-05-26 21:13:06'),
(13, 3, 1, 0, -1, '6', '3', '0', '4', '4', '2022-07-07', '44', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:11', '2022-07-07 03:23:54'),
(14, 3, 1, 5, 4, '700', '840', '0', '140', '140', '2022-08-04', '1', 1, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:16', '2022-08-04 13:34:45'),
(15, 3, 1, 4, 3, '700', '840', '0', '140', '140', '2022-08-04', '1', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:46', '2022-08-04 13:40:07'),
(16, 3, 1, 3, 2, '700', '840', '0', '140', '140', '2022-09-08', '1', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-28 17:58:14', '2022-08-04 13:43:27'),
(17, 3, 1, 2, 1, '700', '840', '0', '140', '140', '2022-09-21', '1', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-28 17:57:46', '2022-08-04 13:46:56'),
(18, 3, 1, 1, 0, '700', '840', '0', '140', '140', '2022-11-16', '1', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-28 17:56:38', '2022-08-04 13:49:21'),
(19, 3, 1, 3, 2, '33', '40', '0', '7', '7', '2023-01-13', '1', 1, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:21', '2023-01-13 21:39:42'),
(20, 3, 1, 2, 1, '33', '40', '0', '7', '7', '2023-01-13', '2', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:30:25', '2023-01-13 22:19:02'),
(21, 4, 1, 90, 89, '150', '180', '0', '30', '30', '2023-01-13', '2', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:31:28', '2023-01-13 22:19:44'),
(22, 4, 2, 89, 87, '150', '180', '0', '30', '60', '2023-01-13', '2', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:31:37', '2023-01-13 23:53:50'),
(23, 4, 2, 87, 85, '150', '180', '0', '30', '60', '2023-01-14', '2', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:31:44', '2023-01-14 00:01:02'),
(24, 4, 1, 85, 84, '150', '180', '0', '30', '30', '2023-01-14', '2', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:32:01', '2023-01-14 00:01:59'),
(25, 5, 5, 100, 95, '750', '900', '0', '150', '750', '2023-02-23', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-23 16:32:56', '2023-02-23 14:24:01'),
(26, 3, 5, 64, 59, '700', '840', '0', '140', '700', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 18:09:34', '2023-02-26 19:09:34'),
(27, 3, 3, 59, 56, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:14:18', '2023-02-26 20:14:18'),
(28, 3, 3, 56, 53, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:16:33', '2023-02-26 20:16:33'),
(29, 3, 3, 53, 50, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:20:10', '2023-02-26 20:20:10'),
(30, 3, 3, 50, 47, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:21:58', '2023-02-26 20:21:58'),
(31, 3, 3, 47, 44, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:22:56', '2023-02-26 20:22:56'),
(32, 3, 3, 44, 41, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:26:59', '2023-02-26 20:26:59'),
(33, 3, 3, 41, 38, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:31:03', '2023-02-26 20:31:03'),
(34, 3, 3, 38, 35, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:33:23', '2023-02-26 20:33:23'),
(35, 3, 3, 35, 32, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:35:56', '2023-02-26 20:35:56'),
(36, 3, 3, 32, 29, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:37:53', '2023-02-26 20:37:53'),
(37, 3, 3, 29, 26, '700', '840', '0', '140', '420', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:38:40', '2023-02-26 20:38:40'),
(38, 3, 1, 26, 25, '700', '840', '0', '140', '140', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:40:49', '2023-02-26 20:40:49'),
(39, 3, 1, 25, 24, '700', '840', '0', '140', '140', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:49:37', '2023-02-26 20:49:37'),
(40, 3, 2, 24, 22, '700', '840', '0', '140', '280', '2023-02-26', '4', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-26 19:51:20', '2023-02-26 20:51:20'),
(41, 4, 1, 84, 83, '150', '180', '0', '30', '30', '2023-02-27', '5', 3, 0, NULL, NULL, 'vsakouvogui@gmail.com', '2023-02-27 12:11:04', '2023-02-27 13:11:04');

-- --------------------------------------------------------

--
-- Structure de la table `cmustock`
--

CREATE TABLE `cmustock` (
  `matricule` bigint(20) NOT NULL,
  `matricule_article` bigint(20) NOT NULL,
  `groupcode_article` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantityreal` int(11) NOT NULL DEFAULT 0,
  `prixachat` int(11) NOT NULL DEFAULT 0,
  `prixvente` int(11) NOT NULL DEFAULT 0,
  `benefice` int(11) NOT NULL DEFAULT 0,
  `matriculredacteur` varchar(100) NOT NULL,
  `lastmodification` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cmustock`
--

INSERT INTO `cmustock` (`matricule`, `matricule_article`, `groupcode_article`, `quantity`, `quantityreal`, `prixachat`, `prixvente`, `benefice`, `matriculredacteur`, `lastmodification`, `date`, `timestamp`) VALUES
(74480, 3, 'DFGN', 22, 290, 700, 840, 140, 'vsakouvogui@gmail.com', '2022-07-09 18:41:01', '2022-07-09', '2023-02-26 19:51:20'),
(74481, 17, 'SPSFN', 198, 396, 18, 22, 4, 'vsakouvogui@gmail.com', '2022-07-11 13:25:37', '2022-07-11', '2023-01-11 08:17:55'),
(74482, 4, 'DLPN', 93, 127, 375, 450, 75, 'vsakouvogui@gmail.com', '2023-01-09 21:38:18', '2023-01-09', '2023-02-27 12:48:19'),
(74483, 5, 'GVSCN', 95, 95, 750, 900, 150, 'vsakouvogui@gmail.com', '2023-02-23 14:09:19', '2023-02-23', '2023-02-23 13:24:01'),
(74484, 11, 'NVQ', 10, 10, 1000, 1200, 200, 'vsakouvogui@gmail.com', '2023-02-27 13:48:41', '2023-02-27', '2023-02-27 12:48:41');

-- --------------------------------------------------------

--
-- Structure de la table `entrermagasin`
--

CREATE TABLE `entrermagasin` (
  `matricule` bigint(20) NOT NULL,
  `matricule_article` bigint(20) NOT NULL,
  `groupcode_article` varchar(200) NOT NULL,
  `previousqty` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `currentqty` int(11) NOT NULL DEFAULT 0,
  `quantityperunit` int(11) NOT NULL DEFAULT 1,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `matricule_format` varchar(200) NOT NULL,
  `poids` decimal(11,0) NOT NULL DEFAULT 0,
  `magazincode` varchar(200) NOT NULL,
  `matricule_magazin` bigint(20) NOT NULL,
  `matriculredacteur` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entrermagasin`
--

INSERT INTO `entrermagasin` (`matricule`, `matricule_article`, `groupcode_article`, `previousqty`, `quantity`, `currentqty`, `quantityperunit`, `prixachat`, `prixvente`, `benefice`, `matricule_format`, `poids`, `magazincode`, `matricule_magazin`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(107, 3, 'DFGN', 0, 8, 8, 9, '800', '0', '0', '1', '7', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-23 22:59:35', '2022-06-24 00:59:35'),
(108, 17, 'SPSFN', 0, 99, 99, 99, '888', '10', '88', '2', '10', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-23 22:59:41', '2022-06-24 00:59:41'),
(109, 3, 'DFGN', 0, 2, 2, 1, '50', '0', '0', '1', '1', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-23 22:59:44', '2022-06-24 00:59:44'),
(110, 14, 'QNIN', 0, 6, 6, 2, '56000', '0', '0', '1', '6', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-23 22:59:47', '2022-06-24 00:59:47'),
(111, 14, 'QNIN', 6, 2, 8, 2, '30000', '0', '0', '1', '1', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-23 22:59:50', '2022-06-24 00:59:50'),
(112, 4, 'DLPN', 0, 4, 4, 10, '1500', '0', '0', '1', '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-01-09 19:57:50', '2023-01-09 20:57:50'),
(113, 5, 'GVSCN', 0, 40, 40, 5, '1500', '0', '0', '1', '1', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-23 11:45:50', '2023-02-23 12:45:50'),
(114, 4, 'DLPN', 7, 12, 19, 1, '2200', '0', '0', '3', '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-23 11:54:08', '2023-02-23 12:54:08'),
(115, 8, 'LMLIN', 0, 5, 5, 10, '15000', '0', '0', '1', '0', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-23 12:43:20', '2023-02-23 13:43:20'),
(116, 11, 'NVQ', 0, 1, 1, 20, '2000', '0', '0', '2', '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-27 12:34:48', '2023-02-27 13:34:48'),
(117, 11, 'NVQ', 0, 5, 5, 5, '2000', '0', '0', '1', '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-27 12:34:55', '2023-02-27 13:34:55');

-- --------------------------------------------------------

--
-- Structure de la table `expiretb`
--

CREATE TABLE `expiretb` (
  `matricule` bigint(20) NOT NULL,
  `matricule_article` bigint(20) NOT NULL,
  `groupcode_article` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateexpiring` date NOT NULL,
  `dateadded` date NOT NULL,
  `matricule_situation` bigint(20) NOT NULL,
  `matricule_lieu` bigint(20) NOT NULL,
  `matricule_format` bigint(20) NOT NULL,
  `matriculredacteur` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `expiretb`
--

INSERT INTO `expiretb` (`matricule`, `matricule_article`, `groupcode_article`, `quantity`, `dateexpiring`, `dateadded`, `matricule_situation`, `matricule_lieu`, `matricule_format`, `matriculredacteur`, `timestamp`) VALUES
(17, 3, 'DFGN', 8, '2023-04-06', '2023-02-25', 1, 1, 3, 'vsakouvogui@gmail.com', '2023-02-26 19:49:37'),
(18, 4, 'DLPN', 10, '2023-06-10', '2023-02-25', 1, 1, 1, 'vsakouvogui@gmail.com', '2023-02-25 15:29:08'),
(19, 17, 'SPSFN', 10, '2023-06-02', '2023-02-25', 1, 1, 1, 'vsakouvogui@gmail.com', '2023-02-25 15:29:52'),
(20, 3, 'DFGN', 10, '2023-05-17', '2023-02-25', 1, 1, 1, 'vsakouvogui@gmail.com', '2023-02-25 15:30:46'),
(21, 4, 'DLPN', 2, '2023-04-18', '2023-02-27', 1, 1, 3, 'vsakouvogui@gmail.com', '2023-02-27 12:11:04');

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

CREATE TABLE `format` (
  `matricule` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `matriculredacteur` varchar(200) NOT NULL,
  `lastmodification` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `format`
--

INSERT INTO `format` (`matricule`, `code`, `nom`, `description`, `matriculredacteur`, `lastmodification`, `timestamp`) VALUES
(1, 'Boite01', 'Boite', 'Boite de 12 unité', '', '0000-00-00', '2021-12-15 18:58:11'),
(2, 'CRTN01', 'Carton', 'Carton de 100 unité', '', '0000-00-00', '2021-12-15 18:56:51'),
(3, 'DTAIL01', 'Détail', '', '', '0000-00-00', '2021-12-15 18:58:11'),
(4, 'PLQ01', 'Plaquette', 'Plaquette de médicament', '', '0000-00-00', '2021-12-15 20:54:01');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurdb`
--

CREATE TABLE `fournisseurdb` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `plusinfo` text NOT NULL,
  `reference` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matriculredacteur` text NOT NULL,
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseurdb`
--

INSERT INTO `fournisseurdb` (`matricule`, `nom`, `tel`, `email`, `location`, `plusinfo`, `reference`, `timestamp`, `matriculredacteur`, `lastmodification`) VALUES
(1, 'Camp Guezo', '3+224334333', 'email@gmail.com', 'Littoral', 'medecin chirugien plusinfo ', 'CAGU42', '2023-03-03 13:09:03', 'gastron@gmail.com', '2022-02-02 13:59:05'),
(2, 'La Phar des Etoile', '+229656565', 'pharetoile@gmail.com', ' Etoile Rouge', ' rien', 'PE01', '2022-02-01 09:38:29', 'gastron@gmail.com', '2022-02-01 10:38:29'),
(3, 'Pk10 urgence rapide', '+2295443322', 'pk10urgrpid@gmail.com', 'Pk10', 'fast and reliable', 'PURE77', '2022-02-02 11:48:36', 'gastron@gmail.com', '2022-02-02 12:48:36'),
(4, 'Reine des glaces', '50994433', 'info@reineglace.com', 'Akassato ', ' nothing', 'RDGS24', '2022-02-02 12:59:18', 'gastron@gmail.com', '2022-02-02 13:59:18'),
(5, 'Le Rendez vous de la santé', '+229656521', 'rendvs@gmail.com', ' pahou-Benin   ', 'bon service', 'RS01', '2022-02-02 11:52:09', 'gastron@gmail.com', '2022-02-02 12:52:09'),
(8, 'La Rose des Santé', '3+224334333', 'email@gmail.com', 'Adlocationmin', 'medecin chirugien plusinfo', 'VIAJ53', '2022-06-09 22:48:37', 'vsakouvogui@gmail.com', '2022-05-18 13:33:43'),
(46, 'vincent ajout', '3+224334333', 'email@gmail.com', 'Adlocationmin', 'medecin chirugien plusinfo', 'VIAJ54', '2022-05-18 11:37:18', 'vsakouvogui@gmail.com', '2022-05-18 13:37:18'),
(47, 'vincent ajout', '3+224334333', 'email@gmail.com', 'Adlocationmin', 'medecin chirugien plusinfo', 'VIAJ73', '2022-05-18 11:37:19', 'vsakouvogui@gmail.com', '2022-05-18 13:37:19');

-- --------------------------------------------------------

--
-- Structure de la table `inventairetable`
--

CREATE TABLE `inventairetable` (
  `code` varchar(100) NOT NULL,
  `codearticle` varchar(100) NOT NULL,
  `quantityreal` int(11) NOT NULL DEFAULT 0,
  `dateinventaire` date NOT NULL,
  `heurinventaire` time NOT NULL,
  `ecartplus` int(11) NOT NULL DEFAULT 0,
  `ecartmoins` int(11) NOT NULL DEFAULT 0,
  `period` text NOT NULL,
  `situation` text NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `lastmodification` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `matricule` bigint(20) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `matriculredacteur` text NOT NULL,
  `lastmodification` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`matricule`, `nom`, `code`, `description`, `matriculredacteur`, `lastmodification`) VALUES
(1, 'CMU', 'LCMU', 'Le Centre de médicament', '', '2023-03-04 23:20:58'),
(2, 'Magazin ', 'LMGZN', 'Le magazin de la clinique', '', '2023-03-04 23:20:58');

-- --------------------------------------------------------

--
-- Structure de la table `magasintable`
--

CREATE TABLE `magasintable` (
  `matricule` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `lastmodification` text NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `magasintable`
--

INSERT INTO `magasintable` (`matricule`, `code`, `nom`, `description`, `lastmodification`, `matriculredacteur`, `timestamp`) VALUES
(1, 'MGS01', 'Magasin Clinic St Anne', 'Magasin de la clinique', '', '', '2021-12-15 18:26:02'),
(2, 'NOM88', 'edit nom', 'editdescription', '2022-05-19 10:01:53', 'vsakouvogui@gmail.com', '2022-05-19 08:00:28');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `matricule` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`matricule`, `code`, `nom`, `description`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(1, 'CMU01', 'CMU-Pharmacie', 'Centre de Medicament d\'Urgence', '', '2021-12-15 18:42:06', ''),
(2, 'CONSLT01', 'Consultation', '', '', '2021-12-15 18:43:35', ''),
(3, 'HOSP01', 'Hospitalisation', '', '', '2021-12-15 18:42:06', ''),
(4, 'INTV', 'Intervention', '', '', '2021-12-15 18:43:35', ''),
(5, 'SIC01', 'Stockage Interne', 'Stockage Interne de la clinique St Anne Afrique', '', '2021-12-27 16:09:01', '');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `body`, `author`) VALUES
(1, 2, 'bcdksb', 'ccbsdih\r\njbc ew.jcwehfiew,ddbdiwe', 'deeuuweiyw'),
(2, 1, 'dbhsvboe', 'dewdbiew bdbipb', 'dbhfiw'),
(3, 2, 'bcdksb', 'ccbsdih\r\njbc ew.jcwehfiew,ddbdiwe', 'deeuuweiyw'),
(4, 3, 'dbhsvboe', 'dewdbiew bdbipb', 'dbhfiw');

-- --------------------------------------------------------

--
-- Structure de la table `situation`
--

CREATE TABLE `situation` (
  `matricule` bigint(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `matricule_module` bigint(20) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `lastmodification` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `situation`
--

INSERT INTO `situation` (`matricule`, `code`, `nom`, `description`, `matricule_module`, `matriculredacteur`, `lastmodification`, `timestamp`) VALUES
(1, 'URGSI', 'Urgent', 'Urgence 🚨 à executer', 5, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49'),
(2, 'EAVSI', 'En Attente', 'En Attente de validation', 5, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49'),
(3, 'EXPD1AS', 'Expire Dans 1 An', 'A vite écouler', 1, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49'),
(4, 'EXPD1MS', 'Expire Dans 1 Mois', 'A vite écouler', 1, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49'),
(5, 'EXPD2MS', 'Expire Dans 3 Mois', 'A vite écouler', 1, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49'),
(6, 'EXPD6MS', 'Expire Dans 6 Mois', 'A  écouler', 1, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49'),
(7, 'PRM01', 'Périmé', 'A jeter', 1, '', '0000-00-00 00:00:00', '2022-05-19 08:17:49');

-- --------------------------------------------------------

--
-- Structure de la table `sortidetailmagasin`
--

CREATE TABLE `sortidetailmagasin` (
  `matricule` bigint(20) NOT NULL,
  `matricule_sorti` bigint(20) NOT NULL,
  `matricule_article` bigint(20) NOT NULL,
  `groupcode_article` varchar(100) NOT NULL,
  `previousqty` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `currentqty` int(11) NOT NULL,
  `quantityperunit` int(11) NOT NULL DEFAULT 1,
  `matricule_format` bigint(20) NOT NULL,
  `matricule_magasin` bigint(20) NOT NULL,
  `magazincode` varchar(100) NOT NULL,
  `situation_matricule` bigint(20) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `validation` tinyint(2) NOT NULL DEFAULT 0,
  `tempsvalidation` datetime DEFAULT NULL,
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` varchar(100) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sortidetailmagasin`
--

INSERT INTO `sortidetailmagasin` (`matricule`, `matricule_sorti`, `matricule_article`, `groupcode_article`, `previousqty`, `quantity`, `currentqty`, `quantityperunit`, `matricule_format`, `matricule_magasin`, `magazincode`, `situation_matricule`, `date`, `validation`, `tempsvalidation`, `matriculevalidation`, `timestamp`, `lastmodification`, `matriculredacteur`) VALUES
(38, 2, 17, 'SPSFN', 10, 2, 8, 99, 2, 1, 'MGS01', 1, '2022-06-26', 1, '2023-01-11 09:17:55', 40118262, '2022-06-26 22:28:21', '2022-06-26 23:28:21', 'vsakouvogui@gmail.com'),
(39, 2, 17, 'SPSFN', 8, 2, 6, 99, 2, 1, 'MGS01', 1, '2022-06-26', 0, '2022-07-11 13:25:37', 40118262, '2022-06-26 22:28:40', '2022-06-26 23:28:40', 'vsakouvogui@gmail.com'),
(40, 2, 17, 'SPSFN', 6, 2, 4, 99, 2, 1, 'MGS01', 1, '2022-06-26', 0, '2022-07-09 18:25:39', 40118262, '2022-06-26 22:28:41', '2022-06-26 23:28:41', 'vsakouvogui@gmail.com'),
(41, 2, 17, 'SPSFN', 4, 2, 2, 99, 2, 1, 'MGS01', 1, '2022-06-26', 0, '2022-07-09 18:26:40', 40118262, '2022-06-26 22:28:42', '2022-06-26 23:28:42', 'vsakouvogui@gmail.com'),
(42, 2, 17, 'SPSFN', 2, 2, 0, 99, 2, 1, 'MGS01', 1, '2022-06-26', 0, '2022-07-09 18:29:15', 40118262, '2022-06-26 22:28:43', '2022-06-26 23:28:43', 'vsakouvogui@gmail.com'),
(43, 2, 3, 'DFGN', 7, 7, 0, 9, 1, 1, 'MGS01', 1, '2022-06-28', 1, '2023-02-23 12:55:57', 40118262, '2022-06-28 04:46:50', '2022-06-28 05:46:50', 'vsakouvogui@gmail.com'),
(44, 2, 3, 'DFGN', 2, 1, 1, 5, 2, 1, 'MGS01', 1, '2022-06-28', 0, '2022-07-09 18:31:34', 40118262, '2022-06-28 04:46:50', '2022-06-28 05:46:50', 'vsakouvogui@gmail.com'),
(45, 2, 3, 'DFGN', 3, 3, 4, 1, 3, 1, 'MGS01', 1, '2022-06-28', 0, '2022-07-09 18:41:25', 40118262, '2022-06-28 04:46:50', '2022-06-28 05:46:50', 'vsakouvogui@gmail.com'),
(46, 2, 3, 'DFGN', 7, 7, 0, 9, 1, 1, 'MGS01', 1, '2022-06-28', 1, '2022-07-15 23:31:22', 40118262, '2022-06-28 06:57:40', '2022-06-28 07:57:40', 'vsakouvogui@gmail.com'),
(47, 2, 3, 'DFGN', 5, 1, 4, 5, 2, 1, 'MGS01', 1, '2022-06-28', 0, '2022-07-11 13:26:35', 40118262, '2022-06-28 06:57:40', '2022-06-28 07:57:40', 'vsakouvogui@gmail.com'),
(48, 2, 3, 'DFGN', 3, 3, 4, 1, 3, 1, 'MGS01', 1, '2022-06-28', 1, '2023-01-11 09:28:44', 40118262, '2022-06-28 06:57:40', '2022-06-28 07:57:40', 'vsakouvogui@gmail.com'),
(49, 2, 3, 'DFGN', 7, 7, 0, 9, 1, 1, 'MGS01', 1, '2022-07-03', 1, '2022-08-04 12:28:18', 40118262, '2022-07-03 13:13:05', '2022-07-03 14:13:05', 'vsakouvogui@gmail.com'),
(50, 2, 3, 'DFGN', 2, 1, 1, 5, 2, 1, 'MGS01', 1, '2022-07-03', 1, '2022-08-04 12:28:59', 40118262, '2022-07-03 13:13:05', '2022-07-03 14:13:05', 'vsakouvogui@gmail.com'),
(51, 2, 20, 'DFGN', 3, 3, 4, 1, 3, 1, 'MGS01', 1, '2022-07-03', 1, '2022-07-11 13:29:30', 40118262, '2022-07-03 13:13:05', '2022-07-03 14:13:05', 'vsakouvogui@gmail.com'),
(52, 7, 4, 'DLPN', 4, 2, 2, 10, 1, 1, 'MGS01', 1, '2023-01-09', 1, '2023-01-12 14:31:30', 40118262, '2023-01-09 20:20:31', '2023-01-09 21:20:31', 'vsakouvogui@gmail.com'),
(53, 7, 4, 'DLPN', 2, 1, 1, 10, 1, 1, 'MGS01', 1, '2023-01-09', 1, '2023-01-09 21:38:18', 40118262, '2023-01-09 20:36:05', '2023-01-09 21:36:05', 'vsakouvogui@gmail.com'),
(54, 2, 4, 'DLPN', 1, 1, 0, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 14:58:59', '2023-01-11 15:58:59', 'vsakouvogui@gmail.com'),
(55, 2, 4, 'DLPN', 2, 2, 0, 1, 3, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 14:58:59', '2023-01-11 15:58:59', 'vsakouvogui@gmail.com'),
(56, 2, 4, 'DLPN', 10, 3, 7, 1, 3, 1, 'MGS01', 1, '2023-01-11', 1, '2023-02-27 13:48:19', 40118262, '2023-01-11 15:29:05', '2023-01-11 16:29:05', 'vsakouvogui@gmail.com'),
(57, 2, 4, 'DLPN', 7, 7, 0, 10, 1, 1, 'MGS01', 1, '2023-01-11', 1, '2023-01-12 14:45:58', 40118262, '2023-01-11 15:30:13', '2023-01-11 16:30:13', 'vsakouvogui@gmail.com'),
(58, 2, 4, 'DLPN', 7, 7, 0, 1, 3, 1, 'MGS01', 1, '2023-01-11', 1, '2023-02-27 13:47:56', 40118262, '2023-01-11 15:30:13', '2023-01-11 16:30:13', 'vsakouvogui@gmail.com'),
(59, 2, 4, 'DLPN', 7, 1, 6, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 15:32:00', '2023-01-11 16:32:00', 'vsakouvogui@gmail.com'),
(60, 2, 4, 'DLPN', 4, 4, 0, 1, 3, 1, 'MGS01', 1, '2023-01-11', 1, '2023-01-12 14:28:49', 40118262, '2023-01-11 15:32:41', '2023-01-11 16:32:41', 'vsakouvogui@gmail.com'),
(61, 2, 4, 'DLPN', 6, 1, 5, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 15:33:25', '2023-01-11 16:33:25', 'vsakouvogui@gmail.com'),
(62, 2, 4, 'DLPN', 5, 1, 4, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 15:34:49', '2023-01-11 16:34:49', 'vsakouvogui@gmail.com'),
(63, 2, 4, 'DLPN', 4, 1, 3, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 15:36:03', '2023-01-11 16:36:03', 'vsakouvogui@gmail.com'),
(64, 7, 4, 'DLPN', 3, 1, 2, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 15:37:39', '2023-01-11 16:37:39', 'vsakouvogui@gmail.com'),
(65, 2, 4, 'DLPN', 2, 1, 1, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 15:40:30', '2023-01-11 16:40:30', 'vsakouvogui@gmail.com'),
(66, 2, 4, 'DLPN', 1, 1, 0, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:17:14', '2023-01-11 17:17:14', 'vsakouvogui@gmail.com'),
(67, 2, 4, 'DLPN', 40, 1, 39, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:19:05', '2023-01-11 17:19:05', 'vsakouvogui@gmail.com'),
(68, 2, 4, 'DLPN', 39, 1, 38, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:21:28', '2023-01-11 17:21:28', 'vsakouvogui@gmail.com'),
(69, 2, 4, 'DLPN', 38, 1, 37, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:22:09', '2023-01-11 17:22:09', 'vsakouvogui@gmail.com'),
(70, 2, 4, 'DLPN', 38, 1, 37, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:26:09', '2023-01-11 17:26:09', 'vsakouvogui@gmail.com'),
(71, 2, 4, 'DLPN', 38, 1, 37, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:26:26', '2023-01-11 17:26:26', 'vsakouvogui@gmail.com'),
(72, 2, 4, 'DLPN', 37, 1, 36, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:29:22', '2023-01-11 17:29:22', 'vsakouvogui@gmail.com'),
(73, 2, 4, 'DLPN', 36, 1, 35, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:30:02', '2023-01-11 17:30:02', 'vsakouvogui@gmail.com'),
(74, 2, 4, 'DLPN', 35, 1, 34, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:30:09', '2023-01-11 17:30:08', 'vsakouvogui@gmail.com'),
(75, 2, 4, 'DLPN', 34, 1, 33, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 16:59:16', '2023-01-11 17:59:16', 'vsakouvogui@gmail.com'),
(76, 2, 4, 'DLPN', 33, 1, 32, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:02:55', '2023-01-11 18:02:55', 'vsakouvogui@gmail.com'),
(77, 2, 4, 'DLPN', 32, 1, 31, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:03:28', '2023-01-11 18:03:28', 'vsakouvogui@gmail.com'),
(78, 2, 4, 'DLPN', 31, 1, 30, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:05:20', '2023-01-11 18:05:20', 'vsakouvogui@gmail.com'),
(79, 2, 4, 'DLPN', 30, 1, 29, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:06:00', '2023-01-11 18:06:00', 'vsakouvogui@gmail.com'),
(80, 7, 4, 'DLPN', 29, 1, 28, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:08:16', '2023-01-11 18:08:16', 'vsakouvogui@gmail.com'),
(81, 7, 4, 'DLPN', 28, 2, 26, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:23:08', '2023-01-11 18:23:08', 'vsakouvogui@gmail.com'),
(82, 7, 4, 'DLPN', 26, 1, 25, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:24:36', '2023-01-11 18:24:36', 'vsakouvogui@gmail.com'),
(83, 7, 4, 'DLPN', 25, 5, 20, 10, 1, 1, 'MGS01', 1, '2023-01-11', 0, NULL, NULL, '2023-01-11 17:25:33', '2023-01-11 18:25:33', 'vsakouvogui@gmail.com'),
(84, 7, 4, 'DLPN', 20, 2, 18, 10, 1, 1, 'MGS01', 1, '2023-01-11', 1, '2023-01-12 14:30:29', 40118262, '2023-01-11 17:27:21', '2023-01-11 18:27:21', 'vsakouvogui@gmail.com'),
(85, 8, 5, 'GVSCN', 40, 20, 20, 5, 1, 1, 'MGS01', 1, '2023-02-23', 1, '2023-02-23 14:09:19', 40118262, '2023-02-23 13:08:01', '2023-02-23 14:08:01', 'vsakouvogui@gmail.com'),
(86, 9, 11, 'NVQ', 5, 2, 3, 5, 1, 1, 'MGS01', 1, '2023-02-27', 1, '2023-02-27 13:48:41', 40118262, '2023-02-27 12:42:03', '2023-02-27 13:42:03', 'vsakouvogui@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `sortimagasin`
--

CREATE TABLE `sortimagasin` (
  `matricule` bigint(20) NOT NULL,
  `matricule_magasin` bigint(20) NOT NULL,
  `libeller` text NOT NULL,
  `matricule_module` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'En attente',
  `matriculevalidation` bigint(20) DEFAULT NULL,
  `tempsvalidation` datetime DEFAULT NULL,
  `validation` tinyint(2) NOT NULL DEFAULT 0,
  `matriculredacteur` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sortimagasin`
--

INSERT INTO `sortimagasin` (`matricule`, `matricule_magasin`, `libeller`, `matricule_module`, `date`, `status`, `matriculevalidation`, `tempsvalidation`, `validation`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(2, 1, 'paracetamol ', 1, '2022-05-28', '1', NULL, NULL, 0, 40118262, '2022-05-28 20:40:23', '2022-05-28 22:40:23'),
(3, 1, 'sorti magasin ', 1, '2022-05-28', '1', NULL, NULL, 0, 40118262, '2022-05-28 22:49:21', '2022-05-29 00:49:21'),
(4, 1, 'nouvelle sorti', 1, '2022-06-09', '1', NULL, NULL, 0, 40118262, '2022-06-09 20:22:49', '2022-06-09 22:22:49'),
(5, 1, 'para et niquiki', 1, '2023-01-07', 'En attente', NULL, NULL, 0, 40118262, '2023-01-07 22:11:14', '2023-01-07 23:11:14'),
(6, 1, 'para et niquiki last', 1, '2023-01-08', '1', NULL, NULL, 0, 40118262, '2023-01-07 23:12:25', '2023-01-08 00:12:25'),
(7, 1, 'doliprane (boite', 1, '2023-01-09', '1', NULL, NULL, 0, 40118262, '2023-01-09 20:03:08', '2023-01-09 21:03:08'),
(8, 1, 'gaviscon', 1, '2023-02-23', 'En attente', NULL, NULL, 0, 40118262, '2023-02-23 13:06:13', '2023-02-23 14:06:13'),
(9, 1, 'nivaquine', 1, '2023-02-27', '1', NULL, NULL, 0, 40118262, '2023-02-27 12:38:29', '2023-02-27 13:38:29');

-- --------------------------------------------------------

--
-- Structure de la table `stockmagasin`
--

CREATE TABLE `stockmagasin` (
  `matricule` bigint(20) NOT NULL,
  `matricule_article` bigint(20) NOT NULL,
  `groupcode_article` varchar(200) NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `quantityperunit` int(11) NOT NULL,
  `matricule_format` bigint(20) NOT NULL,
  `poids` decimal(11,0) NOT NULL DEFAULT 0,
  `magazincode` varchar(200) NOT NULL,
  `matricule_magazin` bigint(20) NOT NULL,
  `matriculredacteur` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stockmagasin`
--

INSERT INTO `stockmagasin` (`matricule`, `matricule_article`, `groupcode_article`, `quantity`, `quantityperunit`, `matricule_format`, `poids`, `magazincode`, `matricule_magazin`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
(30, 3, 'DFGN', 0, 9, 1, '7', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-07-03 13:13:05', '2022-06-24 00:59:35'),
(31, 17, 'SPSFN', 0, 99, 2, '10', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-26 22:28:43', '2022-06-24 00:59:41'),
(32, 3, 'DFGN', 1, 5, 2, '1', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-07-03 13:13:05', '2022-06-24 00:59:44'),
(33, 14, 'QNIN', 8, 2, 1, '6', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-06-23 22:59:50', '2022-06-24 00:59:47'),
(35, 3, 'DFGN', 4, 1, 3, '1', 'MGS01', 1, 'vsakouvogui@gmail.com', '2022-07-03 13:13:05', '2022-06-27 14:01:49'),
(36, 4, 'DLPN', 18, 10, 1, '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-01-11 17:27:21', '2023-01-09 20:57:50'),
(37, 4, 'DLPN', 19, 1, 3, '0', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-23 11:54:08', '2023-01-09 21:36:05'),
(38, 5, 'GVSCN', 20, 5, 1, '1', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-23 13:08:01', '2023-02-23 12:45:50'),
(39, 8, 'LMLIN', 5, 10, 1, '0', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-23 12:43:20', '2023-02-23 13:43:20'),
(40, 11, 'NVQ', 1, 20, 2, '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-27 12:34:49', '2023-02-27 13:34:48'),
(41, 11, 'NVQ', 3, 5, 1, '2', 'MGS01', 1, 'vsakouvogui@gmail.com', '2023-02-27 12:42:03', '2023-02-27 13:34:55');

-- --------------------------------------------------------

--
-- Structure de la table `tokens`
--

CREATE TABLE `tokens` (
  `user_id` bigint(20) NOT NULL,
  `token` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `timestamp`) VALUES
(40118262, '794', '2023-02-22 16:00:10'),
(40118262, '0', '2023-02-22 16:02:06'),
(40118262, '8e1c31d54f5065d7e19a3b055b3d971695b4b1fa7a639a8498d4aca78a9506e7', '2023-02-22 16:04:51'),
(40118262, '14d02710bfcd670d36636da839363d5fb674a2f80aa0b7daa1090bc24b6e222c', '2023-02-22 16:07:36'),
(40118262, '90d14b67f0ecc68f0abd120f5a61ca885b59c5933b811fbd5da1082f94bcf306', '2023-02-22 16:08:43'),
(40118262, '137e556713cc38b5c8678b609efb3369e355e4556f845d4c2f3d4832aa3ba5f9', '2023-02-22 16:09:38'),
(40118262, '3376e7d12a0bc2ea91dc4ff85ef3275062c99fcbe4bc8f7534cb147371832cbf', '2023-02-22 16:10:41'),
(40118262, '464ea5a3a6a02a4cf6df37cb43509bbb8f8a679d6b783ef8188fadc971912160', '2023-02-22 16:17:24'),
(40118262, 'a4f889e12e013fe883573bbc9835fc05f051fcf33552afeb84bb734d46b458ea', '2023-02-22 16:18:17'),
(40118262, 'd4a1e977467ec2ec264a894c1f87bf3b69925e757f00bdefe38e42aef7c7f27a', '2023-02-22 16:22:50'),
(40118262, '93fb6af02b79f950a41344a8f09845c9e5a1864a42e79789f8e546f53f9fc33c', '2023-02-22 16:25:14'),
(40118262, '1171f3f8c88cd2b5cf949a5b10f345cf31ef335e0dee6c13d4988a68b731607b', '2023-02-22 16:37:28'),
(40118262, '5722bb48da54bd5094b73b9b834506022bd7e69084ecc85f3e49b49a502638cc', '2023-02-22 16:38:33'),
(40118262, 'b8262cdd193e6bf324c5dc2d79e2592d24304b180d26dfab9ec47fb4f7a69433', '2023-02-22 16:40:29'),
(40118262, '8677feccb289132cc0831cb5cf14662ff4bfcd8c06f41506c08e77a748c95339', '2023-02-22 17:21:26'),
(40118262, '17800b1603618aed0e7ef5fda7f1a83878cef52dcc4cc8d74b5c471ba19e2347', '2023-02-22 17:21:53'),
(40118262, '6a95c3df0624eef6199ce60c2ae33bf70df7a6086a36392cffe3156f2b099fb4', '2023-02-22 21:22:10'),
(40118262, 'ffb910cfbea2c708df2964f297d3700d05c9e6570ba56fea2b3a988bcee1a4ec', '2023-02-22 21:37:18'),
(40118262, 'b35e17a4828a4d162af2275de3e3024ca2409711de950a45e3c4fc0b3dd85504', '2023-02-22 21:52:04'),
(40118262, 'f5d372f6726f1a4818b412d97b0a1b7c8cd0519889c9b9e992756a68e588cbe7', '2023-02-23 07:46:49'),
(40118262, '4dba0a03f84d2bbe466010aef3d924f8bd71d158c6c6463654135a059ac7ff20', '2023-02-23 08:44:48'),
(40118262, '074b289e3dab472e44e88888769cf4c39c9e63eddc735f34ffab2fadfcb1ab82', '2023-02-23 11:24:28'),
(40118262, 'b73cf2b678440791f7bc02d7a4a4eed7c2e90ab42aa1c15906c1d6c68dbdbf59', '2023-02-23 11:26:06'),
(40118262, '3a6830b5b087a7a6c92ab47431d97c84bcb76025b991e401617049758bb816f7', '2023-02-23 15:17:12'),
(40118262, '31c4a92a7af1ea3d77906cc35b0c184e66e21273c4531a2dae5b649788080c0c', '2023-02-23 15:22:38'),
(40118262, '7c9e6a3d827718f372b97ac0ad4d9273583e0de25c3fd5cd41d81deda38ae84f', '2023-02-23 20:51:56'),
(40118262, '676515fe0a54a8a25b6a18842d82ce33467e5f22009c7baa555db746fb6355dc', '2023-02-23 21:25:18'),
(40118262, 'ac264de844a867348817ca74314a2e450f01814cc2d0007b7e432cdf51066603', '2023-02-24 08:49:41'),
(40118262, '82d184c9c38389a072c0a255e6a37485e5374a7c3c1ed24fd89ee791ea059849', '2023-02-25 11:03:22'),
(40118262, '74a69f1fd976697a6d2273eff0039ed8b99f564da5b6249abbbd998bc9856075', '2023-02-26 20:29:18'),
(40118262, '99fe09b3a506b2ef64f9572a96a82e16d78e8e3e01ee0d627d61b17006e2d5ea', '2023-02-26 20:32:38'),
(40118262, 'fdf8e7758ecd9f3e82bfdeedd4b8c8252c774bdf7cfd16cadc6f8a8838407df1', '2023-02-26 21:17:35'),
(40118262, 'b1e3993892c48183537a919d249725521e3526c511a5b3f11692db68dc3afdeb', '2023-02-27 12:03:42'),
(40118262, '31464ebc561cc941164766d5a1c438f1419019e8409f738eb2a0ed5786b8d80a', '2023-02-28 12:52:59'),
(40118262, '16f39e085a4003bcf486aa5ca4a19a4937ad8b0a49162311288dcd9a5473cb51', '2023-02-28 18:17:57'),
(40118262, 'bcb07b54eb439edd2f670970506b3000697d91a33f2ad1c42c40f686d5beadd1', '2023-02-28 23:02:25'),
(40118262, 'df4e06f5df9527e0fc548cf89ec4264503dc54987fc1c6ebb750fd7a1664cd94', '2023-03-01 09:45:03'),
(40118262, 'f8c23024a36249beb36936f6f28cc1793d5149450ae5eff885b870ebcd37c113', '2023-03-01 15:29:35'),
(40118262, '02d06553d0d13350385452afee2361b58b888f1922851e244ce48fd345021375', '2023-03-01 17:21:38'),
(40118262, '9e6ae146f6b5512cba4f48549dcd56be718311742e98090d89696de29548489b', '2023-03-02 10:12:42'),
(40118262, '1e9196feb6510a9ea67a85b86bf895502a2e1b10f03a39fefc360d4039aaca1a', '2023-03-03 08:03:47'),
(40118262, 'd1ad58f4dbd2c8fc70c4b7b71227d5962b454451bd9f6150d29aeaa9fab39e56', '2023-03-03 09:34:44');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `matricule` bigint(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'actif',
  `matriculredacteur` varchar(100) NOT NULL,
  `lastmodification` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`matricule`, `fullname`, `tel`, `email`, `position`, `role`, `status`, `matriculredacteur`, `lastmodification`, `timestamp`) VALUES
(22334412, 'Rollanda Hountoukpe', '+229556622', 'rollanda@gmail.com', 'Gerant du Centre de Médicament d\'Urgence Matiné', 'Gerant CMU', 'actif', '', '', '2021-12-15 12:50:41'),
(40118262, 'Vincent Sakouvogui', '+233558266583', 'vsakouvogui@gmail.com', 'Informaticien', 'SuperAdmin', 'actif', '', '', '2021-12-15 12:50:41'),
(40128399, 'Pr Jean Leon Olory Togbe', '+2298888833', 'jeanleon@gmail.com', 'Chirugien', 'Admin', 'actif', '', '', '2021-12-15 12:50:41'),
(49554433, 'Koffi', '+222554433', 'koffi@gmail.com', 'Coursier', 'Coursier', 'actif', '', '', '2021-12-15 12:50:41'),
(52331133, 'Ella', '+2335546667', 'ella@gmail.com', 'Comptable', 'Comptable', 'actif', '', '', '2021-12-15 12:50:41'),
(98873322, 'Alpha', '+29944444490', 'alpha@gmail.com', 'Gerant du Centre de Médicament d\'Urgence Soiré', 'Gerant CMU', 'actif', '', '', '2021-12-15 12:50:41'),
(98887766, 'Gastron', '+66557788', 'gastron@gmail.com', 'Gestionnaire de Stock', 'Gestionnaire de Stock', 'actif', '', '', '2021-12-15 12:50:41'),
(98887794, 'vincent ajout', '3334333', 'email@gmail.com', 'medecin chirugien', 'Admin', 'active', 'vsakouvogui@gmail.com', '2022-05-11 13:15:36', '2022-05-11 11:15:36'),
(98887796, 'Delphine Dede Beavogui', '610333333', 'dedebea@gmail.com', 'Etudiante IT', 'PDG', 'active', 'vsakouvogui@gmail.com', '2022-06-20 13:32:20', '2022-06-20 11:32:20');

-- --------------------------------------------------------

--
-- Structure de la table `usersloginfo`
--

CREATE TABLE `usersloginfo` (
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `matriculredacteur` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `usersloginfo`
--

INSERT INTO `usersloginfo` (`email`, `password`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('ella@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', NULL, '2021-12-27 18:19:21', NULL),
('gastron@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', '', '2021-12-15 12:48:10', ''),
('koffi@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', '', '2021-12-15 12:48:10', ''),
('vsakouvogui@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', NULL, '2022-02-04 23:44:39', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achatcoursier`
--
ALTER TABLE `achatcoursier`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `achatentrer`
--
ALTER TABLE `achatentrer`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `bondecommandedb`
--
ALTER TABLE `bondecommandedb`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `categoritable`
--
ALTER TABLE `categoritable`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `cmuentrer`
--
ALTER TABLE `cmuentrer`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `cmusorti`
--
ALTER TABLE `cmusorti`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `cmustock`
--
ALTER TABLE `cmustock`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `entrermagasin`
--
ALTER TABLE `entrermagasin`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `expiretb`
--
ALTER TABLE `expiretb`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `fournisseurdb`
--
ALTER TABLE `fournisseurdb`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `code` (`matricule`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `magasintable`
--
ALTER TABLE `magasintable`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `situation`
--
ALTER TABLE `situation`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `sortidetailmagasin`
--
ALTER TABLE `sortidetailmagasin`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `sortimagasin`
--
ALTER TABLE `sortimagasin`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `stockmagasin`
--
ALTER TABLE `stockmagasin`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `usersloginfo`
--
ALTER TABLE `usersloginfo`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achatcoursier`
--
ALTER TABLE `achatcoursier`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `achatentrer`
--
ALTER TABLE `achatentrer`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `archive`
--
ALTER TABLE `archive`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `bondecommandedb`
--
ALTER TABLE `bondecommandedb`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categoritable`
--
ALTER TABLE `categoritable`
  MODIFY `matricule` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `cmuentrer`
--
ALTER TABLE `cmuentrer`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT pour la table `cmusorti`
--
ALTER TABLE `cmusorti`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `cmustock`
--
ALTER TABLE `cmustock`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74485;

--
-- AUTO_INCREMENT pour la table `entrermagasin`
--
ALTER TABLE `entrermagasin`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT pour la table `expiretb`
--
ALTER TABLE `expiretb`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `format`
--
ALTER TABLE `format`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `fournisseurdb`
--
ALTER TABLE `fournisseurdb`
  MODIFY `matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `magasintable`
--
ALTER TABLE `magasintable`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `situation`
--
ALTER TABLE `situation`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `sortidetailmagasin`
--
ALTER TABLE `sortidetailmagasin`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `sortimagasin`
--
ALTER TABLE `sortimagasin`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `stockmagasin`
--
ALTER TABLE `stockmagasin`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `matricule` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98887797;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
