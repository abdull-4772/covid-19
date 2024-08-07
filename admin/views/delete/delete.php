<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../controllers/userController.php";
    $Id = $_POST['id'];
    $userDeleteCont = new userController;
    $getDeleteResult = $userDeleteCont->delete("user", "$Id");
    if (isset($getDeleteResult)) {
        header("Location: ../users.php?status=deleted");
    } else {
        header("Location: ../users.php?status=notdeleted");
    }
} else {
    header("Location: ../users.php");
}