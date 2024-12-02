-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 08:06 PM
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
