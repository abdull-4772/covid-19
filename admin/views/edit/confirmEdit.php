<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once "../../controllers/userController.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phonenbr = $_POST['phonenumber'];

    $userUpdate = new userController;
    $getUpdateResult = $userUpdate->update("user", $id, $name, $email, $password, $age, $gender, $address, $phonenbr);
    if ($getUpdateResult == true) {
        header("Location: /admin/views/users.php?status=1");
    } else {
        header("Location: /admin/views/users.php?status=0");
    }
} else {
    header("Location: /admin/views/users.php");
}
