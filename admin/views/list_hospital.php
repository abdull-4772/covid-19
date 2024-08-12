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
        <h1 id="hover">list of Hospitals</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>address</th>
                    <th>contact_number</th>
                    <th>email</th>
                    <th>created_at</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../controllers/userController.php";
                $users = new UserController;
                $getUsers = $users->readAll("hospital");
                if ($getUsers !== false) {
                    while ($row = $getUsers->fetch_assoc()) {
                        echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['contact_number'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['created_at'] . '</td>
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