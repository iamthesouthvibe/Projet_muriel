-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 juil. 2021 à 11:19
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `title_c` varchar(255) NOT NULL,
  `date_c` date DEFAULT NULL,
  `comment` longtext NOT NULL,
  `id_rooms` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rooms` (`id_rooms`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `fullname`, `title_c`, `date_c`, `comment`, `id_rooms`) VALUES
(7, 'test', '', NULL, 'Super sejour dans ce lieu incroyable, le personnel est vraiment cool', 15),
(9, 'Gab', '', NULL, 'Super sejour dans ce lieu incroyable, le personnel est vraiment coolSuper sejour dans ce lieu incroyable, le personnel est vraiment coolSuper sejour dans ce lieu incroyable, le personnel est vraiment cool', 15),
(11, 'test', '', NULL, 'test', 15),
(12, 'Leo Labeaume', 'Tres bon sejour dans cet hotel', NULL, 'Super sejour dans ce lieu incroyable, le personnel est vraiment coolSuper sejour dans ce lieu incroyable, le personnel est vraiment coolSuper sejour dans ce lieu incroyable, le personnel est vraiment cool', 15),
(13, 'test 2 ', 'ceci est un test', '2021-06-10', 'ceci est un testceci est un testceci est un testceci est un testceci est un testceci est un testceci est un testceci est un testceci est un test', 15),
(14, 'Gabrielle Jabarnia', 'Un concept hôtel qui tient ses promesses', '2021-05-12', 'Un concept hôtel qui tient ses promessesUn concept hôtel qui tient ses promessesUn concept hôtel qui tient ses promesses', 16);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(3, 'assets/img/1282be579df4c8d45861b715d7cb818c.jpg'),
(4, 'assets/img/61a4288a79b1ddb39e4a62f14b361744.jpg'),
(5, 'assets/img/a6b8705ac3ad304a92ffdd5ad7b33253.jpg'),
(6, 'assets/img/09eab40045315449141e6c40e47a8393.png'),
(7, 'assets/img/daa87a8335af717e27dd749a655aec8a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `phone` text NOT NULL,
  `people` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `checkin`, `checkout`, `phone`, `people`, `email`, `room`) VALUES
(3, 'Tul', '2017-12-16', '2017-12-26', '0976245430', 2, 'tembothulani@gmail.com', 'Inter-Continental Hotel'),
(5, 'Leo Labeaume', '2021-06-20', '2021-06-30', '0611879183', 2, 'leo.labeaume@hotmail.fr', 'Chita Samfya Lodge');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_number` varchar(255) NOT NULL,
  `rooms` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `details` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `rooms`, `type`, `price`, `details`, `photo`) VALUES
(15, 'Victoria Falls Hotel 1', 20, 'Executive', '550', '   it is a self contained room with room service ', 'images/38a42bea45f24cbe580972a30694fe4a.jpg'),
(16, 'Chita Samfya Lodge', 14, 'Regular', '450', 'it is a self contained room with room service', 'images/e434cecc6cfa3b049462b124681bd0b8.jpg'),
(17, 'Inter-Continental Hotel', 22, 'Executive', '300', '  it is a self contained room with room service.  22', 'images/2ff14dfea91787d539b7509427338e97.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tourism`
--

DROP TABLE IF EXISTS `tourism`;
CREATE TABLE IF NOT EXISTS `tourism` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitles` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `photo_2` text NOT NULL,
  `photo_3` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `tourism`
--

INSERT INTO `tourism` (`id`, `title`, `subtitles`, `photo`, `photo_2`, `photo_3`, `location`, `details`, `date`) VALUES
(4, 'Kuomboka ceremony', '', 'images/0527836c3fa98cb0b57ef19e5d26ff08.png', '', '', 'Mongu', 'It is a traditional ceremony found in Zambia. It is done once every year.', '2017-04-08'),
(14, 'Info', 'test', 'images/f61dad95ac0ff8fc5ffd849591160add.jpg', 'images/74439dfff2d3368ee77745be951e4dc4.jpg', 'images/6051ed369102bdea8daa2016ad69ceea.jpg', 'C:/wamp64/www/ht/images/', 'test', '2021-06-25'),
(15, 'Info 2 ', 'test', 'images/9801b3dc5259f33962c49d248fbff594.jpg', 'images/4c54f664ad4a72d1c8b823d3d7cf97e0.jpg', 'images/c5c80d9d20fe85a90253665743879ef8.jpg', 'Paris', 'test', '2021-06-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(80) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(2, 'Theresa Nayame', 'theresanayame@gmail.com', '$2y$10$NuwKjycWxGZ9qOqXzLOoEeB1R1O5H5bEiRS2ChFiqa7.jg8x9BlAK', '2017-11-11 00:11:15', '2017-12-11 01:36:21', 'editor,admin'),
(3, 'admin', 'admin@admin.com', '$2y$10$Dhgz8tgcOjuI08Y0o5wsS.gK3.kNDRNpc.z9Q0qJ3mGpJMYDaIQBi', '2017-12-13 23:12:51', '2021-07-05 10:33:40', 'editor,admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
