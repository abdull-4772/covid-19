<?php
class SearchHospital {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getHospitalsByQuery($query) {
        $query = "%{$query}%";
        $sql = "SELECT * FROM hospital WHERE name LIKE ? OR address LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $query, $query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
