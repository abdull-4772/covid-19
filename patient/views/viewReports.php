<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports</title>
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
            <h2>View Reports</h2>
            <h4>COVID-19 Test Results</h4>
            <ul class="list-unstyled">
                <?php if (!empty($testResults)) {
                    foreach ($testResults as $result) { ?>
                        <li><?php echo $result['hospital_name']; ?> - <?php echo $result['result']; ?> - <?php echo date('d-m-Y', strtotime($result['result_date'])); ?></li>
                    <?php }
                } else { ?>
                    <li>No test results found.</li>
                <?php } ?>
            </ul>

            <h4>Vaccination Reports</h4>
            <ul class="list-unstyled">
                <?php if (!empty($vaccinationReports)) {
                    foreach ($vaccinationReports as $report) { ?>
                        <li><?php echo $report['hospital_name']; ?> - <?php echo $report['vaccine_name']; ?> - <?php echo $report['status']; ?></li>
                    <?php }
                } else { ?>
                    <li>No vaccination reports found.</li>
                <?php } ?>
            </ul>
        </div>
    </div>
</body>
</html>
