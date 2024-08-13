-- Insert data into Admin table
INSERT INTO Admin (Username, Password, FullName, Email) VALUES
('admin1', 'adminPass1', 'Admin One', 'admin1@example.com'),
('admin2', 'adminPass2', 'Admin Two', 'admin2@example.com'),
('admin3', 'adminPass3', 'Admin Three', 'admin3@example.com');

-- Insert data into patient table
INSERT INTO patient (name, email, password, age, gender, address, phone_number) VALUES
('John Doe', 'john.doe@example.com', 'password123', 30, 'Male', '123 Main St', '1234567890'),
('Jane Smith', 'jane.smith@example.com', 'password123', 25, 'Female', '456 Oak St', '0987654321'),
('Alice Johnson', 'alice.j@example.com', 'password123', 40, 'Female', '789 Pine St', '5555555555');

-- Insert data into hospital table
INSERT INTO hospital (name, address, contact_number, email, password) VALUES
('General Hospital', '123 Health St', '1111111111', 'hospital1@example.com', 'hospitalPass1'),
('City Hospital', '456 Care Ave', '2222222222', 'hospital2@example.com', 'hospitalPass2'),
('Community Hospital', '789 Wellness Blvd', '3333333333', 'hospital3@example.com', 'hospitalPass3');

-- Insert data into Test_Vaccination_appointment table
INSERT INTO Test_Vaccination_appointment (patient_id, hospital_id, appointment_date, reason, status) VALUES
(1, 1, '2024-08-20 09:00:00', 'Covid-19 Test', 'Pending'),
(2, 2, '2024-08-22 11:00:00', 'Vaccination', 'Approved'),
(3, 3, '2024-08-24 14:00:00', 'Booster Dose', 'Rejected');

-- Insert data into Hospital_appointment table
INSERT INTO Hospital_appointment (patient_id, hospital_id, appointment_date, test_type, status) VALUES
(1, 1, '2024-08-15 10:00:00', 'Covid Test', 'Pending'),
(2, 2, '2024-08-16 11:00:00', 'Vaccination', 'Approved'),
(3, 3, '2024-08-17 12:00:00', 'Covid Test', 'Rejected');

-- Insert data into listVaccine table
INSERT INTO listVaccine (vaccine_name, dose_number) VALUES
('Pfizer', 'First'),
('Moderna', 'Second'),
('AstraZeneca', 'Booster');

-- Insert data into report table
INSERT INTO report (patient_id, hospital_id, vaccine_id, status) VALUES
(1, 1, 1, 'Scheduled'),
(2, 2, 2, 'Completed'),
(3, 3, 3, 'Scheduled');

-- Insert data into test_results table
INSERT INTO test_results (patient_id, hospital_id, result, result_date) VALUES
(1, 1, 'Positive', '2024-08-10 10:00:00'),
(2, 2, 'Negative', '2024-08-11 11:00:00'),
(3, 3, 'Pending', '2024-08-12 12:00:00');

-- Insert data into Tests table
INSERT INTO Tests (patient_id, hospital_id, testdate, Result) VALUES
(1, 1, '2024-08-05', 'Positive'),
(2, 2, '2024-08-06', 'Negative'),
(3, 3, '2024-08-07', 'Pending');

-- Insert data into HospitalApproval table
INSERT INTO HospitalApproval (HospitalID, ApprovedBy, Status) VALUES
(1, 1, 'Approved'),
(2, 2, 'Rejected'),
(3, 3, 'Approved');
