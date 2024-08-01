
<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $db;
    private $conn;

    public function __construct()
    {
        $this->db = new Database;
        $this->conn = $this->db->getConnection();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                        header('Location: ../index.php');
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
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {
                $userModel = new UserModel($this->conn);
                $user = $userModel->findByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header('Location: http://localhost/covid-19/views/patient/welcome.php');
                    exit;
                } else {
                    header('Location: /views/patient/login.php?error=Invalid+credentials');
                    exit;
                }
            } else {
                echo "Email and password are required.";
            }
        } else {
            header('Location: /views/patient/login.php');
            exit;
        }
    }

    public function __destruct()
    {
        $this->db->closeConnection();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();
    if (isset($_POST['register'])) {
        $controller->register();
    } elseif (isset($_POST['login'])) {
        $controller->login();
    }
}
?>
