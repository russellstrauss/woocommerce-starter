-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS woocommerce_starter_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user if it doesn't exist
CREATE USER IF NOT EXISTS 'woocommerce_starter_user'@'%' IDENTIFIED BY 'woocommerce_starter_pass';

-- Grant privileges
GRANT ALL PRIVILEGES ON woocommerce_starter_db.* TO 'woocommerce_starter_user'@'%';

-- Flush privileges
FLUSH PRIVILEGES;
