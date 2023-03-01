-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 10:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop_daan`
--

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factuur_regel`
--

CREATE TABLE `factuur_regel` (
  `id` int(11) NOT NULL,
  `factuur_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `filename`) VALUES
(1, 'XXL Shaker zwart (bidon) 800ml', 'Shaker\r\n\r\nMaak in slechts een handomdraai de lekkerste en egale eiwitshakes met gebruik van de XXL Nutrition Shaker! Deze shaker is voorzien van een raster zodat je met slechts een paar keer shaken al de lekkerste en luchtigste eiwitshakes maakt. Dit doe je door op locatie de shake te bereiden, of een shake te maken en deze vervolgens mee te nemen. Maar let op; vervoer de XXL Nutrition Shaker altijd rechtop wanneer deze gevuld is om te voorkomen dat de shaker gaat lekken. De Shaker is voorzien van handige maataanduiding zodat je zeker weet dat je altijd jouw favoriete verhouding kunt aanhouden. En met een inhoud van 800ml is de XXL Nutrition Shaker ook ideaal om grote hoeveelheden shakes in één keer te maken.\r\n\r\nGebruik\r\n\r\nVoor een optimale en egale eiwitshake vul je de beker eerst met water of melk, en voeg je daarna pas het eiwitpoeder toe. Plaats het raster op de beker en schroef de dop stevig vast. Even schudden en je kunt van een heerlijke eiwitshake genieten, die je door de handige drinkdop direct uit de shaker drinkt.\r\n\r\n \r\n\r\n    Inhoud 800 ml\r\n    Vrij van giftige DEHP en BPA\r\n    Handige maataanduiding tot 700ml.\r\n    Voorzien van een raster', '7.95', 'xxl-shaker-zwart-bidon-800ml.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Daan Braas', 'dbraas@gmail.com', 'test123'),
(2, 'Kim Cena', 'Bing@chilling.com', 'ching'),
(3, 'Johnny Bravo', 'j.bravo@strong.de', 'bravo'),
(4, 'Test', 'test@test.test', 'test'),
(5, 'Bart', 'Bart.xart@live.nl', 'get');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `factuur_regel`
--
ALTER TABLE `factuur_regel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factuur_id` (`factuur_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factuur_regel`
--
ALTER TABLE `factuur_regel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `factuur_regel`
--
ALTER TABLE `factuur_regel`
  ADD CONSTRAINT `factuur_id` FOREIGN KEY (`factuur_id`) REFERENCES `factuur` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
