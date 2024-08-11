<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $getUpdateResult = $userUpdate->update("patient", $id, $name, $email, $password, $age, $gender, $address, $phonenbr);
    if ($getUpdateResult == true) {
        header("Location: ../patient.php?status=edited");
    } else {
        header("Location: ../patient.php?status=notedited");
    }
} else {
    header("Location: ../patient.php");
}
