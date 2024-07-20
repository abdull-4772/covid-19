<?php
require_once 'DatabaseConnection.php';
require_once 'Database.php';

$db = new Database();

$sql = "
CREATE DATABASE IF NOT EXISTS covid_19;
USE covid_19;

CREATE TABLE IF NOT EXISTS user (
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

CREATE TABLE IF NOT EXISTS health_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    status ENUM('Healthy', 'Infected', 'Recovered', 'Deceased') NOT NULL,
    vaccination_status ENUM('Not Vaccinated', 'Partially Vaccinated', 'Fully Vaccinated') NOT NULL,
    test_date DATE,
    result_date DATE,
    FOREIGN KEY (user_id) REFERENCES user(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS symptoms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    symptom_date DATE NOT NULL,
    symptom VARCHAR(100) NOT NULL,
    severity ENUM('Mild', 'Moderate', 'Severe') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

try {
    $db->query($sql);
    echo "Database and tables created successfully.";

    $user_data = [
        ['name' => 'Abdull', 'email' => 'abdull@gmail.com', 'password' => '12345', 'age' => 23, 'gender' => 'Male', 'address' => 'Shanti Nagar', 'phone_number' => '03332649646'],
    ];

    foreach ($user_data as $user) {
        $db->insert('user', $user);
    }

} catch (Exception $e) {
    echo "Error creating database or tables: " . $e->getMessage();
}