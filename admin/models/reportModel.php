<?php
require_once __DIR__ . '/../config/Database.php';

class reportModel
{
    private $db;
    private $conn;
    function __construct()
    {
        $this->db = new Database;
        $this->conn = $this->db->getConnection();
    }

    public function getReportData()
    {
        // $query = "SELECT 
        //             test_results.id, 
        //             patient.name AS user_name, 
        //             test_results.result, 
        //             test_results.result_date, 
        //             hospital.name AS hospital_name 
        //             FROM test_results
        //             INNER JOIN user ON test_results.patient_id = patient.id
        //             INNER JOIN hospital ON test_results.hospital_id = hospital.id";
        $query = "SELECT 
                    report.id,
                    patient.name AS p_name,
                    hospital.name AS h_name,
                    listvaccine.vaccine_name,
                    listvaccine.dose_number,
                    listvaccine.created_at
                    FROM `report`
                    INNER JOIN patient ON report.user_id = patient.id
                    INNER JOIN hospital ON report.hospital_id = hospital.id
                    INNER JOIN listvaccine ON report.vaccine_id = listvaccine.id;";

        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception("Query failed: " . mysqli_error($this->conn));
        }
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $data;
        $this->db->closeConnection();
        exit;
    }
}
