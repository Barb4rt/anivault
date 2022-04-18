-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 16 avr. 2022 à 11:20
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anivault`
--

-- --------------------------------------------------------

--
-- Structure de la table `j_care_animal`
--

DROP TABLE IF EXISTS `j_care_animal`;
CREATE TABLE IF NOT EXISTS `j_care_animal` (
  `ca_care_id` int(11) NOT NULL,
  `ca_animal_id` int(11) NOT NULL,
  PRIMARY KEY (`ca_care_id`,`ca_animal_id`),
  KEY `ca_animal_id` (`ca_animal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `j_groomer_animal`
--

DROP TABLE IF EXISTS `j_groomer_animal`;
CREATE TABLE IF NOT EXISTS `j_groomer_animal` (
  `ga_groomer_id` int(11) NOT NULL,
  `ga_animal_id` int(11) NOT NULL,
  PRIMARY KEY (`ga_groomer_id`,`ga_animal_id`),
  KEY `ga_animal_id` (`ga_animal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `s_adoption_report`
--

DROP TABLE IF EXISTS `s_adoption_report`;
CREATE TABLE IF NOT EXISTS `s_adoption_report` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `ar_fk_animal_id` int(11) NOT NULL,
  `ar_fk_owner_id` int(11) NOT NULL,
  `ar_date` datetime NOT NULL,
  `ar_return_date` datetime DEFAULT NULL,
  `ar_return_reason` text,
  `ar_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `s_animal`
--

DROP TABLE IF EXISTS `s_animal`;
CREATE TABLE IF NOT EXISTS `s_animal` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_fk_owner_id` int(11) DEFAULT NULL,
  `a_fk_enclosure_id` int(11) NOT NULL,
  `a_name` varchar(150) NOT NULL,
  `a_fk_specie_id` int(11) NOT NULL,
  `a_birth_date` datetime NOT NULL,
  `a_death_date` datetime DEFAULT NULL,
  `a_adoption_date` datetime DEFAULT NULL,
  `a_fk_gender_id` int(11) NOT NULL,
  `a_identification_number` varchar(50) DEFAULT NULL,
  `a_picture` varchar(255) NOT NULL,
  `a_weight` int(11) NOT NULL,
  `a_fk_favorite_groomer_id` int(11) NOT NULL,
  `a_description` text,
  `a_available` tinyint(1) NOT NULL,
  `a_price` int(11) DEFAULT NULL,
  `a_fk_race_id` int(11) NOT NULL,
  PRIMARY KEY (`a_id`),
  KEY `s_animal_to_enclosure` (`a_fk_enclosure_id`),
  KEY `s_animal_to_groomer` (`a_fk_favorite_groomer_id`),
  KEY `s_animal_to_owner` (`a_fk_owner_id`),
  KEY `s_animal_to_gender` (`a_fk_gender_id`),
  KEY `s_animal_to_specie` (`a_fk_specie_id`),
  KEY `s_animal_to_race` (`a_fk_race_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_animal`
--

INSERT INTO `s_animal` (`a_id`, `a_fk_owner_id`, `a_fk_enclosure_id`, `a_name`, `a_fk_specie_id`, `a_birth_date`, `a_death_date`, `a_adoption_date`, `a_fk_gender_id`, `a_identification_number`, `a_picture`, `a_weight`, `a_fk_favorite_groomer_id`, `a_description`, `a_available`, `a_price`, `a_fk_race_id`) VALUES
(1, NULL, 1, 'Paco', 3, '2020-04-02 11:17:26', NULL, NULL, 1, '54841', './public/image/picture/animal', 500, 2, 'Perroquet de type Gris du gabon trés sociable', 1, 500, 14);

-- --------------------------------------------------------

--
-- Structure de la table `s_care_choice`
--

DROP TABLE IF EXISTS `s_care_choice`;
CREATE TABLE IF NOT EXISTS `s_care_choice` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cc_medication` varchar(50) NOT NULL,
  `cc_treatment_time` float NOT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_care_choice`
--

INSERT INTO `s_care_choice` (`cc_id`, `cc_medication`, `cc_treatment_time`) VALUES
(1, 'Ronaxan', 8),
(2, 'Frontline', 1);

-- --------------------------------------------------------

--
-- Structure de la table `s_enclosure`
--

DROP TABLE IF EXISTS `s_enclosure`;
CREATE TABLE IF NOT EXISTS `s_enclosure` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_reference` varchar(255) NOT NULL,
  `e_fk_shelter` int(11) NOT NULL,
  `e_fk_type` int(11) NOT NULL,
  `e_area` int(11) NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `e_fk_shelter` (`e_fk_shelter`),
  KEY `e_fk_type` (`e_fk_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_enclosure`
--

INSERT INTO `s_enclosure` (`e_id`, `e_reference`, `e_fk_shelter`, `e_fk_type`, `e_area`) VALUES
(1, 'EVH-01LY', 1, 2, 14),
(2, 'EGS-01SE', 2, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `s_gender_choice`
--

DROP TABLE IF EXISTS `s_gender_choice`;
CREATE TABLE IF NOT EXISTS `s_gender_choice` (
  `gc_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_name` varchar(2) NOT NULL,
  PRIMARY KEY (`gc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_gender_choice`
--

INSERT INTO `s_gender_choice` (`gc_id`, `gr_name`) VALUES
(1, 'M'),
(2, 'F'),
(3, 'NC');

-- --------------------------------------------------------

--
-- Structure de la table `s_groomer`
--

DROP TABLE IF EXISTS `s_groomer`;
CREATE TABLE IF NOT EXISTS `s_groomer` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g-admin` tinyint(1) NOT NULL DEFAULT '0',
  `g_password` varchar(255) NOT NULL,
  `g_fk_animal_id` int(11) DEFAULT NULL,
  `g_fk_shelter_id` int(11) DEFAULT NULL,
  `g_firstname` varchar(50) NOT NULL,
  `g_lastame` varchar(50) NOT NULL,
  `g_date_entry` datetime NOT NULL,
  `g_date_exit` datetime DEFAULT NULL,
  `g_fk_gender_id` int(11) NOT NULL,
  `g_phone` int(10) NOT NULL,
  `g_mail` varchar(255) NOT NULL,
  `g_picture` varchar(255) NOT NULL,
  `g_fk_speciality_id` int(11) DEFAULT NULL,
  `g_fk_superior_id` int(11) DEFAULT NULL,
  `g_quota_per_day` int(11) NOT NULL,
  PRIMARY KEY (`g_id`),
  KEY `s_groomer_to_animal` (`g_fk_animal_id`),
  KEY `s_groomer_to_shelter` (`g_fk_shelter_id`),
  KEY `s_groomer_to_superior` (`g_fk_superior_id`),
  KEY `s_groomer_to_gender` (`g_fk_gender_id`),
  KEY `s_groomer_to_speciality` (`g_fk_speciality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_groomer`
--

INSERT INTO `s_groomer` (`g_id`, `g-admin`, `g_password`, `g_fk_animal_id`, `g_fk_shelter_id`, `g_firstname`, `g_lastame`, `g_date_entry`, `g_date_exit`, `g_fk_gender_id`, `g_phone`, `g_mail`, `g_picture`, `g_fk_speciality_id`, `g_fk_superior_id`, `g_quota_per_day`) VALUES
(1, 0, 'test', NULL, NULL, 'Jean', 'Tanlelou', '2022-04-16 07:44:20', NULL, 1, 654584936, 'jean.tanlelou@anivault.fr', './public/images/profile/default.jpg', 2, 2, 20),
(2, 1, 'admintest', NULL, NULL, 'Anne', 'Esthésie', '2022-04-04 09:00:00', NULL, 2, 698745136, 'anne.esthesie@anivault.fr', './public/images/profile/default.jpg', 4, NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `s_owner`
--

DROP TABLE IF EXISTS `s_owner`;
CREATE TABLE IF NOT EXISTS `s_owner` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_firstname` varchar(150) NOT NULL,
  `o_lastname` varchar(150) NOT NULL,
  `o_subscribe_date` datetime NOT NULL,
  `o_adresse` varchar(255) NOT NULL,
  `o_city` varchar(150) NOT NULL,
  `o_phone` int(11) NOT NULL,
  `o_mail` varchar(255) NOT NULL,
  `o_fk_animal` int(11) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_owner`
--

INSERT INTO `s_owner` (`o_id`, `o_firstname`, `o_lastname`, `o_subscribe_date`, `o_adresse`, `o_city`, `o_phone`, `o_mail`, `o_fk_animal`) VALUES
(1, 'Guy', 'Tard', '2022-04-16 09:09:26', '5 rue des allouette', 'Cluny', 654123879, 'guy_tard@gmail.com', NULL),
(2, 'Lara', 'Pafromage', '2022-04-12 11:09:26', '48 av. de la Motte', 'Annecy', 619451848, 'pafromage_lara@hotmail.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `s_race_choice`
--

DROP TABLE IF EXISTS `s_race_choice`;
CREATE TABLE IF NOT EXISTS `s_race_choice` (
  `rc_id` int(11) NOT NULL AUTO_INCREMENT,
  `rc_name` varchar(50) NOT NULL,
  `rc_fk_specie_id` int(11) NOT NULL,
  PRIMARY KEY (`rc_id`),
  KEY `s_race_to_specie` (`rc_fk_specie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_race_choice`
--

INSERT INTO `s_race_choice` (`rc_id`, `rc_name`, `rc_fk_specie_id`) VALUES
(1, 'Cavalier king charles', 1),
(2, 'Golden retriever', 1),
(3, 'Spitz nain allemand', 1),
(4, 'Beauceron', 1),
(5, 'Bulldog continental', 1),
(6, 'Staffordshire bull terrier', 1),
(7, 'Husky', 1),
(8, 'shiba-inu', 1),
(9, 'Boxer', 1),
(10, 'Maine Coon', 5),
(11, 'Chat bdes forêts Norvégiennes', 5),
(12, 'British shorthair', 5),
(13, 'Sphynx', 5),
(14, 'Perroquet jaco', 3),
(15, 'Perroquet timneh', 3),
(16, 'Serin à front d\'or', 4),
(17, 'Serin cini', 4),
(18, 'Serin syriaque', 4),
(19, 'Serin des Canaries', 4),
(20, 'Serin du Cap', 4),
(21, 'Serin à calotte jaune', 4),
(22, 'Serin à tête noire', 4),
(23, 'Serin alario', 4);

-- --------------------------------------------------------

--
-- Structure de la table `s_shelter`
--

DROP TABLE IF EXISTS `s_shelter`;
CREATE TABLE IF NOT EXISTS `s_shelter` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(150) NOT NULL,
  `s_adresse` varchar(255) NOT NULL,
  `s_city` varchar(150) NOT NULL,
  `s_phone` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_shelter`
--

INSERT INTO `s_shelter` (`s_id`, `s_name`, `s_adresse`, `s_city`, `s_phone`) VALUES
(1, 'L\'hirondelle', '4 rue de la plaine', 'Lyon', 460253514),
(2, 'SPA stetienne', '405 parc d\'activitée de la roseray', 'Saint-Etienne', 415698435);

-- --------------------------------------------------------

--
-- Structure de la table `s_speciality_choice`
--

DROP TABLE IF EXISTS `s_speciality_choice`;
CREATE TABLE IF NOT EXISTS `s_speciality_choice` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(50) NOT NULL,
  `sc_fk_groomer` int(11) NOT NULL,
  PRIMARY KEY (`sc_id`),
  KEY `s_speciality_to_groomer` (`sc_fk_groomer`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_speciality_choice`
--

INSERT INTO `s_speciality_choice` (`sc_id`, `sc_name`, `sc_fk_groomer`) VALUES
(1, 'Ornithologie', 2),
(2, 'Cynologie', 1),
(3, 'Felin', 1),
(4, 'NAC', 2);

-- --------------------------------------------------------

--
-- Structure de la table `s_specie_choice`
--

DROP TABLE IF EXISTS `s_specie_choice`;
CREATE TABLE IF NOT EXISTS `s_specie_choice` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(255) NOT NULL,
  `sc_gender` varchar(255) NOT NULL,
  `sc_family` varchar(255) NOT NULL,
  `sc_scientific_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_specie_choice`
--

INSERT INTO `s_specie_choice` (`sc_id`, `sc_name`, `sc_gender`, `sc_family`, `sc_scientific_name`) VALUES
(1, 'Chien', 'Canis', 'Canidae', 'Canis lupus familiaris'),
(3, 'Oiseaux_Psitaciforme', 'Psittacus', 'Psittacidae', 'Psittacus'),
(4, 'Oiseaux_Fringiforme', 'Serinus', 'Fringillidae', 'Serinus'),
(5, 'Chat', 'Felis', 'Felidae', 'Felis silvestris catus');

-- --------------------------------------------------------

--
-- Structure de la table `s_type_choice`
--

DROP TABLE IF EXISTS `s_type_choice`;
CREATE TABLE IF NOT EXISTS `s_type_choice` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tc_name` varchar(50) NOT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s_type_choice`
--

INSERT INTO `s_type_choice` (`tc_id`, `tc_name`) VALUES
(1, 'Terrarium'),
(2, 'Voliere'),
(3, 'Cage'),
(4, 'Parc grillagé');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `s_animal`
--
ALTER TABLE `s_animal`
  ADD CONSTRAINT `s_animal_to_enclosure` FOREIGN KEY (`a_fk_enclosure_id`) REFERENCES `s_enclosure` (`e_id`),
  ADD CONSTRAINT `s_animal_to_gender` FOREIGN KEY (`a_fk_gender_id`) REFERENCES `s_gender_choice` (`gc_id`),
  ADD CONSTRAINT `s_animal_to_groomer` FOREIGN KEY (`a_fk_favorite_groomer_id`) REFERENCES `s_groomer` (`g_id`),
  ADD CONSTRAINT `s_animal_to_owner` FOREIGN KEY (`a_fk_owner_id`) REFERENCES `s_owner` (`o_id`),
  ADD CONSTRAINT `s_animal_to_race` FOREIGN KEY (`a_fk_race_id`) REFERENCES `s_race_choice` (`rc_id`),
  ADD CONSTRAINT `s_animal_to_specie` FOREIGN KEY (`a_fk_specie_id`) REFERENCES `s_specie_choice` (`sc_id`);

--
-- Contraintes pour la table `s_enclosure`
--
ALTER TABLE `s_enclosure`
  ADD CONSTRAINT `s_enclosure_ibfk_1` FOREIGN KEY (`e_fk_shelter`) REFERENCES `s_shelter` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_enclosure_ibfk_2` FOREIGN KEY (`e_fk_type`) REFERENCES `s_type_choice` (`tc_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `s_groomer`
--
ALTER TABLE `s_groomer`
  ADD CONSTRAINT `s_groomer_to_animal` FOREIGN KEY (`g_fk_animal_id`) REFERENCES `s_animal` (`a_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `s_groomer_to_gender` FOREIGN KEY (`g_fk_gender_id`) REFERENCES `s_gender_choice` (`gc_id`),
  ADD CONSTRAINT `s_groomer_to_shelter` FOREIGN KEY (`g_fk_shelter_id`) REFERENCES `s_shelter` (`s_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `s_groomer_to_speciality` FOREIGN KEY (`g_fk_speciality_id`) REFERENCES `s_speciality_choice` (`sc_id`),
  ADD CONSTRAINT `s_groomer_to_superior` FOREIGN KEY (`g_fk_superior_id`) REFERENCES `s_groomer` (`g_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `s_race_choice`
--
ALTER TABLE `s_race_choice`
  ADD CONSTRAINT `s_race_to_specie` FOREIGN KEY (`rc_fk_specie_id`) REFERENCES `s_specie_choice` (`sc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `s_speciality_choice`
--
ALTER TABLE `s_speciality_choice`
  ADD CONSTRAINT `s_speciality_to_groomer` FOREIGN KEY (`sc_fk_groomer`) REFERENCES `s_groomer` (`g_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
