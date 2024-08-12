<?php

class TestVaccinationAppointmentModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function bookAppointment($patientId, $hospitalId, $reason, $appointmentType, $appointmentDate)
    {
        $query = "INSERT INTO Test_Vaccination_appointment (patient_id, hospital_id, reason, test_type, appointment_date, status) VALUES (?, ?, ?, ?, ?, 'Pending')";
        $stmt = $this->conn->prepare($query);
    
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->conn->error;
            return false;
        }
    
        $stmt->bind_param("iisss", $patientId, $hospitalId, $reason, $appointmentType, $appointmentDate);
    
        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
            return false;
        }
    
        $stmt->close();
        return true;
    }
    
}
