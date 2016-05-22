-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 01 Lip 2014, 01:14
-- Wersja serwera: 5.5.29
-- Wersja PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `muzyka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `utwory`
--

CREATE TABLE `utwory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(30) NOT NULL,
  `wykonawca` varchar(30) NOT NULL,
  `plyta` varchar(30) NOT NULL,
  `rok` year(4) NOT NULL,
  `img` varchar(50) NOT NULL,
  `md5` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Zrzut danych tabeli `utwory`
--

INSERT INTO `utwory` (`id`, `nazwa`, `wykonawca`, `plyta`, `rok`, `img`, `md5`) VALUES
(57, 'hgf', 'sa', 'fds', 0000, 'imgs/songsCovers/default.png', '15985dad4dac78026d94eba3d5bf8c21'),
(58, 'hgf', 'sa', 'fds', 0000, 'imgs/songsCovers/default.png', '15985dad4dac78026d94eba3d5bf8c21'),
(59, 'hgf', 'sa', 'fds', 0000, 'imgs/songsCovers/default.png', '15985dad4dac78026d94eba3d5bf8c21'),
(61, 'kjda', 'kjnsdfkj', 'kjndskjn', 0000, 'imgs/songsCovers/default.png', 'b007dce363d9450456b50a867bcc52f1'),
(62, 'asmdnb', 'kadjsb', 'kajdn', 0000, 'imgs/songsCovers/default.png', '45f167448137e2620a56972a1dd33957'),
(63, 'kjsd', 'kjasdbk', 'kjasbd', 0000, 'imgs/songsCovers/default.png', 'aa349dfe895a01acf66e5b5078eab995'),
(64, 'asdkjhjv', 'kajdb', 'kjbfj', 0000, 'imgs/songsCovers/default.png', '4482c6270d6ad72c13b86ace2d05f376'),
(65, 'asdkjhjv', 'kajd', 'kjdka', 0000, 'imgs/songsCovers/default.png', '1dd4293240d116038e93118f01e9e5f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
