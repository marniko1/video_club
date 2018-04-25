-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: video_club
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Mitar','Miric','tarmiricmi@zamproduction.com','Batajnicki drum bb',0),(2,'Mile','Kitic','kiticm@grand.com','Put za Ovcu bb',0),(3,'Sinan','Sakic','sinan@tss.com','Marinkova bara',0),(4,'Srecko','Sojic','srele@samsvojgazda.gov.rs','Put za Avalu bb',0),(5,'Miki','Mecava','samodasebeli@lobetina.com','Kolumbijskih polja 2',0);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `current_stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (1,'Humanizam i renesansa',220,3,3),(2,'Matriks',260,1,1),(3,'Munje',270,4,4),(4,'Kad porastem bicu kengur',280,4,4),(5,'Peskara',110,4,4),(6,'Belci ne umeju da skacu',215,1,1),(7,'Inception',215,1,1),(8,'Sabirni centar',215,1,1),(9,'Blade runner',285,1,1),(10,'Jumanji: Welcome To The Jungle',220,3,3),(11,'Titan',260,1,1),(12,'Resident Evil',270,4,4),(13,'Jumanji',190,3,3),(14,'Total Recall',150,3,3),(15,'Silent Hill',200,4,4);
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rentals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `totals` decimal(6,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2018-03-27 14:24:53',
  `due` datetime NOT NULL DEFAULT '2018-04-02 14:24:53',
  `opened` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `fk_rentals_clients_idx` (`id_client`),
  CONSTRAINT `fk_rentals_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals`
--

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
INSERT INTO `rentals` VALUES (1,1,435.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(2,1,260.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(3,4,430.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(4,4,550.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(5,2,485.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(6,2,325.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(7,3,270.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(8,3,500.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(9,5,750.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no');
/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentals_films`
--

DROP TABLE IF EXISTS `rentals_films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rentals_films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rental` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rentals_films_rentals_idx` (`id_rental`),
  KEY `fk_rentals_films_films_idx` (`id_film`),
  CONSTRAINT `fk_rentals_films_films` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentals_films_rentals` FOREIGN KEY (`id_rental`) REFERENCES `rentals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals_films`
--

LOCK TABLES `rentals_films` WRITE;
/*!40000 ALTER TABLE `rentals_films` DISABLE KEYS */;
INSERT INTO `rentals_films` VALUES (1,1,6),(2,1,1),(3,2,2),(4,3,7),(5,3,8),(6,4,3),(7,4,4),(8,5,3),(9,5,8),(10,6,7),(11,6,5),(12,7,3),(13,8,9),(14,8,7),(15,9,1),(16,9,2),(17,9,3);
/*!40000 ALTER TABLE `rentals_films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'marniko','12345');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'video_club'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-25  3:14:36
