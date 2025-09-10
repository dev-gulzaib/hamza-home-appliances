-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2025 at 11:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamza_home_appliances`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `prod_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `single_item_price` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prod_no`, `ip_address`, `qty`, `single_item_price`) VALUES
(29, '537375', '127.0.0.1', '5', '220'),
(30, '277856', '127.0.0.1', '2', '245');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `cat_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(14, 'Esato'),
(15, 'Willow'),
(16, 'Vacume Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `contact_msgs`
--

CREATE TABLE `contact_msgs` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datetime` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `order_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_date` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transaction_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_products` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_order_amt` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_time` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_state` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_city` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_zip` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cus_phone` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pay_via` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_status` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_status` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int NOT NULL,
  `order_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prod_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `single_item_price` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `prod_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_cat` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_sub_cat` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_price` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_old_price` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_desc` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `long_description` varchar(5000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `best_seller` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `new_arrivals` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `new_top_rated` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `featured_product` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_status` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_no`, `product_name`, `product_cat`, `product_sub_cat`, `product_price`, `product_old_price`, `short_desc`, `product_image`, `long_description`, `best_seller`, `new_arrivals`, `new_top_rated`, `featured_product`, `p_status`) VALUES
(13, '537375', 'Esatto Tumble Dryer', '14', '', '220', '250', 'Model: ES7KGVTD', '537375_WhatsApp Image 2025-09-05 at 5.15.50 PM.jpeg', 'Model: ES7KGVTD', '1', '1', '1', '1', 'Active'),
(14, '277856', 'Willow Washing Machine', '15', '', '245', '260', 'Front Load', '277856_WhatsApp Image 2025-09-05 at 5.15.50 PM (2).jpeg', '6kg Front Load Washing Machine', '1', '1', '0', '1', 'Active'),
(15, '569857', 'Vacuum Cleaner', '16', '58', '250', '300', 'Wet and Dry', '569857_WhatsApp Image 2025-09-05 at 7.33.14 PM.jpeg', 'Wet and Dry Cleaner', '1', '1', '1', '0', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `products_key_points`
--

CREATE TABLE `products_key_points` (
  `id` int NOT NULL,
  `prod_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `key_points` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_key_points`
--

INSERT INTO `products_key_points` (`id`, `prod_no`, `key_points`) VALUES
(26, '609168', 'Premium Quality Ingredients'),
(27, '609168', 'Long-Lasting Fragrance'),
(28, '1313213', 'Long-Lasting Fragrance'),
(29, '1313213', 'Premium Quality Ingredients'),
(30, '1313213', 'Elegant & Unique Scent Profile'),
(31, '1313213', 'Suitable for All Occasions'),
(32, '936116', 'Long-Lasting Fragrance'),
(33, '936116', 'Premium Quality Ingredients'),
(34, '172144', 'Alcohol-Free, made from natural fragrance oils and extracts.'),
(35, '415861', 'Aldehydes, Fruity Accord, Grapefruit, & Pepper'),
(36, '415861', 'Lily of the Valley, Jasmine, & Ylang-Ylang'),
(37, '415861', 'Vanilla, Musk, Patchouli, Tonka beans, & Sandalwood'),
(38, '537375', 'Esatto'),
(39, '277856', 'Washing machine'),
(40, '569857', 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `prod_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `prod_no`, `p_image`) VALUES
(26, '609168', 'Product_Image/other_609168_4_b34dd3a2-5f9f-4d0e-9bf1-ccf3b4c070f5.webp'),
(27, '609168', 'Product_Image/other_609168_2_1eb89b32-f927-44a4-8ac3-9ef0a4d093d3.webp'),
(28, '1313213', 'Product_Image/other_386444_2_cd229648-e085-4a07-a7dd-d6376c77b748.webp'),
(29, '1313213', 'Product_Image/other_386444_1_7552ac50-9fcd-475c-bc3a-8cb5dc264802 (1).webp'),
(30, '1313213', 'Product_Image/other_386444_3_1a957ae2-8756-46f4-acc3-7973806fa3d4.webp'),
(31, '936116', 'Product_Image/other_936116_3_d9af3be4-b932-4d64-b694-0e6bec8792e2.webp'),
(32, '936116', 'Product_Image/other_936116_2_17482468-3e01-4678-b7af-29ddd10631ff.webp'),
(33, '936116', 'Product_Image/other_936116_4_3d798b08-2c69-4b22-b777-adbfd18e9d0f.webp'),
(34, '172144', 'Product_Image/other_172144_OUDMUSKBL_1.webp'),
(35, '172144', 'Product_Image/other_172144_OUDMUSKBL.webp'),
(36, '415861', 'Product_Image/other_415861_2_7697b587-9f7e-4c18-bd2a-8e6edc4a4c36.webp'),
(37, '415861', 'Product_Image/other_415861_4_5018fe06-4467-4904-a1aa-756dc709760c.webp'),
(38, '415861', 'Product_Image/other_415861_5_44880408-e3d9-4530-ae14-4531786da357.webp'),
(39, '415861', 'Product_Image/other_415861_1_9f65dda5-220b-4e23-9d3b-11ec26677f61.webp'),
(41, '537375', 'Product_Image/other_537375_Generated Image September 09, 2025 - 1_05PM.png'),
(42, '537375', 'Product_Image/other_537375_slider-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `stripe`
--

CREATE TABLE `stripe` (
  `id` int NOT NULL,
  `publishableKey` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secretKey` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `success_url` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancel_url` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stripe`
--

INSERT INTO `stripe` (`id`, `publishableKey`, `secretKey`, `success_url`, `cancel_url`) VALUES
(1, 'pk_test_51MDeZdJEolXNOLZIUdakdrzleqhsYbxWSIwxKiDl0FOE6psxyOGYeQ5Wsr1cv5Nzf6uTGYgivx5nzIKwhJN1w0K9009UjInhUO', 'sk_test_51MDeZdJEolXNOLZIvpBeU9lbpg93ILLofDLEpTq2ZDevE1axUYvuKaDZlamsY4ZXSQv2dIL2ZDjSFUyCMAzp84dR00CoYTfmcb', 'http://localhost/perfuem/Stripe/payment-success.php', 'http://localhost/perfuem/payment-cancel.php');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int NOT NULL,
  `cat_id` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sub_cat_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `sub_cat_name`) VALUES
(56, '14', 'Dryers'),
(57, '15', 'Machines'),
(58, '16', 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `order_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transaction_no` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pay_via` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datetime` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_no`, `transaction_no`, `pay_via`, `amount`, `datetime`) VALUES
(1, '929659', '66258', 'Stripe', '10000', '03 May 2025 07:58'),
(2, '976877', '90976', 'Stripe', '295', '03 May 2025 09:22');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int NOT NULL,
  `web_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_title` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_keywords` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_desc` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_author` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_phone` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web_address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `web_name`, `web_title`, `web_keywords`, `web_desc`, `web_author`, `web_phone`, `web_email`, `web_address`) VALUES
(1, 'Hamza Home Appliances', 'Hamza Home Appliances', 'Hamza Home Appliances', 'Test website', 'Hamza', '+1 (773) 996-5716', 'oudandaura1@gmail.com', '8714 S Michigan Ave Chicago IL 60619. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_key_points`
--
ALTER TABLE `products_key_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe`
--
ALTER TABLE `stripe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products_key_points`
--
ALTER TABLE `products_key_points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `stripe`
--
ALTER TABLE `stripe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
