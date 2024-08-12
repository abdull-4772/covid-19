-- Create the database
CREATE DATABASE IF NOT EXISTS covid_19;
USE covid_19;

-- Create "ADMIN" table
CREATE TABLE admin (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create "PATIENT" table
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

-- Create "HOSPITAL" table
CREATE TABLE IF NOT EXISTS hospital (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact_number VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create "TEST_VACCINATION_APPOINTMENT" table
CREATE TABLE IF NOT EXISTS Test_Vaccination_appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    reason VARCHAR(255) NOT NULL,
    appointment_type ENUM('Covid_Test', 'Vaccination'),
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    appointment_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id)
);



-- Create "HOSPITAL_APPOINTMENT" table
CREATE TABLE IF NOT EXISTS Hospital_appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    appointment_date DATE NOT NULL,
    test_type ENUM('Consultation', 'Treatment', 'Other') NOT NULL,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id)
);


-- Create "LIST_OF_VACCINE" table
CREATE TABLE IF NOT EXISTS List_of_Vaccine (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vaccine_name VARCHAR(255),  
    dose_number ENUM('First', 'Second', 'Booster'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create "REPORT" table
CREATE TABLE IF NOT EXISTS report (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    vaccine_id INT,
    status ENUM('Scheduled', 'Completed') DEFAULT 'Scheduled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    FOREIGN KEY (vaccine_id) REFERENCES List_of_Vaccine(id)
);

-- Create "TEST_RESULT" table
CREATE TABLE IF NOT EXISTS test_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
    result ENUM('Positive', 'Negative', 'Pending') NOT NULL,
    result_date DATETIME,
<<<<<<< HEAD
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
=======
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id)
>>>>>>> f16a80e020768911b1d52fcb3b5d28663a5c1af3
);

-- Create "TESTS" table
CREATE TABLE IF NOT EXISTS tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    hospital_id INT,
<<<<<<< HEAD
    testdate DATE,
    Result ENUM('Positive', 'Negative', 'Pending'),
=======
    test_date DATE,
    result ENUM('Positive', 'Negative', 'Pending'),
>>>>>>> f16a80e020768911b1d52fcb3b5d28663a5c1af3
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (hospital_id) REFERENCES hospital(id)
);

-- Create "HOSPITAL_APPROVAL" table
 


-- Indexes for optimization
CREATE INDEX idx_patient_email ON patient(email);
CREATE INDEX idx_hospital_email ON hospital(email);
<<<<<<< HEAD
CREATE INDEX idx_appointments_user_id ON appointment(patient_id);
CREATE INDEX idx_appointments_hospital_id ON appointment(hospital_id);
=======
CREATE INDEX idx_hospital_appointment_patient_id ON Hospital_appointment(patient_id);
CREATE INDEX idx_hospital_appointment_hospital_id ON Hospital_appointment(hospital_id);
>>>>>>> f16a80e020768911b1d52fcb3b5d28663a5c1af3
CREATE INDEX idx_tests_patient_id ON tests(patient_id);
CREATE INDEX idx_tests_hospital_id ON tests(hospital_id);

-- Indexes on hospital name and address for faster search
CREATE INDEX idx_hospital_name ON hospital(name);
CREATE INDEX idx_hospital_address ON hospital(address);
