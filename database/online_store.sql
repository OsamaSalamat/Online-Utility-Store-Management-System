-- Online Store - Customer Module Database
-- CS619 Prototype Assignment

CREATE DATABASE IF NOT EXISTS online_store;
USE online_store;

-- Categories table
CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Products table
CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

-- Customers table
CREATE TABLE IF NOT EXISTS customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample categories
INSERT INTO categories (category_name, description) VALUES
('Electronics', 'Gadgets, devices, and electronic accessories'),
('Clothing', 'Men, women, and kids fashion apparel'),
('Books', 'Educational, fiction, and non-fiction books'),
('Home & Kitchen', 'Home appliances and kitchen essentials'),
('Sports', 'Sports equipment and fitness gear');

-- Sample products
INSERT INTO products (category_id, product_name, description, price, stock) VALUES
(1, 'Wireless Headphones', 'Bluetooth 5.0 over-ear headphones with noise cancellation', 79.99, 50),
(1, 'Smart Watch', 'Fitness tracker with heart rate monitor', 149.99, 30),
(1, 'USB-C Hub', '7-in-1 multiport adapter for laptops', 34.99, 100),
(1, 'Portable Speaker', 'Waterproof Bluetooth speaker', 45.00, 75),
(2, 'Cotton T-Shirt', 'Premium quality unisex cotton t-shirt', 19.99, 200),
(2, 'Denim Jeans', 'Classic fit blue denim jeans', 49.99, 80),
(2, 'Winter Jacket', 'Warm insulated winter jacket', 89.99, 40),
(2, 'Running Shoes', 'Lightweight sports running shoes', 69.99, 60),
(3, 'Introduction to PHP', 'Complete guide to PHP web development', 29.99, 25),
(3, 'Database Design', 'Relational database design fundamentals', 34.99, 20),
(3, 'Web Development', 'HTML, CSS, and JavaScript essentials', 24.99, 35),
(4, 'Coffee Maker', 'Automatic drip coffee maker 12-cup', 59.99, 45),
(4, 'Blender', 'High-speed kitchen blender 1000W', 39.99, 55),
(4, 'Non-Stick Pan Set', '3-piece non-stick cookware set', 44.99, 70),
(5, 'Yoga Mat', 'Non-slip exercise yoga mat', 24.99, 90),
(5, 'Dumbbell Set', 'Adjustable dumbbell set 20kg', 99.99, 25),
(5, 'Football', 'Official size 5 football', 29.99, 50);
