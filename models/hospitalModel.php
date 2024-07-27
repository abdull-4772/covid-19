<?php
class Hospital {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function register($name, $address, $location, $contact_number, $email, $password) {
        $query = "INSERT INTO hospitals (name, address, location, contact_number, email, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("sssiss", $name, $address, $location, $contact_number, $email, $hashedPassword);
        return $stmt->execute();
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM hospitals WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateTestResult($patientId, $testResult) {
        $query = "UPDATE patients SET covid_test_result = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $testResult, $patientId);
        return $stmt->execute();
    }

    public function updateVaccinationStatus($patientId, $status) {
        $query = "UPDATE patients SET vaccination_status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status, $patientId);
        return $stmt->execute();
    }

    public function getPatientDetails($hospitalId) {
        $query = "SELECT * FROM patients WHERE hospital_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $hospitalId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
