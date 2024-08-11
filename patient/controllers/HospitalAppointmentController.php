<?php

require_once '../controllers/HospitalAppointmentController.php';

class HospitalAppointmentController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new HospiatlAppointment($db);
    }

    public function bookAppointment()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $patient_id = $_POST['patient_id']; // Retrieve patient ID from session or input
            $hospital_id = $_POST['hospital'];
            $appointment_date = $_POST['appointment_date'];
            $test_type = $_POST['test_type'];

            $isBooked = $this->model->bookAppointment($patient_id, $hospital_id, $appointment_date, $test_type);

            if ($isBooked) {
                header("Location: ../views/requestAppointment.php?status=success");
            } else {
                header("Location: ../views/requestAppointment.php?status=error");
            }
        }
    }
}

// Assuming you have a database connection in $db
$controller = new HospitalAppointmentController($db);
$controller->bookAppointment();

