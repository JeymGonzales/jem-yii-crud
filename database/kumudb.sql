# ************************************************************
# Sequel Pro SQL dump
# Version 5224
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.01 (MySQL 8.0.18)
# Database: kumu
# Generation Time: 2021-01-19 09:46:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `location` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `name`, `location`, `date`, `status`)
VALUES
	(1,'Event One','Event One Location','2021-01-14 06:30:15',1),
	(2,'Event Two','Event Two Location','2021-01-14 06:30:15',1),
	(3,'Event Three','Event Three Location','2021-01-14 06:30:15',1);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `lastname` varchar(120) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `city` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `country` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip` varchar(120) COLLATE utf8mb4_general_ci DEFAULT '',
  `street` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;

INSERT INTO `guests` (`id`, `firstname`, `lastname`, `email`, `number`, `gender`, `city`, `country`, `zip`, `street`)
VALUES
	(1,'First Guest Firstname User','First Guest Lastname User','firstguest@email.com','','Male','First guest address','Philippines','123','street1'),
	(2,'Secot Guest Firstname User','Secot Guest Lastname User','secondguest@email.com','1234123','Female','Secod guest address','Philippines','123','street2'),
	(3,'Third Guest Firstname User','Third Guest Lastname User','thirdguest@email.com','456789','Male','Third guest address','Philippines','123','street3'),
	(4,'Third Guest Firstname User','Third Guest Lastname User','fourthguest@email.com','1234789','Female','Fourth guest address','Philippines','123','street4'),
	(5,'Test 1','Test 2 Lastname','dummy1@email.com','789456','Femail','Test Address','Philippines','123','street5'),
	(6,'Test 2','Test 2 Lastname','dummy2@email.com','1234123','pijqwepor','Test Address','Philippines','123','street6'),
	(7,'Test 3','Test 2 Lastname','dummy3@email.com','1234123','pijqwepor','Test Address','Philippines','123','street7'),
	(8,'Test 4','Test 2 Lastname','dummy4@email.com','1234123','pijqwepor','Test Address','Philippines','123','street8'),
	(9,'Test 5','Test 2 Lastname','dummy5@email.com','1234123','qwerqwer','Test Address','Philippines','123','street9');

/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guests_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guests_events`;

CREATE TABLE `guests_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guests_id` int(11) DEFAULT NULL,
  `events_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `guests_events` WRITE;
/*!40000 ALTER TABLE `guests_events` DISABLE KEYS */;

INSERT INTO `guests_events` (`id`, `guests_id`, `events_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,2,1),
	(4,2,2),
	(5,3,1),
	(6,4,1),
	(7,5,1),
	(8,6,1),
	(9,6,2),
	(10,7,1),
	(11,7,2),
	(12,8,1),
	(13,8,2),
	(14,9,1),
	(15,9,2);

/*!40000 ALTER TABLE `guests_events` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
