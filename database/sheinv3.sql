-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 30 déc. 2023 à 18:08
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sheinv3`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Iphone', 'phone', '2023-12-16 16:55:44', '2023-12-16 17:07:31', NULL),
(2, 'Macbook', 'laptop', '2023-12-16 16:59:04', '2023-12-30 16:42:10', NULL),
(3, 'Imac', 'pc-display-horizontal', '2023-12-30 16:42:31', NULL, NULL),
(4, 'air pods', 'earbuds', '2023-12-30 16:42:41', NULL, NULL),
(5, 'ipad', 'tablet', '2023-12-30 16:47:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hex_color` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'green', '#00ff00', '2023-12-23 17:34:23', '2023-12-30 16:41:03', NULL),
(2, 'red', '#ff0000', '2023-12-23 17:36:04', '2023-12-30 16:41:06', NULL),
(3, 'blue', '#0000ff', '2023-12-23 17:36:04', '2023-12-30 16:41:11', NULL),
(4, 'gold', '#FFD700', '2023-12-23 18:10:46', '2023-12-30 16:41:08', NULL),
(5, 'pink', '#FFC0CB', '2023-12-23 18:12:37', '2023-12-30 16:41:13', NULL),
(6, 'Black', '#000000', '2023-12-30 16:27:34', NULL, NULL),
(7, 'Yellow', '#ffff00', '2023-12-30 16:28:11', '2023-12-30 16:48:58', '2023-12-13 16:48:52');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT 0.00,
  `ancien_prix` decimal(10,2) DEFAULT 0.00,
  `quantite` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `reference`, `designation`, `description`, `prix`, `ancien_prix`, `quantite`, `image`, `couleur`, `categorie`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'R-01', 'Iphone 14 pro max blue 255 SSD', 'Iphone 14 pro max blue 255 SSD Iphone 14 pro max blue 255 SSD Iphone 14 pro max blue 255 SSD', 18000.00, 18500.00, 10, '1.jpg', 'blue', 'Iphone', '2023-12-30 16:37:58', '2023-12-30 16:37:58', NULL),
(2, 'R-02', 'Iphone 14 Pro Max 255 SSD gold', 'Iphone 14 Pro Max 255 SSD gold Iphone 14 Pro Max 255 SSD gold Iphone 14 Pro Max 255 SSD gold', 18000.00, 18500.00, 50, '2.jpg', 'gold', 'Iphone', '2023-12-30 17:01:51', '2023-12-30 17:01:51', NULL),
(3, 'R-03', 'Imac 24 Pouce 556 Go Pink', 'Imac 24 Pouce 556 Go Pink Imac 24 Pouce 556 Go Pink Imac 24 Pouce 556 Go Pink', 24000.00, 24500.00, 60, '3.jpg', 'pink', 'Imac', '2023-12-30 17:04:24', '2023-12-30 17:04:24', NULL),
(4, 'R-04', 'Imac 24 Pouce 556 Go Green', 'Imac 24 Pouce 556 Go Green Imac 24 Pouce 556 Go Green Imac 24 Pouce 556 Go Green ', 24000.00, 24500.00, 80, '7.jpg', 'green', 'Imac', '2023-12-30 17:07:20', '2023-12-30 17:07:20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT curdate(),
  `genre` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stagiaires`
--

INSERT INTO `stagiaires` (`id`, `prenom`, `nom`, `date_naissance`, `genre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'houssam', 'ed-dourouz', '2001-01-28', 'homme', '2023-12-09 18:31:18', NULL, NULL),
(2, 'ayman', 'mezoura', '2008-03-26', 'homme', '2023-12-09 18:31:18', '2023-12-16 17:22:48', NULL),
(3, 'rihab', 'et-tibary', '2006-03-12', 'femme', '2023-12-09 18:31:18', '2023-12-09 18:31:48', NULL),
(4, 'mossaabe', 'triouech', '2006-12-18', 'homme', '2023-12-09 18:31:18', NULL, NULL),
(6, 'yousra', 'elkhabbaz', '1995-01-01', 'femme', '2023-12-09 18:31:18', '2023-12-16 18:39:28', NULL),
(7, 'ilyass', 'test', '0000-00-00', 'homme', '2023-12-09 18:31:18', '2023-12-16 18:29:40', NULL),
(9, 'othmane', 'mdi', '2023-11-25', 'homme', '2023-12-09 18:31:18', '2023-12-16 17:50:21', '2023-12-16 17:50:21'),
(13, 'Abdelmoumen', 'Akdi', '2023-12-08', 'homme', '2023-12-09 18:31:18', '2023-12-16 17:45:13', '2023-12-16 17:45:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
