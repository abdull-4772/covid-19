<?php
class adminController
{
    public function login($username, $password)
    {
        $user = trim($username);
        $pass = trim($password);

        if (!empty($user) && !empty($pass)) {
            require_once '../models/adminModel.php';
            $admin = new adminModel();
            $check = $admin->login($user, $pass);
            if ($check == true) {
                session_start();
                $_SESSION['admin_user'] = $user;
                header("Location: ../index.php");
                exit(); 
                header("Location: ../views/login.php?status=invaliduser");
                exit();
            }
        } else {
            header("Location: ../views/login.php?status=emptyfields");
            exit();
        }
    }

    public function register($username, $password)
    {
        $user = trim($username);
        $pass = trim($password);

        if (!empty($user) && !empty($pass)) {
            require_once '../models/adminModel.php';
            $admin = new adminModel();
            $check = $admin->register($user, $pass);
            if ($check == true) {
                session_start();
                $_SESSION['admin_user'] = $user;
                header("Location: ../index.php");
                exit(); 
            } else {
                header("Location: ../views/register.php?status=failed");
                exit();
            }
        }
    }
}
