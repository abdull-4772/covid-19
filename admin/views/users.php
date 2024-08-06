<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['status'])) {
            if ($_GET['status'] == "deleted") {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showDeletedAlert();
                });
            </script>";
            } elseif ($_GET['status'] == "edited") {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showUpdatedAlert();
                });
            </script>";
            }
        }
    }
    ?>
    <!-- Alerts -->
    <div id="customAlertOverlay" class="custom-overlay">
        <div id="deletedAlertBox" class="custom-alert-box">
            <h2>User Deleted</h2>
            <p>The user has been successfully deleted.</p>
        </div>
        <div id="updatedAlertBox" class="custom-alert-box">
            <h2>User Updated</h2>
            <p>The user information has been successfully updated.</p>
        </div>
    </div>



    <div class="main">
        <h1 id="hover">Web Users</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <!-- <th>password</th> <td>' . $row['password'] . '</td>-->
                    <th>age</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>Phone number</th>
                    <th>Created at</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../controllers/userController.php";
                $users = new UserController;
                $getUsers = $users->readAll("user");
                if ($getUsers !== false) {
                    while ($row = $getUsers->fetch_assoc()) {
                        echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['age'] . '</td>
                        <td>' . $row['gender'] . '</td>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['phone_number'] . '</td>
                        <td>' . $row['created_at'] . '</td>
                        <td>
                            <a href="./edit/edit.php?id=' . $row['id'] . '" id="edit">Edit</a>
                            /
                            <a href="./delete/delete.php?id=' . $row['id'] . '" id="delete" >Delete</a>
                        </td>
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

    <script>
        // Showing Alert Boxes
        let alertBackground = document.querySelector("#customAlertOverlay");
        let deletedAlertBox = document.querySelector("#deletedAlertBox");
        let updatedAlertBox = document.querySelector("#updatedAlertBox");

        function showDeletedAlert() {
            alertBackground.style.display = "block";
            deletedAlertBox.style.top = "40%";
            setTimeout(() => {
                removeAlert(deletedAlertBox);
            }, 2100);
        }

        function showUpdatedAlert() {
            alertBackground.style.display = "block";
            updatedAlertBox.style.top = "40%";
            setTimeout(() => {
                removeAlert(updatedAlertBox);
            }, 2100);
        }

        function removeAlert(alertBox) {
            alertBox.style.top = "-120%";
            alertBackground.style.display = "none";
        }
    </script>
</body>

</html>