-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 11:14 PM
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
(2, 'Atsuko', ' Ishizuka');

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
(8, 1, 'fantasy', 8);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `length` int(4) NOT NULL,
  `director_id` int(10) NOT NULL,
  `genres_movie_id` int(10) NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `rates 0-10` decimal(2,1) NOT NULL,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `length`, `director_id`, `genres_movie_id`, `image`, `rates 0-10`, `description`) VALUES
(1, 'Jujutsu Kaisen 0', 105, 1, 1, 'jutsu0.png', '9.0', 'Yuta Okkotsu, a high schooler who gains control of an extremely powerful Cursed Spirit and gets enrolled in the Tokyo Prefectural Jujutsu High School by Jujutsu Sorcerers to help him control his power and keep an eye on him.'),
(2, 'No Game No Life: Zero', 107, 2, 2, 'NGL_MOVIE_KEY_1200X450.png', '8.8', 'Siblings Sora and Shiro together make up the most feared team of pro gamers in the world, The Blank. When they manage to beat god himself in a game of chess, they are sent to a world where all disputes are settled with games.');

-- --------------------------------------------------------

--
-- Table structure for table `repertoire`
--

CREATE TABLE `repertoire` (
  `id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `Time` time(6) NOT NULL,
  `date` date NOT NULL,
  `tickets_available` int(3) NOT NULL,
  `tickets_sold` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
  `permissions` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repertoire`
--
ALTER TABLE `repertoire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
