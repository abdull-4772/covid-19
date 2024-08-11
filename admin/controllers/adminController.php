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
            $admin = new adminModel;
            $check =  $admin->login($user, $pass);
            if ($check == true) {
                session_start();
                $_SESSION['admin_user'] = $user;
            }
        } else {
            // Please fill in all fields
        }
    }
}
