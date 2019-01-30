-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 30 Janvier 2019 à 12:27
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeuxnon`
--
CREATE DATABASE IF NOT EXISTS `jeuxnon` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `jeuxnon`;

-- --------------------------------------------------------

--
-- Structure de la table `CoutTechnique`
--

CREATE TABLE `CoutTechnique` (
  `id` int(11) NOT NULL,
  `Valeur` int(11) NOT NULL,
  `id_stats` int(11) NOT NULL,
  `id_technique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `CoutTechnique`
--

INSERT INTO `CoutTechnique` (`id`, `Valeur`, `id_stats`, `id_technique`) VALUES
(1, 0, 2, 1),
(2, -10, 2, 2),
(3, -10, 2, 3),
(4, -20, 2, 4),
(5, -10, 2, 5),
(6, -10, 2, 8),
(7, -5, 2, 9),
(8, -10, 2, 11),
(9, -10, 2, 13),
(10, -10, 2, 14);

-- --------------------------------------------------------

--
-- Structure de la table `DegatTechnique`
--

CREATE TABLE `DegatTechnique` (
  `id` int(11) NOT NULL,
  `Valeur` int(11) NOT NULL,
  `id_stats` int(11) NOT NULL,
  `id_technique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `DegatTechnique`
--

INSERT INTO `DegatTechnique` (`id`, `Valeur`, `id_stats`, `id_technique`) VALUES
(1, -10, 1, 1),
(2, -20, 1, 2),
(3, -10, 1, 3),
(4, 1, 3, 3),
(5, -30, 1, 4),
(6, 20, 1, 5),
(7, -5, 1, 6),
(8, -5, 1, 7),
(9, -20, 1, 8),
(10, -10, 1, 9),
(11, -5, 1, 10),
(12, -30, 1, 11),
(13, -15, 1, 12),
(14, -30, 1, 13),
(15, -25, 1, 14),
(16, 1, 3, 14);

-- --------------------------------------------------------

--
-- Structure de la table `Monstre`
--

CREATE TABLE `Monstre` (
  `id` int(11) NOT NULL,
  `Nom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `Monstre`
--

INSERT INTO `Monstre` (`id`, `Nom`, `Description`) VALUES
(1, 'Gobelin', 'Petites créatures humanoïdes à la peau verte'),
(2, 'Orc', 'Grandes créatures à la peau verte sont réputés pour leur dévotion au combat et à la guerre'),
(3, 'Hobgoblin', 'Ressemblant au Gobelin, mais plus grand et plus intélligent'),
(4, 'Ogre', 'Grands êtres brutaux, à la capacité d’élocution et à l’intelligence limitées'),
(5, 'Votre ombre', 'Créature malfaisante représentant la part d\'ombre de chacun'),
(6, 'test', 'monstre de test');

-- --------------------------------------------------------

--
-- Structure de la table `Stats`
--

CREATE TABLE `Stats` (
  `id` int(11) NOT NULL,
  `Nom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `Stats`
--

INSERT INTO `Stats` (`id`, `Nom`) VALUES
(1, 'PV'),
(2, 'mana'),
(3, 'stun');

-- --------------------------------------------------------

--
-- Structure de la table `Technique`
--

CREATE TABLE `Technique` (
  `id` int(11) NOT NULL,
  `Nom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `Technique`
--

INSERT INTO `Technique` (`id`, `Nom`, `Description`) VALUES
(1, 'Attaque', 'Inflige 10 points de dégats.'),
(2, 'Coup fort', 'Inflige 20 points de dégats pour 10 de mana.'),
(3, 'Coup assomant', 'Inflige 10 points de dégats et assome pendant 1 tour pour 10 de mana.'),
(4, 'Boule de feu', 'Inflige 30 points de dégats pour 20 de mana.'),
(5, 'Soin', 'Soigne 20 points de vie pour 10 de mana.'),
(6, 'Attaque', 'ATK Gobelin. 5dg'),
(7, 'Attaque', 'ATK Orc. 5dg'),
(8, 'Coup bourrin', 'ATK Orc. 20dg/10mana'),
(9, 'Grosse baffe', 'ATK Orc. 10dg/5mana'),
(10, 'Attaque', 'ATK Hobgobelin. 5dg'),
(11, 'Coup bas', 'ATK Hobgobelin. 30dg/10mana'),
(12, 'Attaque', 'ATK Ogre. 15dg'),
(13, 'Martellage', 'ATK Ogre. 30dg/10mana'),
(14, 'Plaquage', 'ATK Ogre. 25dg/1stun/10mana');

-- --------------------------------------------------------

--
-- Structure de la table `TechniqueMonstre`
--

CREATE TABLE `TechniqueMonstre` (
  `id` int(11) NOT NULL,
  `id_technique` int(11) NOT NULL,
  `id_monstre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `TechniqueMonstre`
--

INSERT INTO `TechniqueMonstre` (`id`, `id_technique`, `id_monstre`) VALUES
(1, 1, 5),
(2, 6, 1),
(3, 7, 2),
(4, 10, 3),
(5, 12, 4),
(6, 8, 2),
(7, 9, 2),
(8, 11, 3),
(9, 13, 4),
(10, 14, 4),
(11, 2, 5),
(12, 3, 5),
(13, 4, 5),
(14, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `TechniqueUtilisateur`
--

CREATE TABLE `TechniqueUtilisateur` (
  `id` int(11) NOT NULL,
  `id_technique` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `TechniqueUtilisateur`
--

INSERT INTO `TechniqueUtilisateur` (`id`, `id_technique`, `id_utilisateur`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pseudo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Motdepasse` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `Nom`, `Prenom`, `Pseudo`, `Mail`, `Motdepasse`) VALUES
(2, 'SAdmin', 'Sadmin', 'sadmin', 'Ultimadmin@super.man', '$2y$10$ZlIo1loLe5RrhMu536qJzuOdlmbmTH0xqKrJeOuO3S7ondpjev3nC'),
(3, 'michel', 'Jean', 'michou', 'michel@all.fr', '$2y$10$Yb7Xe5rZkkhX.4zd..W2FeCW50ZfpNQMtENW2Hdnfc5XlE2tgJ0P.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `CoutTechnique`
--
ALTER TABLE `CoutTechnique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `DegatTechnique`
--
ALTER TABLE `DegatTechnique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Monstre`
--
ALTER TABLE `Monstre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Stats`
--
ALTER TABLE `Stats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Technique`
--
ALTER TABLE `Technique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TechniqueMonstre`
--
ALTER TABLE `TechniqueMonstre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TechniqueUtilisateur`
--
ALTER TABLE `TechniqueUtilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CoutTechnique`
--
ALTER TABLE `CoutTechnique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `DegatTechnique`
--
ALTER TABLE `DegatTechnique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `Monstre`
--
ALTER TABLE `Monstre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Stats`
--
ALTER TABLE `Stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Technique`
--
ALTER TABLE `Technique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `TechniqueMonstre`
--
ALTER TABLE `TechniqueMonstre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `TechniqueUtilisateur`
--
ALTER TABLE `TechniqueUtilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
