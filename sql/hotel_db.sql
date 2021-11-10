-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 10, 2021 at 09:14 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel_db`
--
CREATE DATABASE IF NOT EXISTS `hotel_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hotel_db`;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `libelle`, `email`, `phone`, `checkin`, `checkout`, `id_rooms`) VALUES
(2, 'test 2', '', '', '2019-02-01', '2019-02-09', 24),
(3, 'test 3', '', '', '2019-12-01', '2019-12-12', 26),
(4, '', '', '', '2019-09-01', '2019-09-03', 25),
(5, 'Léo LABEAUME', 'leo.labeaume@hotmail.fr', '0611879183', '2018-12-01', '2018-12-03', 23);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date_c` varchar(50) DEFAULT NULL,
  `comment` longtext NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `fullname`, `date_c`, `comment`, `id_rooms`) VALUES
(18, 'Valerie Aubree', 'Février 2019', 'Villa merveilleuse aménagé avec beaucoup de gout vue exceptionnelle sur une des plus belles anses. Tout confort !', 23),
(22, 'Monia', 'Juillet 2021', 'Hôte au top très sympathique et disponible. Indications claires et précises pas de points négatifs sur la communication. Accueil chaleureux et souriant parfait rien à redire.', 25),
(23, 'Anne', 'Juillet 2021', 'Hôte adorable et très réactive !\r\nMerci pour l’accueil !', 25),
(24, 'Genoveva', 'Août 2021', 'Todo genial incluido supporte de muriel', 25),
(25, 'Marie', 'Mai 2021', 'Le chalet est top il est encore mieux que sur les photos et il est très bien placé. Muriel est une hôte très attentionnée et réactive. Je vous conseille ce chalet sans hésitation !', 24),
(26, 'Julie', 'Mai 2021', 'Chalet très bien placé, très propre et cosy. La communication avec Muriel est très fluide. Nous reviendrons c\'est certain!', 24),
(31, 'Lara', 'Juin 2012', 'Super séjour grâce à Muriel.L’emplacement est génial, le logement est génial.\r\nMuriel est arrangeante et très agréable.\r\nJe recommande vivement', 24),
(32, 'Marie Laure', 'Juin 2021', 'Ce joli chalet a tout pour plaire ! Tres bon emplacement avec vue sur la mer et prés des commerces à pied , 4 jolies chambres avec une bonne literie, une grande terrasse conviviale et tout ce qu il faut pour passer un excellent séjour ! Nous nous sommes sentis vraiment chez nous ! Merci Muriel à bientôt', 24),
(33, 'Nicolas', 'Juillet 2021', 'Magnifique chalet en bord de mer, séjour très agréable et au calme.\r\nTrès bonne communication avec Muriel, Merci pour sa flexibilité.\r\nA recommander', 24),
(34, 'Carol', 'Juillet 2021', 'Le chalet est très confortable et il y a une vue magnifique depuis la grande terrasse. Nous avons passé un très bon séjour!', 24),
(40, '', 'Janvier 2018', 'Le Chalet est très confortable ! Encore Merci à Muriel pour son accueil', 26);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(3, 'assets/img/1282be579df4c8d45861b715d7cb818c.jpg'),
(4, 'assets/img/61a4288a79b1ddb39e4a62f14b361744.jpg'),
(5, 'assets/img/a6b8705ac3ad304a92ffdd5ad7b33253.jpg'),
(6, 'assets/img/09eab40045315449141e6c40e47a8393.png'),
(7, 'assets/img/daa87a8335af717e27dd749a655aec8a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_p` int(11) NOT NULL,
  `name_p` varchar(255) NOT NULL,
  `description_p` text NOT NULL,
  `photo_p` text NOT NULL,
  `size_p` varchar(10) NOT NULL,
  `quantity_p` varchar(10) NOT NULL,
  `price_p` varchar(255) NOT NULL,
  `rooms_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_p`, `name_p`, `description_p`, `photo_p`, `size_p`, `quantity_p`, `price_p`, `rooms_id`) VALUES
(1, 'test nom', 'test description', 'images/test.png', '', '', '400', 24),
(2, 'test name 2', 'test descrpition 2', 'images/test.png', '', '', '50', 25),
(3, 'test name 3', 'test descri 3', 'images/test.png', '', '', '35', 25),
(6, 'test name 4', 'test descr 4', 'images/test.png', '', '', '45', 23),
(7, 'test name 5', 'test descr 5', 'images/test.png', '', '', '45.50', 23);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `phone` text CHARACTER SET utf8 NOT NULL,
  `people` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `children` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `commentaire` text CHARACTER SET utf8 NOT NULL,
  `zip` varchar(15) CHARACTER SET utf8 NOT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `checkin`, `checkout`, `phone`, `people`, `email`, `children`, `address`, `commentaire`, `zip`, `pays`, `id_rooms`) VALUES
(58, 'Léo LABEAUME', '2021-11-10', '2021-11-19', '0611879183', 2, 'leo.labeaume@hotmail.fr', '3', '124 boulevard auguste blanqui', '', '75103', 'France', 24),
(59, 'Léo LABEAUME', '2021-11-18', '2021-11-30', '0611879183', 2, 'leo.labeaume@hotmail.fr', '2', '124 boulevard auguste blanqui', '', '75103', 'France', 25),
(60, 'test', '2021-12-01', '2021-12-23', '0611077511', 2, 'test@gmail.com', '2', '12 rue rosa bonheur', '', '75015', 'France', 24);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `shortName` varchar(50) NOT NULL,
  `price` text CHARACTER SET armscii8 NOT NULL,
  `details` text NOT NULL,
  `details2` text NOT NULL,
  `details3` text NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `map` text CHARACTER SET armscii8 NOT NULL,
  `photo` text CHARACTER SET armscii8 NOT NULL,
  `photo_des` longtext NOT NULL,
  `photo2` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des2` longtext NOT NULL,
  `photo3` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des3` longtext NOT NULL,
  `photo4` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des4` longtext NOT NULL,
  `photo5` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des5` longtext NOT NULL,
  `photo6` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des6` longtext NOT NULL,
  `photo7` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des7` longtext NOT NULL,
  `photo8` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des8` longtext NOT NULL,
  `photo9` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des9` longtext NOT NULL,
  `photo10` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des10` longtext NOT NULL,
  `photo11` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des11` longtext NOT NULL,
  `photo12` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des12` longtext NOT NULL,
  `photo13` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des13` longtext NOT NULL,
  `photo14` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des14` longtext NOT NULL,
  `photo15` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des15` longtext NOT NULL,
  `photo16` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des16` longtext NOT NULL,
  `photo17` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des17` longtext NOT NULL,
  `photo18` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des18` longtext NOT NULL,
  `photo19` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des19` longtext NOT NULL,
  `photo20` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des20` longtext NOT NULL,
  `photo21` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des21` longtext NOT NULL,
  `photo22` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des22` longtext CHARACTER SET armscii8 NOT NULL,
  `photo23` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des23` longtext CHARACTER SET armscii8 NOT NULL,
  `photo24` longtext CHARACTER SET armscii8 NOT NULL,
  `photo_des24` longtext CHARACTER SET armscii8 NOT NULL,
  `eq1` longtext NOT NULL,
  `eq2` longtext NOT NULL,
  `eq3` longtext NOT NULL,
  `eq4` longtext NOT NULL,
  `eq5` longtext NOT NULL,
  `eq6` longtext NOT NULL,
  `eq7` longtext NOT NULL,
  `eq8` longtext NOT NULL,
  `eq9` longtext NOT NULL,
  `eq10` longtext NOT NULL,
  `eq11` longtext NOT NULL,
  `eq12` longtext NOT NULL,
  `eq13` longtext NOT NULL,
  `eq14` longtext NOT NULL,
  `eq15` longtext NOT NULL,
  `act1` longtext NOT NULL,
  `act2` longtext NOT NULL,
  `act3` longtext NOT NULL,
  `act4` varchar(80) NOT NULL,
  `act5` varchar(80) NOT NULL,
  `act6` varchar(80) NOT NULL,
  `act7` varchar(80) NOT NULL,
  `act8` varchar(80) NOT NULL,
  `act9` varchar(80) NOT NULL,
  `act10` varchar(80) NOT NULL,
  `act11` varchar(80) NOT NULL,
  `act12` varchar(80) NOT NULL,
  `act13` varchar(80) NOT NULL,
  `act14` varchar(80) NOT NULL,
  `act15` varchar(80) NOT NULL,
  `act16` varchar(80) NOT NULL,
  `act17` varchar(80) NOT NULL,
  `inte1` varchar(80) NOT NULL,
  `inte2` varchar(80) NOT NULL,
  `inte3` varchar(80) NOT NULL,
  `inte4` varchar(80) NOT NULL,
  `inte5` varchar(80) NOT NULL,
  `inte6` varchar(80) NOT NULL,
  `inte7` varchar(80) NOT NULL,
  `inte8` varchar(80) NOT NULL,
  `inte9` varchar(80) NOT NULL,
  `inte10` varchar(80) NOT NULL,
  `inte11` varchar(80) NOT NULL,
  `dist1` varchar(100) NOT NULL,
  `dist2` varchar(100) NOT NULL,
  `dist3` varchar(100) NOT NULL,
  `dist4` varchar(100) NOT NULL,
  `dist5` varchar(100) NOT NULL,
  `dist6` varchar(100) NOT NULL,
  `dist7` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `shortName`, `price`, `details`, `details2`, `details3`, `lieu`, `map`, `photo`, `photo_des`, `photo2`, `photo_des2`, `photo3`, `photo_des3`, `photo4`, `photo_des4`, `photo5`, `photo_des5`, `photo6`, `photo_des6`, `photo7`, `photo_des7`, `photo8`, `photo_des8`, `photo9`, `photo_des9`, `photo10`, `photo_des10`, `photo11`, `photo_des11`, `photo12`, `photo_des12`, `photo13`, `photo_des13`, `photo14`, `photo_des14`, `photo15`, `photo_des15`, `photo16`, `photo_des16`, `photo17`, `photo_des17`, `photo18`, `photo_des18`, `photo19`, `photo_des19`, `photo20`, `photo_des20`, `photo21`, `photo_des21`, `photo22`, `photo_des22`, `photo23`, `photo_des23`, `photo24`, `photo_des24`, `eq1`, `eq2`, `eq3`, `eq4`, `eq5`, `eq6`, `eq7`, `eq8`, `eq9`, `eq10`, `eq11`, `eq12`, `eq13`, `eq14`, `eq15`, `act1`, `act2`, `act3`, `act4`, `act5`, `act6`, `act7`, `act8`, `act9`, `act10`, `act11`, `act12`, `act13`, `act14`, `act15`, `act16`, `act17`, `inte1`, `inte2`, `inte3`, `inte4`, `inte5`, `inte6`, `inte7`, `inte8`, `inte9`, `inte10`, `inte11`, `dist1`, `dist2`, `dist3`, `dist4`, `dist5`, `dist6`, `dist7`) VALUES
(23, 'Villa Grand Large Baie des Anses', 'Villa Grand Large ', '250', 'La Villa Grand Large vous accueille avec sa situation exceptionnelle sur Grande Anse et vous offre une vue époustouflante sur la mer Caraïbe.\r\nEntourée d\'un terrain arboré et fleuri de 2500 m2 qui descend sur la mer turquoise, vous serez au meilleur endroit pour découvrir les tortues et les poissons tropicaux en vous ?équipant juste de masque et tuba.\r\n\r\n', 'La villa est composée de 2 parties: la villa principale au bord de la piscine avec le séjour, la cuisine ouverte, 3 chambres climatisées et 2 salles d\'eau puis la partie en bois sous le carbet, avec 3 chambres en enfilades ventilées naturellement et une douche extérieure.', 'Profitez du large deck autour de la piscine pour vous détendre et du carbet pour vos repas devant ce décor paradisiaque.  Recommandé pour des grands groupes ou famille avec des enfants de plus de 10 ans.', 'Martinique, France', '', 'images/GrandLarge1.jpg', 'La villa Grand Large', 'images/GrandLarge2.jpg', 'La vue unique de votre salon', 'images/GrandLarge3.jpg', 'La belle maison de vacances vous attend', 'images/GrandLarge4.jpg', 'Salon extérieur sous le cabet', 'images/GrandLarge5.jpg', 'Le salon sous le carbet', 'images/GrandLarge6.jpg', 'Sallon', 'images/GrandLarge7.jpg', 'Pièce à vivre', 'images/GrandLarge8.jpg', 'La belle cuisine', 'images/GrandLarge9.jpg', 'La cuisine et la salle à manger', 'images/GrandLarge10.jpg', 'Salon, salle à manger et cuisine', 'images/GrandLarge11.jpg', 'Vue exceptionnelle de la maison', 'images/GrandLarge12.jpg', 'Salon qui donne sur la piscine', 'images/GrandLarge13.jpg', 'Salon face à la mer', 'images/GrandLarge14.jpg', 'La piscine et sa magnifique vue', 'images/GrandLarge15.jpg', 'Chambre du haut', 'images/GrandLarge16.jpg', 'Autre chambre du haut', 'images/GrandLarge17.jpg', 'Plage privée', 'images/GrandLarge18.jpg', 'Salle de bain', 'images/GrandLarge19.jpg', 'Vue de la terrasse', 'images/GrandLarge20.jpg', 'Accès plage', '', 'La piscine cap sur le grand large', '', 'Bienvenue dans un autre monde o? le temps s\'arr?te', '', 'Soyez les bienvenus ? la villa Grand Large', '', 'L\'acc?s ? la mer au pied de la villa Grand Large', '12 personnes', '6 chambres', '2 SdB', 'Vue sur la mer', 'Piscine', 'Jardin', '2 Terrasses\r\n\r\n', '3 Parking', 'Barbecue', '3 climatisations', 'Wifi', 'TV', 'Lave linge', 'Lave vaisselle', 'Linge de maison', 'Planche a voile\r\n\r\n', 'Plongee bouteille', 'Snorkeling', 'Golf', 'Randonnee', 'Paddle', 'Ski nautique', 'Sortie en mer', 'Decouverte des dauphins', 'Peche', 'Peche au gros', 'Kayak', 'Accrobranche', 'Quad', 'Jet Ski', 'Parapente', 'VTT', 'Bord de mer', 'Plage', 'Rhumerie', 'Marche', 'Eglise', 'Musee', 'Jardin botanique', 'Casino', 'Boutiques', 'Marina', 'Restaurants', 'Aeroport  40 km', 'Commerces 3 km', 'Plage/Baignade : 50 m', 'Bourg : 3 km', 'Bord de mer : 50 m', 'Restaurant : 18 m', 'restaurant Ti Sable  50 metres'),
(24, 'Chalet bord de mer', 'Chalet bord de mer', '280', 'Je vous propose à la location chalet neuf en front de mer à Gruissan plage.\r\nJoliment décoré, le chalet se compose d\'un rez de chaussée avec 2 chambres et salle d\'eau, wc indépendant et à l\'étage , salon cuisine, 2 chambres , wc indépendant, salle d\'eau.\r\nLa cuisine est tout équipée.\r\n\r\n\r\n', 'Au pied du chalet, emplacement fermé pour y stocker planche de surf, voile, vélos..... Proche de la mer 50m, aire de jeux , terrain de volley, fête foraine, restaurant de plage, commerces. Tout peut se faire à pied.', 'Souhaitant nous deconnecter pendant les vacances, nous avons choisi de ne pas installer de WIFI , les réseaux 4G restent néanmoins accéssibles', 'Gruissan, France', '', 'images/Chalet1.jpg', 'Vue de la terrasse', 'images/Chalet2.jpg', 'Salon', 'images/Chalet3.jpg', 'Salon', 'images/Chalet4.jpg', 'Chambre du haut ', 'images/Chalet5.jpg', 'Chambre a letage', 'images/Chalet6.jpg', 'eme chambre a letage', 'images/Chalet7.jpg', 'Cuisine', 'images/Chalet8.jpg', 'Chambre du bas ', 'images/Chalet9.jpg', 'Chambre du bas 1 er', 'images/Chalet10.jpg', 'Entree, buanderie', 'images/Chalet11.jpg', 'Vue panoramique', 'images/Chalet12.jpg', 'Vue sur la mer', 'images/Chalet13.jpg', 'Couloir interieur', 'images/Chalet14.jpg', 'Photo de la terrasse vu du bas', 'images/Chalet15.jpg', 'Vu arriere du chalet ', '', 'Vue de face', '', 'Vue de cote', '', 'Terrain de volley', '', 'Terrasse', '', 'Sejour', '', 'Cuisine sejour', '', 'Toilettes', '', '', '', '', '8 personnes', '4 chambres', 'Cuisine', 'Parking gratuit ', 'Television', 'Lave linge', 'Seche-cheveux', 'Sejours longue duree autorises', 'Eau chaude', 'Cintres', 'Chauffage', 'Detecteur de fumee', 'Cuisine', 'Lavevaisselle', 'Entree privee', 'Planche a voile', 'Bateau', 'Plongee sous marine', 'Paddle', 'Kayak', 'Randonnee', 'Plage', 'Velo', 'Ski Nautique', 'Jet Ski ', 'Wake', 'Bouee', 'Plages privees', 'Golf', 'Sortie en mer', 'Tennis', 'Basket', 'Restaurants', 'Plages', 'Musees', 'Casino', 'Boutiques', 'Boites/Bar', 'Parc', 'Bord de mer', 'March?', 'Eglise ', 'Sport Nautique', 'Plages 100m', 'Boutiques : 3km', 'Restaurants : 2km', 'Centre ville : 12km', 'Aeroport : 32km', 'Gare : 8km', 'Distributeur : 1km'),
(25, 'Jolie maison de ville', 'Jolie maison de ville', '185', 'Cette jolie petite maison de 90 m2 a été entièrement rénovée et vous séduira par sa décoration raffinée et son calme. Elle dispose d\'un grand séjour salle à manger très lumineux, d\'une cuisine entièrement équipée et à l\'étage 3 chambres et 1 salle de bain toilette. \r\n', ' Située à quelques pas du centre ville de Narbonne et des halles une institution incontournable de la ville pour tous les fins gourmets et les amateurs de joie de vivre . Le logement Elle dispose d\'un grand séjour très lumineux donnant sur la terrasse et la piscine, d\'une cuisine entièrement équipée (four micro ondes, lave vaisselle, machine à laver, nespresso...) Un petit coin lecture pour les grands et petite table avec 2 chaises pour l\'espaces enfants. L\'étage est recouvert de parquet, il y a 3 chambres, une de 13m2 et deux de 10m2, les lits sont en 140. Il y a une salle d\'eau avec douche et toilette.', 'La maison est entièrement climatisée et dispose du wifi. Vous avez la possibilité de garer votre véhicule devant et gratuitement. Ce logement répondra en tous points pour un séjour en famille avec sa petite piscine de 3X3 , pour quelques jours en amoureux ou le temps d\'un week-end pour venir découvrir son terroir et faire un bons repas au Grand Buffet, dans les halles ou dans les nombreux petits restaurants de la ville et sans oublier a 15\' en voiture Narbonne plage et ses 5 kms de plage de sable blanc. La maison dispose d\'un digicode qui vous permet des arrivées souples.', 'Narbonne, France', '', 'images/Villa1.jpg', 'Terrasse et piscine', 'images/Villa2.jpg', 'Entree donnant sur la terrasse', 'images/Villa3.jpg', 'Escalier ', 'images/Villa4.jpg', 'Terrasse ', 'images/Villa5.jpg', 'Chambre 1 avec placard', 'images/Villa6.jpg', 'Chambre 2  12m2 avec placard', 'images/Villa7.jpg', 'Chambre 1  de 10m2', 'images/Villa8.jpg', 'Chambres deuxieme etage', 'images/Villa9.jpg', 'Salle d\'eau douche wc', 'images/Villa10.jpg', 'Salon', 'images/Villa11.jpg', 'Salle de bain', 'images/Villa12.jpg', 'Cuisine Salle  manger', 'images/Villa13.jpg', 'Chambre', '', 'Chambre', '', 'Chambre', '', 'Salon Salle  manger', '', 'Cle de la Villa', '', 'Escalier et chambres', '', 'Salle a manger et vue sur la piscine', '', 'Salon Cuisine Salle manger', '', 'Salon et en arriere plan terrasse et piscine', '', 'Espace lecture et table de dessin pour enfants', '', '', '', '', 'Cuisine', 'Wifi', 'Parking gratuit', 'Piscine', 'Television', 'Lave-linge', 'Climatisation', 'Seche-cheveux', 'Eau chaude', 'Serviettes et draps', 'Chauffage', 'Kit de premiers secours', 'Fere repasser', 'Terrasse ', '', 'Narbonne Plage', 'Piscine ', 'Kite surf', 'Paddle', 'Location de Bateaux ', 'VTT', 'Randonnees', 'Quad', 'Balades', 'Spectacles ', 'Musees ', 'Theatre ', 'P?che ', 'Voile', 'Catamaran ', 'Jet Ski', 'Wake', 'Abbaye de Fontfroide', 'Les Halles de Narbonne', 'Cathedrale Saint-Just', 'Domaine de Sainte Marthe', 'Aquajet Parc', 'Canal de la Robine', 'Chateau des Karantes', 'Palais des Archeveques ', 'Horreum romain', 'Donjon Gilles Aycelin', 'Basilique Saint-Paul-Serges', 'Plages 6km', 'Centre ville : 3km', 'Restaurants : 1km', 'Boutiques : 3km', 'Aeroport : 23km', 'Commerce : 2km', 'Eglise : 4km'),
(26, 'Chalet dans la montagne', 'Chalet montagne', '300', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Pyrennnes, France', '', 'images/Pyrennes1.jpg', 'Salon, vue sur la terrasse', 'images/Pyrennes2.jpg', 'Vue sur la fôret ', 'images/Pyrennes3.jpg', 'Escaliers intérieur', 'images/Pyrennes4.jpg', 'Chambre', 'images/Pyrennes5.jpg', 'Chambre', 'images/Pyrennes6.jpg', 'Seconde chambre', 'images/Pyrennes7.jpg', 'Lit de la seconde chambre', 'images/Pyrennes8.jpg', 'Chambre', 'images/Pyrennes9.jpg', 'Troisième chambr', 'images/Pyrennes10.jpg', 'Salle de bain', 'images/Pyrennes11.jpg', 'Couloir, escaliers', 'images/Pyrennes12.jpg', 'Chambre enfants', 'images/Pyrennes13.jpg', 'Salle à manger', 'images/Pyrennes14.jpg', 'Salon', 'images/Pyrennes15.jpg', 'Salon qui donne sur la terrasse', 'images/Pyrennes16.jpg', 'Pièce à vivre', 'images/Pyrennes17.jpg', 'Salon', 'images/Pyrennes18.jpg', 'Cuisine et vue sur la neige', '', '', '', '', '', '', '', '', '', '', '', '', 'Cuisine', '4 Chambres', 'Salon', 'Salle de bain', 'Terrasse', 'Cheminée', 'Salon équipé', 'Chambre enfant', 'Chauffage', 'Wifi', 'Pistes', 'Parking', 'Cave', 'Local', '', 'Ski', 'Snowboard', 'Luge', 'Patinoire', 'Randonnée', 'Ski de fond', 'Cinéma', 'Raquette', 'Moto neige', 'Skateparc', 'Tennis', 'Bien être', 'Spa', 'Restaurants', '', '', '', 'Montagne', 'Neige', '', '', '', '', '', '', '', '', '', 'Aéroport :', 'Pistes : 500m', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tourism`
--

CREATE TABLE `tourism` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitles` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `photo_2` text NOT NULL,
  `photo_3` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tourism`
--

INSERT INTO `tourism` (`id`, `title`, `subtitles`, `photo`, `photo_2`, `photo_3`, `location`, `details`, `date`) VALUES
(4, 'Kuomboka ceremony', '', 'images/0527836c3fa98cb0b57ef19e5d26ff08.png', '', '', 'Mongu', 'Lorem ipsum dolor sit amet. Aut accusantium nostrum nam vero quis qui tenetur quibusdam ut nobis optio sit enim accusamus non quam velit cum accusamus alias! 33 recusandae velit qui doloribus voluptates ut necessitatibus voluptas et possimus numquam. Ex quaerat sapiente eum galisum totam sit autem suscipit!\r\n\r\nId veritatis quos atque voluptate non aliquid sequi ut molestiae animi qui sunt nisi vel odio corrupti est voluptatem accusamus! A similique recusandae non amet voluptas et fugit alias eum itaque esse ea iure dolores nam beatae possimus aut voluptatibus magni. At dolores quos et assumenda eligendi sit consequatur molestias sit saepe veniam aut commodi consequuntur qui consequuntur rerum. Quo explicabo natus et mollitia voluptates et nesciunt quia et quam animi eum similique mollitia qui odio illum.\r\n\r\nUt itaque veritatis et numquam nemo ut quod laboriosam ex dolor placeat est eligendi ipsum est eius voluptatem sed culpa quia! Eum odit voluptatibus ut perferendis quisquam aut veritatis cupiditate et suscipit iste non animi quis et enim impedit hic rerum voluptates. Sit nobis tempora sit porro sunt sit velit rerum qui dolorem molestiae ratione esse qui reprehenderit corporis. Est recusandae vero est omnis molestiae ullam temporibus.', '2017-04-08'),
(16, 'test', 'test', 'images/86db8944b6b844e4600c6709c9e32868.jpg', 'images/0ecead8a560094352c3269956716ca40.png', 'images/2ea7d11ad3f3ab14b9f9a1899de4aeef.jpg', 'wwesh alorsn', 'ttttttttttttttttt', '2021-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(80) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`, `photo`) VALUES
(3, 'admin', 'admin@admin.com', '$2y$10$Dhgz8tgcOjuI08Y0o5wsS.gK3.kNDRNpc.z9Q0qJ3mGpJMYDaIQBi', '2017-12-13 23:12:51', '2021-07-25 20:14:22', 'editor,admin', ''),
(69, 'L&eacute;o LABEAUME', 'leo.labeaume@hotmail.fr', '$2y$10$u98xl0fuMIL9fFYpQy8q6.6zKcbVuL0YqMjqFc2CbV2Ma8rYvzlGm', '2021-07-25 20:07:14', '2021-11-10 18:54:30', 'editor,admin', '119067618_313029256649032_3533176219461607909_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rooms_2` (`id_rooms`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rooms` (`id_rooms`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `test` (`rooms_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_ibfk_1` (`id_rooms`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism`
--
ALTER TABLE `tourism`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tourism`
--
ALTER TABLE `tourism`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `test` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
