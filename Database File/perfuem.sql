-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 12:41 AM
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
-- Database: `perfuem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
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
  `id` int(11) NOT NULL,
  `prod_no` varchar(200) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `single_item_price` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(7, 'PERFUME SPRAY'),
(8, 'PERFUME OILS'),
(9, 'HOME FRAGRANCES'),
(10, 'BODY CARE'),
(11, 'GIFT SETS'),
(12, 'SMART BUNDLES'),
(13, 'Brands');

-- --------------------------------------------------------

--
-- Table structure for table `contact_msgs`
--

CREATE TABLE `contact_msgs` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `datetime` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) DEFAULT NULL,
  `order_date` varchar(200) DEFAULT NULL,
  `transaction_no` varchar(200) DEFAULT NULL,
  `total_products` varchar(200) DEFAULT NULL,
  `total_order_amt` varchar(200) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `order_time` varchar(200) DEFAULT NULL,
  `cus_name` varchar(200) DEFAULT NULL,
  `cus_state` varchar(200) DEFAULT NULL,
  `cus_city` varchar(200) DEFAULT NULL,
  `cus_zip` varchar(200) DEFAULT NULL,
  `cus_address` varchar(200) DEFAULT NULL,
  `cus_email` varchar(200) DEFAULT NULL,
  `cus_phone` varchar(200) DEFAULT NULL,
  `pay_via` varchar(200) DEFAULT NULL,
  `payment_status` varchar(200) DEFAULT NULL,
  `order_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `order_date`, `transaction_no`, `total_products`, `total_order_amt`, `ip_address`, `order_time`, `cus_name`, `cus_state`, `cus_city`, `cus_zip`, `cus_address`, `cus_email`, `cus_phone`, `pay_via`, `payment_status`, `order_status`) VALUES
(1, '976877', '03-05-2025', '90976', '4', '295', '::1', '09:21:45', 'MUHAMMAD ALI', 'Alaska', 'Talagang', '48100', 'WARD NO 10 HOUSE NO 124-7ABX-78', 'alimalik7ab@gmail.com', '03195283765', 'Stripe', 'Complete', 'Pending'),
(2, '711206', '03-05-2025', '68118', '2', '30', '::1', '11:40:12', 'MUHAMMAD ALI', 'California', 'Talagang', '48100', 'WARD NO 10 HOUSE NO 124-7ABX-78', 'alimalik7ab@gmail.com', '03473340001', 'Stripe', 'Pending', 'Pending'),
(3, '314344', '03-05-2025', '83888', '1', '20', '::1', '11:40:35', 'MUHAMMAD ALI', 'Arizona', 'Talagang', '48100', 'WARD NO 10 HOUSE NO 124-7ABX-78', 'alimalik7ab@gmail.com', '03473340001', 'Stripe', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) DEFAULT NULL,
  `prod_no` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `single_item_price` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_no`, `prod_no`, `qty`, `single_item_price`) VALUES
(1, '976877', '415861', '3', '50'),
(2, '976877', '172144', '2', '20'),
(3, '976877', '829301', '1', '35'),
(4, '976877', '294502', '2', '35'),
(5, '711206', '609168', '1', '10'),
(6, '711206', '172144', '1', '20'),
(7, '314344', '172144', '1', '20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_no` varchar(200) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_cat` varchar(200) DEFAULT NULL,
  `product_sub_cat` varchar(200) DEFAULT NULL,
  `product_price` varchar(200) DEFAULT NULL,
  `product_old_price` varchar(200) DEFAULT NULL,
  `short_desc` varchar(500) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `long_description` varchar(5000) DEFAULT NULL,
  `best_seller` varchar(200) DEFAULT NULL,
  `new_arrivals` varchar(200) DEFAULT NULL,
  `new_top_rated` varchar(200) DEFAULT NULL,
  `featured_product` varchar(200) DEFAULT NULL,
  `p_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_no`, `product_name`, `product_cat`, `product_sub_cat`, `product_price`, `product_old_price`, `short_desc`, `product_image`, `long_description`, `best_seller`, `new_arrivals`, `new_top_rated`, `featured_product`, `p_status`) VALUES
(1, '386444', 'Choco Musk EDP-50ml by Al Rehab', '7', '1', '15', '86', ' ', '386444_1_7552ac50-9fcd-475c-bc3a-8cb5dc264802.webp', 'A very popular fragrance with gourmet tones is now also in the choco musk perfume water spray.\n<br>\nThe choco musk perfume is full of luring tones, dominated by a delicious vanilla with a sinfully irritating chocolate praline.\n<br>\n The creamy chords come with a caress of sandalwood, surrounded by the tenderness of a soft musk with a few glimpses of pink petals.\n<br>\nIn the choco musk perfume gourmet game, we sink deeper and deeper with the help of a honey-sensual, velvety ambergris complemented by tones of oriental spices that show off the aromatic myrrh with warm-spilling cinnamon. ', '1', '1', '0', '1', 'Active'),
(2, '46445', 'Hawas for Men Eau De Parfum - 100ML (3.4 oz) by Rasasi', '7', '1', '45', '100', ' ', '46445_3_ad37a713-1919-41e5-8fc4-73c36ffa892a.webp', ' Rasasi hawas blends cinnamon, bergamot, orange blossom, grey amber and sandalwood to create an aquatic scent designed to embody masculine strength and vigor.\n<br>\nThis fresh elegant woody perfume combines the premium Italian citrus and the fruity freshness of pear and pineapple. The heart of this modern fougere is based on aquatic elements combined with melon and violet. Hawas man is a mix of sandalwood, cedar wood, musk with generous ambergris. The fragrance is inflected with fresh marine aromatic notes that melt into amber woods.\n<br>\nThis hawas men captures the adventurous, exploratory and evocative spirit of the modern man. The contemporary notes of this chic fragrance come with an attitude to match.\n<br>\nThe clear grey bottle has a python wrapped around the stopper while a textured python on the pack captures the sensuality of the species with a flamboyance redolent of haute couture.', '1', '1', '0', '1', 'Active'),
(3, '623346', '100ML ', '7', '2', '35', '70', ' ', '623346_Untitleddesign-2024-04-13T154501.761.webp', 'This fragrance opens with the delicate floral notes of heliotrope and orchid, uplifted by the citrusy brightness of tangerine. At its heart, a luscious gourmand accords blends seamlessly with exotic tropical fruits, adding a sweet and playful touch. The base of warm vanilla, smooth sandalwood, and soft musk creates a comforting, lasting finish. Perfect for those who enjoy a sweet, tropical scent with a luxurious, creamy warmth.', '0', '1', '0', '1', 'Active'),
(4, '1313213', 'Choco Musk EDP-50ml by Al Rehab', '7', '3', '15', '86', ' ', '386444_1_7552ac50-9fcd-475c-bc3a-8cb5dc264802.webp', 'A very popular fragrance with gourmet tones is now also in the choco musk perfume water spray.\r\n<br>\r\nThe choco musk perfume is full of luring tones, dominated by a delicious vanilla with a sinfully irritating chocolate praline.\r\n<br>\r\n The creamy chords come with a caress of sandalwood, surrounded by the tenderness of a soft musk with a few glimpses of pink petals.\r\n<br>\r\nIn the choco musk perfume gourmet game, we sink deeper and deeper with the help of a honey-sensual, velvety ambergris complemented by tones of oriental spices that show off the aromatic myrrh with warm-spilling cinnamon. ', '1', '1', '0', '1', 'Active'),
(5, '411156', 'Badee Al Oud Amethyst EDP - 100ML(3.4 oz) by Lattafa (4264 Reviews)', '7', '3', '10000', '50', ' ', '411156_Untitleddesign-2022-06-10T172236.400_f820b410-1d33-46ca-ac73-dec65bc016a5.webp', 'Perfume Oud For Glory Amethyst - Bade\'e Al Oud Amethyst Eau de Parfum by Lattafa Perfumes is a warm fragrance with vanilla, amber and roses. The top note starts with spicy pink pepper and fresh bergamot. The heart note is floral with Turkish roses, Bulgarian roses and jasmine. Oudh, vanilla and amber perfectly round off the perfume in the base. Bade\'e Al Oud Amethyst is an exceptionally successful blend of roses, Oudh and warm notes that is very suitable for any occasion.', '1', '1', '1', '1', 'Active'),
(6, '294502', 'Pink Musk Oil 12ml(0.40 oz) Unisex with Black Gift Box INTENSE OUD', '8', '4', '35', '50', ' ', '294502_1_e74d1a36-74d0-4d82-967a-ec5d6f72388f.webp', 'This perfume opens with a delicate and enchanting blend of floral violets, lilies, vanilla, and white lotus blossoms, creating a soft and elegant introduction. The heart is simple yet refined, with the smooth and powdery allure of white musk adding a gentle warmth. The base is sweet and golden, as the rich scent of honey lingers, providing a comforting and inviting finish. This perfume is suitable for those who enjoy a light, floral fragrance with a touch of sweetness and warmth.', '0', '1', '1', '1', 'Active'),
(7, '829301', 'Layali Rouge for Women Perfume Oil-15ML by Swiss Arabian (VELVET POUCH BOTTLE)', '8', '5', '35', '40', ' ', '829301_6_f443861f-57c3-4638-a3f3-2ed97528dc3e.webp', 'Layali Rouge is a limited release to its well known sisters Layali and Amaali. The scent is Fruity Floral Concentrated Perfume Oil (CPO) engulfed in a Sweet Powdery Shroud with Citrus Rose Elements. Layali Rouge comes in the precious bottle adorned with a gilded motif and decorated with a flower to the perfection of a florist and dressed with a crystal at the top. It has all the fun and frolics of a cocktail. Opening with sweet and juicy mango, pineapple, lemon, papaya and florals, the tropical opening sets the tone for the fabulous night ahead. The fruity notes are soon joined by a burst of hypnotic roses and juicy peaches, before hibiscus and coconut catch the breeze and bring it all to a rich night time finale. Layali Rouge will take you through the night in a fruity flirtatious whirl. It surrounds you with magic, making you irresistible, unforgettable and as bright as the stars in the night sky above you.', '1', '1', '0', '0', 'Active'),
(8, '345991', 'Choco Musk Air Freshener - 300ml by Al Rehab', '9', '6', '10', '15', 'Ordered before for gifts', '345991_choco-musk.webp', 'Choco Musk Air Freshener : Room Freshener of the prestigious brand in the Arab world \"AL-REHAB\". Choco Musk by Al-Rehab is as the name it says - milk chocolate with a great vanilla base and white musk on top.. fragrance and the best \"chocolate attar\" ever, and one of Al Rehab bestsellers.Let yourself be delighted by this unprecedented fusion between musk and chocolate. ', '0', '1', '1', '0', 'Active'),
(9, '609168', 'Choco Musk Perfumed body Spray - 200ml by Al Rehab', '9', '6', '10', '17', ' ', '609168_1_d172aed5-a288-409c-996e-dcbbd2ddf3ae.webp', 'Choco Musk body Spray : Body Spray of the prestigious brand in the Arab world \"AL-REHAB\". Choco Musk by Al-Rehab is as the name it says - milk chocolate with a great vanilla base and white musk on top.. fragrance and the best \"chocolate attar\" ever, and one of Al Rehab bestsellers.Let yourself be delighted by this unprecedented fusion between musk and chocolate. ', '1', '1', '1', '1', 'Active'),
(10, '936116', 'Zahoor Francee Lotion - 30GMS (1oz) by Ard Al Zaafaran (0 Reviews)', '10', '7', '30', '40', ' ', '936116_1_1a4ed281-e283-4507-b66b-c023c1dbcefa.webp', 'The perfume does not have a typical top, heart and base note, but enchants with floral notes of jasmine and roses, which have been skilfully combined with fruity scents of pineapple, strawberries and grapes. Powdery white musk and warm amber lend flattering softness and warmth. A beautifully balanced perfume with a delicious sweetness that is very suitable for any occasion.', '1', '0', '1', '1', 'Active'),
(11, '172144', 'LUXURY OUD MUSK BODY LOTION 500ML (16.9 OZ) By Hamidi | Ultra Moisturizing', '10', '7', '20', '25', ' ', '172144_OUDMUSKBL.webp', 'OUD MUSK BODY LOTION: Enticing and luxurious, the Oud Musk Body lotion is crafted with nourishing vitamin E and skin-loving aloevera in our most delectable formula, leaving skin feeling fresh with the grand fragrance medley of Oud and Musk.', '1', '0', '0', '1', 'Active'),
(12, '415861', 'Nafaeis Al Shaghaf for Men EDP- 100 ML (3.4 oz) by Rasasi', '7', '1', '50', '70', 'Now this right here is a clean smell.', '415861_3_3ee7de25-60cc-426a-a154-939cdcff4eb4.webp', '\"Shaghaf Pour Homme is powerful masculine fragrance crafted for men who love to wear a unique signature scent. A rich woody-leathery accord infused with the mystical rose, exotic orchid and delicate Ylang-Ylang is the highlight of this perfume. Sandalwood and musk, caressed by vanilla and tonka beans add an intensely lingering note while a bouquet of fruity- floral accord gives this fragrance an irresistible energy and spirit.\" - a note from the brand.', '1', '0', '1', '0', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `products_key_points`
--

CREATE TABLE `products_key_points` (
  `id` int(11) NOT NULL,
  `prod_no` varchar(200) DEFAULT NULL,
  `key_points` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_key_points`
--

INSERT INTO `products_key_points` (`id`, `prod_no`, `key_points`) VALUES
(1, '386444', 'Long-Lasting Fragrance'),
(2, '386444', 'Premium Quality Ingredients'),
(3, '386444', 'Elegant & Unique Scent Profile'),
(4, '386444', 'Suitable for All Occasions'),
(5, '46445', 'Suitable for All Occasions'),
(6, '46445', 'Elegant & Unique Scent Profile'),
(7, '46445', 'Premium Quality Ingredients'),
(8, '46445', 'Perfect Gift Option'),
(9, '623346', 'Suitable for All Occasions'),
(10, '623346', 'Elegant & Unique Scent Profile'),
(11, '623346', 'Premium Quality Ingredients'),
(12, '623346', 'Long-Lasting Fragrance'),
(13, '411156', 'Suitable for All Occasions'),
(14, '411156', 'Premium Quality Ingredients'),
(15, '411156', 'Long-Lasting Fragrance'),
(16, '294502', 'Suitable for All Occasions'),
(17, '294502', 'Elegant & Unique Scent Profile'),
(18, '294502', 'Perfect Gift Option'),
(19, '294502', 'Premium Quality Ingredients'),
(20, '294502', 'Long-Lasting Fragrance'),
(21, '829301', 'Suitable for All Occasions'),
(22, '829301', 'Elegant & Unique Scent Profile'),
(23, '829301', 'Premium Quality Ingredients'),
(24, '829301', 'Long-Lasting Fragrance'),
(25, '345991', 'Long-Lasting Fragrance'),
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
(37, '415861', 'Vanilla, Musk, Patchouli, Tonka beans, & Sandalwood');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `prod_no` varchar(200) DEFAULT NULL,
  `p_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `prod_no`, `p_image`) VALUES
(1, '386444', 'Product_Image/other_386444_2_cd229648-e085-4a07-a7dd-d6376c77b748.webp'),
(2, '386444', 'Product_Image/other_386444_1_7552ac50-9fcd-475c-bc3a-8cb5dc264802 (1).webp'),
(3, '386444', 'Product_Image/other_386444_3_1a957ae2-8756-46f4-acc3-7973806fa3d4.webp'),
(4, '46445', 'Product_Image/other_46445_5_1555e037-1f9a-435a-95c3-40618febd833.webp'),
(5, '46445', 'Product_Image/other_46445_4_58aa3c30-3dbd-457b-89a5-7539ff2a52e9.webp'),
(6, '46445', 'Product_Image/other_46445_2_e8a51199-5390-4a78-bde2-1070311cd887.webp'),
(7, '623346', 'Product_Image/other_623346_Untitleddesign-2024-04-13T154501.761 (1).webp'),
(8, '623346', 'Product_Image/other_623346_21_b67cc975-e856-43db-b935-6f91b4412a60.webp'),
(9, '623346', 'Product_Image/other_623346_18_b7760eda-9a5d-459d-912f-9e744d091bde.webp'),
(10, '411156', 'Product_Image/other_411156_9_d65e3f8f-2e1b-4d98-bf8c-04532b3336e4.webp'),
(11, '411156', 'Product_Image/other_411156_3_547a2f9e-fd3e-430e-ad4c-3f908fbec54b.webp'),
(12, '411156', 'Product_Image/other_411156_6_4eecf769-a5fd-4aa3-9556-b415c775f8b9.webp'),
(13, '411156', 'Product_Image/other_411156_5_963d4244-e4cd-4d5a-a238-2a4cfe67c0b2.webp'),
(14, '411156', 'Product_Image/other_411156_8_bebb51c1-a627-40aa-88e9-410a6c665f5e.webp'),
(15, '411156', 'Product_Image/other_411156_1_98e77871-0c40-45f9-bde5-db6fac118f2c.webp'),
(16, '294502', 'Product_Image/other_294502_4_dcf8e41d-4a47-4812-bf2d-525e673fc07e.webp'),
(17, '294502', 'Product_Image/other_294502_3_7b0ea93a-3906-40c8-b036-944281b5f27c.webp'),
(18, '294502', 'Product_Image/other_294502_2_f5643f08-c447-4650-8f1a-c12480283fc2.webp'),
(19, '829301', 'Product_Image/other_829301_3_1f7e44e5-74a2-42bd-aa77-4990d39382e3.webp'),
(20, '829301', 'Product_Image/other_829301_2_ded61f7b-83a5-481a-86f4-c285449a2e15.webp'),
(21, '829301', 'Product_Image/other_829301_1_a8b968a0-b2d5-4f62-a3f4-475ca2d28b47.webp'),
(22, '829301', 'Product_Image/other_829301_5_6003e2bf-a630-4ff4-81e4-c4d7430e9d9b.webp'),
(23, '345991', 'Product_Image/other_345991_Untitleddesign-2023-03-10T142147.458.webp'),
(24, '345991', 'Product_Image/other_345991_Choco-Musk-02.webp'),
(25, '609168', 'Product_Image/other_609168_5_6e21ec45-60df-438e-bdef-fb7a67afdc4d.webp'),
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
(39, '415861', 'Product_Image/other_415861_1_9f65dda5-220b-4e23-9d3b-11ec26677f61.webp');

-- --------------------------------------------------------

--
-- Table structure for table `stripe`
--

CREATE TABLE `stripe` (
  `id` int(11) NOT NULL,
  `publishableKey` varchar(200) DEFAULT NULL,
  `secretKey` varchar(200) DEFAULT NULL,
  `success_url` varchar(200) DEFAULT NULL,
  `cancel_url` varchar(200) DEFAULT NULL
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
  `id` int(11) NOT NULL,
  `cat_id` varchar(200) DEFAULT NULL,
  `sub_cat_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `sub_cat_name`) VALUES
(1, '7', 'For Men'),
(2, '7', 'For Her'),
(3, '7', 'For Unisex'),
(4, '8', 'INTENSE OUD PERFUME OILS'),
(5, '8', 'Finished Oils'),
(6, '9', 'AIR FRESHNERS'),
(7, '10', 'Lotion'),
(8, '10', 'BODY MIST'),
(9, '10', 'BODY POWDER'),
(10, '10', 'SOAPS'),
(11, '11', 'Fathers Day'),
(12, '11', 'Magnetic Gift Boxes'),
(13, '11', 'Birthday Gifts'),
(14, '12', 'Couple Sets'),
(15, '12', '3-Piece Sets'),
(16, '13', 'Bath & Body Works'),
(17, '13', 'Victoria\'s Secret'),
(18, '13', 'Tom Ford'),
(19, '13', 'Calvin Klein'),
(20, '13', 'Versace'),
(21, '13', 'Chanel'),
(22, '13', 'Gucci'),
(23, '13', 'Dior'),
(24, '13', 'Armani'),
(25, '13', 'Yves Saint Laurent'),
(26, '13', 'Dolce & Gabbana'),
(27, '13', 'Burberry'),
(28, '13', 'Jimmy Choo'),
(29, '13', 'Marc Jacobs'),
(30, '13', 'Prada'),
(31, '13', 'Coach'),
(32, '13', 'Lancome'),
(33, '13', 'Jo Malone'),
(34, '13', 'Hugo Boss'),
(35, '13', 'Creed'),
(36, '13', 'Bvlgari'),
(37, '13', 'Ralph Lauren'),
(38, '13', 'Zara'),
(39, '13', 'Ariana Grande'),
(40, '13', 'Billie Eilish'),
(41, '13', 'Baccarat Rouge 540'),
(42, '13', 'Paco Rabanne'),
(43, '13', 'Maison Margiela'),
(44, '13', 'Nautica'),
(45, '13', 'Abercrombie & Fitch'),
(46, '13', 'Guess'),
(47, '13', 'Michael Kors'),
(48, '13', 'Tory Burch'),
(49, '13', 'Sol de Janeiro'),
(50, '13', 'Kilian'),
(51, '13', 'Juicy Couture'),
(52, '13', 'Clinique'),
(53, '13', 'Elizabeth Arden'),
(54, '13', 'Moschino'),
(55, '13', 'Axe');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) DEFAULT NULL,
  `transaction_no` varchar(200) DEFAULT NULL,
  `pay_via` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `datetime` varchar(200) DEFAULT NULL
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
  `id` int(11) NOT NULL,
  `web_name` varchar(200) DEFAULT NULL,
  `web_title` varchar(200) DEFAULT NULL,
  `web_keywords` varchar(200) DEFAULT NULL,
  `web_desc` varchar(200) DEFAULT NULL,
  `web_author` varchar(200) DEFAULT NULL,
  `web_phone` varchar(200) DEFAULT NULL,
  `web_email` varchar(200) DEFAULT NULL,
  `web_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `web_name`, `web_title`, `web_keywords`, `web_desc`, `web_author`, `web_phone`, `web_email`, `web_address`) VALUES
(1, 'OUD & AURA', 'OUD & AURA', 'OUD & AURA', 'Test website', 'Jeremiah Kumah', '+1 (773) 996-5716', 'oudandaura1@gmail.com', '8714 S Michigan Ave Chicago IL 60619. ');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_key_points`
--
ALTER TABLE `products_key_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `stripe`
--
ALTER TABLE `stripe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
