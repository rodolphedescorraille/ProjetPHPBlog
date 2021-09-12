-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 sep. 2021 à 18:30
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `newblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `pict` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `pict`) VALUES
(67, 'test', '21', 'pict/613e40cb7ff8d'),
(68, 'test', 'yo', 'pict/613e426d27b73'),
(64, 'dwf', 'dwsfv', 'dswfv'),
(65, 'blits', 'no', ''),
(62, 'attend', 'euuuu', 'oui.'),
(61, 'hahahaha', 'ercz', '78'),
(56, 'test', 'dvqref', 'rsvf'),
(42, 'test', 'yo', 'hehe'),
(55, 'test', 'dvqref', 'rsvf'),
(44, 'test', 'qvfef', 'rsvf'),
(54, 'test', 'dvqref', 'rsvf'),
(53, 'test', 'dvqref', 'rsvf'),
(49, 'test', 'dfwg dg ', 'sg fd'),
(50, 'crzq', 'sertv', 'estrv'),
(60, 'test', 'hahahah', 'yt'),
(52, 'test', 'dvqref', 'rsvf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
