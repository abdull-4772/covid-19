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
-- Create Admin table
CREATE TABLE Admin (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    FullName VARCHAR(100),
    Email VARCHAR(100),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Hospital table
CREATE TABLE Hospital (
    HospitalID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Address VARCHAR(255),
    Location VARCHAR(100),
    PhoneNumber VARCHAR(15),
    Email VARCHAR(100) UNIQUE,
    RegisteredAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ApprovedByAdmin BOOLEAN DEFAULT FALSE
);

-- Create Patient table
CREATE TABLE Patient (
    PatientID INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(100),
    Address VARCHAR(255),
    PhoneNumber VARCHAR(15),
    Email VARCHAR(100) UNIQUE,
    DateOfBirth DATE,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Appointments table
CREATE TABLE Appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    HospitalID INT,
    AppointmentDate DATE,
    AppointmentType ENUM('Test', 'Vaccination'),
    Status ENUM('Pending', 'Approved', 'Rejected', 'Completed'),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (PatientID) REFERENCES Patient(PatientID),
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID)
);

-- Create Vaccinations table
CREATE TABLE Vaccinations (
    VaccinationID INT AUTO_INCREMENT PRIMARY KEY,
    VaccineName VARCHAR(100),
    Manufacturer VARCHAR(100),
    AvailableQuantity INT DEFAULT 0,
    HospitalID INT,
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID)
);

-- Create Tests table
CREATE TABLE Tests (
    TestID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    TestDate DATE,
    Result ENUM('Positive', 'Negative', 'Pending'),
    HospitalID INT,
    FOREIGN KEY (PatientID) REFERENCES Patient(PatientID),
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID)
);

-- Create HospitalApproval table
CREATE TABLE HospitalApproval (
    ApprovalID INT AUTO_INCREMENT PRIMARY KEY,
    HospitalID INT,
    ApprovedBy INT,
    ApprovedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status ENUM('Approved', 'Rejected'),
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID),
    FOREIGN KEY (ApprovedBy) REFERENCES Admin(AdminID)
);

-- Indexes for optimization
CREATE INDEX idx_patient_email ON Patient(Email);
CREATE INDEX idx_hospital_email ON Hospital(Email);
CREATE INDEX idx_appointments_patient_id ON Appointments(PatientID);
CREATE INDEX idx_appointments_hospital_id ON Appointments(HospitalID);
CREATE INDEX idx_tests_patient_id ON Tests(PatientID);
CREATE INDEX idx_tests_hospital_id ON Tests(HospitalID);
