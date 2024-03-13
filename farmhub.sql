-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 01:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `ip`) VALUES
(1, 'mukthi', 'abc@gmail.com', '$2y$10$JYHEeUjnCSeqEcQTyhwJW.CyoLXP3cFWaDjKP1iob1mC9fEMgyhm6', '::1'),
(2, 'mukthitejaadmin', 'mukthiteja@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZHVFVTZRbzNtNi8wSlhUSA$wnVTRFoxOVle8dARjlHcCsu+O5tz7CXOaha9b4Ia5u4', '::1'),
(3, 'ps', 'ps@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VG80UEpyYVcyUDM1dkpaRg$0DjcKvlJunxHEG7p92r0BF/kPXzZMqRXgxRXAiMFNoE', '::1'),
(4, 'psa', 'psa@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VEdqZFN3ck1mWEJwSFEzZg$KHoV3oUFf7JKXN/2BeAoQXGNITVVXVoeNRCYNdX1uEc', '::1'),
(5, 'madhu', 'madhu11@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$R3BYbUp1SU9iUzRBYVBKdQ$c3n9nBeE526FTfcL2gIaiXabQU5rFZba+ec6rT6ftcU', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Sonalika'),
(2, 'Massey'),
(3, 'Kubato'),
(4, 'Meghmani Organics'),
(5, 'Sumitomo Chemical'),
(6, 'Dhanuka Agritech'),
(7, 'Chambal Fertilisers'),
(8, 'National Fertilizers Limited');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `Product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Pesticides'),
(3, 'Fertilisers'),
(5, 'Vehicle'),
(6, 'Seeds');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `Product_id`, `quantity`, `order_status`) VALUES
(1, 3, 1522376248, 2, 1, 'pending'),
(5, 4, 2112187500, 3, 1, 'pending'),
(6, 4, 1001363375, 3, 1, 'pending'),
(7, 4, 754587772, 2, 1, 'pending'),
(8, 4, 1592321733, 3, 1, 'pending'),
(9, 4, 507965257, 2, 1, 'pending'),
(10, 4, 1037319603, 3, 1, 'pending'),
(11, 4, 753876368, 2, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` int(11) NOT NULL,
  `Product_Title` varchar(100) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Product_Keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `Product_image1` varchar(255) NOT NULL,
  `Product_image2` varchar(255) NOT NULL,
  `Product_image3` varchar(255) NOT NULL,
  `Product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `Product_Title`, `Product_Description`, `Product_Keyword`, `category_id`, `brand_id`, `Product_image1`, `Product_image2`, `Product_image3`, `Product_price`, `date`, `status`) VALUES
(2, 'DAP', 'Diammnium Phosphate ', 'DAPs', 3, 7, 'DAP.jpeg', 'DAP.jpeg', 'DAP.jpeg', '1300', '2024-01-23 16:44:19', 'true'),
(5, 'aura 58', 'it is a pesticide, 100ml', 'au , aura', 2, 4, 'aura 58.jpg', 'download.jpg', 'download (1).jpg', '150', '2024-03-01 09:37:21', 'true'),
(6, 'Aura 58', 'Aura 58 is a selective herbicide that can be used in agriculture. It\'s a post-emergence herbicide that can be used to control a range of broad-leaved weeds in crops such as wheat, sugarcane, maize, tea, and paddy. It can also be used to destroy grasses in', 'Aura 58', 2, 4, 'aura 58.jpg', 'aura 58.jpg', 'aura 58.jpg', '1046', '2024-03-11 05:58:13', 'true'),
(7, 'Aura 58', 'Aura 58 is a selective herbicide that can be used in agriculture. It\'s a post-emergence herbicide that can be used to control a range of broad-leaved weeds in crops such as wheat, sugarcane, maize, tea, and paddy. It can also be used to destroy grasses in', 'Aura 58', 2, 4, 'aura 58.jpg', 'aura 58.jpg', 'aura 58.jpg', '1046', '2024-03-11 06:00:06', 'true'),
(9, 'Brinjal Seeds', 'Brinjal seeds are small, flattened, pale brown, kidney-shaped, and have a leathery seed coat. They are scattered throughout the fruit, embedded in a firm placenta. A single fruit can contain 800–1000 seeds in long brinjals and 1000–1500 in round brinjals.', 'Brinjal', 6, 6, 'Brinjal seeds.png', 'Brinjal seeds.png', 'Brinjal seeds.png', '2340', '2024-03-11 06:08:26', 'true'),
(10, 'Cotton seed', 'Cotton seeds are brown, ovoid-shaped seeds that are about 3.5–10 mm long and weigh about a tenth of a gram. They have a dark brown structure, and are covered in long, white or rusty hairs called lint.   Feedipedia', 'cotton ', 6, 6, 'cotton seds.webp', 'cotton seds.webp', 'cotton seds.webp', '870', '2024-03-11 06:11:01', 'true'),
(11, 'Diammonium phosphate', 'The term Delivered-at-Place (DAP) is used in international trade to describe a situation wherein the seller of goods bears the responsibility and cost of transporting them to a place specified in the contract. The seller will also be liable to pay for any', 'DAP', 3, 5, 'DAP.jpeg', 'DAP.jpeg', 'DAP.jpeg', '4000', '2024-03-11 06:14:06', 'true'),
(12, 'Kisan', 'Kisan urea is a solid, nitrogenous fertilizer that contains 46% nitrogen. It\'s a highly concentrated fertilizer that\'s completely soluble in water. ', 'Uria', 3, 7, 'KIsan.webp', 'KIsan.webp', 'KIsan.webp', '4870', '2024-03-11 06:16:42', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(5, 4, 850, 2112187500, 1, '2024-01-24 10:22:21', 'Complete'),
(6, 4, 850, 1001363375, 1, '2024-01-24 10:26:06', 'Complete'),
(7, 4, 1300, 754587772, 1, '2024-01-24 10:34:17', 'Complete'),
(8, 4, 850, 1592321733, 1, '2024-01-24 10:44:29', 'Complete'),
(9, 4, 1300, 507965257, 1, '2024-01-24 10:49:46', 'Complete'),
(10, 4, 850, 1037319603, 1, '2024-02-13 12:26:07', 'pending'),
(11, 4, 1300, 753876368, 1, '2024-03-08 01:10:33', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(4, 'abc', 'abc@gmail.com', '$2y$10$XcCnxxO1pcO698V1r.5dwOvwZaDklBoKizJc4C9.CIfLjy2NYo0Lq', 'Mukthi youtube logo.png', '::1', 'abc', '8147521861'),
(5, 'mukthi', 'mukthiteja@gmail.com', '$2y$10$p9mBuKm5jqOasKX1bd97HuqAlMEqBsbjkyDH35cz3SEQMu1FRaJrq', 'Add a subheading.png', '::1', 'RV Vidyanikethan Post', '8147521861'),
(6, 'hi', 'hi@gmail.com', '$2y$10$X2Jr0C4ODRX4RkZh3fesgu3lgsPnvSm2/bJuLgL79AMEC.BiYOdB.', 'up-govt-bans-entry-of-school-students-in-malls-parks-restaurants-wearing.jpg', '::1', 'RV Vidyanikethan Post', '8147521861'),
(7, 'mukthiteja', 'mukthitejaps@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$V3R6YmtDNE9KOXpQOUhZMA$skzpVYqPd8fqxbY54vGNN0bSTKMj/0LOPlHo5exLOEo', 'P S Mukthiteja Photo.png', '::1', 'RV Vidyanikethan Post', '8147521861'),
(9, 'teja', 'ab@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Q0VHZUNYQzN4cnV5NkhIbA$dlqv/jd1XkNSK9bTTyNkKEYCgRgUquO7alO1QO4E3vk', 't1.jpg', '::1', 'RV Vidyanikethan Post', '8147521861'),
(10, 'Abhishek bharadwaj', 'abhishekbharadwaj.is21@rvce.edu.in', '$argon2i$v=19$m=65536,t=4,p=1$Um5TLkw4UVUvNDloRW1pZg$RXobkwroALn9IKOnzHOkZ5PHk/NOzJNYuQPCwL6HY0g', '1.jpg', '::1', 'bangalore', '8247521861');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
