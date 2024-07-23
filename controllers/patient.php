<?php
require_once "./config/Database.php";
require_once "./models/User.php";
class UserController
{

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $conn = new Database;
            $userModel = new UserModel($conn);
            $user = $userModel->login($username, $password);

            if ($user) {
                // User authenticated successfully
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user[$username];
                header('Location: /dashboard');
            } else {
                // Authentication failed
                header('Location: /login?error=Invalid+credentials');
            }
        } else {
            // Show the login form
            require 'views/login.php';
        }
    }
}
