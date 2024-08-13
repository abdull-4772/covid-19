CREATE DATABASE IF NOT EXISTS covid_19;
USE covid_19;

CREATE TABLE IF NOT EXISTS patient (
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

CREATE TABLE IF NOT EXISTS Admin (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS hospital (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact_number VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Test_Vaccination_appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    test_type ENUM('Covid Test', 'Vaccination') NOT NULL,
    reason VARCHAR(255) NOT NULL,
    appointment_date DATE NOT NULL,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Hospital_appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    test_type  ENUM('Consultation', 'Treatment', 'Other') NOT NULL,
    appointment_date DATE NOT NULL, 
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS listVaccine (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vaccine_name VARCHAR(255),  
    dose_number ENUM('First', 'Second', 'Booster'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS report (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    vaccine_id INT,
    status ENUM('Scheduled', 'Completed') DEFAULT 'Scheduled',
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    FOREIGN KEY (vaccine_id) REFERENCES listVaccine(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS test_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    result ENUM('Positive', 'Negative', 'Pending') NOT NULL,
    result_date DATETIME,
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    testdate DATE,
    Result ENUM('Positive', 'Negative', 'Pending'),
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id)
);

CREATE TABLE IF NOT EXISTS HospitalApproval (
    ApprovalID INT AUTO_INCREMENT PRIMARY KEY,
    HospitalID INT,
    ApprovedBy INT,
    ApprovedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status ENUM('Approved', 'Rejected'),
    FOREIGN KEY (HospitalID) REFERENCES hospital(id),
    FOREIGN KEY (ApprovedBy) REFERENCES Admin(AdminID)
);

CREATE INDEX idx_user_email ON patient(email);
CREATE INDEX idx_hospital_email ON hospital(email);
CREATE INDEX idx_test_vaccination_appointments_user_id ON Test_Vaccination_appointment(patient_id);
CREATE INDEX idx_test_vaccination_appointments_hospital_id ON Test_Vaccination_appointment(hospital_id);
CREATE INDEX idx_hospital_appointments_user_id ON Hospital_appointment(patient_id);
CREATE INDEX idx_hospital_appointments_hospital_id ON Hospital_appointment(hospital_id);
CREATE INDEX idx_tests_user_id ON Tests(patient_id);
CREATE INDEX idx_tests_hospital_id ON Tests(hospital_id);

CREATE INDEX idx_hospital_name ON hospital(name);
CREATE INDEX idx_hospital_address ON hospital(address);