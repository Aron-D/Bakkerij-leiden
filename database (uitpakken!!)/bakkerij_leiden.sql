-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 apr 2020 om 21:30
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakkerij_leiden`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `product1` varchar(250) NOT NULL,
  `quantity1` int(11) NOT NULL,
  `product2` varchar(250) NOT NULL,
  `quantity2` int(11) NOT NULL,
  `product3` varchar(250) NOT NULL,
  `quantity3` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `date`, `product1`, `quantity1`, `product2`, `quantity2`, `product3`, `quantity3`, `total_price`) VALUES
(1, 'test', 'test@email.com', '2020-04-04', 'normaal Verrassingspakket', 4, 'Gemiddeld Verrassingspakket', 9, 'groot Verrassingspakket', 8, '167.29'),
(2, 'test', 'test@email.com', '2020-04-04', 'Normaal Verrassingspakket', 2, 'Gemiddeld Verrassingspakket', 1, '', 0, '17.47'),
(3, 'admin', 'admin@email.com', '2020-04-04', '', 0, '', 0, 'Groot Verrassingspakket', 1, '9.99'),
(4, 'testie', '6009495@mborijnland.nl', '2020-04-04', 'Normaal Verrassingspakket', 9, 'Gemiddeld Verrassingspakket', 7, 'groot Verrassingspakket', 8, '177.26'),
(5, 'bot', 'bot@email', '2020-04-04', 'Normaal Verrassingspakket', 2, '', 0, '', 0, '9.98');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `image`) VALUES
(1, 'Verrassingspakket 1', 'veras1', '4.99', 'images/package1.png'),
(2, 'Verrassingspakket 2', 'veras2', '7.49', 'images/package2.png\r\n'),
(3, 'Verrassingspakket 3', 'veras3', '9.99', 'images/package3.png\r\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `shop`
--

INSERT INTO `shop` (`id`, `name`, `desc`, `price`, `quantity`, `img`, `date_added`, `product_desc`) VALUES
(1, 'Normaal', '', '4.99', 3, '', '2020-02-20 23:59:57', 'Een Kleine verrassingspakket!'),
(2, 'Gemiddeld', '', '7.49', 4, '', '2020-02-20 23:59:58', 'Een Gemiddelde verrassingspakket!'),
(3, 'Groot', '', '9.99', 4, '', '2020-02-20 23:59:59', 'Een grote verrassingspakket!');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
