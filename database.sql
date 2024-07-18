CREATE DATABASE covid_19;
USE covid_19;

-- User Table
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    age INT,
    gender ENUM('Male', 'Female', 'Other'),
    address VARCHAR(255),
    phone_number VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- HealthStatus Table
CREATE TABLE health_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    status ENUM('Healthy', 'Infected', 'Recovered', 'Deceased') NOT NULL,
    vaccination_status ENUM('Not Vaccinated', 'Partially Vaccinated', 'Fully Vaccinated') NOT NULL,
    test_date DATE,
    result_date DATE,
    FOREIGN KEY (user_id) REFERENCES user(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Symptoms Table
CREATE TABLE symptoms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    symptom_date DATE NOT NULL,
    symptom VARCHAR(100) NOT NULL,
    severity ENUM('Mild', 'Moderate', 'Severe') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
