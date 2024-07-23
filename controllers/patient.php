<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $db;
    private $conn;
    function __construct()
    {
        $this->db = new Database;
        $this->conn = $this->db->getConnection();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {
                $userModel = new UserModel($this->conn);
                $user = $userModel->login($email, $password);

                if ($user) {
                    // User authenticated successfully
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user[$email];

                    // need to correct this path <<<<<<<<<<<<<<<<<<
                    header('Location: ../views/patient/welcome.php');
                    exit;
                } else {

                    // Authentication failed
                    // need to correct this path <<<<<<<<<<<<<<<<<<
                    header('Location: ../views/patient/login.php?error=Invalid+credentials');
                    $this->db->closeConnection();
                    exit;
                }
            }
        } else {

            // Show the login form
            header('Location: /login.php');
            $this->db->closeConnection();
            exit;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserCon = new UserController;
    $UserCon->login();
}
