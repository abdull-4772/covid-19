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
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Appointment Aprovel</title>
    <style>
        /* Report Start */
        .covid-report-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .covid-report-header {
            text-align: center;
            padding: 20px;
            background-color: #6f42c1;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .covid-report-header h2 {
            margin: 10px 0 0;
            font-size: 1.5em;
        }

        .covid-report-content {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .covid-report-section {
            margin-bottom: 20px;
        }

        .covid-report-section h3 {
            font-size: 1.75em;
            color: #6f42c1;
            border-bottom: 2px solid #6f42c1;
            padding-bottom: 10px;
        }

        .covid-report-section p {
            font-size: 1em;
            line-height: 1.6;
            color: #555;
        }

        @media (max-width: 768px) {
            .covid-report-header h1 {
                font-size: 2em;
            }

            .covid-report-header h2 {
                font-size: 1.25em;
            }

            .covid-report-section h3 {
                font-size: 1.5em;
            }
        }
    </style>
</head>

<body>
    <?php require_once './partial/sidebarHead.php';
    require_once '../controllers/hospitalController.php';
    if (isset($_POST['reject'])) {
        $id =  $_POST['id'];
        $reject = $_POST['reject'];
        $hospitalController = new hospitalController;
        $hospitalController->updateAppointmentApprovel($id, $reject);
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
        // removeFromPost();
        });
        </script>";
    }else if(isset($_POST['approve'])){
        $id =  $_POST['id'];
        $reject = $_POST['approve'];
        $hospitalController = new hospitalController;
        $hospitalController->updateAppointmentApprovel($id, $reject);
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
        // removeFromPost();
        });
        </script>";
    }
    ?>
    <div id="customAlertOverlay" class="custom-overlay">

        <!--========================= Approved Alert Box =========================-->
        <?php
        if (isset($_GET['approve']) && isset($_GET['app_name'])) {
            $approve_id = $_GET['approve'];
            $approve_n = $_GET['app_name'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
            approveFunc();
            });
            </script>";
        }
        ?>
        <div id="approveConfirmBox" class="custom-alert-box">
            <h2>Confirm for Approval</h2>
            <p>Are you sure you want to approve <b><?php echo !empty($approve_n) ? htmlspecialchars($approve_n) : ''; ?></b>?</p>
            <form action="./appointment_approvel.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($approve_id); ?>">
                <input type="hidden" name="approve" value="Approved">
                <input type="submit" value="Confirm" class="btn confirmBtn">
                <button type="button" class="btn cancelApprove" onclick="cancelFormSubmission(event);">Cancel</button>
            </form>
        </div>
        <!--============================== Approved Alert Box end =========================-->


        <!--============================== Rejected Alert Box ==============================-->
        <?php
        if (isset($_GET['reject']) && isset($_GET['rej_name'])) {
            $reject_id = $_GET['reject'];
            $reject_n = $_GET['rej_name'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
            rejectFunc();
            });
          </script>";
        }
        ?>
        <div id="rejectConfirmBox" class="custom-alert-box">
            <h2>Confirm for Rejection</h2>
            <p>Are you sure you want to reject <b><?php echo !empty($reject_n) ? htmlspecialchars($reject_n) : ''; ?></b>?</p>
            <form action="./appointment_approvel.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($reject_id); ?>">
                <input type="hidden" name="reject" value="Rejected">
                <input type="submit" value="Confirm" class="btn confirmBtn">
                <button type="button" class="btn cancelReject" onclick="cancelFormSubmission(event);">Cancel</button>
            </form>
        </div>
        <!--========================= Rejected Alert Box end =========================-->
    </div>

    <div class="covid-report-container">
        <header class="covid-report-header">
            <h2>Patient Appointment Approvel</h2>
        </header>
        <div class="covid-report-content">
            <section class="covid-report-section">
                <h3>Test Results</h3>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Test Type</th>
                            <th>Status</th>
                            <th>Appointment Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../controllers/hospitalController.php';
                        $reportController = new hospitalController;
                        $getData = $reportController->getPatientAppointmentApprovel();

                        foreach ($getData as $row) {
                            if (htmlspecialchars($row['status']) == "Pending") {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['id']) . '</td>
                                    <td>' . htmlspecialchars($row['p_name']) . '</td>
                                    <td>' . htmlspecialchars($row['h_name']) . '</td>
                                    <td>' . htmlspecialchars($row['reason']) . '</td>
                                    <td style="background-color:#FF9800; color:white;">' . htmlspecialchars($row['status']) . '</td>
                                    <td>' . htmlspecialchars($row['appointment_date']) . '</td>
                                    <td>
                                        <a href="./appointment_approvel.php?approve=' . htmlspecialchars($row['id']) . '&app_name=' . urlencode($row['p_name']) . '">Approve</a>
                                        Or
                                        <a href="./appointment_approvel.php?reject=' . htmlspecialchars($row['id']) . '&rej_name=' . urlencode($row['p_name']) . '">Reject</a>
                                    </td>
                                    </tr>';
                            } else if (htmlspecialchars($row['status']) == "Approved") {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['id']) . '</td>
                                    <td>' . htmlspecialchars($row['p_name']) . '</td>
                                    <td>' . htmlspecialchars($row['h_name']) . '</td>
                                    <td>' . htmlspecialchars($row['reason']) . '</td>
                                    <td style="background-color:green; color:white;">' . htmlspecialchars($row['status']) . '</td>
                                    <td>' . htmlspecialchars($row['appointment_date']) . '</td>
                                    <td>
                                        <a href="./appointment_approvel.php?reject=' . htmlspecialchars($row['id']) . '&rej_name=' . urlencode($row['p_name']) . '">Reject</a>
                                    </td>
                                    </tr>';
                            } else if (htmlspecialchars($row['status']) == "Rejected") {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['id']) . '</td>
                                    <td>' . htmlspecialchars($row['p_name']) . '</td>
                                    <td>' . htmlspecialchars($row['h_name']) . '</td>
                                    <td>' . htmlspecialchars($row['reason']) . '</td>
                                    <td style="background-color:red; color:white;">' . htmlspecialchars($row['status']) . '</td>
                                    <td>' . htmlspecialchars($row['appointment_date']) . '</td>
                                    <td>
                                        <a href="./appointment_approvel.php?approve=' . htmlspecialchars($row['id']) . '&app_name=' . urlencode($row['p_name']) . '">Approve</a>
                                    </td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <?php require_once './partial/sidebarFoot.php'; ?>
    <script>
        // Showing Alert Boxes
        let alert_background = document.querySelector(".custom-overlay");
        let approveBox = document.querySelector("#approveConfirmBox");
        let rejectBox = document.querySelector("#rejectConfirmBox");

        // Cancel the Confirmation
        function cancelFormSubmission(event) {
            event.preventDefault(); // Prevent form submission
            removeBox();
            setTimeout(() => {
                removeDeley();
            }, 100)
        }

        function removeFromPost() {
            removeBox();
            setTimeout(() => {
                removeDeley();
            }, 100)
        }

        function approveFunc() {
            alert_background.style.display = "block";
            setTimeout(() => {
                addDeley_app();
            }, 100)
        }

        function rejectFunc() {
            alert_background.style.display = "block";
            setTimeout(() => {
                addDeley_rej();
            }, 100)
        }

        function addDeley_app() {
            approveBox.style.top = "40%";
        }

        function addDeley_rej() {
            rejectBox.style.top = "40%";
        }

        function removeBox() {
            rejectBox.style.top = "-120%";
            approveBox.style.top = "-120%";
            setTimeout(() => {
                removeDeley();
            }, 100)
        }

        function removeDeley() {
            alert_background.style.display = "none";
        }
    </script>
</body>

</html>