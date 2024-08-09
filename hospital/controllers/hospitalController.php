<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/hospitalModel.php';

class HospitalController
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
            $address = trim($_POST['address']);
            $contact_number = trim($_POST['contact_number']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($name) && !empty($address) && !empty($email) && !empty($password)) {
                $hospitalModel = new Hospital($this->conn);
                if ($hospitalModel->findByEmail($email)) {
                    echo "Email already registered.";
                } else {
                    if ($hospitalModel->register($name, $address, $contact_number, $email, $password)) {
                        header('Location: ../hospitalDashboard.php');
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
                $userModel = new Hospital($this->conn);
                $user = $userModel->login($email, $password);
    
                if ($user) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: ../hospitalDashboard.php');
                    exit;
                } else {
                    header('Location: ../views/hospital/login.php?error=Invalid+credentials');
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
    $controller = new HospitalController();

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