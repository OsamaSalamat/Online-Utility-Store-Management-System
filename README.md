# Online Store - Customer Module

CS619 Prototype Assignment - Virtual University of Pakistan

## Project Overview

A web-based Customer Module for an Online Store application built with **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**. The application connects to a MySQL database and provides the following functionalities:

1. **Customer Registration** - New customers can create an account
2. **Customer Login** - Registered customers can log in securely
3. **Search Products by Category** - Logged-in customers can browse and search products by category

## Technologies Used

| Technology | Purpose |
|---|---|
| PHP 8.x | Server-side logic and database operations |
| MySQL | Database management |
| HTML5 | Page structure |
| CSS3 | Styling and responsive layout |
| JavaScript | Client-side form validation |

## Project Structure

```
online-store/
├── assets/
│   ├── css/
│   │   └── style.css          # Stylesheet
│   └── js/
│       └── main.js            # Client-side validation
├── config/
│   └── database.php           # Database connection
├── database/
│   └── online_store.sql       # Database schema + sample data
├── includes/
│   ├── functions.php          # Helper functions
│   ├── header.php             # Common header
│   └── footer.php             # Common footer
├── index.php                  # Home page
├── register.php               # Customer registration
├── login.php                  # Customer login
├── logout.php                 # Logout handler
├── products.php               # Search products by category
└── README.md                  # This file
```

## Setup Instructions

### Prerequisites

- XAMPP (or WAMP/LAMP) with Apache and MySQL running
- PHP 7.4 or higher
- MySQL 5.7 or higher

### Step 1: Place Project Files

Copy the entire `online-store` folder to your XAMPP `htdocs` directory:

```
C:\xampp\htdocs\online-store\
```

### Step 2: Import Database

1. Open **phpMyAdmin** at `http://localhost/phpmyadmin`
2. Click **Import** tab
3. Choose the file `database/online_store.sql`
4. Click **Go** to import

Alternatively, run from command line:

```bash
mysql -u root -p < database/online_store.sql
```

### Step 3: Configure Database (if needed)

Edit `config/database.php` if your MySQL credentials differ from defaults:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');        // Your MySQL password
define('DB_NAME', 'online_store');
```

### Step 4: Run the Application

1. Start **Apache** and **MySQL** from XAMPP Control Panel
2. Open browser and navigate to:

```
http://localhost/online-store/
```

## How to Test

### 1. Customer Registration
- Go to `http://localhost/online-store/register.php`
- Fill in: Full Name, Email, Phone, Address, Password
- Click **Register**
- You should be redirected to the login page with a success message

### 2. Customer Login
- Go to `http://localhost/online-store/login.php`
- Enter the email and password you registered with
- Click **Login**
- You should be redirected to the products page

### 3. Search Products by Category
- After logging in, go to `http://localhost/online-store/products.php`
- Click a category card OR select a category from the dropdown
- Optionally enter a keyword to filter further
- Click **Search** to view matching products

## Database Tables

| Table | Description |
|---|---|
| `customers` | Stores registered customer accounts |
| `categories` | Product categories (Electronics, Clothing, etc.) |
| `products` | Product catalog linked to categories |

## Sample Data

The database includes 5 categories and 17 sample products pre-loaded for testing.

## Security Features

- Passwords hashed using PHP `password_hash()` (bcrypt)
- SQL injection prevention via prepared statements
- XSS prevention via `htmlspecialchars()` output encoding
- Session-based authentication
- Server-side and client-side form validation

## Author

CS619 - Final Project Prototype Phase

## Add Product
INSERT INTO products
(category_id, product_name, description, price, stock)
VALUES
(
    (SELECT category_id FROM categories
     WHERE category_name = 'Football'),
    'Football Shoes',
    'Professional football shoes',
    59.99,
    30
);

## Add Category
INSERT INTO categories (category_name, description) VALUES
('Watches', 'Wrist Watches, and accessories');