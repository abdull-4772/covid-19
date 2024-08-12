<?php
require_once __DIR__ . '/../models/userModel.php';

class userController
{
    // you can Read The "Entire" Table from this Method
    public function readAll($val)
    {
        $UserCon = new userModel;
        $user = $UserCon->readAll($val);
        if ($user != false) {
            return $user;
        } else {
            return false;
        }
    }

    // you can READ The "Single" User from this Method
    function readOne($tableName, $userId)
    {
        $UserCon = new userModel;
        $user = $UserCon->readOne($tableName, $userId);
        if ($user != false) {
            return $user;
        } else {
            return false;
        }
    }

    // you can DELETE The "Single" User from this Method
    function delete($tableName, $userId)
    {
        $UserCon = new userModel;
        $user = $UserCon->delete($tableName, $userId);
        if ($user == true) {
            return true;
        } else {
            return false;
        }
    }
    function deletePatient($userId)
    {
        $UserCon = new userModel;
        $user = $UserCon->deletePatient($userId);
        if ($user == true) {
            return true;
        } else {
            return false;
        }
    }

    // you can UPDATE The "Single" User from this Method
    function update($tableName, $userId, $name, $email, $password, $age, $gender, $address, $phoneNbr)
    {
        $userModel = new userModel;
        $getResult = $userModel->update($tableName, $userId, $name, $email, $password, $age, $gender, $address, $phoneNbr);
        if ($getResult == true) {
            return true;
        } else {
            return false;
        }
    }

}
