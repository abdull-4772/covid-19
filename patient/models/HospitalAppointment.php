<?php

class HospitalAppointmentModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function bookAppointment($patient_id, $hospital_id, $test_type, $appointment_date)
    {
        $query = "INSERT INTO hospital_appointment (patient_id, hospital_id, test_type, appointment_date, status) VALUES (?, ?, ?, ?, 'Pending')";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiss", $patient_id, $hospital_id, $test_type, $appointment_date);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
