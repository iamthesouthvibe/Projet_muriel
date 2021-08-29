-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 22 août 2021 à 18:42
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
  `date_c` varchar(50) DEFAULT NULL,
  `comment` longtext NOT NULL,
  `id_rooms` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rooms` (`id_rooms`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
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
(34, 'Carol', 'Juillet 2021', 'Le chalet est très confortable et il y a une vue magnifique depuis la grande terrasse. Nous avons passé un très bon séjour!', 24);

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
  `room_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` text CHARACTER SET armscii8 NOT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lieu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `map` text CHARACTER SET armscii8 NOT NULL,
  `photo` text CHARACTER SET armscii8 NOT NULL,
  `photo_des` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo2` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des2` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo3` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des3` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo4` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des4` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo5` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des5` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo6` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des6` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo7` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des7` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo8` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des8` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo9` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des9` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo10` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des10` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo11` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des11` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo12` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des12` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo13` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des13` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo14` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des14` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo15` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des15` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo16` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des16` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo17` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des17` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo18` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des18` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo19` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des19` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo20` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des20` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo21` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des21` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo22` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des22` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo23` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des23` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo24` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `photo_des24` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `eq1` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq2` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq3` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq4` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq5` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq6` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq7` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq8` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq9` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq10` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq11` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq12` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq13` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq14` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `eq15` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `act1` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act2` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act3` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act4` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act5` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act6` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act7` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act8` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act9` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act10` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act11` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act12` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act13` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act14` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act15` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act16` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `act17` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte1` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte2` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte3` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte4` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte5` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte6` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte7` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte8` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte9` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte10` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `inte11` varchar(80) CHARACTER SET armscii8 NOT NULL,
  `dist1` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `dist2` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `dist3` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `dist4` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `dist5` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `dist6` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `dist7` varchar(100) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `price`, `details`, `lieu`, `map`, `photo`, `photo_des`, `photo2`, `photo_des2`, `photo3`, `photo_des3`, `photo4`, `photo_des4`, `photo5`, `photo_des5`, `photo6`, `photo_des6`, `photo7`, `photo_des7`, `photo8`, `photo_des8`, `photo9`, `photo_des9`, `photo10`, `photo_des10`, `photo11`, `photo_des11`, `photo12`, `photo_des12`, `photo13`, `photo_des13`, `photo14`, `photo_des14`, `photo15`, `photo_des15`, `photo16`, `photo_des16`, `photo17`, `photo_des17`, `photo18`, `photo_des18`, `photo19`, `photo_des19`, `photo20`, `photo_des20`, `photo21`, `photo_des21`, `photo22`, `photo_des22`, `photo23`, `photo_des23`, `photo24`, `photo_des24`, `eq1`, `eq2`, `eq3`, `eq4`, `eq5`, `eq6`, `eq7`, `eq8`, `eq9`, `eq10`, `eq11`, `eq12`, `eq13`, `eq14`, `eq15`, `act1`, `act2`, `act3`, `act4`, `act5`, `act6`, `act7`, `act8`, `act9`, `act10`, `act11`, `act12`, `act13`, `act14`, `act15`, `act16`, `act17`, `inte1`, `inte2`, `inte3`, `inte4`, `inte5`, `inte6`, `inte7`, `inte8`, `inte9`, `inte10`, `inte11`, `dist1`, `dist2`, `dist3`, `dist4`, `dist5`, `dist6`, `dist7`) VALUES
(23, 'Villa Grand Large Baie des Anses', '700', 'La Villa Grand Large vous accueille avec sa situation exceptionnelle sur Grande Anse et vous offre une vue époustouflante sur la mer Caraïbe.\r\nEntourée d\'un terrain arboré et fleuri de 2500 m2 qui descend sur la mer turquoise, vous serez au meilleur endroit pour découvrir les tortues et les poissons tropicaux en vous ?équipant juste de masque et tuba.\r\nLa villa est composée de 2 parties: la villa principale au bord de la piscine avec le séjour, la cuisine ouverte, 3 chambres climatisées et 2 salles d\'eau puis la partie en bois sous le carbet, avec 3 chambres en enfilades ventilées naturellement et une douche extérieure.\r\nProfitez du large deck autour de la piscine pour vous détendre et du carbet pour vos repas devant ce décor paradisiaque.\r\n\r\nRecommandé pour des grands groupes ou famille avec des enfants de plus de 10 ans.', 'Martinique, France', '', 'images/GrandLarge1.jpg', 'La villa Grand Large', 'images/GrandLarge2.jpg', 'La vue unique de votre salon', 'images/GrandLarge3.jpg', 'La belle maison de vacances vous attend', 'images/GrandLarge4.jpg', 'A table sous le carbet face au Grand Large', 'images/GrandLarge5.jpg', 'Le salon sous le carbet', 'images/GrandLarge6.jpg', 'Le salon TV', 'images/GrandLarge7.jpg', 'Le barbecue ? l\'arri?re de la maison', 'images/GrandLarge8.jpg', 'La cuisine ouverte sur la terrasse et la piscine', 'images/GrandLarge9.jpg', 'Le plaisir de cuisiner en vacances ', 'images/GrandLarge10.jpg', 'La chambre principale ? l\'?tage de la maison', 'images/GrandLarge11.jpg', 'Salle d\'eau de la chambre principale ', 'images/GrandLarge12.jpg', 'La seconde chambre avec mezzanine ', 'images/GrandLarge13.jpg', 'La mezzanine pour de grand enfants dans la seconde chambre', 'images/GrandLarge14.jpg', 'La troisi?me chambre climatis?e de la villa', 'images/GrandLarge15.jpg', 'La deuxi?me salle d\'eau de la villa ? l\'?tage', 'images/GrandLarge16.jpg', 'La vue sur Grande Anse extraordinaire', 'images/GrandLarge17.jpg', 'La terrasse salle de d\'eau ext?rieure, des 3 chambres, quand le roost ? se melange au luxe', 'images/GrandLarge18.jpg', 'La premi?re des chambres en enfilade ventil?e', 'images/GrandLarge19.jpg', 'La secondes des trois chambre ventil?es en enfilade', 'images/GrandLarge20.jpg', 'La troisi?me chambre roost de luxe', 'images/GrandLarge21.jpg', 'La piscine cap sur le grand large', 'images/GrandLarge22.jpg', 'Bienvenue dans un autre monde o? le temps s\'arr?te', 'images/GrandLarge23.jpg', 'Soyez les bienvenus ? la villa Grand Large', 'images/GrandLarge24.jpg', 'L\'acc?s ? la mer au pied de la villa Grand Large', '12 personnes', '6 chambres', '2 SdB', 'Vue sur la mer', 'Piscine', 'Jardin', '2 Terrasses\r\n\r\n', '3 Parking', 'Barbecue', '3 climatisations', 'Wifi', 'TV', 'Lave-linge', 'Lave-vaisselle', 'Linge de maison', 'Planche ? voile\r\n\r\n', 'Plong?e (bouteille)', 'Snorkeling', 'Golf', 'Randonn?e', 'Paddle', 'Ski nautique', 'Sortie en mer', 'D?couverte des dauphins', 'P?che', 'P?che au gros', 'Kayak', 'Accrobranche', 'Quad', 'Jet Ski', 'Parapente', 'VTT', 'Bord de mer', 'Plage', 'Rhumerie', 'March?', 'Eglise', 'Mus?e', 'Jardin botanique', 'Casino', 'Boutiques', 'Marina', 'Restaurants', 'A?roport : 40 km', 'Commerces : 3 km', 'Plage/Baignade : 50 m', 'Bourg : 3 km', 'Bord de mer : 50 m', 'Restaurant : 18 m', 'restaurant Ti Sable ? 50 m?tres'),
(24, 'Chalet bord de mer', '650', 'Je vous propose à la location chalet neuf en front de mer à Gruissan plage.\r\nJoliment décoré, le chalet se compose d\'un rez de chaussée avec 2 chambres et salle d\'eau, wc indépendant et à l\'étage , salon cuisine, 2 chambres , wc indépendant, salle d\'eau.\r\nLa cuisine est tout équipée.\r\nAu pied du chalet, emplacement fermé pour y stocker planche de surf, voile, vélos.....\r\nProche de la mer 50m, aire de jeux , terrain de volley, fête foraine, restaurant de plage, commerces. Tout peut se faire à pied.\r\n\r\nSouhaitant nous deconnecter pendant les vacances, nous avons choisi de ne pas installer de WIFI , les réseaux 4G restent néanmoins accéssibles', 'Gruissan, France', '', 'images/Chalet1.jpg', 'Vue de la terrasse', 'images/Chalet2.jpg', 'Salon', 'images/Chalet3.jpg', 'Salon', 'images/Chalet4.jpg', 'Chambre du haut ', 'images/Chalet5.jpg', 'Chambre ? l’?tage', 'images/Chalet6.jpg', '2?me chambre ? l’?tage', 'images/Chalet7.jpg', 'Cuisine', 'images/Chalet8.jpg', 'Chambre du bas 2?me', 'images/Chalet9.jpg', 'Chambre du bas 1 er', 'images/Chalet10.jpg', 'Entr?e, buanderie', 'images/Chalet11.jpg', 'Vue panoramique', 'images/Chalet12.jpg', 'Vue sur la mer', 'images/Chalet13.jpg', 'Couloir int?rieur', 'images/Chalet14.jpg', 'Photo de la terrasse vu du bas', 'images/Chalet15.jpg', 'Vu arri?re du chalet ', 'images/Chalet16.jpg', 'Vue de face', 'images/Chalet17.jpg', 'Vue de cot? ', 'images/Chalet18.jpg', 'Terrain de volley', 'images/Chalet19.jpg', 'Terrasse', 'images/Chalet20.jpg', 'S?jour', 'images/Chalet21.jpg', 'Cuisine, s?jour', 'images/Chalet22.jpg', 'Toilettes', '', '', '', '', '8 personnes', '4 chambres', 'Cuisine', 'Parking gratuit ', 'T?l?vision', 'Lave-linge', 'S?che-cheveux', 'S?jours longue dur?e autoris?s', 'Eau chaude', 'Cintres', 'Chauffage', 'D?tecteur de fum?e', 'Cuisine', 'Lave-vaisselle', 'Entr?e priv?e', 'Planche ? voile', 'Bateau', 'Plong?e sous marine', 'Paddle', 'Kayak', 'Randonn?e', 'Plage', 'V?lo', 'Ski Nautique', 'Jet Ski ', 'Wake', 'Bou?e', 'Plages priv?es', 'Golf', 'Sortie en mer', 'Tennis', 'Basket', 'Restaurants', 'Plages', 'Mus?es', 'Casino', 'Boutiques', 'Boites/Bar', 'Parc', 'Bord de mer', 'March?', 'Eglise ', 'Sport Nautique', 'Plages : 100m', 'Boutiques : 3km', 'Restaurants : 2km', 'Centre ville : 12km', 'A?roport : 32km', 'Gare : 8km', 'Distributeur : 1km'),
(25, 'Jolie maison de ville', '185', 'Cette jolie petite maison de 90 m2 a été entièrement rénovée et vous séduira par sa décoration raffinée et son calme. Elle dispose d\'un grand séjour salle à manger très lumineux, d\'une cuisine entièrement équipée et à l\'étage 3 chambres et 1 salle de bain toilette. Située à quelques pas du centre ville de Narbonne et des halles une institution incontournable de la ville pour tous les fins gourmets et les amateurs de joie de vivre .\r\nLe logement\r\nElle dispose d\'un grand séjour très lumineux donnant sur la terrasse et la piscine, d\'une cuisine entièrement équipée (four micro ondes, lave vaisselle, machine à laver, nespresso...) Un petit coin lecture pour les grands et petite table avec 2 chaises pour l\'espaces enfants. L\'étage est recouvert de parquet, il y a 3 chambres, une de 13m2 et deux de 10m2, les lits sont en 140.\r\nIl y a une salle d\'eau avec douche et toilette.\r\nLa maison est entièrement climatisée et dispose du wifi. Vous avez la possibilité de garer votre véhicule devant et gratuitement.\r\nCe logement répondra en tous points pour un séjour en famille avec sa petite piscine de 3X3 , pour quelques jours en amoureux ou le temps d\'un week-end pour venir découvrir son terroir et faire un bons repas au Grand Buffet, dans les halles ou dans les nombreux petits restaurants de la ville et sans oublier a 15\' en voiture Narbonne plage et ses 5 kms de plage de sable blanc.\r\nLa maison dispose d\'un digicode qui vous permet des arrivées souples.', 'Narbonne, France', '', 'images/Villa1.jpg', 'Terrasse et piscine', 'images/Villa2.jpg', 'Entr?e donnant sur la terrasse', 'images/Villa3.jpg', 'Escalier ', 'images/Villa4.jpg', 'Terrasse ', 'images/Villa5.jpg', 'Chambre 1 avec placard', 'images/Villa6.jpg', 'Chambre 2 - 12m2 avec placard', 'images/Villa7.jpg', 'Chambre 1 - de 10m2', 'images/Villa8.jpg', 'Chambres deuxi?me ?tage', 'images/Villa9.jpg', 'Salle d\'eau/douche/wc', 'images/Villa10.jpg', 'Salon', 'images/Villa11.jpg', 'Salle de bain', 'images/Villa12.jpg', 'Cuisine/Salle ? manger', 'images/Villa13.jpg', 'Chambre', 'images/Villa14.jpg', 'Chambre', 'images/Villa15.jpg', 'Chambre', 'images/Villa16.jpg', 'Salon/Salle ? manger', 'images/Villa17.jpg', 'Cl? de la Villa', 'images/Villa18.jpg', 'Escalier et chambres', 'images/Villa19.jpg', 'Salle ? manger et vue sur la piscine', 'images/Villa20.jpg', 'Salon/Cuisine/Salle ? manger', 'images/Villa21.jpg', 'Salon et en arri?re plan terrasse et piscine', 'images/Villa22.jpg', 'Espace lecture et table de dessin pour enfants', '', '', '', '', 'Cuisine', 'Wifi', 'Parking gratuit', 'Piscine', 'T?l?vision', 'Lave-linge', 'Climatisation', 'S?che-cheveux', 'Eau chaude', 'Serviettes et draps', 'Chauffage', 'Kit de premiers secours', 'Fer ? repasser', 'Terrasse ', '', 'Narbonne Plage', 'Piscine ', 'Kite surf', 'Paddle', 'Location de Bateaux ', 'VTT', 'Randonn?es', 'Quad', 'Balades', 'Spectacles ', 'Mus?es ', 'Th??tre ', 'P?che ', 'Voile', 'Catamaran ', 'Jet Ski', 'Wake', 'Abbaye de Fontfroide', 'Les Halles de Narbonne', 'Cath?drale Saint-Just', 'Domaine de Sainte Marthe', 'Aquajet Parc', 'Canal de la Robine', 'Ch?teau des Karantes', 'Palais des Archev?ques ', 'Horreum romain', 'Donjon Gilles Aycelin', 'Basilique Saint-Paul-Serges', 'Plages : 6km', 'Centre ville : 3km', 'Restaurants : 1km', 'Boutiques : 3km', 'A?roport : 23km', 'Commerce : 2km', 'Eglise : 4km');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `tourism`
--

INSERT INTO `tourism` (`id`, `title`, `subtitles`, `photo`, `photo_2`, `photo_3`, `location`, `details`, `date`) VALUES
(4, 'Kuomboka ceremony', '', 'images/0527836c3fa98cb0b57ef19e5d26ff08.png', '', '', 'Mongu', 'It is a traditional ceremony found in Zambia. It is done once every year.', '2017-04-08'),
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
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`, `photo`) VALUES
(3, 'admin', 'admin@admin.com', '$2y$10$Dhgz8tgcOjuI08Y0o5wsS.gK3.kNDRNpc.z9Q0qJ3mGpJMYDaIQBi', '2017-12-13 23:12:51', '2021-07-25 20:14:22', 'editor,admin', ''),
(7, 'Jean Vayssie', 'jean.vayssie@orange.fr', '$2y$10$s2pgct2GWFW9RSpPmsRcxOhBYrYd5HcEsI99.fsReh2e1gHMPmgrK', '2021-07-23 11:07:33', '2021-07-23 11:33:43', 'editor,admin', ''),
(69, 'L&eacute;o LABEAUME', 'leo.labeaume@hotmail.fr', '$2y$10$u98xl0fuMIL9fFYpQy8q6.6zKcbVuL0YqMjqFc2CbV2Ma8rYvzlGm', '2021-07-25 20:07:14', '2021-08-22 09:44:55', 'editor,admin', '119067618_313029256649032_3533176219461607909_n.jpg');

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
