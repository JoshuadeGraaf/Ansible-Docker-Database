-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.81.174:3306
-- Gegenereerd op: 18 dec 2023 om 10:52
-- Serverversie: 5.7.44
-- PHP-versie: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Kerntaak`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Diet`
--

CREATE TABLE `Diet` (
  `Diets` varchar(15) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Diet`
--

INSERT INTO `Diet` (`Diets`, `Description`) VALUES
('VEG', 'Vegetarian'),
('VG', 'Vegan'),
('PES', 'Pescatarian'),
('FLEX', 'Flexitarian'),
('PALEO', 'Paleo'),
('KETO', 'Keto/Ketogenic'),
('MED', 'Mediterranean'),
('HAL', 'Halal'),
('KOSH', 'Kosher'),
('GF', 'Gluten-free'),
('LC', 'Low-Carb'),
('CARN', 'Carnivore'),
('RAW', 'Raw Food'),
('LACTO-VEG', 'Lacto-Vegetarian'),
('OVO-VEG', 'Ovo-Vegetarian'),
('LACTO-OVO-VEG', 'Lacto-Ovo-Vegetarian');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Login`
--

CREATE TABLE `Login` (
  `user_id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Login`
--

INSERT INTO `Login` (`user_id`, `username`, `password`) VALUES
(1, 'Administrator', 'fc628d038e1b1f5baad66cbfddf6bbbb318d78b7'),
(9, 'Jgraaf', 'fc628d038e1b1f5baad66cbfddf6bbbb318d78b7');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `id` int(6) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`id`, `first_name`, `last_name`, `email`, `reg_date`) VALUES
(9, 'Joshua', 'de Graaf', 'jgraaf@hotmail.com', '2023-12-18 10:51:19');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Login`
--
ALTER TABLE `Login`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
