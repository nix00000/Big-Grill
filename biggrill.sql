-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 08:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biggrill`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(20) NOT NULL,
  `jobid` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `CVs` varchar(255) NOT NULL,
  `MotLet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `jobid`, `name`, `dob`, `email`, `phone`, `CVs`, `MotLet`) VALUES
(1, 2, 'John', '2020-05-20', 'john@all.com', '+95759375', 'CVs/john cv.docx', 'Motivated'),
(2, 2, 'Paul Paul', '2020-05-20', 'paul@p.com', '366546', 'CVs/john cv.docx', 'Motivated'),
(5, 2, 'Johhny', '1947-06-04', 'j@j.com', '095769355', 'CVs/Johhny Walker CV.docx', 'Motivated worker, Best italian master '),
(7, 10, 'MacoliniMnogoFini', '2044-08-08', 'macolini@komsija.com', '12346828368463478738', 'CVs/Ana CV.docx', 'ja cu uvek ici kod komsije na vreme i ja xcu vas ostaviti kad god ocui morate da me hranite za besplatno'),
(9, 2, 'dsdgs', '2020-05-21', 'sdfsdf', '546754', 'CVs/Ana CV.docx', 'dsdg'),
(10, 2, 'MacoliniMnogo', '1995-08-27', 'macolncos@komsija.com', '12359283748382', 'CVs/Ana CV.docx', 'I am a sleepy head');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(20) NOT NULL,
  `title` tinytext NOT NULL,
  `summary` tinytext DEFAULT NULL,
  `description` longtext NOT NULL,
  `requirements` tinytext DEFAULT NULL,
  `uploaded` datetime DEFAULT NULL,
  `closed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `summary`, `description`, `requirements`, `uploaded`, `closed`) VALUES
(2, 'Pizza Baker', 'Baking pizzas on demand and delivering the highest quality', '\\n\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet elit faucibus, imperdiet mi in, gravida dolor. Aliquam non nisl a lectus molestie semper. Nunc quis erat magna. Duis elementum accumsan placerat. Vivamus sodales enim ante, eu sollicitudin turpis volutpat a. Maecenas varius vestibulum odio, sit amet ultricies odio. Pellentesque non purus scelerisque, aliquam nunc ac, scelerisque eros. Integer euismod eleifend libero, nec sodales arcu sodales sit amet.\\n\\nFusce a sagittis diam. Fusce nec tincidunt purus. Maecenas finibus congue neque, sit amet maximus libero cursus nec. Aliquam venenatis neque nunc, et pellentesque lacus malesuada sit amet. Fusce convallis lectus in euismod suscipit. Nulla at fermentum est. Integer sit amet nisi et metus rhoncus pellentesque. Morbi hendrerit turpis ac quam efficitur, ut dignissim felis scelerisque.\\n\\nCurabitur vestibulum et nunc eu molestie. Integer at accumsan sem, egestas dapibus dolor. Nullam interdum magna a velit egestas, ut malesuada lacus luctus. Curabitur tincidunt leo sit amet nisi bibendum, vel aliquet orci elementum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor quam quis faucibus malesuada. Nunc eu ante sed mauris cursus dictum.\\n\\nInteger sed dui eu tellus ultricies pulvinar. Nullam laoreet nulla quam, at blandit velit rutrum imperdiet. Quisque sagittis ultrices purus eu pulvinar. Donec quis molestie lorem. In vel feugiat velit. Ut congue diam sit amet ullamcorper pellentesque. Duis vitae facilisis metus. Aenean sed arcu eleifend, finibus augue facilisis, consectetur magna. Praesent euismod congue orci non commodo.\\n\\nCurabitur laoreet posuere sem, at tempor quam iaculis ac. Curabitur odio est, auctor non dolor vel, rutrum ullamcorper lorem. Proin et sollicitudin lacus. Nam consectetur et nibh in facilisis. Nulla mattis justo sed dolor tristique consequat. Donec eu imperdiet nunc, tempor congue tortor. Mauris bibendum purus sed congue ultrices. Integer sagittis aliquam dui non elementum. Curabitur lacinia orci vel maximus varius. Integer eget vehicula dui. Nullam commodo ligula non interdum laoreet. Vestibulum est diam, gravida nec tempus eget, interdum sed est. Duis enim lorem, euismod nec ex non, bibendum eleifend tellus. ', 'working hard', '2020-05-22 00:00:00', 0),
(10, 'Manager', 'Manage daily activities', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dignissim nunc non urna consectetur, non commodo ipsum viverra. Maecenas sodales faucibus neque ac gravida. In sed sem hendrerit, cursus ex ac, consectetur nibh. Nam sollicitudin turpis ut tincidunt molestie. Vivamus eu dapibus lacus, lacinia malesuada massa. Vivamus facilisis erat ac accumsan sodales. Vestibulum faucibus ipsum non ligula semper condimentum. Mauris sit amet turpis dignissim, tincidunt est ut, interdum quam. Phasellus mollis molestie odio. Maecenas vulputate eros in tempus mollis. Donec elementum, metus eu fermentum convallis, leo elit elementum mauris, in rutrum quam nisl in metus. Sed tincidunt lobortis massa, quis commodo nulla malesuada ut. Donec varius dapibus quam eget porta. Etiam odio lacus, rhoncus hendrerit scelerisque a, aliquet eu sem.\n\nEtiam vitae hendrerit justo. Morbi fringilla dolor iaculis eros tincidunt, quis euismod odio sagittis. Morbi at diam quis erat venenatis fringilla sit amet at tortor. Duis posuere massa sit amet eros dignissim euismod. Cras semper felis in erat faucibus, in eleifend purus auctor. Nam auctor, urna et varius gravida, libero nunc porttitor elit, vitae placerat nibh dui eu dui. Duis a ipsum vel urna aliquet aliquet ut a elit. Maecenas eget diam volutpat, pellentesque est ultricies, commodo leo. Cras pellentesque tellus libero, in aliquam purus interdum id. Nunc vulputate, justo sit amet sagittis luctus, ante est ornare ligula, eget varius sapien libero vitae odio. Praesent iaculis ultricies turpis. Donec et neque ut orci congue ullamcorper. Sed neque est, vestibulum ac finibus in, luctus non elit. Suspendisse interdum magna eget tempor sodales. Mauris luctus auctor sagittis. Fusce vel ipsum elementum, sodales massa nec, tempor turpis. ', 'Working hard,\nworking under pressure,\n3 years experience', '2020-05-26 00:00:00', 0),
(11, 'Cleaner', 'Cleaning aactivity of the premises', 'We are looking for a Cleaner to take care of our facilities and carry out cleaning and maintenance duties.\\r\\nClean, stock and supply designated facility areas (dusting, sweeping, vacuuming, mopping, cleaning ceiling vents, restroom cleaning etc)\\r\\nPerform and document routine inspection and maintenance activities\\r\\nCarry out heavy cleansing tasks and special projects\\r\\nNotify management of occurring deficiencies or needs for repairs\\r\\nMake adjustments and minor repairs\\r\\nStock and maintain supply rooms\\r\\nCooperate with the rest of the staff\\r\\nFollow all health and safety regulations', 'Proven working experience as a cleane,\nAbility to handle heavy equipment and machinery,\nKnowledge of cleaning chemicals and supplies,\nFamiliarity with Material,\nSafety Data Sheets,\nIntegrity,\nHigh school degree', '2020-05-26 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `userid` int(255) DEFAULT NULL,
  `address` tinytext NOT NULL,
  `post_code` tinytext NOT NULL,
  `city` tinytext NOT NULL,
  `phone_number` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `remarks` tinytext DEFAULT NULL,
  `paid` tinyint(1) DEFAULT 0,
  `sent` tinyint(1) DEFAULT 0,
  `dates` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `userid`, `address`, `post_code`, `city`, `phone_number`, `email`, `remarks`, `paid`, `sent`, `dates`) VALUES
(63, 30, 'rrryrt', '4567UI', 'rtty', 'rtyrty', 'rtyrty@asdf.com', '6546754', 0, 1, '2020-05-24 15:15:55'),
(64, 30, 'Paulin 1', '56RGD', 'York', 'John', 'a@a.com', '+836752', 0, 0, '2020-05-24 17:18:30'),
(65, 30, 'Ustanicka 244b', '5698PG', 'Bg', '+947693', 'aa@aa.com', 'As soon as possible', 0, 0, '2020-05-24 17:29:01'),
(67, 30, 'anafield roud', '101', 'Analandia', '12362683786736377r8', 'macolini@komsialini.com', 'no spicy and give meh a 100% discount ty for all your care and ty NHS for giving me to opertunity', 0, 1, '2020-05-25 19:52:06'),
(72, 30, 'qqqqqqqqqqqqq', 'wwwwwwwwwwww', 'weeeeeeeeeee', 'rrrrrr', 'qqqqqqqq', 'rrrrrrrrr', 0, 0, '2020-05-26 15:36:16'),
(73, 30, 'qrqrqrqrq', 'rqrqrqr', 'qrrq', '56546', 'ewrewr', 'drgreg', 0, 0, '2020-05-26 15:41:02'),
(74, 30, 'asfaff', '5678KG', 'ewtewtet', '54365464', 'nikola@sfa.com', 'qrewet', 0, 0, '2020-05-26 15:48:53'),
(75, 30, 'y', 'ytyt', 'tyutyu', 'yjtyjty', 'jytjy', 'jtyj', 0, 0, '2020-05-26 15:51:48'),
(76, 30, 'asafaf', 'dg56', 'dsgsdg', '546754774', 'a@a.com', 'fsdgsg', 0, 0, '2020-05-26 15:52:09'),
(77, 34, 'sdsds', 'ssdsd', 'ssdsd', 'sssssd', 'sdfsdf', 'mmmmmmmmmmmmmmmmmmmmmmmmmm', 0, 0, '2020-05-26 17:06:03'),
(78, NULL, 'wqerqt', 'qreqteew', 'ewtwet', '25436436', 'eet@sdfs.com', 'sgsgr', 0, 0, '2020-05-26 19:16:31'),
(79, 30, 'wqert', 'ewrwt56', 'rttyyu', '+85858', 'sf@sd.com', 'dfrg', 0, 0, '2020-05-26 19:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) NOT NULL,
  `orderid` int(20) NOT NULL,
  `prodid` int(20) NOT NULL,
  `prod_name` tinytext NOT NULL,
  `qty` int(20) NOT NULL,
  `tot_price` decimal(64,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderid`, `prodid`, `prod_name`, `qty`, `tot_price`) VALUES
(10, 63, 2, 'Capricossa', 5, '8.75'),
(11, 64, 3, 'Bacon', 3, '8.97'),
(12, 64, 20, 'Cesar Salad', 1, '3.40'),
(13, 64, 25, 'Popcorn', 2, '2.00'),
(14, 64, 23, 'Small Curley Fries', 1, '1.60'),
(15, 65, 6, 'Big Grill', 2, '7.98'),
(16, 65, 2, 'Capricossa', 2, '3.50'),
(17, 65, 26, 'Large Curley Fries', 2, '6.40'),
(18, 67, 26, 'Large Curley Fries', 250, '800.00'),
(19, 67, 2, 'Capricossa', 2, '3.50'),
(20, 67, 10, 'Margarita', 2, '3.50'),
(21, 67, 27, 'Peperoni', 1, '2.55'),
(22, 67, 28, 'Veggie Pizza', 1, '3.50'),
(23, 67, 1, 'Cheeseburger', 1, '2.33'),
(24, 67, 3, 'Bacon', 1, '2.99'),
(25, 67, 4, 'Chicken Burger', 1, '1.99'),
(26, 67, 5, 'Veggie Burger', 1, '2.78'),
(27, 67, 6, 'Big Grill', 1, '3.99'),
(42, 72, 4, 'Chicken Burger', 3, '5.97'),
(43, 72, 2, 'Capricossa', 1, '1.75'),
(44, 73, 2, 'Capricossa', 2, '3.50'),
(45, 73, 4, 'Chicken Burger', 2, '3.98'),
(46, 74, 16, 'Lemonade', 3, '3.60'),
(47, 74, 22, 'Large Fries', 3, '9.60'),
(48, 74, 25, 'Popcorn', 1, '1.00'),
(49, 75, 2, 'Capricossa', 2, '3.50'),
(50, 75, 4, 'Chicken Burger', 2, '3.98'),
(51, 76, 2, 'Capricossa', 3, '5.25'),
(52, 76, 10, 'Margarita', 2, '3.50'),
(53, 73, 10, 'Margarita', 1, '1.75'),
(54, 73, 4, 'Chicken Burger', 1, '1.99'),
(55, 73, 10, 'Margarita', 1, '1.75'),
(56, 73, 4, 'Chicken Burger', 1, '1.99'),
(57, 73, 10, 'Margarita', 2, '7.00'),
(58, 73, 10, 'Margarita', 2, '7.00'),
(59, 77, 4, 'Chicken Burger', 1, '1.99'),
(60, 78, 2, 'Capricossa', 3, '5.25'),
(61, 79, 2, 'Capricossa', 1, '1.75'),
(62, 79, 4, 'Chicken Burger', 3, '5.97');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(20) NOT NULL,
  `category` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `popular` tinytext DEFAULT 'standard',
  `image` varchar(255) DEFAULT NULL,
  `description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `category`, `name`, `price`, `popular`, `image`, `description`) VALUES
(1, 'burgers', 'Cheeseburger', '2.33', 'standard', 'product_images/cheeseburger.jpg', 'Beef,tomatos,mayo,mustard,bbq sauce'),
(2, 'pizzas', 'Capricossa', '1.75', 'popular', 'product_images/capricossa.jpg', 'Tomato sauce, cheese, ham, mushrooms'),
(3, 'burgers', 'Bacon', '2.99', 'standard', 'product_images/bacon.jpg', 'Beef, bacon, cheese, letuce'),
(4, 'burgers', 'Chicken Burger', '1.99', 'popular', 'product_images/chicken.jpg', 'chicken, letuce, tomatoes, mayo'),
(5, 'burgers', 'Veggie Burger', '2.78', 'standard', 'product_images/veggieBurger.jpg', 'Tofu, letuce, tomatoes'),
(6, 'burgers', 'Big Grill', '3.99', 'standard', 'product_images/bigGrill.jpg', '2 Meats, cheese, letuce, tomatoes,pickels, onions, bbq sauce'),
(10, 'pizzas', 'Margarita', '1.75', 'popular', 'product_images/margarita.jpg', 'Tomato sauce,cheese and cherry tomatoes'),
(13, 'bevrages', 'Water', '1.00', 'standard', 'product_images/water.jpg', ''),
(16, 'bevrages', 'Lemonade', '1.20', 'standard', 'product_images/lemonade.jpg', ''),
(17, 'bevrages', 'Orange Juice', '1.30', 'standard', 'product_images/orange.jpg', ''),
(18, 'bevrages', 'Tea', '1.20', 'standard', 'product_images/tea.jpg', ''),
(19, 'bevrages', 'Coffee', '1.10', 'standard', 'product_images/coffee.jpg', ''),
(20, 'salads', 'Cesar Salad', '3.40', 'standard', 'product_images/cesar.jpg', 'Tomatoes, letuce, corn, sauce'),
(21, 'snacks', 'Small Fries', '1.40', 'standard', 'product_images/fries.jpg', '200g'),
(22, 'snacks', 'Large Fries', '3.20', 'standard', 'product_images/fries.jpg', '400g'),
(23, 'snacks', 'Small Curley Fries', '1.60', 'standard', 'product_images/curly_fries.jpg', '150g'),
(25, 'snacks', 'Popcorn', '1.00', 'standard', 'product_images/popcorn.jpg', ''),
(26, 'snacks', 'Large Curley Fries', '3.20', 'standard', 'product_images/curly_fries.jpg', '350g'),
(27, 'pizzas', 'Peperoni', '2.55', 'standard', 'product_images/peperoni.jpg', 'Tomato Sauce, peperoni, cheese, bbq sauce'),
(28, 'pizzas', 'Veggie Pizza', '3.50', 'standard', 'product_images/veggie_pizza.jpg', 'Vegeterian, letuce, tomatoes, halumi'),
(29, 'sandwiches', 'Ham Sandwich', '2.30', 'standard', 'product_images/ham-sandwish.jpg', 'Ham, letuce, cheese, mayo, ketchup');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `name` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `Admin`) VALUES
(29, 'John', 'u@u.com', '$2y$10$h6nnopLm0zzDK8FJPz6m9O8h6BvJoi7kk8SfDEVel862Q.5QMGy7y', 0),
(30, 'admin', 'aa@aa.com', '$2y$10$vQ8qsB0JgEiBToSkPzBBvOWHIeajCjRv1NcQuO1LvdCjy3KJHj.nK', 1),
(31, 'test', 'testing@al.com', '$2y$10$bGRglCMzUvwqsXEkezwJ3eLYbaTAVCaT7Y1lwzDfo4E7M/ESyEPbi', 0),
(32, 'Bob', 'a@a.com', '$2y$10$LFTgRWn0Tgz7h1dlyrsiRu4QAk0zTRpFtMfWXJ.PDSdt7Qjr1Wx6e', 0),
(33, 'macolini', 'macola@komsija.com', '$2y$10$ExK24IARUQjWwQeTTidLH.w6e9JWJVW/lWjATsU8kK1QMWGgtJeNi', 0),
(34, 'anabanana', 'macolini@komsija.com', '$2y$10$S.xd0uuDyGrLxuSWmXHH/u582E3LVCjquuF5teEkiV9K03dOt1suK', 0),
(35, 'user', 'user@use.com', '$2y$10$fO03a3QIH2f6iz6980sFOezoDGfT2g9pVnoe23lZK58Qvzeq6eKmK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `jobid` (`jobid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `title` (`title`) USING HASH;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodid` (`prodid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`prodid`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
