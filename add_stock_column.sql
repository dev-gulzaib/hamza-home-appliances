-- SQL Script to add stock column to products table
-- Run this in your phpMyAdmin or MySQL client

-- Add stock column to products table
ALTER TABLE products ADD COLUMN stock_quantity INT DEFAULT 0;

-- Update existing products to have default stock (optional)
-- UPDATE products SET stock_quantity = 100 WHERE stock_quantity IS NULL; 