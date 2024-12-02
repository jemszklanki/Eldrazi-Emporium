-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 08:11 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emporium`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cards`
--

CREATE TABLE `cards` (
  `name` varchar(255) NOT NULL,
  `expansion_id` int(11) DEFAULT NULL,
  `condition_id` int(11) DEFAULT NULL,
  `foil_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`name`, `expansion_id`, `condition_id`, `foil_id`, `language_id`, `notes`, `price`, `quantity`, `image`) VALUES
('dreadmaw', 1, 2, 1, 1, '', 1.00, 2, NULL),
('sda', 1, 1, 1, 1, '1', 1.00, 1, NULL),
('ss', 2, 1, 1, 1, '', 1.00, 1, NULL),
('storm crow', 1, 2, 4, 9, 'siea', 23.00, 1, NULL),
('test', 1, 1, 1, 1, 'damaged', 1.00, 2, NULL),
('tet', 1, 1, 1, 1, '', 1.19, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `condition_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `condition_name`) VALUES
(1, 'Near Mint'),
(2, 'Excellent'),
(3, 'Good'),
(4, 'Light Played'),
(5, 'Played'),
(6, 'Poor');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expansions`
--

CREATE TABLE `expansions` (
  `id` int(11) NOT NULL,
  `expansion_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expansions`
--

INSERT INTO `expansions` (`id`, `expansion_name`) VALUES
(1, 'EX4'),
(2, 'EX2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `foils`
--

CREATE TABLE `foils` (
  `id` int(11) NOT NULL,
  `foil_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foils`
--

INSERT INTO `foils` (`id`, `foil_name`) VALUES
(1, 'None'),
(2, 'Pre-Modern'),
(3, 'Traditional'),
(4, 'From The Vault'),
(5, 'Etched'),
(6, 'Textured'),
(7, 'Double-rainbow'),
(8, 'Confetti'),
(9, 'Galaxy'),
(10, 'Gilded'),
(11, 'Halo'),
(12, 'Invisible Ink'),
(13, 'Neon Ink'),
(14, 'Oil Slick'),
(15, 'Silverscreen'),
(16, 'Step-And-Compleat'),
(17, 'Surge');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`) VALUES
(1, 'English'),
(2, 'French'),
(3, 'German'),
(4, 'Italian'),
(5, 'Portuguese'),
(6, 'Spanish'),
(7, 'Russian'),
(8, 'Korean'),
(9, 'Simplified Chinese'),
(10, 'Traditional Chinese');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `admin`) VALUES
(2, 'srakazdupy', '$2y$10$nJfxgspX//UJKMFpeWBp0uF5YdpoBZMRi0m8ybfzwLsL9vu2lJzbm', 'sraka@gmail.com', '2024-10-03 19:10:05', 0),
(4, 'fmax12', '$2y$10$DInHjGdSCC4BGOXzrXWB5O/C7aOWVQPHgs1jCo.98yKMhFAsJk3k6', '12@gmail.com', '2024-11-24 18:13:31', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`name`),
  ADD KEY `expansion_id` (`expansion_id`),
  ADD KEY `condition_id` (`condition_id`),
  ADD KEY `foil_id` (`foil_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indeksy dla tabeli `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `expansions`
--
ALTER TABLE `expansions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `foils`
--
ALTER TABLE `foils`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expansions`
--
ALTER TABLE `expansions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foils`
--
ALTER TABLE `foils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`expansion_id`) REFERENCES `expansions` (`id`),
  ADD CONSTRAINT `cards_ibfk_2` FOREIGN KEY (`condition_id`) REFERENCES `conditions` (`id`),
  ADD CONSTRAINT `cards_ibfk_3` FOREIGN KEY (`foil_id`) REFERENCES `foils` (`id`),
  ADD CONSTRAINT `cards_ibfk_4` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
