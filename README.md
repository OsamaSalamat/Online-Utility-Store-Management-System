🛒 Online Utility Store Management System

📌 Project Overview

Online Utility Store Management System is a complete database-driven web application developed using PHP, MySQL, HTML5, CSS3, and JavaScript. The system is designed to digitize and automate the operations of a utility store by providing an integrated platform for product management, inventory control, customer management, online ordering, billing, sales tracking, and administrative operations.

The system provides separate functionality for Administrators, Utility Store Staff, and Customers, allowing each type of user to perform tasks according to their role.

Customers can create accounts, browse and search products, explore different categories, view detailed product information, add products to their cart, place orders, and view their order history. Store staff can manage products, process orders, update stock, and handle billing. Administrators have centralized control over products, categories, users, inventory, orders, sales, and overall store operations.

The main purpose of this project is to replace traditional manual store management processes with an efficient, user-friendly, and centralized web-based solution.

---

🎯 Project Objectives

The major objectives of the Online Utility Store Management System are:

- Digitize traditional utility store operations.
- Provide an online platform for customers to purchase products.
- Automate product and inventory management.
- Reduce manual record keeping.
- Minimize billing and transaction errors.
- Provide efficient order processing.
- Maintain customer and staff records.
- Provide centralized administrative control.
- Improve stock monitoring and management.
- Maintain order and transaction history.
- Improve customer convenience and shopping experience.
- Provide a scalable foundation for future e-commerce features.

---

👥 User Roles

The system consists of three major user roles:

👨‍💼 1. Administrator

The Administrator has complete control over the system and is responsible for managing the overall store operations.

Administrator features include:

- Admin authentication and login.
- Admin dashboard.
- Manage products.
- Add new products.
- Update product information.
- Delete products.
- Manage product categories.
- Add, update, and delete categories.
- Manage product prices.
- Manage product quantities.
- Monitor inventory.
- Manage customers.
- Manage staff accounts.
- View registered users.
- Manage customer accounts.
- Manage orders.
- View order details.
- Monitor sales and transactions.
- View purchase records.
- Monitor overall store activities.
- Manage system data through the database.

---

👨‍💼 2. Utility Store Staff

Store staff are responsible for handling day-to-day store operations.

Staff features include:

- Staff login and authentication.
- Access staff dashboard.
- View available products.
- Add and update product information.
- Manage product quantities.
- Update product prices.
- Monitor stock levels.
- Process customer orders.
- View order details.
- Update order status.
- Generate/process bills.
- Update inventory after transactions.
- Manage daily store operations.

---

👤 3. Customer

Customers can use the system as an online shopping platform.

Customer features include:

- Customer registration.
- Customer login/logout.
- Customer profile management.
- Browse available products.
- Browse products by category.
- Search products.
- Filter products.
- View product details.
- View product price and availability.
- Add products to shopping cart.
- Update cart quantities.
- Remove products from cart.
- View cart total.
- Place orders.
- Provide order information.
- View order confirmation.
- Track order status.
- View previous orders.
- View order history.
- View purchase details.
- Manage account information.

---

🛍️ Product Management

The system provides complete product management functionality.

Administrators and authorized staff can:

- Add new products.
- Edit existing products.
- Delete products.
- Update product names.
- Update product descriptions.
- Update prices.
- Update available quantities.
- Assign products to categories.
- Manage product availability.
- Display product information to customers.

Products can be organized into different utility-store categories to make browsing easier.

---

📦 Inventory Management

The inventory module helps the store maintain accurate stock records.

Features include:

- Stock quantity management.
- Real-time quantity updates after transactions.
- Product availability checking.
- Low-stock monitoring.
- Automatic stock reduction after orders.
- Prevention of orders exceeding available stock.
- Product inventory updates.
- Centralized inventory records.

---

🗂️ Category Management

The category module allows administrators to organize products efficiently.

Features include:

- Create categories.
- Update categories.
- Delete categories.
- Display all categories.
- Assign products to categories.
- Browse products by category.
- View all products through the All Categories option.
- Category-based product filtering.

---

🛒 Shopping Cart

Customers can manage their selected products before placing an order.

Shopping cart features include:

- Add products to cart.
- Remove products from cart.
- Increase/decrease product quantity.
- View selected products.
- Calculate item subtotals.
- Calculate total cart amount.
- Check product availability.
- Proceed to checkout.

---

📋 Order Management

The order management module handles customer purchases from order placement to processing.

Features include:

- Place new orders.
- Store order information in the database.
- View order details.
- Manage order items.
- Calculate order totals.
- Update order status.
- Process customer orders.
- Maintain order history.
- View previous purchases.

---

💳 Billing & Transactions

The system provides functionality for processing customer purchases and maintaining transaction records.

Features include:

- Generate customer bills.
- Calculate total purchase amount.
- Maintain transaction records.
- Store order and payment information.
- Maintain purchase history.
- Provide order/billing details.

---

👤 User Management

The administrator can manage users through the centralized system.

User management includes:

- Customer registration.
- Customer authentication.
- Staff accounts.
- Admin accounts.
- User information management.
- User role management.
- Account status management.
- Secure logout functionality.

---

🔐 Authentication & Security

The application includes role-based authentication to control access to different sections of the system.

Security-related functionality includes:

- Login authentication.
- Registration validation.
- Session management.
- Role-based access control.
- Protected admin/staff areas.
- Logout functionality.
- Form validation.
- Database-driven authentication.

---

🔎 Product Search & Filtering

Customers can easily find products using the search and filtering functionality.

Features include:

- Search products by name.
- Browse products by category.
- Filter products according to category.
- View all available products.
- View product availability.
- Quickly find required utility items.

---

📊 Sales & Transaction Management

The system maintains information related to customer purchases and store transactions.

Administrators can:

- View transaction records.
- Monitor customer purchases.
- Review order information.
- Monitor sales activity.
- Analyze store transactions.
- Maintain historical purchase records.

---

🗄️ Database Management

The system uses MySQL as its relational database.

The database stores information related to:

- Users
- Administrators
- Staff
- Customers
- Products
- Categories
- Inventory
- Orders
- Order Items
- Transactions
- Other system records

PHP is used as the backend technology to communicate with the MySQL database and perform CRUD operations.

---

💻 Technologies Used

Frontend

- HTML5
- CSS3
- JavaScript

Backend

- PHP

Database

- MySQL

Development Environment

- XAMPP
- Apache
- MySQL/phpMyAdmin

Other

- Git
- GitHub

---

🏗️ System Architecture

The application follows a database-driven web application architecture:

User → Web Interface → PHP Backend → MySQL Database

The PHP backend handles:

- Authentication
- Business logic
- CRUD operations
- Product management
- Order processing
- Cart operations
- Inventory updates
- Database communication

The frontend provides an interactive interface for customers, staff, and administrators.

---

🔄 Main System Workflow

Customer Workflow

Registration → Login → Browse Products → Search/Filter → Product Details → Add to Cart → Checkout → Place Order → Order Processing → Order History

Staff Workflow

Staff Login → Dashboard → Manage Products/Stock → View Orders → Process Orders → Generate Bill → Update Stock

Administrator Workflow

Admin Login → Dashboard → Manage Users → Manage Categories → Manage Products → Manage Inventory → Monitor Orders → View Transactions/Sales

---

📁 Project Structure

A typical project structure includes:

Online-Utility-Store-Management/
│
├── admin/
│   ├── dashboard.php
│   ├── products.php
│   ├── categories.php
│   ├── users.php
│   └── orders.php
│
├── staff/
│   ├── dashboard.php
│   ├── products.php
│   ├── orders.php
│   └── inventory.php
│
├── customer/
│   ├── dashboard.php
│   ├── profile.php
│   ├── cart.php
│   └── orders.php
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── ...
│
├── config/
│   └── database.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── index.php
├── login.php
├── register.php
├── products.php
├── cart.php
├── checkout.php
└── README.md

The exact structure may vary according to the final project implementation.

---

🚀 Installation & Setup

To run the project locally:

1. Install XAMPP

Install XAMPP with:

- Apache
- MySQL
- phpMyAdmin

2. Clone the Repository

git clone https://github.com/your-username/online-utility-store-management.git

3. Move Project to XAMPP

Copy the project folder into:

C:\xampp\htdocs\

4. Start XAMPP

Start:

Apache
MySQL

5. Create Database

Open:

http://localhost/phpmyadmin

Create the required database and import the project's SQL database file.

6. Configure Database

Update the database configuration file according to your local MySQL settings.

7. Run the Application

Open:

http://localhost/online-utility-store-management/

---

📌 Project Domain

Web Programming

📌 Project Type

Database-Driven Web Application

📌 Backend

PHP

📌 Database

MySQL

---

🔮 Future Enhancements

The system can be further enhanced by adding:

- Online payment gateway integration.
- Email/SMS order notifications.
- Advanced sales analytics.
- PDF invoice generation.
- Discount and coupon management.
- Product reviews and ratings.
- Wishlist functionality.
- Delivery management.
- Multiple utility-store branches.
- REST API integration.
- Mobile application.
- Advanced role and permission management.
- Cloud deployment.
- Automated backups.

---

👨‍💻 Project Purpose

This project was developed to demonstrate practical implementation of PHP web programming, MySQL database management, CRUD operations, authentication, session management, role-based access control, inventory management, shopping cart functionality, order processing, and database-driven application development.

It provides a complete foundation for an online utility store while demonstrating how real-world business processes can be transformed into a centralized web-based management system.

---

⭐ Key Highlights

- ✅ PHP & MySQL Based
- ✅ Role-Based Access
- ✅ Admin Management
- ✅ Staff Management
- ✅ Customer Management
- ✅ Product Management
- ✅ Category Management
- ✅ Inventory Management
- ✅ Product Search & Filtering
- ✅ Shopping Cart
- ✅ Online Orders
- ✅ Order Management
- ✅ Billing & Transactions
- ✅ Customer Order History
- ✅ Database-Driven Architecture
- ✅ Responsive Web Interface
- ✅ CRUD Operations
- ✅ Authentication & Session Management