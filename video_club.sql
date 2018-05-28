-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2018 at 07:38 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_club`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `CLOSE_RENTAL`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CLOSE_RENTAL` (`_rental_id` INT(11), `_client_id` INT(11))  begin
	declare num_of_films_at_rental int;

	select count(*) from rentals_films where id_rental = _rental_id into num_of_films_at_rental;

	update rentals set opened = 'no', due = now() where id = _rental_id;
	update clients set stock = stock - num_of_films_at_rental where id = _client_id;
	update films set current_stock = current_stock + 1 where id in (select id_film from rentals_films where id_rental = _rental_id);

	end$$

DROP PROCEDURE IF EXISTS `INSERT_RENTAL`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_RENTAL` (`_client` VARCHAR(45), `_title_1` VARCHAR(45), `_title_2` VARCHAR(45), `_title_3` VARCHAR(45), `_title_4` VARCHAR(45), `_title_5` VARCHAR(45))  begin
	declare client_id int;
	declare rental_id int;
	declare curr_client_stock int;


	select id from clients where concat(first_name, " ", last_name) = _client into client_id;
	select stock from clients where concat(first_name, " ", last_name) = _client into curr_client_stock;
	
	set @client_stock = curr_client_stock;
	set @totals = 0;


	insert into rentals values (null, client_id, 0, now(), now() + interval 7 day, 'yes');

	set @max_rentals_id = (select max(id) from rentals);
	
	

	if _title_1 != '' then
		set @id_film = (select id from films where title = _title_1);
		set @film_price = (select price from films where title = _title_1);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_1);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_1;
	end if;
	if _title_2 != '' then
		set @id_film = (select id from films where title = _title_2);
		set @film_price = (select price from films where title = _title_2);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_2);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_2;
	end if;
	if _title_3 != '' then
		set @id_film = (select id from films where title = _title_3);
		set @film_price = (select price from films where title = _title_3);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_3);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_3;
	end if;
	if _title_4 != '' then
		set @id_film = (select id from films where title = _title_4);
		set @film_price = (select price from films where title = _title_4);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_4);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_4;
	end if;
	if _title_5 != '' then
		set @id_film = (select id from films where title = _title_5);
		set @film_price = (select price from films where title = _title_5);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_5);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_5;
	end if;
	
	update rentals set totals = @totals where id = @max_rentals_id;
	update clients set stock = @client_stock where concat(first_name, " ", last_name) = _client;

	end$$

DROP PROCEDURE IF EXISTS `NUM_OF_FILMS_AT_CLIENT`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `NUM_OF_FILMS_AT_CLIENT` (`_client` VARCHAR(45))  begin
	declare client_id int;

	select id from clients where concat(first_name, " ", last_name) = _client into client_id;

	select count(*) as num_of_films_at_client from rentals_films where id_rental in (select id from rentals where id_client = client_id and opened = 'yes');

	end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `active` varchar(45) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `address`, `stock`, `active`) VALUES
(1, 'Mitar', 'Miric', 'tarmiricmi@zamproduction.com', 'Batajnicki drum bb', 0, 'yes'),
(2, 'Mile', 'Kitic', 'kiticm@grand.com', 'Put za Ovcu bb', 0, 'yes'),
(3, 'Sinan', 'Sakic', 'sinan@tss.com', 'Marinkova bara', 0, 'yes'),
(4, 'Srecko', 'Sojic', 'srele@samsvojgazda.gov.rs', 'Put za Avalu bb', 0, 'yes'),
(5, 'Miki', 'Mecava', 'samodasebeli@lobetina.com', 'Kolumbijskih polja 2', 0, 'yes'),
(6, 'Zika', 'Sarenica', 'zikaseljak@selo.co.rs', 'Lajkovacka pruga 1', 0, 'yes'),
(7, 'Zeljko', 'Mitrovic', 'dirigentwannabe@pink.rs', 'Simanovci bb', 0, 'yes'),
(8, 'Bili', 'Piton', 'ludisesirdzija@maratonci.com', 'Grobljanska 10', 0, 'yes'),
(9, 'Al', 'Kapone', 'maliali@kozanostra.com', 'Vice Avenue 1', 0, 'yes'),
(10, 'Marko', 'Kraljevic', 'marebatica@pravisrpskijunak.rs', 'Mrnjavcevic Marka 10', 0, 'yes'),
(11, 'Marko', 'Nikolic', 'zmajeviognjenogvuka@gmail.com', 'Strumicka 98', 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` longtext,
  `genre` varchar(255) DEFAULT NULL,
  `price` decimal(13,2) NOT NULL,
  `current_stock` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `active` varchar(45) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `description`, `genre`, `price`, `current_stock`, `stock`, `active`) VALUES
(1, 'Commando', 'A retired elite Black Ops Commando launches a one man war against a group of South American criminals who have kidnapped his daughter.', 'Action, Adventure, Thriller', '220.00', 1, 2, 'yes'),
(2, 'The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', ' Action, Sci-Fi', '260.00', 1, 1, 'yes'),
(3, 'Munje', 'Urban comedy, happening during a night in Belgrade.', 'Comedy', '270.00', 4, 4, 'yes'),
(4, 'Kad porastem bicu kengur', 'The film consists of three parallel stories that are interwoven and played in Vozdovac.', 'Comedy', '280.00', 4, 4, 'yes'),
(5, 'The Running Man', 'A wrongly convicted man must try to survive a public execution gauntlet staged as a game show.', 'Action, Sci-Fi, Thriller', '110.00', 4, 4, 'yes'),
(6, 'White Men Can\'t Jump', 'Black and white basketball hustlers join forces to double their chances of winning money on the street courts and in a basketball tournament.', ' Comedy, Drama, Sport', '215.00', 1, 1, 'yes'),
(7, 'Inception', 'A thief, who steals corporate secrets through the use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', ' Action, Adventure, Sci-Fi', '215.00', 1, 1, 'yes'),
(8, 'Sabirni Centar', 'During the excavation of ancient Roman ruins, an old archaeology professor accidentally opens the gate between our world and the world of the dead.', ' Comedy, Drama, Fantasy', '215.00', 1, 1, 'yes'),
(9, 'Blade Runner', 'A blade runner must pursue and try to terminate four replicants who stole a ship in space and have returned to Earth to find their creator.', 'Sci-Fi, Thriller', '285.00', 1, 1, 'yes'),
(10, 'Jumanji: Welcome To The Jungle', 'Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game.', 'Action, Adventure, Comedy', '220.00', 3, 3, 'yes'),
(11, 'Titan', 'A military family takes part in a ground-breaking experiment of genetic evolution and space exploration.', ' Sci-Fi, Thriller', '260.00', 1, 1, 'yes'),
(12, 'Resident Evil', 'A special military unit fights a powerful, out-of-control supercomputer and hundreds of scientists who have mutated into flesh-eating creatures after a laboratory accident.', ' Action, Horror, Sci-Fi', '270.00', 4, 4, 'yes'),
(13, 'Jumanji', 'When two kids find and play a magical board game, they release a man trapped for decades in it and a host of dangers that can only be stopped by finishing the game.', 'Adventure, Family, Fantasy', '190.00', 3, 3, 'yes'),
(14, 'Total Recall', 'When a man goes for virtual vacation memories of the planet Mars, an unexpected and harrowing series of events forces him to go to the planet for real - or does he?', ' Action, Sci-Fi, Thriller', '150.00', 3, 3, 'yes'),
(15, 'Silent Hill', 'A woman, Rose, goes in search for her adopted daughter within the confines of a strange, desolate town called Silent Hill.', ' Horror', '200.00', 4, 4, 'yes'),
(16, 'Avatar', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'Action, Adventure, Fantasy', '300.00', 3, 3, 'yes'),
(17, 'I Am Legend', 'Years after a plague kills most of humanity and transforms the rest into monsters, the sole survivor in New York City struggles valiantly to find a cure.', 'Sci-Fi, Horror, Drama', '199.99', 5, 5, 'yes'),
(21, 'Hancock', 'Hancock is a superhero whose ill considered behavior regularly causes damage in the millions. He changes when the person he saves helps him improve his public image.', 'Action, Drama, Crime', '159.49', 3, 3, 'yes'),
(22, 'World War Z', 'Former United Nations employee Gerry Lane traverses the world in a race against time to stop the Zombie pandemic that is toppling armies and governments, and threatening to destroy humanity itself.', 'Horror, Action, Adventure', '299.99', 4, 4, 'yes'),
(23, 'The Curious Case of Benjamin Button', 'Tells the story of Benjamin Button, a man who starts aging backwards with bizarre consequences.', 'Romance, Drama, Fantasy', '149.49', 3, 3, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
CREATE TABLE IF NOT EXISTS `rentals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `totals` decimal(6,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2018-03-27 14:24:53',
  `due` datetime NOT NULL DEFAULT '2018-04-02 14:24:53',
  `opened` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `fk_rentals_clients_idx` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `id_client`, `totals`, `created`, `due`, `opened`) VALUES
(1, 1, '435.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(2, 1, '260.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(3, 4, '430.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(4, 4, '550.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(5, 2, '485.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(6, 2, '325.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(7, 3, '270.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(8, 3, '500.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(9, 5, '750.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 'no'),
(10, 3, '200.00', '2018-05-09 18:56:42', '2018-05-09 19:00:12', 'no'),
(12, 3, '579.48', '2018-05-10 02:17:01', '2018-05-10 02:18:28', 'no'),
(13, 11, '549.48', '2018-05-13 13:55:17', '2018-05-13 13:55:47', 'no'),
(14, 10, '199.99', '2018-05-13 13:56:49', '2018-05-16 00:40:32', 'no'),
(15, 10, '200.00', '2018-05-13 13:57:10', '2018-05-16 00:40:38', 'no'),
(16, 9, '285.00', '2018-05-13 17:55:31', '2018-05-14 15:26:43', 'no'),
(17, 11, '215.00', '2018-05-14 00:18:21', '2018-05-16 00:40:44', 'no'),
(18, 9, '220.00', '2018-05-14 00:29:08', '2018-05-16 00:40:24', 'no'),
(19, 10, '500.00', '2018-05-19 21:57:12', '2018-05-19 22:31:24', 'no'),
(20, 11, '215.00', '2018-05-20 11:58:06', '2018-05-23 00:13:51', 'no'),
(21, 10, '440.00', '2018-05-20 12:01:30', '2018-05-23 00:03:34', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `rentals_films`
--

DROP TABLE IF EXISTS `rentals_films`;
CREATE TABLE IF NOT EXISTS `rentals_films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rental` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rentals_films_rentals_idx` (`id_rental`),
  KEY `fk_rentals_films_films_idx` (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentals_films`
--

INSERT INTO `rentals_films` (`id`, `id_rental`, `id_film`) VALUES
(1, 1, 6),
(2, 1, 1),
(3, 2, 2),
(4, 3, 7),
(5, 3, 8),
(6, 4, 3),
(7, 4, 4),
(8, 5, 3),
(9, 5, 8),
(10, 6, 7),
(11, 6, 5),
(12, 7, 3),
(13, 8, 9),
(14, 8, 7),
(15, 9, 1),
(16, 9, 2),
(17, 9, 3),
(18, 10, 16),
(19, 12, 1),
(20, 12, 21),
(21, 12, 17),
(22, 13, 23),
(23, 13, 16),
(24, 13, 17),
(25, 14, 17),
(26, 15, 16),
(27, 16, 9),
(28, 17, 7),
(29, 18, 1),
(30, 19, 9),
(31, 19, 8),
(32, 20, 7),
(33, 21, 1),
(34, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `priviledge` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `priviledge`) VALUES
(1, 'marniko', 'Marko Nikolic', '12345', 'admin'),
(2, 'pera', 'Pera Peric', '54321', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `fk_rentals_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rentals_films`
--
ALTER TABLE `rentals_films`
  ADD CONSTRAINT `fk_rentals_films_films` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rentals_films_rentals` FOREIGN KEY (`id_rental`) REFERENCES `rentals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
