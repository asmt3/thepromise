# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19)
# Database: shelterline
# Generation Time: 2014-06-11 16:09:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table agencies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agencies`;

CREATE TABLE `agencies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `agencies` WRITE;
/*!40000 ALTER TABLE `agencies` DISABLE KEYS */;

INSERT INTO `agencies` (`id`, `name`, `created`, `modified`, `email`)
VALUES
	(1,'Agency 1','2014-06-11 09:14:49','2014-06-11 09:14:49',''),
	(2,'Agency 2','2014-06-11 09:14:54','2014-06-11 09:14:54',''),
	(3,'fsdaifnasdiof','2014-06-11 10:58:41','2014-06-11 10:58:41','');

/*!40000 ALTER TABLE `agencies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table histories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `histories`;

CREATE TABLE `histories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `investigation_id` int(11) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;

INSERT INTO `histories` (`id`, `investigation_id`, `content`, `created`)
VALUES
	(1,1,'Text message: content','2014-11-11 00:00:00');

/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table investigations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `investigations`;

CREATE TABLE `investigations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) DEFAULT NULL,
  `shelter_id` int(11) DEFAULT NULL,
  `phone` varchar(128) DEFAULT '',
  `name` text,
  `description` text,
  `status` varchar(128) DEFAULT 'open',
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `investigations` WRITE;
/*!40000 ALTER TABLE `investigations` DISABLE KEYS */;

INSERT INTO `investigations` (`id`, `agency_id`, `shelter_id`, `phone`, `name`, `description`, `status`, `created`)
VALUES
	(1,1,NULL,NULL,'Survivor 1','Description of Sexual Violence','open',NULL);

/*!40000 ALTER TABLE `investigations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `investigation_id` int(11) DEFAULT NULL,
  `from` varchar(128) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `investigation_id`, `from`, `content`, `created`, `modified`)
VALUES
	(1,1,'23r23f3','First Message\n\n','2014-06-11 11:53:47',NULL),
	(2,1,'23r23f3','Second message','2014-06-12 11:53:47',NULL),
	(3,NULL,'23r23f3','sdfasdfa','2014-06-11 11:53:47',NULL),
	(4,NULL,'23r23f3','sdfasdfa','2014-06-11 11:53:47',NULL),
	(5,NULL,'23r23f3','sdfasdfa','2014-06-11 11:53:47',NULL),
	(6,NULL,'23r23f3','sdfasdfa','2014-06-11 11:53:47',NULL),
	(7,NULL,'23r23f3','sdfasdfa','2014-06-11 11:53:47',NULL);

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shelters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shelters`;

CREATE TABLE `shelters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) DEFAULT NULL,
  `name` text,
  `lat` float(9,5) DEFAULT NULL,
  `lng` float(9,5) DEFAULT NULL,
  `email` text,
  `phone` text,
  `free_spaces` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shelters` WRITE;
/*!40000 ALTER TABLE `shelters` DISABLE KEYS */;

INSERT INTO `shelters` (`id`, `agency_id`, `name`, `lat`, `lng`, `email`, `phone`, `free_spaces`, `capacity`, `created`, `modified`)
VALUES
	(1,2,'test shelter',34.51717,37.91811,'as.thomson@gmail.com','',NULL,NULL,'2014-06-11 10:01:36','2014-06-11 10:58:52'),
	(3,1,'asfdasdf',34.47189,38.28066,'as.thomson@gmail.com','32rfds',NULL,NULL,'2014-06-11 10:58:28','2014-06-11 10:59:02'),
	(4,1,'kjnjkn ',35.81044,36.94033,'as.thomson@gmail.com','',NULL,NULL,'2014-06-11 15:18:05','2014-06-11 15:18:05');

/*!40000 ALTER TABLE `shelters` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table survivorlocations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `survivorlocations`;

CREATE TABLE `survivorlocations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `investigation_id` int(11) DEFAULT NULL,
  `lat` float(9,5) DEFAULT NULL,
  `lng` float(9,5) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(10) DEFAULT NULL,
  `name` text,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
