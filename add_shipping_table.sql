-- SQL Script to add shipping settings table
-- Run this in your phpMyAdmin or MySQL client

-- Create shipping settings table
CREATE TABLE `shipping_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_enabled` tinyint(1) DEFAULT 0,
  `shipping_amount` decimal(10,2) DEFAULT 0.00,
  `free_shipping_threshold` decimal(10,2) DEFAULT 0.00,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default shipping settings
INSERT INTO `shipping_settings` (`id`, `shipping_enabled`, `shipping_amount`, `free_shipping_threshold`) VALUES
(1, 0, 10.00, 100.00); 