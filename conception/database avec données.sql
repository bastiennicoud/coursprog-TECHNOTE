# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.17)
# Base de données: technote
# Temps de génération: 2017-03-10 09:37:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `head` varchar(256) DEFAULT NULL,
  `commentar` longtext,
  `title` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_comments`),
  KEY `fk_commentars_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_commentars_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id_comments`, `idx_technicalnote`, `head`, `commentar`, `title`)
VALUES
	(1,1,'Informations générales concérnant l\'acceuil des techniciens son.','Notre technicien son vient avec sa propre console de mixage et ces reck d\'effets. 2 lignes RJ45 de la scene aux régies doivent étre mises en place pour connecter les rack d\'entrées a la console. Un système de diffusion de marque profesionelle et calé par une personne compétante doit étre installé. L\'ingénieur responsable du systéme de diffusion doit étre présent lors de l\'acceuil de notre technicien en cas de question. Si la salle ne permet pas de venir avec notre console, veuillez transmetre a l\'avance toutes les informations techniques a notre téchnicien son.','Acceuil technique');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `function` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `fk_contacts_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_contacts_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`id_contact`, `idx_technicalnote`, `name`, `email`, `phone`, `website`, `function`)
VALUES
	(1,1,'Bastien Nicoud','bastien.nicoud@cpnv.ch','0793993399','www.monsite.ch','manager');

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table informations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `informations`;

CREATE TABLE `informations` (
  `id_information` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `band` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `stageplan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_information`),
  KEY `fk_informations_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_informations_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `informations` WRITE;
/*!40000 ALTER TABLE `informations` DISABLE KEYS */;

INSERT INTO `informations` (`id_information`, `idx_technicalnote`, `band`, `date`, `stageplan`)
VALUES
	(1,1,'Pink Floyd','2005-03-20 17:00:00','img/plans/pinkfloyd.jpg');

/*!40000 ALTER TABLE `informations` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table musicians
# ------------------------------------------------------------

DROP TABLE IF EXISTS `musicians`;

CREATE TABLE `musicians` (
  `id_musician` int(11) NOT NULL AUTO_INCREMENT,
  `Idx_technicalnote` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `instrument` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_musician`),
  KEY `fk_musicians_technicalnotes1_idx` (`Idx_technicalnote`),
  CONSTRAINT `fk_musicians_technicalnotes1` FOREIGN KEY (`Idx_technicalnote`) REFERENCES `technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `musicians` WRITE;
/*!40000 ALTER TABLE `musicians` DISABLE KEYS */;

INSERT INTO `musicians` (`id_musician`, `Idx_technicalnote`, `name`, `instrument`)
VALUES
	(1,1,'Jonathan','Drum'),
	(2,1,'Mark','Guitar'),
	(3,1,'Timo','Guitar'),
	(4,1,'Nathan','Bass'),
	(5,1,'Kevin','Lead vocal');

/*!40000 ALTER TABLE `musicians` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table patchlists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `patchlists`;

CREATE TABLE `patchlists` (
  `id_patchlist` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `input` varchar(128) DEFAULT NULL,
  `instrument` varchar(256) DEFAULT NULL,
  `microphone` varchar(256) DEFAULT NULL,
  `fx` varchar(256) DEFAULT NULL,
  `monitormix` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_patchlist`),
  KEY `fk_patchlists_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_patchlists_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `patchlists` WRITE;
/*!40000 ALTER TABLE `patchlists` DISABLE KEYS */;

INSERT INTO `patchlists` (`id_patchlist`, `idx_technicalnote`, `input`, `instrument`, `microphone`, `fx`, `monitormix`)
VALUES
	(1,1,'01','Kick IN','SHURE Beta 91a',NULL,'1'),
	(2,1,'02','Kick OUT','AUDIX D6',NULL,'1'),
	(3,1,'03','Snare','AUDIX D4',NULL,'1'),
	(4,1,'04','Tom 1','AUDIX D4',NULL,'1'),
	(5,1,'05','Tom 2','AUDIX D4',NULL,'1'),
	(6,1,'06','Hit Hat','Pearl TL66',NULL,'1'),
	(7,1,'07','OH L','KM 186',NULL,'1'),
	(8,1,'08','OH R','KM 186',NULL,'1'),
	(9,1,'09','Gtr 1','BSS',NULL,'2'),
	(10,1,'10','Gtr 1','e906',NULL,'2'),
	(11,1,'11','Gtr 2','MD-421',NULL,'3'),
	(12,1,'12','Bass','BSS',NULL,'4'),
	(13,1,'13','Lead','KM 105',NULL,'5');

/*!40000 ALTER TABLE `patchlists` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table technicalnotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `technicalnotes`;

CREATE TABLE `technicalnotes` (
  `id_technicalnote` int(11) NOT NULL AUTO_INCREMENT,
  `idx_user` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `lastedit` datetime DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `linkhash` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_technicalnote`),
  KEY `fk_technicalnotes_users_idx` (`idx_user`),
  CONSTRAINT `fk_technicalnotes_users` FOREIGN KEY (`idx_user`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `technicalnotes` WRITE;
/*!40000 ALTER TABLE `technicalnotes` DISABLE KEYS */;

INSERT INTO `technicalnotes` (`id_technicalnote`, `idx_user`, `name`, `lastedit`, `pincode`, `linkhash`)
VALUES
	(1,3,'Pink Floyd','2010-03-20 17:00:00',5643,'un hash généré par php');

/*!40000 ALTER TABLE `technicalnotes` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `remember` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id_users`, `username`, `password`, `remember`)
VALUES
	(1,'admin','ici un hash','0'),
	(2,'bnicoud','ici un hash','0'),
	(3,'mstasi','ici un hash','0');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
