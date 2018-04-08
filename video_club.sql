-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 12:20 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `address`, `stock`) VALUES
(1, 'Mitar', 'Miric', 'tarmiricmi@zamproduction.com', 'Batajnicki drum bb', 0),
(2, 'Mile', 'Kitic', 'kiticm@grand.com', 'Put za Ovcu bb', 0),
(3, 'Sinan', 'Sakic', 'sinan@tss.com', 'Marinkova bara', 0),
(4, 'Srecko', 'Sojic', 'srele@samsvojgazda.gov.rs', 'Put za Avalu bb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `current_stock` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `price`, `stock`, `current_stock`) VALUES
(1, 'Humanizam i renesansa', 220, 3, 3),
(2, 'Matriks', 260, 1, 1),
(3, 'Munje', 270, 4, 4),
(4, 'Kad porastem bicu kengur', 280, 4, 4),
(5, 'Peskara', 110, 4, 4),
(6, 'Belci ne umeju da skacu', 215, 1, 1),
(7, 'Inception', 215, 1, 1),
(8, 'Sabirni centar', 215, 1, 1),
(9, 'Blade runner', 285, 1, 1),
(10, 'Jumanji: Welcome To The Jungle', 220, 3, 3),
(11, 'Titan', 260, 1, 1),
(12, 'Resident Evil', 270, 4, 4),
(13, 'Jumanji', 190, 3, 3),
(14, 'Total Recall', 150, 3, 3),
(15, 'Silent Hill', 200, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `totals` decimal(6,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT '2018-03-27 14:24:53',
  `due` datetime NOT NULL DEFAULT '2018-04-02 14:24:53',
  `opened` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `id_client`, `totals`, `created`, `due`, `opened`) VALUES
(1, 1, '435.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(2, 1, '260.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(3, 4, '430.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(4, 4, '550.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(5, 2, '485.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(6, 2, '325.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(7, 3, '270.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0),
(8, 3, '500.00', '2018-03-27 14:24:53', '2018-04-02 14:24:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rentals_films`
--

CREATE TABLE `rentals_films` (
  `id` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(14, 8, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rentals_clients_idx` (`id_client`);

--
-- Indexes for table `rentals_films`
--
ALTER TABLE `rentals_films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rentals_films_rentals_idx` (`id_rental`),
  ADD KEY `fk_rentals_films_films_idx` (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rentals_films`
--
ALTER TABLE `rentals_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
