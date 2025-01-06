# Retail System
This repository contains the code for an Inventory Management System implemented with PHP and MySQL. The application allows administrators to manage users, products, categories, and sales, while ensuring a secure environment through best practices in security, including input validation, password security, role-based access control (RBAC), and session management.

**Features**
-User Management: Admin can add, edit, and delete users.
-Product Management: Admin can add, edit, view, and delete products.
-Category Management: Manage product categories.
-Security Features: Input validation, password hashing, RBAC, session management, and error suppression.
-Responsive Design: Compatible with all devices through a mobile-first, responsive design.

**Technologies Used**
Backend: PHP
Database: MySQL
Frontend: HTML, CSS, JavaScript (Bootstrap 4)
Security: Password hashing with bcrypt, Prepared statements to prevent SQL Injection, Role-Based Access Control (RBAC), Session Management.

**Prerequisites**
PHP: Version 7 or above
MySQL: Version 5.6 or above
Web Server: Apache or Nginx
XAMPP/WAMP: For local development (includes PHP, MySQL, and Apache)

**Installation**
Follow the steps below to get the system running on your local machine:

**Clone the repository:**
bash
Copy code
git clone https://github.com/your-username/inventory-management-system.git

**Set up your web server:**
If you are using XAMPP, copy the project folder to C:\xampp\htdocs\ (or the corresponding folder for your operating system).
If using a different setup, place the folder in the root directory of your server.

**Create the database:**
Open your PHPMyAdmin or MySQL client and create a new database:
sql
Copy code
CREATE DATABASE inventory_system;
Import the provided SQL dump to create necessary tables and populate them with sample data.

**Configuration:**
Navigate to includes/load.php and set your database credentials.
Example:
php
Copy code
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'inventory_system');

**Access the Application:**
Open your browser and navigate to http://localhost/inventory-management-system (or the equivalent path based on your server setup).

**Security Measures
The system has the following security measures implemented:**

Input Validation: All user inputs are sanitized and validated using mysqli_real_escape_string() to prevent SQL injection.
Password Hashing: Passwords are hashed using bcrypt (password_hash() and password_verify()).
Role-Based Access Control (RBAC): User access levels are checked to ensure users can only access allowed resources.
Session Management: User sessions are used to manage login status securely.
Error Suppression: Error messages are suppressed in production to prevent exposure of sensitive data.
Regular Login Updates: User login times are tracked for security purposes.
Usage


******************************************************************************************************************************
**Login details**
Username : admin
Password : admin
******************************************************************************************************************************
