-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 mrt 2023 om 09:31
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

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
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur_regel`
--

CREATE TABLE `factuur_regel` (
  `id` int(11) NOT NULL,
  `factuur_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `filename`) VALUES
(1, 'XXL Shaker zwart (bidon) 800ml', 'Shaker\n\nMaak in slechts een handomdraai de lekkerste en egale eiwitshakes met gebruik van de XXL Nutrition Shaker! Deze shaker is voorzien van een raster zodat je met slechts een paar keer shaken al de lekkerste en luchtigste eiwitshakes maakt. Dit doe je door op locatie de shake te bereiden, of een shake te maken en deze vervolgens mee te nemen. Maar let op; vervoer de XXL Nutrition Shaker altijd rechtop wanneer deze gevuld is om te voorkomen dat de shaker gaat lekken. De Shaker is voorzien van handige maataanduiding zodat je zeker weet dat je altijd jouw favoriete verhouding kunt aanhouden. En met een inhoud van 800ml is de XXL Nutrition Shaker ook ideaal om grote hoeveelheden shakes in één keer te maken.\n\nGebruik\n\nVoor een optimale en egale eiwitshake vul je de beker eerst met water of melk, en voeg je daarna pas het eiwitpoeder toe. Plaats het raster op de beker en schroef de dop stevig vast. Even schudden en je kunt van een heerlijke eiwitshake genieten, die je door de handige drinkdop direct uit de shaker drinkt.\n\n \n\n    Inhoud 800 ml\n    Vrij van giftige DEHP en BPA\n    Handige maataanduiding tot 700ml.\n    Voorzien van een raster.', '7.95', 'xxl_bidon.png'),
(2, 'Whey Delicious 1000g Eiwitshake Vannilla', 'Whey Delicious\r\nMaak kennis met Whey Delicious; volgens vele gebruikers de lekkerste eiwitshake op de markt! Whey Delicious zit boordevol hoogwaardige wei-eiwitten, BCAA’s en glutamine en met een eiwitpercentage van 80% werk je gemakkelijk aan een hoge eiwit-inname. Het is ons tevens gelukt om zonder gebruik van toegevoegde suikers, en slechts een kleine hoeveelheid zoetstoffen (0,17%), een proteïne shake te maken die zó lekker is dat je hem de hele dag door wilt blijven drinken.', '29.95', 'whey_delicious_vanilla_1000g.png'),
(3, 'Whey Delicious 1000g Eiwitshake Raspberry/kiwi', 'Whey Delicious\r\nMaak kennis met Whey Delicious; volgens vele gebruikers de lekkerste eiwitshake op de markt! Whey Delicious zit boordevol hoogwaardige wei-eiwitten, BCAA’s en glutamine en met een eiwitpercentage van 80% werk je gemakkelijk aan een hoge eiwit-inname. Het is ons tevens gelukt om zonder gebruik van toegevoegde suikers, en slechts een kleine hoeveelheid zoetstoffen (0,17%), een proteïne shake te maken die zó lekker is dat je hem de hele dag door wilt blijven drinken.', '29.95', 'whey_delicious_raspberry_kiwi_1000g.png'),
(4, 'Whey Delicious 1000g Eiwitshake Coconut', 'Whey Delicious\r\nMaak kennis met Whey Delicious; volgens vele gebruikers de lekkerste eiwitshake op de markt! Whey Delicious zit boordevol hoogwaardige wei-eiwitten, BCAA’s en glutamine en met een eiwitpercentage van 80% werk je gemakkelijk aan een hoge eiwit-inname. Het is ons tevens gelukt om zonder gebruik van toegevoegde suikers, en slechts een kleine hoeveelheid zoetstoffen (0,17%), een proteïne shake te maken die zó lekker is dat je hem de hele dag door wilt blijven drinken.', '29.95', 'whey_delicious_coconut_1000g.png'),
(5, 'Creatine Monohydraat 500g', 'Het waarschijnlijk meest gebruikte voedingssupplement wereldwijd is creatine. En dit is niet voor niets; er zijn namelijk talloze onderzoeken die de werking van creatine wetenschappelijk bewijzen. Bij een dagelijkse inname van 3 gram helpt creatine je prestaties te verbeteren en ondersteunt het spieropbouw bij explosieve krachtinspanningen. Creatine is niet alleen geschikt voor krachttraining, maar ook voor bijvoorbeeld een intensieve sprinttraining. De Creatine van XXL Nutrition bestaat uitsluitend uit zuivere, microfijne monohydraat. Zo weet je zeker dat er geen onnodige grondstoffen inzitten en je creatine in zijn puurste vorm gebruikt.', '18.95', 'creatine_monohydate_500g.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Daan Braas', 'dbraas@gmail.com', 'test'),
(2, 'Kim Cena', 'Bing@chilling.com', 'ching'),
(3, 'Johnny Bravo', 'j.bravo@strong.de', 'bravo'),
(4, 'Test', 'test@test.test', 'test'),
(5, 'Daan', 'daan_braas@hotmail.com', 'test'),
(6, 'Iphone', 'I@phone.ios', 'ios'),
(7, 'tester', 'tester@test.test', 'tester');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
