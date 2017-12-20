-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 déc. 2017 à 11:53
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

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
  `area` enum('92','69') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agencies`
--

INSERT INTO `agencies` (`id_agency`, `address`, `zipcode`, `city`, `area`) VALUES
(1, '\r\n44, rue Jean Zay\r\n\r\n\r\n\r\n', '69800', 'Saint-Priest', ''),
(2, '\r\n165, bd de Valmy\r\n\r\n\r\n', '92700', ' Colombes', '');

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL,
  `picture_content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content_text` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `content`
--

INSERT INTO `content` (`id_content`, `picture_content`, `content_title`, `content_text`) VALUES
(1, 'luminox.jpg', 'ACCF, distributeur de materiel d\'eclairage de securite', 'ACCF a fait le choix de produits ouverts et fiables en distribuant la marque LUMINOX.\r\nLUMINOX, spécialiste en Eclairage de Securite depuis de nombreuses annees et toujours à la pointe de l\'innovation, a developpe des blocs autonomes d\'eclairage de securite performants tout en respectant l\'environnement.'),
(2, 'accf_alarme2.jpg', 'DETECTION INCENDIE', 'Basee sur un concept de produits ouverts , ACCF commercialise des marques à fortes notorietes, performantes et accessibles aux installateurs pour leurs maintenances. Nos techniciens forment et assistent nos clients pour le suivi de chantier, le PV de mise en service et la possibilite d\'effectuer les contrats de maintenance. Des Systemes de Securite Incendie (SSII), en reseaux Multi sites, Adressables, Conventionnels, avec ou sans CMSI, des marques avec des gammes completes, de la type 2a, 2b, 3 et 4, astucieuses, competitives et toujours ? la pointe.\r\n\r\n?CLAIRAGE DE S?CURIT?\r\nDes acteurs de premi?re importance nous accompagnent sur ce march?. Innovation, performance, design, nos gammes ?clairage de s?curit? couvrent l?ensemble des besoins.\r\n\r\nSONORISATION DE S?CURIT?\r\nDes gammes compl?tement adapt?es ? notre march?, avec des solutions fiables et technologiquement abouties.\r\n\r\nINTERPHONIE DE S?CURIT?\r\nDes produits fonctionnels en ad?quation avec les exigences des nouvelles normes.');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(8) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
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

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id_customer`, `firstname`, `lastname`, `email`, `phone`, `password`, `job`, `company`, `billto_address`, `billto_zipcode`, `billto_city`, `shipto_address`, `shipto_zipcode`, `shipto_city`) VALUES
(1, 'Joseph', 'Morsy', 'morsy@gmail.fr', '01-44-25-56-91', 'morsy1234', 'commercial', 'BSL Securite', '65 rue du Faubourg Saint-Honore', '75008', 'Paris', '65 rue du Faubourg Saint-Honore', '75008', 'Paris'),
(2, 'Alain', 'Sidfrolazy', 'sidfrolazy@gmail.fr', '06-45-47-25-95', 'sidfrolazy1234', 'Manager', 'Secutor Securite Privee', '4 Cite Joly ', '75011', 'Paris', '4 Cite Joly ', '75011', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(8) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `id_agency` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id_employee`, `firstname`, `lastname`, `email`, `phone`, `job`, `picture`, `role`, `id_agency`) VALUES
(1, 'Robert', 'Damien', 'damien@gmail.fr', '01-45-41-74-52', 'commercial', '3d-carte-identite-e1497601822220.jpg', 'membre', 1),
(2, 'Claire', 'Durand', 'durand@gmail.fr', '01-44-15-52-89', 'Securite informatique', 'identite-officielle.jpg', 'administrateur', 2);

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
  `product_main_category` enum('Dispositifs anti-intrusion','Dispositifs anti-incendie','Dispositifs de prevention medicale') NOT NULL,
  `product_sub_category` enum('Alarmes','Appel Malade','Controle d''acces','Desenfumage','Detection des chutes','Detection incendie','Eclairage de securite','Video-surveillance') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price_vat_excluded` float NOT NULL,
  `price_vat_included` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `manufacturer`, `product_main_category`, `product_sub_category`, `title`, `description`, `picture`, `price_vat_excluded`, `price_vat_included`) VALUES
(1, 'honeywell', 'Dispositifs de prevention medicale', 'Detection des chutes', 'co-assist', 'Une solution de detection automatique de chutes peut eviter une importante perte d’autonomie', 'detecteur_de_chute_V3.png', 60, 72),
(2, 'CDVI', 'Dispositifs anti-incendie', 'Desenfumage', 'Centrale de desenfumage LED et LCD', 'articulation du produit: Le faible encombrement du coffret permet de l\'installer dans les gaines techniques. Afficheur LCD avec localisation en clair des zones de detection en alarme ou en derangement et details sur la nature des differents changements d\'etat du systeme. La fiabilite de fonctionnement est accrue, grace au systeme BUS, meme en cas de defaillance de l\'un des BE, le reste de l\'installation reste operationnelle, et le defaut est signale sur l\'ecran LCD des que le retablissement de la ligne est realisee. La mise en service guidee pas a pas avec l\'ecran LCD. La maintenance et depannage simplifies pour du personnel non qualifie - Un diagnostic des pannes sur BE par LEDS et sur centrale par LCD / Caracteristiques principales : 32 étages sur un conduit ou 2 x 16 etages sur deux conduits. Configuration automatique, sans outil specifique. Fonctionnement autonome des boitiers d\'etage en cas de perte de liaison avec le tableau. Jusqu\'à 32 detecteurs automatiques maximum par boucle. Longueur maximum des boucles : 1 Km. Sorties surveillees permettant de commander le ou les organes de desenfumage avec une puissance disponible par Boitier d\'etage de 15W. Controle de position possible des volets de desenfumage. Source principale : 230 V +10% -15% 50 Hz maxi 0,5A. Source secondaire : 2 batteries plomb 12 V - 7 Ah. Tension de service : 20 à 26 V. Dimensions : 250 x 510 x 95 mm', 'P195062.jpg', 700.18, 840.22);

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

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `title`, `description`, `price_vat_excluded`, `price_vat_included`) VALUES
(1, 'Contrat de maintenance', 'Preventive, Curative, Corrective Interventions tous corps d\'état', 250, 300),
(2, 'Formation', 'FORMATION EQUIPIER DE PREMIERE INTERVENTION', 750, 900);

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
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

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
  MODIFY `id_agency` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
