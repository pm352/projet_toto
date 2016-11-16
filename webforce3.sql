-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Octobre 2016 à 09:01
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webforce3`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hello` (`s` CHAR(20)) RETURNS CHAR(50) CHARSET latin1 RETURN CONCAT('Hello, ',s,'!')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `cit_id` int(10) UNSIGNED NOT NULL,
  `country_cou_id` int(10) UNSIGNED NOT NULL,
  `cit_name` varchar(32) DEFAULT NULL,
  `cit_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `city`
--

INSERT INTO `city` (`cit_id`, `country_cou_id`, `cit_name`, `cit_inserted`) VALUES
(1, 1, 'Esch-sur-Alzette', '2016-10-12 17:55:21'),
(2, 2, 'Verdun', '2016-10-12 17:55:21'),
(3, 1, 'Luxembourg', '2016-10-12 17:55:45'),
(4, 2, 'Metz', '2016-10-12 17:55:45'),
(5, 1, 'Differdange', '2016-10-13 07:12:37'),
(6, 1, 'Rosport', '2016-10-13 07:14:50'),
(7, 1, 'Bascharage', '2016-10-13 07:15:51'),
(8, 1, 'Clervaux', '2016-10-13 07:16:27'),
(10, 2, 'Strasbourg', '2016-10-13 07:25:13'),
(11, 2, 'Nancy', '2016-10-13 07:28:51'),
(18, 2, 'Thionville', '2016-10-13 07:29:56');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `cou_id` int(10) UNSIGNED NOT NULL,
  `cou_name` varchar(32) DEFAULT NULL,
  `cou_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`cou_id`, `cou_name`, `cou_inserted`) VALUES
(1, 'Luxembourg', '2016-10-12 17:54:48'),
(2, 'France', '2016-10-12 17:54:48'),
(3, 'Belgique', '2016-10-13 10:33:58'),
(4, 'Chine', '2016-10-13 10:51:51'),
(5, 'Bangladesh', '2016-10-21 12:14:17'),
(7, 'Malaisie', '2016-10-24 10:01:52');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `loc_id` int(10) UNSIGNED NOT NULL,
  `city_cit_id` int(10) UNSIGNED NOT NULL,
  `loc_name` varchar(64) DEFAULT NULL,
  `loc_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`loc_id`, `city_cit_id`, `loc_name`, `loc_inserted`) VALUES
(1, 1, 'Fit4Coding Esch/Belval', '2016-10-12 17:56:19');

-- --------------------------------------------------------

--
-- Structure de la table `speciality`
--

CREATE TABLE `speciality` (
  `spe_id` int(10) UNSIGNED NOT NULL,
  `spe_name` varchar(32) DEFAULT NULL,
  `spe_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `speciality`
--

INSERT INTO `speciality` (`spe_id`, `spe_name`, `spe_inserted`) VALUES
(1, 'Back-end', '2016-10-12 18:01:17'),
(2, 'Front-end', '2016-10-12 18:01:17');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `stu_id` int(10) UNSIGNED NOT NULL,
  `city_cit_id` int(10) UNSIGNED NOT NULL,
  `training_tra_id` int(10) UNSIGNED NOT NULL,
  `stu_lname` varchar(64) DEFAULT NULL,
  `stu_fname` varchar(64) DEFAULT NULL,
  `stu_email` varchar(255) DEFAULT NULL,
  `stu_age` tinyint(3) UNSIGNED NOT NULL,
  `stu_friendliness` tinyint(3) UNSIGNED NOT NULL,
  `stu_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stu_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `student`
--

INSERT INTO `student` (`stu_id`, `city_cit_id`, `training_tra_id`, `stu_lname`, `stu_fname`, `stu_email`, `stu_age`, `stu_friendliness`, `stu_updated`, `stu_inserted`) VALUES
(1, 1, 2, 'TASCH', 'Philippe', 'filou@toto.fr', 12, 1, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(2, 1, 2, 'ROLLAND', 'Marie', 'marie@toto.fr', 40, 2, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(3, 1, 2, 'CAVRO', 'Michel', 'michou@toto.fr', 0, 0, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(4, 1, 2, 'THIELLO', 'Ibrahima', 'lakers@toto.fr', 24, 5, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(5, 1, 2, 'FABRI', 'Paul', 'paulf@toto.fr', 17, 3, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(6, 1, 2, 'IOANID', 'Paul', 'pauli@toto.fr', 57, 4, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(7, 5, 1, 'AHRACH', 'Hicham', 'hicham.ahrach@gmail.com', 37, 3, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(8, 1, 1, 'BODIAN', 'Salia', 'sbodian@gmail.com', 28, 4, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(9, 5, 1, 'BOUHAMID', 'Malika', 'bouhamid.m@gmail.com', 22, 5, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(10, 5, 1, 'DE MELO', 'Flavio', 'flaviodemello@gmail.com', 27, 1, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(11, 7, 1, 'DIOGO', 'Patrick', 'dpatrick94@gmail.com', 41, 1, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(12, 6, 1, 'DUHR', 'Christopher', 'duhrchristopher@hotmail.com', 25, 5, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(13, 8, 1, 'EILENBECKER', 'Charles', 'ceilenbecker@gmail.com', 23, 2, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(14, 3, 1, 'FURFARI', 'Paul', 'furfari.paul@gmail.com', 36, 3, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(15, 3, 1, 'KAVANAGH', 'Alan', 'alankavanagh@email.lu', 32, 3, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(16, 4, 3, 'DELTGEN', 'David', 'david@toto.fr', 27, 2, '2016-10-14 14:25:57', '2016-10-14 14:25:57'),
(39, 3, 3, 'Vador', 'Dark', 'dark@vad.org', 46, 0, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(40, 3, 3, 'Kenobi', 'Obi-Wan', 'kenobi@jedi.org', 57, 3, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(41, 3, 3, 'Solo', 'Han', 'solo@anonymous.com', 63, 2, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(42, 3, 3, 'Amidala', 'Padmé', 'padme@amidala.naboo', 27, 2, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(43, 3, 3, 'Goku', 'Son', 'goku@dbz.com', 30, 4, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(44, 3, 3, '', 'Végéta', 'vegeta@dbz.com', 42, 1, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(45, 3, 3, 'Sennin', 'Kamé', 'sennin.kame@dbz.com', 255, 5, '2016-10-21 13:25:23', '2016-10-21 13:25:23'),
(46, 3, 3, 'Vador', 'Dark', 'dark@vad.org', 46, 0, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(47, 3, 3, 'Kenobi', 'Obi-Wan', 'kenobi@jedi.org', 57, 3, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(48, 3, 3, 'Solo', 'Han', 'solo@anonymous.com', 63, 2, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(49, 3, 3, 'Amidala', 'Padmé', 'padme@amidala.naboo', 27, 2, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(50, 3, 3, 'Goku', 'Son', 'goku@dbz.com', 30, 4, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(51, 3, 3, '', 'Végéta', 'vegeta@dbz.com', 42, 1, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(52, 3, 3, 'Sennin', 'Kamé', 'sennin.kame@dbz.com', 255, 5, '2016-10-24 07:47:47', '2016-10-24 07:47:47'),
(53, 1, 3, 'DGH', 'dfh', 'dsfds@sdf.it', 0, 2, '2016-10-25 13:14:10', '2016-10-25 13:14:10'),
(54, 1, 3, 'DSGDSG', 'dsg', 'dsfds@sdf.it', 0, 2, '2016-10-25 13:14:29', '2016-10-25 13:14:29'),
(55, 1, 3, 'DSGDSG', 'dsg', 'dsfds@sdf.it', 0, 2, '2016-10-25 13:15:36', '2016-10-25 13:15:36'),
(56, 2, 3, 'SDGSD', 'dfgdf', 'dsfds@sdf.it', 0, 2, '2016-10-25 13:16:16', '2016-10-25 13:16:16'),
(57, 2, 3, 'DSGDSG', 'fdd', 'dsfds@sdf.it', 0, 1, '2016-10-25 13:18:38', '2016-10-25 13:18:38'),
(58, 2, 3, 'FDSG', 'sdfgs', 'dsfds@sdf.it', 0, 2, '2016-10-25 13:19:52', '2016-10-25 13:19:52'),
(59, 1, 3, 'DSGDSG', 'dfh', 'dsfds@sdf.it', 255, 1, '2016-10-25 13:21:00', '2016-10-25 13:21:00'),
(60, 1, 3, 'SDFS', 'sdfsdf', 'sdfds@sdf.fr', 255, 2, '2016-10-25 13:28:47', '2016-10-25 13:28:47'),
(61, 2, 3, 'SDFS', 'sdfsdf', 'sdfds@sdf.fr', 41, 1, '2016-10-25 13:39:04', '2016-10-25 13:39:04'),
(62, 3, 3, 'PAUL', 'Marshall', 'pm@gmail.com', 38, 5, '2016-10-26 07:56:47', '2016-10-26 07:56:47'),
(63, 3, 3, 'PAUL', 'Marshall', 'pm@gmail.com', 38, 5, '2016-10-26 07:58:35', '2016-10-26 07:58:35'),
(64, 3, 3, 'PAUL', 'Marshall', 'pm@gmail.com', 38, 5, '2016-10-26 08:00:30', '2016-10-26 08:00:30'),
(65, 3, 3, 'PAUL', 'Marshall', 'pm@gmail.com', 38, 5, '2016-10-26 08:01:17', '2016-10-26 08:01:17'),
(66, 1, 3, 'TTTT', 'ttttt', 'tttt@tttt.fr', 29, 5, '2016-10-26 08:07:35', '2016-10-26 08:07:35'),
(67, 1, 3, 'SDFS', 'dfhd', 'sdfds@sdf.fr', 255, 5, '2016-10-26 08:12:21', '2016-10-26 08:12:21'),
(68, 1, 3, 'DSF', 'sdfsd', 'sdfds@sdf.fr', 255, 2, '2016-10-26 10:46:11', '2016-10-26 10:46:11');

-- --------------------------------------------------------

--
-- Structure de la table `trainer`
--

CREATE TABLE `trainer` (
  `trn_id` int(10) UNSIGNED NOT NULL,
  `city_cit_id` int(10) UNSIGNED NOT NULL,
  `speciality_spe_id` int(10) UNSIGNED NOT NULL,
  `trn_lname` varchar(64) DEFAULT NULL,
  `trn_fname` varchar(64) DEFAULT NULL,
  `trn_email` varchar(255) DEFAULT NULL,
  `trn_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trn_updated` datetime NOT NULL,
  `trn_nb_updates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `trainer`
--

INSERT INTO `trainer` (`trn_id`, `city_cit_id`, `speciality_spe_id`, `trn_lname`, `trn_fname`, `trn_email`, `trn_inserted`, `trn_updated`, `trn_nb_updates`) VALUES
(1, 2, 1, 'CORDIER', 'Benjamino', 'ben@progweb.fr', '2016-10-12 17:58:49', '2016-10-14 16:06:57', '0000-00-00 00:00:00'),
(2, 4, 2, 'Marty', 'Igor', 'igor@marty.pl', '2016-10-12 18:00:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Déclencheurs `trainer`
--
DELIMITER $$
CREATE TRIGGER `trainerUpdate` BEFORE UPDATE ON `trainer` FOR EACH ROW SET NEW.trn_updated = NOW(),
NEW.trn_nb_updates = OLD.trn_nb_updates +1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `training`
--

CREATE TABLE `training` (
  `tra_id` int(10) UNSIGNED NOT NULL,
  `location_loc_id` int(10) UNSIGNED NOT NULL,
  `tra_start_date` date DEFAULT NULL,
  `tra_end_date` date DEFAULT NULL,
  `tra_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `training`
--

INSERT INTO `training` (`tra_id`, `location_loc_id`, `tra_start_date`, `tra_end_date`, `tra_inserted`) VALUES
(1, 1, '2016-08-31', '2016-12-23', '2016-10-12 17:56:57'),
(2, 1, '2016-04-04', '2016-07-29', '2016-10-12 17:57:13'),
(3, 1, '2015-11-30', '2016-03-25', '2016-10-12 17:57:56'),
(4, 1, '2017-01-04', '2017-04-21', '2016-10-14 09:33:33');

-- --------------------------------------------------------

--
-- Structure de la table `training_has_trainer`
--

CREATE TABLE `training_has_trainer` (
  `training_tra_id` int(10) UNSIGNED NOT NULL,
  `trainer_trn_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `training_has_trainer`
--

INSERT INTO `training_has_trainer` (`training_tra_id`, `trainer_trn_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cit_id`),
  ADD KEY `city_FKIndex1` (`country_cou_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cou_id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `location_FKIndex1` (`city_cit_id`);

--
-- Index pour la table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`spe_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `student_FKIndex1` (`training_tra_id`),
  ADD KEY `student_FKIndex2` (`city_cit_id`);

--
-- Index pour la table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trn_id`),
  ADD KEY `trainer_FKIndex1` (`speciality_spe_id`),
  ADD KEY `trainer_FKIndex2` (`city_cit_id`);

--
-- Index pour la table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`tra_id`),
  ADD KEY `training_FKIndex1` (`location_loc_id`);

--
-- Index pour la table `training_has_trainer`
--
ALTER TABLE `training_has_trainer`
  ADD PRIMARY KEY (`training_tra_id`,`trainer_trn_id`),
  ADD KEY `training_has_trainer_FKIndex1` (`training_tra_id`),
  ADD KEY `training_has_trainer_FKIndex2` (`trainer_trn_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `cit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `cou_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `spe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `training`
--
ALTER TABLE `training`
  MODIFY `tra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
