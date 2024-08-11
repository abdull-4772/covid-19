<?php
class adminModel
{
    private $db;
    private $conn;
    function __construct()
    {
        $this->db = new Database;
        $this->conn = $this->db->getConnection();
    }

    function login($user, $pass)
    {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();

            if (password_verify($pass, $admin['password'])) {
               return true;
                // Redirect to admin panel or dashboard
            } else {
                // Invalid credentials
            }
        } else {
            // No such user found
        }
        $stmt->close();
    }
}
