<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/HospitalAppointment.php';
require_once __DIR__ . '/../authentication/auth.php';

class HospitalAppointmentController
{
    private $db;
    private $conn;

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function bookAppointment()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            exit();
        }

        $patientId = $_SESSION['user_id'];
        $hospitalId = intval($_POST['hospital_id']);
        $testType = trim($_POST['test_type']);
        $appointmentDate = date('Y-m-d', strtotime(trim($_POST['appointment_date'])));
        

        if ($this->validateInputs($hospitalId, $testType, $appointmentDate)) {
            $appointmentModel = new HospitalAppointmentModel($this->conn);

            if ($appointmentModel->bookAppointment($patientId, $hospitalId, $testType, $appointmentDate)) {
                header('Location: ../views/requestAppointment.php?status=success');
                exit();
            } else {
                header('Location: ../views/requestAppointment.php?status=error');
                exit();
            }
        } else {
            header('Location: ../views/requestAppointment.php?status=error');
            exit();
        }
    }

    private function validateInputs($hospitalId, $testType, $appointmentDate)
    {
        return !empty($hospitalId) && !empty($testType) && !empty($appointmentDate);
    }

    public function __destruct()
    {
        $this->db->closeConnection();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new HospitalAppointmentController();
    if (isset($_POST['action']) && $_POST['action'] === 'book') {
        $controller->bookAppointment();
    } else {
        echo "Invalid action";
    }
}
