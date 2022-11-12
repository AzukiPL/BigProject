-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 09:56 PM
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
(1, 1, 'anime', 9),
(2, 1, 'action', 6),
(3, 1, 'horror', 4),
(4, 2, 'anime', 9),
(5, 2, 'action', 4),
(6, 2, 'romance', 4),
(7, 2, 'fantasy', 8),
(8, 1, 'fantasy', 8),
(9, 4, 'adventure', 9),
(10, 4, 'Comedy', 8),
(11, 4, 'Coloring Cartoon', 7);

-- --------------------------------------------------------

--
-- Table structure for table `localisations`
--

CREATE TABLE `localisations` (
  `id` int(10) NOT NULL,
  `town` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `street` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `local` varchar(10) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `localisations`
--

INSERT INTO `localisations` (`id`, `town`, `street`, `local`) VALUES
(1, 'Poddębice', 'polna', '4');

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
  `rates` int(3) NOT NULL,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `length`, `director_id`, `image`, `trailer`, `rates`, `description`) VALUES
(1, 'Jujutsu Kaisen 0', 105, 1, 'jutsu0.png', 'JUJUTSU KAISEN 0 _ Official Trailer.mp4', 90, 'Yuta Okkotsu, a high schooler who gains control of an extremely powerful Cursed Spirit and gets enrolled in the Tokyo Prefectural Jujutsu High School by Jujutsu Sorcerers to help him control his power and keep an eye on him.'),
(2, 'No Game No Life: Zero', 107, 2, 'NGL_MOVIE_KEY_1200X450.png', 'No Game No Life Zero - 1st Trailer.mp4', 88, 'Siblings Sora and Shiro together make up the most feared team of pro gamers in the world, The Blank. When they manage to beat god himself in a game of chess, they are sent to a world where all disputes are settled with games.'),
(4, 'The SpongeBob SquarePants Movie', 87, 3, '3rdFilm_OpenScenes_41.png', 'Spongebob_Movie.mp4', 100, 'When SpongeBob SquarePants\' beloved pet snail Gary goes missing, a path of clues leads SpongeBob and his best friend Patrick to the powerful King Poseidon, who has Gary held captive in the Lost City of Atlantic City. ');

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
  `localisation_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `repertoire`
--

INSERT INTO `repertoire` (`id`, `movie_id`, `2d/3d`, `date`, `time`, `localisation_id`) VALUES
(1, 1, '2d', '2023-01-04', '15:00:00', 1),
(2, 1, '2d', '2022-11-17', '12:00:00', 1),
(3, 2, '2d', '2022-11-17', '18:00:00', 1),
(4, 4, '3d', '2022-11-18', '21:37:00', 1);

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
  `permission_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `e-mail`, `b_day`, `permission_level`) VALUES
(1, 'ProjectCinema', 'zaq1@WSX', 'ProjectCinema@gmail.com', '2002-12-17', 9),
(2, 'Uzytkownik', 'zaq1@WSX', 'uzytkownik@gmail.com', '2003-11-11', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `localisations`
--
ALTER TABLE `localisations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repertoire`
--
ALTER TABLE `repertoire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
