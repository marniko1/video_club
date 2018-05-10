CREATE DATABASE  IF NOT EXISTS `video_club` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `video_club`;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Mitar','Miric','tarmiricmi@zamproduction.com','Batajnicki drum bb',0),(2,'Mile','Kitic','kiticm@grand.com','Put za Ovcu bb',0),(3,'Sinan','Sakic','sinan@tss.com','Marinkova bara',0),(4,'Srecko','Sojic','srele@samsvojgazda.gov.rs','Put za Avalu bb',0),(5,'Miki','Mecava','samodasebeli@lobetina.com','Kolumbijskih polja 2',0),(6,'Zika','Sarenica','zikaseljak@selo.co.rs','Lajkovacka pruga 1',0),(7,'Zeljko','Mitrovic','dirigentwannabe@pink.rs','Simanovci bb',0),(8,'Bili','Piton','ludisesirdzija@maratonci.com','Grobljanska 10',0),(9,'Al','Kapone','maliali@kozanostra.com','Vice Avenue 1',0),(10,'Marko','Kraljevic','marebatica@pravisrpskijunak.rs','Mrnjavcevic Marka 10',0);
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
  `description` longtext,
  `genre` varchar(255) DEFAULT NULL,
  `price` decimal(13,2) NOT NULL,
  `current_stock` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (1,'Commando','A retired elite Black Ops Commando launches a one man war against a group of South American criminals who have kidnapped his daughter.','Action, Adventure, Thriller',220.00,3,3),(2,'The Matrix','A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',' Action, Sci-Fi',260.00,1,1),(3,'Munje','Urban comedy, happening during a night in Belgrade.','Comedy',270.00,4,4),(4,'Kad porastem bicu kengur','The film consists of three parallel stories that are interwoven and played in Vozdovac.','Comedy',280.00,4,4),(5,'The Running Man','A wrongly convicted man must try to survive a public execution gauntlet staged as a game show.','Action, Sci-Fi, Thriller',110.00,4,4),(6,'White Men Can\'t Jump','Black and white basketball hustlers join forces to double their chances of winning money on the street courts and in a basketball tournament.',' Comedy, Drama, Sport',215.00,1,1),(7,'Inception','A thief, who steals corporate secrets through the use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.',' Action, Adventure, Sci-Fi',215.00,1,1),(8,'Sabirni Centar','During the excavation of ancient Roman ruins, an old archaeology professor accidentally opens the gate between our world and the world of the dead.',' Comedy, Drama, Fantasy',215.00,1,1),(9,'Blade Runner','A blade runner must pursue and try to terminate four replicants who stole a ship in space and have returned to Earth to find their creator.','Sci-Fi, Thriller',285.00,1,1),(10,'Jumanji: Welcome To The Jungle','Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game.','Action, Adventure, Comedy',220.00,3,3),(11,'Titan','A military family takes part in a ground-breaking experiment of genetic evolution and space exploration.',' Sci-Fi, Thriller',260.00,1,1),(12,'Resident Evil','A special military unit fights a powerful, out-of-control supercomputer and hundreds of scientists who have mutated into flesh-eating creatures after a laboratory accident.',' Action, Horror, Sci-Fi',270.00,4,4),(13,'Jumanji','When two kids find and play a magical board game, they release a man trapped for decades in it and a host of dangers that can only be stopped by finishing the game.','Adventure, Family, Fantasy',190.00,3,3),(14,'Total Recall','When a man goes for virtual vacation memories of the planet Mars, an unexpected and harrowing series of events forces him to go to the planet for real - or does he?',' Action, Sci-Fi, Thriller',150.00,3,3),(15,'Silent Hill','A woman, Rose, goes in search for her adopted daughter within the confines of a strange, desolate town called Silent Hill.',' Horror',200.00,4,4),(16,'Avatar','A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.','Action, Adventure, Fantasy',200.00,3,3),(17,'I Am Legend','Years after a plague kills most of humanity and transforms the rest into monsters, the sole survivor in New York City struggles valiantly to find a cure.','Sci-Fi, Horror, Drama',199.99,5,5),(21,'Hancock','Hancock is a superhero whose ill considered behavior regularly causes damage in the millions. He changes when the person he saves helps him improve his public image.','Action, Drama, Crime',159.49,3,3),(22,'World War Z','Former United Nations employee Gerry Lane traverses the world in a race against time to stop the Zombie pandemic that is toppling armies and governments, and threatening to destroy humanity itself.','Horror, Action, Adventure',299.99,4,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals`
--

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
INSERT INTO `rentals` VALUES (1,1,435.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(2,1,260.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(3,4,430.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(4,4,550.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(5,2,485.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(6,2,325.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(7,3,270.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(8,3,500.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(9,5,750.00,'2018-03-27 14:24:53','2018-04-02 14:24:53','no'),(10,3,200.00,'2018-05-09 18:56:42','2018-05-09 19:00:12','no'),(12,3,579.48,'2018-05-10 02:17:01','2018-05-10 02:18:28','no');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals_films`
--

LOCK TABLES `rentals_films` WRITE;
/*!40000 ALTER TABLE `rentals_films` DISABLE KEYS */;
INSERT INTO `rentals_films` VALUES (1,1,6),(2,1,1),(3,2,2),(4,3,7),(5,3,8),(6,4,3),(7,4,4),(8,5,3),(9,5,8),(10,6,7),(11,6,5),(12,7,3),(13,8,9),(14,8,7),(15,9,1),(16,9,2),(17,9,3),(18,10,16),(19,12,1),(20,12,21),(21,12,17);
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

-- Dump completed on 2018-05-10  2:22:15
