<?php
require_once __DIR__ . '/../models/hospitalModel.php';

class hospitalController
{
    function getReportData()
    {
        $reportMod = new hospitalModel;
        return $reportMod->getReportData();
    }

    function getPatientAppointmentApprovel()
    {
        $patientAppointment = new hospitalModel;
        return $patientAppointment->getPatientAppointmentApprovel();
    }

    function updateAppointmentApprovel($id, $status)
    {
        $patientAppointment = new hospitalModel;
        $patientAppointment->updateAppointmentApprovel($id, $status);
    }

    function getTestResult()
    {
        $gettestResult = new hospitalModel;
        return $gettestResult->getTestResult();
    }
}
