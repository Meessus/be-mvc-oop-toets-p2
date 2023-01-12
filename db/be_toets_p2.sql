-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2023 at 10:15 PM
-- Server version: 5.7.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be_toets_p2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auto`
--

DROP TABLE IF EXISTS `Auto`;
CREATE TABLE IF NOT EXISTS `Auto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(8) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `InstructeurId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `AutoInstructeur` (`InstructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Auto`
--

INSERT INTO `Auto` (`Id`, `Kenteken`, `Type`, `InstructeurId`) VALUES
(1, 'AU-67-IO', 'Golf', 3),
(2, 'TH-78-KL', 'Ferrari', 2),
(3, '90-KL-TR', 'Fiat 500', 4),
(4, 'YY-OP-78', 'Mercedes', 5),
(5, 'ST-FZ-28', 'Citroën', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CapitalCity` varchar(100) NOT NULL,
  `Continent` enum('Noord-Amerika','Zuid-Amerika','Afrika','Oceani&euml;','Europa','Azi&euml;','Antartica') NOT NULL,
  `Population` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Name`, `CapitalCity`, `Continent`, `Population`) VALUES
(5, 'The Netherlands', 'Amsterdam', 'Europa', 18000000),
(6, 'Japan', 'Tokyo', 'Azi&euml;', 200000000),
(7, 'Curryland', 'Ketchup', 'Europa', 101);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CapitalCity` varchar(100) NOT NULL,
  `Continent` varchar(100) NOT NULL,
  `Population` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Instructeur`
--

DROP TABLE IF EXISTS `Instructeur`;
CREATE TABLE IF NOT EXISTS `Instructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructeur`
--

INSERT INTO `Instructeur` (`Id`, `Email`, `Naam`) VALUES
(1, 'groen@gmail.com', 'Groen'),
(2, 'manhoi@google.com', 'Manhoi'),
(3, 'zoyi@gmail.com', 'Zoyi'),
(4, 'berthold@gmail.com', 'Berthold'),
(5, 'denekamp@gmail.com', 'Denekamp');

-- --------------------------------------------------------

--
-- Table structure for table `Leerling`
--

DROP TABLE IF EXISTS `Leerling`;
CREATE TABLE IF NOT EXISTS `Leerling` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Leerling`
--

INSERT INTO `Leerling` (`Id`, `Naam`) VALUES
(3, 'Konijn'),
(4, 'Slavink'),
(6, 'Otto');

-- --------------------------------------------------------

--
-- Table structure for table `Les`
--

DROP TABLE IF EXISTS `Les`;
CREATE TABLE IF NOT EXISTS `Les` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` datetime NOT NULL,
  `LeerlingId` int(11) DEFAULT NULL,
  `InstructeurId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `LesInstructeur` (`InstructeurId`),
  KEY `LesLeerling` (`LeerlingId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Les`
--

INSERT INTO `Les` (`Id`, `Datum`, `LeerlingId`, `InstructeurId`) VALUES
(45, '2022-05-20 00:00:00', 3, 1),
(46, '2022-05-20 00:00:00', 6, 3),
(47, '2022-05-21 00:00:00', 4, 2),
(48, '2022-05-21 00:00:00', 6, 3),
(49, '2022-05-22 00:00:00', 3, 1),
(50, '2022-05-28 00:00:00', 4, 2),
(51, '2022-06-01 00:00:00', 3, 2),
(52, '2022-06-12 00:00:00', 3, 1),
(53, '2022-06-22 00:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Mankement`
--

DROP TABLE IF EXISTS `Mankement`;
CREATE TABLE IF NOT EXISTS `Mankement` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AutoId` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Mankement` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Mankement`
--

INSERT INTO `Mankement` (`Id`, `AutoId`, `Datum`, `Mankement`) VALUES
(28, 3, '2023-01-12', 'Lekke band'),
(29, 3, '2023-01-12', 'Voorruit kapot'),
(30, 3, '2023-01-12', 'Auto Abused'),
(31, 2, '2023-01-12', 'Linkerachterband lek'),
(32, 2, '2023-01-12', 'Auto ruikt naar kaas'),
(33, 2, '2023-01-12', 'Auto start traag op'),
(34, 2, '2023-01-04', 'Profiel rechterband minder dan 2 mm'),
(35, 2, '2023-01-02', 'Rechter achterlicht kapot'),
(36, 2, '2023-01-02', 'Spiegel links afgebroken'),
(37, 2, '2023-01-06', 'Bumper rechtsachter ingedeukt'),
(38, 2, '2023-01-08', 'Radio kapot'),
(39, 2, '2023-01-13', 'De kippeboer heeft me aangereden');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Auto`
--
ALTER TABLE `Auto`
  ADD CONSTRAINT `AutoInstructeur` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Les`
--
ALTER TABLE `Les`
  ADD CONSTRAINT `LesInstructeur` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `LesLeerling` FOREIGN KEY (`LeerlingId`) REFERENCES `Leerling` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
