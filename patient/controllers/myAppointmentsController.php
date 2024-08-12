<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/MyAppointmentModel.php';
require_once __DIR__ . '/../authentication/auth.php';

class MyAppointmentsController
{
    private $db;
    private $conn;
    private $model;

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
        $this->model = new MyAppointmentsModel($this->conn);
    }

    public function getHospitalAppointments($patientId)
    {
        return $this->model->getHospitalAppointmentsByPatientId($patientId);
    }

    public function getTestVaccinationAppointments($patientId)
    {
        return $this->model->getTestVaccinationAppointmentsByPatientId($patientId);
    }

    public function __destruct()
    {
        $this->db->closeConnection();
    }
}


$patientId = $_SESSION['user_id'];
$controller = new MyAppointmentsController();

$hospitalAppointments = $controller->getHospitalAppointments($patientId);
$testVaccinationAppointments = $controller->getTestVaccinationAppointments($patientId);
