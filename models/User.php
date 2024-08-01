<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name, $email, $hashedPassword, $age, $gender, $address, $phone) {
        $query = "INSERT INTO `user` (name, email, password, age, gender, address, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssissi", $name, $email, $hashedPassword, $age, $gender, $address, $phone);
        return $stmt->execute();
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM `user` WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function login($email, $password) {
        $query = "SELECT * FROM `user` WHERE email = ?";
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
?>
