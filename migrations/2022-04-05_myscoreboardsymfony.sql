-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 avr. 2022 à 19:00
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myscoreboardsymfony`
--

-- --------------------------------------------------------
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `email`, `nickname`) VALUES
(1, 'luke.skywalker@rogue.sw', 'Luke'),
(2, 'amidala.padme@naboo.gov', 'Padmeeeee'),
(3, 'han.solo@millenium-falcon.com', 'HanSolo'),
(4, 'chewbacca@wook.ie', 'Chewbie'),
(5, 'rey@jakku.planet', 'Ray'),
(7, 'jon.snow@winter.iscoming', 'Jon Snow'),
(8, 'nouveau@yopmail.com', 'nouveau'),
(9, 'panther@bla.ck', 'Black Panther'),
(10, 'onsenfout@yopmail.com', 'hulk'),
(11, 'lando.calrissian@bespin.com', 'lando'),
(12, 'client@yopmail.com', 'client'),
(13, 'test@yopmail.com', 'test'),
(14, 'nouvelemail@yopmail.com', 'test2'),
(15, 'JonSnow@yopmail.com', 'JonSnow'),
(16, 'NedStark@yopmail.com', 'NedStark'),
(17, 'molina@fff.fr', 'molina'),
(18, 'kingofthenorth@yopmail.com', 'JonSnow');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `title`, `min_players`, `max_players`, `image`) VALUES
(23, '7 Wonders', 2, 7, NULL),
(24, 'Ticket to Ride', 2, 5, NULL),
(25, 'Pandemic', 2, 4, NULL),
(26, 'Munchkin', 3, 6, NULL),
(27, 'Scrabble', 2, 4, '_624719745c684.png'),
(28, 'Bataille', 2, 5, NULL),
(30, 'Echecs', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `contest`
--

INSERT INTO `contest` (`id`, `game_id`, `winner_id`, `start_date`) VALUES
(1, 23, 2, '2019-12-25'),
(2, 25, 3, '2020-12-25'),
(3, 27, NULL, '2022-03-01'),
(4, 26, NULL, '2022-03-30'),
(5, 23, NULL, '2022-03-30'),
(6, 30, NULL, '2022-03-30');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `contest_player`
--

INSERT INTO `contest_player` (`contest_id`, `player_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 2),
(2, 3),
(2, 5),
(3, 1),
(3, 3),
(3, 7),
(4, 1),
(4, 2),
(5, 2),
(5, 4),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `roles`, `password`, `player_id`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\",\"ROLE_USER\",\"ROLE_PLAYER\"]', '$2y$13$eqHz6AbVoHiJ4JsihrywEuxq/uVuMd21JKidh6Q5U21kgz3jG9FOW', NULL),
(2, 'client', '[\"ROLE_USER\",\"ROLE_PLAYER\"]', '$2y$13$zn5mnAeZsFxtGVY0hjx/FO4wXYMC/emOmgAdvYcWUB5nHasTjLnGy', 12),
(3, 'test', '[]', '$2y$13$qOtI3kJdIGPDjoPbtEu7SuXk1Xc03Xfl4UGIvB9KQr76yiDYkrn/y', 13),
(4, 'test2', '[]', '$2y$13$mI2/dc3sH9Muoy4.z6/fguGi4BE15A.ovvzddrhakNedUl/YcQ.Ia', 14),
(5, 'JonSnow', '[]', '$2y$13$DpJqEBhYu1OMNVRWMnKA/ujjIq6S7oOp6uajNRckpMdcC/Hrh0Bci', 18),
(6, 'NedStark', '[\"ROLE_PLAYER\"]', '$2y$13$DDGcMDWsoncpp8G6OTCksu2WSbjPFvzNC6TRHfydptLP3.Q2yCEyG', 16),
(7, 'nouveau', '[\"ROLE_PLAYER\"]', '$2y$13$cMT7dTUVtqL2B/wAVG8ODOhyZWQ6oE.Tw7oQ4S2gKrNfVLud.zaou', 8),
(8, 'Black Panther', '[\"ROLE_PLAYER\"]', '$2y$13$OF4oMI3F4OUPAA16pnzhTOibW.s0er3rE2UnIyOBApIiwi4p1YTx6', 9),
(9, 'hulk', '[\"ROLE_PLAYER\"]', '$2y$13$pCVhPXKxWG/2eCNCqwK/CuVT61Er3XSb1js8m5ekfGdtdqNi9LabS', 10),
(10, 'lando', '[\"ROLE_PLAYER\"]', '$2y$13$WGke0Ckz2ib6cLjjpEVoe.JdFhM57PkeFf.FRo4nShilXbFQobqkm', 11),
(11, 'molina', '[\"ROLE_USER\",\"ROLE_REFEREE\"]', '$2y$13$.aeZZPU6qxzSCNr9rNvIlOKz0bZMacK3hDnSQqVakbEfg2nLUlMmS', 17),
(12, 'spidey', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$LSdnFfkQ4kmlLuSYb9mNDuVJ.FP/7v2WCmlda4bMbptK.62WMUPCy', NULL),
(13, 'admin2', '[\"ROLE_ADMIN\"]', '$2y$13$YLfsbdR7vOXUUyyDtu5lhOWNiZvikOLdED1LtesYXdMKTqY8rLf7G', NULL);



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
