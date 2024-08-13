<?php
require_once __DIR__ . '/../config/Database.php';

class PatientModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getPatientById($patientId)
    {
        $query = "SELECT id, name, email, age, gender, address, phone_number FROM patient WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $patientId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePatientProfile($patientId, $name, $address, $phone)
    {
        $query = "UPDATE patient SET name = ?, address = ?, phone_number = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $name, $address, $phone, $patientId);
        return $stmt->execute();
    }

    public function deletePatientProfile($patientId)
    {
        $query = "DELETE FROM patient WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $patientId);
        return $stmt->execute();
    }
}
