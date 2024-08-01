<?php
class Hospital {
    private $conn;
    private $table_name = "hospitals";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($name, $address, $location, $contact_number, $email, $password) {
        $query = "INSERT INTO " . $this->table_name . " (name, address, location, contact_number, email, password) VALUES (:name, :address, :location, :contact_number, :email, :password)";
        $stmt = $this->conn->prepare($query);

        // Sanitize and bind parameters
        $stmt->bindParam(':name', htmlspecialchars(strip_tags($name)));
        $stmt->bindParam(':address', htmlspecialchars(strip_tags($address)));
        $stmt->bindParam(':location', htmlspecialchars(strip_tags($location)));
        $stmt->bindParam(':contact_number', htmlspecialchars(strip_tags($contact_number)));
        $stmt->bindParam(':email', htmlspecialchars(strip_tags($email)));
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Hash the password

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
