<?php
require_once '../controllers/myAppointmentsController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/custom-style.css">
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="h2 mb-4 px-3">Patient</div>
            <ul class="list-unstyled">
                <li><a href="../patientDashboard.php">Dashboard</a></li>
                <li><a href="./searchHospitals.php">Search Hospitals</a></li>
                <li><a href="./requestAppointment.php">Request Appointment</a></li>
                <li><a href="./requestTest_Vaccination.php">Request COVID-19 Test/Vaccination</a></li>
                <li><a href="./viewReports.php">View Reports</a></li>
                <li><a href="./myAppointments.php">My Appointments</a></li>
                <li><a href="./manageProfile.php">My Profile</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content my-4">
            <h2>Hospital Appointments</h2>
            <?php if (!empty($hospitalAppointments)): ?>
                <table class="table table-bordered ">
                    <thead  style="background: #6f42c1; color:#ffff;">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hospitalAppointments as $appointment): ?>
                            <tr>
                                <td><?php echo $appointment['id']; ?></td>
                                <td><?php echo $appointment['patient_name']; ?></td>
                                <td><?php echo $appointment['hospital_name']; ?></td>
                                <td><?php echo $appointment['type']; ?></td>
                                <td><?php echo $appointment['appointment_date']; ?></td>
                                <td><?php echo $appointment['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hospital appointments found.</p>
            <?php endif; ?>

            <h2>Test/Vaccination Appointments</h2>
            <?php if (!empty($testVaccinationAppointments)): ?>
                <table class="table table-bordered">
                    <thead  style="background: #6f42c1; color:#ffff;">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($testVaccinationAppointments as $appointment): ?>
                            <tr>
                                <td><?php echo $appointment['id']; ?></td>
                                <td><?php echo $appointment['patient_name']; ?></td>
                                <td><?php echo $appointment['hospital_name']; ?></td>
                                <td><?php echo $appointment['type']; ?></td>
                                <td><?php echo $appointment['appointment_date']; ?></td>
                                <td><?php echo $appointment['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No test/vaccination appointments found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
