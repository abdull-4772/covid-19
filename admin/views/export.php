<?php
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    exportData($type);
}

function exportData($type)
{
    // Example data, replace with your actual data
    $data = [
        ['ID', 'Name', 'Date', 'Result'],
        [1, 'John Doe', '2021-01-01', 'Negative'],
        [2, 'Jane Smith', '2021-01-02', 'Positive'],
        // Add more rows as needed
    ];

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
