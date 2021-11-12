-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2021 at 12:12 PM
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
(5, 'Léo LABEAUME', 'leo.labeaume@hotmail.fr', '0611879183', '2018-12-01', '2018-12-03', 23),
(12, 'Léo LABEAUME', 'leo.labeaume@hotmail.fr', '0611879183', '2021-11-12', '2021-12-15', 23);

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
(23, 'Villa Grand Large Baie des Anses', 'Villa Grand Large ', '333', 'La Villa Grand Large vous accueille avec sa situation exceptionnelle sur Grande Anse et vous offre une vue époustouflante sur la mer Caraïbe.\r\nEntourée d\'un terrain arboré et fleuri de 2500 m2 qui descend sur la mer turquoise, vous serez au meilleur endroit pour découvrir les tortues et les poissons tropicaux en vous ?équipant juste de masque et tuba.\r\n\r\n', 'La villa est composée de 2 parties: la villa principale au bord de la piscine avec le séjour, la cuisine ouverte, 3 chambres climatisées et 2 salles d\'eau puis la partie en bois sous le carbet, avec 3 chambres en enfilades ventilées naturellement et une douche extérieure.', 'Profitez du large deck autour de la piscine pour vous détendre et du carbet pour vos repas devant ce décor paradisiaque.  Recommandé pour des grands groupes ou famille avec des enfants de plus de 10 ans.', 'Martinique, France', '', 'images/GrandLarge1.jpg', 'La villa Grand Large', 'images/GrandLarge2.jpg', 'La vue unique de votre salon', 'images/GrandLarge3.jpg', 'La belle maison de vacances vous attend', 'images/GrandLarge4.jpg', 'Salon extérieur sous le cabet', 'images/GrandLarge5.jpg', 'Le salon sous le carbet', 'images/GrandLarge6.jpg', 'Sallon', 'images/GrandLarge7.jpg', 'Pièce à vivre', 'images/GrandLarge8.jpg', 'La belle cuisine', 'images/GrandLarge9.jpg', 'La cuisine et la salle à manger', 'images/GrandLarge10.jpg', 'Salon, salle à manger et cuisine', 'images/GrandLarge11.jpg', 'Vue exceptionnelle de la maison', 'images/GrandLarge12.jpg', 'Salon qui donne sur la piscine', 'images/GrandLarge13.jpg', 'Salon face à la mer', 'images/GrandLarge14.jpg', 'La piscine et sa magnifique vue', 'images/GrandLarge15.jpg', 'Chambre du haut', 'images/GrandLarge16.jpg', 'Autre chambre du haut', 'images/GrandLarge17.jpg', 'Plage privée', 'images/GrandLarge18.jpg', 'Salle de bain', 'images/GrandLarge19.jpg', 'Vue de la terrasse', 'images/GrandLarge20.jpg', 'Accès plage', '', 'La piscine cap sur le grand large', '', 'Bienvenue dans un autre monde o? le temps s\'arr?te', '', 'Soyez les bienvenus ? la villa Grand Large', '', 'L\'acc?s ? la mer au pied de la villa Grand Large', '12 personnes', '6 chambres', '2 SdB', 'Vue sur la mer', 'Piscine', 'Jardin', '2 Terrasses\r\n\r\n', '3 Parking', 'Barbecue', '3 climatisations', 'Wifi', 'TV', 'Lave linge', 'Lave vaisselle', 'Linge de maison', 'Planche a voile\r\n\r\n', 'Plongee bouteille', 'Snorkeling', 'Golf', 'Randonnee', 'Paddle', 'Ski nautique', 'Sortie en mer', 'Decouverte des dauphins', 'Peche', 'Peche au gros', 'Kayak', 'Accrobranche', 'Quad', 'Jet Ski', 'Parapente', 'VTT', 'Bord de mer', 'Plage', 'Rhumerie', 'Marche', 'Eglise', 'Musee', 'Jardin botanique', 'Casino', 'Boutiques', 'Marina', 'Restaurants', 'Aeroport  40 km', 'Commerces 3 km', 'Plage/Baignade : 50 m', 'Bourg : 3 km', 'Bord de mer : 50 m', 'Restaurant : 18 m', 'restaurant Ti Sable  50 metres'),
(24, 'Chalet bord de mer', 'Chalet bord de mer', '280', 'Je vous propose à la location chalet neuf en front de mer à Gruissan plage.\r\nJoliment décoré, le chalet se compose d\'un rez de chaussée avec 2 chambres et salle d\'eau, wc indépendant et à l\'étage , salon cuisine, 2 chambres , wc indépendant, salle d\'eau.\r\nLa cuisine est tout équipée.\r\n\r\n\r\n', 'Au pied du chalet, emplacement fermé pour y stocker planche de surf, voile, vélos..... Proche de la mer 50m, aire de jeux , terrain de volley, fête foraine, restaurant de plage, commerces. Tout peut se faire à pied.', 'Souhaitant nous deconnecter pendant les vacances, nous avons choisi de ne pas installer de WIFI , les réseaux 4G restent néanmoins accéssibles', 'Gruissan, France', '', 'images/Chalet1.jpg', 'Vue de la terrasse', 'images/Chalet2.jpg', 'Salon', 'images/Chalet3.jpg', 'Salon', 'images/Chalet4.jpg', 'Chambre du haut ', 'images/Chalet5.jpg', 'Chambre a letage', 'images/Chalet6.jpg', 'eme chambre a letage', 'images/Chalet7.jpg', 'Cuisine', 'images/Chalet8.jpg', 'Chambre du bas ', 'images/Chalet9.jpg', 'Chambre du bas 1 er', 'images/Chalet10.jpg', 'Entree, buanderie', 'images/Chalet11.jpg', 'Vue panoramique', 'images/Chalet12.jpg', 'Vue sur la mer', 'images/Chalet13.jpg', 'Couloir interieur', 'images/Chalet14.jpg', 'Photo de la terrasse vu du bas', 'images/Chalet15.jpg', 'Vu arriere du chalet ', '', 'Vue de face', '', 'Vue de cote', '', 'Terrain de volley', '', 'Terrasse', '', 'Sejour', '', 'Cuisine sejour', '', 'Toilettes', '', '', '', '', '8 personnes', '4 chambres', 'Cuisine', 'Parking gratuit ', 'Television', 'Lave linge', 'Seche-cheveux', 'Sejours longue duree autorises', 'Eau chaude', 'Cintres', 'Chauffage', 'Detecteur de fumee', 'Cuisine', 'Lavevaisselle', 'Entree privee', 'Planche a voile', 'Bateau', 'Plongee sous marine', 'Paddle', 'Kayak', 'Randonnee', 'Plage', 'Velo', 'Ski Nautique', 'Jet Ski ', 'Wake', 'Bouee', 'Plages privees', 'Golf', 'Sortie en mer', 'Tennis', 'Basket', 'Restaurants', 'Plages', 'Musees', 'Casino', 'Boutiques', 'Boites/Bar', 'Parc', 'Bord de mer', 'March?', 'Eglise ', 'Sport Nautique', 'Plages 100m', 'Boutiques : 3km', 'Restaurants : 2km', 'Centre ville : 12km', 'Aeroport : 32km', 'Gare : 8km', 'Distributeur : 1km'),
(25, 'Jolie maison de ville', 'Jolie maison de ville', '185', 'Cette jolie petite maison de 90 m2 a été entièrement rénovée et vous séduira par sa décoration raffinée et son calme. Elle dispose d\'un grand séjour salle à manger très lumineux, d\'une cuisine entièrement équipée et à l\'étage 3 chambres et 1 salle de bain toilette. \r\n', ' Située à quelques pas du centre ville de Narbonne et des halles une institution incontournable de la ville pour tous les fins gourmets et les amateurs de joie de vivre . Le logement Elle dispose d\'un grand séjour très lumineux donnant sur la terrasse et la piscine, d\'une cuisine entièrement équipée (four micro ondes, lave vaisselle, machine à laver, nespresso...) Un petit coin lecture pour les grands et petite table avec 2 chaises pour l\'espaces enfants. L\'étage est recouvert de parquet, il y a 3 chambres, une de 13m2 et deux de 10m2, les lits sont en 140. Il y a une salle d\'eau avec douche et toilette.', 'La maison est entièrement climatisée et dispose du wifi. Vous avez la possibilité de garer votre véhicule devant et gratuitement. Ce logement répondra en tous points pour un séjour en famille avec sa petite piscine de 3X3 , pour quelques jours en amoureux ou le temps d\'un week-end pour venir découvrir son terroir et faire un bons repas au Grand Buffet, dans les halles ou dans les nombreux petits restaurants de la ville et sans oublier a 15\' en voiture Narbonne plage et ses 5 kms de plage de sable blanc. La maison dispose d\'un digicode qui vous permet des arrivées souples.', 'Narbonne, France', '', 'images/Villa1.jpg', 'Terrasse et piscine', 'images/Villa2.jpg', 'Entree donnant sur la terrasse', 'images/Villa3.jpg', 'Escalier ', 'images/Villa4.jpg', 'Terrasse ', 'images/Villa5.jpg', 'Chambre 1 avec placard', 'images/Villa6.jpg', 'Chambre 2  12m2 avec placard', 'images/Villa7.jpg', 'Chambre 1  de 10m2', 'images/Villa8.jpg', 'Chambres deuxieme etage', 'images/Villa9.jpg', 'Salle d\'eau douche wc', 'images/Villa10.jpg', 'Salon', 'images/Villa11.jpg', 'Salle de bain', 'images/Villa12.jpg', 'Cuisine Salle  manger', 'images/Villa13.jpg', 'Chambre', '', 'Chambre', '', 'Chambre', '', 'Salon Salle  manger', '', 'Cle de la Villa', '', 'Escalier et chambres', '', 'Salle a manger et vue sur la piscine', '', 'Salon Cuisine Salle manger', '', 'Salon et en arriere plan terrasse et piscine', '', 'Espace lecture et table de dessin pour enfants', '', '', '', '', 'Cuisine', 'Wifi', 'Parking gratuit', 'Piscine', 'Television', 'Lave-linge', 'Climatisation', 'Seche-cheveux', 'Eau chaude', 'Serviettes et draps', 'Chauffage', 'Kit de premiers secours', 'Fere repasser', 'Terrasse ', '', 'Narbonne Plage', 'Piscine ', 'Kite surf', 'Paddle', 'Location de Bateaux ', 'VTT', 'Randonnees', 'Quad', 'Balades', 'Spectacles ', 'Musees ', 'Theatre ', 'P?che ', 'Voile', 'Catamaran ', 'Jet Ski', 'Wake', 'Abbaye de Fontfroide', 'Les Halles de Narbonne', 'Cathedrale Saint-Just', 'Domaine de Sainte Marthe', 'Aquajet Parc', 'Canal de la Robine', 'Chateau des Karantes', 'Palais des Archeveques ', 'Horreum romain', 'Donjon Gilles Aycelin', 'Basilique Saint-Paul-Serges', 'Plages 6km', 'Centre ville : 3km', 'Restaurants : 1km', 'Boutiques : 3km', 'Aeroport : 23km', 'Commerce : 2km', 'Eglise : 4km'),
(26, 'Chalet dans la montagne', 'Chalet montagne', '300', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Pyrennnes, France', '', 'images/Pyrennes1.jpg', 'Salon, vue sur la terrasse', 'images/Pyrennes2.jpg', 'Vue sur la fôret ', 'images/Pyrennes3.jpg', 'Escaliers intérieur', 'images/Pyrennes4.jpg', 'Chambre', 'images/Pyrennes5.jpg', 'Chambre', 'images/Pyrennes6.jpg', 'Seconde chambre', 'images/Pyrennes7.jpg', 'Lit de la seconde chambre', 'images/Pyrennes8.jpg', 'Chambre', 'images/Pyrennes9.jpg', 'Troisième chambr', 'images/Pyrennes10.jpg', 'Salle de bain', 'images/Pyrennes11.jpg', 'Couloir, escaliers', 'images/Pyrennes12.jpg', 'Chambre enfants', 'images/Pyrennes13.jpg', 'Salle à manger', 'images/Pyrennes14.jpg', 'Salon', 'images/Pyrennes15.jpg', 'Salon qui donne sur la terrasse', 'images/Pyrennes16.jpg', 'Pièce à vivre', 'images/Pyrennes17.jpg', 'Salon', 'images/Pyrennes18.jpg', 'Cuisine et vue sur la neige', '', '', '', '', '', '', '', '', '', '', '', '', 'Cuisine', '4 Chambres', 'Salon', 'Salle de bain', 'Terrasse', 'Cheminée', 'Salon équipé', 'Chambre enfant', 'Chauffage', 'Wifi', 'Pistes', 'Parking', 'Cave', 'Local', '', 'Ski', 'Snowboard', 'Luge', 'Patinoire', 'Randonnée', 'Ski de fond', 'Cinéma', 'Raquette', 'Moto neige', 'Skateparc', 'Tennis', 'Bien être', 'Spa', 'Restaurants', '', '', '', 'Montagne', 'Neige', '', '', '', '', '', '', '', '', '', 'Aéroport :', 'Pistes : 500m', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tourism`
--

CREATE TABLE `tourism` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `citation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` text CHARACTER SET utf8 NOT NULL,
  `photo_2` text CHARACTER SET utf8 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `intro` text NOT NULL,
  `date` date NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tourism`
--

INSERT INTO `tourism` (`id`, `title`, `citation`, `photo`, `photo_2`, `location`, `details`, `intro`, `date`, `id_rooms`) VALUES
(20, 'Les Anses-d&rsquo;Arlet', 'Toute la douceur des &icirc;les', 'images/bb6e34cd03cfd31755ea467a8007fd3f.jpg', 'images/3d8f1b8fefc6f12553ed9e2b88e80903.jpg', 'Martinique, France', '&Agrave; la pointe sud-ouest de la Martinique, &agrave; 15 kilom&egrave;tres de Fort-de-France, Les Anses-d&rsquo;Arlet d&eacute;cline toutes les couleurs des Antilles : bleu azur du ciel et de la mer des Cara&iuml;bes, vert tendre des mornes et des volcans &eacute;teints, blanc, rouge, jaune des maisons traditionnelles aux volets bleus. Avec ses 18 kilom&egrave;tres de plages, ses anses pr&eacute;serv&eacute;es et la silhouette &eacute;l&eacute;gante de son &eacute;glise, on comprend qu&rsquo;il soit le village le plus photographi&eacute; de l&rsquo;&icirc;le et le deuxi&egrave;me &laquo; village pr&eacute;f&eacute;r&eacute; des Fran&ccedil;ais &raquo; 2020.\r\n\r\nBaie turquoise, langoureusement cambr&eacute;e devant le vert tendre de la v&eacute;g&eacute;tation ; cocotiers pench&eacute;s, comme pour mieux &eacute;couter les confidences de la brise ; des maisons blanches, jaunes, bleues, coiff&eacute;es de toits rouges ; pile au bout du ponton de bois jet&eacute; sur la mer azur, un clocher qu&rsquo;on dirait pos&eacute; sur le sable, avec en arri&egrave;re-plan, la silhouette bossue des mornes alentour : oui, Les Anses-d&rsquo;Arlet ont tout d&rsquo;une carte postale. C&rsquo;est d&rsquo;ailleurs un des sites les plus photographi&eacute;s de la Martinique.\r\n\r\nIci, l&rsquo;agitation n&rsquo;est pas de mise, on la laisse &agrave; Fort-de-France, &agrave; 35 kilom&egrave;tres. On lui pr&eacute;f&egrave;re la douce nonchalance des &icirc;les, le farniente et la p&ecirc;che au filet, pratiqu&eacute;e ici le matin de bonne heure. Difficile d&rsquo;imaginer que ce petit bout de paradis, les pieds dans la mer des Cara&iuml;bes, ait pu r&eacute;sonner du fracas des canons et des cris des hommes en guerre&hellip; C&rsquo;est pourtant ce qui est arriv&eacute; ici &agrave; plusieurs reprises.\r\n', '', '2021-11-11', 23),
(21, 'Le rhum Martiniquais : fierté nationale', 'Blanc, Ambr&eacute; ou Vieux, vous succomberez &agrave; ses robes aussi bien avec vos yeux qu&rsquo;avec votre palais. ', 'images/8e0359c3ac47407cc33daa2675af1cf6.jpg', 'images/c25ac1763264bc84f8bd381e18d42cb3.jpg', 'Martinique, France', 'Les rhums de Martinique, prim&eacute;s dans le monde entier, doivent imp&eacute;rativement faire partie de vos exp&eacute;riences gustatives lors de vos prochaines vacances en Martinique. \r\nBlanc, Ambr&eacute; ou Vieux, vous succomberez &agrave; ses robes aussi bien avec vos yeux qu&rsquo;avec votre palais. \r\nLes distilleries o&ugrave; sont produites le pr&eacute;cieux nectar sont ouvertes toute l&rsquo;ann&eacute;e &agrave; la visite, au cours de laquelle vous pourrez entre autres d&eacute;guster et pourquoi pas acheter vos coups de coeur.\r\nVoyagez au c&oelig;ur des distilleries martiniquaises : Depaz, La Mauny, Neisson, Saint-James, JM, Cl&eacute;ment, Habitation Saint-Etienne&hellip; il y a largement de quoi se laisser tenter, mais attention, avec mod&eacute;ration !\r\n\r\nRendez-vous sur les flancs de la Montagne Pel&eacute;e o&ugrave; l&rsquo;habitation Bellevue profite d&rsquo;un climat tropical humide et de la fertilit&eacute; d&rsquo;une terre volcanique r&eacute;put&eacute;e propice &agrave; la culture de la canne &agrave; sucre d&rsquo;exception.\r\n\r\nProduit depuis plusieurs si&egrave;cles selon des techniques anciennes voulues par son fondateur, Jean-Marie Martin, le rhum J.M est jug&eacute; par les connaisseurs comme &eacute;tant le meilleur rhum vieux de l&rsquo;&icirc;le aux fleurs !\r\n\r\nLa Distillerie est l&rsquo;une des rares &agrave; utiliser de l&rsquo;eau de source pour produire ses rhums. Arrivant directement des entrailles de la Montagne Pel&eacute;e, cette eau riche en min&eacute;raux et pure contribue grandement &agrave; la qualit&eacute; des Rhums J.M.', '', '2021-11-12', 23),
(31, 'Plong&eacute;e en Martinique', 'Quel plaisir de partager mon r&ecirc;ve avec ma famille', 'images/b527c0173f2ecf27e7b785a747cbd90d.pakiela.jpg', 'images/fac94cd0703f1b8dcea6b6c168baabdf.pakiela.jpg', 'Martinique, France', 'La Martinique est baign&eacute;e par l&#039;Oc&eacute;an Atlantique sur sa fa&ccedil;ade Est et par la Mer Cara&iuml;be sur sa fa&ccedil;ade Ouest. Elle est &eacute;galement bord&eacute;e de deux profonds canaux: Au Sud le Canal de Sainte Lucie et au Nord celui de la Dominique. V&eacute;ritable carrefour marin les eaux martiniquaises abritent une flore et une faune marine tr&egrave;s diversifi&eacute;es qui font le bonheur des plongeurs sous-marins. Il est ainsi possible d&#039;y observer de tr&egrave;s nombreuses esp&egrave;ces de poissons tropicaux, de tr&egrave;s belles gorgones et patates de corail, des tortues marines et m&ecirc;me des dauphins parfois (si si). La plupart des spots se situent &agrave; l&#039;abri de la grande houle atlantique, c&#039;est &agrave; dire aux extr&eacute;mit&eacute;s nord et sud ainsi que le long de la c&ocirc;te cara&iuml;be. Certains ont m&ecirc;me, au fil des ann&eacute;es, acquis une renomm&eacute;e internationale et nombreux sont les passionn&eacute;s de tous horizons &agrave; vouloir les visiter... C&#039;est en particulier le cas du cimeti&egrave;re d&#039;&eacute;paves de la baie de Saint Pierre - r&eacute;sultat de l&#039;&eacute;ruption catastrophique de la Montagne Pel&eacute;e en 1902 - ou encore du Rocher du Diamant v&eacute;ritable embl&egrave;me de la Martinique ou de la Perle au nord et de la Pointe Burgos au sud. Mais chaque m&eacute;daille a son revers, et courant ou profondeur obligent, seuls les plus exp&eacute;riment&eacute;s pourront profiter pleinement des meilleurs coins pour plonger en toute s&eacute;curit&eacute;. Voici donc quelques renseignements sur les meilleurs spots pour d&eacute;couvrir les fonds marins avec une bouteille ou plus simplement juste &eacute;quip&eacute; de palmes, masque et tuba ainsi que quelques adresses de clubs r&eacute;put&eacute;s.', '', '2021-11-12', 23),
(34, 'Le Ch&acirc;teau de Gruissan', 'Un endroit surprenant', 'images/e29131e70c1877eda2265c947448aaa9.jpg', 'images/44cbf2276088e728c44260a792f59a94.jpg', 'Gruissan, France', 'Avec les vestiges des villas romaines et les dessins de l&rsquo;homme pr&eacute;historique dans la Grotte de la Crouzade, la vie gruissanaise se perd dans la nuit des temps.\r\nPendant des si&egrave;cles, un village &laquo; cherchait &agrave; na&icirc;tre &raquo; pr&egrave;s des &eacute;tangs ou des terroirs.\r\nSur l&rsquo;&Icirc;le Saint Martin, des vestiges de villas, &eacute;glise et m&ecirc;me cimeti&egrave;re attesteraient de la pr&eacute;sence d&rsquo;un groupement humain.\r\n\r\nLes murs sont enduits d&rsquo;une texture fine arrondissant les angles et &agrave; l&rsquo;endroit o&ugrave; ils sont &eacute;rod&eacute;s se situent des ouvertures permettant de recueillir l&rsquo;eau achemin&eacute;e par des tuyaux.\r\nLa rigole, am&eacute;nag&eacute;e dans une pierre taill&eacute;e pour l&rsquo;&eacute;coulement de l&rsquo;eau, a 2 fonctions : r&eacute;cup&eacute;rer l&rsquo;eau de pluie et d&eacute;verser le trop plein pour garder un niveau constant).\r\nLa pr&eacute;sence d&rsquo;ouverture et d&rsquo;une vo&ucirc;te permet de penser qu&rsquo;il s&rsquo;agit d&rsquo;une casemate (abri enterr&eacute; servant de protection contre les tirs). Avec l&rsquo;architecture militaire du Moyen &Acirc;ge, le d&eacute;veloppement de l&rsquo;artillerie accro&icirc;t l&rsquo;&eacute;paisseur des murs. Donc les embrasures int&eacute;rieures ne d&eacute;bouchent plus &agrave; l&rsquo;air libre, mais sur un local ferm&eacute; construit dans la masse du rempart.\r\nLa casemate prot&egrave;ge les servants (artilleurs) contre les coups indirects, mais ses petites ouvertures sont envahies par les gaz d&eacute;gag&eacute;s par les canons et autres armes. Les conduits d&rsquo;a&eacute;ration d&eacute;bouchent sur les parties hautes et forment avec les embrasures un syst&egrave;me de tirage fonctionnant comme une chemin&eacute;e.\r\nL&rsquo;imagination populaire a fait de toutes les salles basses des tours, des &laquo; oubliettes &raquo;, surtout quand elles ne sont accessibles que par un oculus (petite baie &agrave; trac&eacute; circulaire) plac&eacute; dans la vo&ucirc;te.\r\nMais en r&egrave;gle g&eacute;n&eacute;rale, ces salles ne servent que de r&eacute;serves &agrave; vivre. Elles ne sont accessibles que par une petite cavit&eacute; o&ugrave; seul l&rsquo;homme peut entrer.\r\nEn effet, contrairement &agrave; la l&eacute;gende, les hommes du Moyen &Acirc;ge ne cherchent pas &agrave; oublier leurs prisonniers, souvent source de revenus. Ils les placent dans des endroits accessibles, de mani&egrave;re &agrave; pouvoir les surveiller facilement et &agrave; leur assurer un minimum vital.\r\n\r\n', '', '2021-11-19', 24),
(35, 'Le prestigieux site de Gavarnie', 'La beaut&eacute; et la grandeur de la nature', 'images/8390130db7abffec415445e0976321e5.jpg', 'images/5b6af87ba74c5ebc4a9c11272bcefe8b.jpg', 'Mont Perdu, France', 'Plant&eacute; au coeur du Parc National des Pyr&eacute;n&eacute;es, pr&egrave;s du Mont Perdu qui culmine &agrave; plus de 3000m d&#039;altitude, et entour&eacute; au sud par les extraordinaires canyons d&#039;Ordesa, le cirque de Gavarnie est class&eacute; depuis 1997 au Patrimoine Mondial de l&#039;UNESCO. C&#039;est l&#039;un des sites les plus visit&eacute;s dans les Pyr&eacute;n&eacute;es, sans oublier ses voisins class&eacute;s &eacute;galement, Troumouse, le plus grand des cirques, et Estaube, le plus sauvage d&#039;entre eux. \r\n\r\nNotre randonn&eacute;e de Gavarnie &agrave; Ordesa vous fera d&eacute;couvrir l&#039;ensemble de ses sites incontournables.\r\n\r\nLe cirque de Gavarnie abrite une cascade de 423 m&egrave;tres de hauteur, l&#039;une des plus importantes d&#039;Europe. Nombreux sont les randonneurs &agrave; la journ&eacute;e qui prolongent la marche jusqu&#039;&agrave; la Br&egrave;che de Roland, une impressionnante trou&eacute;e naturelle.\r\nD&#039;apr&egrave;s la l&eacute;gende, la br&egrave;che faite entre les deux parois de la montagne s&eacute;parant la France de l&#039;Espagne aurait &eacute;t&eacute; faite par l&#039;&eacute;p&eacute;e de Roland de Roncevaux, le neveu de Charlemagne.', '', '2021-11-12', 26),
(36, 'La Plage &agrave; Narbonne-Plage', 'Quel plaisir de se baigner dans une eau aussi clair ', 'images/55229c72c269e1b363a9662105ad9766.jpg', 'images/1fc071b6a606fc3e00a6841c4e53d531.jpg', 'Narbonne, France', 'Situ&eacute;e &agrave; une quinzaine de kilom&egrave;tres &agrave; l&#039;Est de la ville d&#039;Art et d&#039;Histoire de Narbonne, au pied de la montagne de la Clape, dans le Parc Naturel R&eacute;gional de la Narbonnaise en M&eacute;diterran&eacute;e, la station baln&eacute;aire de Narbonne-Plage, dot&eacute;e du label Pavillon Bleu d&#039;Europe, b&eacute;n&eacute;ficie de la pr&eacute;sence d&#039;une longue plage - pas moins de cinq kilom&egrave;tres de sable fin ! - propice au farniente, &agrave; la baignade et aux loisirs sportifs, tels que la voile, le beach volley, le jet ski, le char &agrave; voile, le catamaran ou encore le kayak de mer. Narbonne-Plage propose aussi de nombreuses animations estivales, telles que march&eacute;s nocturnes, spectacles de plein air, f&ecirc;tes traditionnelles...\r\n\r\nPour les amateurs de nature, la station constitue un bon point de d&eacute;part pour des randonn&eacute;es dans le massif sauvage et pr&eacute;serv&eacute; de la Clape.', '', '2021-11-12', 25),
(37, 'test', 'Test sous title', 'images/3da3630563987e90dacf77aec25f0f7e.png', 'images/1e148f2bcf3ff29c6cd4cbda8c279a41.png', 'Martinique, France', 'Qui quod commodi vel rerum excepturi eum dolorem ipsam. Eos commodi omnis ut dolor tenetur aut quas similique qui amet consequatur ea voluptatum harum? Aut velit perferendis est exercitationem officiis id alias unde et dolores quas eos fuga distinctio et quia maiores. Rem reiciendis culpa ut voluptates pariatur aut eligendi inventore hic natus voluptas!\r\n\r\nEt ducimus voluptates ex dolore commodi id nihil suscipit. Ut praesentium autem qui voluptatem ipsum aut dolore aspernatur.\r\n\r\nUt nisi officia quo facilis illo est nisi internos aut consequatur esse et eaque sint vel tempora quam est voluptatem autem. Et culpa tempora id repellendus tempora et ipsum natus.\r\n\r\n', 'Lorem ipsum dolor sit amet. Aut tenetur cupiditate sit inventore voluptas et quos beatae. Hic assumenda commodi ut magnam quod sed quidem voluptates non nihil laborum. Ut recusandae tempore in galisum veritatis qui harum omnis. Sit consequatur voluptatibus et illum ipsum aut dolores eveniet nisi quibusdam aut reiciendis soluta.', '2021-11-13', 26);

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
(69, 'L&eacute;o LABEAUME', 'leo.labeaume@hotmail.fr', '$2y$10$u98xl0fuMIL9fFYpQy8q6.6zKcbVuL0YqMjqFc2CbV2Ma8rYvzlGm', '2021-07-25 20:07:14', '2021-11-12 11:10:48', 'editor,admin', '119067618_313029256649032_3533176219461607909_n.jpg');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rooms` (`id_rooms`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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

--
-- Constraints for table `tourism`
--
ALTER TABLE `tourism`
  ADD CONSTRAINT `tourism_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
