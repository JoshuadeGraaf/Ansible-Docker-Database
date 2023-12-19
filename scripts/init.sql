-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.81.174:3306
-- Gegenereerd op: 19 dec 2023 om 09:50
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
CREATE DATABASE IF NOT EXISTS `Kerntaak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Kerntaak`;

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
-- Tabelstructuur voor tabel `guest`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diet_code` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `guest`
--

INSERT INTO `guest` (`id`, `firstname`, `lastname`, `email`, `diet_code`, `reg_date`) VALUES
(12, 'gast', 'gast', 'gast@hotmail.com', 'PES', '2023-05-27 13:58:18'),
(15, 'bab', 'bab', 'bab@hotmail.com', 'LCARB', '2023-06-14 12:00:04'),
(16, 'test', 'account', 'test@hotmail.com', 'VGN', '2023-05-27 14:33:24'),
(20, 'fname', 'lname', 'email@email.com', '', '2023-06-07 20:22:30'),
(21, 'Joshua', 'de Graaf', 'jgraaf2005@hotmail.com', 'VGN', '2023-06-25 13:07:23'),
(22, 'inserted', 'account', 'insertaccount@hotmail.com', '', '2023-06-25 13:08:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) NOT NULL,
  `guest_id` int(6) NOT NULL COMMENT '0 = Admin',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`username`, `password`, `guest_id`, `lastlogin`) VALUES
('Administrator', '906072001efddf3e11e6d2b5782f4777fe038739', 0, NULL),
('gast', 'gast', 12, NULL),
('bab', '877c87cc9c2518f8f74964a9454d73f8bb86ffd6', 15, NULL),
('testaccount', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 16, NULL),
('username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 20, NULL),
('jgraaf', 'a3ed433721fdb33045ffcd877b8cf0740918f44f', 21, NULL),
('insertaccount', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 22, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`guest_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `login`
--
ALTER TABLE `login`
  MODIFY `guest_id` int(6) NOT NULL AUTO_INCREMENT COMMENT '0 = Admin', AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

