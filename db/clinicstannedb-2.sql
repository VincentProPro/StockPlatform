-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2022 at 12:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `achatcoursier`
--

CREATE TABLE `achatcoursier` (
  `code` varchar(100) NOT NULL,
  `codearticle` text NOT NULL,
  `poids` decimal(10,0) NOT NULL DEFAULT 0,
  `prixachat` decimal(11,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `quantityperunit` int(11) NOT NULL DEFAULT 0,
  `format` varchar(100) NOT NULL DEFAULT 'carton',
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `dateachat` date NOT NULL,
  `numcomand` text NOT NULL,
  `numfacture` text NOT NULL,
  `validationstocker` tinyint(1) NOT NULL DEFAULT 0,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achatcoursier`
--

INSERT INTO `achatcoursier` (`code`, `codearticle`, `poids`, `prixachat`, `prixvente`, `quantity`, `quantityperunit`, `format`, `benefice`, `description`, `dateachat`, `numcomand`, `numfacture`, `validationstocker`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('2022-01-07 18:24:01', 'CANTRN', '0', '1200', '0', 2, 12, 'carton', '0', 'bon', '2022-01-07', '2021-12-29 10:35:07', 'hh', 1, 'koffi@gmail.com', '2022-01-09 22:38:50', '2022-01-07 18:24:01'),
('2022-01-07 18:40:43', 'CGVSCN', '0', '1200', '0', 4, 40, 'carton', '0', 'rien', '2022-01-06', '2021-12-29 10:34:47', '4457', 1, 'koffi@gmail.com', '2022-01-09 22:41:07', '2022-01-07 18:40:43'),
('2022-01-07 18:41:30', 'BLMLIN', '0', '33', '0', 33, 2, 'boite', '0', 'ree', '2022-01-07', '2021-12-29 10:35:07', 'hh', 1, 'koffi@gmail.com', '2022-01-09 22:41:33', '2022-01-07 18:41:30'),
('2022-01-07 18:42:04', 'BRVTRL', '0', '9000', '0', 7, 80, 'boite', '0', 'hhh', '2022-01-07', '2021-12-29 10:35:07', 'hh', 1, 'koffi@gmail.com', '2022-01-09 22:44:30', '2022-01-07 18:42:04'),
('2022-01-07 18:42:45', 'BQNIN', '0', '800', '0', 7, 90, 'boite', '0', 'rien', '2022-01-07', '2021-12-29 10:35:07', 'hh', 1, 'koffi@gmail.com', '2022-01-09 22:22:55', '2022-01-07 18:42:45'),
('2022-01-07 18:43:18', 'BORLOX', '0', '100', '0', 4, 111, 'boite', '0', 'ww', '2022-01-06', '2021-12-29 10:34:47', '4457', 1, 'koffi@gmail.com', '2022-01-09 22:55:21', '2022-01-07 18:43:18'),
('2022-01-07 18:43:46', 'BIMODM', '0', '4000', '0', 44, 40, 'boite', '0', 'kk', '2022-01-06', '2021-12-29 10:34:47', '4457', 1, 'koffi@gmail.com', '2022-01-09 22:55:04', '2022-01-07 18:43:46'),
('2022-01-07 18:44:17', 'BGVSCN', '0', '4444', '0', 44, 444, 'boite', '0', 'ff', '2022-01-07', '2021-12-29 10:34:47', '4457', 1, 'koffi@gmail.com', '2022-01-09 22:55:51', '2022-01-07 18:44:17'),
('2022-01-07 18:44:52', 'CIMODM', '0', '10000', '0', 1, 100, 'carton', '0', 'ee', '2022-01-07', '2021-12-29 10:34:47', '4457', 0, 'koffi@gmail.com', '2022-01-09 22:22:09', '2022-01-07 18:44:52'),
('2022-01-17 12:42:02', 'BAGMTIN', '0', '455', '0', 22, 40, 'carton', '0', 'bb', '2022-01-17', '2021-12-29 10:35:07', 'hh', 0, 'koffi@gmail.com', '2022-01-17 11:42:02', '2022-01-17 12:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `achatentrer`
--

CREATE TABLE `achatentrer` (
  `code` varchar(100) NOT NULL,
  `magasin` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `fournicode` varchar(100) NOT NULL,
  `libeller` text NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `numcomand` text NOT NULL,
  `numfacture` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matriculredacteur` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achatentrer`
--

INSERT INTO `achatentrer` (`code`, `magasin`, `reference`, `fournicode`, `libeller`, `tarif`, `numcomand`, `numfacture`, `timestamp`, `matriculredacteur`, `date`, `heure`, `lastmodification`) VALUES
('2021-12-30 20:39:28', 'MGS01', '', 'PE01', 'tt', '77', '2021-12-29 10:35:07', 'hh', '2021-12-30 19:39:28', 'gastron@gmail.com', '2021-12-30', '20:39:28', '2021-12-30 20:39:28'),
('2021-12-30 20:40:23', 'MGS01', 'hkgg', 'PE01', 'hhhiii', '555', '2021-12-29 10:34:47', '4457', '2021-12-30 19:40:23', 'gastron@gmail.com', '2021-12-30', '20:40:23', '2021-12-30 20:40:23'),
('2021-12-30 20:40:48', 'MGS01', 'kkk', 'PE01', 'hgjlvcffk', '666', '2021-12-29 10:33:13', '7778', '2021-12-30 19:40:48', 'gastron@gmail.com', '2021-12-30', '20:40:48', '2021-12-30 20:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `code` varchar(100) NOT NULL,
  `designation` text NOT NULL,
  `description` text NOT NULL,
  `poidsenkg` decimal(10,0) NOT NULL,
  `categorycode` varchar(100) NOT NULL,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `tmc` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(11,0) NOT NULL DEFAULT 0,
  `format` varchar(100) NOT NULL DEFAULT 'carton',
  `quantityperunit` int(11) NOT NULL DEFAULT 1,
  `matriculredacteur` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`code`, `designation`, `description`, `poidsenkg`, `categorycode`, `prixachat`, `tmc`, `prixvente`, `benefice`, `format`, `quantityperunit`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('BAGMTIN', 'Boite Augmentin 500mg ', 'Augmentin 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BANTRN', 'Boite Antarene 500mg ', 'Antarene 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BDFGN', 'Boite Dafalgan 500mg ', 'Dafalgan 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BDLPN', 'Boite Doliprane 500mg ', 'Doliprane 500mg en boite ', '12', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BGVSCN', 'Boite Gaviscon 500mg ', 'Gaviscon 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BHLCDN', 'Boite Helicidine 500mg ', 'Helicidine 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BIMODM', 'Boite Imodium 500mg ', 'Imodium 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BLMLIN', 'Boite Lamaline 500mg ', 'Lamaline 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BLVTYRX', 'Boite Levothyrox 500mg ', 'Levothyrox 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BNSNX', 'Boite Nasonex 500mg ', 'Nasonex 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BNVQ', 'Boite Nivaqine 500mg ', 'Nivaqine 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BORLOX', 'Boite Orelox 500mg ', 'Orelox 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BPCML', 'Boite Paracetamol 500mg ', 'Du paracetamol 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BQNIN', 'Boite Quinine 500mg ', 'Quinine 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BRNOFMCIL', 'Boite Rhinofluimucil 500mg ', 'Rhinofluimucil 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BRVTRL', 'Boite Rivotril 500mg ', 'Rivotril 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('BSPSFN', 'Boite Spasfon 500mg ', 'Spasfon 500mg en boite ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CAGMTIN', 'Carton Augmentin 500mg ', 'Augmentin 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CANTRN', 'Carton Antarene 500mg ', 'Antarene 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CDFGN', 'Carton Dafalgan 500mg ', 'Dafalgan 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CDLPN', 'Carton Doliprane 500mg ', 'Doliprane 500mg en carton ', '9', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CEFRG', 'Carton Efferalgan 500mg X12boites', 'Efferalgant 500mg en carton ', '4', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CGVSCN', 'Carton Gaviscon 500mg ', 'Gaviscon 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CHLCDN', 'Carton Helicidine 500mg ', 'Helicidine 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CIMODM', 'Carton Imodium 500mg ', 'Imodium 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CLMLIN', 'Carton Lamaline 500mg ', 'Lamaline 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CLVTYRX', 'Carton Levothyrox 500mg ', 'Levothyrox 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CNSNX', 'Carton Nasonex 500mg ', 'Nasonex 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CNVQ', 'Carton Nivaqine 500mg ', 'Nivaqine 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CORLOX', 'Carton Orelox 500mg ', 'Orelox 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CPCML', 'Carton Paracetamol 500mg X12boites', 'Du paracetamol 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CQNIN', 'Carton Quinine 500mg ', 'Quinine 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CRNOFMCIL', 'Carton Rhinofluimucil 500mg ', 'Rhinofluimucil 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CRVTRL', 'Carton Rivotril 500mg ', 'Rivotril 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', ''),
('CSPSFN', 'Carton Spasfon 500mg ', 'Spasfon 500mg en carton ', '2', 'HF1', '0', '0', '0', '0', '', 1, '', '2021-12-15 12:11:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `bondecommandedb`
--

CREATE TABLE `bondecommandedb` (
  `code` varchar(100) NOT NULL,
  `libeller` text NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `magazincode` varchar(100) NOT NULL,
  `situation` varchar(50) NOT NULL DEFAULT 'EAVSI',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` date NOT NULL,
  `redacteurcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bondecommandedb`
--

INSERT INTO `bondecommandedb` (`code`, `libeller`, `tarif`, `magazincode`, `situation`, `timestamp`, `lastmodification`, `redacteurcode`) VALUES
('2021-12-29 09:17:42', 'dsfwf', '22', 'MGS01', 'EAVSI', '2021-12-29 08:18:00', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 09:18:18', 'dsfwf', '22', 'MGS01', 'EAVSI', '2021-12-29 08:18:22', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:17:57', 'dsfwf', '22', 'MGS01', 'EAVSI', '2021-12-29 09:18:00', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:18:08', 'dsfwf', '22', 'MGS01', 'EAVSI', '2021-12-29 09:18:11', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:22:54', 'dsfwfgg', '22', 'MGS01', 'EAVSI', '2021-12-29 09:23:02', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:32:17', 'six', '22', 'MGS01', 'EAVSI', '2021-12-30 18:55:47', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:32:26', 'sept', '22', 'MGS01', 'EAVSI', '2021-12-30 18:55:36', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:33:13', 'huit', '22', 'MGS01', 'EAVSI', '2021-12-30 18:55:23', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:34:47', 'neuf', '22', 'MGS01', 'EAVSI', '2021-12-30 18:55:14', '2021-12-29', 'ella@gmail.com'),
('2021-12-29 10:35:07', 'lastdernier', '22', 'MGS01', 'EAVSI', '2021-12-30 18:54:51', '2021-12-29', 'ella@gmail.com'),
('2022-02-07 20:13:59', 'gggggg', '7', 'MGS01', 'EAVSI', '2022-02-07 19:14:47', '2022-02-07', 'vsakouvogui@gmail.com'),
('2022-02-07 20:14:47', 'pppp', '99', 'MGS01', 'EAVSI', '2022-02-07 19:15:24', '2022-02-07', 'vsakouvogui@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categoritable`
--

CREATE TABLE `categoritable` (
  `code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `nom` varchar(100) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoritable`
--

INSERT INTO `categoritable` (`code`, `description`, `nom`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('Beb01', 'Pour Bebe', 'Bebe', '', '2021-12-15 12:38:39', ''),
('DROP42', 'Pour les dropanositaires', 'Dropa', 'gastron@gmail.com', '2022-02-02 13:02:57', '2022-02-02 14:02:57'),
('ENF', 'Pour enfant', 'Enfant', '', '2021-12-15 12:38:39', ''),
('Fem01', 'Pour Femme', 'Femme', '', '2021-12-15 12:38:39', ''),
('HF1', 'Pour Homme et Femme', 'Homme&Femme', '', '2021-12-15 12:38:39', ''),
('Hom1', 'Pour Homme Seulement', 'Homme', 'gastron@gmail.com', '2021-12-15 12:38:39', '2022-02-02 13:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'tiyf', 'fftif'),
(2, 'tttriroweq', 'fqef;jb qbq;'),
(3, 'jjjj', 'kkkk'),
(4, 'oooo', 'pppp;jb qbq;'),
(5, 'nnnn', 'mmmm'),
(6, 'llll', 'dddd;jb qbq;');

-- --------------------------------------------------------

--
-- Table structure for table `cmuentrer`
--

CREATE TABLE `cmuentrer` (
  `code` varchar(100) NOT NULL,
  `codesortimagasin` varchar(100) NOT NULL,
  `codearticle` varchar(100) NOT NULL,
  `situationcode` varchar(100) NOT NULL,
  `quantityperunit` int(11) NOT NULL DEFAULT 0,
  `previousqty` int(11) NOT NULL DEFAULT 0,
  `currentqty` int(11) NOT NULL DEFAULT 0,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `taxe` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cmuentrer`
--

INSERT INTO `cmuentrer` (`code`, `codesortimagasin`, `codearticle`, `situationcode`, `quantityperunit`, `previousqty`, `currentqty`, `prixachat`, `taxe`, `prixvente`, `benefice`, `date`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('2022-02-05 17:43:59', '2021-12-30 21:09:31', 'BDFGN', 'EXPD1AS', 333, 0, 0, '33', '2', '2', '31', '2022-02-23', 'vsakouvogui@gmail.com', '2022-02-05 16:43:59', '2022-02-05 17:43:59'),
('2022-02-05 19:44:24', '2021-12-30 21:09:31', 'BLMLIN', 'EXPD1AS', 55, 0, 0, '555', '7', '9000', '8445', '2022-02-24', 'vsakouvogui@gmail.com', '2022-02-09 09:36:06', '2022-02-05 19:44:24'),
('2022-02-05 19:51:04', '2021-12-30 21:09:31', 'BNSNX', 'EXPD1MS', 44, 0, 0, '500', '30', '600', '100', '2022-02-19', 'vsakouvogui@gmail.com', '2022-02-09 09:36:06', '2022-02-05 19:51:04'),
('2022-02-05 20:10:07', '2021-12-30 21:09:31', 'BIMODM', 'PRM01', 5, 0, 0, '11', '11', '12', '1', '2022-11-11', 'vsakouvogui@gmail.com', '2022-02-09 09:36:06', '2022-02-05 20:10:07'),
('2022-02-05 20:13:37', '2021-12-30 21:09:31', 'BRNOFMCIL', 'EXPD1AS', 7, 0, 0, '88', '9', '90', '2', '2022-02-05', 'vsakouvogui@gmail.com', '2022-02-09 09:36:06', '2022-02-05 20:13:37'),
('2022-02-06 00:03:14', '2021-12-30 21:09:31', 'CSPSFN', 'EXPD2MS', 44, 0, 0, '200', '3', '300', '100', '2022-02-05', 'vsakouvogui@gmail.com', '2022-02-09 09:36:06', '2022-02-06 00:03:14'),
('2022-02-06 00:05:06', '2021-12-30 21:09:31', 'CHLCDN', 'EXPD1AS', 200, 0, 0, '2222', '3', '3000', '778', '2022-02-05', 'vsakouvogui@gmail.com', '2022-02-09 09:36:06', '2022-02-06 00:05:06'),
('2022-02-06 00:36:59', '2021-12-30 21:09:31', 'BPCML', 'EXPD1AS', 44, 0, 0, '500', '9', '4000', '3500', '2022-02-05', 'vsakouvogui@gmail.com', '2022-02-05 23:36:59', '2022-02-06 00:36:59'),
('2022-02-07 20:03:30', '2021-12-30 21:09:31', 'BNVQ', 'EXPD2MS', 55, 0, 55, '1200', '5', '2000', '800', '2022-02-08', 'vsakouvogui@gmail.com', '2022-02-07 19:03:30', '2022-02-07 20:03:30'),
('2022-02-07 20:06:21', '2021-12-30 21:09:31', 'BORLOX', 'EXPD1AS', 55, 0, 55, '300', '3', '400', '100', '2022-02-08', 'vsakouvogui@gmail.com', '2022-02-07 19:06:21', '2022-02-07 20:06:21'),
('2022-02-07 20:20:12', '2022-02-07 20:17:16', 'CHLCDN', 'EXPD1AS', 60, 89, 149, '500', '6', '600', '100', '2022-02-08', 'vsakouvogui@gmail.com', '2022-02-07 19:20:12', '2022-02-07 20:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `cmusorti`
--

CREATE TABLE `cmusorti` (
  `code` varchar(100) NOT NULL,
  `codearticle` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `previousqty` int(11) NOT NULL DEFAULT 0,
  `currentqty` int(11) NOT NULL DEFAULT 0,
  `prixachat` decimal(10,0) NOT NULL DEFAULT 0,
  `prixvente` decimal(10,0) NOT NULL DEFAULT 0,
  `taxe` decimal(10,0) NOT NULL DEFAULT 0,
  `benefice` decimal(10,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `numerofacture` varchar(100) NOT NULL DEFAULT 'nofacture',
  `situationcode` varchar(100) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cmusorti`
--

INSERT INTO `cmusorti` (`code`, `codearticle`, `quantity`, `previousqty`, `currentqty`, `prixachat`, `prixvente`, `taxe`, `benefice`, `date`, `numerofacture`, `situationcode`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('2022-02-06 00:50:01', 'BAGMTIN', 4, 0, 0, '0', '0', '0', '100', '2022-02-05', '4457', 'EXPD1AS', 'vsakouvogui@gmail.com', '2022-02-09 22:13:05', '2022-02-06 00:50:01'),
('2022-02-06 02:07:12', 'CHLCDN', 100, 0, 0, '0', '0', '0', '200', '2022-02-06', '5', 'EXPD1AS', 'vsakouvogui@gmail.com', '2022-02-09 22:14:20', '2022-02-06 02:07:12'),
('2022-02-06 02:16:59', 'CHLCDN', 100, 0, 0, '0', '0', '0', '200', '2022-02-06', '555', 'EXPD1AS', 'vsakouvogui@gmail.com', '2022-02-09 22:14:20', '2022-02-06 02:16:59'),
('2022-02-07 20:10:54', 'CHLCDN', 5, 100, 95, '0', '0', '0', '200', '2022-02-08', '8559', 'EXPD1AS', 'vsakouvogui@gmail.com', '2022-02-09 22:14:20', '2022-02-07 20:10:54'),
('2022-02-07 20:11:37', 'CHLCDN', 6, 95, 89, '0', '0', '0', '200', '2022-02-08', '838', 'EXPD1AS', 'vsakouvogui@gmail.com', '2022-02-09 22:14:20', '2022-02-07 20:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `cmustock`
--

CREATE TABLE `cmustock` (
  `code` varchar(100) NOT NULL,
  `codearticle` varchar(100) NOT NULL,
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
-- Dumping data for table `cmustock`
--

INSERT INTO `cmustock` (`code`, `codearticle`, `quantity`, `quantityreal`, `prixachat`, `prixvente`, `benefice`, `matriculredacteur`, `lastmodification`, `date`, `timestamp`) VALUES
('36382', 'BORLOX', 55, 0, 300, 400, 100, 'vsakouvogui@gmail.com', '2022-02-07 20:06:21', '2022-02-08', '2022-02-09 09:56:41'),
('39813', 'CHLCDN', 149, 0, 500, 600, 100, 'vsakouvogui@gmail.com', '2022-02-06 00:05:06', '2022-02-05', '2022-02-09 09:58:29'),
('46924', 'CSPSFN', 44, 0, 200, 300, 100, 'vsakouvogui@gmail.com', '2022-02-06 00:03:14', '2022-02-05', '2022-02-09 09:59:13'),
('47043', 'BPCML', 44, 0, 500, 400, 3500, 'vsakouvogui@gmail.com', '2022-02-06 00:36:59', '2022-02-05', '2022-02-09 09:57:32'),
('74476', 'BNVQ', 55, 0, 1200, 2000, 800, 'vsakouvogui@gmail.com', '2022-02-07 20:03:30', '2022-02-08', '2022-02-09 09:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`code`, `nom`, `description`, `timestamp`) VALUES
('Boite01', 'Boite', 'Boite de 12 unité', '2021-12-15 18:58:11'),
('CRTN01', 'Carton', 'Carton de 100 unité', '2021-12-15 18:56:51'),
('DTAIL01', 'Détail', '', '2021-12-15 18:58:11'),
('PLQ01', 'Plaquette', 'Plaquette de médicament', '2021-12-15 20:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurdb`
--

CREATE TABLE `fournisseurdb` (
  `nom` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `plusinfo` text NOT NULL,
  `code` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matriculredacteur` text NOT NULL,
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseurdb`
--

INSERT INTO `fournisseurdb` (`nom`, `tel`, `email`, `location`, `plusinfo`, `code`, `timestamp`, `matriculredacteur`, `lastmodification`) VALUES
('La Gloire De Dieu', '91002344', 'lagloire@gmail.com', 'Togoudo  ', ' rien ok', 'LGDD43', '2022-02-02 12:59:05', 'gastron@gmail.com', '2022-02-02 13:59:05'),
('La Phar des Etoile', '+229656565', 'pharetoile@gmail.com', ' Etoile Rouge', ' rien', 'PE01', '2022-02-01 09:38:29', 'gastron@gmail.com', '2022-02-01 10:38:29'),
('Pk10 urgence rapide', '+2295443322', 'pk10urgrpid@gmail.com', 'Pk10', 'fast and reliable', 'PURE77', '2022-02-02 11:48:36', 'gastron@gmail.com', '2022-02-02 12:48:36'),
('Reine des glaces', '50994433', 'info@reineglace.com', 'Akassato ', ' nothing', 'RDGS24', '2022-02-02 12:59:18', 'gastron@gmail.com', '2022-02-02 13:59:18'),
('Le Rendez vous de la santé', '+229656521', 'rendvs@gmail.com', ' pahou-Benin   ', 'bon service', 'RS01', '2022-02-02 11:52:09', 'gastron@gmail.com', '2022-02-02 12:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `inventairetable`
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
-- Table structure for table `magasintable`
--

CREATE TABLE `magasintable` (
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `plusinfo` text NOT NULL,
  `lastmodification` text NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magasintable`
--

INSERT INTO `magasintable` (`code`, `nom`, `plusinfo`, `lastmodification`, `matriculredacteur`, `timestamp`) VALUES
('MGS01', 'Magasin Clinic ', 'Magasin de la clinique', '', '', '2021-12-15 18:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`code`, `nom`, `description`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('CMU01', 'CMU-Pharmacie', 'Centre de Medicament d\'Urgence', '', '2021-12-15 18:42:06', ''),
('CONSLT01', 'Consultation', '', '', '2021-12-15 18:43:35', ''),
('HOSP01', 'Hospitalisation', '', '', '2021-12-15 18:42:06', ''),
('INTV', 'Intervention', '', '', '2021-12-15 18:43:35', ''),
('SIC01', 'Stockage Interne', 'Stockage Interne de la clinique ', '', '2021-12-27 16:09:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `body`, `author`) VALUES
(1, 2, 'bcdksb', 'ccbsdih\r\njbc ew.jcwehfiew,ddbdiwe', 'deeuuweiyw'),
(2, 1, 'dbhsvboe', 'dewdbiew bdbipb', 'dbhfiw'),
(3, 2, 'bcdksb', 'ccbsdih\r\njbc ew.jcwehfiew,ddbdiwe', 'deeuuweiyw'),
(4, 3, 'dbhsvboe', 'dewdbiew bdbipb', 'dbhfiw');

-- --------------------------------------------------------

--
-- Table structure for table `situation`
--

CREATE TABLE `situation` (
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `modulecode` varchar(100) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `situation`
--

INSERT INTO `situation` (`code`, `nom`, `description`, `modulecode`, `matriculredacteur`) VALUES
('CVSI', 'Commande Validé', 'Validation de la Commande faîte', 'SIC01', ''),
('EAVSI', 'En Attente', 'En Attente de validation', 'SIC01', ''),
('EXPD1AS', 'Expire Dans 1 An', 'A vite écouler', 'CMU01', ''),
('EXPD1MS', 'Expire Dans 1 Mois', 'A vite écouler', 'CMU01', ''),
('EXPD2MS', 'Expire Dans 3 Mois', 'A vite écouler', 'CMU01', ''),
('EXPD6MS', 'Expire Dans 6 Mois', 'A  écouler', 'CMU01', ''),
('PRM01', 'Périmé', 'A jeter', 'CMU01', '');

-- --------------------------------------------------------

--
-- Table structure for table `sortidetailmagasin`
--

CREATE TABLE `sortidetailmagasin` (
  `code` varchar(100) NOT NULL,
  `codesorti` varchar(100) NOT NULL,
  `codearticle` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `format` varchar(100) NOT NULL DEFAULT 'carton',
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` varchar(100) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sortidetailmagasin`
--

INSERT INTO `sortidetailmagasin` (`code`, `codesorti`, `codearticle`, `quantity`, `format`, `date`, `timestamp`, `lastmodification`, `matriculredacteur`) VALUES
('2022-01-01 20:58:45', '2021-12-30 21:09:31', 'BANTRN', 6, 'Boite01', '2021-12-31', '2022-01-01 19:58:45', '2022-01-01 20:58:45', 'gastron@gmail.com'),
('2022-01-01 20:59:01', '2021-12-30 21:09:31', 'BAGMTIN', 5, 'Boite01', '2022-01-01', '2022-01-01 19:59:01', '2022-01-01 20:59:01', 'gastron@gmail.com'),
('2022-02-07 20:18:58', '2022-02-07 20:17:16', 'CHLCDN', 60, 'CRTN01', '2022-02-08', '2022-02-07 19:18:58', '2022-02-07 20:18:58', 'vsakouvogui@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sortimagasin`
--

CREATE TABLE `sortimagasin` (
  `code` varchar(100) NOT NULL,
  `magasin` varchar(100) NOT NULL,
  `libeller` text NOT NULL,
  `modulecode` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sortimagasin`
--

INSERT INTO `sortimagasin` (`code`, `magasin`, `libeller`, `modulecode`, `date`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('2021-12-30 21:09:31', 'MGS01', 'jjj', 'CMU01', '2021-12-30', 'gastron@gmail.com', '2021-12-30 20:09:31', '2021-12-30 21:09:31'),
('2022-02-07 20:17:16', 'MGS01', 'kjtttyuuu ggggghk', 'CMU01', '2022-02-08', 'vsakouvogui@gmail.com', '2022-02-07 19:17:16', '2022-02-07 20:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `stocktable`
--

CREATE TABLE `stocktable` (
  `codearticle` varchar(100) NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `poidsenkg` decimal(11,0) NOT NULL DEFAULT 0,
  `matriculredacteur` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastmodification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocktable`
--

INSERT INTO `stocktable` (`codearticle`, `quantity`, `poidsenkg`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('BAGMTIN', -5, '0', 'gastron@gmail.com', '2022-01-01 19:59:01', '2022-01-01 20:59:01'),
('BANTRN', -6, '0', 'gastron@gmail.com', '2022-01-01 19:58:45', '2022-01-01 20:58:45'),
('BGVSCN', 44, '0', 'gastron@gmail.com', '2022-01-09 22:55:51', '2022-01-09 23:55:51'),
('BIMODM', 44, '0', 'gastron@gmail.com', '2022-01-09 22:55:04', '2022-01-09 23:55:04'),
('BLMLIN', 66, '0', 'gastron@gmail.com', '2022-01-09 22:44:18', '2022-01-09 23:41:33'),
('BORLOX', 4, '0', 'gastron@gmail.com', '2022-01-09 22:55:21', '2022-01-09 23:55:21'),
('BQNIN', 21, '0', 'gastron@gmail.com', '2022-01-09 22:26:11', '2022-01-09 23:22:55'),
('BRVTRL', 7, '0', 'gastron@gmail.com', '2022-01-09 22:44:30', '2022-01-09 23:44:30'),
('CANTRN', 2, '0', 'gastron@gmail.com', '2022-01-09 22:38:50', '2022-01-09 23:38:50'),
('CGVSCN', 4, '0', 'gastron@gmail.com', '2022-01-09 22:41:07', '2022-01-09 23:41:07'),
('CHLCDN', -60, '0', 'vsakouvogui@gmail.com', '2022-02-07 19:18:58', '2022-02-07 20:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `matricule` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `matriculredacteur` varchar(100) NOT NULL,
  `lastmodification` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`matricule`, `fullname`, `tel`, `email`, `position`, `role`, `matriculredacteur`, `lastmodification`, `timestamp`) VALUES
('22334412', 'Rollanda Hountoukpe', '+229556622', 'rollanda@gmail.com', 'Gerant du Centre de Médicament d\'Urgence Matiné', 'Gerant CMU', '', '', '2021-12-15 12:50:41'),
('40118262', 'Vincent Sakouvogui', '+233558266583', 'vsakouvogui@gmail.com', 'Informaticien', 'SuperAdmin', '', '', '2021-12-15 12:50:41'),
('40128399', 'Pr Jean Leon Olory Togbe', '+2298888833', 'jeanleon@gmail.com', 'Chirugien', 'Admin', '', '', '2021-12-15 12:50:41'),
('49554433', 'Koffi', '+222554433', 'koffi@gmail.com', 'Coursier', 'Coursier', '', '', '2021-12-15 12:50:41'),
('52331133', 'Ella', '+2335546667', 'ella@gmail.com', 'Comptable', 'Comptable', '', '', '2021-12-15 12:50:41'),
('98873322', 'Alpha', '+29944444490', 'alpha@gmail.com', 'Gerant du Centre de Médicament d\'Urgence Soiré', 'Gerant CMU', '', '', '2021-12-15 12:50:41'),
('98887766', 'Gastron', '+66557788', 'gastron@gmail.com', 'Gestionnaire de Stock', 'Gestionnaire de Stock', '', '', '2021-12-15 12:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `usersloginfo`
--

CREATE TABLE `usersloginfo` (
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `matriculredacteur` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastmodification` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersloginfo`
--

INSERT INTO `usersloginfo` (`email`, `password`, `matriculredacteur`, `timestamp`, `lastmodification`) VALUES
('ella@gmail.com', '3f5eb5182f079a45fe712be24359545e', NULL, '2021-12-27 18:19:21', NULL),
('gastron@gmail.com', '9d735349b834c87b8e5f6013ce91e016', '', '2021-12-15 12:48:10', ''),
('koffi@gmail.com', '79b89fc21c4e9b2beac6d2ad03ec2cc9', '', '2021-12-15 12:48:10', ''),
('vsakouvogui@gmail.com', '8fd6f5461b5f7b910149a60505957a17', NULL, '2022-02-04 23:44:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achatcoursier`
--
ALTER TABLE `achatcoursier`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `achatentrer`
--
ALTER TABLE `achatentrer`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `bondecommandedb`
--
ALTER TABLE `bondecommandedb`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `categoritable`
--
ALTER TABLE `categoritable`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `cmuentrer`
--
ALTER TABLE `cmuentrer`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `cmusorti`
--
ALTER TABLE `cmusorti`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `cmustock`
--
ALTER TABLE `cmustock`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `fournisseurdb`
--
ALTER TABLE `fournisseurdb`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `magasintable`
--
ALTER TABLE `magasintable`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situation`
--
ALTER TABLE `situation`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `sortidetailmagasin`
--
ALTER TABLE `sortidetailmagasin`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `sortimagasin`
--
ALTER TABLE `sortimagasin`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `stocktable`
--
ALTER TABLE `stocktable`
  ADD PRIMARY KEY (`codearticle`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `usersloginfo`
--
ALTER TABLE `usersloginfo`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
