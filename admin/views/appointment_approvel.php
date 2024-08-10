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
            background-color: #007bff;
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
            color: #007bff;
            border-bottom: 2px solid #007bff;
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
    }
    ?>

    <div id="customAlertOverlay" class="custom-overlay">

        <!-- Aproved Alert Box  -->
        <?php
        if (isset($_GET['approve'])) {
            $approve_id = $_GET['approve'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                closeDeleteBox()
                showDeletedAlert();
                });
                </script>";
        }
        ?>
        <div id="approveConfirmBox" class="custom-alert-box">
            <h2>Confirm for Aprove</h2>
            <p>Are you sure you want to Approve <?php if ($userName != "") {
                                                    echo $userName;
                                                } ?></p>
            <form action="./delete/delete.php" method="POST">
                <input type="text" name="id" value="<?php echo $approve_id; ?>" hidden>
                <input type="text" name="approve" value="Approved" hidden>
                <input type="submit" value="Confirm" class="btn confirmBtn">
                <button type="button" class="btn cancelBtn" onclick="cancelFormSubmission(event)">Cancel</button>
            </form>
        </div>
        <!-- Aproved Alert Box end -->

        <!-- Rejected Alert Box  -->
        <?php
        if (isset($_GET['reject'])) {
            $reject_id = $_GET['reject'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                closeDeleteBox()
                showDeletedAlert();
                });
                </script>";
        }
        ?>
        <div id="rejectConfirmBox" class="custom-alert-box">
            <h2>Confirm for Aprove</h2>
            <p>Are you sure you want to Approve <?php if ($userName != "") {
                                                    echo $userName;
                                                } ?></p>
            <form action="./delete/delete.php" method="POST">
                <input type="text" name="id" value="<?php echo $reject_id; ?>" hidden>
                <input type="text" name="reject" value="Rejected" hidden>
                <input type="submit" value="Confirm" class="btn confirmBtn">
                <button type="button" class="btn cancelBtn" onclick="cancelFormSubmission(event)">Cancel</button>
            </form>
        </div>
        <!-- Rejected Alert Box end -->
    </div>

    <div class="covid-report-container">
        <header class="covid-report-header">
            <h2>Patient Appointment Approvel</h2>
        </header>
        <div class="covid-report-content">
            <section class="covid-report-section">
                <h3>Test Results</h3>
                <p>Details of the test results.</p>

                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Test Type</th>
                            <th>Status</th>
                            <th>Appointment Date</th>
                            <th>Approve Or Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming $getData contains the report data
                        require_once '../controllers/hospitalController.php';
                        $reportController = new hospitalController;
                        $getData = $reportController->getPatientAppointmentApprovel();

                        foreach ($getData as $row) {
                            if (htmlspecialchars($row['status']) == "Pending") {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['id']) . '</td>
                                    <td>' . htmlspecialchars($row['p_name']) . '</td>
                                    <td>' . htmlspecialchars($row['h_name']) . '</td>
                                    <td>' . htmlspecialchars($row['test_type']) . '</td>
                                    <td style=" background-color:#FF9800; color:white;">' . htmlspecialchars($row['status']) . '</td>
                                    <td>' . htmlspecialchars($row['appointment_date']) . '</td>
                                      <td>
                                            <a href="?approve=' . $row['id'] . '" >Approve</a>
                                            Or
                                            <a href="?reject=' . $row['id'] . '" >Reject</a>
                                        </td>
                                    </tr>';
                            } else if (htmlspecialchars($row['status']) == "Approved") {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['id']) . '</td>
                                    <td>' . htmlspecialchars($row['p_name']) . '</td>
                                    <td>' . htmlspecialchars($row['h_name']) . '</td>
                                    <td>' . htmlspecialchars($row['test_type']) . '</td>
                                    <td style="background-color:green; color:white;">' . htmlspecialchars($row['status']) . '</td>
                                    <td>' . htmlspecialchars($row['appointment_date']) . '</td>
                                      <td>
                                        <a href="?reject=' . $row['id'] . '" >Reject</a>
                                        </td>
                                    </tr>';
                            } else if (htmlspecialchars($row['status']) == "Rejected") {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['id']) . '</td>
                                    <td>' . htmlspecialchars($row['p_name']) . '</td>
                                    <td>' . htmlspecialchars($row['h_name']) . '</td>
                                    <td>' . htmlspecialchars($row['test_type']) . '</td>
                                    <td style="background-color:red; color:white;">' . htmlspecialchars($row['status']) . '</td>
                                    <td>' . htmlspecialchars($row['appointment_date']) . '</td>
                                    <td>
                                      <a href="?approve=' . $row['id'] . '" >Approve</a>
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
</body>

</html>