<?php
require_once '../config/Database.php';

class adminModel
{
    private $db;
    private $conn;

    function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    function login($user, $pass)
    {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();

            if ($pass === $admin['password']) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false; // Invalid credentials
            }
        } else {
            $stmt->close();
            return false; // No such user found
        }
    }

    function __destruct()
    {
        $this->conn->close();
    }
}
