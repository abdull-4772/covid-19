<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../controllers/userController.php";
    $Id = $_POST['id'];
    $userDeleteCont = new userController;
    $getDeleteResult = $userDeleteCont->delete("user", "$Id");
    if (isset($getDeleteResult)) {
        header("Location: /admin/views/users.php?status=1");
    } else {
        header("Location: /admin/views/users.php?status=0");
    }
}else{
    header("Location: /admin/views/users.php");
}