<?php
class UserModel{

    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function login($email, $password){
        $query = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
        $result= mysqli_query($this->conn, $query);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                return true;
            }else{
                return false;
            }
        }
    }
}