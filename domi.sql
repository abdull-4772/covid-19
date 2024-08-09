-- Hospital table data
INSERT INTO `hospital`(`name`, `address`, `contact_number`, `email`, `password`, `created_at`) VALUES 
('Greenwood Hospital', '123 Elm St', '+1234567890', 'contact@greenwoodhospital.com', 'password123', '2024-01-15'),
('Lakeside Medical Center', '456 Lakeview Dr', '+1234567891', 'info@lakesidemedical.com', 'password234', '2024-02-20'),
('Oakwood Clinic', '789 Oak St', '+1234567892', 'support@oakwoodclinic.com', 'password345', '2024-03-10'),
('Sunnydale Hospital', '101 Main St', '+1234567893', 'hello@sunnydalehospital.com', 'password456', '2024-04-25'),
('Riverbank Medical Facility', '202 River Rd', '+1234567894', 'contact@riverbankmedical.com', 'password567', '2024-05-30'),
('Westfield Health Center', '303 Westfield Ave', '+1234567895', 'info@westfieldhealth.com', 'password678', '2024-06-15'),
('Cedar Grove Hospital', '404 Cedar Dr', '+1234567896', 'support@cedargrovehospital.com', 'password789', '2024-07-10'),
('Pine Hill Clinic', '505 Pine St', '+1234567897', 'hello@pinehillclinic.com', 'password890', '2024-08-05'),


-- User table domi data 
INSERT INTO `patient`(`name`, `email`, `password`, `age`, `gender`, `address`, `phone_number`, `created_at`) VALUES 
('Alice Johnson', 'alice.johnson@example.com', 'password123', 28, 'Female', '123 Maple St', '+1234567890', '2024-01-10'),
('Bob Smith', 'bob.smith@example.com', 'password234', 34, 'Male', '456 Oak Ave', '+1234567891', '2024-02-14'),
('Charlie Brown', 'charlie.brown@example.com', 'password345', 45, 'Male', '789 Pine Rd', '+1234567892', '2024-03-05'),
('Diana Prince', 'diana.prince@example.com', 'password456', 31, 'Female', '101 Elm St', '+1234567893', '2024-04-22'),
('Emily Davis', 'emily.davis@example.com', 'password567', 26, 'Female', '202 Birch Ln', '+1234567894', '2024-05-15'),
('Frank Miller', 'frank.miller@example.com', 'password678', 40, 'Male', '303 Cedar Blvd', '+1234567895', '2024-06-01'),
('Grace Lee', 'grace.lee@example.com', 'password789', 29, 'Female', '404 Walnut St', '+1234567896', '2024-07-09'),
('Henry Wilson', 'henry.wilson@example.com', 'password890', 38, 'Male', '505 Cherry Dr', '+1234567897', '2024-08-25'),
('Ivy Moore', 'ivy.moore@example.com', 'password901', 33, 'Female', '606 Poplar Ave', '+1234567898', '2024-09-12'),
('Jack Taylor', 'jack.taylor@example.com', 'password012', 42, 'Male', '707 Ash St', '+1234567899', '2024-10-30'),
('Karen Martinez', 'karen.martinez@example.com', 'password123', 27, 'Female', '808 Maple Rd', '+1234567800', '2024-11-18'),
('Leo Harris', 'leo.harris@example.com', 'password234', 36, 'Male', '909 Oak Dr', '+1234567801', '2024-12-05'),
('Mia Anderson', 'mia.anderson@example.com', 'password345', 25, 'Female', '1010 Pine Blvd', '+1234567802', '2024-01-22'),
('Nathan King', 'nathan.king@example.com', 'password456', 41, 'Male', '1111 Elm Ln', '+1234567803', '2024-02-10'),
('Olivia Scott', 'olivia.scott@example.com', 'password567', 30, 'Female', '1212 Cedar St', '+1234567804', '2024-03-15'),
('Paul Walker', 'paul.walker@example.com', 'password678', 37, 'Male', '1313 Birch Ave', '+1234567805', '2024-04-20'),
('Quinn Adams', 'quinn.adams@example.com', 'password789', 28, 'Female', '1414 Walnut Rd', '+1234567806', '2024-05-30'),
('Rachel Lewis', 'rachel.lewis@example.com', 'password890', 32, 'Female', '1515 Cherry Blvd', '+1234567807', '2024-06-18'),
('Steve Robinson', 'steve.robinson@example.com', 'password901', 39, 'Male', '1616 Poplar St', '+1234567808', '2024-07-10'),
('Tina Carter', 'tina.carter@example.com', 'password012', 27, 'Female', '1717 Ash Ave', '+1234567809', '2024-08-22');

-- test_results table domi data 
INSERT INTO `test_results`(`user_id`, `hospital_id`, `result`, `result_date`) VALUES 
('1', '1', 'Positive', '2024-08-01');
