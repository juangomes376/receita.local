-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 juin 2024 à 22:25
-- Version du serveur : 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recette`
--
CREATE DATABASE IF NOT EXISTS `recette` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `recette`;

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

CREATE TABLE `catégorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`, `image`) VALUES
(1, 'avocat', '/assets/img/ingredients/avocat.jpg'),
(2, 'sel', '/assets/img/ingredients/sal.webp'),
(3, 'paprica', '/assets/img/ingredients/Paprika_370x425.jpg'),
(4, 'riz', '/assets/img/ingredients/riz.webp');

-- --------------------------------------------------------

--
-- Structure de la table `newpassword`
--

CREATE TABLE `newpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description` longtext NOT NULL,
  `note` int(11) NOT NULL,
  `idproprietaire` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `nom`, `categorie`, `ingredients`, `description`, `note`, `idproprietaire`, `image`) VALUES
(1, 'gomes', 'entrée', '[]', '', 0, 2, '/assets/img/ingredients/avocat.jpg'),
(2, 'gomess', 'entrée', '[]', '', 0, 2, '/assets/img/ingredients/avocat.jpg'),
(3, 'gomess', 'entrée', '[]', '', 0, 2, '/assets/img/ingredients/avocat.jpg'),
(4, 'chocolat', 'entrée', '[]', '', 5, 2, '/assets/img/ingredients/avocat.jpg'),
(5, 'juan gomes', 'plat', '[{\"nom\":\"avocat\",\"montant\":\"5\",\"mesure\":\"g\"},{\"nom\":\"riz\",\"montant\":\"1\",\"mesure\":\"kg\"},{\"nom\":\"sel\",\"montant\":\"5\",\"mesure\":\"cuil. \\u00e0 caf\\u00e9\"},{\"nom\":\"paprica\",\"montant\":\"2\",\"mesure\":\"l\"}]', 'eu sou foda ', 5, 2, '/assets/img/recettes/sal.webp');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nom`, `prenom`) VALUES
(2, 'juangomes376@gmail.com', '$2y$10$GSneXSPgBxwnW8U0.qhUwOWXVXpSVVihET93dUf6xQ4bmzB5BsaAO', 'gomes', 'juan');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newpassword`
--
ALTER TABLE `newpassword`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprietaire_idx` (`idproprietaire`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `newpassword`
--
ALTER TABLE `newpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `proprietaire` FOREIGN KEY (`idproprietaire`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
