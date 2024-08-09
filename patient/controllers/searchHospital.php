<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/SearchHospital.php';

class SearchHospitalController {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function searchHospitals() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../views/login.php');
            exit;
        }

        $query = isset($_GET['query']) ? trim($_GET['query']) : '';

        $hospitalModel = new SearchHospital($this->conn);
        $hospitals = $hospitalModel->getHospitalsByQuery($query);

        include '../views/searchHospitals.php';
    }

    public function __destruct() {
        $this->db->closeConnection();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new SearchHospitalController();
    $controller->searchHospitals();
}
