<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/TestVaccinationAppointmentModel.php';
require_once __DIR__ . '/../authentication/auth.php';

class TestVaccinationAppointmentController
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
        $reason = trim($_POST['reason']);
        $appointmentType = trim($_POST['appointment_type']);
        $appointmentDate = date('Y-m-d', strtotime(trim($_POST['appointment_date'])));
        
        if ($this->validateInputs($hospitalId, $reason, $appointmentType, $appointmentDate)) {
            $appointmentModel = new TestVaccinationAppointmentModel($this->conn);

            if ($appointmentModel->bookAppointment($patientId, $hospitalId, $reason, $appointmentType, $appointmentDate)) {
                header('Location: ../views/requestCovidTestVaccination.php?status=success');
                exit();
            } else {
                header('Location: ../views/requestCovidTestVaccination.php?status=error');
                exit();
            }
        } else {
            header('Location: ../views/requestCovidTestVaccination.php?status=error');
            exit();
        }
    }

    private function validateInputs($hospitalId, $reason, $appointmentType, $appointmentDate)
    {
        return !empty($hospitalId) && !empty($reason) && !empty($appointmentType) && !empty($appointmentDate);
    }

    public function __destruct()
    {
        $this->db->closeConnection();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new TestVaccinationAppointmentController();
    if (isset($_POST['action']) && $_POST['action'] === 'book') {
        $controller->bookAppointment();
    } else {
        echo "Invalid action";
    }
}
?>
