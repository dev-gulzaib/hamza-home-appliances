-- SQL Script to add size columns to existing tables
-- Run this in your phpMyAdmin or MySQL client

-- Add size column to products table
ALTER TABLE products ADD COLUMN product_sizes VARCHAR(200) DEFAULT NULL;

-- Add size column to cart table  
ALTER TABLE cart ADD COLUMN size VARCHAR(10) DEFAULT NULL;

-- Add size column to order_products table
ALTER TABLE order_products ADD COLUMN size VARCHAR(10) DEFAULT NULL;

-- Update existing products to have default sizes (optional)
-- UPDATE products SET product_sizes = 'S,M,L,XL' WHERE product_sizes IS NULL; 