-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 fév. 2023 à 12:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fil_red`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'guichard', 'nicolas', 'guichard.nicolas57@gmail.com', '$2y$10$6M99caztBxCIdYYl6yl5NeHfTVMVNq9UF6aIt6IXJkozRo9lGCX5O'),
(2, 'guichard', 'nicolas', 'Nickk57410@gmail.com', '$2y$10$PAIrvgVWNw.qceOo/COVYOeLG6Vex/2WdvjnAykpBNKH5qXmRfPZi');

-- --------------------------------------------------------

--
-- Structure de la table `ass_photo`
--

DROP TABLE IF EXISTS `ass_photo`;
CREATE TABLE IF NOT EXISTS `ass_photo` (
  `Id_product` int(11) NOT NULL,
  `Id_photo` int(11) NOT NULL,
  PRIMARY KEY (`Id_product`,`Id_photo`),
  KEY `Id_photo` (`Id_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `comment` text,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`) VALUES
(1, 'café');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` text,
  `code_postal` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `téléphone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `estimate`
--

DROP TABLE IF EXISTS `estimate`;
CREATE TABLE IF NOT EXISTS `estimate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_client` varchar(50) DEFAULT NULL,
  `produit` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` text,
  `caracteristique` text,
  `id_panier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_panier` (`id_panier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `kind_grind`
--

DROP TABLE IF EXISTS `kind_grind`;
CREATE TABLE IF NOT EXISTS `kind_grind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `Id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_product` (`Id_product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) DEFAULT NULL,
  `nom_produit` varchar(50) DEFAULT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `comment` text,
  `id_weight` int(11) DEFAULT NULL,
  `nom_poid` varchar(50) DEFAULT NULL,
  `id_grind` int(11) DEFAULT NULL,
  `nom_mouture` varchar(50) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom__client` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` text,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `description` text,
  `prix` decimal(15,2) DEFAULT NULL,
  `caracteristique` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product_weight`
--

DROP TABLE IF EXISTS `product_weight`;
CREATE TABLE IF NOT EXISTS `product_weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poid` decimal(15,2) DEFAULT NULL,
  `Id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_product` (`Id_product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `Id_photo` int(11) NOT NULL,
  `Id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_photo` (`Id_photo`),
  KEY `Id_product` (`Id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
