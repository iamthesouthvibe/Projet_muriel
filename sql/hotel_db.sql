-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 27, 2021 at 11:11 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `title_c` varchar(255) NOT NULL,
  `date_c` date DEFAULT NULL,
  `comment` longtext NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `phone` text NOT NULL,
  `people` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `checkin`, `checkout`, `phone`, `people`, `email`, `room`) VALUES
(3, 'Tul', '2017-12-16', '2017-12-26', '0976245430', 2, 'tembothulani@gmail.com', 'Inter-Continental Hotel'),
(5, 'Leo Labeaume', '2021-06-20', '2021-06-30', '0611879183', 2, 'leo.labeaume@hotmail.fr', 'Chita Samfya Lodge');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `rooms` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `details` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `rooms`, `type`, `price`, `details`, `photo`) VALUES
(15, 'Victoria Falls Hotel 1', 20, 'Executive', '550', '   it is a self contained room with room service ', 'images/38a42bea45f24cbe580972a30694fe4a.jpg'),
(16, 'Chita Samfya Lodge', 14, 'Regular', '45000', ' it is a self contained room with room service ', 'images/e434cecc6cfa3b049462b124681bd0b8.jpg'),
(17, 'Inter-Continental Hotel', 22, 'Executive', '300', '  it is a self contained room with room service.  22', 'images/2ff14dfea91787d539b7509427338e97.jpg');

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
(4, 'Kuomboka ceremony', '', 'images/0527836c3fa98cb0b57ef19e5d26ff08.png', '', '', 'Mongu', 'It is a traditional ceremony found in Zambia. It is done once every year.', '2017-04-08'),
(15, 'Info 2 ', 'test', 'images/9801b3dc5259f33962c49d248fbff594.jpg', 'images/4c54f664ad4a72d1c8b823d3d7cf97e0.jpg', 'images/c5c80d9d20fe85a90253665743879ef8.jpg', 'Paris', 'test', '2021-06-10'),
(23, 'wwesh alors', 'wwesh alors', 'images/85176f6714f1cc79868ae53812d8e2a2.jpg', 'images/6f1d5eaf2554dd15e286e0ea0dde18dd.jpg', 'images/1f0439c76fcece5b76af2cc397d18871.pdf', 'wwesh alors', 'wwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alorswwesh alors', '2021-07-28');

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
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `permissions` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`, `photo`) VALUES
(3, 'admin', 'admin@admin.com', '$2y$10$Dhgz8tgcOjuI08Y0o5wsS.gK3.kNDRNpc.z9Q0qJ3mGpJMYDaIQBi', '2017-12-13 23:12:51', '2021-07-27 10:15:05', 'editor,admin', ''),
(7, 'Jean Vayssie', 'jean.vayssie@orange.fr', '$2y$10$s2pgct2GWFW9RSpPmsRcxOhBYrYd5HcEsI99.fsReh2e1gHMPmgrK', '2021-07-23 11:07:33', '2021-07-23 11:33:43', 'editor,admin', ''),
(69, 'L&eacute;o LABEAUME', 'leo.labeaume@hotmail.fr', '$2y$10$u98xl0fuMIL9fFYpQy8q6.6zKcbVuL0YqMjqFc2CbV2Ma8rYvzlGm', '2021-07-25 20:07:14', '2021-07-27 11:07:50', 'editor,admin', '119067618_313029256649032_3533176219461607909_n.jpg'),
(70, 'test', 'test@gmail.com', '$2y$10$jM7yfJFWbLxrLTTPQu6DV.nBzvZYQaoq35uabIrqF2gtII/ncidiu', '2021-07-25 21:07:56', '0000-00-00 00:00:00', 'editor,admin', '5221296029_8a8b074d64_b.jpg'),
(71, 'Gabrielle Jabarnia', 'gabriellejabarnia@yahoo.fr', '$2y$10$J2hVD2KGqK2g2/EYOSzc7u/0G5yUhj2p6v4Y4sUnJkL3vtVtUOyD2', '2021-07-27 10:07:53', '2021-07-27 12:53:53', 'editor,admin', '3-49.jpg'),
(72, 'test2', 'test2@gmail.com', '$2y$10$tWTs8QAKI/phR5IdeQ8W1uCndaqWAXy6Jgi6bfrLmXRclw8WrD47e', '2021-07-27 10:07:56', '2021-07-27 10:56:44', 'editor,admin', '1.png'),
(73, 'test3', 'test3@gmail.com', '$2y$10$WaL/F3yidFX3JKRXYUweJuI4QATyMlPjt9iFxFBMNVyf/zx1W2ZGK', '2021-07-27 11:07:06', '2021-07-27 13:06:07', 'editor,admin', '3-49.jpg'),
(74, 'Michel Thomas-Gerard', 'michel@gmail.com', '$2y$10$vtWcq.Ro9S61OY6TyfVxKucntMkkyo4Wr85vko1n/S18muJpPhoBq', '2021-07-27 11:07:08', '2021-07-27 13:08:11', 'editor,admin', '1png.png');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tourism`
--
ALTER TABLE `tourism`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
