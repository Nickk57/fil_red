-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 avr. 2023 à 14:21
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
  `name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `first_name`, `email`, `password`) VALUES
(1, 'guichard', 'nicolas', 'Nickk57410@gmail.com', '$2y$10$qzJ5GPdOh4LX9WMy0PFFl.U4x1i/JVZ.NOpo7yfs8Lx9RDmTrTLre');

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `commande` int(11) DEFAULT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(5, 'matériel'),
(7, 'café');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `address` text,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `kind_grind`
--

DROP TABLE IF EXISTS `kind_grind`;
CREATE TABLE IF NOT EXISTS `kind_grind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `id_picture` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_picture` (`id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kind_grind`
--

INSERT INTO `kind_grind` (`id`, `name`, `id_picture`) VALUES
(1, 'Grain', 5),
(2, 'Piston', 7),
(3, 'Filtre', 4),
(4, 'Italienne', 6),
(5, 'Espresso', 3);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `name_product` varchar(50) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `commentary` text,
  `id_weight` int(11) DEFAULT NULL,
  `name_weight` varchar(50) DEFAULT NULL,
  `id_grind` int(11) DEFAULT NULL,
  `name_grind` varchar(50) DEFAULT NULL,
  `id_customers` int(11) DEFAULT NULL,
  `name_customers` varchar(50) DEFAULT NULL,
  `first_name_customers` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `name`, `path`) VALUES
(1, 'Grain', 'uploads/sticker-grains-de-cafe.jpg'),
(2, 'café', 'uploads/Blog_Sachetdecafe4_1-1g_1000x_2x_e051de1a-18a0-4d58-8993-b0994bc3c90e_1000x.webp'),
(3, 'Espresso icon', 'uploads/icon espresso.svg'),
(4, 'Filtre icon', 'uploads/icon filter.svg'),
(5, 'Grain icon', 'uploads/icon grain.svg'),
(6, 'Italian icon', 'uploads/icon italian.svg'),
(7, 'Piston icon', 'uploads/icon piston.svg'),
(14, 'café 2', 'uploads/Blog_Sachetdecafe4_1-1g_1000x_2x_e051de1a-18a0-4d58-8993-b0994bc3c90e_1000x.webp');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `characteristic` text,
  `id_weight` int(11) DEFAULT NULL,
  `id_grind` int(11) DEFAULT NULL,
  `id_ss_category` int(11) DEFAULT NULL,
  `id_picture` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_weight` (`id_weight`),
  KEY `id_grind` (`id_grind`),
  KEY `id_ss_category` (`id_ss_category`),
  KEY `id_photo` (`id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `characteristic`, `id_weight`, `id_grind`, `id_ss_category`, `id_picture`) VALUES
(1, 'La pantoufle', 'Le Café Confort par excellence ! Imaginez vous en train de vous réveiller avec l’odeur d’un café fraichement moulu tandis que votre chat vous apporte délicatement vos pantoufles aux pieds du lit… La Pantoufle, aux notes d’amande et de chocolat est ce genre d’idéal. Il est temps d’en profiter !  Il se boit : en peignoir', '15,00', '', NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `product_weight`
--

DROP TABLE IF EXISTS `product_weight`;
CREATE TABLE IF NOT EXISTS `product_weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_weight`
--

INSERT INTO `product_weight` (`id`, `name`) VALUES
(1, '250g'),
(2, '1kg'),
(3, '5kg'),
(4, '500g');

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `chemin_picture` text,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_category_ibfk_1` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `chemin_picture`, `id_category`) VALUES
(1, 'Cafetière', NULL, NULL),
(2, 'Café', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `kind_grind`
--
ALTER TABLE `kind_grind`
  ADD CONSTRAINT `kind_grind_ibfk_1` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_weight`) REFERENCES `product_weight` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_grind`) REFERENCES `kind_grind` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_ss_category`) REFERENCES `sub_category` (`id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`id`);

--
-- Contraintes pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
