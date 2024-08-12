<?php
require_once '../models/MyAppointmentModel.php';
require_once '../authentication/auth.php';

class MyAppointmentsController {
    private $model;

    public function __construct($conn) {
        $this->model = new MyAppointmentsModel($conn);
    }

    public function getAppointments($patientId) {
        return $this->model->getAppointmentsByPatientId($patientId);
    }
}

$conn = mysqli_connect('localhost', 'root', '', 'covid_19');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$patientId = $_SESSION['user_id'];
$controller = new MyAppointmentsController($conn);
$appointments = $controller->getAppointments($patientId);

mysqli_close($conn);
?>
