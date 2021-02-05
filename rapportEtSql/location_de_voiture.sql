-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 fév. 2021 à 18:31
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location_de_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `adress_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `nom`, `tel`, `adress_ville`) VALUES
(1, 'lac-1', 50519122, 'rue1234lavenue'),
(2, 'Bejaoui-loc', 71452463, 'rue159-Marsa'),
(3, 'marssa agence', 56369784, 'marssa'),
(4, 'maria agence', 4578963, 'marssa'),
(6, 'voiture agence', 56321478, 'tunis');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_permis` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `n_permis`, `ville`, `tel`) VALUES
(1, 'Julia', 789, 'tunis', '78945612');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_depart` datetime NOT NULL,
  `date_retour` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6034999319EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `type`, `date_depart`, `date_retour`, `client_id`) VALUES
(1, '3265', '2021-01-27 16:46:07', '2021-01-31 16:46:08', 1),
(2, 'k', '2016-03-06 04:00:00', '2016-03-17 06:17:00', 1),
(3, 'b', '2017-02-11 03:00:00', '2017-02-18 09:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_facture` datetime NOT NULL,
  `montant` double NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `payee` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FE86641019EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date_facture`, `montant`, `client_id`, `payee`) VALUES
(1, '2016-01-01 00:00:00', 120.5, 1, 0),
(2, '2016-01-01 00:08:00', 1500, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20210114151924', '2021-01-14 15:20:18');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agence_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649D725330D` (`agence_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `agence_id`) VALUES
(1, 'bejaouinourhouda@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$RR9dmd13APh12NpjseG4GOzngA//5i5l8mCEAwDgtlksxAfm1XhkC', NULL),
(2, 'amalaissa@gmail.com', '[\"ROLE_USER\"]', '$2y$13$dYSoSG61nwv8ihzm/931OuGifzvCisvYWQWWck/WSBUadjWofqt2q', NULL),
(4, 'salwatahenti@gmail.com', '[\"ROLE_USER\"]', '$2y$13$3RoUWWsavgRkT/n5c/L/SOQVuOPag.bT3dsoXN5YmcNfhVOV/bVt.', NULL),
(5, 'mohamed.bejaoui@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$dLk5NI/fcBIVBDxqzqAvFuBVhuNN4jzt39aidiqAF4acvHGajDdoy', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carburant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_place` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_circulation` date NOT NULL,
  `agence_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `disponibilite` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E9E2810F12B2DC9C` (`matricule`),
  KEY `IDX_E9E2810FD725330D` (`agence_id`),
  KEY `IDX_E9E2810F19EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `matricule`, `marque`, `couleur`, `carburant`, `nbr_place`, `description`, `date_circulation`, `agence_id`, `client_id`, `disponibilite`) VALUES
(2, '11tu55', 'Audi', 'blanc', 'essence', 5, 'Voiture Luxe', '2021-01-28', 1, 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `FK_6034999319EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK_FE86641019EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `FK_E9E2810F19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_E9E2810FD725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
