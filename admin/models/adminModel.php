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
                return false; 
            }
        } else {
            $stmt->close();
            return false; 
        }
    }

    function register($user, $pass)
    {
        $query = "INSERT INTO `admin`(`Username`, `Password`) VALUES ('$user', '$pass');";
        $result = mysqli_query($this->conn, $query);


        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    function __destruct()
    {
        $this->conn->close();
    }
}


