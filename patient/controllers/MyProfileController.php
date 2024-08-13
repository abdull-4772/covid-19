<?php
require_once __DIR__ . '/../models/MyProfileModel.php';
require_once __DIR__ . '/../authentication/auth.php';

class ManageProfileController
{
    private $model;

    public function __construct()
    {
        $this->model = new PatientModel();
    }

    public function getProfile($patientId)
    {
        return $this->model->getPatientById($patientId);
    }

    public function updateProfile($patientId, $name, $address, $phone)
    {
        return $this->model->updatePatientProfile($patientId, $name, $address, $phone);
    }

    public function deleteProfile($patientId)
    {
        return $this->model->deletePatientProfile($patientId);
    }
}


$patientId = $_SESSION['user_id'];
$controller = new ManageProfileController();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['address'], $_POST['phone'])) {
        $controller->updateProfile($patientId, $_POST['name'], $_POST['address'], $_POST['phone']);
        header("Location: ../views/manageProfile.php");
    } elseif (isset($_POST['delete'])) {
        $controller->deleteProfile($patientId);
        session_destroy();
        header("Location: ../views/logout.php");
        exit;
    }
}

// Fetch the profile data to be displayed in the form
$profile = $controller->getProfile($patientId);
