<?php
class adminController
{
    public function login($username, $password)
    {
        $user = trim($username);
        $pass = trim($password);

        if (!empty($user) && !empty($pass)) {
            // Prepare the SQL statement to prevent SQL injection
            require_once '../models/adminModel.php';
            $admin = new adminModel();
            $check = $admin->login($user, $pass);
            if ($check == true) {
                session_start();
                $_SESSION['admin_user'] = $user;
                header("Location: ../index.php");
                exit(); // Stop further execution after redirect
            } else {
                header("Location: ../views/login.php?status=invaliduser");
                exit();
            }
        } else {
            header("Location: ../views/login.php?status=emptyfields");
            exit();
        }
    }
}
