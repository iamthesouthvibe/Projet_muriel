-- phpMyAdmin SQL Dump
-- version 4.9.6
-- https://www.phpmyadmin.net/
--
-- Hôte : kp3dv.myd.infomaniak.com
-- Généré le :  Dim 05 déc. 2021 à 19:43
-- Version du serveur :  10.4.18-MariaDB-1:10.4.18+maria~stretch-log
-- Version de PHP :  7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--
CREATE DATABASE IF NOT EXISTS `hotel_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hotel_db`;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--
--
-- Structure de la table `calendar`
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
-- Déchargement des données de la table `calendar`
--

INSERT INTO `calendar` (`id`, `libelle`, `email`, `phone`, `checkin`, `checkout`, `id_rooms`) VALUES
(2, 'test 2', '', '', '2019-02-01', '2019-02-09', 24),
(3, 'test 3', '', '', '2019-12-01', '2019-12-12', 26),
(4, '', '', '', '2019-09-01', '2019-09-03', 25),
(5, 'Léo LABEAUME', 'leo.labeaume@hotmail.fr', '0611879183', '2018-12-01', '2018-12-03', 23),
(12, 'Léo LABEAUME', 'leo.labeaume@hotmail.fr', '0611879183', '2021-11-12', '2021-12-15', 23),
(13, 'Test', 'test@gmail.com', '01', '2021-12-16', '2021-12-18', 23);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date_c` varchar(50) DEFAULT NULL,
  `comment` longtext NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(34, 'Carol', 'Juillet 2021', 'Le chalet est très confortable et il y a une vue magnifique depuis la grande terrasse. Nous avons passé un très bon séjour!', 24),
(40, '', 'Janvier 2018', 'Le Chalet est très confortable ! Encore Merci à Muriel pour son accueil', 26);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `products`
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
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_p`, `name_p`, `description_p`, `photo_p`, `size_p`, `quantity_p`, `price_p`, `rooms_id`) VALUES
(1, 'test nom', 'test description', 'images/test.png', '', '', '400', 24),
(2, 'test name 2', 'test descrpition 2', 'images/test.png', '', '', '50', 25),
(3, 'test name 3', 'test descri 3', 'images/test.png', '', '', '35', 25),
(6, 'test name 4', 'test descr 4', 'images/test.png', '', '', '45', 23),
(7, 'test name 5', 'test descr 5', 'images/test.png', '', '', '45.50', 23);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `phone` text NOT NULL,
  `people` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `children` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `checkin`, `checkout`, `phone`, `people`, `email`, `children`, `address`, `commentaire`, `zip`, `pays`, `id_rooms`) VALUES
(218, 'Vayssié', '2022-01-01', '2022-03-05', '33777340108', 1, 'nonhumain@protonmail.com', '1', '23 rue du chatelet', '', '74240', NULL, 23),
(219, 'Jean', '2022-01-13', '2022-02-11', '0777777777', 2, 'Nonhumain@protonmail.com', '2', 'Tdze', 'Hh', 'Dheh', NULL, 23),
(220, 'Léo Labeaume', '2022-02-01', '2022-02-11', '0611879183', 2, 'leo.labeaume@hotmail.fr', '2', '5 rue jean de beauvais', '', '75005', NULL, 23),
(221, 'Léo Labeaume', '2022-02-01', '2022-02-17', '0611879183', 2, 'leo.labeaume@hotmail.fr', '5', '5 rue jean de beauvais', '', '75005', NULL, 23),
(222, 'Léo Labeaume', '2021-12-03', '2021-12-16', '0611879183', 2, 'leo.labeaume@hotmail.fr', '2', '5 rue jean de beauvais', '', '75005', NULL, 25),
(223, 'Léo Labeaume', '2022-02-01', '2022-02-28', '0611879183', 2, 'leo.labeaume@hotmail.fr', '2', '5 rue jean de beauvais', '', '75005', NULL, 26),
(224, 'Vayssié', '2022-02-05', '2022-04-02', '33777340108', 1, 'nonhumain@protonmail.com', '1', '23 rue du chatelet', '', '74240', NULL, 23),
(225, 'Muriel COUTELLIER', '2021-12-26', '2022-01-09', '0674966088', 5, 'coutellier.muriel@wanadoo.fr', '3', '1 impasse de la Coronille', '', '11100', NULL, 23),
(226, 'Muriel COUTELLIER', '2022-01-09', '2022-01-23', '0674966088', 4, 'coutellier.muriel@wanadoo.fr', '1', '1 impasse de la Coronille', '', '11100', NULL, 23);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `shortName` varchar(50) NOT NULL,
  `price` mediumtext NOT NULL,
  `intitule` text NOT NULL,
  `details` text NOT NULL,
  `details2` text NOT NULL,
  `details3` text NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `map` mediumtext NOT NULL,
  `photo` mediumtext NOT NULL,
  `photo2` longtext NOT NULL,
  `photo3` longtext NOT NULL,
  `photo4` longtext NOT NULL,
  `photo5` longtext NOT NULL,
  `photo6` longtext NOT NULL,
  `photo7` longtext NOT NULL,
  `photo8` longtext NOT NULL,
  `photo9` longtext NOT NULL,
  `photo10` longtext NOT NULL,
  `photo11` longtext NOT NULL,
  `photo12` longtext NOT NULL,
  `photo13` longtext NOT NULL,
  `photo14` longtext NOT NULL,
  `photo15` longtext NOT NULL,
  `photo16` longtext NOT NULL,
  `photo17` longtext NOT NULL,
  `photo18` longtext NOT NULL,
  `photo19` longtext NOT NULL,
  `photo20` longtext NOT NULL,
  `photo21` longtext NOT NULL,
  `photo22` longtext NOT NULL,
  `photo23` longtext NOT NULL,
  `photo24` longtext NOT NULL,
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
  `act5` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `shortName`, `price`, `intitule`, `details`, `details2`, `details3`, `lieu`, `map`, `photo`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `photo7`, `photo8`, `photo9`, `photo10`, `photo11`, `photo12`, `photo13`, `photo14`, `photo15`, `photo16`, `photo17`, `photo18`, `photo19`, `photo20`, `photo21`, `photo22`, `photo23`, `photo24`, `eq1`, `eq2`, `eq3`, `eq4`, `eq5`, `eq6`, `eq7`, `eq8`, `eq9`, `eq10`, `eq11`, `eq12`, `eq13`, `eq14`, `eq15`, `act1`, `act2`, `act3`, `act4`, `act5`) VALUES
(23, 'Villa Grand Large Baie des Anses d’Arlet\r\n', 'Villa Grand Large ', '333', 'La villa grand large vous accueille avec sa situation exceptionnelle sur Grande Anse et vous offre une vue époustouflante sur la mer des Caraïbes. Entourée d’un terrain arboré de 2500m2 qui descend sur la mer turquoise. Vous serez au meilleur endroit pour découvrir les tortues et les poissons tropicaux.', 'Une pente douce qui vous fait glisser immédiatement dans un univers de rêve.\r\nPassez la porte aux couleurs chatoyantes et soyez saisi par la vue panoramique sur la baie azur des Anses d’Arlet. La Villa s’ouvre sur l’extérieur dans une parfaite continuité entre dedans et dehors. Pas de 4e mur dans ce large salon de bois blanc qui se prolonge jusqu’à la piscine à débordement avec la mer à l’horizon. \r\n', 'Circulez librement sans cloison de l’espace cuisine au salon, surveillez de loin une grillade dans le barbecue, marchez pieds nus sur le deck, allongez-vous dans un transat suspendu ou goutez un daïquiri sous le carbet… ', 'Pour des vacances en famille ou entre amis, profitez des spacieux espaces communs pour vivre des moments forts et des nombreuses chambres pour se retrouver en toute intimité : trois suites climatisées dans la maison et leurs deux salles de bain, trois autres chambres sous le carbet et la salle de bain façon cabane de Robinson donnant sur la grande bleue et les citronniers. Un petit chemin privatif vous conduit jusqu’à la mer… ', 'Anses d\'Arlet, Martinique', '', 'images/GrandLarge1.jpg', 'images/GrandLarge2.jpg', 'images/GrandLarge3.jpg', 'images/GrandLarge4.jpg', 'images/GrandLarge5.jpg', 'images/GrandLarge6.jpg', 'images/GrandLarge7.jpg', 'images/GrandLarge8.jpg', 'images/GrandLarge9.jpg', 'images/GrandLarge10.jpg', 'images/GrandLarge11.jpg', 'images/GrandLarge12.jpg', 'images/GrandLarge13.jpg', 'images/GrandLarge14.jpg', 'images/GrandLarge15.jpg', 'images/GrandLarge16.jpg', 'images/GrandLarge17.jpg', 'images/GrandLarge18.jpg', 'images/GrandLarge19.jpg', 'images/GrandLarge20.jpg', '', '', '', '', '12 personnes', '6 chambres dont 3 climatisées', '3 Salles de Bain', 'Vue sur mer accès privatif', 'Piscine à débordement', '1 carbet en bois avec terrasse/salon/chambres', 'Parking gratuit\r\n', 'Jardin de 2500m2', 'Barbecue', '', 'Wifi', 'Climatisée', '', '', '', '\r\n', '', '', '', ''),
(24, 'Chalet Bord de Mer', 'Chalet Bord de Mer', '280', 'Gruissan et ses incontournables chalets sur pilotis tournés vers la mer, les pieds dans les vagues. Tentez l’escapade iodée et troquez vos chaussures de ville pour les sandales de plage.', ' Au chalet, vous serez accueilli tout d’abord par deux chambres aux teintes soleil, sa salle de bain et son WC indépendant. Au 1er étage, vous découvrez 2 autres chambres aux couleurs pastel, à coté la salle de bain et son wc indépendant. ', 'L’espace de vie, la cuisine et le salon sont ouverts sur la terrasse avec vue sur la mer \r\n L’espace rappelle l’atmosphère des cabines de plage, le confort et la modernité en plus ! \r\n', 'Sa décoration « rose » façon 37°2 , célèbre film mythique qui a consacré au cinéma la plage de Gruissan, vous séduira par sa douceur.\r\nVous aussi, venez passer de l’autre côté de l’écran…  \r\nVous aussi, venez passer de l’autre côté de l’écran…  \r\n', 'Gruissan, Occitanie', '', 'images/Chalet1.jpg', 'images/Chalet2.jpg', 'images/Chalet3.jpg', 'images/Chalet4.jpg', 'images/Chalet5.jpg', 'images/Chalet6.jpg', 'images/Chalet7.jpg', 'images/Chalet8.jpg', 'images/Chalet9.jpg', 'images/Chalet10.jpg', 'images/Chalet11.jpg', 'images/Chalet12.jpg', 'images/Chalet13.jpg', 'images/Chalet14.jpg', 'images/Chalet15.jpg', '', '', '', '', '', '', '', '', '', '8 personnes', '4 chambres', '2 Salles de Bain', 'Terrasse extérieure', '', '', '', '', '', 'Cuisine équipée', '', 'Climatisée', '2 WC', 'Salon', '', '', '', '', '', ''),
(25, 'Jolie maison de ville', 'Jolie maison de ville', '185', 'Cette jolie maison vous séduira par sa décoration raffinée et son calme. Un petit cocon de calme et de confort.  Vivre au cœur de la ville, de ses saveurs, de ses pierres chaudes, du soleil et des millénaires d’histoire écrite au fil des siècles.', 'Passez le portail, et découvrez un enclos de sérénité avec son bassin central pour se détendre et se rafraichir pendant que d’autres prennent l’apéritif en terrasse à vos côtés. \r\n', 'Au même niveau, le salon et la cuisine avec ses couleurs chaudes vous accueillent immédiatement dans un lieu convivial à la décoration originale, aux petits détails qui attrapent le regard. \r\n\r\n', 'A l’étage, trois chambres épurées et leur salle de bain et son wc pour se reposer en toute quiétude avant de poursuivre le lendemain l’exploration de la ville, son canal, ses petites boutiques et ses halles gourmandes.  ', 'Narbonne, Occitanie', '', 'images/Villa1.jpg', 'images/Villa2.jpg', 'images/Villa3.jpg', 'images/Villa4.jpg', 'images/Villa5.jpg', 'images/Villa6.jpg', 'images/Villa7.jpg', 'images/Villa8.jpg', 'images/Villa9.jpg', 'images/Villa10.jpg', 'images/Villa11.jpg', 'images/Villa12.jpg', 'images/Villa13.jpg', '', '', '', '', '', '', '', '', '', '', '', '6 Personnes', '3 chambres', '1 Salle de Bain', 'Terrasse extérieure', 'Piscine', '', '', '', '', 'Cuisine équipée', '', 'Climatisée', '2 WC', 'Salon', 'Buanderie', 'Centre Ville', '', '', '', ''),
(26, 'Chalet montagne', 'Chalet montagne', '300', 'Ce chalet se veut une bulle chaleureuse au milieu des neiges blanches à l’orée des pistes. Un refuge de repos et de douceur après les pistes l’hiver et les escapades sur les sentiers l’été.', 'Au milieu des sapins, sur les hauteurs, en plein cœur des Pyrénées Ariègeoise, venez découvrir la chaleur d’une vie en chalet : un refuge en bois au milieu des cimes… Découvrez un lieu accueillant pour les grands et les plus jeunes. Ces derniers trouveront pour eux cinq lits superposés façon cabine de bateau pour chuchoter d’un étage à l’autre jusqu’au bout de la nuit. ', 'Faites trois marches supplémentaires et vous trouverez trois chambres spacieuses et confortables ainsi qu’une salle de bain avec douche et WC indépendant. ', 'L’espace de vie, avec cuisine ouverte sur le salon et sa cheminée, domine la forêt noire et blanche. C’est un espace tout en douceur, peluche et plume, tout n’y est que caresse.  Venez tentez l’aventure montagne !  ', 'Bonascre, Ax-les-Thermes, Pyrénées', '', 'images/Pyrennes1.jpg', 'images/Pyrennes2.jpg', 'images/Pyrennes3.jpg', 'images/Pyrennes4.jpg', 'images/Pyrennes5.jpg', 'images/Pyrennes6.jpg', 'images/Pyrennes7.jpg', 'images/Pyrennes8.jpg', 'images/Pyrennes9.jpg', 'images/Pyrennes10.jpg', 'images/Pyrennes11.jpg', 'images/Pyrennes12.jpg', 'images/Pyrennes13.jpg', 'images/Pyrennes14.jpg', 'images/Pyrennes15.jpg', 'images/Pyrennes16.jpg', 'images/Pyrennes17.jpg', 'images/Pyrennes18.jpg', '', '', '', '', '', '', '11 personnes', '3 Chambres avec lit double\r\n1 Chambre avec 5 lits bateau', '1 Salle de Bain', 'Terrasse de 50m2\r\nVue montagne et forêt', '', '', '', '', '', 'Cuisine équipée', 'Wifi', '', '1 WC', 'Salon', '', '', 'Cheminée', 'Hall d’entrée', 'Rangement ski/chaussure', 'Piste à 500m');

-- --------------------------------------------------------

--
-- Structure de la table `tourism`
--

CREATE TABLE `tourism` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `citation` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `photo_2` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `intro` text NOT NULL,
  `date` date NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tourism`
--

INSERT INTO `tourism` (`id`, `title`, `citation`, `photo`, `photo_2`, `location`, `details`, `intro`, `date`, `id_rooms`) VALUES
(20, 'Les Anses-d&rsquo;Arlet', 'Toute la douceur des &icirc;les', 'images/bb6e34cd03cfd31755ea467a8007fd3f.jpg', 'images/3d8f1b8fefc6f12553ed9e2b88e80903.jpg', 'Martinique, France', '&Agrave; la pointe sud-ouest de la Martinique, &agrave; 15 kilom&egrave;tres de Fort-de-France, Les Anses-d&rsquo;Arlet d&eacute;cline toutes les couleurs des Antilles : bleu azur du ciel et de la mer des Cara&iuml;bes, vert tendre des mornes et des volcans &eacute;teints, blanc, rouge, jaune des maisons traditionnelles aux volets bleus. Avec ses 18 kilom&egrave;tres de plages, ses anses pr&eacute;serv&eacute;es et la silhouette &eacute;l&eacute;gante de son &eacute;glise, on comprend qu&rsquo;il soit le village le plus photographi&eacute; de l&rsquo;&icirc;le et le deuxi&egrave;me &laquo; village pr&eacute;f&eacute;r&eacute; des Fran&ccedil;ais &raquo; 2020.\r\n\r\nBaie turquoise, langoureusement cambr&eacute;e devant le vert tendre de la v&eacute;g&eacute;tation ; cocotiers pench&eacute;s, comme pour mieux &eacute;couter les confidences de la brise ; des maisons blanches, jaunes, bleues, coiff&eacute;es de toits rouges ; pile au bout du ponton de bois jet&eacute; sur la mer azur, un clocher qu&rsquo;on dirait pos&eacute; sur le sable, avec en arri&egrave;re-plan, la silhouette bossue des mornes alentour : oui, Les Anses-d&rsquo;Arlet ont tout d&rsquo;une carte postale. C&rsquo;est d&rsquo;ailleurs un des sites les plus photographi&eacute;s de la Martinique.\r\n\r\nIci, l&rsquo;agitation n&rsquo;est pas de mise, on la laisse &agrave; Fort-de-France, &agrave; 35 kilom&egrave;tres. On lui pr&eacute;f&egrave;re la douce nonchalance des &icirc;les, le farniente et la p&ecirc;che au filet, pratiqu&eacute;e ici le matin de bonne heure. Difficile d&rsquo;imaginer que ce petit bout de paradis, les pieds dans la mer des Cara&iuml;bes, ait pu r&eacute;sonner du fracas des canons et des cris des hommes en guerre&hellip; C&rsquo;est pourtant ce qui est arriv&eacute; ici &agrave; plusieurs reprises.\r\n', '', '2021-11-11', 23),
(21, 'Le rhum Martiniquais : fierté nationale', 'Blanc, Ambr&eacute; ou Vieux, vous succomberez &agrave; ses robes aussi bien avec vos yeux qu&rsquo;avec votre palais. ', 'images/8e0359c3ac47407cc33daa2675af1cf6.jpg', 'images/c25ac1763264bc84f8bd381e18d42cb3.jpg', 'Martinique, France', 'Les rhums de Martinique, prim&eacute;s dans le monde entier, doivent imp&eacute;rativement faire partie de vos exp&eacute;riences gustatives lors de vos prochaines vacances en Martinique. \r\nBlanc, Ambr&eacute; ou Vieux, vous succomberez &agrave; ses robes aussi bien avec vos yeux qu&rsquo;avec votre palais. \r\nLes distilleries o&ugrave; sont produites le pr&eacute;cieux nectar sont ouvertes toute l&rsquo;ann&eacute;e &agrave; la visite, au cours de laquelle vous pourrez entre autres d&eacute;guster et pourquoi pas acheter vos coups de coeur.\r\nVoyagez au c&oelig;ur des distilleries martiniquaises : Depaz, La Mauny, Neisson, Saint-James, JM, Cl&eacute;ment, Habitation Saint-Etienne&hellip; il y a largement de quoi se laisser tenter, mais attention, avec mod&eacute;ration !\r\n\r\nRendez-vous sur les flancs de la Montagne Pel&eacute;e o&ugrave; l&rsquo;habitation Bellevue profite d&rsquo;un climat tropical humide et de la fertilit&eacute; d&rsquo;une terre volcanique r&eacute;put&eacute;e propice &agrave; la culture de la canne &agrave; sucre d&rsquo;exception.\r\n\r\nProduit depuis plusieurs si&egrave;cles selon des techniques anciennes voulues par son fondateur, Jean-Marie Martin, le rhum J.M est jug&eacute; par les connaisseurs comme &eacute;tant le meilleur rhum vieux de l&rsquo;&icirc;le aux fleurs !\r\n\r\nLa Distillerie est l&rsquo;une des rares &agrave; utiliser de l&rsquo;eau de source pour produire ses rhums. Arrivant directement des entrailles de la Montagne Pel&eacute;e, cette eau riche en min&eacute;raux et pure contribue grandement &agrave; la qualit&eacute; des Rhums J.M.', '', '2021-11-12', 23),
(31, 'Plong&eacute;e en Martinique', 'Quel plaisir de partager mon r&ecirc;ve avec ma famille', 'images/b527c0173f2ecf27e7b785a747cbd90d.pakiela.jpg', 'images/fac94cd0703f1b8dcea6b6c168baabdf.pakiela.jpg', 'Martinique, France', 'La Martinique est baign&eacute;e par l&#039;Oc&eacute;an Atlantique sur sa fa&ccedil;ade Est et par la Mer Cara&iuml;be sur sa fa&ccedil;ade Ouest. Elle est &eacute;galement bord&eacute;e de deux profonds canaux: Au Sud le Canal de Sainte Lucie et au Nord celui de la Dominique. V&eacute;ritable carrefour marin les eaux martiniquaises abritent une flore et une faune marine tr&egrave;s diversifi&eacute;es qui font le bonheur des plongeurs sous-marins. Il est ainsi possible d&#039;y observer de tr&egrave;s nombreuses esp&egrave;ces de poissons tropicaux, de tr&egrave;s belles gorgones et patates de corail, des tortues marines et m&ecirc;me des dauphins parfois (si si). La plupart des spots se situent &agrave; l&#039;abri de la grande houle atlantique, c&#039;est &agrave; dire aux extr&eacute;mit&eacute;s nord et sud ainsi que le long de la c&ocirc;te cara&iuml;be. Certains ont m&ecirc;me, au fil des ann&eacute;es, acquis une renomm&eacute;e internationale et nombreux sont les passionn&eacute;s de tous horizons &agrave; vouloir les visiter... C&#039;est en particulier le cas du cimeti&egrave;re d&#039;&eacute;paves de la baie de Saint Pierre - r&eacute;sultat de l&#039;&eacute;ruption catastrophique de la Montagne Pel&eacute;e en 1902 - ou encore du Rocher du Diamant v&eacute;ritable embl&egrave;me de la Martinique ou de la Perle au nord et de la Pointe Burgos au sud. Mais chaque m&eacute;daille a son revers, et courant ou profondeur obligent, seuls les plus exp&eacute;riment&eacute;s pourront profiter pleinement des meilleurs coins pour plonger en toute s&eacute;curit&eacute;. Voici donc quelques renseignements sur les meilleurs spots pour d&eacute;couvrir les fonds marins avec une bouteille ou plus simplement juste &eacute;quip&eacute; de palmes, masque et tuba ainsi que quelques adresses de clubs r&eacute;put&eacute;s.', '', '2021-11-12', 23),
(34, 'Le Ch&acirc;teau de Gruissan', 'Un endroit surprenant', 'images/e29131e70c1877eda2265c947448aaa9.jpg', 'images/44cbf2276088e728c44260a792f59a94.jpg', 'Gruissan, France', 'Avec les vestiges des villas romaines et les dessins de l&rsquo;homme pr&eacute;historique dans la Grotte de la Crouzade, la vie gruissanaise se perd dans la nuit des temps.\r\nPendant des si&egrave;cles, un village &laquo; cherchait &agrave; na&icirc;tre &raquo; pr&egrave;s des &eacute;tangs ou des terroirs.\r\nSur l&rsquo;&Icirc;le Saint Martin, des vestiges de villas, &eacute;glise et m&ecirc;me cimeti&egrave;re attesteraient de la pr&eacute;sence d&rsquo;un groupement humain.\r\n\r\nLes murs sont enduits d&rsquo;une texture fine arrondissant les angles et &agrave; l&rsquo;endroit o&ugrave; ils sont &eacute;rod&eacute;s se situent des ouvertures permettant de recueillir l&rsquo;eau achemin&eacute;e par des tuyaux.\r\nLa rigole, am&eacute;nag&eacute;e dans une pierre taill&eacute;e pour l&rsquo;&eacute;coulement de l&rsquo;eau, a 2 fonctions : r&eacute;cup&eacute;rer l&rsquo;eau de pluie et d&eacute;verser le trop plein pour garder un niveau constant).\r\nLa pr&eacute;sence d&rsquo;ouverture et d&rsquo;une vo&ucirc;te permet de penser qu&rsquo;il s&rsquo;agit d&rsquo;une casemate (abri enterr&eacute; servant de protection contre les tirs). Avec l&rsquo;architecture militaire du Moyen &Acirc;ge, le d&eacute;veloppement de l&rsquo;artillerie accro&icirc;t l&rsquo;&eacute;paisseur des murs. Donc les embrasures int&eacute;rieures ne d&eacute;bouchent plus &agrave; l&rsquo;air libre, mais sur un local ferm&eacute; construit dans la masse du rempart.\r\nLa casemate prot&egrave;ge les servants (artilleurs) contre les coups indirects, mais ses petites ouvertures sont envahies par les gaz d&eacute;gag&eacute;s par les canons et autres armes. Les conduits d&rsquo;a&eacute;ration d&eacute;bouchent sur les parties hautes et forment avec les embrasures un syst&egrave;me de tirage fonctionnant comme une chemin&eacute;e.\r\nL&rsquo;imagination populaire a fait de toutes les salles basses des tours, des &laquo; oubliettes &raquo;, surtout quand elles ne sont accessibles que par un oculus (petite baie &agrave; trac&eacute; circulaire) plac&eacute; dans la vo&ucirc;te.\r\nMais en r&egrave;gle g&eacute;n&eacute;rale, ces salles ne servent que de r&eacute;serves &agrave; vivre. Elles ne sont accessibles que par une petite cavit&eacute; o&ugrave; seul l&rsquo;homme peut entrer.\r\nEn effet, contrairement &agrave; la l&eacute;gende, les hommes du Moyen &Acirc;ge ne cherchent pas &agrave; oublier leurs prisonniers, souvent source de revenus. Ils les placent dans des endroits accessibles, de mani&egrave;re &agrave; pouvoir les surveiller facilement et &agrave; leur assurer un minimum vital.\r\n\r\n', '', '2021-11-19', 24),
(35, 'Le prestigieux site de Gavarnie', 'La beaut&eacute; et la grandeur de la nature', 'images/8390130db7abffec415445e0976321e5.jpg', 'images/5b6af87ba74c5ebc4a9c11272bcefe8b.jpg', 'Mont Perdu, France', 'Plant&eacute; au coeur du Parc National des Pyr&eacute;n&eacute;es, pr&egrave;s du Mont Perdu qui culmine &agrave; plus de 3000m d&#039;altitude, et entour&eacute; au sud par les extraordinaires canyons d&#039;Ordesa, le cirque de Gavarnie est class&eacute; depuis 1997 au Patrimoine Mondial de l&#039;UNESCO. C&#039;est l&#039;un des sites les plus visit&eacute;s dans les Pyr&eacute;n&eacute;es, sans oublier ses voisins class&eacute;s &eacute;galement, Troumouse, le plus grand des cirques, et Estaube, le plus sauvage d&#039;entre eux. \r\n\r\nNotre randonn&eacute;e de Gavarnie &agrave; Ordesa vous fera d&eacute;couvrir l&#039;ensemble de ses sites incontournables.\r\n\r\nLe cirque de Gavarnie abrite une cascade de 423 m&egrave;tres de hauteur, l&#039;une des plus importantes d&#039;Europe. Nombreux sont les randonneurs &agrave; la journ&eacute;e qui prolongent la marche jusqu&#039;&agrave; la Br&egrave;che de Roland, une impressionnante trou&eacute;e naturelle.\r\nD&#039;apr&egrave;s la l&eacute;gende, la br&egrave;che faite entre les deux parois de la montagne s&eacute;parant la France de l&#039;Espagne aurait &eacute;t&eacute; faite par l&#039;&eacute;p&eacute;e de Roland de Roncevaux, le neveu de Charlemagne.', '', '2021-11-12', 26),
(36, 'La Plage &agrave; Narbonne-Plage', 'Quel plaisir de se baigner dans une eau aussi clair ', 'images/55229c72c269e1b363a9662105ad9766.jpg', 'images/1fc071b6a606fc3e00a6841c4e53d531.jpg', 'Narbonne, France', 'Situ&eacute;e &agrave; une quinzaine de kilom&egrave;tres &agrave; l&#039;Est de la ville d&#039;Art et d&#039;Histoire de Narbonne, au pied de la montagne de la Clape, dans le Parc Naturel R&eacute;gional de la Narbonnaise en M&eacute;diterran&eacute;e, la station baln&eacute;aire de Narbonne-Plage, dot&eacute;e du label Pavillon Bleu d&#039;Europe, b&eacute;n&eacute;ficie de la pr&eacute;sence d&#039;une longue plage - pas moins de cinq kilom&egrave;tres de sable fin ! - propice au farniente, &agrave; la baignade et aux loisirs sportifs, tels que la voile, le beach volley, le jet ski, le char &agrave; voile, le catamaran ou encore le kayak de mer. Narbonne-Plage propose aussi de nombreuses animations estivales, telles que march&eacute;s nocturnes, spectacles de plein air, f&ecirc;tes traditionnelles...\r\n\r\nPour les amateurs de nature, la station constitue un bon point de d&eacute;part pour des randonn&eacute;es dans le massif sauvage et pr&eacute;serv&eacute; de la Clape.', '', '2021-11-12', 25);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(80) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`, `photo`) VALUES
(3, 'admin', 'admin@admin.com', '$2y$10$Dhgz8tgcOjuI08Y0o5wsS.gK3.kNDRNpc.z9Q0qJ3mGpJMYDaIQBi', '2017-12-13 23:12:51', '2021-11-12 14:08:27', 'editor,admin', ''),
(69, 'L&eacute;o LABEAUME', 'leo.labeaume@hotmail.fr', '$2y$10$u98xl0fuMIL9fFYpQy8q6.6zKcbVuL0YqMjqFc2CbV2Ma8rYvzlGm', '2021-07-25 20:07:14', '2021-12-02 11:02:31', 'editor,admin', '119067618_313029256649032_3533176219461607909_n.jpg'),
(70, 'Muriel Lambert', 'muriel.homes.location@gmail.com', 'AdminMuriel1997?', '2021-11-12 14:15:24', '2021-11-12 20:42:27', 'editor,admin', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rooms_2` (`id_rooms`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rooms` (`id_rooms`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `test` (`rooms_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_ibfk_1` (`id_rooms`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tourism`
--
ALTER TABLE `tourism`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rooms` (`id_rooms`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `tourism`
--
ALTER TABLE `tourism`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `test` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tourism`
--
ALTER TABLE `tourism`
  ADD CONSTRAINT `tourism_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
