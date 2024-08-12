<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("Location: ./login.php");
    exit();
}
require_once "../controllers/userController.php";
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
    <!--========================= Alerts box Start =========================-->
    <div id="customAlertOverlay" class="custom-overlay">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['status'])) {
                if ($_GET['status'] == "deleted") {
                    echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                    closeDeleteBox()
                    showDeletedAlert();
                    });
                    </script>";
                } elseif ($_GET['status'] == "edited") {
                    echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                    closeDeletedBox();
                    showUpdatedAlert();
                    });
                    </script>";
                }
            }
        }
        ?>
        <div id="deletedAlertBox" class="custom-alert-box">
            <h2>This Vaccine has been successfully deleted.</p>
        </div>
        <div id="updatedAlertBox" class="custom-alert-box">
            <h2>Vaccine Updated</h2>
            <p>This Vaccine has been successfully updated.</p>
        </div>
        <!--=========================== Alerts Box end ===========================-->

        <!--========================= Delete a user Box start =========================-->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $userReadCont = new userController;
                $getResult = $userReadCont->readOne("List_of_Vaccine", "$id");
                $userId = "";
                $userName = "";
                if ($id !== "") {
                    while ($row = $getResult->fetch_assoc()) {
                        $userId =  $row['id'];
                        $userName =  $row['name'];
                    }
                }
                if ($id == $userId) {
                    echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    confirmDelete();
                });
                </script>";
                }
            }
        }
        ?>
        <div id="deleteConfirmBox" class="custom-alert-box">
            <h2>Confirm Deletion</h2>
            <p>Are you sure you want to delete this Vaccine?</p>
            <form action="./delete/delete.php" method="POST">
                <input type="text" name="id" value="<?php if ($userId != "") {
                                                        echo $userId;
                                                    } ?>" hidden>
                <h1 style="text-decoration:underline;"><?php if ($userName != "") {
                                                            echo $userName;
                                                        } ?></h1>
                <button type="button" class="btn cancelBtn" onclick="cancelFormSubmission(event)">Cancel</button>
                <input type="submit" value="Confirm" class="btn confirmBtn">
            </form>
        </div>
        <!--========================= Delete a user Box end ==============================-->
    </div>


    <div class="main">
        <h1 id="hover">list of Vaccines</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                   <th> vaccine_name</th>
                    <th>dose_number</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = new UserController;
                $getUsers = $users->readAll("List_of_Vaccine");
                if ($getUsers !== false) {
                    while ($row = $getUsers->fetch_assoc()) {
                        echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['vaccine_name'] . '</td>
                        <td>' . $row['dose_number'] . '</td>
                        <td>
                            <a href="./edit/edit.php?id=' . $row['id'] . '" id="edit">Edit</a>
                            /
                            <a href="./list_vaccine.php?id=' . $row['id'] . '" id="delete" >Delete</a>
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
    <?php include_once "./partial/sidebarFoot.php"; ?>

    <script>
      

        // Showing Alert Boxes
        let alertBackground = document.querySelector("#customAlertOverlay");
        let deletedAlertBox = document.querySelector("#deletedAlertBox");
        let updatedAlertBox = document.querySelector("#updatedAlertBox");
        let deleteConfirmBox = document.querySelector("#deleteConfirmBox");

        // Cancel the Delete
        function cancelFormSubmission(event) {
            event.preventDefault(); // Prevent form submission
            closeDeleteBox();
        }

        function closeDeleteBox() {
            deleteConfirmBox.style.top = "-120%";
            alertBackground.style.display = "none";
        }

        function closeDeletedBox() {
            deleteConfirmBox.style.top = "-120%";
            alertBackground.style.display = "none";
        }

        // deleting alert box
        function confirmDelete() {
            console.log("confirmDelete function called");
            alertBackground.style.display = "block";
            deleteConfirmBox.style.top = "40%";
        }

        function showDeletedAlert() {
            console.log("showDeletedAlert function called");
            alertBackground.style.display = "block";
            deletedAlertBox.style.top = "40%";
            setTimeout(() => {
                removeAlert(deletedAlertBox);
            }, 2100);
        }

        function showUpdatedAlert() {
            console.log("showUpdatedAlert function called");
            alertBackground.style.display = "block";
            updatedAlertBox.style.top = "40%";
            setTimeout(() => {
                removeAlert(updatedAlertBox);
            }, 2100);
        }

        function removeAlert(alertBox) {
            console.log("removeAlert function called for:", alertBox);
            alertBox.style.top = "-120%";
            alertBackground.style.display = "none";
        }
    </script>

</body>

</html>