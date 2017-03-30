# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.17)
# Base de données: technote
# Temps de génération: 2017-03-30 09:57:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table TN_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_comments`;

CREATE TABLE `TN_comments` (
  `id_comments` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `head` varchar(256) DEFAULT NULL,
  `commentar` longtext,
  `title` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_comments`),
  KEY `fk_commentars_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_commentars_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `TN_technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_comments` WRITE;
/*!40000 ALTER TABLE `TN_comments` DISABLE KEYS */;

INSERT INTO `TN_comments` (`id_comments`, `idx_technicalnote`, `head`, `commentar`, `title`)
VALUES
	(1,1,'Informations générales concérnant l\'acceuil des techniciens son.','Notre technicien son vient avec sa propre console de mixage et ces reck d\'effets. 2 lignes RJ45 de la scene aux régies doivent étre mises en place pour connecter les rack d\'entrées a la console. Un système de diffusion de marque profesionelle et calé par une personne compétante doit étre installé. L\'ingénieur responsable du systéme de diffusion doit étre présent lors de l\'acceuil de notre technicien en cas de question. Si la salle ne permet pas de venir avec notre console, veuillez transmetre a l\'avance toutes les informations techniques a notre téchnicien son.','Acceuil technique'),
	(2,1,'Informations pour les systèmes de diffusions fournis.','Si le système de diffusion est fourni par la salle veuillez :\nFournir une systéme de marque profesionnelle correctement dimensionnée pour la salle et le public.\nLe système doit avoir été calé par un profesionnel gâce a des outils de mesure correctement calibrés.','Diffusion'),
	(3,21,'test','Lorem ipsum dolor sit amet.','test');

/*!40000 ALTER TABLE `TN_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table TN_contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_contacts`;

CREATE TABLE `TN_contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `function` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `fk_contacts_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_contacts_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `TN_technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_contacts` WRITE;
/*!40000 ALTER TABLE `TN_contacts` DISABLE KEYS */;

INSERT INTO `TN_contacts` (`id_contact`, `idx_technicalnote`, `name`, `email`, `phone`, `website`, `function`)
VALUES
	(1,1,'Bastien Nicoud','bastien.nicoud@cpnv.ch','0793993399','www.monsite.ch','manager'),
	(2,1,'Jean-pierre Fillou','jp@tralala.ch','4848884848','www.tralala.ch','producer'),
	(6,21,'Tutu','tutu@test.com','1234567890','tutu.test','testeur');

/*!40000 ALTER TABLE `TN_contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table TN_informations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_informations`;

CREATE TABLE `TN_informations` (
  `id_information` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `band` varchar(256) DEFAULT NULL,
  `descriptio` longtext,
  `date` datetime DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `stageplan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_information`),
  KEY `fk_informations_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_informations_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `TN_technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_informations` WRITE;
/*!40000 ALTER TABLE `TN_informations` DISABLE KEYS */;

INSERT INTO `TN_informations` (`id_information`, `idx_technicalnote`, `band`, `descriptio`, `date`, `image`, `stageplan`)
VALUES
	(1,1,'Pink Floyd','Pink Floyd est un groupe de rock progressif et psychédélique britannique formé en 1965 à Londres. Il est considéré comme un pionnier et un représentant majeur de ces styles musicaux.','2005-03-20 17:00:00','1pinkfloyd.jpg','1pinkfloyd.jpg'),
	(2,2,'Toto','Toto est un groupe de rock américain créé en 1976 par Jeff Porcaro.','2006-06-30 00:00:00','2toto.jpg','2toto.jpg'),
	(16,21,'Daft Punk','Daft Punk est un groupe français de musique électronique originaire de Paris, composé de Thomas Bangalter et Guy-Manuel de Homem-Christo. Actif depuis 1993, le groupe participe à la création et à la démocratisation du mouvement de musique électronique baptisé french touch. Ils font partie des artistes français s\'exportant le mieux à l\'étranger, et ce depuis la sortie de leur premier véritable succès, Da Funk en 1996. Une des originalités des Daft Punk est la culture de leur notoriété d\'artistes indépendants et sans visage, portant toujours en public des casques et des costumes. Ils s\'inspirent du film Phantom of the Paradise de Brian De Palma.','2017-03-22 00:00:00','21DaftPunk.jpg','21DaftPunk.jpg'),
	(17,23,'test','test','2017-03-15 00:00:00','23test.jpg','23test.jpg');

/*!40000 ALTER TABLE `TN_informations` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table TN_musicians
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_musicians`;

CREATE TABLE `TN_musicians` (
  `id_musician` int(11) NOT NULL AUTO_INCREMENT,
  `Idx_technicalnote` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `instrument` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_musician`),
  KEY `fk_musicians_technicalnotes1_idx` (`Idx_technicalnote`),
  CONSTRAINT `fk_musicians_technicalnotes1` FOREIGN KEY (`Idx_technicalnote`) REFERENCES `TN_technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_musicians` WRITE;
/*!40000 ALTER TABLE `TN_musicians` DISABLE KEYS */;

INSERT INTO `TN_musicians` (`id_musician`, `Idx_technicalnote`, `name`, `instrument`)
VALUES
	(1,1,'Jonathan','Drum'),
	(2,1,'Mark','Guitar'),
	(3,1,'Timo','Guitar'),
	(4,1,'Nathan','Bass'),
	(5,1,'Kevin','Lead vocal'),
	(6,21,'Jean edourd','Bandoneon');

/*!40000 ALTER TABLE `TN_musicians` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table TN_patchlists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_patchlists`;

CREATE TABLE `TN_patchlists` (
  `id_patchlist` int(11) NOT NULL AUTO_INCREMENT,
  `idx_technicalnote` int(11) NOT NULL,
  `input` varchar(128) DEFAULT NULL,
  `instrument` varchar(256) DEFAULT NULL,
  `microphone` varchar(256) DEFAULT NULL,
  `fx` varchar(256) DEFAULT NULL,
  `monitormix` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_patchlist`),
  KEY `fk_patchlists_technicalnotes1_idx` (`idx_technicalnote`),
  CONSTRAINT `fk_patchlists_technicalnotes1` FOREIGN KEY (`idx_technicalnote`) REFERENCES `TN_technicalnotes` (`id_technicalnote`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_patchlists` WRITE;
/*!40000 ALTER TABLE `TN_patchlists` DISABLE KEYS */;

INSERT INTO `TN_patchlists` (`id_patchlist`, `idx_technicalnote`, `input`, `instrument`, `microphone`, `fx`, `monitormix`)
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
	(13,1,'13','Lead','KM 105',NULL,'5'),
	(14,21,'01','Guitar','D.I.','Reverb plate','5'),
	(15,21,NULL,'Bandoneon',NULL,NULL,NULL),
	(16,21,NULL,'Bandoneon',NULL,NULL,NULL),
	(17,21,NULL,'Bandoneon',NULL,NULL,NULL);

/*!40000 ALTER TABLE `TN_patchlists` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table TN_technicalnotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_technicalnotes`;

CREATE TABLE `TN_technicalnotes` (
  `id_technicalnote` int(11) NOT NULL AUTO_INCREMENT,
  `idx_user` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` longtext,
  `lastedit` datetime DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `linkhash` varchar(256) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_technicalnote`),
  KEY `fk_technicalnotes_users_idx` (`idx_user`),
  CONSTRAINT `fk_technicalnotes_users` FOREIGN KEY (`idx_user`) REFERENCES `TN_users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_technicalnotes` WRITE;
/*!40000 ALTER TABLE `TN_technicalnotes` DISABLE KEYS */;

INSERT INTO `TN_technicalnotes` (`id_technicalnote`, `idx_user`, `name`, `description`, `lastedit`, `pincode`, `linkhash`, `public`)
VALUES
	(1,5,'Pink Floyd','Fiche technique globale du groupe, informations générales pour les plateaux classiques.','2017-03-20 17:00:00',5643,'?id=1',1),
	(2,5,'Toto','Informations pours les technicient et responsables des salles visitées.','2017-03-22 17:00:00',7788,'?id=2',1),
	(21,5,'Daft Punk (simple)','Fiche technique pour les concerts de moyenne envergure, 2 sur scene.','2017-03-29 18:37:22',4321,'?id=21',1),
	(23,5,'test','test','2017-03-30 11:36:14',1234,'?id=23',1);

/*!40000 ALTER TABLE `TN_technicalnotes` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table TN_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TN_users`;

CREATE TABLE `TN_users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `remember` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TN_users` WRITE;
/*!40000 ALTER TABLE `TN_users` DISABLE KEYS */;

INSERT INTO `TN_users` (`id_users`, `username`, `email`, `password`, `remember`)
VALUES
	(4,'test1','test1@test.ch','$2y$10$2CBCJcjLGR7tgKRqc4mK6u/lDxSmUzx2idGiUYPD/TZqHEoVCirLS',NULL),
	(5,'admin','admin@abc.ch','$2y$10$jGV/VHrxSDIftm5rqaqV5uxPzLg6O.MzV5jtdYm17Cv2SN15oS8FK',NULL);

/*!40000 ALTER TABLE `TN_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
