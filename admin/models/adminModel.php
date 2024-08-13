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
        $query = "SELECT * FROM admin WHERE Username = '$user' LIMIT 1";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) === 1) {
            $admin = mysqli_fetch_assoc($result);

            if ($pass === $admin['Password']) {
                return true;
            } else {
                return false;
            }
        } else {
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