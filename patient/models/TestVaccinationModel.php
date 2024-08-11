<?php

class TestVaccinationAppointmentModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function bookAppointment($patient_id, $hospital_id, $reason, $appointment_type, $appointment_date)
    {
        $query = "INSERT INTO Test_Vaccination_appointment (patient_id, hospital_id, reason, appointment_type, status, appointment_date) VALUES (?, ?, ?, ?, 'Pending', ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iisss", $patient_id, $hospital_id, $reason, $appointment_type, $appointment_date);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
