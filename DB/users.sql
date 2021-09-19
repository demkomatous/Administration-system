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

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(150) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10660 DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`ID`, `name`, `surname`, `time`) VALUES
(8522, 'Android', 'Šéf', '2021-05-25 19:41:54'),

(10424, 'Darth', 'Vader', '2021-05-04 06:01:06'),
(10425, 'John', 'Wick', '2021-05-04 06:01:06'),
(10426, 'Jack', 'Reacher', '2021-05-04 06:01:06'),
(10430, 'Myšička', 'Frontline', '2021-05-04 06:01:06'),
(10432, 'Android', 'Boss', '2021-05-04 06:01:06'),
(10433, 'Skywalker', 'Luke', '2021-05-04 06:01:06'),
(10434, 'Darth', 'Vader', '2021-05-04 06:01:06'),
(10435, 'John', 'Wick', '2021-05-04 06:01:06'),
(10436, 'Jack', 'Reacher', '2021-05-04 06:01:06'),
(10440, 'Myšička', 'Frontline', '2021-05-04 06:01:06'),
(10442, 'Android', 'Boss', '2021-05-04 06:01:06'),
(10443, 'Skywalker', 'Luke', '2021-05-04 06:01:06'),
(10444, 'Darth', 'Vader', '2021-05-04 06:01:06'),
(10445, 'John', 'Wick', '2021-05-04 06:01:06'),
(10446, 'Jack', 'Reacher', '2021-05-04 06:01:06'),
(10450, 'Myšička', 'Frontline', '2021-05-04 06:01:06'),
(10452, 'Android', 'Boss', '2021-05-04 06:01:06'),

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10660;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
