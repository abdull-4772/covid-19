<?php
require_once __DIR__ . '/../config/Database.php';

class MyReportsModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getTestResultsByPatientId($patientId)
    {
        $sql = "SELECT test_results.id, hospital.name as hospital_name, test_results.result, test_results.result_date
                FROM test_results
                JOIN hospital ON test_results.hospital_id = hospital.id
                WHERE test_results.patient_id = ? ORDER BY test_results.result_date DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $patientId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVaccinationReportsByPatientId($patientId)
    {
        $sql = "SELECT report.id, hospital.name as hospital_name, listVaccine.vaccine_name, report.status
                FROM report
                JOIN hospital ON report.hospital_id = hospital.id
                JOIN listVaccine ON report.vaccine_id = listVaccine.id
                WHERE report.patient_id = ? ORDER BY report.created_at DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $patientId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
