CREATE DATABASE IF NOT EXISTS new_official_tv CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE new_official_tv;

CREATE TABLE IF NOT EXISTS admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(60) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default login: admin / ChangeMe123!
INSERT IGNORE INTO admins (username,password_hash) VALUES
('admin','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

CREATE TABLE IF NOT EXISTS repair_bookings (
 id INT AUTO_INCREMENT PRIMARY KEY,
 customer_name VARCHAR(100) NOT NULL,
 phone VARCHAR(30) NOT NULL,
 email VARCHAR(190) NULL,
 device VARCHAR(80) NOT NULL,
 brand VARCHAR(80) NULL,
 service VARCHAR(120) NOT NULL,
 booking_date DATE NOT NULL,
 booking_time VARCHAR(30) NULL,
 location VARCHAR(190) NOT NULL,
 problem TEXT NOT NULL,
 status ENUM('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contact_messages (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(190) NOT NULL,
 phone VARCHAR(30) NULL,
 subject VARCHAR(150) NOT NULL,
 message TEXT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(160) NOT NULL,
 category VARCHAR(100) NOT NULL,
 description TEXT,
 price DECIMAL(12,2) NOT NULL DEFAULT 0,
 condition_label VARCHAR(50) DEFAULT 'Used',
 image VARCHAR(255) NULL,
 status ENUM('available','sold','hidden') DEFAULT 'available',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS opportunities (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(180) NOT NULL,
 organization VARCHAR(180) NOT NULL,
 category VARCHAR(80) NOT NULL,
 description TEXT NOT NULL,
 location VARCHAR(180) NULL,
 deadline DATE NULL,
 application_url VARCHAR(500) NULL,
 status ENUM('draft','published','expired') DEFAULT 'published',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS settings (
 id INT AUTO_INCREMENT PRIMARY KEY,
 setting_key VARCHAR(100) NOT NULL UNIQUE,
 setting_value TEXT
);
INSERT IGNORE INTO settings(setting_key,setting_value) VALUES
('business_name','New Official TV'),
('phone','+250 784 484 940'),
('email','moiseirakiza2@gmail.com'),
('location','Musanze, Rwanda');
