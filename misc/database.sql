-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 05:07 AM
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
('storm crow', 1, 2, 4, 9, 'siea', 23.50, 1, ''),
('test', 1, 1, 1, 1, 'damaged', 1.00, 2, NULL),
('tet', 1, 1, 1, 1, '', 1.19, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart_log`
--

CREATE TABLE `cart_log` (
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_log`
--

INSERT INTO `cart_log` (`user_id`, `item_name`, `quantity`, `id`) VALUES
(4, 'dreadmaw', 2, 15),
(4, 'sda', 1, 16),
(4, 'storm crow', 1, 17),
(4, 'test', 2, 18),
(8, 'dreadmaw', 2, 19),
(8, 'sda', 1, 20),
(8, 'storm crow', 1, 21),
(8, 'test', 2, 22);

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
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `street` varchar(80) NOT NULL,
  `number` varchar(10) NOT NULL,
  `status_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_cards`
--

CREATE TABLE `order_cards` (
  `order_id` int(11) NOT NULL,
  `card_name` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_payment`
--

CREATE TABLE `order_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_payment`
--

INSERT INTO `order_payment` (`payment_id`, `payment_name`) VALUES
(1, 'blik'),
(2, 'karta'),
(3, 'przelew');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_shipment`
--

CREATE TABLE `order_shipment` (
  `shipment_id` int(11) NOT NULL,
  `shipment_name` varchar(255) NOT NULL,
  `shipment_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_shipment`
--

INSERT INTO `order_shipment` (`shipment_id`, `shipment_name`, `shipment_price`) VALUES
(1, 'kurier', 25.50),
(2, 'poczta', 13.00),
(3, 'odbiór osobisty', 0.00),
(4, 'paczkomat', 7.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`status_id`, `status_name`) VALUES
(1, 'przygotowana'),
(2, 'wysłana'),
(3, 'odebrana');

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
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `verified` tinyint(1) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `admin`, `verified`, `token`) VALUES
(2, 'srakazdupy', '$2y$10$nJfxgspX//UJKMFpeWBp0uF5YdpoBZMRi0m8ybfzwLsL9vu2lJzbm', 'sraka@gmail.com', '2024-10-03 19:10:05', 0, 0, ''),
(4, 'fmax12', '$2y$10$DInHjGdSCC4BGOXzrXWB5O/C7aOWVQPHgs1jCo.98yKMhFAsJk3k6', '12@gmail.com', '2024-11-24 18:13:31', 1, 0, ''),
(5, 'kupasrupa', '$2y$10$MvwJtkevQzbS2rhmiW/Z.eqyU9984XqUJiHdi4mpEpvqy6nJ8XZg2', 'u20_maksymmnich@zsp1.siedlce.pl', '2024-12-02 23:03:58', 0, 0, 'e1e55aae1d0b42ef7a09adea73b59f91'),
(6, 'jemszklanki', '$2y$10$hcczb3vscth46w6Dkm0VZ.89Hjics.ZYiytrTwC.HOkdmsrAF8AUy', 'helok@gmail.com', '2024-12-05 16:49:42', 0, 0, '5bcd97f84577193c94e4b13d690b8c91'),
(7, 'sdgfdhdf', '$2y$10$dgwORIRkg5Lae6MoIEs9aeCCtRrYT2DzlNGXcBn4Zq6Bgij7U5Tkq', 'dfgjdfolgj@gmail.com', '2024-12-05 16:50:23', 0, 1, ''),
(8, 'Ernest', '$2y$10$c4oFcfSqIhXxP4o6pX00VudSJx2jvMpK5Owv3PGHRYFMVDrgtDpU.', 'ernestkos11@gmail.com', '2024-12-09 01:51:54', 1, 1, '');

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
  ADD KEY `language_id` (`language_id`),
  ADD KEY `price` (`price`);

--
-- Indeksy dla tabeli `cart_log`
--
ALTER TABLE `cart_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_name` (`item_name`,`quantity`),
  ADD KEY `user_id` (`user_id`);

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
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `status_id` (`status_id`,`shipment_id`,`payment_id`),
  ADD KEY `shipment_id` (`shipment_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `order_cards`
--
ALTER TABLE `order_cards`
  ADD KEY `order_id` (`order_id`,`card_name`);

--
-- Indeksy dla tabeli `order_payment`
--
ALTER TABLE `order_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeksy dla tabeli `order_shipment`
--
ALTER TABLE `order_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indeksy dla tabeli `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

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
-- AUTO_INCREMENT for table `cart_log`
--
ALTER TABLE `cart_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

--
-- Constraints for table `cart_log`
--
ALTER TABLE `cart_log`
  ADD CONSTRAINT `cart_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_log_ibfk_2` FOREIGN KEY (`item_name`) REFERENCES `cards` (`name`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`status_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shipment_id`) REFERENCES `order_shipment` (`shipment_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `order_payment` (`payment_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_cards`
--
ALTER TABLE `order_cards`
  ADD CONSTRAINT `order_cards_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
