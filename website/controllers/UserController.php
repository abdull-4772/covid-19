<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    private $conn;
    private $database;

    public function __construct()
    {
        $this->database = new Database();
        $this->conn = $this->database->getConnection();

    }

    public function register()
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $age = trim($_POST['age']);
        $gender = trim($_POST['gender']);
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone_number']);

        if (!empty($name) && !empty($email) && !empty($password) && !empty($gender)) {
            $userModel = new UserModel($this->conn);
            if ($userModel->findByEmail($email)) {
                echo "Email already registered.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                if ($userModel->create($name, $email, $hashedPassword, $age, $gender, $address, $phone)) {
                    echo "Registration successful.";
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
            $userModel = new UserModel($this->conn);
            $user = $userModel->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                header('Location: ../views/welcome.php');
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
        $this->database->closeConnection();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();

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
