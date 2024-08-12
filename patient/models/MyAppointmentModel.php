<?php
class MyAppointmentsModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getHospitalAppointmentsByPatientId($patientId)
    {
        $query = "
            SELECT ha.id, p.name AS patient_name, h.name AS hospital_name, ha.test_type AS type, ha.appointment_date, ha.status
            FROM Hospital_appointment ha
            JOIN patient p ON ha.patient_id = p.id
            JOIN hospital h ON ha.hospital_id = h.id
            WHERE ha.patient_id = '$patientId'
        ";

        $result = mysqli_query($this->conn, $query);
        $appointments = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $appointments[] = $row;
            }
        }

        return $appointments;
    }

    public function getTestVaccinationAppointmentsByPatientId($patientId)
    {
        $query = "
            SELECT tva.id, p.name AS patient_name, h.name AS hospital_name, tva.test_type AS type, tva.appointment_date, tva.status
            FROM Test_Vaccination_appointment tva
            JOIN patient p ON tva.patient_id = p.id
            JOIN hospital h ON tva.hospital_id = h.id
            WHERE tva.patient_id = '$patientId'
        ";

        $result = mysqli_query($this->conn, $query);
        $appointments = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $appointments[] = $row;
            }
        }

        return $appointments;
    }
}
