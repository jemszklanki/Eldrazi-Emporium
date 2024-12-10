-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 10:04 AM
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
('Demonic Tutor', 5, 1, 1, 1, '', 15.00, 1, 'tutor'),
('Dockside Extortionist', 4, 1, 3, 8, '', 30.00, 1, 'dockside'),
('Elesh Norn', 1, 3, 1, 3, '', 1.00, 2, 'elesh'),
('Griselbrand', 1, 5, 1, 1, 'Signed', 1.00, 1, 'griselbrand'),
('Nicol Bolas', 2, 6, 1, 1, 'Coffee stains', 1.00, 1, 'bolas'),
('Sheoldred', 1, 6, 14, 1, 'Scratched surface', 50.00, 1, 'sheoldred'),
('Test', 1, 4, 7, 1, 'Siema', 12.00, 1, 'sieeema');

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
(4, 'Elesh Norn', 1, 19),
(4, 'Griselbrand', 0, 20),
(4, 'Sheoldred', 0, 21),
(4, 'Test', 0, 22);

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
(2, 'EX2'),
(4, 'MH4'),
(5, 'IXR');

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
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `street` varchar(80) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `shipment_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `street`, `number`, `status_id`, `shipment_id`, `payment_id`, `order_price`) VALUES
(6, NULL, '2024-12-10', 'Stoczna', '25', 1, 9, 1, 20.00),
(7, NULL, '2024-12-10', 'Stoczna', '25', 1, 9, 1, 20.00),
(8, NULL, '2024-12-10', 'Stoczna', '25', 1, 9, 1, 20.00),
(9, NULL, '2024-12-10', 'Stoczna', '25', 1, 9, 1, 20.00),
(10, NULL, '2024-12-10', 'Sokolow', '62', 1, 9, 2, 27.50),
(11, NULL, '2024-12-10', 'Sokolow', '62', 1, 9, 2, 27.50),
(12, NULL, '2024-12-10', 'Niebieska', '5', 1, 1, 3, 29.00),
(13, NULL, '2024-12-10', 'Niebieska', '5', 1, 1, 3, 29.00),
(14, NULL, '2024-12-10', 'Czerwo', '6', 1, 1, 2, 32.00),
(15, NULL, '2024-12-10', 'Czerwo', '6', 1, 1, 2, 32.00),
(16, NULL, '2024-12-10', 'Uliczna', '9', 1, 1, 1, 52.00);

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
(1, 'kurieraaa', 2.00),
(2, 'poczta', 13.00),
(3, 'odbiór osobisty', 0.00),
(4, 'paczkomat', 7.99),
(6, 'kuriere', 25.00),
(7, 'kurier', 25.00),
(8, 'kuriere', 25.50),
(9, 'kuriere', 25.50),
(10, 'poczt', 13.00),
(11, 'paczkomataa', 7.99);

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
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `contents`) VALUES
(3, 'Czy Griselbrand jest słusznie zbanowany?', '<img src=\"img/griselbrand.jpg\" style=\"float:left; width: 200px;\" alt=\"griselbrand\" onerror=\"this.src=\"img/no_preview.png\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur quis tellus nec tincidunt. Nam at dui vitae dui imperdiet aliquam. Cras urna arcu, finibus sit amet massa at, laoreet cursus sapien. Integer mattis lorem vulputate mauris porta bibendum. Morbi semper eleifend enim, a blandit ipsum egestas ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque a cursus sem, eu commodo nunc. Praesent ante ex, tristique et porta finibus, mollis vitae ligula. Sed lobortis lacus nec nibh consectetur convallis.\r\n\r\nMorbi mollis felis non velit malesuada faucibus. Aliquam volutpat condimentum ipsum nec placerat. Morbi nec fermentum leo. Praesent accumsan maximus sapien, ut facilisis massa tincidunt vel. Aliquam ultricies scelerisque rutrum. Quisque nec nisi eu enim aliquam luctus vitae sit amet ipsum. '),
(4, 'Czy Elesh Norn jest \"fun\"?', '<img src=\"img/elesh.jpg\" style=\"float:left; width: 200px;\" alt=\"griselbrand\" onerror=\"this.src=\"img/no_preview.png\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur quis tellus nec tincidunt. Nam at dui vitae dui imperdiet aliquam. Cras urna arcu, finibus sit amet massa at, laoreet cursus sapien. Integer mattis lorem vulputate mauris porta bibendum. Morbi semper eleifend enim, a blandit ipsum egestas ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque a cursus sem, eu commodo nunc. Praesent ante ex, tristique et porta finibus, mollis vitae ligula. Sed lobortis lacus nec nibh consectetur convallis.'),
(5, 'O banach w formacie Commander', '<img src=\"img/dockside.jpg\" style=\"float:left; width: 200px;\" alt=\"griselbrand\" onerror=\"this.src=\"img/no_preview.png\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur quis tellus nec tincidunt. Nam at dui vitae dui imperdiet aliquam. Cras urna arcu, finibus sit amet massa at, laoreet cursus sapien. Integer mattis lorem vulputate mauris porta bibendum. Morbi semper eleifend enim, a blandit ipsum egestas ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque a cursus sem, eu commodo nunc. Praesent ante ex, tristique et porta finibus, mollis vitae ligula. Sed lobortis lacus nec nibh consectetur convallis.\r\nSed a sagittis erat, eu rhoncus arcu. Duis rutrum ex ex, a eleifend nibh auctor nec. Donec feugiat elementum lectus ut semper. Donec rhoncus et erat consequat gravida. Etiam pretium justo quis malesuada vulputate. Nunc laoreet ante non ultrices fermentum. Pellentesque aliquet quam vel gravida euismod. Donec ultricies vitae massa nec varius. Nulla maximus sit amet dui ut vehicula. Duis sit amet pretium tortor. Nullam aliquam aliquam justo in feugiat. Nulla ac sollicitudin neque, vitae cursus massa. Sed et ante molestie, molestie felis vel, malesuada mi. ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `title`, `contents`) VALUES
(6, 'Geekin', 'Spongebob me boy im geekin\r\n<img src=\"img/krabs.jpg\">');

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
(2, 'makapaka', '$2y$10$nJfxgspX//UJKMFpeWBp0uF5YdpoBZMRi0m8ybfzwLsL9vu2lJzbm', 'maka@gmail.com', '2024-10-03 19:10:05', 1, 1, ''),
(4, 'fmax12', '$2y$10$DInHjGdSCC4BGOXzrXWB5O/C7aOWVQPHgs1jCo.98yKMhFAsJk3k6', '12@gmail.com', '2024-11-24 18:13:31', 1, 1, ''),
(5, 'kupa', '$2y$10$MvwJtkevQzbS2rhmiW/Z.eqyU9984XqUJiHdi4mpEpvqy6nJ8XZg2', 'u20_maksymmnich@zsp1.siedlce.pl', '2024-12-02 23:03:58', 0, 0, 'e1e55aae1d0b42ef7a09adea73b59f91'),
(6, 'jemszklanki', '$2y$10$hcczb3vscth46w6Dkm0VZ.89Hjics.ZYiytrTwC.HOkdmsrAF8AUy', 'helok@gmail.com', '2024-12-05 16:49:42', 0, 0, '5bcd97f84577193c94e4b13d690b8c91'),
(7, 'sdgfdhdf', '$2y$10$dgwORIRkg5Lae6MoIEs9aeCCtRrYT2DzlNGXcBn4Zq6Bgij7U5Tkq', 'dfgjdfolgj@gmail.com', '2024-12-05 16:50:23', 0, 1, ''),
(8, 'Ernest', '$2y$10$H3CJfll3aJHwjBOLymFgneUmcHl4vjTureuzFxbmKweCtsy4TBvlC', 'ernestkos11@gmail.com', '2024-12-10 01:42:32', 1, 1, '');

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
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sites`
--
ALTER TABLE `sites`
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
-- AUTO_INCREMENT for table `cart_log`
--
ALTER TABLE `cart_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expansions`
--
ALTER TABLE `expansions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_payment`
--
ALTER TABLE `order_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_shipment`
--
ALTER TABLE `order_shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
