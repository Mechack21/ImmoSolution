-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 14 juin 2020 à 12:22
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agenceimmobd`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id_agence` int(11) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id_agence`, `denomination`, `adresse`) VALUES
(1, 'IMMO SOLUTION', 'koko n°11bis Q/KINGABWA C/LIMETE'),
(2, 'CELESTE AGENCY', 'AV.BANUNU/MATETE'),
(3, 'LA GLOIRE', 'BARUMBU');

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `id_biens` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `id_agence` int(11) NOT NULL,
  `id_type_bien` int(11) NOT NULL,
  `id_commune` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_operation` int(11) NOT NULL,
  `detail` text NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id_biens`, `adresse`, `id_agence`, `id_type_bien`, `id_commune`, `prix`, `id_operation`, `detail`, `statut`) VALUES
(1, 'av. kimbangu n°12 Q/GR', 3, 1, 2, 45000, 1, '3 chambre, salon, salle de bain', 0),
(2, 'av.mechack n°15 Q/Bulambo', 2, 5, 1, 500, 2, 'salon, 3chambres, cuisine et salle de bain', 0),
(3, 'av.mutoka q/mechack ', 3, 2, 3, 80, 2, '2mettre sur 4', 0),
(4, 'av.bogou q/cogelos', 2, 3, 1, 5000, 1, '50/50', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_utilidateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id_commune` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `id_district` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id_commune`, `nom`, `id_district`) VALUES
(1, 'LIMETE', 2),
(2, 'MASINA', 1),
(3, 'N\'DJILI', 1);

-- --------------------------------------------------------

--
-- Structure de la table `district`
--

CREATE TABLE `district` (
  `id_district` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `district`
--

INSERT INTO `district` (`id_district`, `nom`) VALUES
(1, 'TSHANGU'),
(2, 'MONT-AMBA'),
(3, 'LUKUNGA'),
(4, 'FUNA');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `id_operation` int(11) NOT NULL,
  `date_op` date NOT NULL,
  `type_op` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`id_operation`, `date_op`, `type_op`) VALUES
(1, '2019-09-09', 'VENTE'),
(2, '2020-06-26', 'LOCATION');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `id_biens` int(11) NOT NULL,
  `type_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `chemin`, `id_biens`, `type_photo`) VALUES
(1, 'IMG-20200530-WA0027.jpg', 1, 'Caroussel'),
(2, 'b1.jpg', 1, 'Bien'),
(3, 'b2.jpg', 1, 'Bien'),
(4, 'b3.jpg', 1, 'Bien'),
(5, 'blog1.jpg', 2, 'Bien'),
(6, 'blog2.jpg', 2, 'Bien'),
(7, 'blog3.jpg', 2, 'Bien'),
(8, 'blog4.jpg', 2, 'Bien');

-- --------------------------------------------------------

--
-- Structure de la table `systemeconfig`
--

CREATE TABLE `systemeconfig` (
  `id_set` varchar(100) NOT NULL,
  `nom_sys` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_bien`
--

CREATE TABLE `type_bien` (
  `id_type_bien` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_bien`
--

INSERT INTO `type_bien` (`id_type_bien`, `nom`) VALUES
(1, 'Maison'),
(2, 'Studio'),
(3, 'Terrain'),
(5, 'Appartements');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id_agence`);

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`id_biens`),
  ADD KEY `id_agence` (`id_agence`),
  ADD KEY `id_commune` (`id_commune`),
  ADD KEY `id_operation` (`id_operation`),
  ADD KEY `id_type_bien` (`id_type_bien`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id_commune`),
  ADD KEY `id_district` (`id_district`);

--
-- Index pour la table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id_district`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id_operation`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_biens` (`id_biens`);

--
-- Index pour la table `systemeconfig`
--
ALTER TABLE `systemeconfig`
  ADD PRIMARY KEY (`id_set`);

--
-- Index pour la table `type_bien`
--
ALTER TABLE `type_bien`
  ADD PRIMARY KEY (`id_type_bien`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id_agence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `id_biens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `district`
--
ALTER TABLE `district`
  MODIFY `id_district` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `id_operation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_bien`
--
ALTER TABLE `type_bien`
  MODIFY `id_type_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `biens_ibfk_1` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id_agence`),
  ADD CONSTRAINT `biens_ibfk_2` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id_commune`),
  ADD CONSTRAINT `biens_ibfk_3` FOREIGN KEY (`id_operation`) REFERENCES `operation` (`id_operation`),
  ADD CONSTRAINT `biens_ibfk_4` FOREIGN KEY (`id_type_bien`) REFERENCES `type_bien` (`id_type_bien`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`id_district`) REFERENCES `district` (`id_district`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_biens`) REFERENCES `biens` (`id_biens`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
