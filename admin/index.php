<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("Location: ./views/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Hospital Admin Dashboard</title>
</head>

<body>
    <?php require_once './views/partial/sidebarHead.php'; ?>
    <div class="dashmain">
        <div class="container">
            <h1>Admin Dashboard</h1>

            <div class="dashboard">
                <div class="box">
                    <h2>Total Patients</h2>
                    <p id="totalUsers"> <?php
                                        require_once './controllers/userController.php';

                                        $user_con = new userController;
                                        $all_users = $user_con->readAll("patient");
                                        $user_array = [];

                                        while ($row = $all_users->fetch_assoc()) {
                                            $user_array[] = $row['id'];
                                        }

                                        // Check if the result is an array and then count the users
                                        if (is_array($user_array)) {
                                            echo count($user_array);
                                        } else {
                                            echo "0"; // In case readAll doesn't return an array, display 0
                                        }
                                        ?></p>
                </div>

                <div class="box">
                    <h2>Total Hospitals</h2>
                    <p id="totalHospitals"><?php
                                            $report_con = new userController;
                                            $all_report = $report_con->readAll("hospital");
                                            $user_array = [];

                                            while ($row = $all_report->fetch_assoc()) {
                                                $user_array[] = $row['id'];
                                            }
                                            if (is_array($user_array)) {
                                                echo count($user_array);
                                            } else {
                                                echo "0";
                                            }
                                            ?></p>
                </div>
                <div class="box">
                    <h2>Total Vaccine</h2>
                    <p id="totalPatients"><?php
                                            $user_con = new userController;
                                            $all_users = $user_con->readAll("listVaccine");
                                            $user_array = [];

                                            while ($row = $all_users->fetch_assoc()) {
                                                $user_array[] = $row['id'];
                                            }

                                            if (is_array($user_array)) {
                                                echo count($user_array);
                                            } else {
                                                echo "0";
                                            }
                                            ?></p>
                </div>
                <div class="box">
                    <h2>Report Result</h2>
                    <p id="vaccineAvailability"><?php
                                                require_once './controllers/userController.php';
                                                $vaccine_con = new userController;
                                                $all_vaccine = $vaccine_con->readAll("report");
                                                $vaccine_array = [];

                                                while ($row = $all_vaccine->fetch_assoc()) {
                                                    $vaccine_array[] = $row['id'];
                                                }
                                                if (is_array($vaccine_array)) {
                                                    echo count($vaccine_array);
                                                } else {
                                                    echo "0";
                                                }
                                                ?></p>
                </div>
            </div>

        </div>
    </div>
    <?php require_once './views/partial/sidebarFoot.php'; ?>

</body>

</html>