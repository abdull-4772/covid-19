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
        if ($_GET['status'] == "deleted") {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showDeletedAlert();
            });
          </script>";
        }
    }
    ?>
    <!-- Deleted Alert box -->
    <div id="customAlertOverlay" class="custom-overlay">
        <div class="custom-alert-box">
            <h2>User Deleted</h2>
            <p>The user has been successfully deleted.</p>
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
                    <th>password</th>
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
                        <td>' . $row['password'] . '</td>
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
        // showing Alert Box
        let Back = document.querySelector("#customAlertOverlay");
        let dltAlertBox = document.querySelector(".custom-alert-box");

        function showDeletedAlert() {
            Back.style.display = "block";
            dltAlertBox.style.top = "40%";
            setTimeout(() => {
                removeDeletedAlrt()
            }, 2200)
        }

        function removeDeletedAlrt() {
            Back.style.display = "none";
            dltAlertBox.style.top = "-120%";
        }
    </script>
</body>

</html>