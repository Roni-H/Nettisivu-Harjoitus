-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21.04.2022 klo 09:47
-- Palvelimen versio: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lisatehtava`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `lomake`
--

DROP TABLE IF EXISTS `lomake`;
CREATE TABLE IF NOT EXISTS `lomake` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Paivamaara` date NOT NULL,
  `Kilometrit` int(11) NOT NULL,
  `Paastot` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `lomake`
--

INSERT INTO `lomake` (`ID`, `Paivamaara`, `Kilometrit`, `Paastot`) VALUES
(13, '2022-04-21', 66, 66),
(12, '2022-12-12', 12, 12),
(11, '1996-10-10', 100, 12),
(10, '1970-01-01', 147, 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
