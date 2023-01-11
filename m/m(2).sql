-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:5000
-- Généré le : dim. 11 déc. 2022 à 17:02
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m`
--

-- --------------------------------------------------------

--
-- Structure de la table `actvt`
--

CREATE TABLE `actvt` (
  `id-actvt` int(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `actvt_resrv_actvt`
--

CREATE TABLE `actvt_resrv_actvt` (
  `id_resrv_actv` int(255) NOT NULL,
  `id_acvt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `actvt_vil`
--

CREATE TABLE `actvt_vil` (
  `id_actvt` int(255) NOT NULL,
  `id_vil` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bang`
--

CREATE TABLE `bang` (
  `num_b` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bang`
--

INSERT INTO `bang` (`num_b`, `type`, `prix`) VALUES
(0, 'DOUBLE', 66),
(1, 'SIMPLE', 600),
(2, 'double', 800);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_h` int(255) NOT NULL,
  `num_ch` int(255) NOT NULL,
  `type_ch` varchar(255) NOT NULL,
  `prix_ch` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_h`, `num_ch`, `type_ch`, `prix_ch`) VALUES
(0, 0, 'SIMPLE', 500),
(1, 1, 'SIMPLE', 500);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `i_client` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numTel` int(255) NOT NULL,
  `Date_N` date NOT NULL,
  `id_rest_sej` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_serv`
--

CREATE TABLE `client_serv` (
  `id_client` int(255) NOT NULL,
  `id_serv` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emp`
--

CREATE TABLE `emp` (
  `id_emp` int(255) NOT NULL,
  `nom_emp` varchar(255) NOT NULL,
  `prenom_emp` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `pass` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emp`
--

INSERT INTO `emp` (`id_emp`, `nom_emp`, `prenom_emp`, `post`, `pass`) VALUES
(1, 'YOUSSEF', 'OUHBA', 'dericteur', 2001),
(2, 'MOUHAMMED', 'FAHLAOUI', 'admin_infra', 1234);

-- --------------------------------------------------------

--
-- Structure de la table `equip`
--

CREATE TABLE `equip` (
  `nom_equipement` varchar(255) NOT NULL,
  `id_equip` int(11) NOT NULL,
  `num_ch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equip`
--

INSERT INTO `equip` (`nom_equipement`, `id_equip`, `num_ch`) VALUES
('lit_3', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `equip_b`
--

CREATE TABLE `equip_b` (
  `nom_equipement` varchar(255) NOT NULL,
  `id_equipb` int(11) NOT NULL,
  `num_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id_h` int(255) NOT NULL,
  `adress_h` varchar(255) NOT NULL,
  `nombre_ch` int(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `nom_h` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id_h`, `adress_h`, `nombre_ch`, `categorie`, `nom_h`) VALUES
(0, 'ERRACHIDYA', 30, '*****', 'HOTEL YOUSSAF');

-- --------------------------------------------------------

--
-- Structure de la table `resrv_activite`
--

CREATE TABLE `resrv_activite` (
  `id_resrv_actv` int(255) NOT NULL,
  `nom_actvt` varchar(255) NOT NULL,
  `Horaire` date NOT NULL,
  `id_client` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `restoraion_sjr`
--

CREATE TABLE `restoraion_sjr` (
  `id_rsrv` int(11) NOT NULL,
  `logement` int(11) NOT NULL,
  `prise` int(11) NOT NULL,
  `offre` int(11) NOT NULL,
  `date_rerv-s` date NOT NULL,
  `id_sjr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_serv` int(255) NOT NULL,
  `type_serv` varchar(255) NOT NULL,
  `tarif` int(255) NOT NULL,
  `id_emp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sjr`
--

CREATE TABLE `sjr` (
  `id_sjr` int(11) NOT NULL,
  `mbr_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vil-serv`
--

CREATE TABLE `vil-serv` (
  `id_vil` int(11) NOT NULL,
  `id_serv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `village`
--

CREATE TABLE `village` (
  `id_vil` int(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_emp` int(255) NOT NULL,
  `id_h` int(255) NOT NULL,
  `num_b` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actvt_resrv_actvt`
--
ALTER TABLE `actvt_resrv_actvt`
  ADD PRIMARY KEY (`id_resrv_actv`);

--
-- Index pour la table `actvt_vil`
--
ALTER TABLE `actvt_vil`
  ADD PRIMARY KEY (`id_actvt`,`id_vil`);

--
-- Index pour la table `bang`
--
ALTER TABLE `bang`
  ADD PRIMARY KEY (`num_b`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_h`);

--
-- Index pour la table `client_serv`
--
ALTER TABLE `client_serv`
  ADD PRIMARY KEY (`id_client`,`id_serv`);

--
-- Index pour la table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `equip`
--
ALTER TABLE `equip`
  ADD PRIMARY KEY (`id_equip`);

--
-- Index pour la table `equip_b`
--
ALTER TABLE `equip_b`
  ADD PRIMARY KEY (`id_equipb`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_h`);

--
-- Index pour la table `resrv_activite`
--
ALTER TABLE `resrv_activite`
  ADD PRIMARY KEY (`id_resrv_actv`);

--
-- Index pour la table `restoraion_sjr`
--
ALTER TABLE `restoraion_sjr`
  ADD PRIMARY KEY (`id_rsrv`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_serv`);

--
-- Index pour la table `sjr`
--
ALTER TABLE `sjr`
  ADD PRIMARY KEY (`id_sjr`);

--
-- Index pour la table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id_vil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actvt_resrv_actvt`
--
ALTER TABLE `actvt_resrv_actvt`
  MODIFY `id_resrv_actv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emp`
--
ALTER TABLE `emp`
  MODIFY `id_emp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `equip`
--
ALTER TABLE `equip`
  MODIFY `id_equip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `equip_b`
--
ALTER TABLE `equip_b`
  MODIFY `id_equipb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `resrv_activite`
--
ALTER TABLE `resrv_activite`
  MODIFY `id_resrv_actv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `restoraion_sjr`
--
ALTER TABLE `restoraion_sjr`
  MODIFY `id_rsrv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_serv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sjr`
--
ALTER TABLE `sjr`
  MODIFY `id_sjr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `village`
--
ALTER TABLE `village`
  MODIFY `id_vil` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
