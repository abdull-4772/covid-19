-- Create the database
CREATE DATABASE IF NOT EXISTS covid_19;
USE covid_19;

-- Create user table
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

-- Create Admin table
CREATE TABLE IF NOT EXISTS Admin (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    FullName VARCHAR(100),
    Email VARCHAR(100),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Hospital table
CREATE TABLE IF NOT EXISTS hospital (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    location VARCHAR(255),
    contact_number VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Appointment table
CREATE TABLE IF NOT EXISTS appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    hospital_id INT,
    appointment_date DATETIME NOT NULL,
    test_type ENUM('Covid Test', 'Vaccination') NOT NULL,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Test Results table
CREATE TABLE IF NOT EXISTS test_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    hospital_id INT,
    result ENUM('Positive', 'Negative', 'Pending') NOT NULL,
    result_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Vaccination table
CREATE TABLE IF NOT EXISTS vaccination (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    hospital_id INT,
    vaccine_name VARCHAR(100),
    dose_number ENUM('First', 'Second', 'Booster'),
    status ENUM('Scheduled', 'Completed') DEFAULT 'Scheduled',
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Tests table
CREATE TABLE IF NOT EXISTS Tests (
    TestID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    TestDate DATE,
    Result ENUM('Positive', 'Negative', 'Pending'),
    HospitalID INT,
    FOREIGN KEY (PatientID) REFERENCES user(id),
    FOREIGN KEY (HospitalID) REFERENCES hospital(id)
);

-- Create HospitalApproval table
CREATE TABLE IF NOT EXISTS HospitalApproval (
    ApprovalID INT AUTO_INCREMENT PRIMARY KEY,
    HospitalID INT,
    ApprovedBy INT,
    ApprovedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status ENUM('Approved', 'Rejected'),
    FOREIGN KEY (HospitalID) REFERENCES hospital(id),
    FOREIGN KEY (ApprovedBy) REFERENCES Admin(AdminID)
);

-- Indexes for optimization
CREATE INDEX idx_user_email ON user(email);
CREATE INDEX idx_hospital_email ON hospital(email);
CREATE INDEX idx_appointments_user_id ON appointment(user_id);
CREATE INDEX idx_appointments_hospital_id ON appointment(hospital_id);
CREATE INDEX idx_tests_user_id ON Tests(PatientID);
CREATE INDEX idx_tests_hospital_id ON Tests(HospitalID);
