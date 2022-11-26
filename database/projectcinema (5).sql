-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 08:41 PM
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
(3, 'Tim', 'Hill');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `genre` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `priority` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `movie_id`, `genre`, `priority`) VALUES
(1, 1, 'Anime', 9),
(2, 1, 'Action', 6),
(3, 1, 'Horror', 4),
(4, 2, 'Anime', 9),
(5, 2, 'Action', 4),
(6, 2, 'Romance', 4),
(7, 2, 'Fantasy', 8),
(8, 1, 'Fantasy', 8),
(9, 4, 'Adventure', 9),
(10, 4, 'Comedy', 8),
(11, 4, 'Coloring Cartoon', 7),
(12, 0, 'Anime', NULL),
(13, 0, 'Action', NULL),
(14, 0, 'Horror', NULL),
(15, 0, 'Comedy', NULL),
(16, 0, 'Historical', NULL),
(17, 0, 'Romance', NULL),
(18, 0, 'Fantasy', NULL),
(19, 0, 'Coloring Cartoon', NULL),
(20, 0, 'Sci-Fi', NULL),
(21, 0, 'Thriler', NULL),
(22, 0, 'Western', NULL),
(23, 0, 'Adventure', NULL),
(24, 0, 'Animation', NULL),
(25, 0, 'Drama', NULL);

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
  `image` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `trailer` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `rates` int(3) NOT NULL DEFAULT 100,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `length`, `director_id`, `image`, `trailer`, `rates`, `description`) VALUES
(1, 'Jujutsu Kaisen 0', 105, 1, 'jutsu0.png', 'JUJUTSU KAISEN 0 _ Official Trailer.mp4', 94, 'Yuta Okkotsu, a high schooler who gains control of an extremely powerful Cursed Spirit and gets enrolled in the Tokyo Prefectural Jujutsu High School by Jujutsu Sorcerers to help him control his power and keep an eye on him.'),
(2, 'No Game No Life: Zero', 107, 2, 'NGL_MOVIE_KEY_1200X450.png', 'No Game No Life Zero - 1st Trailer.mp4', 100, 'Siblings Sora and Shiro together make up the most feared team of pro gamers in the world, The Blank. When they manage to beat god himself in a game of chess, they are sent to a world where all disputes are settled with games.'),
(4, 'The SpongeBob SquarePants Movie', 87, 3, '3rdFilm_OpenScenes_41.png', 'Spongebob_Movie.mp4', 50, 'When SpongeBob SquarePants\' beloved pet snail Gary goes missing, a path of clues leads SpongeBob and his best friend Patrick to the powerful King Poseidon, who has Gary held captive in the Lost City of Atlantic City. ');

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
(48, 2, '3d', '2022-11-26', '09:00:00', 1, 3, 21),
(49, 2, '2d', '2022-11-26', '10:00:00', 1, 2, 0),
(50, 2, '2d', '2022-11-26', '11:00:00', 1, 1, 0),
(51, 2, '3d', '2022-11-26', '12:00:00', 1, 4, 150);

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
(32, 'ProjectCinema', 48, '16', 1, 0, 1, 'online', 1, '2022-11-24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `localisations`
--
ALTER TABLE `localisations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repertoire`
--
ALTER TABLE `repertoire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
