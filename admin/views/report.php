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
    <title>COVID-19 Report</title>
    <link rel="stylesheet" href="../public/css/style.css">

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

        .covid-report-header h1 {
            margin: 0;
            font-size: 2.5em;
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

        .covid-report-button {
            background-color: #6f42c1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin: 5px;
        }

        .covid-report-button:hover {
            background-color: #6f42c1;
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

        /* Report End */
    </style>
</head>

<body>
    <?php require_once './partial/sidebarHead.php'; ?>
    <div class="covid-report-container">
        <h1>Report of COVID-19</h1>
        <header class="covid-report-header">
            <h2>COVID-19 Test Report (Date wise report)</h2>
        </header>
        <div class="covid-report-content">
            <section class="covid-report-section">
                <h3>Export Reports</h3>
                <button class="covid-report-button" onclick="exportReport('date')">Export by Date</button>
                <button class="covid-report-button" onclick="exportReport('week')">Export by Week</button>
                <button class="covid-report-button" onclick="exportReport('month')">Export by Month</button>
            </section>
            <section class="covid-report-section">
                <h3>Report of COVID-19</h3>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Viccine Name</th>
                            <th>Dose Number</th>
                            <th>Report Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../controllers/hospitalController.php';
                        $reportController = new hospitalController;
                        $getData = $reportController->getReportData();

                        foreach ($getData as $row) {
                            echo '<tr>
                            <td>' . htmlspecialchars($row['id']) . '</td>
                            <td>' . htmlspecialchars($row['p_name']) . '</td>
                            <td>' . htmlspecialchars($row['h_name']) . '</td>
                            <td>' . htmlspecialchars($row['vaccine_name']) . '</td>
                            <td>' . htmlspecialchars($row['dose_number']) . '</td>
                            <td>' . htmlspecialchars($row['created_at']) . '</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <?php require_once './partial/sidebarFoot.php'; ?>

    <script>
        function exportReport(type) {
            window.location.href = './export/export.php?type=' + type;
        }
    </script>
</body>

</html>