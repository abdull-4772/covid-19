<?php
require_once __DIR__ . '/../config/Database.php';

class hospitalModel
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

        $query = "SELECT 
                    report.id,
                    patient.name AS p_name,
                    hospital.name AS h_name,
                    listVaccine.vaccine_name,
                    listVaccine.dose_number,
                    listVaccine.created_at
                    FROM `report`
                    INNER JOIN patient ON report.patient_id = patient.id
                    INNER JOIN hospital ON report.hospital_id = hospital.id
                    INNER JOIN listVaccine ON report.vaccine_id = listVaccine.id;";

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

    function getPatientAppointmentApprovel()
    {
        $query = "SELECT 
                Test_Vaccination_appointment.id,
                patient.name AS p_name,
                hospital.name AS h_name,
                Test_Vaccination_appointment.reason,
                Test_Vaccination_appointment.status,
                Test_Vaccination_appointment.appointment_date
                FROM `Test_Vaccination_appointment`
                INNER JOIN patient ON Test_Vaccination_appointment.patient_id = patient.id
                INNER JOIN hospital ON Test_Vaccination_appointment.hospital_id = hospital.id;";

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

    function updateAppointmentApprovel($id, $status)
    {
        $query = "UPDATE `Test_Vaccination_appointment` SET `status`='$status' WHERE `id`='$id'";
        $getUpdate = mysqli_query($this->conn, $query);

        if ($getUpdate !== false) {
            return true;
        } else {
            return false;
        }
        $this->db->closeConnection();
        exit;
    }

    function getTestResult()
    {
        $query = "SELECT 
        test_results.id,
        patient.name AS p_name,
        hospital.name AS h_name,
        test_results.result,
        test_results.result_date
        FROM `test_results`
        INNER JOIN patient ON test_results.patient_id = patient.id
        INNER JOIN hospital ON test_results.hospital_id = hospital.id;";

        $result = mysqli_query($this->conn, $query);
        if ($result !== false) {
            return $result;
        }
        $this->db->closeConnection();
        exit;
    }
}
