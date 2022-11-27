-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 05:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectcinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment` text COLLATE utf8mb4_polish_ci NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `movie_id`, `user_id`, `comment`, `comment_datetime`) VALUES
(1, 1, 1, 'das is gut', '2022-11-24 18:21:27'),
(2, 1, 2, 'I like cakes', '2022-11-24 18:38:31'),
(4, 1, 1, 'Twoja mama', '2022-11-24 07:42:42'),
(5, 1, 1, 'AAAAAAAAH', '2022-11-24 07:42:52'),
(6, 1, 1, 'TO DZIALA', '2022-11-24 07:42:58'),
(7, 1, 1, 'OH YES', '2022-11-24 07:43:04'),
(8, 1, 1, 'OH YES', '2022-11-24 07:44:15'),
(9, 1, 1, 'OH YES', '2022-11-24 07:44:26'),
(10, 1, 1, 'OH YES', '2022-11-24 07:45:05'),
(11, 1, 1, 'OH YES', '2022-11-24 07:45:26'),
(12, 1, 1, 'OH YES', '2022-11-24 07:45:31'),
(13, 1, 1, 'OH YES', '2022-11-24 07:45:31'),
(14, 1, 1, 'OH YES', '2022-11-24 07:45:40'),
(15, 1, 1, 'sda', '2022-11-24 07:46:54'),
(16, 1, 1, 'sda', '2022-11-24 19:49:01'),
(17, 1, 1, 'Placek', '2022-11-24 19:53:01'),
(18, 1, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaas', '2022-11-24 19:59:34'),
(19, 1, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-11-24 20:00:13'),
(20, 1, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-11-24 20:00:25'),
(21, 1, 1, 'sada', '2022-11-24 20:00:38'),
(22, 1, 1, 'I like pancakes', '2022-11-24 21:25:38'),
(23, 1, 8, 'Yuki was here', '2022-11-24 21:30:11'),
(24, 1, 8, 'Ah', '2022-11-24 21:30:41'),
(25, 1, 8, 'IT WORKS', '2022-11-24 21:30:51'),
(26, 1, 8, 'moan*', '2022-11-24 21:30:55'),
(27, 1, 1, 'test', '2022-11-24 22:15:39'),
(28, 4, 9, 'ło ja pierdole toz to laseraptor', '2022-11-25 09:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `surname`) VALUES
(1, 'Sunghoo ', 'Park'),
(2, 'Atsuko', ' Ishizuka'),
(3, 'Tim', 'Hill'),
(4, 'Jaume', 'Collet-Serra'),
(8, 'Ryan', 'Coogler'),
(10, 'Luca', 'Guadagnino'),
(11, 'Haruo', 'Sotozaki'),
(12, 'James', 'Cameron'),
(13, 'Rocky', 'Morton'),
(14, 'Joel', 'Crawford');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `genre` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `movie_id`, `genre`) VALUES
(1, 1, 'Anime'),
(2, 1, 'Action'),
(3, 1, 'Horror'),
(4, 1, 'Fantasy'),
(5, 2, 'Anime'),
(6, 2, 'Romance'),
(7, 2, 'Fantasy'),
(8, 2, 'Action'),
(9, 4, 'Adventure'),
(10, 4, 'Comedy'),
(11, 4, 'Coloring Cartoon'),
(12, 0, 'Anime'),
(13, 0, 'Action'),
(14, 0, 'Horror'),
(15, 0, 'Comedy'),
(16, 0, 'Historical'),
(17, 0, 'Romance'),
(18, 0, 'Fantasy'),
(19, 0, 'Coloring Cartoon'),
(20, 0, 'Sci-Fi'),
(21, 0, 'Thriler'),
(22, 0, 'Western'),
(23, 0, 'Adventure'),
(24, 0, 'Animation'),
(25, 0, 'Drama'),
(50, 9, 'Action'),
(51, 9, 'Fantasy'),
(52, 9, 'Adventure'),
(53, 9, 'Sci-Fi'),
(54, 9, 'Thriler'),
(55, 9, 'Drama'),
(56, 10, 'Action'),
(57, 10, 'Fantasy'),
(58, 10, 'Adventure'),
(59, 10, 'Thriler'),
(60, 10, 'Drama'),
(61, 11, 'Horror'),
(62, 11, 'Romance'),
(63, 11, 'Thriler'),
(64, 11, 'Drama'),
(65, 0, 'Superhero'),
(66, 0, 'Mystery'),
(67, 9, 'Superhero'),
(68, 10, 'Superhero'),
(69, 12, 'Anime'),
(70, 12, 'Action'),
(71, 12, 'Fantasy'),
(72, 12, 'Adventure'),
(73, 12, 'Historical'),
(74, 12, 'Animation'),
(75, 12, 'Drama'),
(76, 13, 'Action'),
(77, 13, 'Fantasy'),
(78, 13, 'Adventure'),
(79, 13, 'Sci-Fi'),
(80, 13, 'Drama'),
(81, 14, 'Action'),
(82, 14, 'Fantasy'),
(83, 14, 'Adventure'),
(84, 14, 'Comedy'),
(85, 14, 'Sci-Fi'),
(86, 14, 'Thriler'),
(87, 14, 'Superhero'),
(88, 15, 'Action'),
(89, 15, 'Fantasy'),
(90, 15, 'Adventure'),
(91, 15, 'Comedy'),
(92, 15, 'Animation'),
(93, 11, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `localisations`
--

CREATE TABLE `localisations` (
  `id` int(10) NOT NULL,
  `town` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `street` varchar(32) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `local` varchar(10) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `localisations`
--

INSERT INTO `localisations` (`id`, `town`, `street`, `local`) VALUES
(1, 'Poddębice', 'polna', '4'),
(2, 'Lipiny', NULL, '14');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `length` int(4) NOT NULL,
  `director_id` int(10) NOT NULL,
  `image` text COLLATE utf8mb4_polish_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_polish_ci NOT NULL,
  `rates` int(3) NOT NULL DEFAULT 100,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `length`, `director_id`, `image`, `trailer`, `rates`, `description`) VALUES
(1, 'Jujutsu Kaisen 0', 105, 1, 'jutsu0.png', 'JUJUTSU KAISEN 0 _ Official Trailer.mp4', 94, 'Yuta Okkotsu, a high schooler who gains control of an extremely powerful Cursed Spirit and gets enrolled in the Tokyo Prefectural Jujutsu High School by Jujutsu Sorcerers to help him control his power and keep an eye on him.'),
(2, 'No Game No Life: Zero', 107, 2, 'NGL_MOVIE_KEY_1200X450.png', 'No Game No Life Zero - 1st Trailer.mp4', 100, 'Siblings Sora and Shiro together make up the most feared team of pro gamers in the world, The Blank. When they manage to beat god himself in a game of chess, they are sent to a world where all disputes are settled with games.'),
(4, 'The SpongeBob SquarePants Movie', 87, 3, '3rdFilm_OpenScenes_41.png', 'Spongebob_Movie.mp4', 50, 'When SpongeBob SquarePants\' beloved pet snail Gary goes missing, a path of clues leads SpongeBob and his best friend Patrick to the powerful King Poseidon, who has Gary held captive in the Lost City of Atlantic City. '),
(9, 'Black Adam', 125, 4, 'Black_Adam.png', 'Black_Adam.mp4', 100, 'In ancient Kahndaq, Teth Adam was bestowed the almighty powers of the gods. After using these powers for vengeance, he was imprisoned, becoming Black Adam. Nearly 5,000 years have passed, and Black Adam has gone from man to myth to legend.'),
(10, 'Black Panter', 135, 8, 'black-panther-2-reviews.png', 'Y2Mate.is - Marvel Studios’ Black Panther Wakanda Forever  Official Teaser-RlOB3UALvrQ-720p-1655522549725.mp4', 100, 'Queen Ramonda, Shuri, M\'Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T\'Challa\'s death. As the Wakandans strive to embrace their next chapter, the heroes must band together with Nakia and Everett Ross to forge a new path for their beloved kingdom.'),
(11, 'Bones & All', 130, 10, 'Sun.0.png', 'Y2Mate.is - BONES AND ALL  Official Trailer  MGM Studios-pjMt1MIk2EA-720p-1655523233220.mp4', 100, 'Love blossoms between a young woman on the margins of society and a disenfranchised drifter as they embark on a 3,000-mile odyssey through the backroads of America. However, despite their best efforts, all roads lead back to their terrifying pasts and a final stand that will determine whether their love can survive their differences.'),
(12, 'Kimetsu no Yaiba The Mugen Train', 117, 11, 'mugen-train-logo-01.png', 'DemonSlayer.mp4\r\n', 100, 'A boy raised by boars, who wears a boar\'s head, boards the Infinity Train on a new mission with the Flame Pillar along with another boy who reveals his true power when he sleeps. Their mission is to defeat a demon who has been tormenting people and killing the demon slayers who oppose it.'),
(13, 'Avatar: The way of water', 190, 12, 'avatar-the-way-of-water-poster.png', 'Y2Mate.is - Avatar The Way of Water  New Trailer-o5F8MOz_IDw-720p-1655524843277.mp4', 100, 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.'),
(14, 'The Super Mario Bros. Movie', 145, 13, '01-smb-dm-mobile-banner-1080x745-rr-f01-092922-633c42ab5bac8-1.png', 'Y2Mate.is - THE SUPER MARIO BROS MOVIE Official Trailer (2023)-DUnQcJz76Ck-720p-1655525637642.mp4', 100, 'Brooklyn plumbers Mario and Luigi get the shock of their lives when they discover a parallel world populated by the intelligent descendants of dinosaurs. It seems they weren\'t destroyed by a meteor millions of years ago but hurled into another dimension and, now, they have plans to rule our world. It\'s up to our unlikely heroes to battle the evil King Koopa and his Goomba guards, free the beautiful Princess Daisy and save mankind in this adventure of a lifetime.'),
(15, 'Puss n Boots: The Last Wish', 100, 14, '3nDPGbZ76qNE744Sadpekfff00SC1S.png', 'Y2Mate.is - PUSS IN BOOTS 2 The Last Wish Trailer (2022)-fmuQiOORysY-720p-1655526164436.mp4', 100, 'Puss in Boots discovers that his passion for adventure has taken its toll: he has burnt through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.');

-- --------------------------------------------------------

--
-- Table structure for table `repertoire`
--

CREATE TABLE `repertoire` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `2d/3d` varchar(2) COLLATE utf8mb4_polish_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `localisation_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `sold_fares` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `repertoire`
--

INSERT INTO `repertoire` (`id`, `movie_id`, `2d/3d`, `date`, `time`, `localisation_id`, `room_id`, `sold_fares`) VALUES
(52, 1, '2d', '2022-11-28', '08:00:00', 1, 1, 0),
(53, 2, '2d', '2022-11-28', '09:00:00', 1, 2, 0),
(54, 4, '2d', '2022-11-28', '10:00:00', 1, 3, 0),
(55, 9, '3d', '2022-11-28', '11:00:00', 1, 4, 0),
(56, 10, '2d', '2022-11-28', '12:00:00', 1, 5, 0),
(57, 11, '2d', '2022-11-28', '13:00:00', 1, 6, 0),
(58, 12, '3d', '2022-11-28', '14:00:00', 1, 1, 0),
(59, 13, '2d', '2022-11-28', '15:00:00', 1, 2, 0),
(60, 1, '2d', '2022-11-28', '16:00:00', 1, 3, 0),
(61, 14, '2d', '2022-11-28', '17:00:00', 1, 4, 0),
(62, 12, '3d', '2022-11-29', '08:00:00', 1, 2, 0),
(63, 13, '2d', '2022-11-29', '09:00:00', 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) NOT NULL,
  `user_name` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `repertoire_id` int(10) NOT NULL,
  `cost` decimal(4,0) NOT NULL,
  `full-fare-amount` int(3) NOT NULL,
  `reduced-fare-amount` int(3) NOT NULL,
  `isAccount` tinyint(1) NOT NULL,
  `pay_method` varchar(10) COLLATE utf8mb4_polish_ci NOT NULL,
  `isCompleted` tinyint(1) NOT NULL,
  `reservation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_name`, `repertoire_id`, `cost`, `full-fare-amount`, `reduced-fare-amount`, `isAccount`, `pay_method`, `isCompleted`, `reservation_date`) VALUES
(31, 'ProjectCinema', 48, '270', 10, 10, 1, 'cinema', 1, '2022-11-24'),
(32, 'ProjectCinema', 48, '16', 1, 0, 1, 'online', 1, '2022-11-24'),
(33, 'Allah Ab Ahali', 49, '20', 1, 0, 0, 'online', 0, '2022-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rating` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `movie_id`, `user_id`, `rating`) VALUES
(1, 1, 1, 100),
(2, 1, 7, 88),
(3, 2, 7, 100),
(4, 4, 7, 0),
(5, 4, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_polish_ci NOT NULL,
  `localisation_id` int(10) NOT NULL,
  `available_space` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `localisation_id`, `available_space`) VALUES
(1, '101', 1, 100),
(2, '102', 1, 150),
(3, '103', 1, 150),
(4, '201', 1, 150),
(5, '202', 1, 100),
(6, '203', 1, 150),
(7, '101', 2, 100),
(8, '102', 2, 150),
(9, '103', 2, 150),
(10, '201', 2, 100),
(11, '202', 2, 150),
(12, '203', 2, 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(18) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `e-mail` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `b_day` date NOT NULL,
  `permission_level` int(1) NOT NULL DEFAULT 0,
  `localisation_id` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `e-mail`, `b_day`, `permission_level`, `localisation_id`) VALUES
(1, 'ProjectCinema', 'zaq1@WSX', 'ProjectCinema@gmail.com', '2002-12-17', 9, 1),
(2, 'Uzytkownik', 'zaq1@WSX', 'uzytkownik@gmail.com', '2003-11-11', 0, 0),
(3, 'Azu', 'zaq1@WSX', 'maciejwojtkiewicz101@wp.pl', '2002-12-17', 0, 0),
(4, 'Azu2', 'zaq1@WSX', 'maciejwojtkiewicz201@wp.pl', '2002-12-17', 0, 0),
(5, 'Azu3', 'zaq1@WSX', 'maciejwojtkiewicz301@wp.pl', '2002-12-17', 0, 0),
(6, 'Azu4', 'zaq1@WSX', 'wp@wp.pl', '2000-02-17', 0, 0),
(7, 'Admin5', 'zaq1@WSX', 'admin5@gmail.com', '2000-07-18', 5, 2),
(8, 'Yuki', 'zaq1@WSX', 'YukiIsGreat@gmail.com', '2000-01-01', 0, 0),
(9, 'Jerzyk', '12345678', 'twojastara@2137.pl', '2020-10-10', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localisations`
--
ALTER TABLE `localisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repertoire`
--
ALTER TABLE `repertoire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `localisations`
--
ALTER TABLE `localisations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `repertoire`
--
ALTER TABLE `repertoire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
