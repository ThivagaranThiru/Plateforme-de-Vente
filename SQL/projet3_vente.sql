-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Avril 2016 à 18:54
-- Version du serveur :  5.7.9
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3_vente`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `catid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`catid`, `nom`) VALUES
(1, 'auto'),
(2, 'electroménager'),
(3, 'jeux'),
(4, 'informatique'),
(5, 'telephone'),
(6, 'livre'),
(7, 'musique'),
(8, 'sport'),
(9, 'maison'),
(10, 'art');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `cmdid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `fournid` int(11) NOT NULL,
  `statut` enum('en_cours','acceptee','refusee') NOT NULL DEFAULT 'en_cours',
  PRIMARY KEY (`cmdid`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`cmdid`, `pid`, `fournid`, `statut`) VALUES
(113, 158, 1, 'refusee'),
(112, 159, 2, 'en_cours'),
(111, 160, 1, 'acceptee');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`prodid`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`pid`, `prodid`, `userid`, `qte`) VALUES
(163, 2, 3, 12),
(162, 16, 3, 12),
(161, 14, 3, 201),
(160, 6, 3, 120),
(159, 13, 3, 12),
(158, 5, 3, 100);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `prodid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` float NOT NULL,
  `catid` int(11) NOT NULL,
  `fournid` int(11) NOT NULL,
  PRIMARY KEY (`prodid`)
) ENGINE=MyISAM AUTO_INCREMENT=56986 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`prodid`, `nom`, `description`, `qte`, `prix`, `catid`, `fournid`) VALUES
(2, 'Frigo Samsung T9000 LCD', 'Ecran tactile', 88, 899, 2, 1),
(4, 'ASUS', 'ntel Core i7-4700MQ 6 Go 1 To 15.6" LED', 50, 563, 4, 1),
(5, 'Iphone', 'Iphone6s', 400, 599, 5, 1),
(6, 'onepunchman', 'manga', 396, 19, 6, 1),
(7, 'Diamonds', 'Diamonds est le premier single extrait de son septième album de Rihana', 20, 10, 7, 1),
(8, 'velo', '2 roue, 6 vitesse', 1556, 40, 8, 1),
(9, 'canape', '6 places', 69, 199, 9, 1),
(11, 'Mercedes', 'Classe C \r\nBerline', 1513, 20000, 1, 2),
(12, 'lave linge', 'Whirlpool · Frontal · 9 kg', 226, 299, 2, 2),
(13, 'Xbox', 'console, hdmi,4 manettes', 144, 399, 3, 2),
(14, 'alienware', '4 coeurs, clavier sans fil, souris sans fil', 286, 1099, 4, 2),
(15, 'samsung', 'galaxy s6', 471, 499, 5, 2),
(16, 'onepeice', 'manga', 35, 15, 6, 2),
(17, 'tupac', 'Ce disque symbolise le clash définitif entre les rappeurs des deux rives Est et Ouest américaines', 263, 13, 7, 2),
(18, 'gants', 'boxe', 890, 13, 8, 2),
(19, 'chaise', '4 chaises', 263, 12, 9, 2),
(20, 'penseur de rodin', 'statue', 156, 1565960, 10, 2),
(10, 'Joconde', 'auteur : picasso', 123, 1555, 10, 1),
(1, 'BMW X6', 'essence,  4x4 , Version luxe', 251, 50000, 1, 1),
(3, 'PS4', 'console, 2 manettes,hdmi', 784, 399, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `societe` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` char(41) NOT NULL,
  `type` enum('fournisseur','client') NOT NULL DEFAULT 'client',
  PRIMARY KEY (`userid`),
  KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userid`, `nom`, `prenom`, `societe`, `email`, `login`, `mdp`, `type`) VALUES
(4, 'zinidine', 'zidane', 'footballeur', 'zidane@hotmail.fr', 'zidane', 'zidane', 'client'),
(3, 'messi', 'lionel', 'barcelone', 'messi@hotmail.fr', 'messi', 'messi', 'client'),
(2, 'cristiano', 'ronaldo', 'real madrid', 'ronaldo@gmail.com', 'ronaldo', 'ronaldo', 'fournisseur'),
(1, 'thiruchelvam', 'thivagaran', 'apple', 'thiva@hotmail.fr', 'thiva', 'thiva', 'fournisseur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
