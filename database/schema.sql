-- Biyahero Database Schema
-- Create database and tables for user authentication, subscriptions, and fare data

CREATE DATABASE IF NOT EXISTS biyahero_db;
USE biyahero_db;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Subscriptions table
CREATE TABLE IF NOT EXISTS subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    plan ENUM('free', 'basic', 'premium') DEFAULT 'free',
    subscription_status ENUM('new', 'trial', 'active', 'expired') DEFAULT 'new',
    trial_start_date DATETIME,
    trial_end_date DATETIME,
    payment_date DATETIME,
    payment_amount DECIMAL(10, 2),
    ad_count INT DEFAULT 0,
    fare_calc_count INT DEFAULT 0,
    trial_activated BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_status (subscription_status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Fare routes table (for storing route data)
CREATE TABLE IF NOT EXISTS fare_routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    origin VARCHAR(255) NOT NULL,
    destination VARCHAR(255) NOT NULL,
    mode ENUM('jeepney', 'tricycle', 'multicab', 'bus', 'uv') NOT NULL,
    base_fare DECIMAL(10, 2) NOT NULL,
    fare_range_low DECIMAL(10, 2),
    fare_range_high DECIMAL(10, 2),
    travel_time VARCHAR(50),
    steps TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_origin_destination (origin, destination),
    INDEX idx_mode (mode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- User sessions table (for authentication)
CREATE TABLE IF NOT EXISTS user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    session_token VARCHAR(255) UNIQUE NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_session_token (session_token),
    INDEX idx_expires (expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample fare data (SJDM routes)
INSERT INTO fare_routes (origin, destination, mode, base_fare, fare_range_low, fare_range_high, travel_time, steps) VALUES
('SJDM Poblacion', 'SM Fairview', 'jeepney', 18.00, 15.00, 25.00, '20-35 min', 'SJDM Poblacion → Tungko Terminal → SM Fairview'),
('SJDM Poblacion', 'SM Fairview', 'tricycle', 45.00, 38.00, 58.00, '18-30 min', 'SJDM Poblacion → Direct to SM Fairview'),
('Tungko Terminal', 'SM Fairview', 'jeepney', 13.00, 11.00, 18.00, '15-25 min', 'Tungko Terminal → SM Fairview'),
('Tungko Terminal', 'SM Fairview', 'uv', 28.00, 24.00, 35.00, '22-40 min', 'Tungko Terminal → SM Fairview'),
('SJDM Poblacion', 'Tungko Terminal', 'jeepney', 13.00, 11.00, 15.00, '10-15 min', 'SJDM Poblacion → Tungko Terminal'),
('SJDM Poblacion', 'Tungko Terminal', 'tricycle', 35.00, 30.00, 45.00, '8-12 min', 'SJDM Poblacion → Tungko Terminal'),
('Gumaok', 'Tungko Terminal', 'jeepney', 13.00, 11.00, 15.00, '12-18 min', 'Gumaok → Tungko Terminal'),
('Gumaok', 'Tungko Terminal', 'tricycle', 40.00, 35.00, 50.00, '10-15 min', 'Gumaok → Tungko Terminal'),
('Mina', 'Tungko Terminal', 'jeepney', 13.00, 11.00, 15.00, '10-15 min', 'Mina → Tungko Terminal'),
('Mina', 'Tungko Terminal', 'tricycle', 38.00, 32.00, 48.00, '8-12 min', 'Mina → Tungko Terminal'),
('San Manuel', 'Tungko Terminal', 'jeepney', 13.00, 11.00, 15.00, '15-20 min', 'San Manuel → Tungko Terminal'),
('San Manuel', 'Tungko Terminal', 'tricycle', 42.00, 36.00, 52.00, '12-18 min', 'San Manuel → Tungko Terminal'),
('SJDM Poblacion', 'Quezon City', 'bus', 32.00, 28.00, 40.00, '25-45 min', 'SJDM Poblacion → Quezon City'),
('SJDM Poblacion', 'Quezon City', 'uv', 28.00, 24.00, 35.00, '22-40 min', 'SJDM Poblacion → Quezon City'),
('Tungko Terminal', 'Quezon City', 'bus', 32.00, 28.00, 40.00, '25-45 min', 'Tungko Terminal → Quezon City'),
('Tungko Terminal', 'Quezon City', 'uv', 28.00, 24.00, 35.00, '22-40 min', 'Tungko Terminal → Quezon City');
