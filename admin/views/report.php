<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Report</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
      body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
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
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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

    </style>
</head>

<body>
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
                <!-- Add test results here -->
            </section>
        </div>
    </div>

    <script>
        function exportReport(type) {
            window.location.href = 'export.php?type=' + type;
        }
    </script>
</body>

</html>