<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Hospital.php';

class HospitalController
{
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $location = trim($_POST['location']);
            $contact_number = trim($_POST['contact_number']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($name) && !empty($address) && !empty($location) && !empty($email) && !empty($password)) {
                $hospitalModel = new Hospital($this->conn);
                if ($hospitalModel->findByEmail($email)) {
                    echo "Email already registered.";
                } else {
                    if ($hospitalModel->register($name, $address, $location,  $contact_number , $email, $password)) {
                        echo "Registration successful.";
                        header('Location: /views/hospital/welcome.php');
                        exit;
                    } else {
                        echo "Registration failed. Please try again.";
                    }
                }
            } else {
                echo "Please fill in all required fields.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {
                $hospitalModel = new Hospital($this->conn);
                $hospital = $hospitalModel->findByEmail($email);

                if ($hospital && password_verify($password, $hospital['password'])) {
                    session_start();
                    $_SESSION['hospital_id'] = $hospital['id'];
                    $_SESSION['hospital_name'] = $hospital['name'];
                    header('Location: /views/hospital/welcome.php');
                    exit;
                } else {
                    echo "Invalid email or password.";
                }
            } else {
                echo "Email and password are required.";
            }
        }
    }

    public function __destruct() {
        $this->db->closeConnection();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new HospitalController();
    if (isset($_POST['register'])) {
        $controller->register();
    } elseif (isset($_POST['login'])) {
        $controller->login();
    }
}
?>
