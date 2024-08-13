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
        <h1 id="hover">list of Vaccines</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th> Vaccine Name</th>
                    <th>Dose Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../controllers/userController.php";
                $users = new UserController;
                $getUsers = $users->readAll("ListVaccine");
                if ($getUsers !== false) {
                    while ($row = $getUsers->fetch_assoc()) {
                        echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['vaccine_name'] . '</td>
                        <td>' . $row['dose_number'] . '</td>
                        </tr>';
                    }
                } else {
                    echo '<tr>
                <td colspan="10"> User not found </td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once "./partial/sidebarFoot.php"; ?>

</body>

</html>