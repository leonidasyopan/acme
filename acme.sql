-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 06:06 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(1, 'Francisco ', 'Gongorra', 'francisco@gongorra.com', '$2y$10$895iQHhXhQ7EdvJP5gQqreSk/fsDGYoIGCemgSo7Pkamk1bzn8DiW', '1', ''),
(3, 'Admin', 'Username', 'admin@cit336.net', '$2y$10$xCZrU7b3KnkUhphSiGFlf.oIy8iqt3tSvb0iFi.Yn4kIGV2ipST5G', '3', ''),
(4, 'Blane', 'Robertson', 'blane@robertson.com', '$2y$10$H5smArWTf7JLYyIrBSK3he2H/zgqX9b/dn3YEIosEas01NesPJEr2', '1', ''),
(5, 'Nathaly', 'Yopan', 'nathaly.yopan@gmail.com', '$2y$10$A6tsFUC.Cf4CQbjpC68qL.Xc2gWTn0t7g1JpPi4kOnels1jMSj5mm', '1', ''),
(6, 'Oscar', 'Yopan', 'oscar@hotmail.com', '$2y$10$7ZduUEyVVODwgKncb8TwSuJCibH0eI9akE2VX5kvkR5MEPtfnGopq', '1', ''),
(7, 'Phil', 'Collins', 'philcollins@gmail.com', '$2y$10$Zn0SBKr2NGiUZ5YWOB5nVuitgDqznfCcYYtHa3dQOBkBhES/Exutq', '1', ''),
(8, 'Robin', 'Hood', 'robinghood@gmail.com', '$2y$10$jzV.AzAjBp6ZrL/1uGE1mu/JffsEoKG8j7vExcVCRk3s8AFS/cqrm', '1', ''),
(9, 'Neil', 'Armstrong', 'neil@gmail.com', '$2y$10$9NvMm2el1xqtCbPwgimADuoQa95z2qGGDiniHvK4l0S0t4v1UvZv6', '1', ''),
(10, 'Frank', 'Sinatra', 'frank@sinatra.com', '$2y$10$2Ij46FPjzKqK.lgUyXVIOubgk0UrEUW46dteN9elZCR9lHQdy2qSK', '1', ''),
(11, 'LeGrand', 'Richards', 'legrand@richards.com', '$2y$10$Ut0/EaKuVq0cxQy5W2sCOejCjAHTRgva54rvoiWvKVZTiJEShqOD2', '1', ''),
(12, 'Andrea', 'Boccelli', 'andrea@boccelli.com', '$2y$10$r0qVg0ZtS0wJH1qHZXNQIuXiO7LzHWCNSzqDmM6WDUMtnU6g.pGUO', '1', ''),
(13, 'Robert', 'Langdom', 'robert@langdom.com', '$2y$10$kxL7C8EJi4YfTQoLjSpJwe2xLsSEleriAZqWj/OUlRJwYxEPWT10.', '1', ''),
(14, 'Gary', 'Bale', 'gary@bale.com', '$2y$10$pnOVY/rifbKbpXYRL2Hw0eyEeQ/IJi4vRlrtYrmY3ylYdT1KRYZv.', '1', ''),
(15, 'Steven', 'Jobs', 'jobs@apple.com', '$2y$10$c7EHfT17a1J4dwhZa3VF0ubjtpXyEpnCcADMCZnn0C3OItSEIQEW2', '1', ''),
(16, 'Igor', 'Santos', 'igor@santos.com', '$2y$10$elHmOQAgYhsbYg0ZmpYCwORELtBFW3WJVavBfe3mH2G4TgpBG5veG', '1', ''),
(17, 'Theron', 'Dowdle', 'theron@dowdle.com', '$2y$10$oT8jUN7I8MjBPvPQ8.2t4uBWyoiuVOji6/Mcv9lwJZgrVEmJ5cJe.', '1', ''),
(18, 'Neymar', 'Junior', 'neymar@junior.com', '$2y$10$dLM0dSe54SwgHtlXc7/0peCh2ouNS17OmikNyUnJRASuFPFbBuik6', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`) VALUES
(49, 8, 'anvil.png', '/acme/images/products/anvil.png', '2018-12-03 21:14:31'),
(50, 8, 'anvil-tn.png', '/acme/images/products/anvil-tn.png', '2018-12-03 21:14:31'),
(51, 3, 'catapult.png', '/acme/images/products/catapult.png', '2018-12-03 21:14:38'),
(52, 3, 'catapult-tn.png', '/acme/images/products/catapult-tn.png', '2018-12-03 21:14:38'),
(53, 14, 'helmet.png', '/acme/images/products/helmet.png', '2018-12-03 21:14:46'),
(54, 14, 'helmet-tn.png', '/acme/images/products/helmet-tn.png', '2018-12-03 21:14:46'),
(55, 4, 'roadrunner.jpg', '/acme/images/products/roadrunner.jpg', '2018-12-03 21:14:56'),
(56, 4, 'roadrunner-tn.jpg', '/acme/images/products/roadrunner-tn.jpg', '2018-12-03 21:14:56'),
(57, 5, 'trap.jpg', '/acme/images/products/trap.jpg', '2018-12-03 21:15:41'),
(58, 5, 'trap-tn.jpg', '/acme/images/products/trap-tn.jpg', '2018-12-03 21:15:41'),
(59, 13, 'piano.jpg', '/acme/images/products/piano.jpg', '2018-12-03 21:16:01'),
(60, 13, 'piano-tn.jpg', '/acme/images/products/piano-tn.jpg', '2018-12-03 21:16:01'),
(61, 6, 'hole.png', '/acme/images/products/hole.png', '2018-12-03 21:16:09'),
(62, 6, 'hole-tn.png', '/acme/images/products/hole-tn.png', '2018-12-03 21:16:09'),
(63, 7, 'koenigsegg.jpg', '/acme/images/products/koenigsegg.jpg', '2018-12-03 21:16:16'),
(64, 7, 'koenigsegg-tn.jpg', '/acme/images/products/koenigsegg-tn.jpg', '2018-12-03 21:16:16'),
(65, 10, 'mallet.png', '/acme/images/products/mallet.png', '2018-12-03 21:16:35'),
(66, 10, 'mallet-tn.png', '/acme/images/products/mallet-tn.png', '2018-12-03 21:16:35'),
(67, 9, 'rubberband.jpg', '/acme/images/products/rubberband.jpg', '2018-12-03 21:16:56'),
(68, 9, 'rubberband-tn.jpg', '/acme/images/products/rubberband-tn.jpg', '2018-12-03 21:16:56'),
(69, 2, 'mortar.jpg', '/acme/images/products/mortar.jpg', '2018-12-03 21:17:13'),
(70, 2, 'mortar-tn.jpg', '/acme/images/products/mortar-tn.jpg', '2018-12-03 21:17:13'),
(71, 15, 'rope.jpg', '/acme/images/products/rope.jpg', '2018-12-03 21:17:19'),
(72, 15, 'rope-tn.jpg', '/acme/images/products/rope-tn.jpg', '2018-12-03 21:17:19'),
(73, 12, 'seed.jpg', '/acme/images/products/seed.jpg', '2018-12-03 21:17:26'),
(74, 12, 'seed-tn.jpg', '/acme/images/products/seed-tn.jpg', '2018-12-03 21:17:26'),
(75, 1, 'rocket.png', '/acme/images/products/rocket.png', '2018-12-03 21:17:33'),
(76, 1, 'rocket-tn.png', '/acme/images/products/rocket-tn.png', '2018-12-03 21:17:33'),
(77, 17, 'bomb.png', '/acme/images/products/bomb.png', '2018-12-03 21:17:41'),
(78, 17, 'bomb-tn.png', '/acme/images/products/bomb-tn.png', '2018-12-03 21:17:41'),
(79, 16, 'fence.png', '/acme/images/products/fence.png', '2018-12-03 21:17:47'),
(80, 16, 'fence-tn.png', '/acme/images/products/fence-tn.png', '2018-12-03 21:17:47'),
(81, 11, 'tnt.png', '/acme/images/products/tnt.png', '2018-12-03 21:17:52'),
(82, 11, 'tnt-tn.png', '/acme/images/products/tnt-tn.png', '2018-12-03 21:17:52'),
(83, 2, 'medieval-mortar.jpg', '/acme/images/products/medieval-mortar.jpg', '2018-12-03 21:19:16'),
(84, 2, 'medieval-mortar-tn.jpg', '/acme/images/products/medieval-mortar-tn.jpg', '2018-12-03 21:19:16'),
(85, 2, 'ancient-mortar.jpg', '/acme/images/products/ancient-mortar.jpg', '2018-12-03 21:19:23'),
(86, 2, 'ancient-mortar-tn.jpg', '/acme/images/products/ancient-mortar-tn.jpg', '2018-12-03 21:19:23'),
(87, 3, 'ancient-catapult.jpg', '/acme/images/products/ancient-catapult.jpg', '2018-12-03 21:20:57'),
(88, 3, 'ancient-catapult-tn.jpg', '/acme/images/products/ancient-catapult-tn.jpg', '2018-12-03 21:20:57'),
(89, 3, 'toy-catapult.jpg', '/acme/images/products/toy-catapult.jpg', '2018-12-03 21:21:04'),
(90, 3, 'toy-catapult-tn.jpg', '/acme/images/products/toy-catapult-tn.jpg', '2018-12-03 21:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invStock` smallint(6) NOT NULL DEFAULT '0',
  `invSize` smallint(6) NOT NULL DEFAULT '0',
  `invWeight` smallint(6) NOT NULL DEFAULT '0',
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT '',
  `invFeatured` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`, `invFeatured`) VALUES
(1, 'Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal', NULL),
(2, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal', NULL),
(3, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood', NULL),
(4, 'Female RoadRunner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber', NULL),
(5, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood', NULL),
(6, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether', NULL),
(7, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/acme/images/products/koenigsegg.jpg', '/acme/images/products/koenigsegg-tn.jpg', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal', NULL),
(8, 'Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal', NULL),
(9, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber', 1),
(10, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood', NULL),
(11, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic', NULL),
(12, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can\'t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/acme/images/products/seed.jpg', '/acme/images/products/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic', NULL),
(13, 'Grand Piano', 'This grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood', NULL),
(14, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber', NULL),
(15, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon', NULL),
(16, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/acme/images/products/fence.png', '/acme/images/products/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon', NULL),
(17, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_image` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_image` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
