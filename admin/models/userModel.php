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
        exit;
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
        exit;
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
        exit;
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
        exit;
    }
}
