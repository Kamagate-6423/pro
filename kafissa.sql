-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 déc. 2020 à 09:56
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kafissa`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id_adm` int(3) NOT NULL AUTO_INCREMENT,
  `nom_adm` varchar(50) NOT NULL,
  `prenom_adm` varchar(50) NOT NULL,
  `tel_adm` varchar(20) NOT NULL,
  `pass_adm` varchar(20) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_cli` int(10) NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(50) NOT NULL,
  `prenom_cli` varchar(50) NOT NULL,
  `email_cli` varchar(50) NOT NULL,
  `pass_cli` varchar(20) NOT NULL,
  `adresse_cli` text NOT NULL,
  `tel_cli` varchar(50) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date_connexion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cli`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_cli`, `nom_cli`, `prenom_cli`, `email_cli`, `pass_cli`, `adresse_cli`, `tel_cli`, `date_inscription`, `date_connexion`) VALUES
(12, 'Bakary', 'Potter', 'kbakarysiriki@gmail.com', 'bakary', 'Daloa Soleil 2', '44513387', '2020-06-29 14:16:17', '2020-07-17 21:59:59'),
(17, 'KAMAGATE', 'EL HADJ MAMAN', 'kelm@gmail.com', 'Ali', 'Orly 2', '08877639', '2020-07-12 09:20:18', '2020-12-12 22:52:20'),
(5, 'Kone', 'Ali', 'ali5395@gmail.com', 'ali5395', 'Orly', '53959574', '2019-12-22 11:34:47', '2020-12-16 07:32:25'),
(21, 'KAMAGATE', 'El Maman', 'el.maman@gmail.com', 'kelm38', 'Daloa', '08877638', '2020-07-13 22:58:30', '2020-08-16 11:39:22');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_com` int(10) NOT NULL AUTO_INCREMENT,
  `id_cli` int(10) NOT NULL,
  `lieux_liv` text NOT NULL,
  `date_liv` date NOT NULL,
  `heure_liv` time(6) NOT NULL,
  `keys_pro` text NOT NULL,
  `qtes_pro` text NOT NULL,
  `prix_total` int(11) NOT NULL,
  `date_valid` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_com`, `id_cli`, `lieux_liv`, `date_liv`, `heure_liv`, `keys_pro`, `qtes_pro`, `prix_total`, `date_valid`) VALUES
(132, 17, 'Orly 2', '2020-12-12', '10:00:00.000000', '14,16,21,28,31', '1,1,2,1,1', 11300, '2020-12-09 21:53:27.000000'),
(128, 12, 'Daloa Soleil 2', '2020-07-26', '19:09:00.000000', '3,17,18,29,31', '2,1,1,1,1', 19800, '2020-07-17 22:04:28.000000');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `code` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`code`) VALUES
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?></textarea></td>\r\n			</tr>\r\n			<tr>\r\n				<td></td>\r\n				<td><a href=\"?id=1\"><input type=\"submit\" value=\"Valider la modification\"></a></td>\r\n			</tr>\r\n		</table>\r\n	</form>\r\n</fieldset>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?></textarea></td>\r\n			</tr>\r\n			<tr>\r\n				<td></td>\r\n				<td><a href=\"?id=1\"><input type=\"submit\" value=\"Valider la modification\"></a></td>\r\n			</tr>\r\n		</table>\r\n	</form>\r\n</fieldset>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?></textarea></td>\r\n			</tr>\r\n			<tr>\r\n				<td></td>\r\n				<td><a href=\"?id=1\"><input type=\"submit\" value=\"Valider la modification\"></a></td>\r\n			</tr>\r\n		</table>\r\n	</form>\r\n</fieldset>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>'),
('<?php \r\n	include(\'bdd.php\');\r\n	$bdd= new BDD();\r\n	\r\n	if(isset($_POST[\'categorie\']) && $_POST[\'categorie\']!=\"\"){\r\n			$cate=$_POST[\'categorie\'];\r\n			$info=$_POST[\'info\'];\r\n\r\n			$reqInfo=\'UPDATE information SET\r\n							info = :info, \r\n							date_info = NOW()\r\n							WHERE categorie = :cate\';\r\n							\r\n			$varInfo= array(\r\n					\'cate\' =>$cate,\r\n					\'info\'=>$info\r\n					);\r\n				$bdd->requetes($reqInfo,$varInfo);\r\n			\r\n		$_SESSION[\'adminAlert\']=\"L\'information de \".$cate.\" a bien été modifiée\";\r\n	}\r\n	\r\n	\r\n	$reqInfo=\'SELECT info FROM information WHERE categorie=:cate\';\r\n		$varInfo=array(\r\n				\'cate\'=>\"apropos\"\r\n		);\r\n		$infoLine = $bdd->requetes($reqInfo,$varInfo);\r\n		$donneApropos=$infoLine->fetch();\r\n?>\r\n\r\n<fieldset><legend>Modifier les information</legend>\r\n	<form method=\"post\" action=\"?admin=infoLine\" enctype=\"multipart/form-data\" class=\"form col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n		<table>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"categorie\">Catégorie</label></td>\r\n				<td>\r\n					<select id=\"categorie\" name=\"categorie\">\r\n						<option value=\"infoLine\">Info-line</option>\r\n						<option value=\"apropos\" selected>Apropos</option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr style=\"margin-bottom:5px\">\r\n				<td><label for=\"info\">Information</label></td>\r\n				<td><textarea type=\"text\" id=\"info\" name=\"info\"><?=$donneApropos[\'info\']?>');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `categorie` varchar(50) DEFAULT NULL,
  `info` mediumtext NOT NULL,
  `date_info` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`categorie`, `info`, `date_info`) VALUES
('infoLine', '<marquee bgcolor=\"orange\">Nous sommes présents à Daloa</marquee>', '2020-12-07'),
('apropos', '<h1 style=\"text-align:center\"> DE LA CHAIR FRAÎCHE</h1>', '2020-12-16');

-- --------------------------------------------------------

--
-- Structure de la table `passes`
--

DROP TABLE IF EXISTS `passes`;
CREATE TABLE IF NOT EXISTS `passes` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` text,
  `tel` varchar(50) DEFAULT NULL,
  `date_message` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `passes`
--

INSERT INTO `passes` (`id`, `nom`, `prenom`, `tel`, `date_message`) VALUES
(3, 'Kone', 'Abou', '08877636', '2020-07-10 22:18:12'),
(4, 'Bakary', 'Potter', '44513387', '2020-07-10 22:29:59'),
(6, 'KAMAGATE', 'EL HADJ MAMAN', '08877640', '2020-07-12 08:46:58');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(30) NOT NULL,
  `image_pro` varchar(50) NOT NULL,
  `nom_pro` varchar(50) NOT NULL,
  `chemin_desti` varchar(60) NOT NULL,
  `inter_poids` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `info_pro` text NOT NULL,
  `mot_cle` text,
  `binaire` blob NOT NULL,
  `date_modif` date NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_pro`, `categorie`, `image_pro`, `nom_pro`, `chemin_desti`, `inter_poids`, `prix`, `stock`, `info_pro`, `mot_cle`, `binaire`, `date_modif`) VALUES
(2, 'Pchair', 'IMG_20200722_155852_8.jpg', 'Poulet', 'pouletCom', '2 Kg', '4000', 'En Stock', 'Poulet local bien frais, abattu, plumé, emballé dans les conditions d\'hygiènes.', 'Poulet entier, poulet moyen, poulet nettoyé, poulet emballé, poulet plumé, poulet abattu', '', '2020-12-13'),
(3, 'Pchair', 'IMG_20200722_154444_2CS.jpg', 'Poulet', '', '2,5 Kg', '5000', 'En Stock', 'Poulet local bien frais, abattu, plumé, emballé dans les conditions d\'hygiènes.', 'Poulet entier, poulet moyen, poulet nettoyé, poulet emballé, poulet plumé, poulet abattu', '', '2020-12-13'),
(4, 'Pchair', 'IMG_20200722_152001_3.jpg', 'Poulet', '', '3 Kg', '7000', 'Stock epuisé', 'Poulet local bien frais, abattu, plumé et emballé dans les conditions d\'hygiènes.', 'Poulet entier, poulet moyen, poulet nettoyé, poulet emballé, poulet plumé, poulet abattu', '', '2020-12-13'),
(6, 'Mchair', 'IMG_20200813_162412_9.jpg', 'Poulet ensemblé', '', '1 Kg', '2500', 'En Stock', 'Poulet local bien frais, abattu, plumé, emballé et découpé dans les conditions d\'hygiènes.', 'Poulet découpé, morceaux de poulet, poulet nettoyé', '', '2020-12-13'),
(7, 'Mchair', 'aile.jpg', 'Ailes de poulets', '', '1 Kg', '2000', 'En Stock', 'Ces ailes sont très bien nettoyés et emballé pour vous', 'aile de poulet, ailes de poulets', '', '2020-12-13'),
(8, 'Mchair', 'cuisse.jpg', 'Cuisses ', 'pouletMor', '1 Kg', '2500', 'En Stock', 'Bien nettoyé et emballé', 'Cuisses de poulets, \r\n cuisse de poulet, cuisse', '', '2020-12-13'),
(9, 'Mchair', 'poitrine.jpg', 'poitrine de poulet', '', '1 Kg', '2500', 'En Stock', 'Cuit de poulet bien nettoyé', 'Cuit de poulet', '', '2020-12-14'),
(10, 'Mchair', 'pattes.jpg', 'Pattes de poulets', '', '1 Kg', '1700', 'En Stock', 'Des pattes de poulets bien gros-gros et bien nettoyé', 'Pattes de poulets, pattes', '', '2020-12-13'),
(11, 'Mchair', 'gesier.jpg', 'gésier de poulet', '', '1 Kg', '2000', 'En Stock', 'Du gésiers bio', 'gésiers de poulets, gésiers', '', '2020-12-13'),
(13, 'Mchair', 'tete2.jpeg', 'Tête de poulets', '', '1 Kg', '1000', 'En Stock', 'Têtes de poulets de chair bien nettoyés', 'têtes de poulets, tête de poulet, tête', '', '2020-12-13'),
(14, 'Ppondeuse', 'pondeuse.jpg', 'Pondeuse', 'pondeuses', '1,25 Kg', '3500', 'En Stock', 'Produit localement, abattu, plumé et emballé dans les condition d\'hygiène', 'poulet pondeuses', '', '2020-12-13'),
(15, 'Ppondeuse', 'chair.jpg', 'Pondeuse', '', '1,1 Kg', '3000', 'En Stock', 'Produit localement, abattu, plumé et emballé dans les condition d\'hygiène', 'poulet pondeuses', '', '2020-12-13'),
(16, 'boeuf', 'IMG_20200805_120214_3.jpg', 'Viande sans os', '', '1 Kg', '2500', 'En Stock', 'Nettoyée et emballée dans les conditions d\'hygiène', 'boeufs, viande sans os, viande haché', '', '2020-12-13'),
(17, 'boeuf', 'Cote_de_mouton.jpg', 'Côte de boeuf', 'boeufs', '1 Kg', '2500', 'En Stock', 'Viande locale, nettoyée et emballée dans les conditions d\'hygène', 'boeufs, viande, côte de boeuf', '', '2020-12-13'),
(18, 'boeuf', 'foieBoeuf.jpg', 'Foie de boeuf', '', '1 Kg', '2400', 'En Stock', 'Foie de bœuf local', 'Foie de boeuf local', '', '2020-12-13'),
(19, 'boeuf', 'Vhache.jpg', 'Viande hachée', '', '1 Kg', '3000', 'En Stock', 'Viande hachée de bœuf local', 'viande hachée', '', '2020-12-13'),
(20, 'mouton', 'cote de boeuf.jpg', 'Mouton', 'moutons', '1 Kg', '3000', 'En Stock', 'Viande de mouton  local', 'viande de mouton local, viande locale, viande à os', '', '2020-12-13'),
(21, 'mouton', 'cuisse_de_mouton.jpg', 'Cuisse de mouton', '', '1 Kg', '3500', 'En Stock', 'cuisse de mouton local', 'cuisse de mouton local, viande de mouton', '', '2020-12-13'),
(22, '', 'Cote_de_mouton1.jpg', 'Côte de bouc', 'boucs', '1,2 Kg à 1,5 Kg', '1800', 'En Stock', '', NULL, '', '2020-10-30'),
(23, '', 'bouc_viande.jpg', 'Viande de bouc', '', '1 Kg', '3500', 'En Stock', 'Viande de bouc bien formé, une viande très riche en proteine', NULL, '', '2020-12-11'),
(24, 'bouc', 'Viandes-de-mouton.png', 'Viande sans os', '', '1 Kg', '3500', 'En Stock', 'de très bonne viande', 'viande de bouc, ensemble de viande', '', '2020-12-13'),
(25, 'bouc', 'beef-intestine2.jpg', 'Intestin de bouc', '', '1 Kg', '2500', 'En Stock', 'De très bon intestin de bouc', 'Intestin de bouc', '', '2020-12-13'),
(26, 'bouc', 'Cabrito.png', 'Cuisse de bouc', '', '1 kg', '3000', 'En Stock', 'Cuisse de bouc entier', 'cuisse de bouc', '', '2020-12-13'),
(27, 'bouc', 'viandehache.jpg', 'haché de bouc', '', '1 Kg', '4000', 'En Stock', 'Viande haché de bouc', 'Viande haché de bouc', '', '2020-12-13'),
(28, 'poisson', 'Chinchard1.jpg', 'Chinchard', '', '1 kg', '1300', 'En Stock', 'poisson chinchard', 'poisson chinchard, poissons, chacha', '', '2020-12-13'),
(29, 'poisson', 'capitaine_frais.jpg', 'Capitaine', 'poissons', '1 Kg', '1500', 'En Stock', 'poisson capitaine', 'poissons, poisson capitaine', '', '2020-12-13'),
(30, 'poisson', 'IMG_20200723_151410_3.jpg', 'Sosso', '', '1 Kg', '1500', 'En Stock', 'poisson sosso', 'poisson sosso, sossos', '', '2020-12-13'),
(31, 'poisson', 'Machoiron.jpg', 'Machoiron', '', '1 Kg', '1500', 'En Stock', 'Marchoiron', 'Poisson marchoiron, marchoirons, marchoiran', '', '2020-12-13'),
(32, 'poisson', 'Tilapia.jpeg', 'Tilapia', '', '1 Kg', '1500', 'En Stock', 'Tilapia', 'poisson tilapia bio, poissons, poisson local', '', '2020-12-13'),
(36, 'cokele', 'cokeleblanc.jpg', 'Côkélé', 'cokeles', '1,5 Kg', '3500', 'En Stock', 'De très bon poulet côkélés', 'côkélés, cokélé', '', '2020-12-14'),
(37, 'Pafricain', 'Poulet-Africain-traditionnel.jpg', 'Poulet Afric', 'pafricains', '1,25 Kg', '3500', 'Stock epuisé', 'Poulet bio, abattu, nettoyé et emballé dans les conditions d\'hygiène et d\'HALAL', 'poulet africains, poulet bio, poulet naturel, poulets, poule', '', '2020-12-14'),
(38, 'pintade', 'pintade1.jpg', 'Pintade', 'pintades', '1 Kg', '7000', 'En Stock', 'Pintade bio, abattu, nettoyé et emballé dans les conditions d\'hygiène et d\'HALAL', 'pintade bio, pintades', '', '2020-12-14'),
(39, 'canard', 'canard1.jpg', 'Canard', 'canards', '2 Kg', '7000', 'Stock epuisé', 'Canard bio', 'Canards, canard bio', '', '2020-12-14'),
(40, 'condiment', 'piment.jpg', 'Piment frais', 'condiments', '0,2 g', '25', 'En Stock', 'Piments frais', 'piments, piment frais, piments frais', '', '2020-12-15'),
(41, 'carrousel', 'pondeuseV.jpg', 'Pondeuse', 'pondeuse', '', '', 'active', 'De très bon poulet', '', '', '2020-12-16'),
(42, 'carrousel', 'canard-cru.jpg', 'Canard', 'canards', '', '', '', 'Des canards battus, nettoyés et emballés dans les conditions d\'hygiènes et d\'HALAL', '', '', '2020-12-16'),
(43, 'carrousel', 'pouletAfric.jpg', 'Poulets Africains', 'pafricains', '', '', '', 'Poulet bio, abattu, nettoyé et emballé dans les conditions d\'hygiène et d\'HALAL\r\nDes Poulet Africain dont le poids est aux environs de 1,25 Kg coût 3500fcfa', '', '', '2020-12-16'),
(33, 'oeuf', 'oeuf60_1.jpg', 'Oeufs', 'oeufs', 'le carton', '2500', 'En Stock', 'Œufs de poulet local', 'œufs produits localement, oeufs locaux, oeuf', '', '2020-12-13'),
(34, 'oeuf', 'oeuf60_1.jpg', 'Poulet de chair', '', 'le carton', '2000', 'En Stock', 'oeufs de poulet local', 'œufs produits localement, oeufs locaux, oeuf', '', '2020-12-13'),
(35, 'oeuf', 'oeuf60_1.jpg', 'Poulet de chair', '', 'le carton', '3000', 'En Stock', 'oeufs de poule africaine', 'œufs, oeufs de poule africaine, oeuf de poule africain', '', '2020-12-13'),
(1, 'Pchair', 'IMG_20200722_160614_5.jpg', 'Poulet', '', '1,5 Kg', '3000', 'active', 'Poulet local bien frais, abattu, plumé, emballé dans les conditions d\'hygiènes.', 'Poulet entier, poulet moyen, poulet nettoyé, poulet emballé, poulet plumé, poulet abattu', '', '2020-12-13'),
(5, '', 'capitaine_frais.jpg', 'Poulet de chair', '', '1 Kg', '2500', 'En Stock ou active', 'kkk', NULL, '', '2020-07-05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits` ADD FULLTEXT KEY `nom_pro` (`nom_pro`,`info_pro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
