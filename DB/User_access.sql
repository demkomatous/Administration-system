-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Čtv 27. kvě 2021, 12:39
-- Verze serveru: 5.5.68-MariaDB
-- Verze PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `demkoma20`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `User_access`
--

CREATE TABLE IF NOT EXISTS `User_access` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `User_access`
--

INSERT INTO `User_access` (`ID`, `name`, `surname`, `password`) VALUES
(1, 'James', 'Khali', 'Remember'),
(2, 'Host', 'Host', 'Host'),
(4, 'Přemysl', 'Vaculík', '123456');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `User_access`
--
ALTER TABLE `User_access`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `User_access`
--
ALTER TABLE `User_access`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
