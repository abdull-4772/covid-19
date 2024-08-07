<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Report</title>
    <!-- <link rel="stylesheet" href="../public/css/style.css"> -->
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }


        /* side navigation bar */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: green;
            padding-top: 20px;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #45a049;
            color: white;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            padding: 8px 20px;
        }

        .sidebar-menu li a {
            padding: 10px 10px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar-menu li a:hover {
            background-color: #45a049;
            border-radius: 4px;
        }

        .open-btn {
            color: black;

        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content .open-btn {
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
            margin: 20px;
        }

        .main-content .content {
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }

        @media screen and (max-width: 600px) {
            .main-content {
                margin-left: 0;
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .header h2 {
            margin: 10px 0 0;
            font-size: 1.5em;
        }

        .report-content {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .report-section {
            margin-bottom: 20px;
        }

        .report-section h3 {
            font-size: 1.75em;
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }

        .report-section p {
            font-size: 1em;
            line-height: 1.6;
            color: #555;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .header h2 {
                font-size: 1.25em;
            }

            .report-section h3 {
                font-size: 1.5em;
            }
        }

        /* user main content start here  */
        /* .main {
            max-width: 1200px;
            width: 100%;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .main h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #4CAF50;
            font-size: 2em;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        thead {
            background: #4CAF50;
            color: white;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        tbody tr:hover {
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php require_once './partial/sidebarHead.php'; ?>
    <div class="container">
        <header class="header">
            <h1>Report of COVID-19</h1>
            <h2>COVID-19 Test Report (Date wise report)</h2>
        </header>
        <div class="report-content">
            <section class="report-section">
                <h3>Export Reports</h3>
                <button onclick="exportReport('date')">Export by Date</button>
                <button onclick="exportReport('week')">Export by Week</button>
                <button onclick="exportReport('month')">Export by Month</button>
            </section>
            <section class="report-section">
                <h3>Patient Information</h3>
                <p>Details of the patient.</p>
                <!-- Add patient details here -->
            </section>
            <section class="report-section">
                <h3>Test Results</h3>
                <p>Details of the test results.</p>

                <!-- <div class="main"> -->
                <table>
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Result</th>
                            <th>Hospital</th>
                            <th>Result Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming $getData contains the report data
                        require_once '../controllers/reportController.php';
                        $reportController = new reportController;
                        $getData = $reportController->getReportData();

                        // Table body
                        echo '<tbody>';
                        foreach ($getData as $row) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['user_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['result']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['hospital_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['result_date']) . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <!-- </div> -->
            </section>
        </div>
    </div>

    <?php require_once './partial/sidebarFoot.php'; ?>

    <script>
        function exportReport(type) {
            window.location.href = 'export.php?type=' + type;
        }
    </script>
</body>

</html>