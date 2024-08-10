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

    function getPatientAppointmentApprovel()
    {
        $query = "SELECT 
                appointment.id,
                patient.name AS p_name,
                hospital.name AS h_name,
                appointment.test_type,
                appointment.status,
                appointment.appointment_date
                FROM `appointment`
                INNER JOIN patient ON appointment.patient_id = patient.id
                INNER JOIN hospital ON appointment.hospital_id = hospital.id;";

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
        $query = "UPDATE `appointment` SET `status`='$status' WHERE `id`='$id'";
        $getUpdate = mysqli_query($this->conn, $query);

        if ($getUpdate !== false) {
            return true;
        } else {
            return false;
        }
        $this->db->closeConnection();
        exit;
    }
}
