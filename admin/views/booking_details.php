<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("Location: ./login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Vaccines</title>

    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <?php include_once "./partial/sidebarHead.php"; ?>

    <div class="main">
        <h1 id="hover">Booking Details</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Patient Name</th>
                    <th>Hospital Number</th>
                    <th>Result</th>
                    <th>Result Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../controllers/hospitalController.php";
                $testResult = new hospitalController;
                $getTest = $testResult->getTestResult();
                if ($getTest !== false) {
                    while ($row = $getTest->fetch_assoc()) {
                        echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['p_name'] . '</td>
                        <td>' . $row['h_name'] . '</td>
                        <td>' . $row['result'] . '</td>
                        <td>' . $row['result_date'] . '</td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once "./partial/sidebarFoot.php"; ?>

</body>

</html>