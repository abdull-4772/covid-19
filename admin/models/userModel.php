<?php
require_once __DIR__ . '/../config/Database.php';

class userModel
{
    private $db;
    private $conn;
    function __construct()
    {
        $this->db = new Database;
        $this->conn = $this->db->getConnection();
    }

    function readAll($val)
    {
        $query = "SELECT * FROM `$val` WHERE 1";
        $getUser = mysqli_query($this->conn, $query);
        if ($getUser !== false) {
            return $getUser;
        } else {
            return false;
        }
        $this->db->closeConnection();
    }

    function readOne($tableName, $userId)
    {
        $query = "SELECT * FROM `$tableName` WHERE `id`='$userId'";
        $getUser = mysqli_query($this->conn, $query);
        if ($getUser !== false) {
            return $getUser;
        } else {
            return false;
        }
        $this->db->closeConnection();
    }

    function delete($tableName, $userId)
    {
        $query = "DELETE FROM `$tableName` WHERE `id`='$userId'";
        $getUser = mysqli_query($this->conn, $query);
        if ($getUser !== false) {
            return true;
        } else {
            return false;
        }
        $this->db->closeConnection();
    }
    function deletePatient($userId)
    {
        $query = "DELETE FROM hospital_appointment WHERE patient_id = $userId;
                  DELETE FROM Test_Vaccination_appointment WHERE patient_id = $userId;
                  DELETE FROM report WHERE patient_id = $userId;
                  DELETE FROM test_results WHERE patient_id = $userId;
                  DELETE FROM Tests WHERE patient_id = $userId;
                  DELETE FROM patient WHERE id = $userId;";

        // Enable multiple statements
        mysqli_multi_query($this->conn, $query);

        // Check the result of the multi-query execution
        do {
            if ($result = mysqli_store_result($this->conn)) {
                mysqli_free_result($result);
            }
        } while (mysqli_next_result($this->conn));

        // Check if there was an error in any of the queries
        if (mysqli_errno($this->conn)) {
            return false;
        }

        return true;
        $this->db->closeConnection();
    }

    function update($tableName, $userId, $name, $email, $password, $age, $gender, $address, $phoneNbr)
    {
        $query = "UPDATE `$tableName` SET `name`='$name',`email`='$email',`password`='$password',`age`='$age',`gender`='$gender',`address`='$address',`phone_number`='$phoneNbr' WHERE `id`='$userId'";
        $getUser = mysqli_query($this->conn, $query);
        if ($getUser == true) {
            return true;
        } else {
            return false;
        }
        $this->db->closeConnection();
    }
}
