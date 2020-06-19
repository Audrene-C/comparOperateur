-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 19 juin 2020 à 07:03
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comparoperator`
--

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) NOT NULL,
  `location` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `img_url_small` varchar(255) NOT NULL,
  `img_url_large` varchar(255) NOT NULL,
  `id_tour_operator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id`, `location`, `price`, `img_url_small`, `img_url_large`, `id_tour_operator`) VALUES
(1, 'Corse', 500, 'Corsica1.jpg', 'corsica2.jpg', 1),
(3, 'Tokyo', 800, 'tokyo1.jpg', 'tokyo2.jpg', 4),
(4, 'Abidjan', 400, 'Abidjan1.jpg', 'Abidjan2.jpg', 4),
(5, 'Bali', 700, 'bali1.jpg', 'bali2.jpg', 6),
(6, 'Havane', 800, 'havane1.jpg', 'havane2.jpg', 3),
(7, 'Londres', 300, 'london1.jpg', 'london2.jpg', 5),
(8, 'Montréal', 1500, 'montreal1.jpg', 'montreal2.jpg', 6),
(9, 'New York', 2000, 'n_y.jpg', 'n_y2.jpg', 1),
(10, 'New Zealand', 1000, 'new_zealand1.jpg', 'new_zealand2.jpg', 6),
(11, 'Sao Paulo', 1200, 'Sao_Paulo1.jpg', 'Sao_Paulo2.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `message` varchar(250) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `author` varchar(150) NOT NULL,
  `id_tour_operator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `rating`, `author`, `id_tour_operator`) VALUES
(1, 'Super club !', 5, 'Alex', 1),
(3, 'Trop bien!', 5, 'Pedro', 1),
(11, 'Nul.', 1, 'Gael', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tour_operators`
--

CREATE TABLE `tour_operators` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `rating` int(2) NOT NULL,
  `link` varchar(255) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tour_operators`
--

INSERT INTO `tour_operators` (`id`, `name`, `rating`, `link`, `is_premium`) VALUES
(1, 'ClubMed', 5, 'https://www.clubmed.fr/', 1),
(3, 'Hairbus', 4, 'https://www.airbus.com', 1),
(4, 'JetEasay', 2, 'https://www.easyjet.com/fr', 1),
(5, 'LesMirettes', 5, 'https://www.emirates.com/fr/french', 1),
(6, 'Souissair', 4, 'https://www.swissair.com/fr', 1),
(9, 'Test', 4, 'test.net', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operator` (`id_tour_operator`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tour_operator` (`id_tour_operator`);

--
-- Index pour la table `tour_operators`
--
ALTER TABLE `tour_operators`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tour_operators`
--
ALTER TABLE `tour_operators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`id_tour_operator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_tour_operator` FOREIGN KEY (`id_tour_operator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
