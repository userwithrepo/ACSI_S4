-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 15 Février 2013 à 09:32
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `clsh`
--

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE IF NOT EXISTS `enfant` (
  `NO_ENF` int(11) NOT NULL AUTO_INCREMENT,
  `NO_FAM` int(11) NOT NULL,
  `NOM_ENF` varchar(255) DEFAULT NULL,
  `PRENOM_ENF` varchar(255) DEFAULT NULL,
  `ADR_ENF` varchar(255) DEFAULT NULL,
  `SEXE_ENF` varchar(255) DEFAULT NULL,
  `DATN_ENF` date DEFAULT NULL,
  `LIEU_NAISS_ENF` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO_ENF`),
  KEY `I_FK_ENFANT_FAMILLE` (`NO_FAM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`NO_ENF`, `NO_FAM`, `NOM_ENF`, `PRENOM_ENF`, `ADR_ENF`, `SEXE_ENF`, `DATN_ENF`, `LIEU_NAISS_ENF`) VALUES
(1, 1, 'Dupuit', 'Bernard', '', 'Masculin', '0000-00-00', ''),
(3, 1, 'Dupuit', 'Gérard', '', 'Masculin', '0000-00-00', ''),
(4, 1, 'Dupuit', 'Georges', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `NO_FACT` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_FACT` datetime DEFAULT NULL,
  `MONTANT_FACT` double DEFAULT NULL,
  `MODE_PAIEMENT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO_FACT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `NO_FAM` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_RESP` varchar(255) DEFAULT NULL,
  `PRE_RESP` varchar(255) DEFAULT NULL,
  `TYPE_RESP` varchar(255) DEFAULT NULL,
  `ADR_RESP` varchar(255) DEFAULT NULL,
  `TEL_RESP` varchar(255) DEFAULT NULL,
  `NOALLOC_CAF_RESP` varchar(255) DEFAULT NULL,
  `QF_RESP` varchar(255) DEFAULT NULL,
  `EN_VILLE` varchar(255) DEFAULT NULL,
  `BONS_VAC` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO_FAM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`NO_FAM`, `NOM_RESP`, `PRE_RESP`, `TYPE_RESP`, `ADR_RESP`, `TEL_RESP`, `NOALLOC_CAF_RESP`, `QF_RESP`, `EN_VILLE`, `BONS_VAC`) VALUES
(1, 'Marc', 'Marco', 'Père', '23 Rue du pré', '0303030303', '293848938', NULL, 'Nancy', NULL),
(2, 'Les Hector', 'pascal', 'père', '3 rue du puit', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `NO_INSCRIPTION` int(11) NOT NULL AUTO_INCREMENT,
  `NO_FACT` int(11) NOT NULL,
  `ARRET_BUS` varchar(255) DEFAULT NULL,
  `NO_UNITE` int(11) NOT NULL,
  `NO_ENF` int(11) NOT NULL,
  `DEDUC_JOUR` varchar(255) DEFAULT NULL,
  `NOM_ACCOMPAGNATEUR_ENF` varchar(255) DEFAULT NULL,
  `PRE_ACCOMPAGNATEUR_ENF` varchar(255) DEFAULT NULL,
  `MONTANT_INSCR` double DEFAULT NULL,
  `LIEU_INSCR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO_INSCRIPTION`),
  KEY `I_FK_INSCRIPTION_FACTURE` (`NO_FACT`),
  KEY `I_FK_INSCRIPTION_PTACCUEIL` (`ARRET_BUS`),
  KEY `I_FK_INSCRIPTION_UNITE` (`NO_UNITE`),
  KEY `I_FK_INSCRIPTION_ENFANT` (`NO_ENF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE IF NOT EXISTS `offre` (
  `NO_UNITE` int(11) NOT NULL,
  `SEM_SEJ` int(11) NOT NULL,
  `NB_PLACES_OFFERTES` int(11) DEFAULT NULL,
  `NB_PLACES_OCCUPEES` int(11) DEFAULT NULL,
  PRIMARY KEY (`NO_UNITE`,`SEM_SEJ`),
  KEY `I_FK_OFFRE_UNITE` (`NO_UNITE`),
  KEY `I_FK_OFFRE_SEMAINE` (`SEM_SEJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pour`
--

CREATE TABLE IF NOT EXISTS `pour` (
  `NO_INSCRIPTION` int(11) NOT NULL,
  `SEM_SEJ` int(11) NOT NULL,
  PRIMARY KEY (`NO_INSCRIPTION`,`SEM_SEJ`),
  KEY `I_FK_POUR_INSCRIPTION` (`NO_INSCRIPTION`),
  KEY `I_FK_POUR_SEMAINE` (`SEM_SEJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ptaccueil`
--

CREATE TABLE IF NOT EXISTS `ptaccueil` (
  `ARRET_BUS` varchar(255) NOT NULL,
  `NO_SITE` int(11) NOT NULL,
  PRIMARY KEY (`ARRET_BUS`),
  KEY `I_FK_PTACCUEIL_SITE` (`NO_SITE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE IF NOT EXISTS `semaine` (
  `SEM_SEJ` int(11) NOT NULL,
  `DU_SEM` int(11) DEFAULT NULL,
  `AU_EM` int(11) DEFAULT NULL,
  `NBJ_SEM` int(11) DEFAULT NULL,
  PRIMARY KEY (`SEM_SEJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `NO_SITE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_SITE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO_SITE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`NO_SITE`, `NOM_SITE`) VALUES
(1, 'Cool');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `EN_VILLE` varchar(255) NOT NULL,
  `CODE_GF` varchar(255) NOT NULL,
  `BONS_VAC` varchar(255) NOT NULL,
  `ALLOC_CAF` varchar(255) NOT NULL,
  `TARIF_JOUR` double DEFAULT NULL,
  PRIMARY KEY (`EN_VILLE`,`CODE_GF`,`BONS_VAC`,`ALLOC_CAF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE IF NOT EXISTS `unite` (
  `NO_UNITE` int(11) NOT NULL AUTO_INCREMENT,
  `NO_SITE_POSSÈDE` int(11) NOT NULL,
  `NO_SITE` int(11) DEFAULT NULL,
  `NOM_UNITÉ` int(11) DEFAULT NULL,
  PRIMARY KEY (`NO_UNITE`),
  KEY `I_FK_UNITE_SITE` (`NO_SITE_POSSÈDE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `ENFANT_ibfk_1` FOREIGN KEY (`NO_FAM`) REFERENCES `famille` (`NO_FAM`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `INSCRIPTION_ibfk_1` FOREIGN KEY (`NO_FACT`) REFERENCES `facture` (`NO_FACT`),
  ADD CONSTRAINT `INSCRIPTION_ibfk_2` FOREIGN KEY (`ARRET_BUS`) REFERENCES `ptaccueil` (`ARRET_BUS`),
  ADD CONSTRAINT `INSCRIPTION_ibfk_3` FOREIGN KEY (`NO_UNITE`) REFERENCES `unite` (`NO_UNITE`),
  ADD CONSTRAINT `INSCRIPTION_ibfk_4` FOREIGN KEY (`NO_ENF`) REFERENCES `enfant` (`NO_ENF`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `OFFRE_ibfk_1` FOREIGN KEY (`NO_UNITE`) REFERENCES `unite` (`NO_UNITE`),
  ADD CONSTRAINT `OFFRE_ibfk_2` FOREIGN KEY (`SEM_SEJ`) REFERENCES `semaine` (`SEM_SEJ`);

--
-- Contraintes pour la table `pour`
--
ALTER TABLE `pour`
  ADD CONSTRAINT `POUR_ibfk_1` FOREIGN KEY (`NO_INSCRIPTION`) REFERENCES `inscription` (`NO_INSCRIPTION`),
  ADD CONSTRAINT `POUR_ibfk_2` FOREIGN KEY (`SEM_SEJ`) REFERENCES `semaine` (`SEM_SEJ`);

--
-- Contraintes pour la table `ptaccueil`
--
ALTER TABLE `ptaccueil`
  ADD CONSTRAINT `PTACCUEIL_ibfk_1` FOREIGN KEY (`NO_SITE`) REFERENCES `site` (`NO_SITE`);

--
-- Contraintes pour la table `unite`
--
ALTER TABLE `unite`
  ADD CONSTRAINT `UNITE_ibfk_1` FOREIGN KEY (`NO_SITE_POSSÈDE`) REFERENCES `site` (`NO_SITE`);