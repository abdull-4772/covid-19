<?php
class MyAppointmentsModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAppointmentsByPatientId($patientId) {
        $appointments = [];

        // Retrieve appointments from the Test_Vaccination_appointment table
        $query1 = "SELECT 
                        id, 
                        hospital_id, 
                        reason, 
                        appointment_type AS type, 
                        status, 
                        appointment_date 
                   FROM Test_Vaccination_appointment 
                   WHERE patient_id = '$patientId'";

        $result1 = mysqli_query($this->conn, $query1);
        if ($result1 && mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $appointments[] = $row;
            }
        }

        // Retrieve appointments from the Hospital_appointment table
        $query2 = "SELECT 
                        id, 
                        hospital_id, 
                        test_type AS type, 
                        status, 
                        appointment_date 
                   FROM Hospital_appointment 
                   WHERE patient_id = '$patientId'";

        $result2 = mysqli_query($this->conn, $query2);
        if ($result2 && mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $appointments[] = $row;
            }
        }

        return $appointments;
    }
}
?>
