NEW OFFICIAL TV - PHP / MYSQL STARTER PROJECT
=============================================

REQUIREMENTS
- XAMPP with Apache, MySQL and PHP
- VS Code
- A modern browser

INSTALLATION
1. Extract the New_Official_TV folder into:
   C:\xampp\htdocs\
2. Open XAMPP Control Panel.
3. Start Apache and MySQL.
4. Open http://localhost/phpmyadmin
5. Choose Import, select database.sql from this folder, then click Import/Go.
6. Check config/database.php. Default XAMPP settings are:
   host localhost, database new_official_tv, user root, password blank.
7. Open:
   http://localhost/New_Official_TV/

ADMIN LOGIN
URL: http://localhost/New_Official_TV/admin/login.php
Username: admin
Password: ChangeMe123!

IMPORTANT SECURITY STEP
Immediately after first login, change the default admin password before putting
the site online. This starter project is for local development and learning.
Do not publish it to the internet with the default credentials.

PAGES
- index.php: Home
- repair-services.php: Repair service list and booking form
- learn.php: Learning categories and YouTube channel
- opportunities.php: Published opportunities
- marketplace.php: Product listings
- contact.php: Contact form
- admin/: Admin dashboard and management pages

DATABASE
Repair requests and contact messages are saved in MySQL.
The admin can review bookings and messages, add products and add opportunities.

IMAGE FILES
The assets/images folder includes simple local SVG placeholder illustrations.
You can replace them with your own photos while keeping the filenames.

NOTES
- The booking form saves requests to MySQL. It does not automatically confirm appointments.
- Contact form messages are saved to MySQL; no email notification is configured.
- Marketplace product images are not uploaded through the admin form yet.
- Use accurate product prices, real opportunities and verified application links.
