-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Okt 2021 um 14:00
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `m157_telefonbuch`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `departement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `departement`
--

INSERT INTO `departement` (`id`, `departement`) VALUES
(1, 'gl'),
(2, 'finance');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `fk_departement` int(11) NOT NULL,
  `fk_position` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `people`
--

INSERT INTO `people` (`id`, `firstname`, `lastname`, `email`, `phone`, `fk_departement`, `fk_position`, `image`) VALUES
(1, 'klaus', 'fisher', 'klaus.fisher@generic.web', 791234567, 1, 1, 'https://github.com/sandrolenz/M157-Telefonbuch/blob/image/img/profile-images/m8.jpg?raw=true'),
(2, 'peter', 'meier', 'peter.meier@generic.web', 791234568, 2, 2, 'https://github.com/sandrolenz/M157-Telefonbuch/blob/image/img/profile-images/m4.jpg?raw=true'),
(3, 'franz', 'meier', 'franz.meier@generic.web', 711234567, 2, 3, 'https://github.com/sandrolenz/M157-Telefonbuch/blob/image/img/profile-images/m10.jpg?raw=true'),
(5, 'clara', 'müller', 'clara.mueller@generic.web', 712345832, 1, 3, 'https://github.com/sandrolenz/M157-Telefonbuch/blob/image/img/profile-images/f4.jpg?raw=true');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `position`
--

INSERT INTO `position` (`id`, `position`) VALUES
(1, 'ceo'),
(2, 'cfo'),
(3, 'apprentice');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
