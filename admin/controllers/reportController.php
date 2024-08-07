<?php
require_once __DIR__ . '/../models/reportModel.php';

class reportController
{
    function getReportData()
    {
        $reportMod = new reportModel();
        return $reportMod->getReportData();
    }
}
