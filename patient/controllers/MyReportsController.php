<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/MyReportsModel.php';
require_once __DIR__ . '/../authentication/auth.php';

class MyReportsController
{
    private $model;

    public function __construct($conn)
    {
        $this->model = new MyReportsModel($conn);
    }

    public function getTestResults($patientId)
    {
        return $this->model->getTestResultsByPatientId($patientId);
    }

    public function getVaccinationReports($patientId)
    {
        return $this->model->getVaccinationReportsByPatientId($patientId);
    }
}

session_start();
$patientId = $_SESSION['user_id'];

$db = new Database();
$conn = $db->getConnection();
$controller = new MyReportsController($conn);

$testResults = $controller->getTestResults($patientId);
$vaccinationReports = $controller->getVaccinationReports($patientId);

// Close the database connection
$db->closeConnection();
