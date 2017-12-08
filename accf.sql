-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 déc. 2017 à 16:11
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `accf`
--

-- --------------------------------------------------------

--
-- Structure de la table `agencies`
--

CREATE TABLE `agencies` (
  `id_agency` int(8) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` enum('Ile-de-France','Rhône-Alpes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(8) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `billto_address` varchar(255) NOT NULL,
  `billto_zipcode` varchar(255) NOT NULL,
  `billto_city` varchar(255) NOT NULL,
  `shipto_address` varchar(255) NOT NULL,
  `shipto_zipcode` varchar(255) NOT NULL,
  `shipto_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(8) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `id_agency` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(8) NOT NULL,
  `id_customer` int(8) NOT NULL,
  `id_product` int(8) DEFAULT NULL,
  `id_service` int(8) DEFAULT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_product` int(8) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `product_main_category` enum('Dispositifs anti-intrusion','Dispositifs anti-incendie','Dispositifs de prévention médicale') NOT NULL,
  `product_sub_category` enum('Alarmes','Appel Malade','Contrôle d''accès','Désenfumage','Détection des chutes','Détection incendie','Eclairage de sécurité','Vidéo-surveillance') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price_vat_excluded` float NOT NULL,
  `price_vat_included` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_service` int(8) NOT NULL,
  `title` enum('Contrat de maintenance','Etude technique','Formation','Mise en service') NOT NULL,
  `description` mediumtext NOT NULL,
  `price_vat_excluded` float NOT NULL,
  `price_vat_included` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `standards`
--

CREATE TABLE `standards` (
  `id_standard` int(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `id_employee` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id_agency`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `agency` (`id_agency`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id_standard`),
  ADD KEY `id_employee` (`id_employee`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id_agency` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `standards`
--
ALTER TABLE `standards`
  MODIFY `id_standard` int(8) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_agency`) REFERENCES `agencies` (`id_agency`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Contraintes pour la table `standards`
--
ALTER TABLE `standards`
  ADD CONSTRAINT `standards_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
