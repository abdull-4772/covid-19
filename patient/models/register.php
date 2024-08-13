<?php
class PatientRegisterModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($name, $email, $password, $age, $gender, $address, $phone_number)
    {
        $query = "INSERT INTO patient (name, email, password, age, gender, address, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("sssisss", $name, $email, $hashedPassword, $age, $gender, $address, $phone_number);

        if ($stmt->execute()) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userId = $stmt->insert_id;
            $_SESSION['user_id'] = $userId;
            return true;
        } else {
            return false;
        }
    }


    public function findByEmail($email)
    {
        $query = "SELECT * FROM patient WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM patient WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
