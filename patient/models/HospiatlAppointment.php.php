<?php

class HospiatlAppointment
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function bookAppointment($patient_id, $hospital_id, $appointment_date, $test_type)
    {
        $query = "INSERT INTO Hospiatl_appointment (patient_id, hospital_id, appointment_date, test_type) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiss", $patient_id, $hospital_id, $appointment_date, $test_type);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
