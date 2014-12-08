-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Décembre 2014 à 00:14
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'jouet'),
(2, 'linge'),
(3, 'Outils');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(32) unsigned NOT NULL,
  `produit_id` int(32) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`),
  KEY `produit_id` (`produit_id`),
  KEY `categorie_id_2` (`categorie_id`),
  KEY `produit_id_2` (`produit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id`, `categorie_id`, `produit_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantite` int(32) NOT NULL DEFAULT '0',
  `prix` int(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `image`, `description`, `date`, `quantite`, `prix`) VALUES
(1, 'robot', 'http://www.quorrischarmyn.com/wp-content/uploads/2013/01/nod32robot.png', 'voici le robot de chez robotcoop.\r\nil vous fera vivre une superbe aventure\r\n:)', '2014-12-08 21:14:48', 10, 10),
(2, 'avion', 'http://3.bp.blogspot.com/-XtxvmOm60Ys/Te9GTGpltWI/AAAAAAAABeo/YuFKxMyXhAs/s1600/avion-personnage.gif', 'Rien de tel qu''un super avion pour devenir plus tard un chasseur de l’extrême. ', '2014-12-08 21:14:48', 3, 15),
(3, 'les Talons', 'http://fr.academic.ru/pictures/frwiki/84/Talon_haut_louboutin_150mm.jpg', 'Voici une superbe paire de talons, qui ferai frémir n''importe qu''elle copine autour de vous.', '2014-12-08 21:17:35', 12, 41),
(4, 'Veste Cuir', 'http://www.cuir-city.com/images/catalogue/pres_Blouson-Cityzen-Blouson-en-cuir-de-buffle-homme-1.jpg', 'Voici la veste en cuir avec laquelle on peut tout faire. \r\nVous n''aurez jamais froid.', '2014-12-08 21:17:35', 0, 210);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `adresse`, `email`, `password`, `admin`) VALUES
(4, 'Painchaud', 'Sylvain', '9 rue doré\r\n77000 Melun', 'legende_91@msn.com', '14c117c946bd97a5dd340d1aedf76dd61e90f1d2', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD CONSTRAINT `categorie_produit_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_produit_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
