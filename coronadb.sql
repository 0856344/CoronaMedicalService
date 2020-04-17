-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Apr 2020 um 07:54
-- Server-Version: 10.4.6-MariaDB
-- PHP-Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `coronadb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arzt`
--

CREATE TABLE `arzt` (
  `ArztID` int(11) NOT NULL,
  `Vorname` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fachrichtung` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `arzt`
--

INSERT INTO `arzt` (`ArztID`, `Vorname`, `Nachname`, `Fachrichtung`) VALUES
(1, 'Andre', 'Strasser', 'Interne'),
(2, 'Eggert', 'Honigsmann', 'Chirugie'),
(3, 'Torsten', 'Schiffner', 'Chirugie'),
(4, 'Albrecht', 'Rahmer', 'Interne'),
(5, 'Josef', 'Bruckner', 'Chirugie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `Vorname` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(50) COLLATE utf8_bin NOT NULL,
  `FK_StationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `patient`
--

INSERT INTO `patient` (`PatientID`, `Vorname`, `Nachname`, `FK_StationID`) VALUES
(2, 'Anton', 'Huber', 1),
(3, 'Leni', 'Strobl', 3),
(4, 'Teresa', 'Scherer', 1),
(5, 'Tilmann', 'Niekisch', 1),
(6, 'Hildebrand', 'Seiler', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pfleger`
--

CREATE TABLE `pfleger` (
  `PflegerID` int(11) NOT NULL,
  `Vorname` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `pfleger`
--

INSERT INTO `pfleger` (`PflegerID`, `Vorname`, `Nachname`) VALUES
(1, 'Berthold', 'Wassermann'),
(2, 'Manuel', 'Welser'),
(3, 'Michael', 'Semmler'),
(4, 'Stefan', 'Steinitz');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reinigung`
--

CREATE TABLE `reinigung` (
  `ReinigungID` int(11) NOT NULL,
  `Vorname` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `reinigung`
--

INSERT INTO `reinigung` (`ReinigungID`, `Vorname`, `Nachname`) VALUES
(1, 'Genoveva', 'Dorfmann'),
(2, 'Ursel', 'Hornbostel'),
(3, 'Berndt', 'Rutter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schicht`
--

CREATE TABLE `schicht` (
  `SchichtID` int(11) NOT NULL,
  `von` datetime NOT NULL,
  `bis` datetime NOT NULL,
  `FK_Arzt` int(11) DEFAULT NULL,
  `FK_Pfleger` int(11) DEFAULT NULL,
  `FK_Reinigung` int(11) DEFAULT NULL,
  `FK_Station` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `schicht`
--

INSERT INTO `schicht` (`SchichtID`, `von`, `bis`, `FK_Arzt`, `FK_Pfleger`, `FK_Reinigung`, `FK_Station`) VALUES
(1, '2020-04-14 06:00:00', '2020-04-15 06:00:00', 1, NULL, NULL, 1),
(2, '2020-04-14 06:00:00', '2020-04-14 15:00:00', NULL, 1, NULL, 1),
(3, '2020-04-14 15:00:00', '2020-04-15 06:00:00', NULL, NULL, 1, NULL),
(4, '2020-04-16 06:00:00', '2020-04-17 06:00:00', 2, NULL, NULL, 2),
(6, '2020-04-17 06:00:00', '2020-04-18 06:00:00', 1, NULL, NULL, 2),
(9, '2020-04-17 06:15:00', '2020-04-18 03:00:00', 3, NULL, NULL, 2),
(11, '2020-04-17 15:00:00', '2020-04-18 03:00:00', 5, NULL, NULL, 2),
(13, '2020-03-17 06:00:00', '2020-03-18 06:00:00', 2, NULL, NULL, 2),
(14, '2020-03-17 06:00:00', '2020-03-18 06:00:00', 1, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `station`
--

CREATE TABLE `station` (
  `StationID` int(11) NOT NULL,
  `Station` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `station`
--

INSERT INTO `station` (`StationID`, `Station`) VALUES
(1, 'Interne'),
(2, 'Intensivstation'),
(3, 'Palliativstation');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `arzt`
--
ALTER TABLE `arzt`
  ADD PRIMARY KEY (`ArztID`);

--
-- Indizes für die Tabelle `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `fk_Patient_Station` (`FK_StationID`);

--
-- Indizes für die Tabelle `pfleger`
--
ALTER TABLE `pfleger`
  ADD PRIMARY KEY (`PflegerID`);

--
-- Indizes für die Tabelle `reinigung`
--
ALTER TABLE `reinigung`
  ADD PRIMARY KEY (`ReinigungID`);

--
-- Indizes für die Tabelle `schicht`
--
ALTER TABLE `schicht`
  ADD PRIMARY KEY (`SchichtID`),
  ADD KEY `fk_Schicht_Arzt` (`FK_Arzt`),
  ADD KEY `fk_Schicht_Pfleger` (`FK_Pfleger`),
  ADD KEY `fk_Schicht_Reinigung` (`FK_Reinigung`),
  ADD KEY `fk_Schicht_Station` (`FK_Station`);

--
-- Indizes für die Tabelle `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`StationID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `arzt`
--
ALTER TABLE `arzt`
  MODIFY `ArztID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `pfleger`
--
ALTER TABLE `pfleger`
  MODIFY `PflegerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `reinigung`
--
ALTER TABLE `reinigung`
  MODIFY `ReinigungID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `schicht`
--
ALTER TABLE `schicht`
  MODIFY `SchichtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `station`
--
ALTER TABLE `station`
  MODIFY `StationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_Patient_Station` FOREIGN KEY (`FK_StationID`) REFERENCES `station` (`StationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `schicht`
--
ALTER TABLE `schicht`
  ADD CONSTRAINT `fk_Schicht_Arzt` FOREIGN KEY (`FK_Arzt`) REFERENCES `arzt` (`ArztID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Schicht_Pfleger` FOREIGN KEY (`FK_Pfleger`) REFERENCES `pfleger` (`PflegerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Schicht_Reinigung` FOREIGN KEY (`FK_Reinigung`) REFERENCES `reinigung` (`ReinigungID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Schicht_Station` FOREIGN KEY (`FK_Station`) REFERENCES `station` (`StationID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
