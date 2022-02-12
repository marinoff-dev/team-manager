-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 09 fév. 2022 à 08:34
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `numcont` int NOT NULL,
  `datedem` date NOT NULL,
  `durinit` int NOT NULL,
  `datefin_rel` date NOT NULL,
  `employe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `numemp` int NOT NULL,
  `nomemp` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `preemp` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `datemb` date NOT NULL,
  `durcont` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`numemp`, `nomemp`, `preemp`, `datemb`, `durcont`) VALUES
(1, 'dfdsfg', 'sdfg', '2020-02-22', 1),
(2, 'tossavi', 'Manel', '2021-08-16', -1),
(4, 'tossavi', 'Manel', '2021-08-16', -1),
(5, 'egounlety', 'romulus', '2015-02-12', 2);

-- --------------------------------------------------------

--
-- Structure de la table `faute`
--

CREATE TABLE `faute` (
  `codfaute` int NOT NULL,
  `typfaute` binary(8) NOT NULL,
  `description` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `keyemp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `nomus` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `premus` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `login` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `mailus` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `date`, `nomus`, `premus`, `login`, `mailus`, `pass`) VALUES
(1, '2022-02-02 20:46:18', 'azerty', 'azerty', 'qwerty', 'azerty56@gmail.com', 'ae5eb824ef87499f644c3f11a7176157'),
(2, '2022-02-02 20:47:46', 'querty', 'aze', 'ftghj', 'querty56@gmail.com', '149815eb972b3c370dee3b89d645ae14'),
(3, '2022-02-02 22:38:02', 'zoblikpo', 'emma', 'grama', 'grama23@gmail.com', '149815eb972b3c370dee3b89d645ae14'),
(4, '2022-02-03 22:56:25', 'mo', 'ma', 'mar', 'qsd325@gmail.com', '1f6419b1cbe79c71410cb320fc094775'),
(5, '2022-02-03 22:59:53', 'egoun', 'rom', 'abel', 'abel23@gmail.com', 'e615c82aba461681ade82da2da38004a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`numcont`),
  ADD KEY `keyemp` (`employe`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`numemp`);

--
-- Index pour la table `faute`
--
ALTER TABLE `faute`
  ADD PRIMARY KEY (`codfaute`),
  ADD KEY `keyf` (`keyemp`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `numcont` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `numemp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `faute`
--
ALTER TABLE `faute`
  MODIFY `codfaute` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `keyemp` FOREIGN KEY (`employe`) REFERENCES `employe` (`numemp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `faute`
--
ALTER TABLE `faute`
  ADD CONSTRAINT `keyf` FOREIGN KEY (`keyemp`) REFERENCES `employe` (`numemp`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
