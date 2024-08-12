<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../controllers/userController.php";
    $Id = $_POST['id'];
    $userDeleteCont = new userController;
    $getDeleteResult = $userDeleteCont->deletePatient("$Id");
    if (isset($getDeleteResult)) {
        header("Location: ../patient.php?status=deleted");
    } else {
        header("Location: ../patient.php?status=notdeleted");
    }
} else {
    header("Location: ../patient.php");
}