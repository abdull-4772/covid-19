<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/register.php';

class PatientRegistrationController
{
    private $db;
    private $conn;

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function register()
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $age = isset($_POST['age']) ? intval($_POST['age']) : null;
        $gender = isset($_POST['gender']) ? trim($_POST['gender']) : null;
        $address = trim($_POST['address']);
        $phone_number = trim($_POST['phone_number']);

        if (!empty($name) && !empty($email) && !empty($password) && !empty($gender)) {
            $patientModel = new PatientRegisterModel($this->conn);

            if ($patientModel->findByEmail($email)) {
                echo "Email already registered.";
            } else {
                if ($patientModel->register($name, $email, $password, $age, $gender, $address, $phone_number)) {
                    header('Location: ../patientDashboard.php');
                    echo "Registration successful.";
                    exit;
                } else {
                    echo "Registration failed. Please try again.";
                }
            }
        } else {
            echo "Please fill in all required fields.";
        }
    }



    public function login()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (!empty($email) && !empty($password)) {
            $userModel = new PatientRegisterModel($this->conn);
            $user = $userModel->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                header('Location: http://localhost/covid-19/patient/patientDashboard.php');
                exit;
            } else {
                header('Location: ../views/login.php?error=Invalid+credentials');
                exit;
            }
        } else {
            echo "Email and password are required.";
        }
    }

    public function __destruct()
    {
        $this->db->closeConnection();
    }
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new PatientRegistrationController();

        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'register') {
                $controller->register();
            } elseif ($_POST['action'] === 'login') {
                $controller->login();
            } else {
                echo "Invalid action";
            }
        } else {
            echo "No action specified";
        }

    }