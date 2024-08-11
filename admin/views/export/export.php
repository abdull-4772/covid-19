<?php
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    exportData($type);
}

function exportData($type)
{
    require_once '../../controllers/hospitalController.php';
    $data = [
        ['id', 'Patient', 'Hospital', 'Vaccine', 'Dose'],
    ];

    $reportController = new hospitalController;
    $getData = $reportController->getReportData();
    // Table body
    foreach ($getData as $row) {
        $data[]= [ htmlspecialchars($row['id']),
        htmlspecialchars($row['p_name']), 
        htmlspecialchars($row['h_name']),
        htmlspecialchars($row['vaccine_name']),
        htmlspecialchars($row['dose_number'])];
    }

    $filename = "report_$type.xls";

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    $isPrintHeader = false;

    foreach ($data as $row) {
        if (!$isPrintHeader) {
            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;
        }
        echo implode("\t", array_values($row)) . "\n";
    }
    exit();
}
